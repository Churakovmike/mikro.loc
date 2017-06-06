<?php

namespace app\modules\admin\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use PEAR2\Net\RouterOS;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $surname
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $balance
 */
class User extends \yii\db\ActiveRecord
{
    public $passview;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }
    /**
     * @inheritdoc
     */
    public function getTariffs() {
        return $this->hasOne(Tariffs::className(), ['id' => 'tariffs_id']);
    }

    public function getNametarif() {
        return $this->tariffs->name;
    }

    public function getConnection() {
        return $this->hasOne(Connection::className(), ['id' => 'connection_id']);
    }

    public function getNameconnection() {
        return $this->connection->nameconnection;
    }

    public function getDevices() {
        return $this->hasOne(Devices::className(), ['id' => 'devices_id']);
    }

    public function getNamedevices() {
        return $this->devices->name;
    }

    public function getSerialnumber() {
        return $this->devices->serialnumber;
    }

    public function rules()
    {
        return [
            [['username', 'auth_key', 'password_hash', 'email', 'surname', 'firstname', 'secondname', 'address', 'phone', 'date_contract', 'balance', 'number_contract'], 'required'],
            [['activity', 'devices_id'], 'safe'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['username', 'password_hash', 'password_reset_token', 'surname', 'firstname', 'secondname', 'address', 'phone'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['email'], 'email'],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
            [['passview', 'created_at', 'updated_at', 'nametarif', 'nameconnection', 'namedevices', 'role', 'tariffs_id', 'connection_id'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'surname' => 'Фамилия',
            'firstname' => 'Имя',
            'secondname' => 'Отчество',
            'address' => 'Адрес',
            'phone' => 'Телефон',
            'date_contract' => 'Дата заключение договора',
            'balance' => 'Баланс',
            'tariffs_id' => 'Код тарифа',
            'connection_id' => 'Код соединения',
            'number_contract' => 'Номер договора',
            'activity' => 'Статус',
            'devices_id' => 'Оборудование',
            'username' => 'Логин',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Пароль',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'nametarif' => 'Тариф',
            'nameconnection' => 'Тип соединения',
            'namedevices' => 'Оборудование',
            'role' => 'role',
            'serialnumber' => 'Серийный номер',
        ];
    }
    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    public function mikrotikAdd($model, $tempPassword) {
        $service = Connection::findOne($model->connection_id);
        $profile = Tariffs::findOne($model->tariffs_id);
        try {
            $client = new RouterOS\Client('192.168.199.100', 'admin', 'admin');
//        } catch (Exception $e) {
        } catch (RouterOS\SocketException $e) {
            $tasks = new Tasks();
            $tasks->action = 'create';
            $tasks->username = $model->username;
            $tasks->password = $tempPassword;
            $tasks->service = $service->nameconnection;
            $tasks->profile = $profile->description;
            $tasks->date = date('Y-m-d h-i');
            $tasks->save();
            Yii::$app->session->setFlash('response', 'Ошибка подключения к оборудованию. Данные по операции добавлены в журнал отложенных заданий');
            Yii::$app->response->redirect(['/admin/user/index']);
//            die('Unable to connect to the router.');
        }

        $addRequest = new RouterOS\Request('/ppp/secret/add');

        $addRequest->setArgument('name', $model->username);
        $addRequest->setArgument('password', $tempPassword);
        $addRequest->setArgument('service', $service->nameconnection);
        $addRequest->setArgument('profile', $profile->description);
//        echo  $profile->name;
        if(!$client) {
            return true;
        }
        if ($client->sendSync($addRequest)->getType() !== RouterOS\Response::TYPE_FINAL) {
            //die("Error when creating ARP entry for 'Yii'");
            $tasks = new Tasks();
            $tasks->action = 'create';
            $tasks->username = $model->username;
            $tasks->password = $tempPassword;
            $tasks->service = $service->nameconnection;
            $tasks->profile = $profile->description;
            $tasks->date = date('Y-m-d h-i');
            $tasks->save();
            Yii::$app->session->setFlash('response', 'Ошибка подключения к оборудованию. Данные по операции добавлены в журнал отложенных заданий');
            Yii::$app->response->redirect(['/admin/user/index']);
        }
    }



    public function mikrotikDelete($us) {

        $user = User::find()->where(['id' => $us])->one();

        try {
//            $client = new RouterOS\Client('192.168.199.100', 'admin', 'admin');
            $client = new RouterOS\Client('192.168.199.100', 'admin', 'admin');

            $printRequest = new RouterOS\Request('/ppp/secret/print');
            $printRequest->setArgument('.proplist', '.id');
            $printRequest->setQuery(RouterOS\Query::where('name', $user->username));
            $id = $client->sendSync($printRequest)->getProperty('.id');

            $removeRequest = new RouterOS\Request('/ppp/secret/remove');
            $removeRequest->setArgument('numbers', $id);
            $client->sendSync($removeRequest);

            $devices = Devices::findOne($user->devices_id);
            $devices->devicesstatus = 0;
            $devices->save();
        } catch (RouterOS\SocketException $e) {
            $tasks = new Tasks();
            $tasks->action = 'delete';
            $tasks->username = $user->username;
            $tasks->date = date('Y-m-d h-i');
            $tasks->save();
            Yii::$app->session->setFlash('response', 'Ошибка подключения к оборудованию. Данные по операции добавлены в журнал отложенных заданий');
            Yii::$app->response->redirect(['/admin/user/index']);
        }

//        $client = new RouterOS\Client('192.168.1.100', 'admin', 'admin');
//
//        $printRequest = new RouterOS\Request('/ppp/secret/print');
//        $printRequest->setArgument('.proplist', '.id');
//        $printRequest->setQuery(RouterOS\Query::where('name', $user->username));
//        $id = $client->sendSync($printRequest)->getProperty('.id');
//
//        $removeRequest = new RouterOS\Request('/ppp/secret/remove');
//        $removeRequest->setArgument('numbers', $id);
//        $client->sendSync($removeRequest);
//
//        $devices = Devices::findOne($user->devices_id);
//        $devices->devicesstatus = 0;
//        $devices->save();
    }

    public function mikrotikUpdate($model) {
        $util = new RouterOS\Util(
            $client = new RouterOS\Client('192.168.1.100', 'admin', 'admin')
        );
        $util->setMenu('/ppp/secret');
        !$model->activity ? $util->disable(RouterOS\Query::where('name', $model->username)) : $util->enable(RouterOS\Query::where('name', $model->username)) ;
    }

    public function mikrotikDisable($model) {
        $util = new RouterOS\Util(
            $client = new RouterOS\Client('192.168.1.100', 'admin', 'admin')
        );
        $util->setMenu('/ppp/secret');
        $util->disable(RouterOS\Query::where('name', $model->username));
    }

    public function mikrotikEnable($model) {
        $util = new RouterOS\Util(
            $client = new RouterOS\Client('192.168.1.100', 'admin', 'admin')
        );
        $util->setMenu('/ppp/secret');
        $util->enable(RouterOS\Query::where('name', $model->username));
    }
}

<?php

namespace app\controllers;

use app\modules\admin\models\News;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\User;
use app\models\SignupForm;

//use PEAR2\Net\RouterOS as Mikrotik;
use PEAR2\Net\RouterOS;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post', 'get'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionAddAdmin()
    {
        $model = User::find()->where(['username' => 'admin'])->one();
        if (empty($model)) {
            $user = new User();
            $user->username = 'admin';
            $user->email = 'admin@кодер.укр';
            $user->setPassword('admin');
            $user->generateAuthKey();
            if ($user->save()) {
                echo 'good';
            }
        }
    }

    public function actionSignup()
    {
        $model = new SignupForm();

        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    public function actionIndex()
    {
        $news = News::find()->limit(3)->orderBy(['id' => SORT_DESC])->all();
        return $this->render('index', compact('news'));
    }

    public function actionNews($id) {
        $news = News::findOne($id);
        $otherNews = News::find()->where(['<>', 'id', $id])->all();
        return $this->render('news', compact('news', 'otherNews'));
    }

    public function actionAllnews() {
        $news = News::find()->limit(10)->orderBy(['id' => SORT_DESC])->all();
        return $this->render('allnews' , compact('news'));
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionMikro() {
        $this->layout = false;
        $client = new RouterOS\Client('192.168.1.100', 'admin', 'admin');

        $request = new RouterOS\Request('/ppp/secret/print');
        print_r($request);
//Define $query here
//        print_r($request);
//        $query = RouterOS\Query::where('name', 'Mike');
//        $request->setQuery($query);
//        $responses = $client->sendSync($request);
//        foreach ($responses as $response) {
//            foreach ($response as $name => $value) {
//                echo "{$name}: {$value}\n <br>";
//            }
//            echo "====\n";
//        }



//      $host = '192.168.88.1';
//      $user = 'admin';
//      $pass = 'admin';
//
//      $this->layout = false;
//      $client = new RouterOS\Client('192.168.1.100', 'admin', 'admin');
//      $util = new RouterOS\Util($client);
//
//      foreach ($util->setMenu('/ppp/secret')->getAll() as $item) {
//        echo  $item('.id')    . ' ' .
//              $item('name')    . ' ' .
//              $item('service')  . ' ' .
//              $item('profile')  . ' ' .
////              $item('comment')  . ' ' .
//              $item('password') . '<br>';
//      }
//      print_r($util->setMenu('/ppp/secret')->getAll());
      return $this->render('mikro',  compact('RES'));
    }

    public function actionEdit() {
        $this->layout = false;

        $client = new RouterOS\Client('192.168.1.100', 'admin', 'admin');

        $printRequest = new RouterOS\Request('/ppp/secret/print');
        $printRequest->setArgument('.proplist','.id');
        $printRequest->setQuery(RouterOS\Query::where('name', 'Mike'));
        $id = $client->sendSync($printRequest)->getProperty('.id');
        //$id now contains the ID of the entry we're targeting

        $setRequest = new RouterOS\Request('/ppp/secret/set');
        $setRequest->setArgument('numbers', $id);
        $setRequest->setArgument('comment', 'BITCH LOL');
//        $setRequest->setArgument('last-logged-out', 'jan/01/2017 11:11:11');
        $client->sendSync($setRequest);

        return $this->render('mikro',  compact('RES'));
    }

    public function actionDelete() {
        $this->layout = false;

        $client = new RouterOS\Client('192.168.1.100', 'admin', 'admin');

        $printRequest = new RouterOS\Request('/ppp/secret/print');
        $printRequest->setArgument('.proplist', '.id');
        $printRequest->setQuery(RouterOS\Query::where('name', 'deletethis'));
        $id = $client->sendSync($printRequest)->getProperty('.id');
    //$id now contains the ID of the entry we're targeting

        $removeRequest = new RouterOS\Request('/ppp/secret/remove');
        $removeRequest->setArgument('numbers', $id);
        $client->sendSync($removeRequest);

        return $this->render('mikro',  compact('RES'));
    }

    public function actionCreate() {
        $this->layout = false;

        try {
            $client = new RouterOS\Client('192.168.123.100', 'admin', 'admin');
        } catch (Exception $e) {
            die('Unable to connect to the router.');
        }

        $addRequest = new RouterOS\Request('/ppp/secret/add');

        $addRequest->setArgument('name', 'YiiPppoe');
        $addRequest->setArgument('service', 'pppoe');
//        $addRequest->setArgument('mac-address', '00:00:00:00:00:01');
        if ($client->sendSync($addRequest)->getType() !== RouterOS\Response::TYPE_FINAL) {
            die("Error when creating ARP entry for 'Yii'");
        }

        return $this->render('mikro',  compact('RES'));
    }

    public  function actionEnable() {
        $this->layout = false;

        $util = new RouterOS\Util(
            $client = new RouterOS\Client('192.168.1.100', 'admin', 'admin')
        );
        $util->setMenu('/ppp/secret');
        //$util->remove(0);
        $util->enable(RouterOS\Query::where('name', 'LIZA_LALKA'));
//        $util->enable(1);

        return $this->render('mikro',  compact('RES'));
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: MikeCh
 * Date: 31.05.2017
 * Time: 21:48
 */

namespace app\controllers;

use app\models\Request;
use yii\web\Controller;
use Yii;


class RequestController extends Controller
{
    public function actionIndex() {

        $model = new Request();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->id]);
//            Yii::$app->session;
//            $session->set('', '');
            Yii::$app->session->setFlash('response', 'Ваша заявка успешно отправлена! В ближайшее время с вами свяжется менеджер.');

            return $this->redirect(['/']);
        } else {
            return $this->render('index', [
                'model' => $model,
            ]);
        }
    }

    protected function findModel($id)
    {
        if (($model = Request::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
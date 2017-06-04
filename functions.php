<?php
    function debug($arr) {
        echo '<pre>' . print_r($arr, true) . '</pre>';
    }

    function adminvalidate() {
        if ( Yii::$app->user->isGuest ) {
            return Yii::$app->response->redirect(['/site/login']);
        }
        if ( !Yii::$app->user->isGuest ) {
            if ( Yii::$app->user->identity->username != 'admin' ) {
                return Yii::$app->response->redirect(['/site/login', 'id' => $id]);
            }
        }
    }

    function access() {
        if ( Yii::$app->user->isGuest ) {
            return Yii::$app->response->redirect(['/site/login']);
        }

        if ( !Yii::$app->user->isGuest ) {
            $data = \app\modules\admin\models\User::findOne(\Yii::$app->user->id);
            if ( $data->role == 'abonent') {
                //debug($data->role);
                return Yii::$app->response->redirect(['/site/login']);
            }
        }
    }
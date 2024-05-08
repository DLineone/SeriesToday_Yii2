<?php

namespace app\controllers;

use app\models\User;
use yii\db\Expression;

use Yii;

class AuthController extends \yii\web\Controller
{
    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    public function actionLogin()
    {
        $color = "#791508";
        $email = Yii::$app->request->post('form')['name'];
        $password = Yii::$app->request->post('form')['password'];
        $user = User::findByName($email);

        if (User::validatePassword($user, $password) == true) {
            $this->createToken($user);
            return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
        } else {
            return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
        }
    }


    public function actionSignin()
    {
        $request = Yii::$app->request;
        $formData = $request->post('form');
        $model = new User();

        try {
            $color = "#34721c";
            $result = $model->createUser($formData);
            return $this->render('info', compact('result', 'color'));
        } catch (\yii\db\Exception $e) {
            // Если произошла ошибка, выводим сообщение об ошибке
            $color = "#791508";
            $result = $e->getMessage();
            return $this->render('info', compact('result', 'color'));
        }
    }

    public function createToken($user)
    {
        $tokenData = $user->id . $user->name . $user->mail;
        $token = hash('sha256', $tokenData);

        $this->setSessionValue($token, $user->id, $user->name, $user->role);
    }

    public function actionLogout()
    {
        $iduser = Yii::$app->session->get('userID');

        if ($iduser) {
            $this->setSessionValue(null, null, null, null);
            $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
        } else {
            $color = "#791508";
            $result = "Произошел сбой при выходе из аккаунта. Попробуйте позже.";
            return $this->render('info', compact('result', 'color'));
        }
    }

    public static function setSessionValue($token, $userID, $userName, $userRole)
    {
        Yii::$app->session->set('userToken', $token);
        Yii::$app->session->set('userID',  $userID);
        Yii::$app->session->set('userName', $userName);
        Yii::$app->session->set('userRole', $userRole);
    }
}

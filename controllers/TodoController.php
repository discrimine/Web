<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Session;
use yii\web\Request;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;

use app\models\Users;
use app\models\Notes;

class TodoController extends Controller
{

    public $enableCsrfValidation = false;


    public function actionIndex()
    {

        $session = Yii::$app->session;
        $session->open();

        return $this->render('index', [
            'logged_user' => $session->get('logged_user'),
        ]);

    }

    public function actionOrders()
    {

        $request = Yii::$app->request;
        $post = $request->post();
        $session = Yii::$app->session;


        $notes = Notes::find()
        ->orderBy('date')
        ->all();

        $idshka = $notes['id_user'];
        $Wname = Users::findOne(['id' => $idshka]);

        return $this->render('orders', [
            'Wname' => $Wname,
            'notes' => $notes,
            'logged_user' => $session->get('logged_user'),
            'id' => $id,
        ]);
    }

    public function actionLogin()
    {

        $session = Yii::$app->session;

        $request = Yii::$app->request;
        $post = $request->post();

        $checklog = Users::findOne(['login' => $post['login']]);
        $checkpass = Users::findOne(['password' => $post['password']]);

        if (isset($post['do_login'])) {

            if ($post['login'] == '') {
                $success[] = '<div class="alert alert-danger">Введіть логін!</div>';
            }
            if ($post['password'] == '') {
                $success[] = '<div class="alert alert-danger">Введіть пароль!</div>';
            }
            if ($checklog == null) {
                $success[] = '<div class="alert alert-danger">Користувача не знайдено!</div>';
            } else
                if ($checkpass == null) {
                    $success[] = '<div class="alert alert-danger">Невірний пароль! </div>';
                } else {
                    $login = $post['login'];
                    $user = Users::findAll(['login' => $login]);
                    if ($post['password'] == $user[0]['password']) {
                        $session->set('logged_user', $user);
                    }
                }
        }
        return $this->render('login', [
            'logged_user' => $session->get('logged_user'),
            'success' => $success,
            'post' => $post
        ]);
    }


    public function actionSignupform()
    {

        $request = Yii::$app->request;
        $post = $request->post();
        $success = array();
        $checklog = Users::findOne(['login' => $post['login']]);
        $checkmail = Users::findOne(['email' => $post['email']]);
        if (isset($post['do_signup'])) {
            if ($post['login'] == '') {
                $success[] = ' <div class="alert alert-danger">Введіть логін! </div>';
            }
            if ($post['email'] == '') {
                $success[] = ' <div class="alert alert-danger"> Введіть електронну адресу!</div>';
            }
            if ($post['password'] == '') {
                $success[] = '<div class="alert alert-danger"> Введіть пароль!</div>';
            }
            if ($post['password'] != $post['password_2']) {
                $success[] = ' <div class="alert alert-danger"> Паролі не співпадають!</div>';
            }
            if ($checklog != null) {
                $success[] = ' <div class="alert alert-danger"> Логін вже зайнятий!</div>';
            }
            if ($checkmail != null) {
                $success[] = ' <div class="alert alert-danger"> Електронна пошта вже зайнята!</div>';
            } else {
                $adduser = new Users();
                $adduser->login = $post['login'];
                $adduser->email = $post['email'];
                $adduser->password = $post['password'];
                $adduser->save();
                $success[] = '<div class="alert alert-success ara">Реєстрація успішна! <br/> Ви можете перейти до <a href="/web/index.php?r=todo/login">авторизації</a></div>';
            }
        }
        return $this->render('signupform', [
            'success' => $success,
            'post' => $post
        ]);
    }

    public function actionMain()
    {

        $request = Yii::$app->request;
        $post = $request->post();
        $session = Yii::$app->session;

        $id = $session['logged_user'][0]['id'];

        $notes = Notes::find()
        ->where(['id_user' => $id])
        ->orderBy('date')
        ->all();

        return $this->render('main', [
            'notes' => $notes,
            'logged_user' => $session->get('logged_user'),
            'id' => $id,
        ]);

    }

    public function actionSuccess()
    {

        $request = Yii::$app->request;
        $session = Yii::$app->session;
        $post = $request->post();

        $id = $session['logged_user'][0]['id'];

        if (isset($post['add'])) {
            $addnote = new Notes();
            $addnote->name = $post['name'];
            $addnote->description = $post['description'];
            $addnote->date = $post['date'];
            $addnote->id_user = $id;
            $addnote->completed = '0';
            $addnote->save();
            $this->redirect(['todo/main']);
        }

        $notes = Notes::find()->all();


    }

    public function actionLogout()
    {

        $session = Yii::$app->session;
        $session->open();
        $session->remove('logged_user');
        $this->redirect(['todo/index']);

    }

    public function actionUsers()
    {

        $users = Users::find()->all();

        return $this->render('users', [
            'users' => $users
        ]);

    }

    public function actionDelete($id = false)
    {


        {
            if (isset($id)) {
                if (Notes::deleteAll(['in', 'id', $id])) {
                    $this->redirect(['todo/main']);
                }
            } else {
                $this->redirect(['todo/main']);
            }
        }
    }



    public function actionAbout()
    {


        return $this->render('about');

    }



    public function actionContacts()
    {


        return $this->render('contacts');

    }


}
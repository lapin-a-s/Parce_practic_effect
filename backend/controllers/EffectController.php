<?php
namespace backend\controllers;
use Yii;
use yii\web\Controller;
use frontend\models\SignupForm;
use common\models\LoginForm;
use yii\filters\AccessControl;
use frontend\models\Effect_provider_add;
class EffectController extends Controller
{

    public function actionIndex()
    {
        if (Yii::$app->user->isGuest)
        {
            return $this->actionLogin();
        }
        else
        {
            $model = new SignupForm();
            if ($model->load(Yii::$app->request->post())) {
                if ($user = $model->signup()) {
                    if (Yii::$app->getUser()->login($user)) {
                        return $this->actionLogin();
                    }
                }
            }
            return $this->render('index', [
                'model' => $model,
            ]);
        }

    }
    public function actionLogin()
    {
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post())
            && $model->login()) {
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }
    public function actionMainwindow()
    {
        $model = new Effect_provider_add();
        if ($model->load(Yii::$app->request->post())) {
            $model->save();
        }
            return $this->render('mainwindow');

    }
    public function actionLogs()
    {
        return $this->render('logs');
    }
    public function actionTest()
    {
        return $this->render('test');
    }
    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->actionLogin();
    }
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }
}
<?php

namespace app\controllers;

use app\models\ChangePasswordForm;
use app\models\WebMarqueeModel;
use app\models\WebMemberModel;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => [],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['login'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['get'],
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

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post(), '') && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
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
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * 公告
     *
     * @return string
     */
    public function actionAnnouncement()
    {
        $announcementQuery = WebMarqueeModel::find()
            ->where([
                'level' => yii::$app->request->get('level', 4),
            ]);
        if ($ndate = yii::$app->request->get('ndate', 0)) {
            $ndate = $ndate == 1 ? time() : strtotime("-1 day");
            $announcementQuery->andFilterWhere([
                'ndate' => date("Y-m-d",$ndate),
            ]);
        }

        if ($message = yii::$app->request->get('message', '')) {
            $announcementQuery->andFilterWhere([
                ['or', "message={$message}", "message_tw={$message}", "message_en={$message}"]
            ]);
        }
        $pageSize = intval(yii::$app->request->get('pageSize', '1'));
        $pageNo = intval(yii::$app->request->get('pageNo', '10'));
        $count = $announcementQuery->count();
        $list = $announcementQuery
            ->offset(($pageSize - 1) * $pageNo)->limit($pageNo)->asArray()->all();


        return $this->render('announcement',[
            'list' => $list,
            'totalCount' => $count,
        ]);
    }

    /**
     * 帐号
     *
     * @return string
     */
    public function actionAccount()
    {
        return $this->render('account');
    }

    /**
     * 详情设定
     *
     * @return string
     */
    public function actionAccountDetailSet()
    {
        return $this->render('account-detail-set');
    }

    /**
     * 修改密码
     *
     * @return string
     */
    public function actionChangePassword()
    {
        $model = new ChangePasswordForm();
        if (yii::$app->request->isPost) {
            if ($model->load(yii::$app->request->post(), '') && $model->twicePasswordIsEqule()) {
                $memberModel = WebMemberModel::findOne(yii::$app->user->id);
                $memberModel->Passwd = $model->password;
                if($memberModel->update()) {
                    Yii::$app->getResponse()->redirect(Yii::$app->getHomeUrl());
                }
                $model->addErrors($memberModel->getErrors());
            }
        }

        return $this->render('change-password', [
            'model' => $model,
        ]);
    }

    /**
     * 最新网址
     *
     * @return string
     */
    public function  actionNewestWebsite()
    {
        return $this->render('newest-website');
    }
}

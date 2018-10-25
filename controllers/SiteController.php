<?php

namespace app\controllers;

use app\models\BaseballModel;
use app\models\BaskMatchModel;
use app\models\ChangePasswordForm;
use app\models\FootMatchModel;
use app\models\OtherPlayModel;
use app\models\SpMatchModel;
use app\models\TennisModel;
use app\models\VolleyballModel;
use app\models\WebAgentsModel;
use app\models\WebMarqueeModel;
use app\models\WebMemberModel;
use Yii;
use yii\db\Expression;
use yii\filters\AccessControl;
use yii\helpers\Url;
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
        $oid = yii::$app->request->get('oid', '');
        $agents = WebAgentsModel::find()->where([
            'oid' => $oid,
        ])->asArray()->one();

        return $this->render('account-detail-set', [
            'model' => $agents,
        ]);
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

    /**
     * 报表
     *
     * @return string
     */
    public function  actionReport()
    {
        return $this->render('report');
    }

    /**
     * 报表:赛事结果
     *
     * @return string
     */
    public function actionReportResult()
    {
        $today = date('Y-m-d');
        $yesterday = date('Y-m-d', strtotime('-1 day'));
        $tomorrow = date('Y-m-d', strtotime('1 day'));

        $result = [];
        //没有结果
        $ftTodayNoResult = FootMatchModel::find()
            ->where(['between', 'm_start', $today, $tomorrow])
            ->andWhere(new Expression('mid%2=1'))
            ->andWhere(['MB_Inball' => ''])
            ->count();
        //有结果
        $ftTodayResult = FootMatchModel::find()
            ->where(['between', 'm_start', $today, $tomorrow])
            ->andWhere(new Expression('mid%2=1'))
            ->andWhere(['!=', 'MB_Inball', ''])
            ->count();

        //没有结果
        $ftYesterdayNoResult = FootMatchModel::find()
            ->where(['between', 'm_start', $yesterday, $today])
            ->andWhere(new Expression('mid%2=1'))
            ->andWhere(['MB_Inball' => ''])
            ->count();
        //有结果
        $ftYesterdayResult = FootMatchModel::find()
            ->where(['between', 'm_start', $yesterday, $today])
            ->andWhere(new Expression('mid%2=1'))
            ->andWhere(['!=', 'MB_Inball', ''])
            ->count();
        $result['yesterday']['ft'] = [
            $ftYesterdayResult,
            $ftYesterdayNoResult,
        ];

        $result['today']['ft'] = [
            $ftTodayResult,
            $ftTodayNoResult,
        ];


        //有结果
        $bsYesterdayResult = BaskMatchModel::find()
            ->where("mb_mid<100000")
            ->andWhere(['!=', 'MB_Inball', ''])
            ->where(['between', 'm_start', $yesterday, $today])
            ->count();
        $bsYesterdayNoResult = BaskMatchModel::find()
            ->where("mb_mid<100000")
            ->andWhere(['=', 'MB_Inball', ''])
            ->where(['between', 'm_start', $yesterday, $today])
            ->count();
        $bsTodayResult = BaskMatchModel::find()
            ->where("mb_mid<100000")
            ->andWhere(['!=', 'MB_Inball', ''])
            ->where(['between', 'm_start', $today, $tomorrow])
            ->count();
        $bsTodayNoResult = BaskMatchModel::find()
            ->where("mb_mid<100000")
            ->andWhere(['=', 'MB_Inball', ''])
            ->where(['between', 'm_start', $today, $tomorrow])
            ->count();

        $result['yesterday']['bs'] = [
            $bsYesterdayResult,
            $bsYesterdayNoResult,
        ];
        $result['today']['bs'] = [
            $bsTodayResult,
            $bsTodayNoResult,
        ];


        $tsTodayResult = TennisModel::find()
            ->where(['!=', "MB_Inball", ''])
            ->andWhere(['between', 'm_start', $today, $tomorrow])
            ->count();
        $tsTodayNoResult = TennisModel::find()
            ->where(['=', "MB_Inball", ''])
            ->andWhere(['between', 'm_start', $today, $tomorrow])
            ->count();
        $tsYesterdayResult = TennisModel::find()
            ->where(['!=', "MB_Inball", ''])
            ->andWhere(['between', 'm_start', $yesterday, $today])
            ->count();
        $tsYesterdayNoResult = TennisModel::find()
            ->where(['=', "MB_Inball", ''])
            ->andWhere(['between', 'm_start', $yesterday, $today])
            ->count();
        $result['yesterday']['ts'] = [
            $tsYesterdayResult,
            $tsYesterdayNoResult,
        ];
        $result['today']['ts'] = [
            $tsTodayResult,
            $tsTodayNoResult,
        ];

        $voTodayResult = VolleyballModel::find()
            ->where(['!=', "MB_Inball", ''])
            ->andWhere(['between', 'm_start', $today, $tomorrow])
            ->count();
        $voTodayNoResult = VolleyballModel::find()
            ->where(['=', "MB_Inball", ''])
            ->andWhere(['between', 'm_start', $today, $tomorrow])
            ->count();
        $voYesterdayResult = VolleyballModel::find()
            ->where(['!=', "MB_Inball", ''])
            ->andWhere(['between', 'm_start', $yesterday, $today])
            ->count();
        $voYesterdayNoResult = VolleyballModel::find()
            ->where(['=', "MB_Inball", ''])
            ->andWhere(['between', 'm_start', $yesterday, $today])
            ->count();
        $result['yesterday']['vo'] = [
            $voYesterdayResult,
            $voYesterdayNoResult,
        ];
        $result['today']['vo'] = [
            $voTodayResult,
            $voTodayNoResult,
        ];

        $bbTodayResult = BaseballModel::find()
            ->where(['!=', "MB_Inball", ''])
            ->andWhere(['between', 'm_start', $today, $tomorrow])
            ->count();
        $bbTodayNoResult = BaseballModel::find()
            ->where(['=', "MB_Inball", ''])
            ->andWhere(['between', 'm_start', $today, $tomorrow])
            ->count();
        $bbYesterdayResult = BaseballModel::find()
            ->where(['!=', "MB_Inball", ''])
            ->andWhere(['between', 'm_start', $yesterday, $today])
            ->count();
        $bbYesterdayNoResult = BaseballModel::find()
            ->where(['=', "MB_Inball", ''])
            ->andWhere(['between', 'm_start', $yesterday, $today])
            ->count();
        $result['yesterday']['bb'] = [
            $bbYesterdayResult,
            $bbYesterdayNoResult,
        ];
        $result['today']['bb'] = [
            $bbTodayResult,
            $bbTodayNoResult,
        ];

        $spTodayResult = SpMatchModel::find()
            ->where('QQ526738=1')
            ->andWhere(['between', 'mstart', $today, $tomorrow])
            ->count();
        $spTodayNoResult = SpMatchModel::find()
            ->where('QQ526738=0')
            ->andWhere(['between', 'mstart', $today, $tomorrow])
            ->count();
        $spYesterdayResult = SpMatchModel::find()
            ->where('QQ526738=1')
            ->andWhere(['between', 'mstart', $yesterday, $today])
            ->count();
        $spYesterdayNoResult = SpMatchModel::find()
            ->where('QQ526738=0')
            ->andWhere(['between', 'mstart', $yesterday, $today])
            ->count();
        $result['yesterday']['sp'] = [
            $spTodayResult,
            $spTodayNoResult,
        ];
        $result['today']['sp'] = [
            $spYesterdayResult,
            $spYesterdayNoResult,
        ];

        $opTodayResult = OtherPlayModel::find()
            ->where(['!=', "MB_Inball", ''])
            ->andWhere(['between', 'm_start', $today, $tomorrow])
            ->count();
        $opTodayNoResult = OtherPlayModel::find()
            ->where(['=', "MB_Inball", ''])
            ->andWhere(['between', 'm_start', $today, $tomorrow])
            ->count();
        $opYesterdayResult = OtherPlayModel::find()
            ->where(['!=', "MB_Inball", ''])
            ->andWhere(['between', 'm_start', $yesterday, $today])
            ->count();
        $opYesterdayNoResult = OtherPlayModel::find()
            ->where(['=', "MB_Inball", ''])
            ->andWhere(['between', 'm_start', $yesterday, $today])
            ->count();
        $result['yesterday']['op'] = [
            $opYesterdayResult,
            $opYesterdayNoResult,
        ];
        $result['today']['op'] = [
            $opTodayResult,
            $opTodayNoResult,
        ];


        return $this->render('report-result', [
            'result' => $result,
        ]);
    }

    /**
     *
     *
     */
    public function actionRecoveryPassword()
    {
        $member = WebMemberModel::findOne(yii::$app->user->identity->id);
        $member->Passwd = '123456';
        $member->save();
        yii::$app->response->redirect(Url::to('/site/index'));
    }
}

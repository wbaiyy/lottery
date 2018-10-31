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
                'ndate' => date("Y-m-d", $ndate),
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


        return $this->render('announcement', [
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
     * 子帐号
     *
     * @return string
     */
    public function actionAccountSubList()
    {
        $Agname = WebAgentsModel::find()
            ->select('Agname')
            ->where(['Oid' => '', 'subuser' =>0])
            ->asArray()
            ->one();

        $accounts = WebAgentsModel::find()
            ->where(['Agname' => $Agname['Agname'], 'subuser' =>1])
            ->asArray()
            ->all();

        return $this->render('account-sub-list', [
            'result' => $accounts,
        ]);
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
                if ($memberModel->update()) {
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
    public function actionNewestWebsite()
    {
        return $this->render('newest-website');
    }

    /**
     * 报表
     *
     * @return string
     */
    public function actionReport()
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
     * 恢复密码
     *
     * @return string
     */
    public function actionRecoveryPassword()
    {
        $member = WebMemberModel::findOne(yii::$app->user->identity->id);
        $member->Passwd = '123456';
        $member->save();
        yii::$app->response->redirect(Url::to('/site/index'));
    }

    /**
     * 月帐期数表
     *
     * @return string
     */
    public function actionReportSheet()
    {
        $currentYear = date('Y');
        $currentDate = date('Y-m-d');
        $lastYear = $currentYear - 1;

        $step = 27 * 3600 * 24;
        $currentYearStart = '2017-12-25';
        $lastYearStart = '2016-12-26';
        $allData = [];
        for ($i = 1; $i <= 13; $i++) {
            $oneDay = $i > 1 ? 24 * 3600 * ($i - 1) : 0;
            $temp['current'][0] = date('Y-m-d', strtotime($currentYearStart) + $step * ($i - 1) + $oneDay);
            $temp['current'][1] = date('Y-m-d', strtotime($currentYearStart) + $step * ($i) + $oneDay);
            $temp['class'] = '';
            if ($temp['current'][0] < $currentDate && $currentDate < $temp['current'][1]) {
                $temp['class'] = 'now';
            }
            $temp['last'][0] = date('Y-m-d', strtotime($lastYearStart) + $step * ($i - 1) + $oneDay);
            $temp['last'][1] = date('Y-m-d', strtotime($lastYearStart) + $step * ($i) + $oneDay);
            array_push($allData, $temp);
        }

        //var_export($allData);die;
        return $this->render('report-sheet', [
            'result' => $allData,
        ]);
    }

    /**
     * 有结果报表
     *
     * @return string
     */
    public function actionReportSettled()
    {
        if (yii::$app->request->isPost) {
            $report_kind = yii::$app->request->post('report_kind', 'D');
            $pay_type = yii::$app->request->post('pay_type', '');
            $wtype = yii::$app->request->post('wtype', '');
            $date_start = yii::$app->request->post('date_start', '');
            $date_end = yii::$app->request->post('date_end', '');
            $gtype = yii::$app->request->post('gtype', '');
            $cid = yii::$app->request->post('cid', '');
            $aid = yii::$app->request->post('aid', '');
            $sid = yii::$app->request->post('sid', '');
            $mid = yii::$app->request->post('mid', '');
            $uid = yii::$app->request->post('uid', '');
            $result_type = yii::$app->request->post('result_type', 'Y');
            $uid = yii::$app->user->identity->id;

            $row = WebAgentsModel::find()
                ->where(['Oid' => $uid])
                ->asArray()
                ->one();

            if ($row['subuser'] == 1) {
                $agname = $row['subname'];
            } else {
                $agname = $row['Agname'];
            }

            $agid = $row['ID'];
            $super = $row['super'];
            $corprator = $row['corprator'];
            $world = $row['world'];
            $where = $this->getReport($gtype, $wtype, $result_type, $report_kind, $date_start, $date_end, $row['subuser']);

            $sql = "select agents as name, count(*) as coun,sum(betscore) as score,sum(m_result) as result,sum(a_result) as a_result,sum(result_a) as result_a,sum(vgold) as vgold,round(agent_point*0.01,2) as agent_point 
          from web_db_io where " . $where . " and super='{$super}' and Agents='{$agname}' and pay_type=1 group by agents order by name asc";

            $connection  = Yii::$app->db;
            $command = $connection->createCommand($sql);
            $result     = $command->queryAll();

            return $this->render('report-settled-result', [
                'result' => $result,
            ]);
        }

        return $this->render('report-settled', [
        ]);
    }

    /**
     * 无结果报表
     *
     * @return string
     */
    public function actionReportUnSettled()
    {
        if (yii::$app->request->isPost) {
            $report_kind = yii::$app->request->post('report_kind', 'D');
            $pay_type = yii::$app->request->post('pay_type', '');
            $wtype = yii::$app->request->post('wtype', '');
            $date_start = yii::$app->request->post('date_start', '');
            $date_end = yii::$app->request->post('date_end', '');
            $gtype = yii::$app->request->post('gtype', '');
            $cid = yii::$app->request->post('cid', '');
            $aid = yii::$app->request->post('aid', '');
            $sid = yii::$app->request->post('sid', '');
            $mid = yii::$app->request->post('mid', '');
            $result_type = yii::$app->request->post('result_type', 'N');
            $uid = yii::$app->user->identity->id;

            $row = WebAgentsModel::find()
                ->where(['Oid' => $uid])
                ->asArray()
                ->one();

            if ($row['subuser'] == 1) {
                $agname = $row['subname'];
            } else {
                $agname = $row['Agname'];
            }

            $agid = $row['ID'];
            $super = $row['super'];
            $corprator = $row['corprator'];
            $world = $row['world'];
            $where = $this->getReport($gtype, $wtype, $result_type, $report_kind, $date_start, $date_end, $row['subuser']);

            $sql = "select agents as name, count(*) as coun,sum(betscore) as score,sum(m_result) as result,sum(a_result) as a_result,sum(result_a) as result_a,sum(vgold) as vgold,round(agent_point*0.01,2) as agent_point 
          from web_db_io where " . $where . " and super='{$super}' and Agents='{$agname}' and pay_type=1 group by agents order by name asc";

            $connection  = Yii::$app->db;
            $command = $connection->createCommand($sql);
            $result     = $command->queryAll();

            return $this->render('report-un-settled-result', [
                'result' => $result,
            ]);
        }

        return $this->render('report-un-settled', [
        ]);
    }

    private function getReport($gtype, $wtype, $result_type, $report_kind, $date_start, $date_end, $subuser)
    {
        switch ($gtype) {
            case 'FT':
                $active = ' active<3 and ';
                break;
            case 'BK':
                $active = ' active=3 and ';
                break;
            case 'TN':
                $active = ' active=4 and ';
                break;
            case 'VB':
                $active = ' active=5 and ';
                break;
            case 'BS':
                $active = ' active=7 and ';
                break;
            case 'FS':
                $active = ' active=6 and ';
                break;
            case 'OP':
                $active = ' active=8 and ';
                break;
            default:
                $active = '';
                break;
        }

        if ($wtype != '') {
            $w_type = " wtype='$wtype' and ";
        } else {
            $w_type = '';
        }

        if ($subuser == 0) {
            if ($result_type == 'Y') {
                $result_type1 = " result_type=1 and ";
            } else {
                $result_type1 = " result_type=0 and ";
            }
        } else {
            $result_type1 = " result_type=1 and ";
        }

        switch ($report_kind) {
            case "D":
                $cancel = ' status>1 and ';
                break;
            case "D4":
                $cancel = ' status=1 and ';
                break;
            default:
                $cancel = '';
                break;
        }
        return $active . $w_type . $result_type1 . $cancel . " m_date>='$date_start' and  hidden=0 and m_date<='$date_end' ";
    }
}

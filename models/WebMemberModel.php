<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "{{%web_member}}".
 *
 * @property string $ID
 * @property string $Oid
 * @property string $Memname
 * @property string $loginname
 * @property string $Passwd
 * @property integer $ischeck
 * @property string $bank_account_name
 * @property string $bank
 * @property string $bank_khname
 * @property string $bank_account
 * @property string $answer
 * @property string $askvalue
 * @property string $withdrawalpassword
 * @property string $withdrawalname
 * @property string $email
 * @property string $phone
 * @property integer $sex
 * @property string $Money
 * @property string $Credit
 * @property string $Alias
 * @property string $LogDate
 * @property string $domain
 * @property string $AddDate
 * @property string $language
 * @property string $Active
 * @property string $LogIP
 * @property string $setip
 * @property string $Agents
 * @property string $corprator
 * @property string $world
 * @property string $super
 * @property integer $pay_type
 * @property integer $Status
 * @property integer $edtvou
 * @property integer $BetType
 * @property string $OpenType
 * @property string $CurType
 * @property integer $FT_R_Scene
 * @property integer $FT_RE_Scene
 * @property string $FT_ROU_Scene
 * @property integer $FT_M_Scene
 * @property integer $FT_OU_Scene
 * @property integer $FT_PD_Scene
 * @property integer $FT_T_Scene
 * @property integer $FT_EO_Scene
 * @property integer $FT_P_Scene
 * @property integer $FT_PR_Scene
 * @property integer $FT_F_Scene
 * @property integer $FT_M_Bet
 * @property integer $FT_R_Bet
 * @property integer $FT_OU_Bet
 * @property integer $FT_RE_Bet
 * @property string $FT_ROU_Bet
 * @property integer $FT_T_Bet
 * @property integer $FT_EO_Bet
 * @property integer $FT_PD_Bet
 * @property integer $FT_F_Bet
 * @property integer $FT_P_Bet
 * @property integer $FT_PR_Bet
 * @property string $FT_Turn_R
 * @property string $FT_Turn_OU
 * @property string $FT_Turn_M
 * @property string $FT_Turn_RE
 * @property string $FT_Turn_ROU
 * @property string $FT_Turn_PD
 * @property string $FT_Turn_T
 * @property string $FT_Turn_EO
 * @property string $FT_Turn_F
 * @property string $FT_Turn_P
 * @property string $FT_Turn_PR
 * @property string $TN_R_Bet
 * @property string $TN_RE_Bet
 * @property string $TN_ROU_Bet
 * @property string $TN_OU_Bet
 * @property string $TN_M_Bet
 * @property string $TN_T_Bet
 * @property string $TN_EO_Bet
 * @property string $TN_P_Bet
 * @property string $TN_PR_Bet
 * @property string $TN_PD_Bet
 * @property string $TN_F_Bet
 * @property string $TN_R_Scene
 * @property string $TN_OU_Scene
 * @property string $TN_RE_Scene
 * @property string $TN_ROU_Scene
 * @property string $TN_M_Scene
 * @property string $TN_EO_Scene
 * @property string $TN_T_Scene
 * @property string $TN_PD_Scene
 * @property string $TN_F_Scene
 * @property string $TN_P_Scene
 * @property string $TN_PR_Scene
 * @property string $TN_Turn_R
 * @property string $TN_Turn_OU
 * @property string $TN_Turn_RE
 * @property string $TN_Turn_ROU
 * @property string $TN_Turn_M
 * @property string $TN_Turn_T
 * @property string $TN_Turn_EO
 * @property string $TN_Turn_PD
 * @property string $TN_Turn_F
 * @property string $TN_Turn_P
 * @property string $TN_Turn_PR
 * @property string $VB_Turn_R
 * @property string $VB_Turn_OU
 * @property string $VB_Turn_ROU
 * @property string $VB_Turn_RE
 * @property string $VB_Turn_EO
 * @property string $VB_Turn_M
 * @property string $VB_Turn_T
 * @property string $VB_Turn_PD
 * @property string $VB_Turn_F
 * @property string $VB_Turn_PR
 * @property string $VB_Turn_P
 * @property string $BK_Turn_R
 * @property string $BK_Turn_EO
 * @property string $BK_Turn_OU
 * @property string $BK_Turn_PR
 * @property string $BK_R_Scene
 * @property string $BK_EO_Scene
 * @property string $BK_OU_Scene
 * @property string $BK_PR_Scene
 * @property string $BK_R_Bet
 * @property string $BK_EO_Bet
 * @property string $BK_OU_Bet
 * @property string $BK_PR_Bet
 * @property string $agent_rate
 * @property string $world_rate
 * @property string $agent_point
 * @property string $world_point
 * @property string $ratio
 * @property string $VB_R_Bet
 * @property string $VB_RE_Bet
 * @property string $VB_ROU_Bet
 * @property string $VB_OU_Bet
 * @property string $VB_M_Bet
 * @property string $VB_T_Bet
 * @property string $VB_EO_Bet
 * @property string $VB_P_Bet
 * @property string $VB_PR_Bet
 * @property string $VB_PD_Bet
 * @property string $VB_F_Bet
 * @property string $VB_R_Scene
 * @property string $VB_OU_Scene
 * @property string $VB_RE_Scene
 * @property string $VB_ROU_Scene
 * @property string $VB_M_Scene
 * @property string $VB_EO_Scene
 * @property string $VB_T_Scene
 * @property string $VB_PD_Scene
 * @property string $VB_F_Scene
 * @property string $VB_P_Scene
 * @property string $VB_PR_Scene
 * @property string $FT_HRE_Scene
 * @property string $FT_HRE_Bet
 * @property string $FS_R_Bet
 * @property string $FS_R_Scene
 * @property string $FS_Turn_R
 * @property string $BK_Turn_RE
 * @property string $BK_Turn_ROU
 * @property string $BK_RE_Scene
 * @property string $BK_RE_Bet
 * @property string $BK_ROU_Scene
 * @property string $BK_ROU_Bet
 * @property string $lastpawd
 * @property integer $hidden
 * @property integer $hiddenstatus
 * @property integer $cancel
 * @property integer $pretick
 * @property integer $tick
 * @property integer $FT_PC_Bet
 * @property integer $FT_PC_Scene
 * @property integer $FT_Turn_PC
 * @property integer $BS_R_Scene
 * @property integer $BS_R_Bet
 * @property integer $BS_OU_Scene
 * @property integer $BS_OU_Bet
 * @property integer $BS_M_Scene
 * @property integer $BS_M_Bet
 * @property integer $BS_EO_Scene
 * @property integer $BS_EO_Bet
 * @property integer $BS_T_Scene
 * @property integer $BS_T_Bet
 * @property integer $BS_P_Scene
 * @property integer $BS_P_Bet
 * @property integer $BS_PR_Scene
 * @property integer $BS_PR_Bet
 * @property integer $BS_PC_Scene
 * @property integer $BS_PC_Bet
 * @property integer $BS_PD_Scene
 * @property integer $BS_PD_Bet
 * @property string $BS_Turn_OU
 * @property string $BS_Turn_M
 * @property integer $BS_RE_Scene
 * @property integer $BS_RE_Bet
 * @property string $BS_Turn_RE
 * @property integer $BS_ROU_Scene
 * @property integer $BS_ROU_Bet
 * @property string $BS_Turn_ROU
 * @property string $BS_Turn_EO
 * @property string $BS_Turn_P
 * @property string $BS_Turn_PR
 * @property string $BS_Turn_PC
 * @property string $BS_Turn_PD
 * @property string $BS_Turn_T
 * @property string $BS_Turn_R
 * @property string $FT_RM_Bet
 * @property string $FT_RM_Scene
 * @property string $FT_Turn_RM
 * @property integer $OP_R_Bet
 * @property integer $OP_RE_Bet
 * @property integer $OP_ROU_Bet
 * @property integer $OP_OU_Bet
 * @property integer $OP_M_Bet
 * @property integer $OP_T_Bet
 * @property integer $OP_EO_Bet
 * @property integer $OP_P_Bet
 * @property integer $OP_PR_Bet
 * @property integer $OP_PD_Bet
 * @property integer $OP_F_Bet
 * @property integer $OP_R_Scene
 * @property integer $OP_OU_Scene
 * @property integer $OP_RE_Scene
 * @property integer $OP_ROU_Scene
 * @property integer $OP_M_Scene
 * @property integer $OP_EO_Scene
 * @property integer $OP_T_Scene
 * @property integer $OP_PD_Scene
 * @property integer $OP_F_Scene
 * @property integer $OP_P_Scene
 * @property integer $OP_PR_Scene
 * @property string $OP_Turn_R
 * @property string $OP_Turn_OU
 * @property string $OP_Turn_RE
 * @property string $OP_Turn_ROU
 * @property string $OP_Turn_M
 * @property string $OP_Turn_T
 * @property string $OP_Turn_EO
 * @property string $OP_Turn_PD
 * @property string $OP_Turn_F
 * @property string $OP_Turn_P
 * @property string $OP_Turn_PR
 * @property integer $TN_PC_Scene
 * @property integer $TN_PC_Bet
 * @property string $TN_Turn_PC
 * @property integer $VB_PC_Scene
 * @property integer $VB_PC_Bet
 * @property string $VB_Turn_PC
 * @property integer $BK_PC_Scene
 * @property integer $BK_PC_Bet
 * @property string $BK_Turn_PC
 * @property integer $OP_PC_Scene
 * @property integer $OP_PC_Bet
 * @property string $OP_Turn_PC
 * @property integer $m
 * @property integer $r
 * @property integer $ou
 * @property integer $pd
 * @property integer $t
 * @property integer $f
 * @property integer $p
 * @property integer $fs
 * @property integer $max
 * @property integer $Online
 * @property string $OnlineTime
 * @property string $notes
 * @property string $address
 * @property string $Admin
 */
class WebMemberModel extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%web_member}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ischeck', 'sex', 'Money', 'Credit', 'pay_type', 'Status', 'edtvou', 'BetType', 'FT_R_Scene', 'FT_RE_Scene', 'FT_M_Scene', 'FT_OU_Scene', 'FT_PD_Scene', 'FT_T_Scene', 'FT_EO_Scene', 'FT_P_Scene', 'FT_PR_Scene', 'FT_F_Scene', 'FT_M_Bet', 'FT_R_Bet', 'FT_OU_Bet', 'FT_RE_Bet', 'FT_T_Bet', 'FT_EO_Bet', 'FT_PD_Bet', 'FT_F_Bet', 'FT_P_Bet', 'FT_PR_Bet', 'hidden', 'hiddenstatus', 'cancel', 'pretick', 'tick', 'FT_PC_Bet', 'FT_PC_Scene', 'FT_Turn_PC', 'BS_R_Scene', 'BS_R_Bet', 'BS_OU_Scene', 'BS_OU_Bet', 'BS_M_Scene', 'BS_M_Bet', 'BS_EO_Scene', 'BS_EO_Bet', 'BS_T_Scene', 'BS_T_Bet', 'BS_P_Scene', 'BS_P_Bet', 'BS_PR_Scene', 'BS_PR_Bet', 'BS_PC_Scene', 'BS_PC_Bet', 'BS_PD_Scene', 'BS_PD_Bet', 'BS_RE_Scene', 'BS_RE_Bet', 'BS_ROU_Scene', 'BS_ROU_Bet', 'OP_R_Bet', 'OP_RE_Bet', 'OP_ROU_Bet', 'OP_OU_Bet', 'OP_M_Bet', 'OP_T_Bet', 'OP_EO_Bet', 'OP_P_Bet', 'OP_PR_Bet', 'OP_PD_Bet', 'OP_F_Bet', 'OP_R_Scene', 'OP_OU_Scene', 'OP_RE_Scene', 'OP_ROU_Scene', 'OP_M_Scene', 'OP_EO_Scene', 'OP_T_Scene', 'OP_PD_Scene', 'OP_F_Scene', 'OP_P_Scene', 'OP_PR_Scene', 'TN_PC_Scene', 'TN_PC_Bet', 'VB_PC_Scene', 'VB_PC_Bet', 'BK_PC_Scene', 'BK_PC_Bet', 'OP_PC_Scene', 'OP_PC_Bet', 'm', 'r', 'ou', 'pd', 't', 'f', 'p', 'fs', 'max', 'Online'], 'integer'],
            [['LogDate', 'AddDate', 'Active', 'lastpawd', 'OnlineTime'], 'safe'],
            [['notes'], 'string'],
            [['Oid', 'LogIP', 'setip'], 'string', 'max' => 32],
            [['Memname', 'loginname', 'Passwd', 'address'], 'string', 'max' => 100],
            [['bank_account_name', 'bank', 'bank_khname', 'bank_account', 'answer', 'askvalue', 'withdrawalpassword', 'withdrawalname', 'email', 'phone'], 'string', 'max' => 80],
            [['Alias', 'domain'], 'string', 'max' => 200],
            [['language', 'Agents', 'corprator', 'world', 'super', 'CurType', 'FT_ROU_Scene', 'FT_ROU_Bet', 'TN_R_Bet', 'TN_RE_Bet', 'TN_ROU_Bet', 'TN_OU_Bet', 'TN_M_Bet', 'TN_T_Bet', 'TN_EO_Bet', 'TN_P_Bet', 'TN_PR_Bet', 'TN_PD_Bet', 'TN_F_Bet', 'TN_R_Scene', 'TN_OU_Scene', 'TN_RE_Scene', 'TN_ROU_Scene', 'TN_M_Scene', 'TN_EO_Scene', 'TN_T_Scene', 'TN_PD_Scene', 'TN_F_Scene', 'TN_P_Scene', 'TN_PR_Scene', 'BK_R_Scene', 'BK_EO_Scene', 'BK_OU_Scene', 'BK_PR_Scene', 'BK_R_Bet', 'BK_EO_Bet', 'BK_OU_Bet', 'BK_PR_Bet', 'ratio', 'VB_R_Bet', 'VB_RE_Bet', 'VB_ROU_Bet', 'VB_OU_Bet', 'VB_M_Bet', 'VB_T_Bet', 'VB_EO_Bet', 'VB_P_Bet', 'VB_PR_Bet', 'VB_PD_Bet', 'VB_F_Bet', 'VB_R_Scene', 'VB_OU_Scene', 'VB_RE_Scene', 'VB_ROU_Scene', 'VB_M_Scene', 'VB_EO_Scene', 'VB_T_Scene', 'VB_PD_Scene', 'VB_F_Scene', 'VB_P_Scene', 'VB_PR_Scene', 'FT_HRE_Scene', 'FT_HRE_Bet', 'BK_RE_Scene', 'BK_RE_Bet', 'BK_ROU_Scene', 'BK_ROU_Bet', 'Admin'], 'string', 'max' => 10],
            [['OpenType'], 'string', 'max' => 1],
            [['FT_Turn_R', 'FT_Turn_OU', 'FT_Turn_M', 'FT_Turn_RE', 'FT_Turn_ROU', 'FT_Turn_PD', 'FT_Turn_T', 'FT_Turn_EO', 'FT_Turn_F', 'FT_Turn_P', 'FT_Turn_PR', 'TN_Turn_R', 'TN_Turn_OU', 'TN_Turn_RE', 'TN_Turn_ROU', 'TN_Turn_M', 'TN_Turn_T', 'TN_Turn_EO', 'TN_Turn_PD', 'TN_Turn_F', 'TN_Turn_P', 'TN_Turn_PR', 'VB_Turn_R', 'VB_Turn_OU', 'VB_Turn_ROU', 'VB_Turn_RE', 'VB_Turn_EO', 'VB_Turn_M', 'VB_Turn_T', 'VB_Turn_PD', 'VB_Turn_F', 'VB_Turn_PR', 'VB_Turn_P', 'BK_Turn_R', 'BK_Turn_EO', 'BK_Turn_OU', 'BK_Turn_PR', 'agent_rate', 'world_rate', 'agent_point', 'world_point', 'BK_Turn_RE', 'BK_Turn_ROU', 'BS_Turn_OU', 'BS_Turn_M', 'BS_Turn_RE', 'BS_Turn_ROU', 'BS_Turn_EO', 'BS_Turn_P', 'BS_Turn_PR', 'BS_Turn_PC', 'BS_Turn_PD', 'BS_Turn_T', 'BS_Turn_R', 'FT_Turn_RM', 'OP_Turn_R', 'OP_Turn_OU', 'OP_Turn_RE', 'OP_Turn_ROU', 'OP_Turn_M', 'OP_Turn_T', 'OP_Turn_EO', 'OP_Turn_PD', 'OP_Turn_F', 'OP_Turn_P', 'OP_Turn_PR', 'TN_Turn_PC', 'VB_Turn_PC', 'BK_Turn_PC', 'OP_Turn_PC'], 'string', 'max' => 5],
            [['FS_R_Bet', 'FS_R_Scene'], 'string', 'max' => 6],
            [['FS_Turn_R'], 'string', 'max' => 2],
            [['FT_RM_Bet', 'FT_RM_Scene'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'Oid' => 'Oid',
            'Memname' => 'Memname',
            'loginname' => 'Loginname',
            'Passwd' => 'Passwd',
            'ischeck' => 'Ischeck',
            'bank_account_name' => 'Bank Account Name',
            'bank' => 'Bank',
            'bank_khname' => 'Bank Khname',
            'bank_account' => 'Bank Account',
            'answer' => 'Answer',
            'askvalue' => 'Askvalue',
            'withdrawalpassword' => 'Withdrawalpassword',
            'withdrawalname' => 'Withdrawalname',
            'email' => 'Email',
            'phone' => 'Phone',
            'sex' => 'Sex',
            'Money' => 'Money',
            'Credit' => 'Credit',
            'Alias' => 'Alias',
            'LogDate' => 'Log Date',
            'domain' => 'Domain',
            'AddDate' => 'Add Date',
            'language' => 'Language',
            'Active' => 'Active',
            'LogIP' => 'Log Ip',
            'setip' => 'Setip',
            'Agents' => 'Agents',
            'corprator' => 'Corprator',
            'world' => 'World',
            'super' => 'Super',
            'pay_type' => 'Pay Type',
            'Status' => 'Status',
            'edtvou' => 'Edtvou',
            'BetType' => 'Bet Type',
            'OpenType' => 'Open Type',
            'CurType' => 'Cur Type',
            'FT_R_Scene' => 'Ft  R  Scene',
            'FT_RE_Scene' => 'Ft  Re  Scene',
            'FT_ROU_Scene' => 'Ft  Rou  Scene',
            'FT_M_Scene' => 'Ft  M  Scene',
            'FT_OU_Scene' => 'Ft  Ou  Scene',
            'FT_PD_Scene' => 'Ft  Pd  Scene',
            'FT_T_Scene' => 'Ft  T  Scene',
            'FT_EO_Scene' => 'Ft  Eo  Scene',
            'FT_P_Scene' => 'Ft  P  Scene',
            'FT_PR_Scene' => 'Ft  Pr  Scene',
            'FT_F_Scene' => 'Ft  F  Scene',
            'FT_M_Bet' => 'Ft  M  Bet',
            'FT_R_Bet' => 'Ft  R  Bet',
            'FT_OU_Bet' => 'Ft  Ou  Bet',
            'FT_RE_Bet' => 'Ft  Re  Bet',
            'FT_ROU_Bet' => 'Ft  Rou  Bet',
            'FT_T_Bet' => 'Ft  T  Bet',
            'FT_EO_Bet' => 'Ft  Eo  Bet',
            'FT_PD_Bet' => 'Ft  Pd  Bet',
            'FT_F_Bet' => 'Ft  F  Bet',
            'FT_P_Bet' => 'Ft  P  Bet',
            'FT_PR_Bet' => 'Ft  Pr  Bet',
            'FT_Turn_R' => 'Ft  Turn  R',
            'FT_Turn_OU' => 'Ft  Turn  Ou',
            'FT_Turn_M' => 'Ft  Turn  M',
            'FT_Turn_RE' => 'Ft  Turn  Re',
            'FT_Turn_ROU' => 'Ft  Turn  Rou',
            'FT_Turn_PD' => 'Ft  Turn  Pd',
            'FT_Turn_T' => 'Ft  Turn  T',
            'FT_Turn_EO' => 'Ft  Turn  Eo',
            'FT_Turn_F' => 'Ft  Turn  F',
            'FT_Turn_P' => 'Ft  Turn  P',
            'FT_Turn_PR' => 'Ft  Turn  Pr',
            'TN_R_Bet' => 'Tn  R  Bet',
            'TN_RE_Bet' => 'Tn  Re  Bet',
            'TN_ROU_Bet' => 'Tn  Rou  Bet',
            'TN_OU_Bet' => 'Tn  Ou  Bet',
            'TN_M_Bet' => 'Tn  M  Bet',
            'TN_T_Bet' => 'Tn  T  Bet',
            'TN_EO_Bet' => 'Tn  Eo  Bet',
            'TN_P_Bet' => 'Tn  P  Bet',
            'TN_PR_Bet' => 'Tn  Pr  Bet',
            'TN_PD_Bet' => 'Tn  Pd  Bet',
            'TN_F_Bet' => 'Tn  F  Bet',
            'TN_R_Scene' => 'Tn  R  Scene',
            'TN_OU_Scene' => 'Tn  Ou  Scene',
            'TN_RE_Scene' => 'Tn  Re  Scene',
            'TN_ROU_Scene' => 'Tn  Rou  Scene',
            'TN_M_Scene' => 'Tn  M  Scene',
            'TN_EO_Scene' => 'Tn  Eo  Scene',
            'TN_T_Scene' => 'Tn  T  Scene',
            'TN_PD_Scene' => 'Tn  Pd  Scene',
            'TN_F_Scene' => 'Tn  F  Scene',
            'TN_P_Scene' => 'Tn  P  Scene',
            'TN_PR_Scene' => 'Tn  Pr  Scene',
            'TN_Turn_R' => 'Tn  Turn  R',
            'TN_Turn_OU' => 'Tn  Turn  Ou',
            'TN_Turn_RE' => 'Tn  Turn  Re',
            'TN_Turn_ROU' => 'Tn  Turn  Rou',
            'TN_Turn_M' => 'Tn  Turn  M',
            'TN_Turn_T' => 'Tn  Turn  T',
            'TN_Turn_EO' => 'Tn  Turn  Eo',
            'TN_Turn_PD' => 'Tn  Turn  Pd',
            'TN_Turn_F' => 'Tn  Turn  F',
            'TN_Turn_P' => 'Tn  Turn  P',
            'TN_Turn_PR' => 'Tn  Turn  Pr',
            'VB_Turn_R' => 'Vb  Turn  R',
            'VB_Turn_OU' => 'Vb  Turn  Ou',
            'VB_Turn_ROU' => 'Vb  Turn  Rou',
            'VB_Turn_RE' => 'Vb  Turn  Re',
            'VB_Turn_EO' => 'Vb  Turn  Eo',
            'VB_Turn_M' => 'Vb  Turn  M',
            'VB_Turn_T' => 'Vb  Turn  T',
            'VB_Turn_PD' => 'Vb  Turn  Pd',
            'VB_Turn_F' => 'Vb  Turn  F',
            'VB_Turn_PR' => 'Vb  Turn  Pr',
            'VB_Turn_P' => 'Vb  Turn  P',
            'BK_Turn_R' => 'Bk  Turn  R',
            'BK_Turn_EO' => 'Bk  Turn  Eo',
            'BK_Turn_OU' => 'Bk  Turn  Ou',
            'BK_Turn_PR' => 'Bk  Turn  Pr',
            'BK_R_Scene' => 'Bk  R  Scene',
            'BK_EO_Scene' => 'Bk  Eo  Scene',
            'BK_OU_Scene' => 'Bk  Ou  Scene',
            'BK_PR_Scene' => 'Bk  Pr  Scene',
            'BK_R_Bet' => 'Bk  R  Bet',
            'BK_EO_Bet' => 'Bk  Eo  Bet',
            'BK_OU_Bet' => 'Bk  Ou  Bet',
            'BK_PR_Bet' => 'Bk  Pr  Bet',
            'agent_rate' => 'Agent Rate',
            'world_rate' => 'World Rate',
            'agent_point' => 'Agent Point',
            'world_point' => 'World Point',
            'ratio' => 'Ratio',
            'VB_R_Bet' => 'Vb  R  Bet',
            'VB_RE_Bet' => 'Vb  Re  Bet',
            'VB_ROU_Bet' => 'Vb  Rou  Bet',
            'VB_OU_Bet' => 'Vb  Ou  Bet',
            'VB_M_Bet' => 'Vb  M  Bet',
            'VB_T_Bet' => 'Vb  T  Bet',
            'VB_EO_Bet' => 'Vb  Eo  Bet',
            'VB_P_Bet' => 'Vb  P  Bet',
            'VB_PR_Bet' => 'Vb  Pr  Bet',
            'VB_PD_Bet' => 'Vb  Pd  Bet',
            'VB_F_Bet' => 'Vb  F  Bet',
            'VB_R_Scene' => 'Vb  R  Scene',
            'VB_OU_Scene' => 'Vb  Ou  Scene',
            'VB_RE_Scene' => 'Vb  Re  Scene',
            'VB_ROU_Scene' => 'Vb  Rou  Scene',
            'VB_M_Scene' => 'Vb  M  Scene',
            'VB_EO_Scene' => 'Vb  Eo  Scene',
            'VB_T_Scene' => 'Vb  T  Scene',
            'VB_PD_Scene' => 'Vb  Pd  Scene',
            'VB_F_Scene' => 'Vb  F  Scene',
            'VB_P_Scene' => 'Vb  P  Scene',
            'VB_PR_Scene' => 'Vb  Pr  Scene',
            'FT_HRE_Scene' => 'Ft  Hre  Scene',
            'FT_HRE_Bet' => 'Ft  Hre  Bet',
            'FS_R_Bet' => 'Fs  R  Bet',
            'FS_R_Scene' => 'Fs  R  Scene',
            'FS_Turn_R' => 'Fs  Turn  R',
            'BK_Turn_RE' => 'Bk  Turn  Re',
            'BK_Turn_ROU' => 'Bk  Turn  Rou',
            'BK_RE_Scene' => 'Bk  Re  Scene',
            'BK_RE_Bet' => 'Bk  Re  Bet',
            'BK_ROU_Scene' => 'Bk  Rou  Scene',
            'BK_ROU_Bet' => 'Bk  Rou  Bet',
            'lastpawd' => 'Lastpawd',
            'hidden' => 'Hidden',
            'hiddenstatus' => 'Hiddenstatus',
            'cancel' => 'Cancel',
            'pretick' => 'Pretick',
            'tick' => 'Tick',
            'FT_PC_Bet' => 'Ft  Pc  Bet',
            'FT_PC_Scene' => 'Ft  Pc  Scene',
            'FT_Turn_PC' => 'Ft  Turn  Pc',
            'BS_R_Scene' => 'Bs  R  Scene',
            'BS_R_Bet' => 'Bs  R  Bet',
            'BS_OU_Scene' => 'Bs  Ou  Scene',
            'BS_OU_Bet' => 'Bs  Ou  Bet',
            'BS_M_Scene' => 'Bs  M  Scene',
            'BS_M_Bet' => 'Bs  M  Bet',
            'BS_EO_Scene' => 'Bs  Eo  Scene',
            'BS_EO_Bet' => 'Bs  Eo  Bet',
            'BS_T_Scene' => 'Bs  T  Scene',
            'BS_T_Bet' => 'Bs  T  Bet',
            'BS_P_Scene' => 'Bs  P  Scene',
            'BS_P_Bet' => 'Bs  P  Bet',
            'BS_PR_Scene' => 'Bs  Pr  Scene',
            'BS_PR_Bet' => 'Bs  Pr  Bet',
            'BS_PC_Scene' => 'Bs  Pc  Scene',
            'BS_PC_Bet' => 'Bs  Pc  Bet',
            'BS_PD_Scene' => 'Bs  Pd  Scene',
            'BS_PD_Bet' => 'Bs  Pd  Bet',
            'BS_Turn_OU' => 'Bs  Turn  Ou',
            'BS_Turn_M' => 'Bs  Turn  M',
            'BS_RE_Scene' => 'Bs  Re  Scene',
            'BS_RE_Bet' => 'Bs  Re  Bet',
            'BS_Turn_RE' => 'Bs  Turn  Re',
            'BS_ROU_Scene' => 'Bs  Rou  Scene',
            'BS_ROU_Bet' => 'Bs  Rou  Bet',
            'BS_Turn_ROU' => 'Bs  Turn  Rou',
            'BS_Turn_EO' => 'Bs  Turn  Eo',
            'BS_Turn_P' => 'Bs  Turn  P',
            'BS_Turn_PR' => 'Bs  Turn  Pr',
            'BS_Turn_PC' => 'Bs  Turn  Pc',
            'BS_Turn_PD' => 'Bs  Turn  Pd',
            'BS_Turn_T' => 'Bs  Turn  T',
            'BS_Turn_R' => 'Bs  Turn  R',
            'FT_RM_Bet' => 'Ft  Rm  Bet',
            'FT_RM_Scene' => 'Ft  Rm  Scene',
            'FT_Turn_RM' => 'Ft  Turn  Rm',
            'OP_R_Bet' => 'Op  R  Bet',
            'OP_RE_Bet' => 'Op  Re  Bet',
            'OP_ROU_Bet' => 'Op  Rou  Bet',
            'OP_OU_Bet' => 'Op  Ou  Bet',
            'OP_M_Bet' => 'Op  M  Bet',
            'OP_T_Bet' => 'Op  T  Bet',
            'OP_EO_Bet' => 'Op  Eo  Bet',
            'OP_P_Bet' => 'Op  P  Bet',
            'OP_PR_Bet' => 'Op  Pr  Bet',
            'OP_PD_Bet' => 'Op  Pd  Bet',
            'OP_F_Bet' => 'Op  F  Bet',
            'OP_R_Scene' => 'Op  R  Scene',
            'OP_OU_Scene' => 'Op  Ou  Scene',
            'OP_RE_Scene' => 'Op  Re  Scene',
            'OP_ROU_Scene' => 'Op  Rou  Scene',
            'OP_M_Scene' => 'Op  M  Scene',
            'OP_EO_Scene' => 'Op  Eo  Scene',
            'OP_T_Scene' => 'Op  T  Scene',
            'OP_PD_Scene' => 'Op  Pd  Scene',
            'OP_F_Scene' => 'Op  F  Scene',
            'OP_P_Scene' => 'Op  P  Scene',
            'OP_PR_Scene' => 'Op  Pr  Scene',
            'OP_Turn_R' => 'Op  Turn  R',
            'OP_Turn_OU' => 'Op  Turn  Ou',
            'OP_Turn_RE' => 'Op  Turn  Re',
            'OP_Turn_ROU' => 'Op  Turn  Rou',
            'OP_Turn_M' => 'Op  Turn  M',
            'OP_Turn_T' => 'Op  Turn  T',
            'OP_Turn_EO' => 'Op  Turn  Eo',
            'OP_Turn_PD' => 'Op  Turn  Pd',
            'OP_Turn_F' => 'Op  Turn  F',
            'OP_Turn_P' => 'Op  Turn  P',
            'OP_Turn_PR' => 'Op  Turn  Pr',
            'TN_PC_Scene' => 'Tn  Pc  Scene',
            'TN_PC_Bet' => 'Tn  Pc  Bet',
            'TN_Turn_PC' => 'Tn  Turn  Pc',
            'VB_PC_Scene' => 'Vb  Pc  Scene',
            'VB_PC_Bet' => 'Vb  Pc  Bet',
            'VB_Turn_PC' => 'Vb  Turn  Pc',
            'BK_PC_Scene' => 'Bk  Pc  Scene',
            'BK_PC_Bet' => 'Bk  Pc  Bet',
            'BK_Turn_PC' => 'Bk  Turn  Pc',
            'OP_PC_Scene' => 'Op  Pc  Scene',
            'OP_PC_Bet' => 'Op  Pc  Bet',
            'OP_Turn_PC' => 'Op  Turn  Pc',
            'm' => 'M',
            'r' => 'R',
            'ou' => 'Ou',
            'pd' => 'Pd',
            't' => 'T',
            'f' => 'F',
            'p' => 'P',
            'fs' => 'Fs',
            'max' => 'Max',
            'Online' => 'Online',
            'OnlineTime' => 'Online Time',
            'notes' => 'Notes',
            'address' => 'Address',
            'Admin' => 'Admin',
        ];
    }

    /**
     * Finds an identity by the given ID.
     * @param string|integer $id the ID to be looked for
     * @return IdentityInterface the identity object that matches the given ID.
     * Null should be returned if such an identity cannot be found
     * or the identity is not in an active state (disabled, deleted, etc.)
     */
    public static function findIdentity($id)
    {
        return is_numeric($id) ? static::findOne($id) : null;
    }

    /**
     * Finds an identity by the given token.
     * @param mixed $token the token to be looked for
     * @param mixed $type the type of the token. The value of this parameter depends on the implementation.
     * For example, [[\yii\filters\auth\HttpBearerAuth]] will set this parameter to be `yii\filters\auth\HttpBearerAuth`.
     * @return IdentityInterface the identity object that matches the given token.
     * Null should be returned if such an identity cannot be found
     * or the identity is not in an active state (disabled, deleted, etc.)
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        // TODO: Implement findIdentityByAccessToken() method.
    }

    /**
     * Returns an ID that can uniquely identify a user identity.
     * @return string|integer an ID that uniquely identifies a user identity.
     */
    public function getId()
    {
        return $this->ID;
        // TODO: Implement getId() method.
    }

    /**
     * Returns a key that can be used to check the validity of a given identity ID.
     *
     * The key should be unique for each individual user, and should be persistent
     * so that it can be used to check the validity of the user identity.
     *
     * The space of such keys should be big enough to defeat potential identity attacks.
     *
     * This is required if [[User::enableAutoLogin]] is enabled.
     * @return string a key that is used to check the validity of a given identity ID.
     * @see validateAuthKey()
     */
    public function getAuthKey()
    {
        return '';
        // TODO: Implement getAuthKey() method.
    }

    /**
     * Validates the given auth key.
     *
     * This is required if [[User::enableAutoLogin]] is enabled.
     * @param string $authKey the given auth key
     * @return boolean whether the given auth key is valid.
     * @see getAuthKey()
     */
    public function validateAuthKey($authKey)
    {
        // TODO: Implement validateAuthKey() method.
    }

    /**
     * Validates password
     *
     * @param  string  $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->Passwd === $password;
    }

    /**
     * @param $userName
     * @param $password
     * @return $this
     */
    public static function getUserBy($userName)
    {
        return static::find()->where(['loginname' => $userName])->one();
    }

    public function getUsername()
    {
        return $this->Memname;
    }
}

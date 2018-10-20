<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "web_marquee".
 *
 * @property string $id
 * @property string $ndate
 * @property string $message
 * @property string $message_tw
 * @property string $message_en
 * @property integer $level
 * @property string $ntime
 * @property integer $mshow
 */
class WebMarqueeModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'web_marquee';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ndate', 'ntime'], 'safe'],
            [['message', 'message_tw', 'message_en'], 'required'],
            [['message', 'message_tw', 'message_en'], 'string'],
            [['level', 'mshow'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ndate' => 'Ndate',
            'message' => 'Message',
            'message_tw' => 'Message Tw',
            'message_en' => 'Message En',
            'level' => 'Level',
            'ntime' => 'Ntime',
            'mshow' => 'Mshow',
        ];
    }
}

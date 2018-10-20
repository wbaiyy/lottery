<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 */
class ChangePasswordForm extends Model
{
    public $oldPassword;
    public $password;
    public $confirmPassword;

    private $_user = false;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['confirmPassword', 'password'], 'required'],
            ['password', 'string', 'max' => 100],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        $user = WebMemberModel::findOne(yii::$app->user->id);
        if ($user->Passwd != $this->oldPassword) {
            $this->addError('oldPassword', '旧密码不正确，请重试!');
            return false;
        }

        //验证二次新密码
        if ($this->password != $this->confirmPassword) {
            $this->addError('password', '两次密码不一致，请重试!');
            return false;
        }

        return true;
    }

    public function twicePasswordIsEqule()
    {
        return $this->validate();
    }
}

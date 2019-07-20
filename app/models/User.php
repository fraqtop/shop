<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\filters\RateLimitInterface;
use yii\web\IdentityInterface;

class User extends ActiveRecord implements IdentityInterface, RateLimitInterface
{
    private $rateLimit = 2;
    private $secondsLimit = 20;

    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id]);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['accessToken' => $token]);
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }

    public function getRateLimit($request, $action)
    {
        return [$this->rateLimit, $this->secondsLimit];
    }

    public function loadAllowance($request, $action)
    {
        $session = \Yii::$app->session;
        return [$session['limitCounter'], $session['time']];
    }

    public function saveAllowance($request, $action, $allowance, $timestamp)
    {
        $session = \Yii::$app->session;
        if (!$session->isActive) {
            $session->open();
        }
        $session['limitCounter'] = $allowance;
        $session['time'] = $timestamp;
    }


}

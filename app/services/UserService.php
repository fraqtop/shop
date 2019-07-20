<?php


namespace app\services;

use app\models\User;

class UserService
{
    public function authenticate(string $username, string $password)
    {
        $user = User::findOne(['username' => $username]);
        if ($user) {
            $isValid = \Yii::$app->getSecurity()->validatePassword($password, $user->password);
            if ($isValid) {
                return $this->generateAccessToken($user);
            }
        }
        return false;
    }

    private function generateAccessToken(User $user): string
    {
        $newToken = \Yii::$app->getSecurity()->generateRandomString();
        $user->accessToken = $newToken;
        $user->save(false);
        return $newToken;
    }
}
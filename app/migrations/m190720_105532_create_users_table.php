<?php

use yii\db\Migration;
use app\models\User;

/**
 * Handles the creation of table `{{%users}}`.
 */
class m190720_105532_create_users_table extends Migration
{
    private $users = [
        '100' => [
            'id' => '100',
            'username' => 'admin',
            'password' => 'admin',
            'authKey' => 'test100key',
            'accessToken' => '100-token',
        ],
        '101' => [
            'id' => '101',
            'username' => 'demo',
            'password' => 'demo',
            'authKey' => 'test101key',
            'accessToken' => '101-token',
        ],
    ];

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%users}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string(20)->notNull()->unique(),
            'password' => $this->string()->notNull(),
            'authKey' => $this->string(),
            'accessToken' => $this->string()
        ]);
        foreach ($this->users as $stubUser) {
            $this->insert('users', [
                'username' => $stubUser['username'],
                'password' => Yii::$app->getSecurity()->generatePasswordHash($stubUser['password']),
                'authKey' => $stubUser['authKey'],
                'accessToken' => $stubUser['accessToken']
            ]);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%users}}');
    }
}

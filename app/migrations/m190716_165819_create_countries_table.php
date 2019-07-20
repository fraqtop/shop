<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%countries}}`.
 */
class m190716_165819_create_countries_table extends Migration
{
    private $initialCountries = ['Россия', 'США', 'Китай'];

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%countries}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(50)
        ]);
        foreach ($this->initialCountries as $country) {
            $this->insert('countries',[
                'name' => $country
            ]);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%countries}}');
    }
}

<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%manufacturers}}`.
 */
class m190716_165838_create_manufacturers_table extends Migration
{
    private $initialManufacturers = [
        ['name' => 'Yota', 'countryId' => 1],
        ['name' => 'Apple', 'countryId' => 2],
        ['name' => 'Xiaomi', 'countryId' => 3],
        ['name' => 'Huawei', 'countryId' => 3],
        ['name' => 'GoPro', 'countryId' => 2],
        ['name' => 'HP', 'countryId' => 2],
        ['name' => 'Яндекс', 'countryId' => 1],
    ];
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%manufacturers}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(50),
            'countryId' => $this->integer()->notNull()
        ]);
        $this->createIndex(
            'idf-manufacturers-countryId',
            'manufacturers',
            'countryId'
            );
        $this->addForeignKey(
            'fk-manufacturers-countries',
            'manufacturers',
            'countryId',
            'countries',
            'id',
            'cascade'
            );
        foreach ($this->initialManufacturers as $manufacturer) {
            $this->insert('manufacturers',[
                'name' => $manufacturer['name'],
                'countryId' => $manufacturer['countryId']
            ]);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%manufacturers}}');
    }
}

<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%products}}`.
 */
class m190716_165853_create_products_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%products}}', [
            'id' => $this->primaryKey(),
            'model' => $this->string(50),
            'price' => $this->decimal(8, 2),
            'categoryId' => $this->integer()->notNull(),
            'manufacturerId' => $this->integer()->notNull()
        ]);
        $this->createIndex(
            'idf-products-category_id',
            'products',
            'categoryId'
            );
        $this->addForeignKey(
            'fk-products-categories',
            'products',
            'categoryId',
            'categories',
            'id'
            );
        $this->createIndex(
            'idf-products-manufacturer_id',
            'products',
            'manufacturerId'
            );
        $this->addForeignKey(
            'fk-products-manufacturers',
            'products',
            'manufacturerId',
            'manufacturers',
            'id'
            );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%products}}');
    }
}

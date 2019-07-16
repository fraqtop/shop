<?php

use yii\db\Migration;
use app\models\Category;

/**
 * Handles the creation of table `{{%categories}}`.
 */
class m190714_190125_create_categories_table extends Migration
{
    private $initialCategories = ['Смартфоны', 'Камеры', 'Ноутбуки'];
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%categories}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(50)->notNull()->unique()
        ]);
        foreach ($this->initialCategories as $category) {
            $this->insert('categories', [
                    'name' => $category
                ]);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%categories}}');
    }
}

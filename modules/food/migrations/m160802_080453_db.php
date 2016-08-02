<?php

use yii\db\Migration;

class m160802_080453_db extends Migration
{
    public function up()
    {
        // Таблица с блюдами
        $this->createTable('{{%food}}', [
            'id'   => $this->primaryKey(),
            'name' => $this->string()->notNull(),
        ],
            'DEFAULT CHARSET=utf8');
        $this->createIndex('idx-food-name', '{{%food}}', 'name');

        // Таблица с ингредиентами
        $this->createTable('{{%ingredients}}', [
            'id'     => $this->primaryKey(),
            'name'   => $this->string()->notNull(),
            'hidden' => $this->smallInteger()->notNull()->defaultValue(1),
        ],
            'DEFAULT CHARSET=utf8');
        $this->createIndex('idx-ingredients-name', '{{%ingredients}}', 'name');

        // Связь блюд с ингредиентами
        $this->createTable('{{%food_ingredient}}', [
            'food_id'       => $this->integer()->notNull(),
            'ingredient_id' => $this->integer()->notNull(),
        ]);
        $this->addPrimaryKey('', '{{%food_ingredient}}', ['food_id', 'ingredient_id']);
        $this->addForeignKey('fk-food_ingredient-food_id', '{{%food_ingredient}}', 'food_id', '{{%food}}', 'id',
            'CASCADE');
        $this->addForeignKey('fk-food_ingredient-ingredient_id', '{{%food_ingredient}}', 'ingredient_id',
            '{{%ingredients}}', 'id', 'CASCADE');

    }

    public function down()
    {
        echo "m160802_080453_db cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}

<?php

use yii\db\Migration;

class m170403_140124_feedback_table extends Migration
{
    /**
     * migration table name
     */
    public $tableName = '{{%feedback}}';

    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable(
            $this->tableName,
            [
                'id' => $this->primaryKey(11),
                'name' => $this->string(255)->defaultValue(null) . ' COMMENT "Имя"',
                'phone' => $this->string(255)->defaultValue(null) . ' COMMENT "Телефон"',
                'email' => $this->string(255)->defaultValue(null) . ' COMMENT "Email"',
                'text' => $this->text()->defaultValue(null) . ' COMMENT "Текст"',
                'published' => $this->boolean()->notNull()->defaultValue(1) . ' COMMENT "Published"',
                'position' => $this->integer()->notNull()->defaultValue(0) . ' COMMENT "Position"',
                'created_at' => $this->integer()->notNull() . ' COMMENT "Created at"',
                'updated_at' => $this->integer()->notNull() . ' COMMENT "Updated at"',
            ]
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable($this->tableName);
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

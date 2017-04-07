<?php

use yii\db\Migration;

class m170404_112424_buyer_table extends Migration
{
    /**
     * migration table name
     */
    public $tableName = '{{%buyer}}';


    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable(
            $this->tableName,
            [
                'id' => $this->primaryKey(11),
                'agreement' => $this->boolean() . ' COMMENT "Agreement"',
                'name' => $this->string(255)->notNull() . ' COMMENT "Name"',
                'phone' => $this->string(255)->notNull() . ' COMMENT "Phone"',
                'published' => $this->boolean()->notNull()->defaultValue(1) . ' COMMENT "Published"',
                'position' => $this->integer()->notNull()->defaultValue(0) . ' COMMENT "Position"',
                'created_at' => $this->integer()->notNull() . ' COMMENT "Created at"',
                'updated_at' => $this->integer()->notNull() . ' COMMENT "Updated at"',
            ]
        );
    }

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

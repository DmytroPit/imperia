<?php

use yii\db\Migration;

class m170403_140632_answer_table extends Migration
{
    /**
     * migration table name
     */
    public $tableName = '{{%answer}}';
    /**
     * Migration related table name
     */
    public $tableNameRelated = '{{%responses}}';
    /**
     * Foreign Key name
     */
    public $fkResponses = 'fk_answer_model_id_responses_id';

    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable(
            $this->tableName,
            [
                'model_id' => $this->integer(11)->notNull() . ' COMMENT "Вопрос"',
                'text' => $this->text()->defaultValue(null) . ' COMMENT "Текст"',
                'published' => $this->boolean()->notNull()->defaultValue(1) . ' COMMENT "Published"',
                'position' => $this->integer()->notNull()->defaultValue(0) . ' COMMENT "Position"',
                'created_at' => $this->integer()->notNull() . ' COMMENT "Created at"',
                'updated_at' => $this->integer()->notNull() . ' COMMENT "Updated at"',
            ]
        );

        $this->addForeignKey(
            $this->fkResponses,
            $this->tableName,
            'model_id',
            $this->tableNameRelated,
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey($this->fkResponses, $this->tableName);
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

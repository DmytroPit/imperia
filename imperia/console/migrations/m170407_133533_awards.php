<?php

use yii\db\Migration;

class m170407_133533_awards extends Migration
{
    /**
     * migration table name
     */
    public $tableName = '{{%awards}}';

    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable(
            $this->tableName,
            [
                'id' => $this->primaryKey(11),
                'name' => $this->text()->defaultValue(null) . ' COMMENT "Text"',
                'image_src_filename' => $this->string(255)->notNull() . ' COMMENT "Image SRC Filename"',
                'image_web_filename' => $this->string(255)->notNull() . ' COMMENT "Image WEB Filename"',
                'published' => $this->boolean()->notNull()->defaultValue(1) . ' COMMENT "Published"',
                'position' => $this->integer()->notNull()->defaultValue(0) . ' COMMENT "Position"',
                'created_at' => $this->integer()->notNull() . ' COMMENT "Created at"',
                'updated_at' => $this->integer()->notNull() . ' COMMENT "Updated at"',
            ]
        );
    }

    public function safeDown()
    {
        $this->dropTable($this->tableName);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170407_133533_awards cannot be reverted.\n";

        return false;
    }
    */
}

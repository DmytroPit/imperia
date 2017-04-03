<?php

use yii\db\Migration;

class m170403_195142_direction_table extends Migration
{
    /**
     * migration table name
     */
    public $tableName = '{{%direction}}';
    /**
     * Migration related table name
     */
    public $tableNameRelated = '{{%city}}';
    /**
     * Foreign Key name
     */
    public $fkArrival = 'fk_direction_arrival_city_city_id';
    public $fkDeparture = 'fk_direction_departure_city_city_id';


    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable(
            $this->tableName,
            [
                'id' => $this->primaryKey(11),
                'arrival_city' => $this->integer(11)->notNull() . ' COMMENT "Город прибытия"',
                'departure_city' => $this->integer(11)->notNull() . ' COMMENT "Город отправления"',
                'published' => $this->boolean()->notNull()->defaultValue(1) . ' COMMENT "Published"',
                'position' => $this->integer()->notNull()->defaultValue(0) . ' COMMENT "Position"',
                'created_at' => $this->integer()->notNull() . ' COMMENT "Created at"',
                'updated_at' => $this->integer()->notNull() . ' COMMENT "Updated at"',
            ]
        );

        $this->addForeignKey(
            $this->fkArrival,
            $this->tableName,
            'arrival_city',
            $this->tableNameRelated,
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->addForeignKey(
            $this->fkDeparture,
            $this->tableName,
            'departure_city',
            $this->tableNameRelated,
            'id',
            'CASCADE',
            'CASCADE'
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

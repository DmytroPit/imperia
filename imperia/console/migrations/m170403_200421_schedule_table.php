<?php

use yii\db\Migration;

class m170403_200421_schedule_table extends Migration
{
    /**
     * migration table name
     */
    public $tableName = '{{%schedule}}';
    /**
     * Migration related table name
     */
    public $tableNameRelated = '{{%direction}}';
    public $tableNameRelatedCity = '{{%city}}';
    /**
     * Foreign Key name
     */
    public $fkDirection = 'fk_schedule_id_direction_id';
    public $fkCity = 'fk_schedule_throw_city_id';

    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable(
            $this->tableName,
            [
                'id' => $this->integer(11)->notNull() . ' COMMENT "Направление"',
                'arrival_time' => $this->time() . ' COMMENT "Время прибытия"',
                'departure_time' => $this->time() . ' COMMENT "Время отправления"',
                'throw' => $this->integer(11)->notNull() . ' COMMENT "Промежуточный город"',
                'price' => $this->integer(11)->notNull() . ' COMMENT "Цена билета"',
                'published' => $this->boolean()->notNull()->defaultValue(1) . ' COMMENT "Published"',
                'position' => $this->integer()->notNull()->defaultValue(0) . ' COMMENT "Position"',
                'created_at' => $this->integer()->notNull() . ' COMMENT "Created at"',
                'updated_at' => $this->integer()->notNull() . ' COMMENT "Updated at"',
            ]
        );

        $this->addForeignKey(
            $this->fkDirection,
            $this->tableName,
            'id',
            $this->tableNameRelated,
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->addForeignKey(
            $this->fkCity,
            $this->tableName,
            'throw',
            $this->tableNameRelatedCity,
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
        $this->dropForeignKey($this->fkDirection, $this->tableName);
        $this->dropForeignKey($this->fkCity, $this->tableName);
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

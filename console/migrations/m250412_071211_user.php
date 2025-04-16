<?php

use yii\db\Migration;

class m250412_071211_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m250412_071211_user cannot be reverted.\n";

        return false;
    }



        public function up()
        {
            $this->createTable('User', [
                'id' => $this->primaryKey(),
                'number' => $this->string(30)->notNull()->unique(),
                'password' => $this->string(200)->notNull(),
                'email' => $this->string(),
                'name' => $this->string(30),
                'lastname' => $this->string(60),
                'gender' => $this->boolean(),
                'date' => $this->date(),
                'created_at' => $this->integer(),
                'updated_at' => $this->integer(),
            ]);
        }
        
        public function down()
        {
            $this->dropTable('User');
        }
    }




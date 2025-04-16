<?php

use yii\db\Migration;

class m250412_071015_auth extends Migration
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
        echo "m250412_071015_auth cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250412_071015_auth cannot be reverted.\n";

        return false;
    }
    */
}

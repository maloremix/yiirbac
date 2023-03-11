<?php

use yii\db\Expression;
use yii\db\Migration;

/**
 * Class m230311_100550_add_admin_in_rbac
 */
class m230311_100550_add_admin_in_rbac extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('{{%auth_item}}', [
            'name' => 'admin',
            'type' => 1,
            'created_at' => new Expression('UNIX_TIMESTAMP()'),
            'updated_at' => new Expression('UNIX_TIMESTAMP()'),
        ]);
        $this->insert('{{%auth_assignment}}', [
            'item_name' => 'admin',
            'user_id' => 1,
            'created_at' => new Expression('UNIX_TIMESTAMP()'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('{{%auth_item}}', "name='admin' and type=1");
        $this->delete('{{%auth_assignment}}', "item_name='admin' and user_id=1");
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230311_100550_add_admin_in_rbac cannot be reverted.\n";

        return false;
    }
    */
}

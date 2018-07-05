<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version2 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->createForeignKey('forgot_password', 'forgot_password_user_id_user_id', array(
             'name' => 'forgot_password_user_id_user_id',
             'local' => 'user_id',
             'foreign' => 'id',
             'foreignTable' => 'user',
             ));
        $this->addIndex('forgot_password', 'forgot_password_user_id', array(
             'fields' => 
             array(
              0 => 'user_id',
             ),
             ));
    }

    public function down()
    {
        $this->dropForeignKey('forgot_password', 'forgot_password_user_id_user_id');
        $this->removeIndex('forgot_password', 'forgot_password_user_id', array(
             'fields' => 
             array(
              0 => 'user_id',
             ),
             ));
    }
}
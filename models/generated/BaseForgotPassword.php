<?php

/**
 * BaseForgotPassword
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $user_id
 * @property string $code
 * @property integer $is_active
 * @property User $User
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
abstract class BaseForgotPassword extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('forgot_password');
        $this->hasColumn('user_id', 'integer', 8, array(
             'type' => 'integer',
             'length' => 8,
             ));
        $this->hasColumn('code', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('is_active', 'integer', 1, array(
             'type' => 'integer',
             'default' => '1',
             'length' => '1',
             ));

        $this->option('type', 'INNODB');
        $this->option('collate', 'utf8_general_ci');
        $this->option('charset', 'utf8');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('User', array(
             'local' => 'user_id',
             'foreign' => 'id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}
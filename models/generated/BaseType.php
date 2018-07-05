<?php

/**
 * BaseType
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $name
 * @property string $banner
 * @property integer $is_active
 * @property Doctrine_Collection $Product
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
abstract class BaseType extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('type');
        $this->hasColumn('name', 'string', 100, array(
             'type' => 'string',
             'length' => '100',
             ));
        $this->hasColumn('banner', 'string', 255, array(
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
        $this->hasMany('Product', array(
             'local' => 'id',
             'foreign' => 'type_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}
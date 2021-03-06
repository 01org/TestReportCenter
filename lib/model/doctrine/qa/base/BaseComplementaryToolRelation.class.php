<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('ComplementaryToolRelation', 'qa_generic');

/**
 * BaseComplementaryToolRelation
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $label
 * @property integer $table_name_id
 * @property integer $table_entry_id
 * @property integer $complementary_tool_id
 * @property string $tool_key
 * @property integer $category
 * @property TableName $TableName
 * 
 * @method integer                   getId()                    Returns the current record's "id" value
 * @method string                    getLabel()                 Returns the current record's "label" value
 * @method integer                   getTableNameId()           Returns the current record's "table_name_id" value
 * @method integer                   getTableEntryId()          Returns the current record's "table_entry_id" value
 * @method integer                   getComplementaryToolId()   Returns the current record's "complementary_tool_id" value
 * @method string                    getToolKey()               Returns the current record's "tool_key" value
 * @method integer                   getCategory()              Returns the current record's "category" value
 * @method TableName                 getTableName()             Returns the current record's "TableName" value
 * @method ComplementaryToolRelation setId()                    Sets the current record's "id" value
 * @method ComplementaryToolRelation setLabel()                 Sets the current record's "label" value
 * @method ComplementaryToolRelation setTableNameId()           Sets the current record's "table_name_id" value
 * @method ComplementaryToolRelation setTableEntryId()          Sets the current record's "table_entry_id" value
 * @method ComplementaryToolRelation setComplementaryToolId()   Sets the current record's "complementary_tool_id" value
 * @method ComplementaryToolRelation setToolKey()               Sets the current record's "tool_key" value
 * @method ComplementaryToolRelation setCategory()              Sets the current record's "category" value
 * @method ComplementaryToolRelation setTableName()             Sets the current record's "TableName" value
 * 
 * @package    trc
 * @subpackage model
 * @author     Julian Dumez <julianx.dumez@intel.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseComplementaryToolRelation extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('complementary_tool_relation');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('label', 'string', 128, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 128,
             ));
        $this->hasColumn('table_name_id', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => 4,
             ));
        $this->hasColumn('table_entry_id', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => 4,
             ));
        $this->hasColumn('complementary_tool_id', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => 4,
             ));
        $this->hasColumn('tool_key', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('category', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => 4,
             ));


        $this->index('fk_complementary_tool_relation_table_name1', array(
             'fields' => 
             array(
              0 => 'table_name_id',
             ),
             ));
        $this->index('idx_complementary_tool_relation_table_entry_id', array(
             'fields' => 
             array(
              0 => 'table_entry_id',
             ),
             ));
        $this->option('charset', 'utf8');
        $this->option('type', 'InnoDB');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('TableName', array(
             'local' => 'table_name_id',
             'foreign' => 'id',
             'onDelete' => 'no action',
             'onUpdate' => 'no action'));
    }
}
<?php

/**
 * DecisionCriteriaTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class DecisionCriteriaTable extends PluginDecisionCriteriaTable
{
    /**
     * Returns an instance of this class.
     *
     * @return object DecisionCriteriaTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('DecisionCriteria');
    }
}
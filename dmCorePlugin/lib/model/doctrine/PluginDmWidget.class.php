<?php

/**
 * PluginDmWidget
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 *
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 5845 2009-06-09 07:36:57Z jwage $
 */
abstract class PluginDmWidget extends BaseDmWidget
{
  public function getValues()
  {
    return json_decode($this->value, true);
  }

  public function setValues($v)
  {
    $this->value = json_encode($v);
  }

  public function __toString()
  {
    return $this->get('module').'.'.$this->get('action');
  }
}
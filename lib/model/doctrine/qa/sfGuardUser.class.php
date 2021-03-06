<?php

/**
 * sfGuardUser
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    trc
 * @subpackage model
 * @author     Julian Dumez <julianx.dumez@intel.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class sfGuardUser extends PluginsfGuardUser
{
	public function getToken()
	{
		$profile = Doctrine_Core::getTable("sfGuardUserProfile")->find($this->getId());

		return $profile["token"];
	}

	public function getSecurityLevel()
	{
		$profile = Doctrine_Core::getTable("sfGuardUserProfile")->find($this->getId());

		return $profile["security_level"];
	}

	/**
	 * Deactivate a user account.
	 *
	 * @return TRUE
	 */
	public function delete_user()
	{
		$this->setIsActive(0);
		$this->save();

		return true;
	}
}

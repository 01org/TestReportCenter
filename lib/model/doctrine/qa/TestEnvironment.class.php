<?php

/**
 * TestEnvironment
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 *
 * @package    trc
 * @subpackage model
 * @author     Julian Dumez <julianx.dumez@intel.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class TestEnvironment extends PluginTestEnvironment
{
	/**
	 * Slugify the test environment name.
	 *
	 * @return The slugified name.
	 */
	public function getSlug()
	{
		return MiscUtils::slugify($this->getName());
	}

	/**
	 * Get images available under current test environment.
	 *
	 * @param projectGroupId The project group identifier.
	 * @param projectId The project identifier.
	 * @param productId The product type identifier.
	 *
	 * @return A doctrine collection of Images.
	 */
	public function getImages($projectGroupId, $projectId, $productId)
	{
		$qa_generic = sfConfig::get("app_table_qa_generic");

		$query = Doctrine_Manager::getInstance()->getCurrentConnection();
		$result = $query->execute("
			SELECT DISTINCT i.id, i.name, i.description, i.os, i.distribution, i.version, i.kernel, i.architecture, i.other_fw, i.binary_link, i.source_link
				FROM ".$qa_generic.".image i
				JOIN ".$qa_generic.".configuration c ON c.image_id = i.id
				JOIN ".$qa_generic.".project_to_product ptp ON ptp.id = c.project_to_product_id
				WHERE ptp.project_group_id = ".$projectGroupId."
				AND ptp.project_id = ".$projectId."
				AND ptp.product_id = ".$productId."
				AND c.test_environment_id = ".$this->getId()."
				ORDER BY i.name ASC
		");
		$array = $result->fetchAll();

		$images = array();
		foreach($array as $row)
		{
			$image = new Image();
			$image->fromArray($row);
			array_push($images, $image);
		}

		return $images;
	}
}
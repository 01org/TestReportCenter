(<a href="<?php echo url_for("edit_image", array("id" => $configuration->getImageId())); ?>"><?php echo $configuration->getImageId(); ?></a>) <a href="<?php echo url_for("edit_image", array("id" => $configuration->getImageId())); ?>"><?php echo Doctrine_Core::getTable("Image")->findOneById($configuration->getImageId())->getName(); ?></a>
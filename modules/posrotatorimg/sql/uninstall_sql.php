<?php
    // Init
    $sql = array();
	$sql[] = 'ALTER TABLE `' . _DB_PREFIX_ . 'image` DROP rotator';					
	$sql[] = 'ALTER TABLE `' . _DB_PREFIX_ . 'image_shop` DROP rotator';					
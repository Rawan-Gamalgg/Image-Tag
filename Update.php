<?php
include_once "app/models/File.php";

$name = $_POST['name'];
$label = $_POST['label'];

$fileObj = new File;
$fileObj->setFile_name($name);
$fileObj->setLabel($label);
date_default_timezone_set('Africa/cairo');
$fileObj->setUpdated_at(date('Y-m-d H:i:s'));
$fileObj->updateLabel();


?>

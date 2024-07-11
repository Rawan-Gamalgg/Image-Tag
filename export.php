<?php
include_once "app/models/File.php";

if(isset($_POST["export"])) {
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=data.csv');
    
    $output = fopen("php://output", "w");
    fprintf($output, chr(0xEF).chr(0xBB).chr(0xBF)); 
    fputcsv($output, array('file_name', 'label'));
    
    $fileObj = new File;
    $result = $fileObj->returnTocsv()->fetch_all(MYSQLI_ASSOC);
    
    foreach ($result as $row => $value) {
    // print_r($value['']);die;
        fputcsv($output, array($value['file_name'], $value['label']));
    }
    
    fclose($output);
    exit();
}
?>

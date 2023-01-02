<?php
require_once 'modules/custom/tn/inc/datenbank.inc.php';
require_once 'modules/custom/tn/inc/funktionen.inc.php';
require_once 'modules/custom/tn/src/Entities/Teilnehmer.php';
require_once 'modules/custom/tn/inc/post.inc.php';
//require_once 'modules/custom/tn/templates/head.tpl.php';
//require_once 'modules/custom/tn/templates/table_edit.tpl.php';

Teilnehmer::connect($pdo);

error_reporting(E_ALL);
ini_set("display_errors", "on"); // ggf. in localconf.inc.php überschreiben
ini_set("display_startip_errors", "on"); // ggf. in localconf.inc.php überschreiben

$fileName = '../../audaxcloud/data/111026/files/Documents/tn_data.csv';
$tn = new Teilnehmer();

$result[] = $tn->fetchAllTn();
echo '<pre>';
echo '</pre>';
$items = count($result[0]);
echo $items;


# if(file_exists($fileName)):
    $csvFile = fopen($fileName,'w');
    $head = ["Nachname", "Vorname", "Str_Hnr", "PLZ", "Ort", "Land", "Email", "Telefon", "Ventoux", "Br1", "Br2","Boe1","Boe2","Bod","Vog","Jura","med200", "med300","med400","med600", "Nachricht", "Timestamp"];
    fputcsv($csvFile,$head);    

    foreach ($result[0] as $fields) {
        if( is_object($fields) )
            $fields = (array) $fields;
        fputcsv($csvFile, $fields);
    }
   
    fclose($csvFile);
    //print_r($data);
    echo '<br><a href="https://live.audax-breisgau.de/index.php/s/8aXaweSSNKXbp5w">Download (etwaige Anwendungen mit <i>Abbrechen</i> quittieren!</a>';
    

<?php

error_reporting(E_ALL);
ini_set('display_errors', FALSE);
ini_set('display_startup_errors', FALSE);


require_once 'modules/custom/tn/inc/datenbank.inc.php';
require_once 'modules/custom/tn/inc/funktionen.inc.php';
require_once 'modules/custom/tn/src/Entities/Teilnehmer.php';

Teilnehmer::connect($pdo);

$tn = new Teilnehmer;

/************* das letzte Update ermitteln */
$update = (int)serialize($tn->lastUpdate());
//print_r($tn->lastUpdate()->getTimestamp());

require_once 'modules/custom/tn/templates/head.tpl.php';
require_once 'modules/custom/tn/templates/table.tpl.php';

/************* die Teilnehmer mit Brevet = 2 darstellen  */

$result[] = $tn->fetchAllTn();
foreach($result AS $r)
{

  for($i= 0; $i<300; $i++) 
  { 
      echo '<tr><td>'. ucwords(strtolower($r[$i]->getVname())) . '</td><td>'. ucwords(strtolower($r[$i]->getNname())).'</td>'; // Vor- und Nachname sind in der DB vertauscht!
  
      $getter = array('td_0'=>'getVentoux', 'td_1'=>'getBr1', 'td_2'=>'getBr2', 'td_3'=>'getBoe1', 'td_4'=>'getBoe2', 'td_5'=>'getVog', 'td_6'=>'getBod', 'td_7'=>'getJura' );
      
      foreach($getter AS $class=>$g)
      {
        echo list_tn($i,  $g, $class,);
      }
  }
}

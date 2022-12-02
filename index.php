<?php

require_once 'inc/datenbank.inc.php';
require_once 'inc/funktionen.inc.php';
require_once 'src/Entities/Teilnehmer.php';

Teilnehmer::connect($pdo);

$tn = new Teilnehmer;

/************* das letzte Update ermitteln */
$update = $tn->lastUpdate();

require_once 'templates/head.tpl.php';
require_once 'templates/table.tpl.php';

/************* die Teilnehmer mit Brevet = 2 darstellen  */

$result[] = $tn->finde();
foreach($result AS $r)
{

  for($i= 0; $i<500; $i++) 
  { 
      echo '<tr><td>'. $r[$i]->getNname() . '</td><td>'. $r[$i]->getVname().'</td>';
  
      $getter = array('td_0'=>'getVentoux', 'td_1'=>'getBr1', 'td_2'=>'getBr2', 'td_3'=>'getBoe1', 'td_4'=>'getBoe2', 'td_5'=>'getVog', 'td_6'=>'getBod', 'td_7'=>'getJura' );
      
      foreach($getter AS $class=>$g)
      {
        echo list_tn($i,  $g, $class,);
      }
  }
}


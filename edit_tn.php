<?php
//session_start();
require_once 'inc/datenbank.inc.php';
require_once 'inc/funktionen.inc.php';
require_once 'src/Entities/Teilnehmer.php';
require_once 'inc/post.inc.php';
require_once 'templates/head.tpl.php';
require_once 'templates/table_edit.tpl.php';

Teilnehmer::connect($pdo);

ini_set("display_errors", "on"); // ggf. in localconf.inc.php überschreiben
ini_set("display_startip_errors", "on"); // ggf. in localconf.inc.php überschreiben

$current_time = time();
echo 'Session-ID 1: '.$_SESSION['id'].'<br>';
echo 'Checked: '.$checked.'<br>';
echo 'Brevet: '.$brevet.'<br>';

$tn = new Teilnehmer;
$tn->setId($_SESSION['id']);
$tn->fetch($tn->getId());
echo 'Session-ID 2: '.$tn->getId().'<br>';

echo $_SESSION['message'];

if(!empty($_POST['delete'])) {
    $tn->setId($_POST['delete']);
    $msg = '<h4 style="background: red, text-align: center;"> '.$tn->getNname().' '.$tn->getVname().' wurde gelöscht.</h4>';
    $_SESSION['message'] = $msg;
    $_SESSION['id'] = $tn->getId();
    $tn->deleteTn();    
}
if(!empty($checked) &&!empty($brevet) && !empty($tn_id)) 
    {
        $id = $tn->setId($_POST['tn_id']);  
        //$_SESSION['id'] = $_POST['tn_id'];
        $tn->updateTn($id, $brevet, $checked, $current_time);
    }

$result[] = $tn->fetchAllTn();

//$type = array('getVentoux'=>'ventoux', 'getBr1' => 'br1', 'getBr2' =>  'br2', 'getBoe1' =>  'boe1', 'getBoe2' =>  'boe2', 'getVog' => 'vog', 'getBod' => 'bod', 'getJura' => 'jura');

foreach($result AS $r)
{
    for($i= 0; $i<9; $i++) 
    {  
        require 'templates/table_body_edit.tpl.php';
    }
}

?>

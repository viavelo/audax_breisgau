<?php
//session_start();
require_once 'modules/custom/tn/inc/datenbank.inc.php';
require_once 'modules/custom/tn/inc/funktionen.inc.php';
require_once 'modules/custom/tn/src/Entities/Teilnehmer.php';
require_once 'modules/custom/tn/inc/post.inc.php';
require_once 'modules/custom/tn/templates/head.tpl.php';
require_once 'modules/custom/tn/templates/table_edit.tpl.php';


Teilnehmer::connect($pdo);

ini_set("display_errors", "on"); // ggf. in localconf.inc.php überschreiben
ini_set("display_startip_errors", "on"); // ggf. in localconf.inc.php überschreiben

$current_time = time();

$type = array('ventoux', 'br1', 'br2', 'boe1', 'boe2', 'bod', 'vog', 'jura');
$tn_nr = array();
foreach($type AS $b) {
$statement = $pdo->prepare("SELECT * FROM tn_data WHERE $b = ? OR $b = ? ");
$statement->execute(array(1,2)) ;
	$tn_nr[] = $statement->rowCount(); 
}
echo '<pre> Ventoux: '.$tn_nr[0]. '</pre><pre> Breisgau-I: '.$tn_nr[1]. ' Breisgau-II: '.$tn_nr[2]. '</pre><pre> Bölchen-I: '.$tn_nr[3]. ' Bölchen-II: '.$tn_nr[4];
echo '</pre><pre> Bodensee: '.$tn_nr[5]. ' Vogesen: '.$tn_nr[6]. '</pre><pre> Jura: '.$tn_nr[7].'<pre>';

$tn = new Teilnehmer;
$tn->setId($_SESSION['id']);
$tn->fetch($tn->getId());

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
        $tn->updateTn($id, $brevet, $checked, $current_time);
    }

$result[] = $tn->fetchAllEdit();
echo '<pre>';
//print_r($result);
echo '</pre>';
$br1 = array();

foreach($result AS $r)
{
    for($i= 0; $i<400; $i++) 
    {  
        require 'modules/custom/tn/templates/table_body_edit.tpl.php';
    }
}

?>

<?php
require_once '../67kxBYuBHp446z7.php';
$subnr = 0;
$statement = $pdo->prepare("SELECT * FROM tn_data ORDER BY id DESC LIMIT 1");
$statement->execute();   
while($row = $statement->fetch()) {
        $subnr = $row['id'];
   }
$webform_id = array();
$statement = $pdo->prepare("SELECT * FROM webform_submission_data WHERE webform_id = ? AND sid > ?");
$statement->execute(array('anmeldung_brevets', $subnr));   
while($row = $statement->fetch()) {
   $sid[] = $row['sid'];
}
$sid = array_unique($sid);
$eingaben = count($sid);

$name = array('vorname', 'nachname', 'strasse_hausnummer', 'postleitzahl', 'wohnort', 'land', 'e_mail_bestaetigung_', 'telefon', 'brevets', 'medaillen', 'nachricht' );

    foreach($sid AS $i){

$result[$i] = array();

    foreach($name AS $n) {
    $statement = $pdo->prepare("SELECT * FROM webform_submission_data WHERE sid = ? && name = ?");
    $statement->execute(array($i, $n));
    while($row = $statement->fetch()) {
        $result[$i][] = $row['value'];
        }
    }
}

foreach($sid AS $i){
    $imax = count($result[$i]);
    $imax = $imax-1;
    $statement = $pdo->prepare("INSERT INTO tn_data (id, nname, vname, str_hn, plz, ort, land, email, telefon, nachricht) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $statement->execute(array($i, $result[$i][0],$result[$i][1],$result[$i][2],$result[$i][3],$result[$i][4],$result[$i][5],$result[$i][6],$result[$i][7], $result[$i][$imax]));  
    if(in_array('600-1', $result[$i])) {
        $statement = $pdo->prepare("UPDATE tn_data SET ventoux = ? WHERE id = '$i'  LIMIT 1" );
        $statement->execute(array('1'));
    }
    if(in_array('200-1', $result[$i])) {
        $statement = $pdo->prepare("UPDATE tn_data SET br1 = ? WHERE id = '$i'  LIMIT 1" );
        $statement->execute(array('1'));
    }
    if(in_array('200-2', $result[$i])) {
        $statement = $pdo->prepare("UPDATE tn_data SET br2 = ? WHERE id = '$i'  LIMIT 1" );
        $statement->execute(array('1'));
    }
    if(in_array('300-1', $result[$i])) {
        $statement = $pdo->prepare("UPDATE tn_data SET boe1 = ? WHERE id = '$i'  LIMIT 1" );
        $statement->execute(array('1'));
    }
    if(in_array('300-2', $result[$i])) {
        $statement = $pdo->prepare("UPDATE tn_data SET boe2 = ? WHERE id = '$i'  LIMIT 1" );
        $statement->execute(array('1'));
    }
    if(in_array('400-1', $result[$i])) {
        $statement = $pdo->prepare("UPDATE tn_data SET bod = ? WHERE id = '$i'  LIMIT 1" );
        $statement->execute(array('1'));
    }
    if(in_array('400-2', $result[$i])) {
        $statement = $pdo->prepare("UPDATE tn_data SET vog = ? WHERE id = '$i'  LIMIT 1" );
        $statement->execute(array('1'));
    }
    if(in_array('600-2', $result[$i])) {
        $statement = $pdo->prepare("UPDATE tn_data SET jura = ? WHERE id = '$i'  LIMIT 1" );
        $statement->execute(array('1'));
    }
    if(in_array('med200', $result[$i])) {
        $statement = $pdo->prepare("UPDATE tn_data SET med200 = ? WHERE id = '$i'  LIMIT 1" );
        $statement->execute(array('1'));
    }
    if(in_array('med300', $result[$i])) {
        $statement = $pdo->prepare("UPDATE tn_data SET med300 = ? WHERE id = '$i'  LIMIT 1" );
        $statement->execute(array('1'));
    }
    if(in_array('med400', $result[$i])) {
        $statement = $pdo->prepare("UPDATE tn_data SET med400 = ? WHERE id = '$i'  LIMIT 1" );
        $statement->execute(array('1'));
    }
    if(in_array('med600', $result[$i])) {
        $statement = $pdo->prepare("UPDATE tn_data SET med600 = ? WHERE id = '$i'  LIMIT 1" );
        $statement->execute(array('1'));
    }
}
?>

<html>
<head>
</head>
<body>
<?php 
$to = 'edit_tn_vHBFHTrkf956PJk.php';
header('Location: /'.$to);
?>
<meta http-equiv="Refresh" content="0; url='edit_tn_vHBFHTrkf956PJk.php'" />
</body>
</html>

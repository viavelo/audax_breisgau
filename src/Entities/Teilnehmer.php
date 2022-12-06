<?php

class Teilnehmer
{   
    protected 	$id	    =    0;
    protected 	$vname	=	'';
    protected 	$nname	=	'';
    protected 	$str_hn	=	'';
    protected 	$plz	=	'';
    protected 	$ort	=	'';
    protected 	$land	=	'';
    protected 	$email	=	'';
    protected 	$telefon =	'';
    protected 	$ventoux =	'';
    protected 	$br1	=	'';
    protected 	$br2	=	'';
    protected 	$boe1	=	'';
    protected 	$boe2	=	'';
    protected 	$bod	=	'';
    protected 	$vog	=	'';
    protected 	$jura	=	'';
    protected 	$med200	=	'';
    protected 	$med300	=	'';
    protected 	$med400	=	'';
    protected 	$med600	=	'';
    protected 	$nachricht ='';
    protected   $timestamp = '';

    protected static $pdo;


    public function __toString()
    {
      return '<tr><td>'. $this->getNname() .'</td><td>'.$this->getVname().'</td><td>'. str_ireplace("2", "&#10004;", $this->getVentoux()) . '</td><td>' . $this->getBr1() . '</td><td>'
        . $this->getBr2() . '</td><td>'. $this->getBoe1() . '</td><td>'. $this->getBoe2() . '</td><td>'. $this->getVog() . '</td><td>'. $this->getBod() . '</td><td>'. $this->getJura().'</td></tr>'; 
    }

    public function __construct(array $daten = [])
    {
        $this->setDaten($daten);
    }

    public function setDaten(array $daten)
    {
        // wenn $daten nicht leer ist, rufe die passenden Setter auf
        if ($daten) {
            foreach ($daten as $k => $v) {
                $setterName = 'set' . ucfirst($k);
                // pruefe ob ein passender Setter existiert
                if (method_exists($this, $setterName)) {
                    $this->$setterName($v); // Setteraufruf
                }
            }
        }
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        return $this->id = $id;
    }

    public function getVname()
    {
        return $this->vname;
    }

    public function setVname($vname)
    {
        return $this->vname = $vname;
    }

    public function getNname()
    {
        return $this->nname;
    }

    public function setNname($nname)
    {
        return $this->nname = $nname;
    }

    public function getStr_hn()
    {
        return $this->str_hn;
    }

    public function setStr_hn($str_hn)
    {
        return $this->str_hn = $str_hn;
    }


    public function getPlz()
    {
        return $this->plz;
    }

    public function setPlz($plz)
    {
        return $this->plz = $plz;
    }

    public function getOrt()
    {
        return $this->ort;
    }

    public function setOrt($ort)
    {
        return $this->ort = $ort;
    }


    public function getLand()
    {
        return $this->land;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getTelefon()
    {
        return $this->telefon;
    }

    public function getVentoux()
    {
        return $this->ventoux;
    }

    public function setVentoux($ventoux)
    {
        $this->ventoux = $ventoux;
    }

    public function getBr1()
    {
        return $this->br1;
    }

    public function setBr1($br1)
    {
        $this->br1 = $br1;
    }

    public function getBr2()
    {
        return $this->br2;
    }

    public function setBr2($br2)
    {
        $this->br2 = $br2;
    }

    public function getBoe1()
    {
        return $this->boe1;
    }

    public function setBoe1($boe1)
    {
        $this->boe1 = $boe1;
    }

    public function getBoe2()
    {
        return $this->boe2;
    }

    public function setBoe2($boe2)
    {
        $this->boe2 = $boe2;
    }

    public function getBod()
    {
        return $this->bod;
    }

    public function setBod($bod)
    {
        $this->bod = $bod;
    }

    public function getVog()
    {
        return $this->vog;
    }

        public function setVog($vog)
    {
        $this->vog = $vog;
    }

    public function getJura()
    {
        return $this->jura;
    }

    public function setJura($jura)
    {
        $this->jura = $jura;
    }

    public function getMed200()
    {
        return $this->med200;
    }

    public function setMed200($med200)
    {
        $this->med200 = $med200;
    }

    public function getMed300()
    {
        return $this->med300;
    }

    public function setMed300($med300)
    {
        $this->med300 = $med300;
    }

    public function getMed400()
    {
        return $this->med400;
    }

    public function setMed400($med400)
    {
        $this->med400 = $med400;
    }

    public function getMed600()
    {
        return $this->med600;
    }

    public function setMed600($med600)
    {
        $this->med600 = $med600;
    }

    public function getNachricht()
    {
        return $this->nachricht;
    }

    public function setNachricht($nachricht)
    {
        $this->nachricht = $nachricht;
    }

    public function getTimestamp()
    {
        return $this->timestamp;
    }

    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;
    }

    /* **** Active Record **** */

    public static function connect(PDO $pdo)
    {
        self::$pdo = $pdo;
    }

    public static function findeAlle()
    {
        $sql = 'SELECT * FROM tn_data';
        $abfrage = self::$pdo->query($sql);
        $abfrage->setFetchMode(PDO::FETCH_CLASS, 'Teilnehmer');

        return $abfrage->fetchAll();
    }

    public static function fetch($id)
    {
        //$sql = 'SELECT * FROM tn_data WHERE ventoux = ? OR br1 = ? OR br2 = ? OR boe1 = ? OR boe2 = ? OR vog = ? OR  bod = ? OR  jura = ? ORDER BY id ';
        $sql = 'SELECT * FROM tn_data WHERE id = ?' ;
        $abfrage = self::$pdo->prepare($sql);
        $abfrage->execute([$id]);
        $abfrage->setFetchMode(PDO::FETCH_CLASS, 'Teilnehmer');

        return $abfrage->fetch();
    }

    public static function lastUpdate()
    {
        $sql = 'SELECT * FROM tn_data WHERE timestamp > ? ORDER BY timestamp DESC LIMIT 1 ';
        $abfrage = self::$pdo->prepare($sql);
        $abfrage->execute(array(0));
        $abfrage->setFetchMode(PDO::FETCH_CLASS, 'Teilnehmer');

        return $abfrage->fetch();
    }

    public static function fetchAllTn()
    {
        $sql = 'SELECT * FROM tn_data WHERE ventoux > ? OR br1 > ? OR br2 > ? OR boe1 > ? OR boe2 > ? OR vog > ? OR bod > ? OR jura > ? ORDER BY nname';
        $abfrage = self::$pdo->prepare($sql);
        $abfrage->execute(array(0, 0, 0, 0, 0, 0, 0, 0));
        $abfrage->setFetchMode(PDO::FETCH_CLASS, 'Teilnehmer');

        return $abfrage->fetchAll();
    }

    public function speichere()
    {
        if ($this->getId() > 0) {
            // bereits vorhanden
            $this->update();
        } else {
            // neu
            $this->insert();
        }
    }

    /*protected function updateTn()
    {   global $ts;
        $sql = 'UPDATE tn_data SET ventoux = :ventoux, br1 = :br1, br2 = :br2, boe1 = :boe1, boe2 = :boe2, vog = :vog, bod = :bod, jura = :jura timestamp = :timestamp WHERE id = :id';
        $abfrage = self::$pdo->prepare($sql);
        $data = (get_object_vars($this));
        echo "<br>Rohdaten Update:<br> ";
        print_r($data);
        unset($data['nname'],$data['str_hn'],$data['plz'],$data['ort'],$data['land'],$data['email'],$data['telefon'], $data['nachricht']);
        echo "<br>Daten Update bereinigt:<br> ";
        print_r($data);
        $abfrage->execute($data);
    }*/

    public function updateTn($id, $brevet, $checked, $current_time)
        {   
            $sql = 'UPDATE tn_data SET '.$brevet.' = ?, timestamp = ? WHERE id = "'.$this->getId().'"';
            $statement = self::$pdo->prepare($sql);
            $statement->execute(array($checked, $current_time));
        }

    public function deleteTn()
    {   global $delete;
        $sql = 'DELETE FROM tn_data WHERE id = ?';
        $abfrage = self::$pdo->prepare($sql);
        if($abfrage->execute([$this->getId()]))
        {
        //$this->id = 0;
        }
        else {
            echo "SQL Error <br />";
            echo $abfrage->queryString."<br />";
            echo $abfrage->errorInfo()[2];
            }
    }

    public function showAll()
    {
      foreach($this::findeAlle() AS $items)
      {
        echo "<br>".$items."<br>";
      }
    }

    public function showSome()
    {
      foreach($this->finde() AS $items)
      {
        echo "<td>".$items."</td>";
      }
    }

    public function showButtonVentoux()
    {
        if(empty($this->getVentoux()) || $this->getVentoux()  == 3) {echo 'class="td_0" value="1">&nbsp; ';}   
        elseif($this->getVentoux() == 1) {echo 'class="td_0" value="2">?' ;}
        else {echo 'class="td_8" value="3">&#10004;';}
    }

    public function showButtonBr1()
    {
        if(empty($this->getBr1()) || $this->getBr1()  == 3) {echo 'class="td_1" value="1">&nbsp; ';}   
        elseif($this->getBr1() == 1) {echo 'class="td_1" value="2">?' ;}
        else {echo 'class="td_8" value="3">&#10004;';}
    }

    public function showButtonBr2()
    {
        if(empty($this->getBr2()) || $this->getBr2()  == 3) {echo 'class="td_1" value="1">&nbsp; ';}   
        elseif($this->getBr1() == 1) {echo 'class="td_1" value="2">?' ;}
        else {echo 'class="td_8" value="3">&#10004;';}
    }

    public function showButtonBoe1()
    {
        if(empty($this->getBoe1()) || $this->getBoe1()  == 3) {echo 'class="td_0" value="1">&nbsp; ';}   
        elseif($this->getBoe1() == 1) {echo 'class="td_0" value="2">?' ;}
        else {echo 'class="td_8" value="3">&#10004;';}
    }

    public function showButtonBoe2()
    {
        if(empty($this->getBoe2()) || $this->getBoe2()  == 3) {echo 'class="td_0" value="1">&nbsp; ';}   
        elseif($this->getBoe2() == 1) {echo 'class="td_0" value="2">?' ;}
        else {echo 'class="td_8" value="3">&#10004;';}
    }

    public function showButtonVog()
    {
        if(empty($this->getVog()) || $this->getVog()  == 3) {echo 'class="td_1" value="1">&nbsp; ';}   
        elseif($this->getVog() == 1) {echo 'class="td_1" value="2">?' ;}
        else {echo 'class="td_8" value="3">&#10004;';}
    }

    public function showButtonBod()
    {
        if(empty($this->getBod()) || $this->getBod()  == 3) {echo 'class="td_1" value="1">&nbsp; ';}   
        elseif($this->getBod() == 1) {echo 'class="td_1" value="2">?' ;}
        else {echo 'class="td_8" value="3">&#10004;';}
    }

    public function showButtonJura()
    {
        if(empty($this->getJura()) || $this->getJura()  == 3) {echo 'class="td_0" value="1">&nbsp; ';}   
        elseif($this->getJura() == 1) {echo 'class="td_0" value="2">?' ;}
        else {echo 'class="td_8" value="3">&#10004;';}
    }

    public function showButtonMed200()
    {
        if(empty($this->getMed200()) || $this->getMed200()  == 3) {echo 'class="td_1" value="1">&nbsp; ';}   
        elseif($this->getMed200() == 1) {echo 'class="td_1" value="2">?' ;}
        else {echo 'class="td_8" value="3">&#10004;';}
    }

    public function showButtonMed300()
    {
        if(empty($this->getMed300()) || $this->getMed300()  == 3) {echo 'class="td_0" value="1">&nbsp; ';}   
        elseif($this->getMed300() == 1) {echo 'class="td_0" value="2">?' ;}
        else {echo 'class="td_8" value="3">&#10004;';}
    }

    public function showButtonMed400()
    {
        if(empty($this->getMed400()) || $this->getMed400()  == 3) {echo 'class="td_1" value="1">&nbsp; ';}   
        elseif($this->getMed400() == 1) {echo 'class="td_1" value="2">?' ;}
        else {echo 'class="td_8" value="3">&#10004;';}
    }

    public function showButtonMed600()
    {
        if(empty($this->getMed600()) || $this->getMed600()  == 3) {echo 'class="td_0" value="1">&nbsp; ';}   
        elseif($this->getMed600() == 1) {echo 'class="td_0" value="2">?' ;}
        else {echo 'class="td_8" value="3">&#10004;';}
    }
    /* **** Geschuetzte Methoden **** */

    /*protected function insert()
    {
        $sql = 'INSERT INTO buecher (titel, preis)' .
            ' VALUES (:titel, :preis)';
        $abfrage = self::$db->prepare($sql);

        $daten = get_object_vars($this); // ohne statische Attribute!
        unset($daten['id']);
        $abfrage->execute($daten);

        // setze die ID auf den von der DB generierten Wert
        $this->id = self::$db->lastInsertId();
    }

    protected function update()
    {
        $sql = 'UPDATE buecher SET titel = :titel, preis = :preis' .
            ' WHERE id = :id';
        $abfrage = self::$db->prepare($sql);
        $abfrage->execute(get_object_vars($this));
    }*/
}

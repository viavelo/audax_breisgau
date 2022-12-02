<?php

require_once 'inc/datenbank.inc.php';
require_once 'inc/funktionen.inc.php';
require_once 'src/Entities/Teilnehmer.php';
require_once 'templates/post.php';

Teilnehmer::connect($pdo);

ini_set("display_errors", "on"); // ggf. in localconf.inc.php überschreiben
ini_set("display_startip_errors", "on"); // ggf. in localconf.inc.php überschreiben


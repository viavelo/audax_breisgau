<?php

session_start();

function bereinige($benutzerEingabe, $encoding = 'UTF-8')
{
    return htmlspecialchars(
        strip_tags($benutzerEingabe),
        ENT_QUOTES | ENT_HTML5,
        $encoding
    );
}

function redirect($url)
{
    header('Location: ' . $url);
    exit;
}

function list_tn($i, $get, $class)
{   global $r;
    $x =$r[$i]->$get();
    if($x != 2) {$x = '<td class="'.$class.'">&nbsp;';} 
      else {
      $x = '<td class="'.$class.'">&#10004';
      }
      return $x . '</td>';
}


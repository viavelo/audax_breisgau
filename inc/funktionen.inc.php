<?php

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
//}
function list_tn_br1($i)
{   global $r;
    $x =$r[$i]->getBr1();
    if($x != 2) {$x = '<td class="td_0">&nbsp;';} 
      else {
      $x = '<td class="td_0">&#10004';
      }
      return $x . '</td><td></td></tr>';
//echo '<tr><td>'. $r[$i]->getNname() . '</td><td>'. $r[$i]->getVname() . '</td><td>'. $r[$i]->getVentoux() . '</td><td>'. $r[$i]->getBr1()  . '</td><td>'. $r[$i]->getBr2(). '</td></tr>';
}

<html>
    <tr id="<?= $r[$i]->getId(); ?>"><td  colspan = "2" style=""><form action="#<?= $r[$i]->getId(); ?>" method="POST">
    <input type="hidden" name="delete" value="<?= $r[$i]->getId(); ?>">
    <button onclick="return ask_first(this, 'Teilnehmer löschen?');" class="td_0" style="line-height: 1.8em; margin-top: 16px;" type="submit">
    <?= $r[$i]->getNname().' '.$r[$i]->getVname() ?></button></form></td>
    
    <form action="#<?= $r[$i]->getId(); ?>" method="POST"><input type="hidden" name="tn_id" value="<?= $r[$i]->getId(); ?>"><input type="hidden" name="brevet" value="ventoux">
    <td><button type="submit" name="checked"
    <?= $r[$i]->showButtonVentoux(); ?>
    </button></td></form>

    <form action="#<?= $r[$i]->getId(); ?>" method="POST"><input type="hidden" name="tn_id" value="<?= $r[$i]->getId(); ?>"><input type="hidden" name="brevet" value="br1">
    <td><button type="submit" name="checked"
    <?= $r[$i]->showButtonBr1(); ?>
    </button></td></form>

    <form action="#<?= $r[$i]->getId(); ?>" method="POST"><input type="hidden" name="tn_id" value="<?= $r[$i]->getId(); ?>"><input type="hidden" name="brevet" value="br2">
    <td><button type="submit" name="checked"
    <?= $r[$i]->showButtonBr2(); ?>
    </button></td></form>

    <form action="#<?= $r[$i]->getId(); ?>" method="POST"><input type="hidden" name="tn_id" value="<?= $r[$i]->getId(); ?>"><input type="hidden" name="brevet" value="boe1">
    <td><button type="submit" name="checked"
    <?= $r[$i]->showButtonBoe1(); ?>
    </button></td></form>
  
    <form action="#<?= $r[$i]->getId(); ?>" method="POST"><input type="hidden" name="tn_id" value="<?= $r[$i]->getId(); ?>"><input type="hidden" name="brevet" value="boe2">
    <td><button type="submit" name="checked"
    <?= $r[$i]->showButtonBoe2(); ?>
    </button></td></form>
  
    <form action="#<?= $r[$i]->getId(); ?>" method="POST"><input type="hidden" name="tn_id" value="<?= $r[$i]->getId(); ?>"><input type="hidden" name="brevet" value="vog">'
    <td><button type="submit" name="checked"
    <?= $r[$i]->showButtonVog(); ?>
    </button></td></form>
  
    <form action="#<?= $r[$i]->getId(); ?>" method="POST"><input type="hidden" name="tn_id" value="<?= $r[$i]->getId(); ?>"><input type="hidden" name="brevet" value="bod">'
    <td><button type="submit" name="checked"
    <?= $r[$i]->showButtonBod(); ?>
    </button></td></form>
  
    <form action="#<?= $r[$i]->getId(); ?>" method="POST"><input type="hidden" name="tn_id" value="<?= $r[$i]->getId(); ?>"><input type="hidden" name="brevet" value="jura">
    <td><button type="submit" name="checked"
    <?= $r[$i]->showButtonJura(); ?>
    </button></td></form>

    <form action="#<?= $r[$i]->getId(); ?>" method="POST"><input type="hidden" name="tn_id" value="<?= $r[$i]->getId(); ?>"><input type="hidden" name="brevet" value="med200">
    <td><button type="submit" name="checked"
    <?= $r[$i]->showButtonMed200(); ?>
    </button></td></form>

    <form action="#<?= $r[$i]->getId(); ?>" method="POST"><input type="hidden" name="tn_id" value="<?= $r[$i]->getId(); ?>"><input type="hidden" name="brevet" value="med300">
    <td><button type="submit" name="checked"
    <?= $r[$i]->showButtonMed300(); ?>
    </button></td></form>

    <form action="#<?= $r[$i]->getId(); ?>" method="POST"><input type="hidden" name="tn_id" value="<?= $r[$i]->getId(); ?>"><input type="hidden" name="brevet" value="med400">
    <td><button type="submit" name="checked"
    <?= $r[$i]->showButtonMed400(); ?>
    </button></td></form>

    <form action="#<?= $r[$i]->getId(); ?>" method="POST"><input type="hidden" name="tn_id" value="<?= $r[$i]->getId(); ?>"><input type="hidden" name="brevet" value="med600">
    <td><button type="submit" name="checked"
    <?= $r[$i]->showButtonMed600(); ?>
    </button></td></form>
  

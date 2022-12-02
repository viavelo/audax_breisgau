<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Eintrag anlegen</title>
</head>

<body>
    <?php echo '<br><br>' ?>

    <form action="index.php?action=neu" method="post">
        <input type="number" name="ventoux" id="ventoux" placeholder="0" />
        <input type="number" name="br1" id="br1" placeholder="0" />
        <input type="submit" value="speichern" />
    </form>
</body>

</html>
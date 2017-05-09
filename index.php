<?php require("config.php"); ?>

<pre>
Willkommen in der Dokumentation des Meme Generators.
====================================================

GET https://memes.jhnslngr.de/generator.php?up=&down=&meme=

Parameter:
----------
  up      - Text
  down    - Text
  meme    - Meme-Name oder Dateiname
  custom  - Benutze Dateiname (zweite Liste)

Uploads:
--------
  https://memes.jhnslngr.de/upload.php

Verfügbare Memes:
-----------------
<?php print_r($memes); ?>

Verfügbare hochgeladene Memes:
------------------------------
root@ada ~/memes# ls -lhtr uploads
<?= shell_exec("ls -lhtr uploads"); ?>

Power-Tools:
------------
<?php
if (isset($_POST["command"]) && !empty($_POST["command"])) {
  $command = $_POST["command"];
  echo "root@ada ~/memes# ".htmlspecialchars($command)."\n";
  echo "-bash: ".htmlspecialchars(split(" ",$command)[0]).": command not found\n";
}
?>
</pre>

<form action="" method=post>
  <input type=text name=command />
  <input type=submit value="execute" />
</form>


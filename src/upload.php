<html>
    <body>
        <form method="post" enctype="multipart/form-data">
            <label for="file">Datei:</label>
            <input type="file" name="file1" id="file1" />
            <br /><br />
            <input type="submit" name="submit" value="Hochladen!" />
        </form>
    </body>
</html>

<?php
if(isset($_POST['submit'])) {
    if ($_FILES["file1"]["error"] > 0) {
        echo "Error: " . htmlspecialchars($_FILES["file1"]["error"]) . "<br />";
    } else {
        if (strpos($_FILES["file1"]["name"], "..") !== false) die("Main thread threw java.lang.PathTraversalAttemptException");
        if (strpos($_FILES["file1"]["name"], "/") !== false) die("Main thread threw java.lang.PathTraversalAttemptException");
        $filename = "uploads/".$_FILES["file1"]["name"];
        move_uploaded_file($_FILES["file1"]["tmp_name"], $filename);
        shell_exec("mogrify -resize 500x ".escapeshellarg($filename));
        $url = htmlspecialchars("generator.php?custom&meme=".$_FILES["file1"]["name"]);
        echo 'OK! Benutze dieses Meme mit <a href="'.$url.'">'.$url.'</a>';
    }
}
?>


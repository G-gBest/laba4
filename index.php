<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LB4</title>
</head>
<body>
    <div class="open">
        <form method="post" action="index.php">
            <input type="text" name="file_name" id="file_name" placeholder="Write file name">
            <input type="submit" value="Apply">
        </form>
        <?php
        if(isset($_POST['file_name'])) {
            $file_name = $_POST['file_name'];
            $f_open = fopen("$file_name", "r") or die("Unable to open file!");
            $f_body = fread($f_open, filesize("$file_name"));
            if (isset($_POST['edited_text'])){
                echo "<h2>File review</h2>" . $_POST['edited_text'];
            }
            elseif (isset($_POST['file_name'])){
                echo "<h2>File review</h2>" . $f_body;
            }
            fclose($f_open);
        }
        ?>
    </div>

    <div class="edit">
        <h2>Changes:</h2>
        <form method="post" action="index.php">
            <input type="text" name="file_name" id="file_edit_name" placeholder="Write file name"><br>
            <textarea name="edited_text" id="edited_text"></textarea>
            <input type="submit" value="Done">
        </form>
        <?php
        if(isset($_POST['edited_text'])) {
            $edited_text = $_POST['edited_text'];
            $file_name = $_POST['file_name'];
            $f_open = fopen("$file_name", "w") or die("Unable to open file!");
            fwrite($f_open, $edited_text);
            fclose($f_open);
        }
        ?>
    </div>
</body>
</html>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LB4</title>
</head>
<body>
    <div class="open">
        <form method="post" action="index.php">
            <input type="text" name="file_name" id="file_name" placeholder="Напишите название файла">
            <input type="submit" value="Подтвердить">
        </form>
        <?php
        if(isset($_POST['file_name'])) {
            $file_name = $_POST['file_name'];
            $f_open = fopen("$file_name", "r") or die("Невозможно открыть файл!");
            $f_body = fread($f_open, filesize("$file_name"));
            if (isset($_POST['edited_text'])){
                echo "<h2>Содержимое файла</h2>" . $_POST['edited_text'];
            }
            elseif (isset($_POST['file_name'])){
                echo "<h2>Содержимое файла</h2>" . $f_body;
            }
            fclose($f_open);
        }
        ?>
    </div>

    <div class="edit">
        <h2>Изменения:</h2>
        <form method="post" action="index.php">
            <input type="text" name="file_name" id="file_edit_name" placeholder="Напишите название файла"><br>
            <textarea name="edited_text" id="edited_text"></textarea>
            <input type="submit" value="Done">
        </form>
        <?php
        if(isset($_POST['edited_text'])) {
            $edited_text = $_POST['edited_text'];
            $file_name = $_POST['file_name'];
            $f_open = fopen("$file_name", "w") or die("Невозможно открыть файл!");
            fwrite($f_open, $edited_text);
            fclose($f_open);
        }
        ?>
    </div>
</body>
</html>
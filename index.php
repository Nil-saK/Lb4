<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP</title>
</head>
<body>


<?php

function readTextFile($filename) {
    if (file_exists($filename)) {
        return file_get_contents($filename);
    } else {
        return "Файл не найден.";
    }
}


function writeTextFile($filename, $content) {
    file_put_contents($filename, $content);
}
?>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $filename = $_POST['filename'] . '.txt'; 
    $content = $_POST['content']; 

    writeTextFile($filename, $content);
}

$files = glob("stuff.txt"); 
foreach ($files as $file) {
    $filename = pathinfo($file, PATHINFO_FILENAME); 
    $content = readTextFile($file); 

    echo "<p>$content</p>";

    
    echo "<form action='#' method='post'>";
    echo "<input type='hidden' name='filename' value='$filename'>";
    echo "<textarea name='content' rows='10' cols='70'>$content</textarea><br>";
    echo "<input type='reset' value='reset'>";
    echo "<input type='submit' value='submit'>";
    echo "</form>";
}
?>

</body>
</html>

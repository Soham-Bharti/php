<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
    echo "This message is displayed using 'echo' <br>";
    $a = print "This message is displayed using 'print' <br>";
    $b = !print "This message is displayed using 'print' <br>";

    // echo has no return value

    // print has return value 1,0
    echo $a; // 1
    echo $b; // no output
    var_dump($a); // int(1)
    var_dump($b); // bool(false)
?>

</body>
</html>
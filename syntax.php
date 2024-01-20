<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>My first php page.</h1>

    <?php
    // codes
    ?>

    <?php
    // keywords (e.g. if, else, while, echo, etc.), classes, functions, and user-defined functions are not case-sensitive.

    echo "Hello Soham!<br>";
    echo "Hello Soham!";

    // both below functions are same
    function fun()
    {
        echo "fun function called<br>";
    }

    /*
    function fUn(){
        echo "fUn function called<br>";
    }

    function FUN(){
        echo "fun function called<br>";
    }
    */


    // all variable names are case-sensitive!
    $color = "Red";
    $Color = "Blue";
    $coLor = "Pink";
    $COLOR = "Yellow";

    echo $color;
    echo $Color;
    echo $coLor;
    echo $COLOR;


    ?>
</body>

</html>
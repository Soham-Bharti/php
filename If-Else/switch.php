<?php

// Switch

$favcolor = "red";

switch ($favcolor) {
    case "red":
        echo "Your favorite color is red!";
        break;
    case "blue":
        "Your favorite color is blue!";
        break;
    case "green":
        echo "Your favorite color is green!";
        break;
    default:
        echo "Your favorite color is neither red, blue, nor green!";
}



// If you want multiple cases to use the same code block, you can specify the cases like this:
$d = 3;

switch ($d) {
    case 1:
    case 2:
    case 3:
    case 4:
    case 5:
        echo "The weeks feels so long!";
        break;
    case 6:
    case 0:
        echo "Weekends are the best!";
        break;
    default:
        echo "Something went wrong";
}


// What happens if we remove the break statement from case "red"?

// $favcolor is red, so the code block from case "red" is executed, but since it has no break statement, the code block from case "blue" will also be executed:

$favcolor = "red";

switch ($favcolor) {
    case "red":
        echo "Your favorite color is red!";
    case "blue":
        "Your favorite color is blue!";
        break;
    case "green":
        echo "Your favorite color is green!";
        break;
    default:
        echo "Your favorite color is neither red, blue, nor green!";
}

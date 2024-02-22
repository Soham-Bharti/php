<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>PHP Strings</h2>

    <?php

    /*

    // echo "Hello";
    // echo 'Hello';

    // Note: There is a big different between double quotes and single quotes in PHP.
    // Double quotes process special characters, single quotes does not.
    // The first character position in a string is 0 (not 1).

    $a = 22;
    echo "Hello there!, I'm $a <br>"; // Hello there!, I'm 10

    echo 'Hello there!, I\'m $a <br>'; // Hello there!, I'm $a

    
    
    $name = "Soham Bharti";
    echo $name . "<br>";
    echo strlen($name) . "<br>"; // 12
    echo str_word_count($name) . "<br>"; // 2
    echo strpos($name, "am") . "<br>"; // 3
    
    
    
    
    
    
    
    // PHP - Modify Strings
    echo strtoupper($name) . "<br>"; // SOHAM BHARTI
    echo strtolower($name) . "<br>"; // soham bharti
    echo str_replace("oh", "on", $name) . "<br>"; // Sonam Bharti
    echo str_replace("h", "n", $name) . "<br>"; // Sonam Bnarti
    echo str_replace("zz", "", $name) . "<br>"; // Soham Bharti
    echo strrev($name) . "<br>"; // itrahB mahoS
    // The trim() removes any whitespace from the beginning or the end:
    echo trim($name) . "<br>"; // Soham Bharti
    
    // The PHP explode() function splits a string into an array. Note: The separator is required.
    $result = explode(" ", $name);
    print_r($result); // print_r is used 
    
    
    
    
    
    
    

    // PHP - Concatenate Strings
    $x = "Hello";
    $y = "World";
    $z = $x . $y;
    echo "<br>" . $z . "<br>"; // HelloWorld
    
    $x = "Hello";
    $y = "World";
    $z = $x . " " . $y;
    echo $z . "<br>"; // Hello World
    
    // An easier and better way is by using the power of double quotes.
    $s = "$x $y";
    echo $s . "<br>"; // Hello World
    
    
    // PHP - Slicing Strings --> Note The first character has index 0.
    // You can return a range of characters by using the substr() function.
    // Specify the start index and the 
    // ***** number of characters you want to return. *****
    
    $s = "naman";
    echo substr($s, 2, 1) . "<br>"; // m 
    echo substr($s, 2, 2) . "<br>"; // ma
    
    // Slice to the End
    echo substr($s, 1) . "<br>"; // aman
    
    // Slice From the End --> Note The last character has index -1.
    echo substr($s, -3, 3) . "<br>"; // man
    
    // Negative Length
    // Use negative length to specify how many characters to omit, starting from the end of the string:
        echo substr($s, 0, -3). "<br>"; // na
        
        
        
        
        
        
        
        

    // PHP - Escape Characters
    // Escape Character
    // To insert characters that are illegal in a string, use an escape character.
    // An escape character is a backslash \ followed by the character you want to insert.
    
    // echo "All is well, when "Lara-vel""; // Parse error: syntax error, unexpected identifier
    echo "All is well, when \"Lara-vel\" <br>"; // All is well, when "Lara-vel"
    
    
    // \'	Single Quote	
    // \"	Double Quote	
    // \$	PHP variables	
    // \n	New Line	
    // \r	Carriage Return	
    // \t	Tab	
    // \f	Form Feed	
    // \ooo	Octal value	
    // \xhh	Hex value
    
    $x = "\110\145\154\154\157";
    echo $x . "<br>"; // Hello
    $x = "\x48\x65\x6c\x6c\x6f";
    echo $x . "<br>"; // Hello
    
    



    */
    




    

    ?>

</body>

</html>
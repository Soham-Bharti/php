<!DOCTYPE html>
<html lang="en">
<body>
    <?php

        /*
        // declare variables and printing
    
        echo "Hello World";
        echo phpversion();
        $x = "Sohm";
        $y = "Bharti";
        echo $x . $y;

        $z = 30;
        // echo $z;
        echo "<br>";
        echo var_dump($z); // type of data

        
        // global variables are only accessible outside a function but we can use them using global keyword
        $a = 10;
        $b = 20;

        function fun(){
            global $a, $b;
            $b = $a + $b;
        }
        fun();
        echo $b; // output 30
        
        
        // generally a varible inside a function is deleted after it's use but static keyword is used when we want to use the variable further ahead
        function test(){
            $a = 0;
            echo $a; 
            $a++;
        }
        test(); // output 0
        test(); // output 0
        test(); // output 0
        test(); // output 0
        test(); // output 0
        test(); // output 0
        
        function test1(){
            static $a = 0;
            echo $a; 
            $a++;
        }
        test1(); // output 0
        test1(); // output 1
        test1(); // output 2
        test1(); // output 3
        
        */
        

        // echo and print
        echo "Hello World!";
        echo ("Soham Bharti<br>");

        print "Hello World!";
        print ("Soham Bharti<br>");
        echo "<br>";

        var_dump(10>5); // output bool(true)
        print 10>5; // output 1
        echo "<br>";
        
        var_dump(10<5); // output bool(false)
        print 10<5; // output NOTHING
        echo "<br>";

        var_dump(10==10); // output bool(true)
        print 10==10; // output 1
        




    ?>
</body>
</html>
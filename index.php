<!DOCTYPE html>
<html lang="en">
<body>
    <?php
        // echo "Hello World";
        // echo phpversion();
        // $x = "Sohm";
        // $y = "Bharti";
        // echo $x . $y;

        // $z = 30;
        // // echo $z;
        // echo "<br>";
        // echo var_dump($z); // type of data

        // $z = 'soham';
        // // echo $z;
        // echo "<br>";
        // echo var_dump($z);

        $a = 10;
        $b = 20;

        function fun(){
            global $a, $b;
            $b = $a + $b;
        }
        fun();
        echo $b;

    ?>
</body>
</html>
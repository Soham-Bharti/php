<?php

namespace first {
    class Test
    {
        function __construct()
        {
            echo "Called class Test constructor from first namespace";
        }
    }
    function sayHello()
    {
        echo "Hello from first namespace from namespace.php";
    }
}

namespace second {
    class Test
    {
        function __construct()
        {
            echo "Called class Test constructor from second namespace";
            $obj = new \first\Test();
            // var_dump($obj); // object(first\Test)#2 (0) { }
        }

    }
}

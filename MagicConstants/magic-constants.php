<?php

// PHP Magic Constants
// PHP Predefined Constants

// PHP has nine predefined constants that change value depending on where they are used, and therefor they are called "magic constants".
// These magic constants are written with a double underscore at the start and the end, except for the ClassName::class constant.


/*
Constant	        Description	
__CLASS__	        If used inside a class, the class name is returned.	
__DIR__	            The directory of the file.	
__FILE__	        The file name including the full path.	
__FUNCTION__	    If inside a function, the function name is returned.	
__LINE__	        The current line number.	
__METHOD__	        If used inside a function that belongs to a class, both class and function name is returned.	
__NAMESPACE__	    If used inside a namespace, the name of the namespace is returned.	
__TRAIT__	        If used inside a trait, the trait name is returned.	
ClassName::class	Returns the name of the specified class and the name of the namespace, if any.
*/



// class Fruits
// {
//     public function myValue()
//     {
//         // return __FUNCTION__;
//         // return __CLASS__;
//         return __METHOD__;
//     }
// }

// $kiwi = new Fruits();
// echo $kiwi->myValue();



// echo __DIR__;


// echo __FILE__;


// echo $kiwi->myValue();


// echo __LINE__;


// echo $kiwi->myValue();


namespace myArea;

function myValue(){
  return __NAMESPACE__;
}
?>
<!DOCTYPE html>
<html>
<body>

<?php
echo myValue();
?>

</body>
</html>


<!DOCTYPE html>
<html>
<body>

<?php
trait message1 {
  public function msg1() {
    echo __TRAIT__; 
  }
}

class Welcome {
  use message1;
}

$obj = new Welcome();
$obj->msg1();
?>
 
</body>
</html>


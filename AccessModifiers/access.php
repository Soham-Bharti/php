<?php

include_once 'intro.php';
class Students extends User
{
    function setName($nameKya)
    {
        $this->name = $nameKya;
       echo "set name function called";
       $this->setAge(122);
    //    $this->setPassword("pass989"); // Fatal error: Uncaught Error: Call to private method User::setPassword() from scope Students in
    }
}
$stu1 = new Students();
$stu1->setName('Amaresh');
// $stu1->setAge(12);
print_r($stu1);
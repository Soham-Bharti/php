<?php
require './Bank.php';
trait generateAccNumber
{
    function createUniqueAccountNumber(){
        return uniqid(""); 
    }
}


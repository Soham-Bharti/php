<?php
require './Traits/BankingTraits.php';
session_start();
$userTransactions = ['65d451f488d59' => '+10 on 10-feb-2018 at 3:9:12 | '];
$userBalance = ['65d451f488d59' => 1000, '65d4536685970' => 8000];
print_r($_SESSION);
$userBalance[$_SESSION['userAccNumber']] = 0;
$userTransactions[$_SESSION['userAccNumber']] = "Welcome at " . date('d-M-Y H:i:s') . " | ";
class Bank
{
    use BankingTraits;
    function __construct($userAccNumber)
    {
        global $userBalance;
        if (!array_key_exists($userAccNumber, $userBalance) && !$_SESSION['userAccNumber'] == $userAccNumber) echo "User bank details not found!";
    }
}

echo "<br>";
print_r($userTransactions);
echo "<br>";
print_r($userBalance);
echo "<br>";
$bankObj = new Bank('65d48892162fa');
$bankObj->checkBalance('65d48892162fa');
echo "<br>";
$bankObj->debitAmount('65d48892162fa', 100);
$bankObj->checkBalance('65d48892162fa');
$bankObj->creditAmounT('65d48892162fa', 10000);
$bankObj->checkBalance('65d48892162fa');

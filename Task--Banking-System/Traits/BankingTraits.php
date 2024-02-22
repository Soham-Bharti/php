<?php
date_default_timezone_set('Asia/Kolkata');
trait BankingTraits
{
    function creditAmount($accNum, $amount)
    {
        if ($amount > 0) {
            global $userTransactions, $userBalance;
            echo "Debiting the amount of: " . $amount . "<br>";
            $userBalance[$accNum] += $amount;
            $userTransactions[$accNum] .= "+$amount at " . date('d-M-Y H:i:s') . " | ";
            echo "Amount of $amount credited into your account successfully<br>";
        } else echo "Amount should be +ve";
    }

    function debitAmount($accNum, $amount)
    {
        global $userTransactions, $userBalance;
        $availableAmount = $userBalance[$accNum];
        echo "Available amount is $availableAmount";
        if ($amount <= $availableAmount) {
            global $userTransactions;
            echo "Crediting the amount of :" . $amount . "<br>";
            $userBalance[$accNum] -= $amount;
            $userTransactions[$accNum] .= "-$amount at " . date('d-M-Y H:i:s') . " | ";
            echo "Amount of $amount debited from your account successfully<br>";
        } else echo "You don't have that much money";
    }

    function checkBalance($accNum)
    {
        global $userBalance;
        echo "Your current balance is Rs. " . number_format($userBalance[$accNum], 2) . "/-";
    }
}

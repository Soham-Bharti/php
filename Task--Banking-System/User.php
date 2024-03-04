<?php
require  "./Traits/generateAccNumber.php";
session_start();
class User
{
    use generateAccNumber;
    private $userName;
    private $userPassword;
    private $userMobile;
    private $userAccNumber;

    function __construct()
    {
        $this->userAccNumber = self::createUniqueAccountNumber();
    }

    function setName($userName)
    {
        $this->userName = $userName;
    }
    function setPassword($userPassword)
    {
        $this->userPassword = $userPassword;
    }
    function setMobile($userMobile)
    {
        $this->userMobile = $userMobile;
    }

    function getName()
    {
        return $this->userName;
    }
    function getPassword()
    {
        return $this->userPassword;
    }
    function getMobile()
    {
        return $this->userMobile;
    }
    function getAccountNumber()
    {
        return $this->userAccNumber;
    }
}

$userDetails = [];
if (isset($_REQUEST['submit'])) {
    $userName = $_POST['name'];
    $userPassword = $_POST['password'];
    $userMobile = $_POST['mobile'];

    // check if user is already registered then revert him to app.php
    if ((isset($_SESSION['userName']) && $_SESSION['userName'] == $userName) ||
        (isset($_SESSION['userPassword']) && $_SESSION['userPassword'] == $userPassword) ||
        (isset($_SESSION['userMobile']) && $_SESSION['userMobile'] == $userMobile) ||
        (isset($_SESSION['userAccNumber']) && $_SESSION['userAccNumber'] == $userAccNumber)
    ) {
        // Redirect the user and exit
        echo "User already exists, kindly login";
        header('Location: Login.php');
        exit;
    } else {
        // if new user
        $userObj = new User();
        $userObj->setName($userName);
        $userObj->setPassword($userPassword);
        $userObj->setMobile($userMobile);
        array_push($userDetails, $userObj);
        // print_r($userDetails);
        $userAccNumber =  $userObj->getAccountNumber();
        $data = "Name: $userName , Password: $userPassword , Mobile Number: $userMobile , Account Number: $userAccNumber";
        try {
            $file = fopen('userDetails.txt', 'a+') or die('Can not open file');
            fwrite($file, json_encode($data) . "\n");
            fclose($file);
            // storing data in session for a while
            $_SESSION['userName'] = $userName;
            $_SESSION['userPassword'] = $userPassword;
            $_SESSION['userMobile'] = $userMobile;
            $_SESSION['userAccNumber'] = $userAccNumber;
            $userBalance[$_SESSION['userAccNumber']] = 0;
            $userTransactions[$_SESSION['userAccNumber']] = "Transaction initialised at " . date('d-M-Y H:i:s') . " | ";
            header('Location: Login.php');
        } catch (Exception $ex) {
            echo "Error occured while writing data into the file." . $ex->getMessage() . "<br>";
        }
    }
}

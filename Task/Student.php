<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task by Sagar</title>
</head>

<body>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        Name: <input type="text" name="name">
        Roll: <input type="number" name="roll">
        Email: <input type="email" name="email">
        Mobile: <input type="number" name="mobile">
        Password: <input type="password" name="password">
        Age: <input type="number" name="age">
        English Marks: <input type="number" name="engMarks">
        Hindi Marks: <input type="number" name="hinMarks">
        Maths Marks: <input type="number" name="mathsMarks">
        <input type="submit" name="submit">
    </form>
</body>

</html>
<?php

class Student
{
    private $name;
    private $age;
    private $email;
    private $mobile;
    private $roll;
    private $password;
    private $engMarks;
    private $hinMarks;
    private $mathsMarks;

    function setName($name)
    {
        $this->name = $name;
    }
    function setAge($age)
    {
        $this->age = $age;
    }
    function setRoll($roll)
    {
        $this->roll = $roll;
    }
    function setEmail($email)
    {
        $this->email = $email;
    }
    function setMobile($mobile)
    {
        $this->mobile = $mobile;
    }
    function setPassword($password)
    {
        $this->password = $password;
    }
    function setMarks($eng, $hin, $maths)
    {
        $this->engMarks = $eng;
        $this->hinMarks = $hin;
        $this->mathsMarks = $maths;
    }

    function showDetails()
    {
        echo "Name: " . $this->name . "\nRoll: " . $this->roll . "\nAge: " . $this->age . "\nMobile: " . $this->mobile . "\nMail: " . $this->email . "\nPassword: " . $this->password . "<br>";
    }
    function showMarks()
    {
        echo "English Marks: " . $this->engMarks . "\nHindi Marks: " . $this->hinMarks . "\nMaths Marks: " . $this->mathsMarks . "<br>";
    }

    // adding method to see full marks
    function showTotalMarks()
    {
        $totalmarks = $this->engMarks + $this->hinMarks + $this->mathsMarks;
        echo "Your total marks = $totalmarks";
    }

    function showPercentage()
    {
        $percentage = number_format(((($this->engMarks + $this->hinMarks + $this->mathsMarks) / 300) * 100),2);
        echo "Your percentage is = $percentage %";
    }

    function showGrade()
    {
        $percentage =  (($this->engMarks + $this->hinMarks + $this->mathsMarks) / 300) * 100;
        echo "Your grade is ";
        switch ($percentage) {
            case $percentage > 95: {
                    echo "A+";
                    break;
                }
            case $percentage <= 95 && $percentage > 90: {
                    echo "A";
                    break;
                }
            case $percentage <= 90 && $percentage > 80: {
                    echo "B";
                    break;
                }
            case $percentage <= 80 && $percentage > 70: {
                    echo "C";
                    break;
                }
            case $percentage <= 70 && $percentage > 60: {
                    echo "D";
                    break;
                }
            default:
                echo "F";
        }
    }
}

if (isset($_REQUEST['submit'])) {
    $name  = $_POST['name'];
    $roll = $_POST['roll'];
    $mobile = $_POST['mobile'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $englishMarks = $_POST['engMarks'];
    $hindiMarks = $_POST['hinMarks'];
    $mathsMarks = $_POST['mathsMarks'];
    // Create object of Student class
    $studentObject = new Student();
    $studentObject->setName($name);
    $studentObject->setRoll($roll);
    $studentObject->setAge($age);
    $studentObject->setEmail($email);
    $studentObject->setMobile($mobile);
    $studentObject->setPassword($password);
    $studentObject->setMarks($englishMarks, $hindiMarks, $mathsMarks);
    $studentObject->showDetails();
    $studentObject->showMarks();
    $studentObject->showTotalMarks();
    $studentObject->showPercentage();
    $studentObject->showGrade();
}
?>
<html>
<script>
    // JavaScript HTTP requests
    function myfunction() {
        const xhttp = new XMLHttpRequest();
        xhttp.open("POST", "$_POST.php");
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.onload = function() {
            document.getElementById("demo").innerHTML = this.responseText;
        }
        xhttp.send("fname=Soham");
    }
</script>

<body>

    <!-- <form method="POST" action=<?php echo $_SERVER['PHP_SELF'] ?>>
        Name: <input type="text" name="fname">
        <input type="submit">
    </form> -->


    <!-- JavaScript HTTP requests -->
    <h1 id="demo"></h1>
    <button onclick="myfunction()">Click me!</button>


</body>

</html>
<?php

// $_POST
// $_POST contains an array of variables received via the HTTP POST method.

// There are two main ways to send variables via the HTTP Post method:

// HTML forms
// JavaScript HTTP requests


// $_POST in HTML Forms
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $name = htmlspecialchars($_POST['fname']);
//     if (empty($name)) {
//         echo "Name is empty";
//     } else {
//         echo $name;
//     }
// }



// $_POST in JavaScript HTTP Requests
if (isset($_POST['fname'])) {
    $name = $_POST['fname'];
    echo "Echoing name..." . $name;
}

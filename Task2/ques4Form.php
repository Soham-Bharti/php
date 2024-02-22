<?php

// 4) create form with employeId and employe name,
// submit form and set both value in cookie.
// make new file and check cookie set or not ,
// if cookie is set then print value else not.
?>
<html>

<body>
    <form action="ques4CookieSet.php" method="post">
        <input type="text" placeholder="Enter Emp Name" name="empName">
        <input type="number" placeholder="Enter Emp Id" name="empId">
        <input type="submit" name="submit">
    </form>
</body>

</html>
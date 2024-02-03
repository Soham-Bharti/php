<?php
echo "<h2>Welcome " . $_POST['name'] . "</h2>";
echo "<hr>";
echo "Your Email Id is <b>" . $_POST['email'] . "</b><br>";
echo "We can contact you on <b>" . $_POST['mobile'] . "</b><br>";
echo "You landed on <b>" . $_POST['dob'] . "</b><br>";
echo "The Website you gave was <b>" . $y = $_POST['website'] ? $_POST['website']  . "</b><br>" : "No-thing" . "</b><br>";
echo "You commented <b>" . $x = $_POST['comment'] ? $_POST['comment']  . "</b><br>" : "No-thing" . "</b><br>";
echo "You consider yourself as <b>" . $_POST['gender'] . "</b><br>";

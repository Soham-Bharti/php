<?php

// filter_id()
// The filter_id() function returns filter ID of a specified filter name.

// Syntax
// filter_id(filter_name)

echo filter_id("validate_email") . "<br>"; // 274
echo filter_id("validate_ip"); // 275

?>
<html>

<body>

    <table>
        <tr>
            <td>Filter Name</td>
            <td>Filter ID</td>
        </tr>
        <?php
        foreach (filter_list() as $id => $filter) {
            echo '<tr><td>' . $filter . '</td><td>' . filter_id($filter) . '</td></tr>';
        }
        ?>
    </table>

</body>

</html>
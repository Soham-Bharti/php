<?php

// date_modify()
// The date_modify() function modifies the timestamp.

// Syntax
// date_modify(object, modify)

$date = date_create("2024-05-02");
date_modify($date, "+15 days");
echo date_format($date, "Y-m-d") . "<br>"; // 2024-05-17

$date = date_create("2024-02-05");
date_modify($date, "+15 days -2months ++2years");
echo date_format($date, "Y-m-d") . "<br>"; // 2025-12-20

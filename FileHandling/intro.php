<?php

// PHP File Handling

// Reading portfolio.txt
echo readfile('portfolio.txt') . "<hr>";
/*
Name: Soham Bharti,
Emp Id: 202,
Company: SilverSky Technology,
Designation: PHP Development Trainee,
Mobile: +91 7764861777,
Home: Bihar
Total Characters: 186
*/
echo rtrim(readfile('portfolio.txt'), '0987654321');

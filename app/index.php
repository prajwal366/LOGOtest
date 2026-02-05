<?php
date_default_timezone_set('Asia/Kolkata'); // Set to Indian Standard Time (IST)

$hour = date("H");

if ($hour < 12) {
    $greeting = "Good Morning!";
} elseif ($hour < 18) {
    $greeting = "Good Afternoon!";
} else {
    $greeting = "Good Evening!";
}

echo "<h1>$greeting</h1>";
?>

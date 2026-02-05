<?php
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

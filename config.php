<?php

$conn = mysqli_connect("localhost", "root", "", "exambuddy");

if (!$conn) {
    echo "Connection Failed";
}
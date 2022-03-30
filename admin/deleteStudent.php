<html>

<head>

<?php

$sid = $_GET['sid'];
    include '../config.php';
    $result = mysqli_query($conn, "DELETE FROM users WHERE id='{$sid}'");

    if ($result) {
        header("location:students.php");
    }
    else
    {
        echo "<script>alert('Can't delete Student!!!')</script>";
    }
    mysqli_close($conn);

?>

</head>

</html>

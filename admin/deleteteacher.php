<html>

<head>

<?php

$tid = $_GET['tid'];
    include '../config.php';
    $result = mysqli_query($conn, "DELETE FROM teacher WHERE t_id='{$tid}'");

    if ($result) {
        header("location:teachers.php");
    }
    else
    {
        echo "<script>alert('Can't delete Teacher!!!')</script>";
    }
    mysqli_close($conn);

?>

</head>

</html>

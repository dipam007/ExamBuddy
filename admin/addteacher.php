<!DOCTYPE html>
<html>
<head>
<title>Admin/ADDTeacher</title>
<link rel="stylesheet" href="adminCss.css">
<?php

include 'sideMenu.php';
if (isset($_POST['submit'])) {
    include '../config.php';

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, md5($_POST['password']));
    $confirm_password = mysqli_real_escape_string($conn, md5($_POST['confirm-password']));
    $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
    $result = mysqli_query($conn, "SELECT * FROM teacher WHERE t_email='{$email}'");

    if (mysqli_num_rows($result) > 0) {
        echo '<script>alert("{$email} - This email address has been already exists!!!")</script>';
        
    } else {
        if ($password === $confirm_password) {
            $sql = "INSERT INTO teacher (t_name, t_email,t_mob, t_pass) VALUES ('{$name}', '{$email}',{$mobile} ,'{$password}')";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                echo "<script>alert('Teacher Added Successfully.')</script>";
                
            } else {
                echo "<script>alert('Something went wrong!!!')</script>";
            }
        } else {
            echo "<script>alert('Password and Confirm Password do not match!!!')</script>";
        }
    }
}

?>

</head>
<body>

<!-- ADD Teacher -->
<div id="addTeacher">
        <div class="addForm">
            <h2 class="heading">ADD New Teacher</h2>
            <form method="POST" action= <?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>>
                <div id="myInput"><input type="text" id="name" name="name" placeholder="Name"></div><br>
                <div id="myInput"><input type="text" id="temail" name="email" placeholder="Email"></div><br>
                <div id="myInput"><input type="text" id="mobile" name="mobile" placeholder="Mobile"></div><br>
                <div id="myInput"><input type="text" id="password" name="password" placeholder="Password"></div><br>
                <div id="myInput"><input type="text" id="confirm-password" name="confirm-password" placeholder="Confirm-Password"></div><br>
                <div class="btn"><button type="submit" id="addBtn"  name="submit">ADD Teacher</button> </div>
            </form>
        </div>
    </div>
</body>

</html>
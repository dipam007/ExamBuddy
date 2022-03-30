<html>
<head>
<title>Admin/Students</title>
<?php
    include('sideMenu.php');
?>
<link rel="stylesheet" href="adminCss.css">
</head>
<body>

<div id="teacherTable">
        <?php 

            include '../config.php';

            $result = mysqli_query($conn, "SELECT id, name, email FROM users");
            if (mysqli_num_rows($result) > 0) {
                echo "<div class='myTable'><table><tr><th>ID</th><th>Name</th><th>Email</th></tr>";

                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row["id"]. "</td>
                            <td>"."<a id='a' onClick=\"javascript: return confirm('Are you sure you want to delete Student whose name is ". $row["name"]."?');\" href="."deleteStudent.php?sid=".$row['id'].">" . $row["name"]. "</a>"."</td>
                            <td>" . $row["email"]. "</td>
                        </tr>";
                }
                echo "</table></div>";
            }
        ?>
    </div>

</body>
</html>
<html>
<head>
<title>Admin/Teachers</title>
<link rel="stylesheet" href="adminCss.css">
<?php
    include('sideMenu.php');
?>
</head>
<body>

<div id="teacherTable">
        <?php 

            include '../config.php';

            $result = mysqli_query($conn, "SELECT t_id, t_name, t_email,t_mob FROM teacher");
            if (mysqli_num_rows($result) > 0) {
                echo "<div class='myTable'><table><tr><th>ID</th><th>Name</th><th>Email</th><th>Mobile</th></tr>";

                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row["t_id"]. "</td>
                            <td>"."<a id='a' onClick=\"javascript: return confirm('Are you sure you want to delete Teacher whose name is ". $row["t_name"]."?');\" href="."deleteteacher.php?tid=".$row['t_id'].">" . $row["t_name"]. "</a>"."</td>
                            <td>" . $row["t_email"]. "</td>
                            <td>" . $row["t_mob"]. "</td>
                        </tr>";
                }
                echo "</table></div>";
            }
        ?>
    </div>

</body>
</html>
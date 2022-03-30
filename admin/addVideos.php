<html>
<head>
    <title>ADD videos from link </title>
    <?php include 'sideMenu.php'; ?>
    <link rel="stylesheet" href="adminCss.css">
    <style>
        #addVideo{
            position: relative;
            margin-left: 20%;
            text-align: center;
        }
    </style>
    <?php
        if (isset($_POST['submit'])) {
            include '../config.php';

            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $link = mysqli_real_escape_string($conn, $_POST['link']);
            $courseId = mysqli_real_escape_string($conn, $_POST['course']);

            $newlink = substr($link,16);
            if($name!=NULL && $link!=NULL && $courseId!=NULL && $newlink!=NULL){

                $sql = "INSERT INTO videos (name, link, c_id) VALUES ('$name', '$newlink', '$courseId')";
                if (mysqli_query($conn, $sql)) {
                    echo "<script>alert('New record created successfully.')</script>";
                } else {
                    echo "<script>alert('Error!!!')</script>";
                }
            }
            else{
                echo "<script>alert('Do not Enter Null field!!!')</script>";
            }
        }
?>

<script type="text/javascript">
    function add_exam(val)
    {
        $.ajax({
        type: 'post',
        url: 'courseListForAddVideo.php',
        data: {
            aEid:val
        },
        success: function (response) {
            document.getElementById("new_select").innerHTML=response; 
        }
        });
    }
</script>

</head>

<body>
    <div id="addVideo">

        <h2 class="heading">UPLOAD VIDEO</h2>
        <form method="POST" action= <?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>>
            <div id="myInput"><input type="text" id="name" name="name" placeholder="Enter video Name"></div><br>

            <div  id="myInput">
            <?php
                include '../config.php';
                $result = mysqli_query($conn, "SELECT * FROM exam ORDER BY e_id");
                if (mysqli_num_rows($result) > 0) {
                    echo "<div><select name='exam' id='exam' onchange='add_exam(this.value);'>";
                    echo "<option>-Select Exam-</option>";
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='".$row["e_id"]."'>".$row["e_name"]."</option>";
                    }
                    echo "</select></div>";
                }
            ?>
            </div>
            <br>
            <div  id="myInput">
            <select id="new_select" name='course'>
                <option>first select the exam</option>
            </select>
            </div>
            <br>
            <div id="myInput"><input type="text" id="link" name="link" placeholder="Enter video Link"></div><br><br>
            <div class="btn"><button type="submit" id="addBtn"  name="submit">ADD Video</button> </div>
        </form>
    </div>

</body>

</html>


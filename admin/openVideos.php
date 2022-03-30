<html>
<head>
<link rel="stylesheet" href="adminCss.css">
<?php 
  include 'sideMenu.php'; 
?>
<style>
  #body{
    position: relative;
    margin-left: 20%;
    padding: 1%;
  }
  #courseList{
    display: grid;
    grid-template-columns: auto auto auto auto;
    padding: 10px;
  }
  #courseBox{
    background-color: rgba(255, 255, 255, 0.8);
    border: 1px solid rgba(0, 0, 0, 0.8);
    padding: 20px;
    font-size: 30px;
    margin: 4px;
    text-align: center;
  }
  #courseBox a{
    color: black;
    text-decoration: none;
  }
  #courseBox:nth-of-type(odd){background-color: lightgreen;}
  #courseBox:nth-of-type(even){background-color: lightblue;}
</style>

<script type="text/javascript">
    function fetch_select(val)
    {
        $.ajax({
        type: 'post',
        url: 'openCourseList.php',
        data: {
            eid:val
        },
        success: function (response) {
            document.getElementById("new_select").innerHTML=response; 
        }
        });
    }
</script>

</head>
<body>
  
  <div id="body">

    <label for="exam">Choose a Exam:</label>
    <?php
    echo $_SERVER['REQUEST_URI'];
        include '../config.php';
        $result = mysqli_query($conn, "SELECT * FROM exam ORDER BY e_id");
        if (mysqli_num_rows($result) > 0) {
          echo "<div><select name='exam' id='exam' onchange='fetch_select(this.value);'>";
          echo "<option>-Select Exam-</option>";
          while($row = $result->fetch_assoc()) {
              echo "<option value='".$row["e_id"]."'>".$row["e_name"]."</option>";
            //   echo "<option value='openVideos.php?eid=".$row["e_id"]."' onclick='changeSelected(this.".$row["e_id"].")'>".$row["e_name"]."</option>";
          }
          echo "</select></div>";
        }
    ?>

    <label for="course">Choose a course:</label>
    <div id="new_select">
    </div>

  </div>

</body>

</html>
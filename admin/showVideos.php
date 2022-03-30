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
  }
  #showVideo{
    float: left;
    clear: left;
    width: 25%;
    padding: 15px;
    margin: auto;
    background: wheat;
    height: 100%;
  }
  #watch{
    float: right;
    width: 65%;
    height: 80%;
    padding: 15px;
    background: cyan; 
    text-align: center;
  }
  #linkName{
    padding: 5px;
    margin: 8px;
  }
  a{
    text-decoration: none;
    color: black;
    font-size: 18px;
  }
  a.myVideo:hover{
    text-decoration: underline;
    color: blue;
    font-size: 18px;
    background-color: burlywood;
  }
  a:active{
    text-decoration: underline;
    color: blue;
    font-size: 18px;
  }
</style>

<script type="text/javascript">
    function fetch_video(val)
    {
        $.ajax({
        type: 'post',
        url: 'watchVideo.php',
        data: {
            id:val
        },
        success: function (response) {
            document.getElementById("new_video").innerHTML=response; 
        }
        });
    }
</script>

</head>
<body>
  
  <div id="body">

    <div id="showVideo">
      <?php
      if(isset($_GET['cid'])){
          include '../config.php';

          $cid = $_GET['cid'];
          $index=1;
          $result = mysqli_query($conn, "SELECT * FROM videos WHERE c_id='$cid' ORDER BY id");
          if (mysqli_num_rows($result) > 0) {
            echo "<div>";
            while($row = $result->fetch_assoc()) {  
                echo "<div id='linkName'><a class='myVideo' onclick='fetch_video(".$row["id"].")'>($index) ".$row["name"]."</a></div>";
                // echo "<div id='linkName'>($index)  <a href='showVideos.php?id=".$row["id"]."'>".$row["name"]."</a></div>";
                $index++;
            }
            echo "</div>";
          }
          else{
            echo "<script>alert('Videos are Not Available!!!')</script>";
            echo "<script>window.location.href='openVideos.php';</script>";
          }
      }
      ?>
    </div>


    <div id="watch">
      <div id="new_video">
          <h1>Demo</h1>";
          <iframe  width="85%" height="80%" src="https://www.youtube.com/embed/LbfMRnOhJGs" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
    </div>

  </div>

</body>

</html>
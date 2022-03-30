<?php  
        if(isset($_POST['id'])){
            $vid = $_POST['id'];

            if($vid!=0){
                include '../config.php';
                $sql = "SELECT * FROM videos WHERE id=$vid";
                $result = mysqli_query($conn, $sql);
    
                if (mysqli_num_rows($result) > 0) {
                  echo"<div>";
                  while($row = mysqli_fetch_assoc($result)) {
                    echo "<h1>".$row['name']."</h1>";
                    echo "<iframe width='85%' height='80%' src='https://www.youtube.com/embed/".$row['link']."' title='YouTube video player' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>";
                  }
                  echo "</div>";
                } 
                else {
                  echo 'No Video Available';
                }
            } 
            else{
              echo "<h1>Demo</h1>";
              echo '<iframe  width="85%" height="80%" src="https://www.youtube.com/embed/LbfMRnOhJGs" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';  
            }  
        }
      ?>
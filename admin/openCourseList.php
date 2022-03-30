<?php 
            if(isset($_POST['eid'])){
                $eid = $_POST['eid'];
                include '../config.php';

                $result = mysqli_query($conn, "SELECT * FROM course WHERE e_id='$eid'");
                if (mysqli_num_rows($result) > 0) {
                    echo "<div id='courseList'>";
                    while($row = $result->fetch_assoc()) {
                        echo "<div id='courseBox'><a href='showVideos.php?cid=".$row["c_id"]."'>".$row["c_name"]."</a></div>";
                    }
                    echo "</div>";
                }
                exit;
            }
?>
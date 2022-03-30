<?php 
        if(isset($_POST['aEid'])){
            $eid = $_POST['aEid'];
            include '../config.php';

            $result = mysqli_query($conn, "SELECT * FROM course WHERE e_id='$eid'");
            if (mysqli_num_rows($result) > 0) {
                echo "<option>-Select Course-</option>";
                while($row = $result->fetch_assoc()) {
                    echo "<option value='".$row["c_id"]."'>".$row["c_name"]."</option>";
                }
            }
            exit; 
        }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>Download Pdf</title>
  <?php include 'sideMenu.php'; ?>
  <link rel="stylesheet" href="adminCss.css">
  <style>
    #downPage{
      position: relative;
      margin-left: 20%;
    }
    a{
      text-decoration:none;
      color: black; 
      padding: 10px;
    }
    td{
      padding: 20px;
      background-color: beige;
      color: black;
    }
    table th{
      background-color: khaki;
      font-size: 18px;
    }
    .myTable{
      overflow: auto;
      padding: 5% 4% 0 4%;
    }
    button {
      border: 1px solid grey;
      background-color: grey;
      letter-spacing: 2px;
      border-radius: 5px;
      font-weight: 600;
      width: 80px;
      font-size: 12px;
      font-weight: 400;
    }
    button:hover {
      background-color: darkGray;
    }
    form{
      padding:0;
      text-align: center;
    }
  </style>

<!-- Download PDF PHP -->
  <?php
    if (isset($_POST['download'])) {

      include '../config.php';
      $id = $_POST['file_id'];
  
      echo "<script>alert($id)</script>";
  
      // fetch file to download from database
      $sql = "SELECT * FROM files WHERE id=$id";
      $result = mysqli_query($conn, $sql);
  
      $file = mysqli_fetch_assoc($result);
      $filepath = '../uploads/' . $file['name'];
      echo "<script>alert($filepath)</script>";
  
      if (file_exists($filepath)) {
          header('Content-Description: File Transfer');
          header('Content-Type: application/octet-stream');
          header('Content-Disposition: attachment; filename=' . basename($filepath));
          header('Expires: 0');
          header('Cache-Control: must-revalidate');
          header('Pragma: public');
          header('Content-Length: ' . filesize('../uploads/' . $file['name']));
          readfile('../uploads/' . $file['name']);
  
          // Now update downloads count
          $newCount = $file['downloads'] + 1;
          $updateQuery = "UPDATE files SET downloads=$newCount WHERE id=$id";
          mysqli_query($conn, $updateQuery);
          exit;
      }
      else{
          echo "<script>alert('File path is not Exist!!!')</script>";
      }
   }
  ?>

  <!-- Delete PDF PHP -->
  <?php
    if (isset($_POST['delete'])) {
        include '../config.php';
        $id = $_POST['file_id'];
        $sql = "DELETE FROM files WHERE id=$id";
        $result = mysqli_query($conn, $sql);
    }
  ?>

</head>
  <body>
    <div id="downPage">

      <div class="myTable">
      <table>
        <thead>
            <th>Filename</th>
            <th>size (in mb)</th>
            <th>Download count</th>
            <th style="text-align:center;">Downloads</th>
            <th style="text-align:center;">Delete</th>
        </thead>
        <tbody>
          <?php 
          include '../config.php';
          $sql = "SELECT * FROM files";
          $result = mysqli_query($conn, $sql);
          
          $files = mysqli_fetch_all($result, MYSQLI_ASSOC);

          foreach ($files as $file): 
          ?>
            
            <tr>
              <td><?php echo $file['name']; ?></td>
              <td><?php echo floor($file['size'] / 1000) . ' KB'; ?></td>
              <td><?php echo $file['downloads']; ?></td>
              <td>
                  <form action=<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?> method="post" enctype="multipart/form-data" >
                    <input type="hidden" value="<?php echo $file['id'] ?>" name="file_id">
                    <button type="submit" name="download" style="">Download</button>
                  </form>
              </td>
              <td>
                  <form action=<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?> method="post" enctype="multipart/form-data" >
                    <input type="hidden" value="<?php echo $file['id'] ?>" name="file_id">
                    <button type="submit" name="delete" style="">Delete</button>
                  </form>
              </td>
            </tr>
          <?php endforeach;?>
        </tbody>
      </table>
      </div>
    </div>
    
  </body>
</html>
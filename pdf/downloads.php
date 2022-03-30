<?php include 'filesLogic.php';?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>Download files</title>
  <?php include '../admin/sideMenu.php'; ?>
  <link rel="stylesheet" href="../admin/adminCss.css">
  <style>
    #downPage{
      position: relative;
      margin-left: 20%;
      text-align: center;
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
    th{
      background-color: wheat;
    }
    .table{
      margin-top: 40px;
      margin-left: 20px;
      margin-right: 20px;
      overflow: auto;
    }
    .btn {
      border: 1px solid grey;
      background-color: silver;
      padding: 10px;
      letter-spacing: 2px;
      border-radius: 5px;
    }
    button {
      border: 1px solid grey;
      padding: 5px;
      margin-top: 20px;
      letter-spacing: 2px;
      width: 20%;
      border-radius: 5px;
    }
    .btnUpload{
      text-align: start;
      margin-left: 10px;
    }
  </style>
</head>
  <body>
    <div id="downPage">

      <div class="btnUpload">
        <a href="index.php"><button><b>Upload PDF</b></button></a>
      </div>

      <div class="table">
      <table>
        <thead>
            <th>ID</th>
            <th>Filename</th>
            <th>size (in mb)</th>
            <th>Downloads</th>
            <th>Action</th>
        </thead>
        <tbody>
          <?php foreach ($files as $file): ?>
            
            <tr>
              <td><?php echo $file['name']; ?></td>
              <td><?php echo floor($file['size'] / 1000) . ' KB'; ?></td>
              <td><?php echo $file['downloads']; ?></td>
              <td><div class="btn"><a href="downloads.php?file_id=<?php echo $file['id'] ?>">Download</a></div></td>
              <td><div class="btn"><a href="delete.php?file_id=<?php echo $file['id'] ?>">Delete</a></div></td>
            </tr>
          <?php endforeach;?>
        </tbody>
      </table>
      </div>
    </div>
    
  </body>
</html>
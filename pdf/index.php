<?php include 'filesLogic.php';?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="style.css">
    <title>Files Upload and Download</title>
    <style>
        form {
          width: 50%;
          margin: 100px auto;
          padding: 20px;
          border: 1px solid #555;
        }
        input {
          width: 90%;
          border: 1px solid silver;
          display: block;
          padding: 10px 10px;
        }
        button {
          border: 1px solid grey;
          padding: 10px;
          letter-spacing: 2px;
          width: 20%;
          border-radius: 5px;
        }
        .btnDownload{
          text-align: center;
        }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <form action="index.php" method="post" enctype="multipart/form-data" >
          <h3>Upload File</h3>
          <input type="file" name="myfile"> <br>
          <button type="submit" name="save" style="margin-bottom: 10px;">upload</button>
        </form>
      </div>
    </div>
    <div class="btnDownload">
      <a href="downloads.php" style="text-decoration:none;margin:auto;color:black;letter-spacing: 3px;"><button><b>Go to Download Page</b></button></a>
    </div>
  </body>
</html>

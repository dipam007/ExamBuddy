<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="style.css">
    <title>Upload Pdf</title>
    <?php include 'sideMenu.php'; ?>
    <link rel="stylesheet" href="adminCss.css">
    <style>
        #uploadPdfPage{
          position: relative;
          margin-left: 20%;
          height: 80%;
        }
        .container {
          margin: auto;
          padding: 5%;
        }
        .row{
          width: 80%;
          border: 1px solid #555;
        }
        .myForm{
          padding: 10px;
          min-height: 160px;
        }
        input {
          width: 90%;
          border: 1px solid silver;
          display: block;
          height: 20%;
          padding: 5px 8px;
          margin: 10px 5px;
        }
        button {
          border: 1px solid grey;
          letter-spacing: 2px;
          width: 20%;
          border-radius: 5px;
          background-color: steelBlue;
          font-weight: 600;
        }
    </style>
    <?php
        if (isset($_POST['save'])) {
            include '../config.php';
            $sql = "SELECT * FROM files";
            $result = mysqli_query($conn, $sql);
          
            $files = mysqli_fetch_all($result, MYSQLI_ASSOC);

              // name of the uploaded file
              $filename = $_FILES['myfile']['name'];
          
              // destination of the file on the server
              $destination = '../uploads/' . $filename;
          
              // get the file extension
              $extension = pathinfo($filename, PATHINFO_EXTENSION);
          
              // the physical file on a temporary uploads directory on the server
              $file = $_FILES['myfile']['tmp_name'];
              $size = $_FILES['myfile']['size'];
          
              if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
                echo "<script>alert('You file extension must be .zip, .pdf or .docx')</script>";
              } elseif ($_FILES['myfile']['size'] > 10000000) { // file shouldn't be larger than 10Megabyte
                  echo "<script>alert('File too large!!!')</script>";
              } else {
                  // move the uploaded (temporary) file to the specified destination
                  if (move_uploaded_file($file, $destination)) {
                      $sql = "INSERT INTO files (name, size, downloads) VALUES ('$filename', $size, 0)";
                      if (mysqli_query($conn, $sql)) {
                          echo "<script>alert('File uploaded successfully')</script>";
                      }
                  } else {
                      echo "<script>alert('Failed to upload file!!!')</script>";
                  }
              }
          }  
    ?>
  </head>

  <body>

    <div id="uploadPdfPage">
      <div class="container">
        <div class="row">
          <form action=<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?> class="myForm" method="post" enctype="multipart/form-data" >
            <h3 style="margin-left:5px;letter-spacing:1px;">Upload File</h3>
            <input type="file" name="myfile"> <br>
            <button type="submit" name="save" style="margin-left:4px;">upload</button>
          </form>
        </div>
      </div>
    </div>

  </body>

</html>

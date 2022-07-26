<?php

if(isset($_POST['submit'])) {
  $allowed_ext = array('png', 'jpg', 'jpeg', 'gif', 'css');
  
  if(!empty($_FILES['upload']['name'])) {
    // print_r($_FILES['upload']);

    $file_name = $_FILES['upload']['name'];
    $file_size = $_FILES['upload']['size'];
    $file_tmp = $_FILES['upload']['tmp_name'];

    $destination_dir = "uploads/${file_name}";

    $file_ext = explode('.', $file_name);
    $file_ext = strtolower(end($file_ext));

    if(in_array($file_ext, $allowed_ext)) {
      if($file_size <= 1000000) {
        move_uploaded_file($file_tmp, $destination_dir);

        echo 'file uploaded';
      } else {
        echo 'file is too large';
      }
    } else {
      echo 'invalide file type';
    }
  } else {
    echo 'no file selected';
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Simple Upload File PHP</title>
</head>
<body>
  <form 
    action="<?= $_SERVER['PHP_SELF']; ?>" 
    method="post" 
    enctype="multipart/form-data"
  >
    <input type="file" name="upload">
    <input type="submit" value="submit" name="submit">
  </form>
</body>
</html>

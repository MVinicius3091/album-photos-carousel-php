<?php
  require_once 'model.php';
  $uri = $_SERVER['QUERY_STRING'];
  $uri = explode('=', $uri);
  $allPhotos = (new Model)->allPhotos($uri[1]);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Album - PHP</title>
  <link rel="stylesheet" href="album.css" type="text/css">
</head>
<body>
  <div class="box-register">
    <button type="button" id="btn-close">close</button>
    <form action="photos.php" method="post" enctype="multipart/form-data">

      <input type="hidden" name="img_id" value="<?= $uri[1] ?>">
      <div>
        <label for="photos">Photos:</label>
        <input type="file" name="photos[]" id="photos" accept="image/png,image/jpeg/image/jpg,image/gif" multiple >
      </div>
      
      <div>
        <button type="submit">Send</button>
      </div>
    </form>
  </div>

  <div class="box-photos">
    <?php foreach ($allPhotos as $photo): ?>
      <img src="<?= $photo['ph_file_name'] ?>" class="photos" alt="Photo name <?= $photo['ph_name'] ?>" width="200px" height="120px" />
    <?php endforeach; ?>
  </div>

  <div class="caroussel"></div>

  <script src="album.js"></script>
</body>
</html>
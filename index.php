<?php require_once 'model.php'; $all = (new Model)->listAll();?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Upload files</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

  <link rel="stylesheet" href="style.css" type="text/css" />
</head>

<body>
  <form action="teste.php" method="post" enctype="multipart/form-data">
    <div>
      <label for="">Files:</label>
      <input type="file" name="file[]" id="file" accept="image/png" multiple />
    </div>

    <div>
      <button type="submit">Send</button>
    </div>
  </form>

  <div class="container">
    <?php foreach ($all as $img): ?>
      <div class="box-img">
        <img src="<?= $img['dir_name'] ?>" alt="Imagem <?= $img['name'] ?>" class="images" id="<?= $img['id'] ?>" width="200px" height="120px" style="cursor: pointer;" />
      </div>
    <?php endforeach; ?>
  </div>

  <section>
    <div class="render-photos"></div>
  </section>

  <script src="script.js"></script>
</body>
</html>


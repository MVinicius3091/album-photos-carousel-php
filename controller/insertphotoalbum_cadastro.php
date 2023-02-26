<?php

require_once 'model.php';

class InsertPhotoAlbumCadastro {

  private $model;

  public function __construct()
  {
    $this->model = new Model;
    $this->registerPhoto();

  }

  private function registerPhoto() {

    $file = $_FILES['photos'];
    $img_id = $_POST['img_id'];

    for ($i=0; $i < count($file['name']); $i++) { 
      $extension = pathinfo($file['name'][$i], PATHINFO_EXTENSION);
      $dir_name = uniqid() . ".{$extension}"; 
      $file_name = "uploads/photos/{$dir_name}";
      
      $this->model->insertPhotos($file['name'][$i], $dir_name, $file_name, $img_id);
      move_uploaded_file($file['tmp_name'][$i], $file_name);
      
    }

    header("Location: album.php?id={$img_id}");
  }
}

new InsertPhotoAlbumCadastro;
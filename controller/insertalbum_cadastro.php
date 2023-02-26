<?php

require_once 'model.php';

class InsertAlbumCasdastro {

  private $reg;

  public function __construct()
  {
    $this->reg = new Model;
    $this->insert();

  }

  private function insert() {

    $file = $_FILES['file'];

    
    if (!$file['name']) {
      header('Location: index.php?insert=false&file=false');
      return;
      
    } 

    if (count($file['name']) > 1) {

      for ($i = 0; $i < count($file['name']); $i++) {

        $char_name = uniqid() . '.png';
        $dir_name = "uploads/{$char_name}";
    
        $resp = $this->reg->insertImage($file['name'][$i], $dir_name, $char_name);

        move_uploaded_file($file['tmp_name'][$i], $dir_name);

      }

      header('Location: index.php?insert=true');
      return;
    }

    $char_name = uniqid() . '.png';
    $dir_name = "uploads/{$char_name}";

    $resp = $this->reg->insertImage($file['name'][0], $dir_name, $char_name);

    if (!$resp) {
      header('Location: index.php?insert=false');
      return;
    }

    move_uploaded_file($file['tmp_name'][0], $dir_name);
    header('Location: index.php?insert=true');
  }
}

new InsertAlbumCasdastro;


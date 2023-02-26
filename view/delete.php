<?php

require_once 'model.php';

class DeleteImg {

  private $reg;

  public function __construct()
  {
    $this->reg = new Model;
    $this->deleteImg();

  }

  private function deleteImg() {

    $file = $_GET;
    unlink($file['dir']);

    $resp = $this->reg->deleteImg($file['id']);
    
    if (!$resp) {
      header('Location: index.php?delete=false');
      return;
    }

    header('Location: index.php?delete=true');

  }
}

new DeleteImg;
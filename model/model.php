<?php

require_once 'connection.php';

class Model extends Connection {

  public function listAll() {

    try{

      $sql = "SELECT
                *
              FROM
                images
              ORDER BY
                id ASC;";

      $prep = $this->conn->prepare($sql);
      $prep->execute();

      return $prep->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {

      echo 'LIST ALL IMAGES ERROR ' . $e->getMessage();
    }
  }

  public function insertImage($name, $dir_name, $char_name) {

    try {

      $sql = "INSERT INTO
                images(name, dir_name, char_name)
              VALUES
                (:nam, :dir, :cha);";

      $prep = $this->conn->prepare($sql);
      $prep->bindValue(':nam', $name);
      $prep->bindValue(':dir', $dir_name);
      $prep->bindValue(':cha', $char_name);
      $prep->execute();

      return $prep->rowCount();

    } catch (PDOException $e) {

      echo 'INSERTED IMAGE ERROR ' . $e->getMessage();
    }
  }

  public function deleteImg($id) {

    try {

      $sql = "DELETE FROM
                images
              WHERE
                id = :id;";

      $prep = $this->conn->prepare($sql);
      $prep->bindValue(':id', $id);
      $prep->execute();

      return $prep->rowCount();

    } catch (PDOException $e) {

      echo 'DELETED IMAGE ERROR ' . $e->getMessage();
    }
  }

  public function allPhotos($id) {

    try {

      $sql = "SELECT 
                *
              FROM
                photos
              WHERE
                img_id = :id
              ORDER BY
                ph_id ASC;";

      $prep = $this->conn->prepare($sql);
      $prep->bindValue(':id' , $id);
      $prep->execute();

      return $prep->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {

      echo 'LIST ALL PHOTOS ERROR ' . $e->getMessage();
    }
  }

  public function insertPhotos($name, $dir, $file, $id) {

    try {

      $sql = "INSERT INTO 
                photos(ph_name, ph_dir_name, ph_file_name, img_id)
              VALUES
                (:nam, :dir, :fil, :img_id);";

      $prep = $this->conn->prepare($sql);
      $prep->bindValue(':nam',    $name);
      $prep->bindValue(':dir',    $dir);
      $prep->bindValue(':fil',    $file);
      $prep->bindValue(':img_id', $id);
      $prep->execute();

      return $prep->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {

      echo 'INSERTED PHOTOS ERROR ' . $e->getMessage();
    }
  }
}
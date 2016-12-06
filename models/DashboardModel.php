<?php

class DashboardModel extends Model
{
  public function lista()
  {
      if(count($_POST)>0) {
          $stmt = $this->db->prepare("SELECT * FROM users,persetting WHERE id = userId AND (bday BETWEEN :tol_kor AND :ig_kor)");
          $stmt->execute(array(
              'tol_kor' => date('Y-m-d', strtotime('-' . $_POST['tol'] . 'year')),
              'ig_kor' => date('Y-m-d', strtotime('-' . $_POST['ig'] . 'year'))
          ));
          return $stmt->fetchAll(PDO::FETCH_OBJ);
      }
      else{
          $stmt = $this->db->prepare("SELECT * FROM users,persetting WHERE id = userId ");
          $stmt->execute();
          return $stmt->fetchAll(PDO::FETCH_OBJ);
      }

  }

    public function data(){
        $stmt = $this->db->prepare("SELECT * FROM looking WHERE id=userId");
        $stmt->execute(array());
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}
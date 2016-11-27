<?php

class DashboardModel extends Model
{
  public function lista()
  {
      if(count($_POST)>0){
          var_dump($_POST);die;
      }
      $stmt = $this->db->prepare("SELECT * FROM users,presetting WHERE id = userId");
      $stmt->execute();
      $asd = [];
      while ($data = $stmt->fetch()) {
          $asd[] = $data;
      }
      return $asd;
  }
}
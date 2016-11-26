<?php

class DashboardModel extends Model
{
  public function lista(){
      $stmt = $this->db->prepare("SELECT * FROM users ");
      $stmt->execute();
      $data2 = [];
      while($data = $stmt->fetch()){
          $data2[]= $data;
      }
      return $data2;
  }

}
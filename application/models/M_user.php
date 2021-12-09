<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

  public function get_all_user()
  {
    $queryUser = "SELECT `tb_user`.*, `tb_grup`.`nama_grup`
                  FROM `tb_user`
                  JOIN `tb_grup` ON  `tb_user`.`user_id` = `tb_grup`.`id_grup`
                  ";
    return $this->db->query($queryUser)->result_array();
  }

  public function get_all_kostumer()
  {
    $queryUser = "SELECT `tb_kostumer`.*, `tb_grup`.`nama_grup`
                  FROM `tb_kostumer`
                  JOIN `tb_grup` ON  `tb_kostumer`.`user_id` = `tb_grup`.`id_grup`
                  ORDER BY `tb_kostumer`.`id_kostumer` DESC
                  ";
    return $this->db->query($queryUser)->result_array();
  }

  public function get_username($username)
  {
    return $this->db->get_where('tb_kostumer', $username);
  }

}

/* End of file M_user.php */
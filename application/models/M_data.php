<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_data extends CI_Model {

  public function get_all_antrian()
  {
    $queryantrian = "SELECT `tb_antrian`.*, `tb_kostumer`.`nama`,`tb_kostumer`.`email`,`tb_kostumer`.`no_hp`,`tb_kostumer`.`alamat`
                  FROM `tb_antrian`
                  JOIN `tb_kostumer` ON  `tb_antrian`.`kostumer_id` = `tb_kostumer`.`id_kostumer`
                  ORDER BY `tb_antrian`.`id_antrian` DESC
                  ";
    return $this->db->query($queryantrian)->result_array();
  }

  public function get_all_antrian_verifikasi($status)
  {
    $queryantrian = "SELECT `tb_antrian`.*, `tb_kostumer`.`nama`,`tb_kostumer`.`email`,`tb_kostumer`.`no_hp`,`tb_kostumer`.`alamat`
                  FROM `tb_antrian`
                  JOIN `tb_kostumer` ON  `tb_antrian`.`kostumer_id` = `tb_kostumer`.`id_kostumer`
                  WHERE `tb_antrian`.`status` = $status
                  ORDER BY `tb_antrian`.`id_antrian` DESC
                  ";
    return $this->db->query($queryantrian)->result_array();
  }

  public function get_id_antrian($id_antrian)
  {
    $queryantrian = "SELECT `tb_antrian`.*, `tb_kostumer`.`nama`
                  FROM `tb_antrian`
                  JOIN `tb_kostumer` ON  `tb_antrian`.`kostumer_id` = `tb_kostumer`.`id_kostumer`
                  WHERE `tb_antrian`.`id_antrian` = $id_antrian
                  ORDER BY `tb_antrian`.`id_antrian` DESC
                  ";
    return $this->db->query($queryantrian)->result_array();
  }

  public function get_no_antrian()
  {
    $query = $this->db->query("SELECT MAX(no_antrian) as noantrian FROM tb_antrian");
    $hasil = $query->row();
    return $hasil->noantrian;
  }

  public function get_notifikasi()
  {
    $queryantrian = "SELECT `tb_antrian`.*, `tb_kostumer`.`nama`,`tb_kostumer`.`email`,`tb_kostumer`.`no_hp`,`tb_kostumer`.`alamat`
                  FROM `tb_antrian`
                  JOIN `tb_kostumer` ON  `tb_antrian`.`kostumer_id` = `tb_kostumer`.`id_kostumer`
                  ORDER BY `tb_antrian`.`id_antrian` DESC
                  ";
    return $this->db->query($queryantrian)->row();
  }

}

/* End of file M_data.php */
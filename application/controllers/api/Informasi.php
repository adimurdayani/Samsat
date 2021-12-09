<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use \Firebase\JWT\JWT;

class Informasi extends BD_Controller {

  function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('m_data');
    }

  public function index_get()
  {
    // mengambil data yang di kirim
    $id = $this->get('id_info');

    // kondisi jika id rekam tidak di temukan 
    
    if ($id === NULL) {
      
      // mengambil data dari database
      $informasi = $this->db->get('tb_informasi')->result_array();
      
    }else{

      // mengambil data dengan id yang di kirim
      $informasi = $this->db->get_where('tb_informasi', ['id_info' => $id])->result_array();

    }

    if ($informasi) {
      # response informasi jika data informasi ada, dan menampilkan semua data informasi
      $this->response([
        'status'  => true,
        'data'    => $informasi,
        'message' => 'sukses'
      ], REST_Controller::HTTP_OK);

    }else {
      # response informasi jika informasi tidak ada
      $this->response([
        'status'  => false,
        'message' => 'antrian tidak di temukan'
      ], REST_Controller::HTTP_NOT_FOUND);
    }
  }


}

/* End of file Antrian.php */
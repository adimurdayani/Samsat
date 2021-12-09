<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use \Firebase\JWT\JWT;

class Pajak extends BD_Controller {

  function __construct()
    {
        // Construct the parent class
        parent::__construct();
        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->methods['index_get']['limit'] = 100; // 500 requests per hour per user/key
        $this->methods['index_post']['limit'] = 50; // 100 requests per hour per user/key
        $this->load->model('m_data');
    }

  public function index_get()
  {
    // mengambil data yang di kirim
    $id_pajak = $this->get('id_pajak');

    // kondisi jika id rekam tidak di temukan 
    
    if ($id_pajak === NULL) {
      
      // mengambil data dari database
      $pajak = $this->db->get('tb_pajak')->result_array();
      
    }else{

      // mengambil data dengan id yang di kirim
      $pajak = $this->db->get_where('tb_pajak', ['id_pajak' => $id_pajak])->row_array();

    }

    if ($pajak) {
      # response pajak jika data pajak ada, dan menampilkan semua data pajak
      $this->response([
        'status'  => true,
        'data'    => $pajak,
        'message' => 'sukses'
      ], REST_Controller::HTTP_OK);

    }else {
      # response pajak jika pajak tidak ada
      $this->response([
        'status'  => false,
        'message' => 'pajak tidak di temukan'
      ], REST_Controller::HTTP_NOT_FOUND);
    }
  }

}

/* End of file Pajak.php */
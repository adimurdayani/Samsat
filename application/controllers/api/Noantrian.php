<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use \Firebase\JWT\JWT;

class Noantrian extends BD_Controller {
  function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->methods['index_get']['limit'] = 2; 
        $this->load->model('m_data');
    }

  public function index_get()
  {
    $getnoantrian = $this->m_data->get_no_antrian();
    $nourut = substr($getnoantrian, 2, 3);
    $noantrian = $nourut + 1;

    if ($noantrian) {
      # response data jika data data ada, dan menampilkan semua data data
      $this->response([
        'status'  => true,
        'data'    => sprintf("%03s", $noantrian),
        'message' => 'sukses'
      ], REST_Controller::HTTP_OK);

    }else {
      # response data jika data tidak ada
      $this->response([
        'status'  => false,
        'message' => 'data tidak di temukan'
      ], REST_Controller::HTTP_NOT_FOUND);
    }
  }

}

/* End of file Noantrian.php */
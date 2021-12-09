<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_data');
    
    if (!$this->session->userdata('username')) {
      redirect('login');
    }
  }

  public function index()
  {
    $data['judul'] = 'Dashboard';
    $data['total_kostumer'] = $this->db->get('tb_kostumer')->num_rows();
    $data['total_pajak'] = $this->db->get('tb_pajak')->num_rows();
    $data['total_antrian'] = $this->db->get('tb_antrian')->num_rows();
    $data['get_kostumer'] = $this->db->get('tb_kostumer')->result_array();
    
    $data['user_ses'] = $this->db->get_where('tb_user', [
      'username' => $this->session->userdata('username')
    ])->row_array();
    
    $this->load->view('backend/layout/header', $data, FALSE);
    $this->load->view('backend/layout/sidebar', $data, FALSE);
    $this->load->view('backend/layout/topbar', $data, FALSE);
    $this->load->view('backend/index', $data, FALSE);
    $this->load->view('backend/layout/footer', $data, FALSE);
  }

  public function notifikasi()
  {
    $total_antrian = $this->db->get('tb_antrian')->num_rows();
    $get_antrian = $this->m_data->get_notifikasi();

    $result['total_antrian'] = $total_antrian;
    $result['nama'] = $get_antrian->nama;
    $result['tanggal'] = $get_antrian->created_at;
    $result['msg'] = "Pengguna telah mengambil nomor antrian, silahkan cek dan verifikasi pengguna!";
    
    echo json_encode($result);
  }

}

/* End of file Dashboard.php */
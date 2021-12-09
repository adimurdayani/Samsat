<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
  
  public function __construct()
  {
    parent::__construct();
    
    if (!$this->session->userdata('username')) {
      redirect('login');
    }
  }
  

  public function index()
  {
    $data['judul'] = 'Profile Admin';
    
    $data['user_ses'] = $this->db->get_where('tb_user', [
      'username' => $this->session->userdata('username')
    ])->row_array();

    $this->load->view('backend/layout/header', $data, FALSE);
    $this->load->view('backend/layout/sidebar', $data, FALSE);
    $this->load->view('backend/layout/topbar', $data, FALSE);
    $this->load->view('backend/tb_profile/index', $data, FALSE);
    $this->load->view('backend/layout/footer', $data, FALSE);
  }

}

/* End of file Profile.php */
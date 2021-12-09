<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pajak extends CI_Controller {
  
  public function __construct()
  {
    parent::__construct();
    
    if (!$this->session->userdata('username')) {
      redirect('login');
    }
  }
  

  public function index()
  {
    $data['judul'] = 'Data Pajak Kendaraan';
    $data['get_pajak'] = $this->db->get('tb_pajak')->result_array();
    
    $data['user_ses'] = $this->db->get_where('tb_user', [
      'username' => $this->session->userdata('username')
    ])->row_array();

    $this->form_validation->set_rules('nopol', 'NOPOL', 'trim|required');
    $this->form_validation->set_rules('jenis', 'jenis kendaraan', 'trim|required');
    $this->form_validation->set_rules('merk', 'merk kendaraan', 'trim|required');
    $this->form_validation->set_rules('tipe', 'tipe kendaraan', 'trim|required');
    $this->form_validation->set_rules('th_buat', 'tahun buat', 'trim|required');
    $this->form_validation->set_rules('masa_pajak', 'masa pajak', 'trim|required');
    $this->form_validation->set_rules('masa_stnk', 'masa STNK', 'trim|required');
    
    if ($this->form_validation->run() == FALSE) {
      # code...
      $this->load->view('backend/layout/header', $data, FALSE);
      $this->load->view('backend/layout/sidebar', $data, FALSE);
      $this->load->view('backend/layout/topbar', $data, FALSE);
      $this->load->view('backend/tb_pajak/index', $data, FALSE);
      $this->load->view('backend/layout/footer', $data, FALSE);
    } else {
      # code...
      $data = [
        'nopol' => $this->input->post('nopol'),
        'jenis' => $this->input->post('jenis'),
        'merk' => $this->input->post('merk'),
        'tipe' => $this->input->post('tipe'),
        'th_buat' => $this->input->post('th_buat'),
        'pkb_pokok' => $this->input->post('pkb_pokok'),
        'pkb_denda' => $this->input->post('pkb_denda'),
        'jr_pokok' => $this->input->post('jr_pokok'),
        'jr_denda' => $this->input->post('jr_denda'),
        'pnbp' => $this->input->post('pnbp'),
        'total' => $this->input->post('pkb_pokok') + $this->input->post('pkb_denda') + $this->input->post('jr_pokok') + $this->input->post('jr_denda')+$this->input->post('pnbp'),
        'masa_pajak' => $this->input->post('masa_pajak'),
        'masa_stnk' => $this->input->post('masa_stnk'),
        'status' => 0
        
      ];

      $this->db->insert('tb_pajak', $data);
      $this->session->set_flashdata('msg', '<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
      <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
      </symbol>
      <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
      </symbol>
      <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
      </symbol>
    </svg>
    <div class="alert alert-success d-flex align-items-center mr-3 ml-3" role="alert">
      <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
      <div class="ml-3">
        Data berhasil disimpan.
      </div>
    </div>');
    
    redirect('backend/pajak');
      
    }
    
  }

  
  public function edit()
  {
    $data['judul'] = 'Data Pajak Kendaraan';
    $data['get_pajak'] = $this->db->get('tb_pajak')->result_array();
    
    $data['user_ses'] = $this->db->get_where('tb_user', [
      'username' => $this->session->userdata('username')
    ])->row_array();

    $this->form_validation->set_rules('nopol', 'NOPOL', 'trim|required');
    $this->form_validation->set_rules('jenis', 'jenis kendaraan', 'trim|required');
    $this->form_validation->set_rules('merk', 'merk kendaraan', 'trim|required');
    $this->form_validation->set_rules('tipe', 'tipe kendaraan', 'trim|required');
    $this->form_validation->set_rules('th_buat', 'tahun buat', 'trim|required');
    $this->form_validation->set_rules('masa_pajak', 'masa pajak', 'trim|required');
    $this->form_validation->set_rules('masa_stnk', 'masa STNK', 'trim|required');
    
    if ($this->form_validation->run() == FALSE) {
      # code...
      $this->load->view('backend/layout/header', $data, FALSE);
      $this->load->view('backend/layout/sidebar', $data, FALSE);
      $this->load->view('backend/layout/topbar', $data, FALSE);
      $this->load->view('backend/tb_pajak/index', $data, FALSE);
      $this->load->view('backend/layout/footer', $data, FALSE);
    } else {
      # code...
      $id_pajak = $this->input->post('id_pajak');
      
      $data = [
        'nopol' => $this->input->post('nopol'),
        'jenis' => $this->input->post('jenis'),
        'merk' => $this->input->post('merk'),
        'tipe' => $this->input->post('tipe'),
        'th_buat' => $this->input->post('th_buat'),
        'pkb_pokok' => $this->input->post('pkb_pokok'),
        'pkb_denda' => $this->input->post('pkb_denda'),
        'jr_pokok' => $this->input->post('jr_pokok'),
        'jr_denda' => $this->input->post('jr_denda'),
        'pnbp' => $this->input->post('pnbp'),
        'total' => $this->input->post('pkb_pokok') + $this->input->post('pkb_denda') + $this->input->post('jr_pokok') + $this->input->post('jr_denda')+$this->input->post('pnbp'),
        'masa_pajak' => $this->input->post('masa_pajak'),
        'masa_stnk' => $this->input->post('masa_stnk'),
        'status' => 0
        
      ];

      $this->db->where('id_pajak', $id_pajak);      
      $this->db->update('tb_pajak', $data);
      $this->session->set_flashdata('msg', '<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
          <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
        </symbol>
        <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
          <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
        </symbol>
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
          <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </symbol>
      </svg>
      <div class="alert alert-warning d-flex align-items-center mr-3 ml-3" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
        <div class="ml-3">
          Data berhasil terupdate.
        </div>
      </div>');
      
      redirect('backend/pajak');
    }
    
  }

  public function hapus($id_pajak)
  {
    $this->db->delete('tb_pajak', ['id_pajak' => $id_pajak]);
      $this->session->set_flashdata('msg', '<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
          <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
        </symbol>
        <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
          <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
        </symbol>
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
          <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </symbol>
      </svg>
      <div class="alert alert-danger d-flex align-items-center mr-3 ml-3" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
        <div class="ml-3">
          Data berhasil terhapus.
        </div>
      </div>');
      
      redirect('backend/pajak');
  }

}

/* End of file Pajak.php */
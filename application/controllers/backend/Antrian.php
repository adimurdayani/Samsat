<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Antrian extends CI_Controller {
  
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
    $getnoantrian = $this->m_data->get_no_antrian();
    $nourut = substr($getnoantrian, 2, 3);
    $noantrian = $nourut + 1;
    $data = array('no_antrian' => $noantrian);
    
    $data['judul'] = 'Data Antrian';
    $data['get_antrian'] =  $this->m_data->get_all_antrian();
    $data['get_kostumer'] = $this->db->get('tb_kostumer')->result_array();

    $data['user_ses'] = $this->db->get_where('tb_user', [
      'username' => $this->session->userdata('username')
    ])->row_array();
    
    $this->form_validation->set_rules('kostumer_id', 'nama', 'trim|required');
    
    if ($this->form_validation->run() == FALSE) {
      # code...
      $this->load->view('backend/layout/header', $data, FALSE);
      $this->load->view('backend/layout/sidebar', $data, FALSE);
      $this->load->view('backend/layout/topbar', $data, FALSE);
      $this->load->view('backend/tb_antrian/index', $data, FALSE);
      $this->load->view('backend/layout/footer', $data, FALSE);
    } else {
      # code...
      $data =[
        'kostumer_id' => htmlspecialchars($this->input->post('kostumer_id', true)),
        'no_antrian' => htmlspecialchars($this->input->post('no_antrian', true)),
        'created_at' => date("d M Y H:i"),
        'status' => 0,
        'panggil_antrian' => 'PANGGIL'
      ];

      $this->db->insert('tb_antrian', $data);
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
          Data berhasil tersimpan.
        </div>
      </div>');
      redirect('backend/antrian');
    }
    
  }

  public function update()
  {
    $data['judul'] = 'Data Antrian';
    $data['get_antrian'] =  $this->m_data->get_all_antrian();
    $data['get_kostumer'] = $this->db->get('tb_kostumer')->result_array();

    $data['user_ses'] = $this->db->get_where('tb_user', [
      'username' => $this->session->userdata('username')
    ])->row_array();
    
    $this->form_validation->set_rules('status', 'update status', 'trim|required');
    
    if ($this->form_validation->run() == FALSE) {
      # code...
      $this->load->view('backend/layout/header', $data, FALSE);
      $this->load->view('backend/layout/sidebar', $data, FALSE);
      $this->load->view('backend/layout/topbar', $data, FALSE);
      $this->load->view('backend/tb_antrian/index', $data, FALSE);
      $this->load->view('backend/layout/footer', $data, FALSE);
    } else {
      # code...
      $id_antrian  = $this->input->post('id_antrian');
    $kostumer_id = $this->input->post('kostumer_id');
      
      $data =[
        'status' => $this->input->post('status'),
        'created_at' => date('d M Y')
      ];

      $this->db->where('id_antrian', $id_antrian);
      
      $this->db->update('tb_antrian', $data);
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
          Data berhasil terupdate.
        </div>
      </div>');
      $this->sendMassage($kostumer_id);
      redirect('backend/antrian');
    }
  }

  public function panggil_antrian()
  {
    $data['judul'] = 'Data Antrian';
    $data['get_antrian'] =  $this->m_data->get_all_antrian();
    $data['get_kostumer'] = $this->db->get('tb_kostumer')->result_array();

    $data['user_ses'] = $this->db->get_where('tb_user', [
      'username' => $this->session->userdata('username')
    ])->row_array();
    
    $this->form_validation->set_rules('kostumer_id', 'kostumer', 'trim|required');
    $this->form_validation->set_rules('id_antrian', 'antrian', 'trim|required');
    
    if ($this->form_validation->run() == FALSE) {
      # code...
      $this->load->view('backend/layout/header', $data, FALSE);
      $this->load->view('backend/layout/sidebar', $data, FALSE);
      $this->load->view('backend/layout/topbar', $data, FALSE);
      $this->load->view('backend/tb_antrian/index', $data, FALSE);
      $this->load->view('backend/layout/footer', $data, FALSE);
    } else {
      # code...
      $id_antrian  = $this->input->post('id_antrian');
    $kostumer_id = $this->input->post('kostumer_id');
      
      $data =[
        'panggil_antrian' => 'TERPANGGIL',
        'created_at' => date('d M Y H:i')
      ];

      $this->db->where('id_antrian', $id_antrian);
      
      $this->db->update('tb_antrian', $data);
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
          Panggilan berhasil.
        </div>
      </div>');
      $this->sendMassageGiliran($kostumer_id);
      redirect('backend/antrian');
    }
  }
  
  public function sendMassage($kostumer_id){
    
    $gettoken = $this->db->get_where('tb_kostumer', ['id_kostumer' => $kostumer_id])->row();

    $getAll = '["'.$gettoken->token_id.'"]';
    $curl = curl_init();
    $authKey = "key=AAAAOKewnyk:APA91bHexGPOzvKGVc_mHBVzeD3izO108f9Nuew1C3uKGnPZe5hEBDG_zc2KOgUQko2plgBaPLdgrLTpO_U6Y4ZsWegjDRfa0S4n2Talvw12qL_UEpzG6Uq_dwhIZSVkXn3q4erdsn_w";
    $registration_ids =  $getAll;
    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://fcm.googleapis.com/fcm/send",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => '{
                    "registration_ids": ' . $registration_ids . ',
                    "notification": {
                        "title": "Samsat Palopo",
                        "body": "Nomor antrian telah terverifikasi, anda bisa melakukan antrian dihari ini!"
                    }
                  }',
      CURLOPT_HTTPHEADER => array(
        "Authorization: " . $authKey,
        "Content-Type: application/json",
        "cache-control: no-cache"
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);
     redirect('backend/antrian');

    if ($err) {
      // echo "cURL Error #:" . $err;
      json_encode($err);
    } else {
      // response ketika data berhasil disimpan
      echo $response;
    }
  }

  public function sendMassageGiliran($kostumer_id){
    
    $gettoken = $this->db->get_where('tb_kostumer', ['id_kostumer' => $kostumer_id])->row();
    $getNoantrian = $this->db->get_where('tb_antrian', ['kostumer_id' => $kostumer_id])->row();

    $getAll = '["'.$gettoken->token_id.'"]';
    $curl = curl_init();
    $authKey = "key=AAAAOKewnyk:APA91bHexGPOzvKGVc_mHBVzeD3izO108f9Nuew1C3uKGnPZe5hEBDG_zc2KOgUQko2plgBaPLdgrLTpO_U6Y4ZsWegjDRfa0S4n2Talvw12qL_UEpzG6Uq_dwhIZSVkXn3q4erdsn_w";
    $registration_ids =  $getAll;
    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://fcm.googleapis.com/fcm/send",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => '{
                    "registration_ids": ' . $registration_ids . ',
                    "notification": {
                        "title": "Pemanggilan Nomor Antrian",
                        "body": "Giliran nomor antrian '.$getNoantrian->no_antrian.', anda bisa melakukan antrian dihari ini tanggal '.$getNoantrian->created_at.'. Jika anda tidak ada dilokasi selama 20 menit maka nomor antrian anda akan dibatalkan"
                    }
                  }',
      CURLOPT_HTTPHEADER => array(
        "Authorization: " . $authKey,
        "Content-Type: application/json",
        "cache-control: no-cache"
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);
     redirect('backend/antrian');

    if ($err) {
      // echo "cURL Error #:" . $err;
      json_encode($err);
    } else {
      // response ketika data berhasil disimpan
      echo $response;
    }
  }

  public function hapus($id_antrian)
  {
    $this->db->delete('tb_antrian', ['id_antrian' => $id_antrian]);
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
    redirect('backend/antrian');
  }

}

/* End of file Antrian.php */
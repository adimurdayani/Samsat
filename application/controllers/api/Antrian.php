<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use \Firebase\JWT\JWT;

class Antrian extends BD_Controller {

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
    $id_antrian = $this->get('id_antrian');

    // kondisi jika id rekam tidak di temukan 
    
    if ($id_antrian === NULL) {
      
      // mengambil data dari database
      $antrian = $this->m_data->get_all_antrian();
      
    }else{

      // mengambil data dengan id yang di kirim
      $antrian = $this->m_data->get_id_antrian($id_antrian);

    }

    if ($antrian) {
      # response antrian jika data antrian ada, dan menampilkan semua data antrian
      $this->response([
        'status'  => true,
        'data'    => $antrian,
        'message' => 'sukses'
      ], REST_Controller::HTTP_OK);

    }else {
      # response antrian jika antrian tidak ada
      $this->response([
        'status'  => false,
        'message' => 'antrian tidak di temukan'
      ], REST_Controller::HTTP_NOT_FOUND);
    }
  }

  public function index_post()
  {
    $id_antrian = $this->post('kostumer_id');
    $gettoken = $this->db->get_where('tb_kostumer', ['id_kostumer' => $id_antrian])->row();

    $this->form_validation->set_rules('no_antrian', 'antrian', 'trim|required');

    if ($this->form_validation->run() == FALSE) {

      if (validation_errors() == true) {

        # response ketika username sudah digunakan 
        $this->response([
          'status' => false,
          'message' => validation_errors()
        ], REST_Controller::HTTP_BAD_REQUEST);

      }    

    } else {
      # inisial data yang akan di input kedalam database
      
      $data = [
        'kostumer_id' => htmlspecialchars($this->input->post('kostumer_id', true)),
        'no_antrian' => htmlspecialchars($this->input->post('no_antrian', true)),
        'created_at' => date("d M Y H:i"),
        'status' => 0,
        'panggil_antrian' => 'MENUNGGU'
      ];
      $output = $this->db->insert('tb_antrian', $data);

      if ($output == 0) {

      // response ketika data gagal di simpan
        $this->response([
          'status' => false,
          'message' => 'Data gagal di simpan!'
        ], REST_Controller::HTTP_NOT_FOUND);

      }else {
        // fungsi menampilkan  pesan notifikasi firebase android
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
                            "title": "Antrian Sukses",
                            "body": "Anda telah berhasil mengambil nomor antrian!"
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

        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
          // response ketika data berhasil disimpan
          $this->response([
            'status' => true,
            'message' => 'Data berhasil di simpan!',
            'data' => $data,
            'token' => $getAll
          ], REST_Controller::HTTP_OK);
        }
      }
    }
  }

}

/* End of file Antrian.php */
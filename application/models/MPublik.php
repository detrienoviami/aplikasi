<?php
class MPublik extends CI_Model{
  public function getKuisioner()
  {
    return $this->db->get('t_datawifi')->result_array();
  }

  public function getKuisionerById($id)
  {
    return $this->db->get_where('t_datawifi', ['id_wifi' => $id])->result_array();
  }

  // public function get_expopak()
  // {
  //     return $this->db->get("t_datawifi");
  // }

  function get_no_kuisioner(){
        $q = $this->db->query("SELECT MAX(RIGHT(id_kuisioner_result,4)) AS kd_max FROM t_datawifi");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%04s", $tmp);
            }
        }else{
            $kd = "0001";
        }
        date_default_timezone_set('Asia/Jakarta');
        $kodetampil = "SRVY".$kd;
        return $kodetampil;
    }

    public function addKuisAnswer($id_soal_kuis, $id_user, $answer){
        $id_soal_kuis = $_POST['id_wifi'];
        $i=1;
    while(isset($_POST['jawaban'.$i])){
         $answer = $_POST['jawaban'.$i];
       //var_dump($answer);
       //$this->MNasabah_Kuisioner_Result->tambah($id_soal_kuis, $id_user, $answer);
         $i++;
    }
       echo " <script>
            alert('Jawaban Tersimpan!');
            history.go(-2);
      </script>";
      }

      function get_all_attribut()
    {
        $query = $this->db->get('t_datawifi');
        $data = array();

        foreach($query as $attr)
        {
               $row = array();
               $row = $attr->id_wifi; // add each user id to the array
               $row = $attr->nama_wifi;
               $row = $attr->lokasi;
               $row = $attr->status;
               $data[] = $row;
        }

        $output = array(
          "data" => $data,
  	    );

  	    //output to json format
  	    echo json_encode($output);

    }

  public function tambah()
  {
      $get_soal= $this->db->select('*')->from('t_kuisioner')->get()->result();

      $jumlah_soal = 4;

      for ($i=1; $i < $jumlah_soal+1 ; $i++) {


				$data[$i]['kode_survey'] = $this->input->post('id_kuisioner_result');
        $data[$i]['no_kuisioner'] = $this->input->post('no_kuisioner'.$i, true);
				$data[$i]['nama'] = $this->input->post('nama', true);
        $data[$i]['jk'] = $this->input->post('jk', true);
        $data[$i]['nohp'] = $this->input->post('nohp', true);
        $data[$i]['id_wifi'] = $this->input->post('no_kuisioner'.$i, true);
        $data[$i]['jawaban'] = $this->input->post('jawaban'.$i, true);
        $data[$i]['nama_karyawan'] = $this->input->post('nama_karyawan', true);
        $data[$i]['tgl_jawaban'] = date('Y-m-d');
        $data[$i]['layanan'] = $this->input->post('layanan', true);


				$this->db->insert('t_datawifi',$data[$i]); // save ke tabel hasil papikostik
      }

    }
  }
?>

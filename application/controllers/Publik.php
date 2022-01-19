<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Publik extends CI_Controller {
	public function __construct()
    {
    parent::__construct();
    $this->load->model('MPublik');
		$this->load->model('M_AdminWifi');
    $this->load->library('form_validation');
  }

	public function index()
	{
    $data['judul'] 			= "Aplikasi Sebaran Wifi";
    $data['wifi'] 		  = $this->db->get('t_datawifi')->result();

    $this->load->view('publik/index',$data);
	}

	  public function tambah()
    {
       $insert = $this->M_Publik->tambah();
       // $this->session->set_flashdata('flash','Data kuisioner berhasil');
			 redirect('Nasabah_Kuisioner_Result/selesai');
    }

    public function edit($id)
    {
        $data = $this->M_Publik->edit_by_id($id); // get data dari database melalui model
        echo json_encode($data);
    }

    public function update()
    {
        $data = array(
            'Kuisioner' => $this->input->post('Kuisioner'),
        );

        $id = array('id_jawaban' => $this->input->post('id_jawaban'));
        $this->M_Publik->update($id, $data);
        echo json_encode(array("status" => TRUE));
    }

    public function destroy($id)
    {
        $data = $this->M_Publik->edit_by_id($id);
        $this->M_Publik->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }

	public function selesai()
	{
			$this->load->view('publik/index');
		}

	}
?>

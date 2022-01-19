<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_data extends CI_Controller {
	public function __construct()
  {
    parent::__construct();
		$this->load->model('M_AdminWifi');
    $this->load->library('form_validation');
  }

	public function index()
	{
		$data['title']	 = 'Data Sebaran Wifi';
		$data['content'] = 'dashboard/index.php';
		$this->load->view('admin/main_admin',$data);
	}

	public function datatables()
    {
	    $wifi = $this->M_AdminWifi->get_datatables();
			// echo "<pre>";
			// print_r($wifi);die;
	    $data 		= array();
	    $no 			= $_POST['start']+1;

	    foreach ($wifi as $field){
				 $row = array();
				 $row[] = $no++;
				 $row[] = $field->id_wifi;
				 $row[] = $field->nama_wifi;
				 $row[] = $field->lokasi;
				 $row[] = $field->status;

				 $row[] = '<a class="btn btn-warning btn-sm" href="javascript:void(0)"
				 					 title="Edit" onclick="ajax_edit('."'".$field->id_wifi."'".')">
				 					 <i class="fa fa-edit"></i>
								 	 </a>

								 	 <a class="btn btn-danger btn-sm" href="javascript:void(0)"
								 					title="Hapus" onclick="ajax_delete('."'".$field->id_wifi."'".')">
								 					<i class="fa fa-trash"></i>
								 	 </a>';
				 $data[] = $row;
	    }

	    $output = array(
        "draw" => $_POST['draw'],
        "recordsTotal" => $this->M_AdminWifi->count_all(),
        "recordsFiltered" => $this->M_AdminWifi->count_filtered(),
        "data" => $data,
	    );

	    //output to json format
	    echo json_encode($output);
    }

    public function tambah()
    {
			$data = array(
					'id_wifi' 		=> $this->input->post('id_wifi'),
					'nama_wifi' 	=> $this->input->post('nama_wifi'),
					'lokasi' 			=> $this->input->post('lokasi'),
					'status' 			=> $this->input->post('status')
			);

			$insert = $this->M_AdminWifi->save($data); // simpan data ke model
			echo json_encode(array('status' => TRUE)); // akan muncul notif ini di kirim ke view, function ajax_save()
		}

    public function edit($id)
    {
			$data = $this->M_AdminWifi->edit_by_id($id); // get data dari database melalui model
			echo json_encode($data);
    }

    public function update()
    {
			$data = array(
					'wifi' => $this->input->post('wifi'),
			);
			$id = array('id_wifi' => $this->input->post('id_wifi'));
			$this->M_AdminWifi->update($id, $data);

			echo json_encode(array("status" => TRUE));
    }

    public function destroy($id)
    {
			$data = $this->M_AdminWifi->edit_by_id($id); // get id dari database melalui model
			$this->M_AdminWifi->delete_by_id($id);
			echo json_encode(array("status" => TRUE));

			// $delete = $this->db->where('id_wifi', $id)
			// 									 ->delete('t_datawifi');
			// echo json_encode(array("status" => TRUE));
    }

}

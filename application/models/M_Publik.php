<?php
class MPublik extends CI_Model{
  public function getWifi()
  {
    return $this->db->get('t_datawifi')->result_array();
  }

  public function getWifiById($id)
  {
    return $this->db->get_where('t_datawifi', ['id_wifi' => $id])->result_array();
  }

  function get_all_wifi()
  {
      $query = $this->db->get('t_datawifi');
      $data = array();

      foreach($query as $attr)
      {
         $row = array();
         $row = $attr->id_wifi;
         $row = $attr->nama_wifi;
         $data[] = $row;
      }
        $output = array(
        "data" => $data,
  	    );

  	  //output to json format
  	  echo json_encode($output);
    }
  }
?>

<?php
class M_AdminWifi extends CI_Model{
  var $table = 't_datawifi';
  var $column_order = array(null, 'id_wifi','nama_wifi','lokasi','status');
  var $column_search = array('id_wifi','nama_wifi','lokasi','status');
  var $order = array('id_wifi' => 'desc');

  public function __construct()
  {
      parent::__construct();
      $this->load->database();
  }

  private function _get_datatables_query()
  {
    $this->db->from($this->table);
    $i = 0;

    foreach ($this->column_search as $item) // looping awal
    {
        if($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
        {
            if($i===0) // looping awal
            {
                $this->db->group_start();
                $this->db->like($item, $_POST['search']['value']);
            }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
            if(count($this->column_search) - 1 == $i)
                $this->db->group_end();
        }
        $i++;
    }

    if(isset($_POST['order']))
    {
        $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
    }
    else if(isset($this->order))
    {
        $order = $this->order;
        $this->db->order_by(key($order), $order[key($order)]);
    }


      // $this->db->select($this->column_order);
      // $this->db->from('t_datawifi a');
      // $this->db->join('t_user b', 'a.id_user = b.id_user');
      //
      // $i = 0;
      //
      // foreach ($this->column_search as $item)
      // {
      //     if($_POST['search']['value'])
      //     {
      //       if($i===0)
      //       {
      //           $this->db->group_start();
      //           $this->db->like($item, $_POST['search']['value']);
      //       }
      //       else
      //       {
      //           $this->db->or_like($item, $_POST['search']['value']);
      //       }
      //       if(count($this->column_search) - 1 == $i)
      //           $this->db->group_end();
      //     }
      //     $i++;
      // }
      //
      // if(isset($_POST['order']))
      // {
      //     $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
      // }
      // else if(isset($this->order))
      // {
      //     $order = $this->order;
      //     $this->db->order_by(key($order), $order[key($order)]);
      // }
  }

  function get_datatables()
  {
      $this->_get_datatables_query();
      if($_POST['length'] != -1)
         $this->db->limit($_POST['length'], $_POST['start']);
         $query = $this->db->get();
      // echo "<pre>";
      // echo $this->db->last_query();die();
      return $query->result();
  }

  function count_filtered()
  {
      $this->_get_datatables_query();
      $query = $this->db->get();
      return $query->num_rows();
  }

  public function count_all()
  {
      $this->db->from($this->table);
      return $this->db->count_all_results();
  }

  public function save($data)
  {
      $this->db->insert('t_datawifi', $data);
      return $this->db->insert_id();
  }

  public function get_by_id($id)
  {
      $this->db->from('t_datawifi');
      $this->db->where('id_wifi',$id);
      $query = $this->db->get();

      return $query->row();
  }

  public function update($where, $data)
  {
      $this->db->update('t_datawifi', $data, $where);
      return $this->db->affected_rows();
  }
  
  public function edit_by_id($id)
  {
      $this->db->from('t_datawifi');
      $this->db->where('id_wifi',$id);
      $query = $this->db->get();

      return $query->row();
  }

  public function getDataWifi()
  {
    return $this->db->get('t_datawifi')->result_array();
  }

  public function getDataWifiById($id)
  {
    return $this->db->get_where('t_datawifi', ['id_wifi' => $id])->result_array();
  }


  public function delete_by_id($id)
  {
    $this->db->where('id_wifi', $id);
    $this->db->delete('t_datawifi');

      // $this->db->where('nama_wifi', $id);
      // $this->db->delete('t_datawifi');
      // $this->db->delete('t_user');
      //
      // return $query->row();
  }

  public function get_expopak()
  {
      return $this->db->get("t_datawifi");
  }


  public function tambah()
  {
    $data = [
      "id_wifi" => $this->input->post('id_wifi'),
      "nama_wifi" => $this->input->post('nama_wifi'),
      "lokasi" => $this->input->post('lokasi'),
      "status" => $this->input->post('status', true),
    ];

    $this->db->insert('t_datawifi', $data);
  }

  }
?>

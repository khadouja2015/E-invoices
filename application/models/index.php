<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StudentModel extends CI_Model
{

    public function get_id()
    {
        $query = $this->db->get("items");
        return $query->result();
    }

    public function insert_title($data)
    {
        return $this->db->insert('items', $data);
    }

    public function edit_description($id)
    {
        $this->db->where('id',$id);
        $query = $this->db->get('items');
        return $query->row();
    }

    public function created_at($data, $id)
    {
        $this->db->where('id', $id);
        return $this->db->update('items', $data);
    }

    public function updated_at($id)
    {
        return $this->db->delete('items', ['id' => $id]);
    }
    
}

?>
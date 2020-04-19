<?php

class Role_model extends CI_Model
{
    public function hapusrole($id)
    {
        $this->db->where('id', $id)->delete('user_role');
        flashalert('Data has been deleted successfully', 'success');
        redirect('admin/role');
    }

    public function editrole($id)
    {
        $data = [
            'role' => $this->input->post('role', true)
        ];
        $this->db->where('id', $id)->update('user_role', $data);
        flashalert('Data has been edited Successfully', 'success');
        redirect('admin/role');
    }

    public function ambilrole($id)
    {
        return $this->db->where('id', $id)->get('user_role')->row_array();
    }
}
<?php
class User_model extends CI_Model
{
    public function getUser()
    {
        return $this->db->get('user')->result_object();
    }

    public function getUserById($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('user')->row_array();
    }

    public function deleteUserById($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user');
    }

    public function addUser($user)
    {
        return $this->db->insert('user', $user);
    }

    public function updateUser($id, $user)
    {
        $this->db->where('id', $id);
        $this->db->update('user', $user);
    }
}

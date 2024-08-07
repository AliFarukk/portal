<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Auth_model
 */
class Auth_model extends CI_Model
{

    /**
     * login
     *
     * @param  mixed $email
     * @param  mixed $password
     * @return void
     */
    public function login($email, $password)
    {

        $this->db->select("*");
        $this->db->where("(email = '$email' AND password = '$password')");
        $query = $this->db->get('users');
        if ($query->num_rows() > 0) {
            $results = $query->row();
        } else {
            $results =  false;
        }
        return $results;
    } // function ends

	// check if email already exists
	public function email_exist($email){
		$this->db->select("*");
        $this->db->where('email',$email);
        $query = $this->db->get('users');
        if ($query->num_rows() > 0) {
            return true;
        } else {
           return false;
        }
        
	}
	// all users 
	public function users(){
		$this->db->select("u.id,u.name,u.email,r.role_name");
        $this->db->from('users u');
		$this->db->where_not_in('id',$this->session->userdata('user_session')->id);
        $this->db->join('user_roles r','r.role_id = u.role_id');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $results = $query->result();
        } else {
            $results =  false;
        }
        return $results;
	}
	// get user roles
	public function get_roles(){
		return $this->db->select('*')->from('user_roles')->get()->result();
	}
	// save user
	public function save($user){
		$this->db->insert('users', $user);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
	// delete user
	public function delete($id){
		$this->db->where('id', $id);
		$query = $this->db->delete('users');
		if ($query) {
			return true;
		} else {
			return false;
		}
	}

    

}//class end here

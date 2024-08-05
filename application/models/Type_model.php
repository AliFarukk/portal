<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Auth_model
 */
class Type_model extends CI_Model
{

	// all types
    public function types(){
		return $this->db->select('*')->from('types')->get()->result();
	}

	// save type
	public function save($type)
	{
		$this->db->insert('types', $type);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	} // function ends

	// get single type for edit
	public function edit($id)
	{
		$this->db->where('type_id', $id);
		$query = $this->db->get('types');
		if ($query) {
			return $query->row();
		} else {
			false;
		}
	} // function ends

	// update type
	public function update($id, $type)
	{
		$this->db->where('type_id', $id);
		$query = $this->db->update('types', $type);
		if ($query) {
			return true;
		} else {
			return false;
		}
	} // function ends

	// delete type

	public function delete($id)
	{
		$this->db->where('type_id', $id);
		$query = $this->db->delete('types');
		if ($query) {
			return true;
		} else {
			return false;
		}
	} // function ends


}//class end here

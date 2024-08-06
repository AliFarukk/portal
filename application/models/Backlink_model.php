<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Auth_model
 */
class Backlink_model extends CI_Model
{

	// all backlinks
    public function backlinks($project_id){
		return $this->db->select('*')->from('backlinks b')->where('project_id',$project_id)->join('types t','t.type_id = b.type')->get()->result();
	}

	// save backlink
	public function save($backlink)
	{
		$this->db->insert('backlinks', $backlink);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	} // function ends

	// get single backlink for edit
	public function edit($id)
	{
		$this->db->where('backlink_id', $id);
		$query = $this->db->get('backlinks');
		if ($query) {
			return $query->row();
		} else {
			false;
		}
	} // function ends

	// update backlink
	public function update($id, $backlink)
	{
		$this->db->where('backlink_id', $id);
		$query = $this->db->update('backlinks', $backlink);
		if ($query) {
			return true;
		} else {
			return false;
		}
	} // function ends

	// delete backlink

	public function delete($id)
	{
		$this->db->where('backlink_id', $id);
		$query = $this->db->delete('backlinks');
		if ($query) {
			return true;
		} else {
			return false;
		}
	} // function ends


}//class end here

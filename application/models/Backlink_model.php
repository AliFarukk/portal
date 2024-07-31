<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Auth_model
 */
class Backlink_model extends CI_Model
{

	// all backlinks
    public function backlinks(){
		return $this->db->select('*')->from('backlinks b')->join('types t','t.type_id = b.type')->get()->result();
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

	// get single project for edit
	public function edit($id)
	{
		$this->db->where('project_id', $id);
		$query = $this->db->get('projects');
		if ($query) {
			return $query->row();
		} else {
			false;
		}
	} // function ends

	// update project
	public function update($id, $project)
	{
		$this->db->where('project_id', $id);
		$query = $this->db->update('projects', $project);
		if ($query) {
			return true;
		} else {
			return false;
		}
	} // function ends

	// delete project

	public function delete($id)
	{
		$this->db->where('project_id', $id);
		$query = $this->db->delete('projects');
		if ($query) {
			return true;
		} else {
			return false;
		}
	} // function ends


}//class end here

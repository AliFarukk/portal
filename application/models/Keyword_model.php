<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Keyword_model
 */
class Keyword_model extends CI_Model
{

	// all keywords
    public function keywords($project_id){
		return $this->db->select('*')->from('keywords')->where('project_id',$project_id)->get()->result();
	}

	// save keyword
	public function save($keyword)
	{
		$this->db->insert('keywords', $keyword);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	} // function ends

	// get single keyword for edit
	public function edit($id)
	{
		$this->db->where('keyword_id', $id);
		$query = $this->db->get('keywords');
		if ($query) {
			return $query->row();
		} else {
			false;
		}
	} // function ends

	// update keyword
	public function update($id, $keyword)
	{
		$this->db->where('keyword_id', $id);
		$query = $this->db->update('keywords', $keyword);
		if ($query) {
			return true;
		} else {
			return false;
		}
	} // function ends

	// delete keyword

	public function delete($id)
	{
		$this->db->where('keyword_id', $id);
		$query = $this->db->delete('keywords');
		if ($query) {
			return true;
		} else {
			return false;
		}
	} // function ends


}//class end here

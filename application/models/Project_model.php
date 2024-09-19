<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Auth_model
 */
class Project_model extends CI_Model
{

	// all projects
	public function projects()
	{
		$this->db->select('*')->from('projects');
		$this->db->join('status', "status.id = projects.status_id");
		return $this->db->get()->result();
	}
	

	// save project
	public function save($project)
	{
		$this->db->insert('projects', $project);
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

	// get status table
	public function get_status()
	{
		return $this->db->select('*')->from('status')->get()->result();
	}

	// save client_Project in permissions table
	public function save_client($client_project)
	{
		$this->db->insert('permissions', $client_project);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
	// view user's project permission
	public function permissions($user_id)
	{
		$this->db->select('p.id as pm_id, projects.project_name, u.name as username');
		$this->db->from('permissions p');
		// joins
		$this->db->join('projects', 'projects.project_id = p.project_id');
		$this->db->join('users u', 'u.id = p.user_id');
		$this->db->where('user_id', $user_id);
		return $this->db->get()->result();
	}
	// delete project permission for client
	public function delete_permission($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->delete('permissions');
		if ($query) {
			return true;
		} else {
			return false;
		}
	}

	// get projects for clients who have access
	public function project_detail()
	{
		if ($this->session->userdata('user_session')->role_id == 2) {

			$this->db->select('pr.*, st.status , IFNULL(COUNT(DISTINCT bl.backlink_id), 0) as total_backlinks, IFNULL(COUNT(DISTINCT kw.keyword_id), 0) as total_keywords');
			// From permissions table
			$this->db->from('permissions pm');
			// Filter by user_id
			$this->db->where('pm.user_id', $this->session->userdata('user_session')->id);

			// Join projects table
			$this->db->join('projects pr', 'pr.project_id = pm.project_id');
			// Left join with backlinks table
			$this->db->join('backlinks bl', 'bl.project_id = pr.project_id', 'left');
			// Left join with keywords table
			$this->db->join('keywords kw', 'kw.project_id = pr.project_id', 'left');
			// Left status with keywords table
			$this->db->join('status st', 'st.id = pr.status_id', 'left');
			

			// Group by project to avoid Cartesian product effect
			$this->db->group_by('pr.project_id');

			// Get the result
			return $this->db->get()->result();

		} elseif ($this->session->userdata('user_session')->role_id == 1) {

			$this->db->select('pr.*');
			$this->db->select('IFNULL(COUNT(DISTINCT bl.backlink_id), 0) as total_backlinks');
			$this->db->select(' IFNULL(COUNT(DISTINCT kw.keyword_id), 0) as total_keywords');
			$this->db->from('projects pr');

			$this->db->join('backlinks bl', 'bl.project_id = pr.project_id');
			$this->db->join('keywords kw', 'kw.project_id = pr.project_id');

			$this->db->group_by('pr.project_id');

			return $this->db->get()->result();
		}
	}

	// check if user has access to project backlinks
	public function check_access($project_id){
		$this->db->select('*');
		$this->db->from('permissions');
		$this->db->where('project_id',$project_id);
		$this->db->where('user_id',$this->session->userdata('user_session')->id);
		return $this->db->get()->row();
	}

	
}//class end here

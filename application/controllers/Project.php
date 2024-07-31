<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Project extends CI_Controller
{

	/**
	 * __construct
	 *
	 * @return void
	 */
	function __construct()
	{
		parent::__construct();
	} //end function

	public function index(){
		$data['page_title'] = "Projects";
		$data['projects'] = $this->project_model->projects();
		$this->load->view('admin_dashboard/projects/all_projects',$data);
	}
	
	//add project
	public function add_project(){
		$data['page_title'] = "Add Project";
		$this->load->view('admin_dashboard/projects/add_project');
	}

	// save project

	public function save_project()
	{
		$data['page_title'] = "Add Project";
		$this->form_validation->set_rules('name', 'Project Name', 'required');
		
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('admin_dashboard/projects/add_project', $data);
		}
		 else {
			$project = array(
				"project_name" => trim(html_escape($this->input->post('name', TRUE)))
			);
			
			// dd(gettype((int)$product['price']));
			if ($this->project_model->save($project)) {
				$this->session->set_flashdata('success', "Project added successfully.");
				return redirect(BASE_URL . "project");
			}
		}
	}

	// edit project
	public function edit_project($id)
	{
		$data['page_title'] = "Edit Project";
		$data['project'] = $this->project_model->edit($id);
		if ($data['project'] == false) {
			$this->session->set_flashdata('404', "Nothing found");
			return redirect(BASE_URL . 'project');
		} else {
			$this->load->view("admin_dashboard/projects/edit_project", $data);
		}
	}

	// update project
	public function update($id)
	{
		// $data['page_title'] = "Add Project";
		$this->form_validation->set_rules('name', 'Project Name', 'required');
		
		if ($this->form_validation->run() == FALSE) {
			$errors['errors'] = validation_errors();
			$this->session->set_flashdata($errors);
			return redirect(BASE_URL . 'project/edit_project/' . $id);
		}
		 else {
			$project = array(
				"project_name" => trim(html_escape($this->input->post('name', TRUE)))
			);
			
			if ($this->project_model->update($id,$project)) {
				$this->session->set_flashdata('success', "Project updated successfully.");
				return redirect(BASE_URL . "project");
			}
		}
	}

	// delete project
	public function delete($id)
	{
		$data['product'] = $this->project_model->delete($id);
		if ($data['product'] == false) {
			$this->session->set_flashdata('delete', "Project delete error ");
			return redirect(BASE_URL . 'project');
		} else {
			$this->session->set_flashdata('delete', "Project deleted successfully ");
			return redirect(BASE_URL . 'project');
		}
	}
}

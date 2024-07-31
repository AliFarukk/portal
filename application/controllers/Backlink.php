<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Backlink extends CI_Controller
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

	public function all_backlinks($project_id){
		

		$data['page_title'] = "Backlinks";
		$data['project_id'] = $project_id;
		$data['backlinks'] = $this->backlink_model->backlinks();
		$this->load->view('admin_dashboard/backlinks/all_backlinks',$data);
	}
	
	//add project
	public function add_backlink($project_id){
		$data['page_title'] = "Add Backlink";
		$data['project_id'] = $project_id;
		$data['types'] = $this->type_model->types();
		$this->load->view('admin_dashboard/backlinks/add_backlink',$data);
	}

	// save project

	public function save_backlink()
	{
		// dd('inbacklink');
		$data['page_title'] = "Save Backlink";
		$this->form_validation->set_rules('type', 'Type is required', 'required');
		$this->form_validation->set_rules('project_id', 'Project is required', 'required');
		$this->form_validation->set_rules('link', 'Link is required', 'required');
		
		if ($this->form_validation->run() == FALSE) {
			$errors['errors'] = validation_errors();
			$this->session->set_flashdata($errors);
			return redirect(BASE_URL . 'backlink/add_backlink/' . $this->input->post('project_id', TRUE));
			
		}
		 else {
			$backlink = array(
				"project_id" => trim(html_escape($this->input->post('project_id', TRUE))),
				"type" => trim(html_escape($this->input->post('type', TRUE))),
				"link" => trim(html_escape($this->input->post('link', TRUE)))
			);
			
			
			if ($this->backlink_model->save($backlink)) {
				$this->session->set_flashdata('success', "Backlink added successfully.");
				return redirect(BASE_URL . "project/all_backlinks/".$this->input->post('project_id', TRUE));
			}else{
				$this->session->set_flashdata('errors', "Something went wrong. Please try agin.");
				return redirect(BASE_URL . 'backlink/add_backlink/' . $this->input->post('project_id', TRUE));
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

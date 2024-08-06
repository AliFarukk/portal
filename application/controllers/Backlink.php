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
		if (!$this->session->userdata('user_session')->logged_in) {
			redirect(BASE_URL . 'auth/login');
		}
	} //end function

	public function all_backlinks($project_id){
		

		$data['page_title'] = "Backlinks";
		$data['project_id'] = $project_id;
		$data['backlinks'] = $this->backlink_model->backlinks();
		$this->load->view('admin_dashboard/backlinks/all_backlinks',$data);
	}
	
	//add backlink
	public function add_backlink($project_id){
		$data['page_title'] = "Add Backlink";
		$data['project_id'] = $project_id;
		$data['types'] = $this->type_model->types();
		$this->load->view('admin_dashboard/backlinks/add_backlink',$data);
	}

	// save backlink

	public function save_backlink()
	{
		$data['page_title'] = "Save Backlink";
		$this->form_validation->set_rules('type', 'Type', 'required');
		$this->form_validation->set_rules('project_id', 'Project id', 'required');
		$this->form_validation->set_rules('domain', 'Domain', 'required');
		$this->form_validation->set_rules('link', 'Link', 'required');
		
		if ($this->form_validation->run() == FALSE) {
			$errors['errors'] = validation_errors();
			$this->session->set_flashdata($errors);
			return redirect(BASE_URL . 'backlink/add_backlink/' . $this->input->post('project_id', TRUE));
			
		}
		 else {
			$backlink = array(
				"project_id" => trim(html_escape($this->input->post('project_id', TRUE))),
				"type" => trim(html_escape($this->input->post('type', TRUE))),
				"domain" => trim(html_escape($this->input->post('domain', TRUE))),
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

	// edit backlink
	public function edit_backlink($id)
	{
		$data['page_title'] = "Edit Backlink";
		$data['backlink'] = $this->backlink_model->edit($id);
		$data['types'] = $this->type_model->types();
		if ($data['backlink'] == false) {
			$this->session->set_flashdata('e404', "Nothing found");
			return redirect(BASE_URL . 'project');
		} else {
			$this->load->view("admin_dashboard/backlinks/edit_backlink", $data);
		}
	}

	// update backlink
	public function update($id)
	{
		
		$this->form_validation->set_rules('type', 'Type', 'required');
		$this->form_validation->set_rules('domain', 'Domain', 'required');
		$this->form_validation->set_rules('link', 'Link', 'required');
		
		if ($this->form_validation->run() == FALSE) {
			$errors['errors'] = validation_errors();
			$this->session->set_flashdata($errors);
			return redirect(BASE_URL . 'backlink/edit_backlink/' . $id);
		}
		 else {
			$backlink = array(
				"type" => trim(html_escape($this->input->post('type', TRUE))),
				"domain" => trim(html_escape($this->input->post('domain', TRUE))),
				"link" => trim(html_escape($this->input->post('link', TRUE)))
			);
			
			if ($this->backlink_model->update($id,$backlink)) {
				$this->session->set_flashdata('success', "Backlink updated successfully.");
				return redirect(BASE_URL . "project");
			}else{
				$this->session->set_flashdata('fail', "Backlink update failed. Please try again.");
				return redirect(BASE_URL . "project");
			}
		}
	}

	// delete backlink
	public function delete($id)
	{
		$data['backlink'] = $this->backlink_model->delete($id);
		if ($data['backlink'] == false) {
			$this->session->set_flashdata('delete', "Backlink delete error ");
			return redirect(BASE_URL . 'project');
		} else {
			$this->session->set_flashdata('delete', "Backlink deleted successfully ");
			return redirect(BASE_URL . 'project');
		}
	}
}

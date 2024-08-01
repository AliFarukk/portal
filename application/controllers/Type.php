<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Type extends CI_Controller
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

	public function all_types(){
		

		$data['page_title'] = "Backlink Types";
		$data['types'] = $this->type_model->types();
		$this->load->view('admin_dashboard/types/all_types',$data);
	}
	
	//add project
	public function add_type(){
		$data['page_title'] = "Add Type";
		$this->load->view('admin_dashboard/types/add_type',$data);
	}

	// save project

	public function save_type()
	{
		// dd('inbacklink');
		$data['page_title'] = "Save Type";
		$this->form_validation->set_rules('name', 'Type', 'required');
		
		if ($this->form_validation->run() == FALSE) {
			$errors['errors'] = validation_errors();
			$this->session->set_flashdata($errors);
			return redirect(BASE_URL . 'type/add_type');
			
		}
		 else {
			$type = array(
				"type_name" => trim(html_escape($this->input->post('name', TRUE)))
			);
			
			
			if ($this->type_model->save($type)) {
				$this->session->set_flashdata('success', "Type added successfully.");
				return redirect(BASE_URL . "type/all_types");
			}else{
				$this->session->set_flashdata('e404', "Something went wrong. Please try again.");
				return redirect(BASE_URL . 'type/add_type');
			}
		}
	}

	// edit project
	public function edit_type($id)
	{
		$data['page_title'] = "Edit Type";
		$data['type'] = $this->type_model->edit($id);
		if ($data['type'] == false) {
			$this->session->set_flashdata('e404', "Nothing found");
			return redirect(BASE_URL . 'type/all_types');
		} else {
			$this->load->view("admin_dashboard/types/edit_type", $data);
		}
	}

	// update type
	public function update($id)
	{
		
		$this->form_validation->set_rules('name', 'Type', 'required');
		
		if ($this->form_validation->run() == FALSE) {
			$errors['errors'] = validation_errors();
			$this->session->set_flashdata($errors);
			return redirect(BASE_URL . 'type/edit_type/' . $id);
		}
		 else {
			$type = array(
				"type_name" => trim(html_escape($this->input->post('name', TRUE)))
				
			);
			
			if ($this->type_model->update($id,$type)) {
				$this->session->set_flashdata('success', "Type updated successfully.");
				return redirect(BASE_URL . "type/all_types");
			}else{
				$this->session->set_flashdata('fail', "Type update failed. Please try again.");
				return redirect(BASE_URL . "type/all_types");
			}
		}
	}

	// delete project
	public function delete($id)
	{
		$data['type'] = $this->type_model->delete($id);
		if ($data['type'] == false) {
			$this->session->set_flashdata('fail', "Type delete error ");
			return redirect(BASE_URL . 'type/all_types');
		} else {
			$this->session->set_flashdata('delete', "Type deleted successfully ");
			return redirect(BASE_URL . 'type/all_types');
		}
	}
}

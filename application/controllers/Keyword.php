<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keyword extends CI_Controller
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

	public function all_keywords($project_id)
	{


		$data['page_title'] = "keywords";
		$data['project_id'] = $project_id;
		if ($this->session->userdata('user_session')->role_id == 2) {

			$data['check'] = $this->project_model->check_access($project_id);
			if ($data['check']->project_id == $project_id) {
				$data['keywords'] = $this->keyword_model->keywords($project_id);
			} else {
				redirect(BASE_URL . 'dashboard');
			}
		} elseif ($this->session->userdata('user_session')->role_id == 1) {
			$data['keywords'] = $this->keyword_model->keywords($project_id);
		}

		$this->load->view('admin_dashboard/keywords/all_keywords', $data);
	}

	//add keyword
	public function add_keyword($project_id)
	{
		if ($this->session->userdata('user_session')->role_id == 1) {
			$data['page_title'] = "Add keyword";
			$data['project_id'] = $project_id;
			$this->load->view('admin_dashboard/keywords/add_keyword', $data);
		} else {
			return redirect(BASE_URL . 'dashboard');
		}
	}

	// save keyword

	public function save_keyword()
	{
		if ($this->session->userdata('user_session')->role_id == 1) {
			$data['page_title'] = "Save Keyword";
			$this->form_validation->set_rules('project_id', 'Project id', 'required');
			$this->form_validation->set_rules('keyword', 'Keyword', 'required');
			$this->form_validation->set_rules('ini_rank', 'Initial ranking', 'required');
			$this->form_validation->set_rules('cur_rank', 'Current ranking', 'required');

			if ($this->form_validation->run() == FALSE) {
				$errors['errors'] = validation_errors();
				$this->session->set_flashdata($errors);
				return redirect(BASE_URL . 'keyword/add_keyword/' . $this->input->post('project_id', TRUE));
			} else {
				$keyword = array(
					"project_id" => trim(html_escape($this->input->post('project_id', TRUE))),
					"keyword" => trim(html_escape($this->input->post('keyword', TRUE))),
					"initial_ranking" => trim(html_escape($this->input->post('ini_rank', TRUE))),
					"current_ranking" => trim(html_escape($this->input->post('cur_rank', TRUE)))
				);


				if ($this->keyword_model->save($keyword)) {
					$this->session->set_flashdata('success', "Keyword added successfully.");
					return redirect(BASE_URL . "keyword/all_keywords/" . $this->input->post('project_id', TRUE));
				} else {
					$this->session->set_flashdata('errors', "Something went wrong. Please try agin.");
					return redirect(BASE_URL . 'keyword/add_keyword/' . $this->input->post('project_id', TRUE));
				}
			}
		} else {
			return redirect(BASE_URL . 'dashboard');
		}
	}

	// edit keyword
	public function edit_keyword($id)
	{
		if ($this->session->userdata('user_session')->role_id == 1) {
			$data['page_title'] = "Edit Keyword";
			$data['keyword'] = $this->keyword_model->edit($id);
			if ($data['keyword'] == false) {
				$this->session->set_flashdata('e404', "Nothing found");
				return redirect(BASE_URL . 'project');
			} else {
				$this->load->view("admin_dashboard/keywords/edit_keyword", $data);
			}
		} else {
			return redirect(BASE_URL . 'dashboard');
		}
	}

	// update keyword
	public function update($id)
	{
		if ($this->session->userdata('user_session')->role_id == 1) {
			$this->form_validation->set_rules('keyword', 'Keyword', 'required');
			$this->form_validation->set_rules('ini_rank', 'Initial Ranking', 'required');
			$this->form_validation->set_rules('cur_rank', 'Current Ranking', 'required');

			if ($this->form_validation->run() == FALSE) {
				$errors['errors'] = validation_errors();
				$this->session->set_flashdata($errors);
				return redirect(BASE_URL . 'keyword/edit_keyword/' . $id);
			} else {
				$keyword = array(
					"keyword" => trim(html_escape($this->input->post('keyword', TRUE))),
					"initial_ranking" => trim(html_escape($this->input->post('ini_rank', TRUE))),
					"current_ranking" => trim(html_escape($this->input->post('cur_rank', TRUE)))
				);

				if ($this->keyword_model->update($id, $keyword)) {
					$this->session->set_flashdata('success', "Keyword updated successfully.");
					return redirect(BASE_URL . "project");
				} else {
					$this->session->set_flashdata('fail', "Keyword update failed. Please try again.");
					return redirect(BASE_URL . "project");
				}
			}
		} else {
			return redirect(BASE_URL . 'dashboard');
		}
	}

	// delete keyword
	public function delete($id)
	{
		if ($this->session->userdata('user_session')->role_id == 1) {
			$data['keyword'] = $this->keyword_model->delete($id);
			if ($data['keyword'] == false) {
				$this->session->set_flashdata('delete', "Keyword delete error ");
				return redirect(BASE_URL . 'project');
			} else {
				$this->session->set_flashdata('delete', "Keyword deleted successfully ");
				return redirect(BASE_URL . 'project');
			}
		} else {
			return redirect(BASE_URL . 'dashboard');
		}
	}
}

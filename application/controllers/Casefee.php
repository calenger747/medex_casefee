<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Casefee extends CI_Controller {

	public function __construct() { 
		parent::__construct();
		$this->load->model('M_Casefee','casefee');
	}

	private function load($title = '', $datapath = '', $script){

		$get = array(
			"title" => $title,
			"script" => $script,
		);

		$page = array(
			"head" => $this->load->view('template/head', $get, true),
			"sidebar" => $this->load->view('template/sidebar', false, true),
			"navigation" => $this->load->view('template/navigation', false, true),
			"meta" => $this->load->view('template/meta', false, true),
			"footer" => $this->load->view('template/footer', false, true),
			"js" => $this->load->view('template/js', $get, true),
		);
		return $page;
	}

	public function index(){
		$script = 'assets/script/casefee.js';
		$path = "";
		$data = array(
			"page" => $this->load("Data Casefee", $path, $script),
			"content" =>$this->load->view('casefee/index', false, true)
		);
		$this->load->view('template/default_template', $data);
	}

	// Datatable
	public function showCasefee()
	{
		$list = $this->casefee->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $casefee) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $casefee->case_id;
			$row[] = $casefee->remarks;
			$row[] = $casefee->payment_by;
			$row[] = date('d M Y', strtotime($casefee->date_receive));
			$row[] = '<a class="nav-link btn-sm float-right" href="#" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<i class="material-icons">more_vert</i>
			</a>
			<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
			<a class="dropdown-item" href="#" data-toggle="modal" data-target="#myModalEdit" data-id="'.$casefee->id_ref.'" data-case_id="'.$casefee->case_id.'" data-remarks="'.$casefee->remarks.'" data-payment="'.$casefee->payment_by.'" data-date="'.date('m/d/Y', strtotime($casefee->date_receive)).'">Edit</a>
			<a class="dropdown-item delete_casefee" href="#" data-id="'.$casefee->id_ref.'">Delete</a>
			</div>';

			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->casefee->count_all(),
			"recordsFiltered" => $this->casefee->count_filtered(),
			"data" => $data,
		);
        //output to json format
		echo json_encode($output);
	}

	// Add Casefee
	public function addCasefee()
	{
		try {
			$output = array('error' => false);

			$case_id 		= $this->input->post('add_case_id');
			$remarks 		= $this->input->post('add_remarks');
			$payment_by 	= $this->input->post('add_payment');
			$date_receive 	= date('Y-m-d', strtotime($this->input->post('add_date_receive')));

			$data = array(
				'case_id' 		=> $case_id,
				'remarks' 		=> $remarks,
				'payment_by' 	=> $payment_by,
				'date_receive' 	=> $date_receive,
			);

			$add = $this->db->insert('table_casefee', $data);
			if ($add == TRUE) {
				$output['message'] = 'Data Saved Successfully!';
			} else {
				$output['error'] = true;
				$output['message'] = 'Data Failed to Save!';
			}

			echo json_encode($output);

		} catch (Exception $e) {
			
		}
	}

	// Edit Casefee
	public function editCasefee()
	{
		try {
			$output = array('error' => false);

			$id_ref 		= $this->input->post('edit_id');
			$case_id 		= $this->input->post('edit_case_id');
			$remarks 		= $this->input->post('edit_remarks');
			$payment_by 	= $this->input->post('edit_payment');
			$date_receive 	= date('Y-m-d', strtotime($this->input->post('edit_date_receive')));

			$data = array(
				'case_id' 		=> $case_id,
				'remarks' 		=> $remarks,
				'payment_by' 	=> $payment_by,
				'date_receive' 	=> $date_receive,
			);

			$this->db->where('id_ref', $id_ref);
			$update = $this->db->update('table_casefee', $data);
			if ($update == TRUE) {
				$output['message'] = 'Data Saved Successfully!';
			} else {
				$output['error'] = true;
				$output['message'] = 'Data Failed to Save!';
			}

			echo json_encode($output);

		} catch (Exception $e) {
			
		}
	}

	// Delete Casefee
	public function deleteCasefee($id)
	{
		try {
			$output = array('error' => false);

			$id_ref = $id;
			$delete = $this->db->delete('table_casefee',['id_ref'=>$id_ref]);

			if ($delete == TRUE) {
				$output['message'] = 'Data has been deleted!';
			} else {
				$output['error'] = true;
				$output['message'] = 'Data Failed to Delete!';
			}

			echo json_encode($output);
		} catch (Exception $e) {
			redirect('dashboard/category');
		}
	}
}
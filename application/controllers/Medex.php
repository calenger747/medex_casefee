<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Medex extends CI_Controller {

	public function __construct() { 
		parent::__construct();
		$this->load->model('M_Medex','medex');
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
		$script = 'assets/script/medex.js';
		$path = "";
		$data = array(
			"page" => $this->load("Data Medex", $path, $script),
			"content" =>$this->load->view('medex/index', false, true)
		);
		$this->load->view('template/default_template', $data);
	}

	// Datatable
	public function showMedex()
	{
		$list = $this->medex->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $medex) {
			if ($medex->date_receive_payment == NULL || $medex->date_receive_payment == '' ) {
				$date = '';
			} else {
				$date = date('d M Y', strtotime($medex->date_receive_payment));
			}
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $medex->qa_number;
			$row[] = $medex->bill_remark;
			$row[] = $medex->paid_by;
			$row[] = $date;

			$data[] = $row;
		}
// <a class="nav-link btn-sm float-right" href="#" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
// 			<i class="material-icons">more_vert</i>
// 			</a>
// 			<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
// 			<a class="dropdown-item" href="#" data-toggle="modal" data-target="#myModalEdit" data-id="'.$medex->id_ref.'" data-quot="'.$medex->quotation_number.'" data-remarks="'.$medex->remarks.'" data-payment="'.$medex->payment_by.'" data-date="'.date('m/d/Y', strtotime($medex->date_receive)).'">Edit</a>
// 			<a class="dropdown-item delete_medex" href="#" data-id="'.$medex->id_ref.'">Delete</a>
// 			</div>
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->medex->count_all(),
			"recordsFiltered" => $this->medex->count_filtered(),
			"data" => $data,
		);
        //output to json format
		echo json_encode($output);
	}

	// Import Format Medex
	private $filename = "import_data";

	public function importMedex(){
		date_default_timezone_set('Asia/Jakarta');

		// Load plugin PHPExcel nya
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';

		$this->load->library('upload'); // Load librari upload

		$config['upload_path'] = './assets/excel/';
		$config['allowed_types'] = 'xlsx';
		$config['max_size'] = '10485760';
		$config['overwrite'] = true;
		$config['file_name'] = $this->filename;

		$this->upload->initialize($config);
		if($this->upload->do_upload('file')){
			$excelreader = new PHPExcel_Reader_Excel2007();
			$loadexcel = $excelreader->load('assets/excel/'.$this->filename.'.xlsx');
			$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);

			$data = array();

			$numrow = 1;
			foreach($sheet as $row){
				if($numrow > 1){
					array_push($data, array(
						'qa_number'=>$row['A'], 
						'bill_remark'=>$row['B'], 
						'paid_by'=>$row['D'],
						'date_receive_payment'=> date('Y-m-d', strtotime($row['E'])),
						'edit_date'=> date("Y-m-d H:i:s"),
						'edited_by'=> $row['D'],
					));
				}

				$numrow++;
			}

			$upload = $this->db->update_batch('case_service', $data, 'qa_number');

			if($upload) {
				$this->session->set_flashdata("notif1", "Data Berhasil Disimpan");
				redirect('Medex');
			} else {
				$this->session->set_flashdata("notif2", "Data Gagal Disimpan");
				redirect('Medex');
			}
		}else{
			$this->session->set_flashdata("notif2", "File Gagal Di Upload");
			redirect('Medex');
		}
		
		
		
	}
}
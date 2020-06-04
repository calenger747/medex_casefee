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

			if ($casefee->date_receive_payment == NULL || $casefee->date_receive_payment == '' ) {
				$date = '';
			} else {
				$date = date('d M Y', strtotime($casefee->date_receive_payment));
			}

			$row[] = $no;
			$row[] = $casefee->case_id;
			$row[] = $casefee->bill_remark;
			$row[] = $casefee->paid_by;
			$row[] = $date;

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

	// Import Format Casefee
	private $filename = "import_data";

	public function importCasefee(){
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
						'case_id'=>$row['A'], 
						'bill_remark'=>$row['B'], 
						'paid_by'=>$row['D'],
						'date_receive_payment'=> date('Y-m-d', strtotime($row['E'])),
						'edit_date'=> date("Y-m-d H:i:s"),
						'edited_by'=> $row['D'],
					));
				}

				$numrow++;
			}

			$upload = $this->db->update_batch('`case`', $data, 'case_id');

			if($upload) {
				$this->session->set_flashdata("notif1", "Data Berhasil Disimpan");
				redirect('Casefee');
			} else {
				$this->session->set_flashdata("notif2", "Data Gagal Disimpan");
				redirect('Casefee');
			}
		}else{
			$this->session->set_flashdata("notif2", "File Gagal Di Upload");
			redirect('Casefee');
		}
		
		
	}
}
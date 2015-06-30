<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class users extends CI_Controller
{

     public function __construct()
     {
          parent::__construct();
          $this->load->library('session');
          $this->load->helper('form');
          $this->load->helper('url');
          $this->load->helper('html');
          $this->load->database();
          $this->load->library('form_validation');
		  $this->load->library("pagination");
          //load the login model
          $this->load->model('user_model');
		  if(!$this->session->userdata('username'))
			 redirect('login');
     }

     public function index()
     {
		/**************** pagination starts ****************/
		$config = array();
        $config["base_url"] = base_url() . "users/index/";
        $config["total_rows"] = $this->user_model->record_count();
        $config["per_page"] = 3;
        $config["uri_segment"] = 3;
		$this->pagination->initialize($config); 
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		/**************** pagination ends ****************/

		$usr_result['users'] = $this->user_model->get_user($config["per_page"], $page);
		$data["results"] = $this->user_model->get_user($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();

		 
		 $this->load->view('header');
		 $this->load->view('user/user_index', $data);
		 $this->load->view('footer');
     }

	 public function add()
     {
		 $this->load->view('header');
		 $this->load->view('user/user_add');
		 $this->load->view('footer');
		 if($_POST['btn_login'])
		 {
			  $data['user_name']=$_POST['txt_username'];
			  $data['user_id']=$_POST['txt_user_id'];
			  $data['password']=md5($_POST['txt_password']);
			  $this->user_model->add_user($data);
			  redirect('users/');
		 }
     }


	 public function bulkadd()
     {
		 $this->load->library('excel');
		 
		 //echo base_url();die;
		 $file = 'D:\xampp\htdocs\CI\application\third_party\testdata.xlsx';
		//load the excel library
		
		//read file from path
		$objPHPExcel = PHPExcel_IOFactory::load($file);
		echo "!11";
		//get only the Cell Collection
		$cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();
		//extract to a PHP readable array format
		foreach ($cell_collection as $cell) {
			$column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
			$row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
			$data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();
			//header will/should be in row 1 only. of course this can be modified to suit your need.
			if ($row == 1) {
				$header[$row][$column] = $data_value;
			} else {
				$arr_data[$row][$column] = $data_value;
			}
			echo "=--=";
		}
		//send the data in an array format
		$data['header'] = $header;
		$data['values'] = $arr_data;

		 
		 $this->load->view('header');
		 $this->load->view('user/user_buld_add');
		 $this->load->view('footer');
		

		
     }
}?>
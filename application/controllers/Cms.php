<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cms extends CI_Controller {

	 function __construct()
	 {
	   parent::__construct();
	   $this->load->database();
	   $this->load->helper('url');
	   $this->load->model("user_model");
	   $this->load->model("Cms_model");
	     $this->lang->load('basic', $this->config->item('language'));

	 }

	public function index($limit='0')
	{
		
		 
	}
	
	
	
	
	
 
	function page($page_id='0',$page_url=''){
			
		 		$data['group_list']=$this->user_model->group_list();
 		$data['quiz_list']=$this->Cms_model->quiz_list();

		 $data['title']=$this->lang->line('edit_page');
		$data['page']=$this->Cms_model->get_page($page_id);
		$data['menu_header']=$this->Cms_model->menu_list('Header');
		$data['menu_footer']=$this->Cms_model->menu_list('Footer');
		$data['slider']=$this->Cms_model->slider_list();
		$query=$this->db->query("select qid from savsoft_qbank ");
		$data['questions']=$query->num_rows();
		$query=$this->db->query("select quid from savsoft_quiz ");
		$data['quiz']=$query->num_rows();
		$query=$this->db->query("select rid from savsoft_result ");
		$data['results']=$query->num_rows();
		
		$data['setting']=$this->Cms_model->get_design();
		if($data['page']['page_status']=="Published"){
 		$this->load->view('page',$data);
		}
 	}
	
	
  
	

 
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cms_admin extends CI_Controller {

	 function __construct()
	 {
	   parent::__construct();
	   $this->load->database();
	   $this->load->helper('url');
	   $this->load->model("Cms_model");
	     $this->lang->load('basic', $this->config->item('language'));

	 }

	public function index($limit='0')
	{
		
		// redirect if not loggedin
		if(!$this->session->userdata('logged_in')){
			redirect('login');
			
		}
		$logged_in=$this->session->userdata('logged_in');
		if($logged_in['base_url'] != base_url()){
		$this->session->unset_userdata('logged_in');		
		redirect('login');
		}
		
	 					$logged_in=$this->session->userdata('logged_in');
                        $acp=explode(',',$logged_in['setting']);
			if(!in_array('All',$acp)){
			exit($this->lang->line('permission_denied'));
			}
			
		
		 	 
			
			
	   $data['limit']=$limit;
		$data['title']=$this->lang->line('advertisment');
		 
		$data['result']=$this->Advertisment_model->advertisment_list($limit);
		$this->load->view('header',$data);
		$this->load->view('advertisment_list',$data);
		$this->load->view('footer',$data);
	}
	
	
	
	
	
		public function menu_list()
	{
		
		// redirect if not loggedin
		if(!$this->session->userdata('logged_in')){
			redirect('login');
			
		}
		$logged_in=$this->session->userdata('logged_in');
		if($logged_in['base_url'] != base_url()){
		$this->session->unset_userdata('logged_in');		
		redirect('login');
		}
		
	 		$logged_in=$this->session->userdata('logged_in');
            $acp=explode(',',$logged_in['setting']);
			if(!in_array('All',$acp)){
			exit($this->lang->line('permission_denied'));
			}
			
		
		 	 
			
			
	  $data['title']=$this->lang->line('menu_list');
				$data['result']=$this->Cms_model->menu_list('Header');
				$data['result2']=$this->Cms_model->menu_list('Footer');
		$this->load->view('header',$data);
		 $this->load->view('menu_list',$data);
		$this->load->view('footer',$data);
	}
	
	
		function add_new_menu(){
					$logged_in=$this->session->userdata('logged_in');
                        $acp=explode(',',$logged_in['setting']);
			if(!in_array('All',$acp)){
			exit($this->lang->line('permission_denied'));
			}
		 
		 $data['title']=$this->lang->line('add_menu');
			$data['pages']=$this->Cms_model->page_list();
		
		  $this->load->view('header',$data);
		$this->load->view('add_menu',$data);

		
		$this->load->view('footer',$data);
	}
	
	
	function insert_menu(){
		 
		if($this->db->insert('savsoft_menu',$_POST)){
			$this->session->set_flashdata('message', "<div class='alert alert-success'>Menu created successfully </div>");
	redirect('cms_admin/menu_list');
		}else{
			$this->session->set_flashdata('message', "<div class='alert alert-danger'>Unable to add data</div>");
	redirect('cms_admin/menu_list');
			
		}
	}
	
	
	function edit_menu($menu_id){
					$logged_in=$this->session->userdata('logged_in');
                        $acp=explode(',',$logged_in['setting']);
			if(!in_array('All',$acp)){
			exit($this->lang->line('permission_denied'));
			}
		 
		 $data['title']=$this->lang->line('edit_menu');
			$data['menu']=$this->Cms_model->get_menu($menu_id);
		$data['pages']=$this->Cms_model->page_list();
		
		  $this->load->view('header',$data);
		$this->load->view('edit_menu',$data);

		
		$this->load->view('footer',$data);
	}
	
	
		function update_menu($menu_id){
		 $this->db->where('menu_id',$menu_id);
		if($this->db->update('savsoft_menu',$_POST)){
			$this->session->set_flashdata('message', "<div class='alert alert-success'>Menu created successfully </div>");
	redirect('cms_admin/menu_list');
		}else{
			$this->session->set_flashdata('message', "<div class='alert alert-danger'>Unable to add data</div>");
	redirect('cms_admin/menu_list');
			
		}
	}
	
	
		function remove_menu($menu_id){
		 $this->db->where('menu_id',$menu_id);
		if($this->db->delete('savsoft_menu')){
			$this->session->set_flashdata('message', "<div class='alert alert-success'>Menu removed successfully </div>");
	redirect('cms_admin/menu_list');
		}else{
			$this->session->set_flashdata('message', "<div class='alert alert-danger'>Unable to remove data</div>");
	redirect('cms_admin/menu_list');
			
		}
	}
	
	
	
	function copym($menu_position,$menu_id){
		$this->db->where('menu_id',$menu_id);
		$query=$this->db->get('savsoft_menu');
		$menu=$query->row_array();
		
		$menu['menu_position']=$menu_position;
		unset($menu['menu_id']);
		$this->db->insert('savsoft_menu',$menu);
		$this->session->set_flashdata('message', "<div class='alert alert-success'>Menu created successfully </div>");
	    redirect('cms_admin/menu_list');
	}
	
	
	
	public function page_list($limit='0')
	{
		
		// redirect if not loggedin
		if(!$this->session->userdata('logged_in')){
			redirect('login');
			
		}
		$logged_in=$this->session->userdata('logged_in');
		if($logged_in['base_url'] != base_url()){
		$this->session->unset_userdata('logged_in');		
		redirect('login');
		}
		
	 		$logged_in=$this->session->userdata('logged_in');
            $acp=explode(',',$logged_in['setting']);
			if(!in_array('All',$acp)){
			exit($this->lang->line('permission_denied'));
			}
			
		
		 	 
			
			
	  $data['title']=$this->lang->line('page_list');
				$data['result']=$this->Cms_model->page_list_all($limit);
				 
		$this->load->view('header',$data);
		 $this->load->view('page_list',$data);
		$this->load->view('footer',$data);
	}
	

	
			function add_new_page(){
					$logged_in=$this->session->userdata('logged_in');
                        $acp=explode(',',$logged_in['setting']);
			if(!in_array('All',$acp)){
			exit($this->lang->line('permission_denied'));
			}
		 
		 $data['title']=$this->lang->line('add_page');
			 
		  $this->load->view('header',$data);
		$this->load->view('add_page',$data);

		
		$this->load->view('footer',$data);
	}
	
	
	function insert_page(){
		 if($_POST['home_page']=="Yes"){
		  $this->db->update('savsoftquiz_page',array('home_page'=>'No')); 
		 }
		if($this->db->insert('savsoftquiz_page',$_POST)){
			$this->session->set_flashdata('message', "<div class='alert alert-success'>Page created successfully </div>");
	redirect('cms_admin/page_list');
		}else{
			$this->session->set_flashdata('message', "<div class='alert alert-danger'>Unable to add data</div>");
	redirect('cms_admin/page_list');
			
		}
	}


			function edit_page($page_id){
					$logged_in=$this->session->userdata('logged_in');
                        $acp=explode(',',$logged_in['setting']);
			if(!in_array('All',$acp)){
			exit($this->lang->line('permission_denied'));
			}
		 
		 $data['title']=$this->lang->line('edit_page');
			 	$data['page']=$this->Cms_model->get_page($page_id);
		
		  $this->load->view('header',$data);
		$this->load->view('edit_page',$data);

		
		$this->load->view('footer',$data);
	}
	
	
	function update_page($page_id){
		if($_POST['home_page']=="Yes"){
		  $this->db->update('savsoftquiz_page',array('home_page'=>'No')); 
		 }
		 
		  $this->db->where('page_id',$page_id);
		
		if($this->db->update('savsoftquiz_page',$_POST)){
			$this->session->set_flashdata('message', "<div class='alert alert-success'>Page updated successfully </div>");
	redirect('cms_admin/page_list');
		}else{
			$this->session->set_flashdata('message', "<div class='alert alert-danger'>Unable to add data</div>");
	redirect('cms_admin/page_list');
			
		}
	}
	
	
	
		function remove_page($page_id){
		 $this->db->where('page_id',$page_id);
		if($this->db->delete('savsoftquiz_page')){
			$this->session->set_flashdata('message', "<div class='alert alert-success'>Page removed successfully </div>");
	redirect('cms_admin/page_list');
		}else{
			$this->session->set_flashdata('message', "<div class='alert alert-danger'>Unable to remove data</div>");
	redirect('cms_admin/page_list');
			
		}
	}
	
	
	
	
		public function slider($limit='0')
	{
		
		// redirect if not loggedin
		if(!$this->session->userdata('logged_in')){
			redirect('login');
			
		}
		$logged_in=$this->session->userdata('logged_in');
		if($logged_in['base_url'] != base_url()){
		$this->session->unset_userdata('logged_in');		
		redirect('login');
		}
		
	 		$logged_in=$this->session->userdata('logged_in');
            $acp=explode(',',$logged_in['setting']);
			if(!in_array('All',$acp)){
			exit($this->lang->line('permission_denied'));
			}
			
		
		 	 
			
			
	  $data['title']=$this->lang->line('slider');
				$data['result']=$this->Cms_model->slider_list();
				 
		$this->load->view('header',$data);
		 $this->load->view('slider',$data);
		$this->load->view('footer',$data);
	}
	
	
	
	
	
	
	function insert_slider(){
			if($this->db->insert('savsoft_slider',$_POST)){
			$this->session->set_flashdata('message', "<div class='alert alert-success'>Image added successfully </div>");
	redirect('cms_admin/slider');
		}else{
			$this->session->set_flashdata('message', "<div class='alert alert-danger'>Unable to add data</div>");
	 redirect('cms_admin/slider');
			
		}
	
	}
	
	
	
	
	function remove_slider($slider_id){
		 $this->db->where('slider_id',$slider_id);
		if($this->db->delete('savsoft_slider')){
			$this->session->set_flashdata('message', "<div class='alert alert-success'>Image removed successfully </div>");
	redirect('cms_admin/slider');
		}else{
			$this->session->set_flashdata('message', "<div class='alert alert-danger'>Unable to remove data</div>");
	redirect('cms_admin/slider');
			
		}
	}
	

	
	
			public function design()
	{
		
		// redirect if not loggedin
		if(!$this->session->userdata('logged_in')){
			redirect('login');
			
		}
		$logged_in=$this->session->userdata('logged_in');
		if($logged_in['base_url'] != base_url()){
		$this->session->unset_userdata('logged_in');		
		redirect('login');
		}
		
	 		$logged_in=$this->session->userdata('logged_in');
            $acp=explode(',',$logged_in['setting']);
			if(!in_array('All',$acp)){
			exit($this->lang->line('permission_denied'));
			}
			
		
		 	 
			
			
	  $data['title']="Design";
		$data['result']=$this->Cms_model->get_design();
		$this->load->view('header',$data);
		 $this->load->view('design',$data);
		$this->load->view('footer',$data);
	}
	
		function update_setting(){
			 $this->db->where('cms_settting_id','1');
		if($this->db->update('savsoft_cms_setting',$_POST)){
			$this->session->set_flashdata('message', "<div class='alert alert-success'>Setting updates successfully </div>");
	redirect('cms_admin/design');
		}else{
			$this->session->set_flashdata('message', "<div class='alert alert-danger'>Unable to update data</div>");
	 redirect('cms_admin/design');
			
		}
	
	}
	
	

 
}

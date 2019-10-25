<?php
Class Cms_model extends CI_Model
{
 
  function menu_list($menu_position){
	  $logged_in=$this->session->userdata('logged_in');
		
	//  $this->db->limit($this->config->item('number_of_rows'),$limit);
		 $this->db->where('menu_position',$menu_position);
		$this->db->order_by('order_by','desc');
		$query=$this->db->get('savsoft_menu');
		return $query->result_array();
		
	 
 }
 function page_list(){
	   $this->db->where('content_type','Post');
		 $this->db->where('page_status','Published');
		$this->db->order_by('page_id','desc');
		$query=$this->db->get('savsoftquiz_page');
		return $query->result_array();
		
	 
 }
function slider_list(){
	   $this->db->order_by('slider_id','asc');
		$query=$this->db->get('savsoft_slider');
		return $query->result_array();
		
	 
 }
 
 
 function quiz_list(){
	 
	  $this->db->limit('10');
	$this->db->order_by('quid','desc');
		$query=$this->db->get('savsoft_quiz');
		return $query->result_array();
	 
	 
 }
 
 
 
 
function get_design(){
	   $this->db->where('cms_settting_id','1');
		$query=$this->db->get('savsoft_cms_setting');
		return $query->row_array();
		
	 
 }
function get_menu($menu_id){
	   $this->db->where('menu_id',$menu_id);
		 $query=$this->db->get('savsoft_menu');
		return $query->row_array();
		
	 
 }
  
function get_page($page_id){
	if(isset($_POST['search'])){
			   $this->db->or_like('page_title',$_POST['search']);
			   $this->db->or_like('meta_description',$_POST['search']);
			   $this->db->or_like('meta_keyword',$_POST['search']);

	}else if($page_id==0){
	   $this->db->where('home_page','Yes');
	}else{
			   $this->db->where('page_id',$page_id);
	}
		 $query=$this->db->get('savsoftquiz_page');
		return $query->row_array();
		
	 
 }
  
	 	
function page_list_all($limit){
	if(isset($_POST['search'])){
	 $this->db->or_like('page_title',$_POST['search']);
	 $this->db->or_like('meta_keyword',$_POST['search']);
			
	}
	  $this->db->limit($this->config->item('number_of_rows'),$limit);
	  $this->db->order_by('page_id','desc');
		$query=$this->db->get('savsoftquiz_page');
		return $query->result_array();
		
	 
 }

 
 }

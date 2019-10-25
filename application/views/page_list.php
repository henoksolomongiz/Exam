 <div class="container">
 <?php 
 $logged_in=$this->session->userdata('logged_in');
		
		?>  
 
   
 <h3><?php echo $title;?></h3>
    <div class="row">
 
  <div class="col-lg-6">
    <form method="post" action="<?php echo site_url('cms_admin/page_list/');?>">
	<div class="input-group">
    <input type="text" class="form-control" name="search" placeholder="<?php echo $this->lang->line('search');?>...">
      <span class="input-group-btn">
        <button class="btn btn-default" type="submit"><?php echo $this->lang->line('search');?></button>
      </span>
	 
	  
    </div><!-- /input-group -->
	 </form>
  </div><!-- /.col-lg-6 -->
</div><!-- /.row -->

<?php 
		if($this->session->flashdata('message')){
			echo $this->session->flashdata('message');	
		}
		       
			 
		?>	
		<a href="<?php echo site_url('cms_admin/add_new_page');?>" class="btn btn-success"><?php echo $this->lang->line('add_new');?></a><br><br>

  <div class="row">
 
<div class="col-md-12"><br>
 			
		
  
<table class="table table-bordered">
<tr>
 <th>#</th>
 <th>Title</th>
 <th>Status</th>
 <th>Action</th>

 <?php // } ?>

</tr>
<?php 
if(count($result)==0){
	?>
<tr>
 <td colspan="6"><?php echo $this->lang->line('no_record_found');?></td>
</tr>	
	
	
	<?php
}
foreach($result as $key => $val){
?>
<tr>
 <td><?php echo $val['page_id'];?></td>
 <td><?php echo $val['page_title'];?></td>
 <td><?php echo $val['page_status'];?></td>
  
<td>
 
<a href="<?php echo site_url('cms_admin/edit_page/'.$val['page_id']);?>"><?php echo $this->lang->line('edit');?></a> &nbsp; | &nbsp;
 
<a href="<?php echo site_url('cms_admin/remove_page/'.$val['page_id']);?>"><?php echo $this->lang->line('remove');?></a>
 </td>
 
</tr>

<?php 
}
?>
</table>
<?php
if(($limit-($this->config->item('number_of_rows')))>=0){ $back=$limit-($this->config->item('number_of_rows')); }else{ $back='0'; } ?>

<a href="<?php echo site_url('cms_admin/page_list/'.$back.'/'.$list_view);?>"  class="btn btn-primary"><?php echo $this->lang->line('back');?></a>
&nbsp;&nbsp;
<?php
 $next=$limit+($this->config->item('number_of_rows'));  ?>

<a href="<?php echo site_url('cms_admin/page_list/'.$next.'/'.$list_view);?>"  class="btn btn-primary"><?php echo $this->lang->line('next');?></a>



 </div>

 
 
 
 
 
 
 
 
  
</div>


 



</div>

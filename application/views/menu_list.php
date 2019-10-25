 <div class="container">
 <?php 
 $logged_in=$this->session->userdata('logged_in');
		
		?>  
 
   
 <h3><?php echo $title;?></h3>
    <div class="row">
 
  <div class="col-lg-6">
 
  </div><!-- /.col-lg-6 -->
</div><!-- /.row -->

<?php 
		if($this->session->flashdata('message')){
			echo $this->session->flashdata('message');	
		}
		       
			 
		?>	
		<a href="<?php echo site_url('cms_admin/add_new_menu');?>" class="btn btn-success"><?php echo $this->lang->line('add_new');?></a><br><br>

  <div class="row">
 
<div class="col-md-6"><br>
<h3>Header</h3>
			
		
  
<table class="table table-bordered">
<tr>
  <th>Menu Name</th>
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
   <td><?php echo $val['menu_name'];?></td>
  
<td>
 
<a href="<?php echo site_url('cms_admin/edit_menu/'.$val['menu_id']);?>"><?php echo $this->lang->line('edit');?></a> &nbsp; | &nbsp;
 
<a href="<?php echo site_url('cms_admin/remove_menu/'.$val['menu_id']);?>"><?php echo $this->lang->line('remove');?></a>&nbsp; | &nbsp;
<a href="<?php echo site_url('cms_admin/copym/Footer/'.$val['menu_id']);?>">Copy to footer</a>
 </td>
 
</tr>

<?php 
}
?>
</table>


 </div>

 
 
 
 
 
 
 
 
 
 <div class="col-md-6">
<br> 
			
		
<h3>Footer</h3>  
<table class="table table-bordered">
<tr>
  <th>Menu Name</th>
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
foreach($result2 as $key => $val){
?>
<tr>
  <td><?php echo $val['menu_name'];?></td>
   
<td>
 
<a href="<?php echo site_url('cms_admin/edit_menu/'.$val['menu_id']);?>"><?php echo $this->lang->line('edit');?></a>&nbsp; | &nbsp;
 
<a href="<?php echo site_url('cms_admin/remove_menu/'.$val['menu_id']);?>"><?php echo $this->lang->line('remove');?></a>&nbsp; | &nbsp;
<a href="<?php echo site_url('cms_admin/copym/Header/'.$val['menu_id']);?>">Copy to header</a>

 </td>
 
</tr>

<?php 
}
?>
</table>


 </div>

</div>


 



</div>

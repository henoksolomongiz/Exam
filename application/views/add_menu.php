 <div class="container">

   
 <h3><?php echo $title;?></h3>
   
 

  <div class="row">
      
 <form method="post" action="<?php echo site_url('cms_admin/insert_menu');?>"> 
<div class="col-md-8">
<br> 
 <div class="login-panel panel panel-default">
		<div class="panel-body"> 
	
	
	
			<?php 
		if($this->session->flashdata('message')){
			echo $this->session->flashdata('message');	
		}
		?>	
		
			<div class="form-group">	 
					<label for="inputEmail"  ><?php echo $this->lang->line('menu_name');?></label> 
					<input type="text" required  name="menu_name"  class="form-control"   > 
			</div>
			 
		 
			<div class="form-group">	 
					<label for="inputEmail"  ><?php echo $this->lang->line('menu_position');?></label> 
					<select  name="menu_position"  class="form-control"   > 
					<option value="Header">Header</option>
					<option value="Footer">Footer</option>
					</select>
			</div>
			 
			<div class="form-group">	 
					<label for="inputEmail"  ><?php echo $this->lang->line('order');?></label> 
					<input type="number" required  name="order_by"  class="form-control" value="0"  > 
			</div>
			 
			 <hr>
			<div class="form-group">	 
					<label for="inputEmail"  ><?php echo $this->lang->line('link_to');?></label> 
					<input type="text"    name="menu_url"  class="form-control" value="" placeholder="https://" > 
					<br>OR</br>
					<select  name="page_id"  class="form-control"   > 
					<option value="0">Select</option>
					<?php foreach($pages as $k => $page){ ?>
					
					<option value="<?php echo $page['page_id'];?>"><?php echo $page['page_title'];?></option>
					 
					 <?php 
					}
					?>
					</select>  <a   href="<?php echo site_url('cms_admin/pages_list');?>">Add new page</a>
			</div>
			 
		 
 	 

 
	<button class="btn btn-default" type="submit"><?php echo $this->lang->line('submit');?></button>
 
		</div>
</div>
 
 
 
 
</div>
      </form>
</div>

 



</div>

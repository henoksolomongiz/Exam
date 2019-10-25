 <div class="container">

   
 <h3><?php echo $title;?></h3>
   
 

  <div class="row">
      
 <form method="post" action="<?php echo site_url('cms_admin/update_setting');?>"> 
<div class="col-md-8">
<br> 
 <div class="login-panel panel panel-default">
		<div class="panel-body"> 
	
	
	
			<?php 
		if($this->session->flashdata('message')){
			echo $this->session->flashdata('message');	
		}
		?>	
		
			<div class="form-group">		<label for="inputEmail"  >Logo</label> 	 
				<input type="file"  id="inp">
				<input type="hidden" name="logo" id="b64" value="<?php echo $result['logo'];?>" required >
 	 
				<img id="img" class='img-responsive' src="<?php echo $result['logo'];?>" style="display:hidden;max-width:100px;height:100px;">
			</div>
			 
		 
			<div class="form-group">	 
					<label for="inputEmail"  >Slogan</label> 
					<input type="text"    name="slogan"  class="form-control"  value="<?php echo $result['slogan'];?>" > 
			</div>
			 
		 
			<div class="form-group">	 
					<label for="inputEmail"  >Layout</label> 
					<select  name="layout"  class="form-control"   > 
					<option value="100" <?php if($result['layout']=="100"){ echo 'selected';}?> >100</option>
					<option value="70:30" <?php if($result['layout']=="70:30"){ echo 'selected';}?> >70:30</option>
					<option value="30:70" <?php if($result['layout']=="30:70"){ echo 'selected';}?> >30:70</option>
					<option value="20:60:20" <?php if($result['layout']=="20:60:20"){ echo 'selected';}?> >20:60:20</option>
					</select>
			</div>
			 
 		  
					<div class="form-group">	 
					<label for="inputEmail"  >Display Email</label> 
					<input type="text"    name="email"  class="form-control"  value="<?php echo $result['email'];?>" > 
			</div>
			 
			<div class="form-group">	 
					<label for="inputEmail"  >Display Contact No. </label> 
					<input type="text"    name="contact_no"  class="form-control"  value="<?php echo $result['contact_no'];?>" > 
			</div>
			 
 			<div class="form-group">	 
					<label for="inputEmail"  >Display Address </label> 
					<textarea    name="address"  class="form-control" ><?php echo $result['address'];?></textarea> 
			</div>
			 
 		 
			<div class="form-group">	 
					<label for="inputEmail"  >Display slider</label> 
					<select  name="show_slider"  class="form-control"   > 
					<option value="Yes" <?php if($result['show_slider']=="Yes"){ echo 'selected';}?> >Yes</option>
					<option value="No" <?php if($result['show_slider']=="No"){ echo 'selected';}?> >No</option> 
					</select>
			</div>
			 
 		  
			<div class="form-group">	 
					<label for="inputEmail"  >Facebook Page URL</label> 
					<input type="text"    name="facebook"  class="form-control"  value="<?php echo $result['facebook'];?>" > 
			</div>

			<div class="form-group">	 
					<label for="inputEmail"  >Twitter</label> 
					<input type="text"    name="twitter"  class="form-control"  value="<?php echo $result['twitter'];?>" > 
			</div>

			<div class="form-group">	 
					<label for="inputEmail"  >Google plus</label> 
					<input type="text"    name="google"  class="form-control"  value="<?php echo $result['google'];?>" > 
			</div>

			<div class="form-group">	 
					<label for="inputEmail"  >Linkedin</label> 
					<input type="text"    name="linkedin"  class="form-control"  value="<?php echo $result['linkedin'];?>" > 
			</div>

			<div class="form-group">	 
					<label for="inputEmail"  >Youtube</label> 
					<input type="text"    name="youtube"  class="form-control"  value="<?php echo $result['youtube'];?>" > 
			</div>

 	 

 
	<button class="btn btn-default" type="submit"><?php echo $this->lang->line('submit');?></button>
 
		</div>
</div>
 
 
 
 
</div>
      </form>
</div>

 



</div>

<script>
function readFile() {
  
  if (this.files && this.files[0]) {
	  console.log(this.files[0].size);
    if(this.files[0].size >= 1000000){
	$('#ierror').html('Maximum file size allowed 1MB');	
	}else{
		$('#ierror').html('');
    var FR= new FileReader();
    $('#img').css('dsiplay','block');
	
    FR.addEventListener("load", function(e) {
      document.getElementById("img").src       = e.target.result;
      document.getElementById("b64").value = e.target.result;
    }); 
    
    FR.readAsDataURL( this.files[0] );
  }
  }
  
}

document.getElementById("inp").addEventListener("change", readFile);	
</script>

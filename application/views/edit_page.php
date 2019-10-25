 <div class="container">

   
 <h3><?php echo $title;?></h3>
   
 

  <div class="row">
      
 <form method="post" action="<?php echo site_url('cms_admin/update_page/'.$page['page_id']);?>"> 
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
					<label for="inputEmail"  >Unique URL</label> 
					<input type="text" required  name="page_title"  class="form-control" value="<?php echo site_url('cms/page/'.$page['page_id'].'/'.$page['page_url']);?>"    > 
			</div>
			<div class="form-group">	 
					<label for="inputEmail"  ><?php echo $this->lang->line('page_title');?></label> 
					<input type="text" required  name="page_title"  class="form-control" value="<?php echo $page['page_title'];?>"  onBlur="createurl(this.value);" > 
			</div>
			 
		 	 <div class="form-group">	 
					<label for="inputEmail"  >Content type</label> 
					<select  name="content_type"  class="form-control"   > 
					<option value="Page" <?php if($page['content_type']=="Page"){ echo "selected";}?> >Page</option>
					<option value="Post" <?php if($page['content_type']=="Post"){ echo "selected";}?> >Post</option>
					</select>
			</div>

 			<div class="form-group">	 
					<label for="inputEmail"  ><?php echo $this->lang->line('page_content');?></label> 
					<textarea    name="page_content"  class="form-control"   ><?php echo $page['page_content'];?></textarea>
			</div>
			 
		 
 	 			<div class="form-group">	 
					<label for="inputEmail"  ><?php echo $this->lang->line('status');?></label> 
					<select  name="page_status"  class="form-control"   > 
					<option value="Draft"  <?php if($page['page_status']=="Draft"){ echo "selected";}?> >Draft</option>
					<option value="Published"  <?php if($page['page_status']=="Published"){ echo "selected";}?> >Publish</option>
					</select>
			</div>

  	 			<div class="form-group">	 
					<label for="inputEmail"  ><?php echo $this->lang->line('is_home_page');?></label> 
					<select  name="home_page"  class="form-control"   > 
					<option value="Yes" <?php if($page['home_page']=="Yes"){ echo "selected";}?> >Yes</option>
					<option value="No" <?php if($page['home_page']=="No"){ echo "selected";}?> >No</option>
					</select>
			</div>
				 		<div class="form-group">	 
					<label for="inputEmail"  >Load Widget</label> 
					<select  name="widget"  class="form-control"   > 
					<option value="" <?php if($page['widget']==""){ echo "selected";}?> >None</option>
					<option value="Package" <?php if($page['widget']=="Package"){ echo "selected";}?> >Group/Packages</option>
					<option value="Quiz" <?php if($page['widget']=="Quiz"){ echo "selected";}?> >Latest Quiz</option>
					</select>
			</div>

			<div class="form-group">
			<label for="inputEmail"  >Cover Photo</label> 
			 <input type="file"  id="inp">
 <input type="hidden" name="cover_photo" id="b64" value="<?php echo $page['cover_photo'];?>"   >
 	 
	 <img id="img" class='img-responsive'  src="<?php echo $page['cover_photo'];?>" style="display:hidden;max-width:100px;height:100px;">

			
			</div>

 	 <hr>
	 <h4>SEO</h4>
	 		<div class="form-group">	 
					<label for="inputEmail"  ><?php echo $this->lang->line('seo_url');?></label> 
					<input type="text"    name="page_url"  class="form-control"  value="<?php echo $page['page_url'];?>" id="purl" placeholder=""  > 
			</div>

	 		<div class="form-group">	 
					<label for="inputEmail"  ><?php echo $this->lang->line('meta_description');?></label> 
					<input type="text"    name="meta_description"  class="form-control"  value="<?php echo $page['meta_description'];?>" placeholder="Describe about page content"  > 
			</div>

	 		<div class="form-group">	 
					<label for="inputEmail"  ><?php echo $this->lang->line('meta_keyword');?></label> 
					<input type="text"    name="meta_keyword"  class="form-control"  value="<?php echo $page['meta_keyword'];?>" placeholder="eg. Online exams for PHP, PHP exams"  > 
			</div>

	 		<div class="form-group">	 
					<label for="inputEmail"  ><?php echo $this->lang->line('meta_auther');?></label> 
					<input type="text"    name="meta_auther"  class="form-control"  value="<?php echo $page['meta_auther'];?>" placeholder=""  > 
			</div>


 
	<button class="btn btn-default" type="submit"><?php echo $this->lang->line('submit');?></button>
 
		</div>
</div>
 
 
 
 
</div>
      </form>
</div>

 



</div>

<script>
function createurl(val){
	val=val.toLowerCase().replace(/ /g, "_");
	
	$('#purl').val(val);
}
</script>
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

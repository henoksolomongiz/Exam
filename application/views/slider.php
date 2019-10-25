 <div class="container">

   
 <h3><?php echo $title;?></h3>


  <div class="row">
 
<div class="col-md-12">
<br> 
			<?php 
		if($this->session->flashdata('message')){
			echo $this->session->flashdata('message');	
		}
		?>	
		<div id="message"></div>
		
		 <form method="post" action="<?php echo site_url('cms_admin/insert_slider');?>">
	
<table class="table table-bordered">
<tr>
 <th>Image</th>
 <th>Description</th>
<th><?php echo $this->lang->line('action');?> </th>
</tr>
<?php 
if(count($result)==0){
	?>
<tr>
 <td colspan="3"><?php echo $this->lang->line('no_record_found');?></td>
</tr>	
	
	
	<?php
}

foreach($result as $key => $val){
?>
<tr>
 <td><img src="<?php echo $val['slider_images'];?>" style="max-width:100px;max-height:100px;"></td>
 <td><?php echo $val['image_description'];?></td>
<td>
 

<a href="<?php echo site_url('cms_admin/remove_slider/'.$val['slider_id']);?>"><img src="<?php echo base_url('images/cross.png');?>"></a>


</td>
</tr>

<?php 
}
?>
<tr>
 <td>
 
 <input type="file"  id="inp">
 <input type="hidden" name="slider_images" id="b64" value="" required >
 	 
	 <img id="img" class='img-responsive' style="display:hidden;max-width:100px;height:100px;display:none;">
 </td>
 <td>
 
 <input type="text" class="form-control" name="image_description" value="" placeholder="Description" required ></td>
<td>
<button class="btn btn-default" type="submit"><?php echo $this->lang->line('add_new');?></button>
 
</td>
</tr>
</table>
</form>
</div>

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

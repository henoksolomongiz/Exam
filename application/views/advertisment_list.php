
    <?php if($this->session->flashdata('message')){
       
       echo $this->session->flashdata('message'); 
      } ?>
<br><br>

<center><h3>Advertisment List</h3><center>
 

        <center><table class="table table-hover table-bordered" style="width:80%;">
  <thead>
    <tr>
     
       
      <th>Banner</th>
      <th>Banner Link</th>
      <th>Position</th>
      <th>Ad status</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
      
     <?php foreach ($result as $key => $val){ ?> 
    <tr>
     
      
       <td><?php 
       if($val['banner']!=''){ ?><a href="<?php echo base_url('upload/'.$val['banner']);?>" target="new_add"><img src="<?php echo base_url('upload/'.$val['banner']);?>" class="img-responsive" style="max-height:100px;max-width:100px;"></a> <?php } ?></td>
        <td><?php echo $val['banner_link'] ; ?></td>
        <td><?php echo $val['position'] ; ?></td>
       <td><?php echo $val['add_status'] ; ?></td>
        <td>
           <a href="<?php echo site_url('Advertisment/edit_advertisment/'.$val['add_id']); ?>" type="button" class="btn btn-default btn-sm">
            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit
          </a>
         
      </td>
    </tr>
    <?php } ?>
    
  </tbody>
</table></center>


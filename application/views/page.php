<html lang="en">
  <head>
  <title> <?php echo $page['page_title'];?></title>
 <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="<?php echo $page['meta_description'];?>">
  <meta name="keyword" content="<?php echo $page['meta_keyword'];?>">
  <meta name="author" content="<?php echo $page['meta_auther'];?>">


  
  <!-- Custom fonts for this template-->
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
 	<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<style>
html,body,div{
	font-family:'Nunito';
}
.topbar{
	background:#dbecee;
	min-height:30px;
	 padding-top:3px;
	padding-bottom:4px;
}
.sociallink{
	text-align:right;
	color:#295ca8;
}

.page{
padding-top:50px;
min-height:500px;	
}

.footer{
background:#212121;
color:#dddddd;
padding-top:50px;	
}
.footer a{
	color:#93b8e0;
}

.countdowns{
 
min-height:120px;	
text-align:center;
padding-top:20px;

color:#666666;

 background:#eeeeee;
}

.card-text{
color:#666666;	
}
</style>
<html>
<body>

<div class="container-fluid">


	<div class="row topbar">
		<div class="col-lg-4">

 		</div>
		<div class="col-lg-8 sociallink" >
 Contact: <?php echo $setting['contact_no'];?> | <?php echo $setting['email'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		 Follow us on &nbsp;&nbsp;
		<a href="<?php echo $setting['facebook'];?>" title="Facebook"><i class="fa fa-facebook"></i></a> &nbsp; 
 		<a href="<?php echo $setting['twitter'];?>" title="Twitter"><i class="fa fa-twitter"></i></a> &nbsp; 
 		<a href="<?php echo $setting['google'];?>" title="Google"><i class="fa fa-google"></i></a> &nbsp; 
 		<a href="<?php echo $setting['linkedin'];?>" title="Linkedin"><i class="fa fa-linkedin"></i></a> &nbsp; 
 		<a href="<?php echo $setting['youtube'];?>" title="Youtube"><i class="fa fa-youtube"></i></a> &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
 
		</div>
	</div>

	
	
	
	
	<div class="row">
		<div class="col-lg-12" style="padding-left:0px;padding-right:0px;">

		
		 

 <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
 <a href="<?php echo site_url('cms/page');?>"><?php if($setting['logo']!=""){ ?> <img src="<?php echo $setting['logo'];?>" style="max-width:250px;max-height:80px;"><?php }else{ echo $setting['slogan']; } ?></a>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	 
  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
 <?php 
 foreach($menu_header as $mk => $mval){
	 ?>
      <li class="nav-item">
        <a class="nav-link" href="<?php if($mval['menu_url']==""){ echo site_url('cms/page/'.$mval['page_id']); }else{ echo $mval['menu_url']; } ?>"><?php echo $mval['menu_name'];?></a>
      </li>
 <?php } ?>
     
	 
    </ul>
    <form class="form-inline my-2 my-lg-0" method="post" action="<?php echo site_url('cms/page/0/search');?>">
	       <a class="nav-link" href="<?php echo site_url('login');?>">Login</a> &nbsp;&nbsp;
      <a class="btn btn-success" href="<?php echo site_url('login/pre_registration');?>">Register</a> &nbsp;&nbsp;
   
   
      <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>


		</div>
	</div>
<?php 
if($setting['show_slider']=="Yes" && $page['home_page']=="Yes"){ 
?>	
			<div class="row">
				<div class="col-lg-12" style="padding-left:0px;padding-right:0px;">
					






<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
  <?php 
  foreach($slider as $k => $sval){
	  ?>
    <div class="carousel-item <?php if($k==0){ echo 'active';}?>">
      <img class="d-block w-100" src="<?php echo $sval['slider_images'];?>" alt="<?php echo $sval['image_description'];?>">
    </div>
  <?php } ?>
 
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>





					
				</div>				
			</div>
			
			
			
			
			
			
<?php 
}

if($page['home_page']=='Yes'){
	?>
	<div class="row countdowns">
	<div class="col-lg-1"> </div>
	<div class="col-lg-10"> <h2>Our Numbers Speak for Themselves</h2></div>
	<div class="col-lg-1"> </div>
	
	
	
	</div>
		<div class="row countdowns">
				<div class="col-lg-3">
				<i class="fa fa-question-circle fa-4x"></i>
				<h1><?php echo $questions;?></h1>
				<p>Questions</p>
				</div>
				<div class="col-lg-3">
				
				<i class="fa fa-sticky-note fa-4x"></i>
				<h1><?php echo $quiz;?></h1>
				<p>Quizzes</p>
				</div>
				<div class="col-lg-3">
				<i class="fa fa-check-circle fa-4x"></i>
				<h1><?php echo $results;?></h1>
				<p>Attempts</p>
				
				
				
				</div><div class="col-lg-3">
				
				<i class="fa fa-users fa-4x"></i>
				<h1><?php echo $quiz;?></h1>
				<p>Users</p>
				</div>
		</div>
	
	<?php 
	
	
}
?>
<?php 
$larray=array(
'30'=>'3',
'70'=>'7',
'60'=>'6',
'20'=>'2',
'100'=>'10'
);
?>
	
	
		<div class="row page"><div class="col-lg-1" >
							
				</div>	
		<?php 
		foreach(explode(':',$setting['layout']) as $k => $val){ ?>
		<div class="col-lg-<?php echo $larray[$val];?>">
		<?php 
		if($larray[$val] <= 6 ){
		?>
	 
		<?php
		}else{
		?>
		<img src="<?php echo $page['cover_photo'];?>" style="max-width:100%;" >
	<h2><?php echo $page['page_title'];?></h2>
	<?php echo $page['page_content'];?>








<?php

	  
	if($page['widget']=="Quiz" || $page['home_page']=="Yes"){ 
	?> <h2 style="margin-top:50px;">Recent quizzes </h2>
	<div class="row">
		<?php 
			
			
			
			  
    $cc=0;
$colorcode=array(
'success',
'warning',
'info',
'danger'
);
    foreach($quiz_list as $k => $val){
    
   ?>
     <div class="card" style="width: 18rem;margin:5px;">
  <div class="card-body">
    <h5 class="card-title"><?php echo $val['quiz_name'];?> </h5>
    <h6 class="card-subtitle mb-2 text-muted">
 
</h6>
    <p class="card-text" >No. Questions: <?php echo $val['noq'];?> <br> Ends on <?php echo date('d M Y h:i A',$val['end_date']);?> </p>
    <a href="<?php echo site_url('login');?>" class="btn btn-success"><?php echo $this->lang->line('attempt');?></a>
   

  </div>
</div>





   
   
	  
	  
	  <?php 
	 
	  
    }
     ?>
	 </div>
	 
	 <?php 
	}
	


	  
	if($page['widget']=="Package" || $page['home_page']=="Yes"){ 
	?> 
	<h2 style="margin-top:50px;">Packages</h2>
	<div class="row">
		<?php 
			
			
			
			  
    $cc=0;
$colorcode=array(
'success',
'warning',
'info',
'danger'
);
    foreach($group_list as $k => $val){
    
   ?>
   
   <div class="card" style="width: 18rem;margin:5px;">
  <div class="card-body">
    <h5 class="card-title"><?php echo $val['group_name'];?> </h5>
    <h6 class="card-subtitle mb-2 text-muted">
	<?php 
if($val['price']==0){
echo "Free ";
}else{
echo $this->config->item('base_currency_prefix').' '.$val['price'].' '.$this->config->item('base_currency_sufix')." "; 
}
?>
</h6>
    <p class="card-text" ><?php echo $val['description'];?> </p>
    <a href="<?php echo site_url('login/addtocart/'.$val['gid'].'/'.base64_encode($val['group_name']).'/'.base64_encode($val['price']));?>" class="btn btn-primary"><?php echo $this->lang->line('addtocart');?></a>
   

  </div>
</div>



  
     
	  
	  
	  <?php 
	 
	  
    }
     ?>
	 </div>
	 
	 <?php 
	}
	













	
		}
		?>
 		</div>
		<?php 
		}
		?><div class="col-lg-1" >
							
				</div>	
		</div>
	
	
	
		<div class="row footer">
				<div class="col-lg-1" >
							
				</div>				
				<div class="col-lg-4" >
				<h4>Contact</h4>
				<p>
				<?php echo $setting['address'];?>
				</p>
							
				</div>				
				<div class="col-lg-6" >
<ul>
<?php 
 foreach($menu_footer as $mk => $mval){
	 ?>
        <a   href="<?php if($mval['menu_url']==""){ echo site_url('cms/page/'.$mval['page_id']); }else{ echo $mval['menu_url']; } ?>"><?php echo $mval['menu_name'];?></a>
       &nbsp;&nbsp;
 <?php } ?>
     
</ul>
	 
				</div>				
				<div class="col-lg-1" >
							
				</div>				
			</div>

	
	
	
	
	
	
</div>




</body>
</html>
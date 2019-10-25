<!-- Template javascript -->
	  	<script src="<?php echo base_url('js/'.$quiz['quiz_template'].'.js?q='.time());?>"></script>
	  	<?php 
	  	$userinfo=$logged_in=$this->session->userdata('logged_in');
	  	?>
 <style>
 td{
		font-size:14px;
		padding:4px;
	}
.row{
margin:0px;
}
.container{
padding:0px;
}
.blackbg{
background:#212121;
position:fixed;
z-index:1000;
top:0px;
width:100%;
height:100%;
opacity:0.5;
display:none;
}
.op {
    border-bottom: 0px solid #eeeeee;
    }
.qbtn{
width:30px;
background:#dddddd;
color:#212121;
border:1px solid #B0A9A9;
}

.edge-border-up{
border-top-right-radius: 1em;
border-top-left-radius: 1em;
}

.edge-border-down{
border-bottom-right-radius: 1em;
border-bottom-left-radius: 1em;
}
.round{
border-radius:40%;

}	
.round-small{
border-radius:20%;

}	
.round-green{
border-radius:40%;
border-right:5px solid #449d44;
}

.col-md-9{
padding:0px;
}

.lang0{
<?php 
if($selected_lang==0){
?>
display:block;
<?php 
}else{ 
?>
display:none;
<?php 
}
?>
}
.lang1{
<?php 
if($selected_lang==1){
?>
display:block;
<?php 
}else{ 
?>
display:none;
<?php 
}
?>
}	
.lang2{
display:none;
}	
.lang3{
display:none;
}	
.lang4{
display:none;
}	



</style>


<script>

var Timer;
var TotalSeconds;


function CreateTimer(TimerID, Time) {
Timer = document.getElementById(TimerID);
TotalSeconds = Time;

UpdateTimer()
window.setTimeout("Tick()", 1000);
}

function Tick() {
if (TotalSeconds <= 0) {
alert("Time's up!")
return;
}

TotalSeconds -= 1;
UpdateTimer()
window.setTimeout("Tick()", 1000);
}

function UpdateTimer() {
var Seconds = TotalSeconds;

var Days = Math.floor(Seconds / 86400);
Seconds -= Days * 86400;

var Hours = Math.floor(Seconds / 3600);
Seconds -= Hours * (3600);

var Minutes = Math.floor(Seconds / 60);
Seconds -= Minutes * (60);


var TimeStr = ((Days > 0) ? Days + " days " : "") + LeadingZero(Hours) + ":" + LeadingZero(Minutes) + ":" + LeadingZero(Seconds)


Timer.innerHTML = TimeStr;
}


function LeadingZero(Time) {

return (Time < 10) ? "0" + Time : + Time;

}

//var myCountdown1 = new Countdown({time:<?php echo $seconds;?>, rangeHi:"hour", rangeLo:"second"});
setTimeout(submitform,'<?php echo $seconds * 1000;?>');
function submitform(){
alert('Time Over');
window.location="<?php echo site_url('quiz/submit_quiz/');?>";
}

 

 

</script>
<div class="blackbg"></div>

<!-- header bar quiz name -->
<div style="background:#337ab7;color:#ffffff;padding:7px;padding-right:40px;">
<h4><?php echo $quiz['quiz_name'];?></h4>
</div>


<!-- Instruction link bar  -->
<div style="background:#212121;color:#ffffff;text-align:right;padding:4px;padding-right:40px;">
<a href="javascript:switchwin('ins');" style="color:#ffffff;">Instructions</a>
</div>

<!-- instruction data -->
<div id="ins" style="width:60%;height:60%;padding:10px;position:fixed;z-index:1000;top:20%;left:20%;display:none;background:#ffffff;">
<div style="background:#337ab7;color:#ffffff;padding:2px;">
<h3 style="float:left;">Instructions</h3>
 <a href="javascript:switchwin('ins');" style="float:right;margin-right:20px;" class="btn btn-primary">Close</a>
<div style="clear:both;"></div>
</div>
<div style="width:100%;height:100%;padding:10px;overflow:auto;">
<?php echo $quiz['description'];?>
</div>
</div>


<div class=" " >



 

  <!-- timer bar --> 
 
 <div class="row"  style="margin-top:0px;">
 <div class="col-md-9">
 
 <div style="background:#ffffff;padding:4px;color:#666666;border-bottom:1px solid #dddddd;">
<div class="save_answer_signal" id="save_answer_signal2"  style="display:none;"></div>
<div class="save_answer_signal" id="save_answer_signal1" style="display:none;"></div>

<div style="float:right;width:150px; margin-right:10px;" >

	Time left: <span id='timer' >
	<script type="text/javascript">window.onload = CreateTimer("timer", <?php echo $seconds;?>);</script>
</span>
</div>
<div style="float:left;width:150px; " >
 <h4>Section</h4>
</div>
<div style="clear:both;"></div>
</div>
	
<div style="clear:both;"></div>




 <!-- Category button -->

 <div class="row" style="margin:2px;" >
<?php 
$categories=explode(',',$quiz['categories']);
$category_range=explode(',',$quiz['category_range']);
 
function getfirstqn($cat_keys='0',$category_range){
	if($cat_keys==0){
		return 0;
	}else{
		$r=0;
		for($g=0; $g < $cat_keys; $g++){
		$r+=$category_range[$g];	
		}
		return $r;
	}
	
	
}


function questionincate($qn,$category_range){
	$earr=array();
	$i=0;
foreach($category_range as $k => $val){
	$earr[]=$i+$val;
	$i=$i+$val;
	
}
foreach($earr as $k => $v){
	if($qn < $v){
		return $k;
	}
}
	
}

?>
 <input type="hidden" id="no_categ" value="<?php echo count($categories);?>">
 <?php 
  for($qni=0; $qni < $quiz['noq']; $qni++){
	  ?>
	<input type="hidden" id="whichcate_<?php echo $qni;?>" value="<?php echo questionincate($qni,$category_range);?>">  
	  <?php 
  }
  ?>
<?php 
 
	$jct=0;
	foreach($categories as $cat_key => $category){
?>

<a href="javascript:switch_category('cat_<?php echo $cat_key;?>');selectedc('<?php echo $category;?>',this.id);"  id="cati_<?php echo $cat_key;?>"  class="btn btn-info" onMouseover="showcatestat(this.id);"   onMouseout="hidecatestat(this.id);"  style="cursor:pointer;background:#4E85C5;"><?php echo $category;?></a>
 
 
<div id="overcati_<?php echo $cat_key;?>" style="position:absolute;background:#CAE1FF;z-index:1000;width:180px;height:250px;padding-top:5px;border:1px solid #81A2CD;display:none;">
<center><b><?php echo $category;?></b></center> 

<div style="border-top:1px solid #666666;"></div>
<input type="hidden" id="firstq<?php echo $cat_key;?>" value="<?php echo getfirstqn($cat_key,$category_range);?>">
<table >
<tr><td style="font-size:13px;"> Answered </td><td><div class="qbtn edge-border-up" style="background:#449d44; color:#ffffff" id="stat_green_<?php echo $cat_key;?>">0</div> </td> </tr>

<tr><td style="font-size:13px;">Not Answered</td><td><div class="qbtn  edge-border-down" style="background:#c9302c;color:#ffffff" id="stat_red_<?php echo $cat_key;?>">0</div>  </td></tr>

<tr><td style="font-size:13px;">Not visited</td><td> <div class="qbtn round-small" style="background:#dddddd;" id="stat_grey_<?php echo $cat_key;?>">0</div>  </td></tr>

<tr> <td style="font-size:13px;">Marked for Review </td><td> <div class="qbtn round" style="background:#7A579D;color:#ffffff" id="stat_purple_<?php echo $cat_key;?>">0</div>  </td></tr>

 
</table>


</div>
<input type="hidden" id="cat_<?php echo $cat_key;?>" value="<?php echo getfirstqn($cat_key,$category_range);?>">
<?php 
}
 
?>
</div> 

<div style="background:#4E85C5;height:30px;text-align:right;padding:5px;">
<span style="color:#ffffff;">View in:</span> <select onChange="changelang();" id="changelang">
<?php
foreach($this->config->item('question_lang') as $lk => $val){
?>
<option value="lang<?php echo $lk;?>" <?php if($selected_lang==$lk){ echo 'selected';} ?>><?php echo $val;?></option>
<?php 
}
?>
</select>

</div>
<form method="post" action="<?php echo site_url('quiz/submit_quiz/'.$quiz['rid']);?>" id="quiz_form" >
<input type="hidden" name="rid" value="<?php echo $quiz['rid'];?>">
<input type="hidden" name="noq" value="<?php echo $quiz['noq'];?>">
<input type="hidden" name="individual_time"  id="individual_time" value="<?php echo $quiz['individual_time'];?>">
 
<?php 
$abc=array(
'0'=>'A',
'1'=>'B',
'2'=>'C',
'3'=>'D',
'4'=>'E',
'6'=>'F',
'7'=>'G',
'8'=>'H',
'9'=>'I',
'10'=>'J',
'11'=>'K'
);
foreach($questions as $qk => $question){
?>
 
 <div id="q<?php echo $qk;?>" class="question_div">
		
		<div class="question_container" >
		<!-- lang0 -->
		<div class="lang lang0">
		<?php 
		if(strip_tags($question['paragraph'])!=""){
		echo $this->lang->line('paragraph')."<br>";
		echo $question['paragraph']."<hr>";
		}
		?>
		 <b><?php echo $this->lang->line('question');?> No. <?php echo $qk+1;?></b><hr>
<?php echo str_replace('../../../',base_url(),str_replace('../../../../',base_url(),$question['question']));	
/* 
// --- if unclosed HTML tags disturbing layout , use following code 		 
$qu=str_replace('&#34;','',$question['question']);
$somevar = new DOMDocument();
$somevar->loadHTML((mb_convert_encoding($qu, 'HTML-ENTITIES', 'UTF-8')) );
echo $somevar->saveHTML(); 
*/		 
		 ?>
		  </div>
		  
		  <!-- lang0 ends-->
		  
		<!-- lang1 -->
		<div class="lang lang1">
		<?php 
		if(strip_tags($question['paragraph1'])!=""){
		echo $this->lang->line('paragraph')."<br>";
		echo $question['paragraph1']."<hr>";
		}
		?>
		 <b><?php echo $this->lang->line('question');?> No. <?php echo $qk+1;?></b><hr>
<?php echo str_replace('../../../',base_url(),str_replace('../../../../',base_url(),$question['question1']));	
/* 
// --- if unclosed HTML tags disturbing layout , use following code 		 
$qu=str_replace('&#34;','',$question['question']);
$somevar = new DOMDocument();
$somevar->loadHTML((mb_convert_encoding($qu, 'HTML-ENTITIES', 'UTF-8')) );
echo $somevar->saveHTML(); 
*/		 
		 ?>
		  </div>
		  
		  <!-- lang0 ends-->
		  
		 </div>
		 
		 
		 
		 
		 
		 
		<div class="option_container" >
		 
		
		 <?php 
		 // multiple single choice
		 if($question['question_type']==$this->lang->line('multiple_choice_single_answer')){
			 
			 			 			 $save_ans=array();
			 foreach($saved_answers as $svk => $saved_answer){
				 if($question['qid']==$saved_answer['qid']){
					$save_ans[]=$saved_answer['q_option'];
				 }
			 }
			 
			 
			 ?>
			 <input type="hidden"  name="question_type[]"  id="q_type<?php echo $qk;?>" value="1">
			 <?php
			$i=0;
			foreach($options as $ok => $option){
				if($option['qid']==$question['qid']){
			?>
			 
		<div class="op">
		
		

			
		<table>
		<tr><td>
		<?php 
		 echo $abc[$i].')';
		?>
		
			
			
<input type="radio" name="answer[<?php echo $qk;?>][]"  id="answer_value<?php echo $qk.'-'.$i;?>" value="<?php echo $option['oid'];?>"   <?php if(in_array($option['oid'],$save_ans)){ echo 'checked'; } ?>  >
				
				
			
		
		 </td><td><div class="lang lang0"> <?php echo str_replace('../../../',base_url(),str_replace('../../../../',base_url(),$option['q_option']));?></div> 
		 <div class="lang lang1"> <?php echo str_replace('../../../',base_url(),str_replace('../../../../',base_url(),$option['q_option1']));?></div> 
		</td></tr></table>
		
		</div>
		
			 
			 
			 <?php 
			 $i+=1;
				}else{
				$i=0;	
					
				}
			}
		 }
			
// multiple_choice_multiple_answer	

		 if($question['question_type']==$this->lang->line('multiple_choice_multiple_answer')){
			 			 $save_ans=array();
			 foreach($saved_answers as $svk => $saved_answer){
				 if($question['qid']==$saved_answer['qid']){
					$save_ans[]=$saved_answer['q_option'];
				 }
			 }
			 
			 ?>
			 <input type="hidden"  name="question_type[]"  id="q_type<?php echo $qk;?>" value="2">
			 <?php
			$i=0;
			foreach($options as $ok => $option){
				if($option['qid']==$question['qid']){
			?>
			 
		<div class="op">
		<table>
		<tr><td>
		<?php echo $abc[$i];?>) <input type="checkbox" name="answer[<?php echo $qk;?>][]" id="answer_value<?php echo $qk.'-'.$i;?>"   value="<?php echo $option['oid'];?>"  <?php if(in_array($option['oid'],$save_ans)){ echo 'checked'; } ?> > 
		</td><td><div class="lang lang0"> 
<?php echo str_replace('../../../',base_url(),str_replace('../../../../',base_url(),$option['q_option']));?>		</div>
		<div class="lang lang1"> 
<?php echo str_replace('../../../',base_url(),str_replace('../../../../',base_url(),$option['q_option1']));?>		</div>
		</td></tr>
		</table>
		 </div>
			 
			 
			 <?php 
			 $i+=1;
				}else{
				$i=0;	
					
				}
			}
		 }
			 
	// short answer	

		 if($question['question_type']==$this->lang->line('short_answer')){
			 			 $save_ans="";
			 foreach($saved_answers as $svk => $saved_answer){
				 if($question['qid']==$saved_answer['qid']){
					$save_ans=$saved_answer['q_option'];
				 }
			 }
			 ?>
			 <input type="hidden"  name="question_type[]"  id="q_type<?php echo $qk;?>" value="3" >
			 <?php
			 ?>
			 
		<div class="op"> 
		<?php echo $this->lang->line('answer');?> 
		<input type="text" name="answer[<?php echo $qk;?>][]" value="<?php echo $save_ans;?>" id="answer_value<?php echo $qk;?>"   >  
		</div>
			 
			 
			 <?php 
			 
			 
		 }
		 
		 
		 	// long answer	

		 if($question['question_type']==$this->lang->line('long_answer')){
			 $save_ans="";
			 foreach($saved_answers as $svk => $saved_answer){
				 if($question['qid']==$saved_answer['qid']){
					$save_ans=$saved_answer['q_option'];
				 }
			 }
			 ?>
			 <input type="hidden"  name="question_type[]" id="q_type<?php echo $qk;?>" value="4">
			 <?php
			 ?>
			 
		<div class="op"> 
		<?php echo $this->lang->line('answer');?> <br>
		<?php echo $this->lang->line('word_counts');?> <span id="char_count<?php echo $qk;?>">0</span>
		<textarea name="answer[<?php echo $qk;?>][]" id="answer_value<?php echo $qk;?>" style="width:100%;height:100%;" onKeyup="count_char(this.value,'char_count<?php echo $qk;?>');"><?php echo $save_ans;?></textarea>
		</div>
			 
			 
			 <?php 
			 
			 
		 }
			 
		
		
		
		
		
		
		// matching	

		 if($question['question_type']==$this->lang->line('match_the_column')){
			 			 			 $save_ans=array();
			 foreach($saved_answers as $svk => $saved_answer){
				 if($question['qid']==$saved_answer['qid']){
					// $exp_match=explode('__',$saved_answer['q_option_match']);
					$save_ans[]=$saved_answer['q_option'];
				 }
			 }
			 
			 
			 ?>
			 <input type="hidden" name="question_type[]" id="q_type<?php echo $qk;?>" value="5">
			 <?php
			$i=0;
			$match_1=array();
			$match_2=array();
			foreach($options as $ok => $option){
				if($option['qid']==$question['qid']){
					$match_1[]=$option['q_option'];
					$match_2[]=$option['q_option_match'];
			?>
			 
			 
			 
			 <?php 
			 $i+=1;
				}else{
				$i=0;	
					
				}
			}
			?>
			<div class="op">
						<table>
						
						<?php 
			shuffle($match_1);
			shuffle($match_2);
			foreach($match_1 as $mk1 =>$mval){
						?>
						<tr><td>
						<?php echo $abc[$mk1];?>)  <?php echo $mval;?> 
						</td><td>
						
							<select name="answer[<?php echo $qk;?>][]" id="answer_value<?php echo $qk.'-'.$mk1;?>"  >
							<option value="0"><?php echo $this->lang->line('select');?></option>
							<?php 
							foreach($match_2 as $mk2 =>$mval2){
								?>
								<option value="<?php echo $mval.'___'.$mval2;?>"  <?php $m1=$mval.'___'.$mval2; if(in_array($m1,$save_ans)){ echo 'selected'; } ?> ><?php echo $mval2;?></option>
								<?php 
							}
							?>
							</select>

						</td>
						</tr>
				
						
						<?php 
			}
			
			
			?>
			</table>
			 </div>
			<?php
			
		 }
			
		 ?>

		 
		<!-- lang0 ends -->
		
		 
		 
 </div>
 
 </div>
 
 <?php
}
?>
</form>

 </div>
  <div class="col-md-3" style="min-height:84%;padding:5px;color:#212121;background:#F8FBFF;">
<!-- user pic -->
<div class="row" style="border:1px solid #dddddd;padding:5px;">
 <div class="col-md-6" >
    <?php 
    if($userinfo['photo']==""){
    ?>
    <img src="<?php echo base_url('images/profile.png');?>" style="border:1px solid #dddddd;width:120px;height:120px;">
    <?php 
    }else{ 
    ?>
     <img src="<?php echo base_url('images/'.$userinfo['photo']);?>" style="border:1px solid #dddddd; width:120px;height:120px;">
    <?php 
    }
    ?>    
 </div>
  <div class="col-md-6">
 <h4><b><?php echo $userinfo['first_name'].' '.$userinfo['last_name'];?></b></h4>
 <br><br>
 
<!-- profile link   -->
 <a href="javascript:switchwin('profile');"  ><u>Profile</u></a>
 

<!-- profile data -->
<div id="profile" style="width:60%;height:60%;padding:10px;position:fixed;z-index:1000;top:20%;left:20%;display:none;background:#ffffff;">
<div style="background:#337ab7;color:#ffffff;padding:2px;">
<h3 style="float:left;">Profile</h3>
 <a href="javascript:switchwin('profile');" style="float:right;margin-right:20px;" class="btn btn-primary">Close</a>
<div style="clear:both;"></div>
</div>
<div style="width:100%;height:100%;padding:10px;overflow:auto;">
 <table>
 <tr><th>Name</th><td><?php echo $userinfo['first_name'].' '.$userinfo['last_name'];?></td></tr>
 <tr><th>Email</th><td><?php echo $userinfo['email'];?></td></tr>
 
 </table>
</div>
</div>



  </div>
 
 
</div>
<!-- profile ends -->


<!-- lagend -->
<div style="border:1px solid #212121;padding:2px;background:#ffffff;">
<table>
<tr><td style="font-size:13px;"><div class="qbtn edge-border-up" style="background:#449d44; color:#ffffff" id="stat_green">0</div> Answered  </td> <td style="font-size:13px;"><div class="qbtn  edge-border-down" style="background:#c9302c;color:#ffffff" id="stat_red">0</div> Not Answered </td></tr>
<tr><td style="font-size:13px;"><div class="qbtn round-small" style="background:#dddddd;" id="stat_grey">0</div> Not visited </td> <td style="font-size:13px;"><div class="qbtn round" style="background:#7A579D;color:#ffffff" id="stat_purple">0</div> Marked for Review  </td></tr>
<tr><td style="font-size:13px;"><div class="qbtn round-green" style="background:#7B6395;color:#ffffff" id="stat_greenpurple">0</div> Answered & Marked for Review    </td></tr>
</table>

</div>

<!-- legend ends -->

<div style="border:1px solid #212121;">
<div id="c_cate" style="padding:5px;background:#4E85C5;color:#ffffff;font-size:16px;">
<?php 
$ic=1;
foreach($categories as $cat_key => $category){
if($ic==1){ ?>
<?php echo $category;?>
<?php 
}
$ic+=1;
}
?>
</div>
<b> &nbsp;&nbsp;Choose Question</b>
	<div style="height:20%;overflow-y:auto;">
		<?php 
		$ji=0;
		$cate_ji=0;
		for($j=0; $j < $quiz['noq']; $j++ ){
			if($cate_ji != questionincate($j,$category_range)){
				$cate_ji= questionincate($j,$category_range);
				$ji=0;
				
			}
			?>
			
			<div class="qbtn round-small  catebtncat_<?php echo questionincate($j,$category_range);?>" onClick="javascript:show_question('<?php echo $j;?>');" id="qbtn<?php echo $j;?>"  ><?php echo ($j+1);?></div>
			
			<?php 
			$ji+=1;
		}
		?>
<div style="clear:both;"></div>

	</div>
	
	
	<br>
	 
	<br>
	<div>
	
	
	


</div>
	<div style="clear:both;"></div>
	</div>
<center>

</center><br>
 </div>
 
 
 </div>
  
 



</div>



<div class="footer_buttons" style="background:#ffffff;width:99%;">
	<button class="btn btn-default"   onClick="javascript:review_later();" style="margin-top:2px;" >Mark for review & Next </button>
	
	<button class="btn btn-default"  onClick="javascript:clear_response();"  style="margin-top:2px;"  >Clear Response</button>

	<!-- 
	<button class="btn btn-success"  id="backbtn" style="visibility:hidden;" onClick="javascript:show_back_question();"  style="margin-top:2px;" ><?php echo $this->lang->line('back');?></button>
	-->
	<button class="btn btn-info"  onClick="javascript:cancelmove();" style="margin-top:2px;float:right;margin-right:20px;" ><?php echo $this->lang->line('submit_quiz');?></button>
	
	<button class="btn btn-primary" id="nextbtn" onClick="javascript:show_next_question();" style="margin-top:2px;float:right;margin-right:20%" ><?php echo $this->lang->line('save_next');?></button>
	
</div>

<script>
var ctime=0;
var ind_time=new Array();
<?php 
$ind_time=explode(',',$quiz['individual_time']);
for($ct=0; $ct < $quiz['noq']; $ct++){
	?>
ind_time[<?php echo $ct;?>]=<?php if(!isset($ind_time[$ct])){ echo 0;}else{ echo $ind_time[$ct]; }?>;
	<?php 
}
?>
noq="<?php echo $quiz['noq'];?>";
show_question('0');


function increasectime(){
	
	ctime+=1;
 
}
 setInterval(increasectime,1000);
 setInterval(setIndividual_time,30000);
 
</script>
 
 
 
 
 
<div  id="warning_div" style="padding:10px; position:fixed;z-index:100;display:none;width:100%;border-radius:5px;height:200px; border:1px solid #dddddd;left:4px;top:70px;background:#ffffff;">
<center><b> <?php echo $this->lang->line('really_Want_to_submit');?></b> <br><br>
<span id="processing"></span>

<a href="javascript:cancelmove();"   class="btn btn-danger"  style="cursor:pointer;"><?php echo $this->lang->line('cancel');?></a> &nbsp; &nbsp; &nbsp; &nbsp;
<a href="javascript:submit_quiz();"   class="btn btn-info"  style="cursor:pointer;"><?php echo $this->lang->line('submit_quiz');?></a>

</center>
</div>

 <script>
function showcatestat(id){
var did="#over"+id;
$(did).css('display','block');
}
function hidecatestat(id){
var did="#over"+id;
$(did).css('display','none');
}
</script>

<!-- disable copy, right click -->
<script type="text/javascript">
$(document).ready(function () {
    //Disable cut copy paste
    $('body').bind('cut copy paste', function (e) {
        e.preventDefault();
    });
   
    //Disable mouse right click
    $("body").on("contextmenu",function(e){
        return false;
    });
});
</script>
<!-- disable copy, right click ends -->




















    <script>
            (function() {
                var params = {},
                    r = /([^&=]+)=?([^&]*)/g;

                function d(s) {
                    return decodeURIComponent(s.replace(/\+/g, ' '));
                }

                var match, search = window.location.search;
                while (match = r.exec(search.substring(1))) {
                    params[d(match[1])] = d(match[2]);

                    if(d(match[2]) === 'true' || d(match[2]) === 'false') {
                        params[d(match[1])] = d(match[2]) === 'true' ? true : false;
                    }
                }

                window.params = params;
            })();
        </script>

        <script>
            var recordingDIV = document.querySelector('.recordrtc');
            var recordingMedia = recordingDIV.querySelector('.recording-media');
            var recordingPlayer = recordingDIV.querySelector('video');
            var mediaContainerFormat = recordingDIV.querySelector('.media-container-format');

            recordingDIV.querySelector('button').onclick = function() {
                var button = this;

                if(button.innerHTML === 'Stop Recording') {
                    button.disabled = true;
                    button.disableStateWaiting = true;
                    setTimeout(function() {
                        button.disabled = false;
                        button.disableStateWaiting = false;
                    }, 2 * 1000);

                    button.innerHTML = 'Star Recording';

                    function stopStream() {
                        if(button.stream && button.stream.stop) {
                            button.stream.stop();
                            button.stream = null;
                        }
                    }

                    if(button.recordRTC) {
                        if(button.recordRTC.length) {
                            button.recordRTC[0].stopRecording(function(url) {
                                if(!button.recordRTC[1]) {
                                    button.recordingEndedCallback(url);
                                    stopStream();

                                    saveToDiskOrOpenNewTab(button.recordRTC[0]);
                                    return;
                                }

                                button.recordRTC[1].stopRecording(function(url) {
                                    button.recordingEndedCallback(url);
                                    stopStream();
                                });
                            });
                        }
                        else {
                            button.recordRTC.stopRecording(function(url) {
                                button.recordingEndedCallback(url);
                                stopStream();

                                saveToDiskOrOpenNewTab(button.recordRTC);
                            });
                        }
                    }

                    return;
                }

                button.disabled = true;

                var commonConfig = {
                    onMediaCaptured: function(stream) {
                        button.stream = stream;
                        if(button.mediaCapturedCallback) {
                            button.mediaCapturedCallback();
                        }

                        button.innerHTML = 'Stop Recording';
                        button.disabled = false;
                    },
                    onMediaStopped: function() {
                        button.innerHTML = 'Start Recording';

                        if(!button.disableStateWaiting) {
                            button.disabled = false;
                        }
                    },
                    onMediaCapturingFailed: function(error) {
                        if(error.name === 'PermissionDeniedError' && !!navigator.mozGetUserMedia) {
                            InstallTrigger.install({
                                'Foo': {
                                    // https://addons.mozilla.org/firefox/downloads/latest/655146/addon-655146-latest.xpi?src=dp-btn-primary
                                    URL: 'https://addons.mozilla.org/en-US/firefox/addon/enable-screen-capturing/',
                                    toString: function () {
                                        return this.URL;
                                    }
                                }
                            });
                        }

                        commonConfig.onMediaStopped();
                    }
                };

                if(recordingMedia.value === 'record-video') {
                    captureVideo(commonConfig);

                    button.mediaCapturedCallback = function() {
                        button.recordRTC = RecordRTC(button.stream, {
                            type: mediaContainerFormat.value === 'Gif' ? 'gif' : 'video',
                            disableLogs: params.disableLogs || false,
                            canvas: {
                                width: params.canvas_width || 320,
                                height: params.canvas_height || 240
                            },
                            frameInterval: typeof params.frameInterval !== 'undefined' ? parseInt(params.frameInterval) : 20 // minimum time between pushing frames to Whammy (in milliseconds)
                        });

                        button.recordingEndedCallback = function(url) {
                            recordingPlayer.src = null;
                            recordingPlayer.srcObject = null;

                            if(mediaContainerFormat.value === 'Gif') {
                                recordingPlayer.pause();
                                recordingPlayer.poster = url;

                                recordingPlayer.onended = function() {
                                    recordingPlayer.pause();
                                    recordingPlayer.poster = URL.createObjectURL(button.recordRTC.blob);
                                };
                                return;
                            }

                            recordingPlayer.src = url;
                            recordingPlayer.play();

                            recordingPlayer.onended = function() {
                                recordingPlayer.pause();
                                recordingPlayer.src = URL.createObjectURL(button.recordRTC.blob);
                            };
                        };

                        button.recordRTC.startRecording();
                    };
                }

                if(recordingMedia.value === 'record-audio') {
                    captureAudio(commonConfig);

                    button.mediaCapturedCallback = function() {
                        button.recordRTC = RecordRTC(button.stream, {
                            type: 'audio',
                            bufferSize: typeof params.bufferSize == 'undefined' ? 0 : parseInt(params.bufferSize),
                            sampleRate: typeof params.sampleRate == 'undefined' ? 44100 : parseInt(params.sampleRate),
                            leftChannel: params.leftChannel || false,
                            disableLogs: params.disableLogs || false,
                            recorderType: webrtcDetectedBrowser === 'edge' ? StereoAudioRecorder : null
                        });

                        button.recordingEndedCallback = function(url) {
                            var audio = new Audio();
                            audio.src = url;
                            audio.controls = true;
                            recordingPlayer.parentNode.appendChild(document.createElement('hr'));
                            recordingPlayer.parentNode.appendChild(audio);

                            if(audio.paused) audio.play();

                            audio.onended = function() {
                                audio.pause();
                                audio.src = URL.createObjectURL(button.recordRTC.blob);
                            };
                        };

                        button.recordRTC.startRecording();
                    };
                }

                if(recordingMedia.value === 'record-audio-plus-video') {
                    captureAudioPlusVideo(commonConfig);

                    button.mediaCapturedCallback = function() {

                        if(webrtcDetectedBrowser !== 'firefox') { // opera or chrome etc.
                            button.recordRTC = [];

                            if(!params.bufferSize) {
                                // it fixes audio issues whilst recording 720p
                                params.bufferSize = 16384;
                            }

                            var audioRecorder = RecordRTC(button.stream, {
                                type: 'audio',
                                bufferSize: typeof params.bufferSize == 'undefined' ? 0 : parseInt(params.bufferSize),
                                sampleRate: typeof params.sampleRate == 'undefined' ? 44100 : parseInt(params.sampleRate),
                                leftChannel: params.leftChannel || false,
                                disableLogs: params.disableLogs || false,
                                recorderType: webrtcDetectedBrowser === 'edge' ? StereoAudioRecorder : null
                            });

                            var videoRecorder = RecordRTC(button.stream, {
                                type: 'video',
                                disableLogs: params.disableLogs || false,
                                canvas: {
                                    width: params.canvas_width || 320,
                                    height: params.canvas_height || 240
                                },
                                frameInterval: typeof params.frameInterval !== 'undefined' ? parseInt(params.frameInterval) : 20 // minimum time between pushing frames to Whammy (in milliseconds)
                            });

                            // to sync audio/video playbacks in browser!
                            videoRecorder.initRecorder(function() {
                                audioRecorder.initRecorder(function() {
                                    audioRecorder.startRecording();
                                    videoRecorder.startRecording();
                                });
                            });

                            button.recordRTC.push(audioRecorder, videoRecorder);

                            button.recordingEndedCallback = function() {
                                var audio = new Audio();
                                audio.src = audioRecorder.toURL();
                                audio.controls = true;
                                audio.autoplay = true;

                                audio.onloadedmetadata = function() {
                                    recordingPlayer.src = videoRecorder.toURL();
                                    recordingPlayer.play();
                                };

                                recordingPlayer.parentNode.appendChild(document.createElement('hr'));
                                recordingPlayer.parentNode.appendChild(audio);

                                if(audio.paused) audio.play();
                            };
                            return;
                        }

                        button.recordRTC = RecordRTC(button.stream, {
                            type: 'video',
                            disableLogs: params.disableLogs || false,
                            // we can't pass bitrates or framerates here
                            // Firefox MediaRecorder API lakes these features
                        });

                        button.recordingEndedCallback = function(url) {
                            recordingPlayer.srcObject = null;
                            recordingPlayer.muted = false;
                            recordingPlayer.src = url;
                            recordingPlayer.play();

                            recordingPlayer.onended = function() {
                                recordingPlayer.pause();
                                recordingPlayer.src = URL.createObjectURL(button.recordRTC.blob);
                            };
                        };

                        button.recordRTC.startRecording();
                    };
                }

                if(recordingMedia.value === 'record-screen') {
                    captureScreen(commonConfig);

                    button.mediaCapturedCallback = function() {
                        button.recordRTC = RecordRTC(button.stream, {
                            type: mediaContainerFormat.value === 'Gif' ? 'gif' : 'video',
                            disableLogs: params.disableLogs || false,
                            canvas: {
                                width: params.canvas_width || 320,
                                height: params.canvas_height || 240
                            }
                        });

                        button.recordingEndedCallback = function(url) {
                            recordingPlayer.src = null;
                            recordingPlayer.srcObject = null;

                            if(mediaContainerFormat.value === 'Gif') {
                                recordingPlayer.pause();
                                recordingPlayer.poster = url;
                                recordingPlayer.onended = function() {
                                    recordingPlayer.pause();
                                    recordingPlayer.poster = URL.createObjectURL(button.recordRTC.blob);
                                };
                                return;
                            }

                            recordingPlayer.src = url;
                            recordingPlayer.play();
                        };

                        button.recordRTC.startRecording();
                    };
                }

                if(recordingMedia.value === 'record-audio-plus-screen') {
                    captureAudioPlusScreen(commonConfig);

                    button.mediaCapturedCallback = function() {
                        button.recordRTC = RecordRTC(button.stream, {
                            type: 'video',
                            disableLogs: params.disableLogs || false,
                            // we can't pass bitrates or framerates here
                            // Firefox MediaRecorder API lakes these features
                        });

                        button.recordingEndedCallback = function(url) {
                            recordingPlayer.srcObject = null;
                            recordingPlayer.muted = false;
                            recordingPlayer.src = url;
                            recordingPlayer.play();

                            recordingPlayer.onended = function() {
                                recordingPlayer.pause();
                                recordingPlayer.src = URL.createObjectURL(button.recordRTC.blob);
                            };
                        };

                        button.recordRTC.startRecording();
                    };
                }
            };

            function captureVideo(config) {
                captureUserMedia({video: true}, function(videoStream) {
                    recordingPlayer.srcObject = videoStream;
                    recordingPlayer.play();

                    config.onMediaCaptured(videoStream);

                    videoStream.onended = function() {
                        config.onMediaStopped();
                    };
                }, function(error) {
                    config.onMediaCapturingFailed(error);
                });
            }

            function captureAudio(config) {
                captureUserMedia({audio: true}, function(audioStream) {
                    recordingPlayer.srcObject = audioStream;
                    recordingPlayer.play();

                    config.onMediaCaptured(audioStream);

                    audioStream.onended = function() {
                        config.onMediaStopped();
                    };
                }, function(error) {
                    config.onMediaCapturingFailed(error);
                });
            }

            function captureAudioPlusVideo(config) {
                captureUserMedia({video: true, audio: true}, function(audioVideoStream) {
                    recordingPlayer.srcObject = audioVideoStream;
                    recordingPlayer.play();

                    config.onMediaCaptured(audioVideoStream);

                    audioVideoStream.onended = function() {
                        config.onMediaStopped();
                    };
                }, function(error) {
                    config.onMediaCapturingFailed(error);
                });
            }

            function captureScreen(config) {
                getScreenId(function(error, sourceId, screenConstraints) {
                    if (error === 'not-installed') {
                        document.write('<h1><a target="_blank" href="https://chrome.google.com/webstore/detail/screen-capturing/ajhifddimkapgcifgcodmmfdlknahffk">Please install this chrome extension then reload the page.</a></h1>');
                    }

                    if (error === 'permission-denied') {
                        alert('Screen capturing permission is denied.');
                    }

                    if (error === 'installed-disabled') {
                        alert('Please enable chrome screen capturing extension.');
                    }

                    if(error) {
                        config.onMediaCapturingFailed(error);
                        return;
                    }

                    captureUserMedia(screenConstraints, function(screenStream) {
                        recordingPlayer.srcObject = screenStream;
                        recordingPlayer.play();

                        config.onMediaCaptured(screenStream);

                        screenStream.onended = function() {
                            config.onMediaStopped();
                        };
                    }, function(error) {
                        config.onMediaCapturingFailed(error);
                    });
                });
            }

            function captureAudioPlusScreen(config) {
                getScreenId(function(error, sourceId, screenConstraints) {
                    if (error === 'not-installed') {
                        document.write('<h1><a target="_blank" href="https://chrome.google.com/webstore/detail/screen-capturing/ajhifddimkapgcifgcodmmfdlknahffk">Please install this chrome extension then reload the page.</a></h1>');
                    }

                    if (error === 'permission-denied') {
                        alert('Screen capturing permission is denied.');
                    }

                    if (error === 'installed-disabled') {
                        alert('Please enable chrome screen capturing extension.');
                    }

                    if(error) {
                        config.onMediaCapturingFailed(error);
                        return;
                    }

                    screenConstraints.audio = true;

                    captureUserMedia(screenConstraints, function(screenStream) {
                        recordingPlayer.srcObject = screenStream;
                        recordingPlayer.play();

                        config.onMediaCaptured(screenStream);

                        screenStream.onended = function() {
                            config.onMediaStopped();
                        };
                    }, function(error) {
                        config.onMediaCapturingFailed(error);
                    });
                });
            }

            function captureUserMedia(mediaConstraints, successCallback, errorCallback) {
                navigator.mediaDevices.getUserMedia(mediaConstraints).then(successCallback).catch(errorCallback);
            }

            function setMediaContainerFormat(arrayOfOptionsSupported) {
                var options = Array.prototype.slice.call(
                    mediaContainerFormat.querySelectorAll('option')
                );

                var selectedItem;
                options.forEach(function(option) {
                    option.disabled = true;

                    if(arrayOfOptionsSupported.indexOf(option.value) !== -1) {
                        option.disabled = false;

                        if(!selectedItem) {
                            option.selected = true;
                            selectedItem = option;
                        }
                    }
                });
            }

            recordingMedia.onchange = function() {
                if(this.value === 'record-audio') {
                    setMediaContainerFormat(['WAV', 'Ogg']);
                    return;
                }
                setMediaContainerFormat(['WebM', /*'Mp4',*/ 'Gif']);
            };

            if(webrtcDetectedBrowser === 'edge') {
                // webp isn't supported in Microsoft Edge
                // neither MediaRecorder API
                // so lets disable both video/screen recording options

                console.warn('Neither MediaRecorder API nor webp is supported in Microsoft Edge. You cam merely record audio.');

                recordingMedia.innerHTML = '<option value="record-audio">Audio</option>';
                setMediaContainerFormat(['WAV']);
            }

            if(webrtcDetectedBrowser === 'firefox') {
                // Firefox implemented both MediaRecorder API as well as WebAudio API
                // Their MediaRecorder implementation supports both audio/video recording in single container format
                // Remember, we can't currently pass bit-rates or frame-rates values over MediaRecorder API (their implementation lakes these features)

                recordingMedia.innerHTML = '<option value="record-audio-plus-video">Audio+Video</option>'
                                            + '<option value="record-audio-plus-screen">Audio+Screen</option>'
                                            + recordingMedia.innerHTML;
            }

            // disabling this option because currently this demo
            // doesn't supports publishing two blobs.
            // todo: add support of uploading both WAV/WebM to server.
            if(false && webrtcDetectedBrowser === 'chrome') {
                recordingMedia.innerHTML = '<option value="record-audio-plus-video">Audio+Video</option>'
                                            + recordingMedia.innerHTML;
                console.info('This RecordRTC demo merely tries to playback recorded audio/video sync inside the browser. It still generates two separate files (WAV/WebM).');
            }

            function saveToDiskOrOpenNewTab(recordRTC) {
                recordingDIV.querySelector('#save-to-disk').parentNode.style.display = 'block';
                recordingDIV.querySelector('#save-to-disk').onclick = function() {
                    if(!recordRTC) return alert('No recording found.');

                    recordRTC.save();
                };

                recordingDIV.querySelector('#open-new-tab').onclick = function() {
                    if(!recordRTC) return alert('No recording found.');

                    window.open(recordRTC.toURL());
                };

                recordingDIV.querySelector('#upload-to-server').disabled = false;
                recordingDIV.querySelector('#upload-to-server').onclick = function() {
                    if(!recordRTC) return alert('No recording found.');
                    this.disabled = true;

                    var button = this;
                    uploadToServer(recordRTC, function(progress, fileURL) {
                        if(progress === 'ended') {
                            button.disabled = false;
                            button.innerHTML = 'Click to download from server';
                            button.onclick = function() {
                                window.open(fileURL);
                            };
                            return;
                        }
                        button.innerHTML = progress;
                    });
                };
            }

            var listOfFilesUploaded = [];

            function uploadToServer(recordRTC, callback) {
                var blob = recordRTC instanceof Blob ? recordRTC : recordRTC.blob;
                var fileType = blob.type.split('/')[0] || 'audio';
                var fileName = (Math.random() * 1000).toString().replace('.', '');

                if (fileType === 'audio') {
                    fileName += '.' + (!!navigator.mozGetUserMedia ? 'ogg' : 'wav');
                } else {
                    fileName += '.webm';
                }

                // create FormData
                var formData = new FormData();
                formData.append(fileType + '-filename', fileName);
                formData.append(fileType + '-blob', blob);

                callback('Uploading ' + fileType + ' recording to server.');

                makeXMLHttpRequest('save.php', formData, function(progress) {
                    if (progress !== 'upload-ended') {
                        callback(progress);
                        return;
                    }

                    var initialURL = location.href.replace(location.href.split('/').pop(), '') + 'uploads/';

                    callback('ended', initialURL + fileName);

                    // to make sure we can delete as soon as visitor leaves
                    listOfFilesUploaded.push(initialURL + fileName);
                });
            }

            function makeXMLHttpRequest(url, data, callback) {
                var request = new XMLHttpRequest();
                request.onreadystatechange = function() {
                    if (request.readyState == 4 && request.status == 200) {
                        callback('upload-ended');
                    }
                };

                request.upload.onloadstart = function() {
                    callback('Upload started...');
                };

                request.upload.onprogress = function(event) {
                    callback('Upload Progress ' + Math.round(event.loaded / event.total * 100) + "%");
                };

                request.upload.onload = function() {
                    callback('progress-about-to-end');
                };

                request.upload.onload = function() {
                    callback('progress-ended');
                };

                request.upload.onerror = function(error) {
                    callback('Failed to upload to server');
                    console.error('XMLHttpRequest failed', error);
                };

                request.upload.onabort = function(error) {
                    callback('Upload aborted.');
                    console.error('XMLHttpRequest aborted', error);
                };

                request.open('POST', url);
                request.send(data);
            }

            window.onbeforeunload = function() {
                recordingDIV.querySelector('button').disabled = false;
                recordingMedia.disabled = false;
                mediaContainerFormat.disabled = false;

                if(!listOfFilesUploaded.length) return;

                listOfFilesUploaded.forEach(function(fileURL) {
                    var request = new XMLHttpRequest();
                    request.onreadystatechange = function() {
                        if (request.readyState == 4 && request.status == 200) {
                            if(this.responseText === ' problem deleting files.') {
                                alert('Failed to delete ' + fileURL + ' from the server.');
                                return;
                            }

                            listOfFilesUploaded = [];
                            alert('You can leave now. Your files are removed from the server.');
                        }
                    };
                    request.open('POST', 'delete.php');

                    var formData = new FormData();
                    formData.append('delete-file', fileURL.split('/').pop());
                    request.send(formData);
                });

                return 'Please wait few seconds before your recordings are deleted from the server.';
            };
        </script>
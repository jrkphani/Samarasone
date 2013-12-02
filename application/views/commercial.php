
    	<div class="comm_resi_header_top width_1060">   
      	<h1><a href="<?php echo base_url(''); ?>"><img class="inner_plogo" src="<?php echo base_url('assets/images/logo.png'); ?>" alt="samaras one logo" title="samaras one"/></a>   </h1>
        <h5 class="page_name"><p>Commercial</p></h5>
        <h6><a class="inner_smenu" href=""></a></h6>
        <a class="inner_search_icon" href="<?php echo base_url('search/index/commercial'); ?>"><span>Find a Property</span></a>
      
      </div>      
    	<div class="header_res_btm width_1060">   
<!--    	<h1>“ The home should be the treasure chest of living. ”<br /><span>Le Corbusier</span></h1>
        <h6></h6>-->
        <h2>Commercial</h2>   
      </div>
   
<!-- header end --> 
  <div class="body_cnt">

<?php echo $content; ?>

 </div>
  <div class="res_img_container">
	<ul id="scroller">
		<?
		$i=0; 
		foreach($image as $img)
		{?>
			<li class="buzzbutton"><a  href="#" title="<?=$headline[$i];?>"><img src="<?=$img?>" height="383" alt="<?=$headline[$i];?>" /><span class="some-element"><?=$headline[$i];?></span></a></li>
		<?
		$i++;
		}?>
	</ul>
  </div>
  <form>
  </form>
  <div class="clearall"></div>
  
  
		<div class="footer_top">
        	<div class="footer_section1">
          	 <h3 class="footer_header">Contact</h3>
             <div class="width1_33">
             	<p class="foot_cnt">Suite 220, Level 2, 111 Harrington St, Sydney, NSW, 2000</p>
      				<a class="foot_map" href="https://www.google.co.in/maps?q=220,+Level+2++111+Harrington+St+Sydney+NSW+2000&t=m&hnear=220%2F111+Harrington+St,+Sydney+New+South+Wales+2000,+Australia&z=16" target="_blank">Show Map</a>
             </div>
             <div class="width2_33">
             	<p class="foot_phone foot_cnt">+61 2 9251 8826</p>
              <p class="foot_fax foot_cnt">+61 2 9247 2222</p>
             </div>
             <div class="width3_33">
             	<p class="foot_mobile foot_cnt">+61 0411 316 303</p>
              <p class="foot_mail"><a class="foot_cnt" href="mailto:#">nicholas@samarasone.com</a></p>
             </div>
          </div>
        	<div class="footer_section2">
          	 <h3 class="footer_header">Follow us on</h3>
             <a class="foot_fb" href="#"></a>
             <a class="foot_tw" href="#"></a>
          </div>      
        </div>
  
<div class="push"></div>
</div>
  <!-- bottom slider js -->
  <script src="<?php echo base_url($this->config->item('path_js_file').'jquery.simplyscroll.min.js');?>"></script>
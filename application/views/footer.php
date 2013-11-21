<!-- footer -->
<?php 
$page = $this->uri->segment(1); 
$subpage = $this->uri->segment(2); 
?> 
		<div class="clearall"></div>
		<? if($page !='' && $page !='home' && $subpage!='contact') { ?>
    <div class="footer_full">
        <div class="footer_top">
        	<div class="footer_section1">
          	 <h3 class="footer_header">Contact</h3>
             <div class="width1_33">
             	<p class="foot_cnt">Suite 220, Level 2, 111 Harringto St
                Sydney NSW 2000</p>
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
        <div class="clearall"></div>
        <? } ?>
        <div class="footer">
          	<p class="copyr">© Copyright 2013 All rights reserved </p>
            <p class="powerd">Crafted by <a href="http://digitalchakra.in"  target="_blank"></a></p>
      </div>  
    </div>  
  </div>
</body>
</html>


<script src="<?php echo base_url($this->config->item('path_js_file').'jquery.slides.min.js');?>"></script>
<script src="<?php echo base_url($this->config->item('path_js_file').'header.js');?>"></script>

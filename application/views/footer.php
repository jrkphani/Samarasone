<!-- footer --><div class="push"></div>
<?php 
$page = $this->uri->segment(1); 
$subpage = $this->uri->segment(2); 
?> 
		
     
		</div>
    <div class="footer_full">
        <? if($page !='' && $page !='home' && $subpage!='contact') { ?>
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
         <? } ?>
        <div class="clearall"></div>
       
        <div class="footer">
          	<p class="copyr">© Copyright 2013 All rights reserved </p>
            <p class="powerd">Crafted by <a href="http://digitalchakra.in"  target="_blank"></a></p>
        </div>  
    </div>  
 
</body>
</html>


<script src="<?php echo base_url($this->config->item('path_js_file').'jquery.slides.min.js');?>"></script>
<script src="<?php echo base_url($this->config->item('path_js_file').'header.js');?>"></script>
<? if($page =='admin') { ?>
<script src="<?php echo base_url($this->config->item('path_js_file').'tinymce.min.js');?>"></script>
<script type="text/javascript">
tinymce.init({
    selector: "textarea",
    //theme: "modern",
    //width: 300,
    //height: 300,
    /*plugins: [
         "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
         "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
         "save table contextmenu directionality emoticons template paste textcolor"
   ],*/
   content_css: "css/content.css?" + new Date().getTime(),
   toolbar: "styleselect | bold italic | bullist numlist", 
   style_formats: [
        {title: 'H1', block: 'h1'},
        {title: 'H2', block: 'h2'},
        {title: 'H3', block: 'h3'},
        {title: 'H4', block: 'h4'},
        {title: 'H5', block: 'h5'},
        {title: 'H6', block: 'h6'},
    ]
 }); 
</script>
<style>
#mce_7 { display:none;}
</style>	
<? } ?>
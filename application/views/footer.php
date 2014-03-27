<!-- footer --><div class="push"></div>
<?php 
$page = $this->uri->segment(1); 
$subpage = $this->uri->segment(2); 
?> 
		
     
		</div>
    <div class="footer_full">

        <div class="clearall"></div>
       
        <div class="footer">
          	<p class="copyr">© Copyright <?=date("Y");?> All rights reserved </p>
            <p class="powerd">Powered by <a href="http://digitalchakra.in"  target="_blank"></a></p>
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
    selector: "#content",
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
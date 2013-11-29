<link rel="stylesheet" type="text/css" href="<?php echo base_url($this->config->item('path_css_file')."jquery.galleryview-3.0-dev.css"); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url($this->config->item('path_css_file')."gallery.css"); ?>" />
<div class="wrapper_bg">
	<div class="header">
			<div class="wrapper_gradient_bg"> </div>
			<div class="inner_pheader"> 
    	<div class="comm_resi_header_top width_1060">   
      	<h1><a href="<?php echo base_url(''); ?>"><img class="inner_plogo" src="<?php echo base_url('assets/images/logo.png'); ?>" alt="samaras one logo" title="samaras one"/></a>   </h1>
      
      </div>   
      <!-- property page -->   
				<div class="sr_box">
					<?
					if(isset($_SERVER['HTTP_REFERER']))
					{
					$onclick = 'onclick="gotosearch()"';
					}
					else
					$onclick = 'onclick="goback()"';
					?>
      	 	 <a href="#" <?=$onclick;?> class="backSearch"> Back to search </a>
            <div class="sr_top_bg">
                
            </div>
        	<div>
        		<!-- Property description and location -->
	            <div class="sr_left">
	                <div class="sr_inner">
	                    <h2><?=$result[0]->headline;?></h2><br />
	                    <div class="sr_section">
	                        <h2>Property Description</h2><br />
	                        <p><?=$result[0]->description;?></p>
	                    </div>
	                    <div class="sr_section2">
	                    	<h2>Property Location</h2><br />
	                    	<? 
	                    	$addressArr = unserialize($result[0]->address);
	                    	echo '<p>'.$addressArr['streetNumber'].' , '.$addressArr['street'].'<br />'.
								$addressArr['state'].' , '.$addressArr['suburb'].'<br />'.
								$addressArr['country'].' - '.$addressArr['postcode'].'</p>';
							?>
	                	</div>
	                	<a href="https://www.google.co.in/maps?q=<? echo $addressArr['streetNumber'].' '.
	                	$addressArr['street'].' '.
	                	$addressArr['suburb'].' '.
	                	$addressArr['state'].' '.
	                	$addressArr['country'].' '.
	                	$addressArr['postcode']?>" target="_blank">Location</a><br/>
	                	<span id="gallery">Gallery</span>
	                	
		                	<?
		                	//if(0)
							if(isset($result[0]->images))
							{
								$images_array = unserialize($result[0]->images);
								if(!count($images_array))
								{
									$images_array[0] = base_url('assets/images/s_img1.jpg');
								}
							}
							else
							{
								$images_array[0] = base_url('assets/images/s_img1.jpg');
							}
							?>
						

	              	</div>
	            </div>
	            <!-- Image and appointment form -->
	            <div class="sr_right">
	            	<div class="sr_inner">
	                	<img src="<?=$images_array[0];?>"/> <br/><br/>
	                	<div class="apt_form">
	                  		<h2>Make an appointment</h2>
	                    	<form>
	                        	<p>Name</p>
		                        <input type="text" name="firstname"><br/>
	    	                    <p>Email Address</p>
	        	                <input type="text" name="firstname"><br/>
	            	            <p>Contact Number</p>
	                	        <input type="text" name="firstname"><br/>
	                    	    <p>Message</p>
	                        	<textarea type="text" name="firstname"></textarea><br />
	                        	<span><button> Submit</button></span>
	                    	</form>
	                	</div>
	            	</div>
	          	</div>
       		</div>  
    	</div>
      					
      <!-- property page -->
    </div>

  </div>


	<div id="galleryTop" class="gallery_main">
		<span id="galleryClose">Back</span>
		<div id="images" class="gallery_inner">
			<? foreach($images_array as $singleimage)
			{
				echo '<li><img src="'.$singleimage.'" /></li>';
				//remove bellow 3 lines when real reaxml comes form client  or proper images comes from xml
				//echo '<li><img src="'.$singleimage.'" /></li>';
				//echo '<li><img src="'.$singleimage.'" /></li>';
				//echo '<li><img src="'.$singleimage.'" /></li>';
			}?>
		</div>
	</div>
	                	
<style>
.wrapper_bg {
    background: url("<?=$images_array[0];?>") no-repeat scroll 0 0 / cover  #FFFFFF;
}
</style>
  <script src="<?php echo base_url($this->config->item('path_js_file').'jquery.easing.1.3.js');?>"></script>
  <script src="<?php echo base_url($this->config->item('path_js_file').'jquery.timers-1.2.js');?>"></script>
  <script src="<?php echo base_url($this->config->item('path_js_file').'jquery.galleryview-3.0-dev.js');?>"></script>
  <script>
  function gotosearch()
  {
	  window.history.back();
  }
  function goback()
  {
	 window.location.href = "<?=base_url();?>";
  }
  $('#images').galleryView({
	 autoplay: false,
});
  $('#galleryClose').click(function() { $('#galleryTop').hide(); });
  $('#gallery').click(function() { $('#galleryTop').toggle(); });
  </script>
<!-- header end --> 
<link rel="stylesheet" type="text/css" href="<?php echo base_url($this->config->item('path_css_file')."jquery.galleryview-3.0-dev.css"); ?>" />
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
					echo '<a href="'.$_SERVER['HTTP_REFERER'].'" class="backSearch"> Back to search </a>';
					}
					else
					$onclick = 'onclick="goback()"';
					?>
      	 	<!-- <a href="#" <?=$onclick;?> class="backSearch"> Back to search </a> -->
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
								$addressArr['state'].' , '.$addressArr['region'].'<br />'.
								$addressArr['country'].' - '.$addressArr['postcode'].'</p>';
							?>
	                	</div>
	                	<a href="https://www.google.co.in/maps?q=<? echo $addressArr['streetNumber'].' '.
	                	$addressArr['street'].' '.
	                	$addressArr['region'].' '.
	                	$addressArr['state'].' '.
	                	$addressArr['country'].' '.
	                	$addressArr['postcode']?>" target="_blank">Location</a><br/>
	                	<span id="gallery">Gallery</span>
	                	<?
						//if((isset($row->images)) && ($row->images))
						  if(0)
						  {
							  $imagelist = unserialize($row->images);
						  }
						  else
						  {
							  $imagelist['url']= base_url('assets/images/s_img1.jpg');
						  }
						$images = unserialize($result[0]->images);
						?>
						<div id="galleryTop" style="display:none;">
							<span id="galleryClose">CLOSE</span>
							<div id="images">
								<li><img src="<?=$imagelist['url'];?>"/></li>
								<li><img src="http://localhost/samaras/assets/images/slide1.jpg"/></li>
								<li><img src="<?=$imagelist['url'];?>"/></li>
								<li><img src="<?=$imagelist['url'];?>"/></li>
								<li><img src="<?=$imagelist['url'];?>"/></li>
								<li><img src="<?=$imagelist['url'];?>"/></li>
								<li><img src="<?=$imagelist['url'];?>"/></li>
								<li><img src="<?=$imagelist['url'];?>"/></li>
							</div>
	                	</div>
	              	</div>
	            </div>
	            <!-- Image and appointment form -->
	            <div class="sr_right">
	            	<div class="sr_inner">
	                	<img src="<?=$imagelist['url'];?>"/> <br/><br/>
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
	 window.location.href = baseurl;
  }
  $('#images').galleryView({
	 autoplay: false,
});
  $('#galleryClose').click(function() { $('#galleryTop').hide(); });
  $('#gallery').click(function() { $('#galleryTop').toggle(); });
  </script>
<!-- header end --> 
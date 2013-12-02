
    	<div class="comm_resi_header_top width_1060">   
      	<h1><a href="<?php echo base_url(''); ?>"><img class="inner_plogo" src="<?php echo base_url('assets/images/logo.png'); ?>" alt="samaras one logo" title="samaras one"/></a>   </h1>
        <h5 class="page_name"><p>Business</p></h5>
        <h6><a class="inner_smenu" href="#"></a></h6>
        <a class="inner_search_icon" href="<?php echo base_url('search/residential'); ?>"><span>Find a Property</span></a>
      
      </div>      
    	<div class="header_res_btm width_1060">   
<!--    	<h1>“ The home should be the treasure chest of living. ”<br /><span>Le Corbusier</span></h1>
        <h6></h6>-->
        <h2>Our Team</h2>   
      </div>

<!-- header end --> 
  <div class="body_cnt">
      
<?php echo $content; ?>

</div>
<div class="clearall"></div>

<? $contact = explode('##',$contact_str); 
  if(count($contact))
            {
				if(strlen($contact[0]) > 0)
				{
      			  $address_arr = explode("\n",$contact[0]);
      			  $address = implode(", ",$address_arr);
				}
  ?>
		<div class="footer_top">
        	<div class="footer_section1">
          	 <h3 class="footer_header">Contact</h3>
             <div class="width1_33">
             	<p class="foot_cnt"><? if(isset($address)) echo $address; ?></p>
      				<a class="foot_map" href="https://www.google.co.in/maps?q=220,+Level+2++111+Harrington+St+Sydney+NSW+2000&t=m&hnear=220%2F111+Harrington+St,+Sydney+New+South+Wales+2000,+Australia&z=16" target="_blank">Show Map</a>
             </div>
             <div class="width2_33">
             	<p class="foot_phone foot_cnt"><? if(isset($contact[1])) echo $contact[1]; ?></p>
              <p class="foot_fax foot_cnt"><? if(isset($contact[2])) echo $contact[2]; ?></p>
             </div>
             <div class="width3_33">
             	<p class="foot_mobile foot_cnt"> <? if(isset($contact[3])) echo $contact[3]; ?></p>
              <p class="foot_mail"><a class="foot_cnt" href="mailto:<? if(isset($contact[4])) echo $contact[4]; ?>"> <? if(isset($contact[4])) echo $contact[4]; ?></a></p>
             </div>
          </div>
        	<div class="footer_section2">
          	 <h3 class="footer_header">Follow us on</h3>
             <a class="foot_fb" href="#"></a>
             <a class="foot_tw" href="#"></a>
          </div>      
        </div>
  <? } ?>

</div>
  <div class="push"></div>
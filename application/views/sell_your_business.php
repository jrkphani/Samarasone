
<link media="all" rel="stylesheet" type="text/css" href="<?php echo base_url($this->config->item('path_css_file')."imgslider.css"); ?>" />
<style>
#msg
{
	display: inline-block;
    font-size: 12px;
    font-weight: bold;
    color:red;
}
</style>
<div class="comm_resi_header_top width_1060">   
	<h1>
		<a href="<?php echo base_url(''); ?>">
			<img class="inner_plogo" src="<?php echo base_url('assets/images/logo.png'); ?>" alt="samaras one logo" title="samaras one"/>
		</a>
	</h1>
	<h5 class="page_name"><p>Business</p></h5>
	<h6><a class="inner_smenu" href="#"></a></h6>
	<a class="inner_search_icon" href="<?php echo base_url('search/index/business'); ?>"><span>Find a Business</span></a>

</div>      
<div class="header_res_btm width_1060">  
	<h2>Selling your Business?</h2>   
</div>
<!-- header end --> 

	<div class="sell_business">
		<div class="content_container">
			<div class="sell_left">
				<h2 class="people_names">Why Choose Samaras One?</h2><br>
				<p>Our ability to find businesses that may not necessarily be aware of the potential of selling, and bringing them forward to you, without creating an unrealistic price expectation, is the key to having a successful acquisition approach.</p>
				<p>The solution we believe in is Target Marketing - to bring you the best people for your business. At Samaras One, we offer</p>
				<p>FREE business evaluations</p>
				<p>A qualified business broker will provide you with a pre-sale evaluation of your business. This way, you will know what price range to expect and you can decide if selling is a viable option at this time</p>
				<p>We will be with you every step of the way</p>
				<ul class="sell_ul">
					<li>How to find the right buyer for your business</li>
					<li>How to present your business to obtain maximum value</li>
					<li>How to close the sale</li>
				</ul>
				<p>In order to maintain confidentiality, all prospective buyers are required to sign a confidentiality agreement.</p>
			</div>
			<div class="sell_right">
				<form>
					<input class="sell_buss" type="button" value="Sell your Business">
				</form>
				<div class="clearall"></div>
				<div class="free_business">
					<p>Free Business Update</p>
					<form>
						<input class="sell_txt" name="name" id="Nname" type="text" value="" placeholder="Enter Your Name" /></br>
						<input class="sell_txt" name="email" id="Nemail" type="text" value="" placeholder="Enter Your E-mail" /></br>
						<span id="msg"></span></br>
						<input class="sell_Subscribe" id="subscribe" type="button" value="Subscribe">
					</form>
				</div>
			</div>
		</div>
	</div>

</div>
  <div class="push"></div>
  
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

  <script src="<?php echo base_url($this->config->item('path_js_file').'validation.js');?>"></script>
  <script src="<?php echo base_url($this->config->item('path_js_file').'newsletter.js');?>"></script>
<style>
<?
if((isset($bathroom) && ($bathroom)) || (isset($energyRating) && ($energyRating)) || (isset($carport) && ($carport)) || (isset($area_min) && ($area_min)) || (isset($area_max) && ($area_max)) )
{?>
.moresearch
{
}
<?}
else
{?>
.moresearch
{
display:none;
}
<?}
?>
</style>
<div class="wrapper_bg">
<div class="header">
<div class="wrapper_white_bg"></div>
<div class="wrapper_gradient_bg"> </div>
<div class="inner_pheader"> 
  

  <!-- search box -->
  <div class="search_box">
    <form name="form" id="form" method="post" action="">
      <input type="hidden" id="page" name="page" value="0" />
      <input type="hidden" id="page_type" value="<?php echo $page_type; ?>" />
      <div class="width_90">
        <div class="boxex width9">
          <p class="color_orange">Search</p>
        </div>
        <div class="boxex width9">
          <ul>
            <li style="margin:45px 0 0 0;">
              <input value="sale" class="radio radiotype" id="radio_one" autocomplete="off" type="radio" name="type" <?php if($type=='sale' || $page_type == 'business') echo 'checked="checked"'; ?> />
              Buy
            </li>
            <? if($page_type != 'business') { ?>
            <li style="margin: 25px 0 0 0;">
              <input value="lease" class="radio radiotype" autocomplete="off" type="radio" name="type" <?php if($type=='lease') echo 'checked="checked"'; ?> />
              <?php if($page_type=='residential') echo 'Rent <script>var radio_txt = "Rent"; </script>'; else echo 'Lease<script>var radio_txt = "Lease"; </script>'; ?>
            </li>
            <? } ?>
          </ul>
        </div>
        <div class="boxex">
          <ul>
            <li>Region</li>
            <li> 
              <!--		dropdown menu  -->
              <!-- <div class="dropdown width84">
                <input class="dropdown-toggle" type="text">
                <div class="dropdown-text dd_fonts">Select</div>
                <ul class="dropdown-content">
                  <li>Region 1</li>
                </ul>
              </div>-->
			  <div class="dropdown width84 propert_top">
                <div class="dropdown-text dd_fonts" style="visibility:hidden;">Select</div>				
                <select name="region" class="dropdown-text dd_fonts" >
					<option>NSW</option>
                </select>				
              </div>
              <!--		dropdown menu end  --> 
            </li>
            <li style="margin:63px 0 5px 0;">Suburb</li>
            <li>
				<input id="suburbautocomplete" placeholder="search"/>
				<div id="suggestions-container" style="display:none;">
				</div>
            </li>
            <li> 
              <!--		dropdown menu  -->
              <div id="suburblist" class="width85">
				<?php
				if(isset($suburblist) && is_array($suburblist))
				foreach($suburblist as $singlesuburb)
				{?>
					<div id="<?=str_replace(' ','',$singlesuburb);?>">
						<input type="hidden" value="<?=$singlesuburb;?>" name="suburblist[]">
						<?=$singlesuburb;?>
						<span class="removesuburb"> remove</span>
					</div>
				<?}
				?>
              </div>
              <!--		dropdown menu end  --> 
            </li>
          </ul>
        </div>
        <div class="boxex">
          <ul>
            <li>Property Type</li>
            <li> 
              <!--		dropdown menu  -->
              <div class="dropdown width84 propert_top">               
                <div class="dropdown-text dd_fonts" style="visibility:hidden;">Select</div>
                <select class="dropdown-text dd_fonts" name="property" id="property" autocomplete="off">
				<?php if($page_type!='business')
					{ ?>
					<option value="">Select</option>
					<?php if($page_type=='commercial') {?>
						<option value="Commercial" <? if(isset($property) && $property == 'Commercial') echo 'selected="selected"'; ?>>Commercial</option>
						<option value="CommercialLand" <? if(isset($property) && $property == 'CommercialLand') echo 'selected="selected"'; ?>>Commercial Land</option>
					<? } else {
						if($type=='sale')
						{?>
							<option value="Residential" <? if(isset($property) && $property == 'Residential') echo 'selected="selected"'; ?>>Residential</option>
							<option value="Rural" <? if(isset($property) && $property == 'Rural') echo 'selected="selected"'; ?>>Rural</option>
							<option value="Land" <? if(isset($property) && $property == 'Land') echo 'selected="selected"'; ?>>Land</option>
						<? }
						else if($type=='lease')
						{?>
							<option value="Rental" <? if(isset($property) && $property == 'Rental') echo 'selected="selected"'; ?>>Rental</option>
							<option value="Holiday" <? if(isset($property) && $property == 'Holiday') echo 'selected="selected"'; ?>>Holiday</option>
						<? }
					
					} ?>
				 <?php } else {?> 
				 <option value="Business" selected="selected">Business</option>
				 <?} ?>
				 </select>
              </div>
              <!--		dropdown menu end  --> 
            </li>
            <li style="margin:63px 0 5px 0;" class="category">Category</li>
            <li> 
              <!--		dropdown menu  -->
              <div id="category" class="width85 category">
                <?php
                if($page_type!='business')
                {
					
					if($page_type=='commercial')
					{	
						if(isset($commercialCategory) && is_array($commercialCategory)) { } else
						$commercialCategory=array();
						if(isset($property) && ($property))
						foreach ($buy['Commercial'][$property] as $key => $value) {
							$checked = '';
							if(in_array($value, $commercialCategory))
							$checked = 'checked = "checked"';
								
  				          echo '<input type="checkbox" '.$checked.'autocomplete="off" name="category[]" value="'.$value.'" /> '.$value.'<br/>';
						}
					}
					else
					{
						if(isset($category) && is_array($category)) { } else
						$category=array();
						if($type=='sale')
						{
							if(isset($property))
							foreach ($buy['Residential'][$property] as $key => $value) {
							$checked = '';
							if(in_array($value, $category))
							$checked = 'checked = "checked"';
								
  				          echo '<input type="checkbox" '.$checked.'autocomplete="off" name="category[]" value="'.$value.'" /> '.$value.'<br/>';
							}
						}
						else 
						{
							if(isset($holidayCategory) && is_array($holidayCategory)) { } else
							$holidayCategory=array();
							if(isset($property) && ($property))
							foreach ($rent['Residential'][$property] as $key => $value) {
							$checked = '';
							if($property == 'Holiday')
							{
								if(in_array($value, $holidayCategory))
								$checked = 'checked = "checked"';
							}
							else
							{
								if(in_array($value, $category))
								$checked = 'checked = "checked"';
							}
								
							echo '<input type="checkbox" '.$checked.'autocomplete="off" name="category[]" value="'.$value.'" /> '.$value.'<br/>';
							}
						}
					}
                  if(isset($category) && is_array($category))
                  foreach ($category as $key => $value) {	
  				          echo '<input type="checkbox" autocomplete="off" name="category[]" value="'.$value.'" /> '.$value.'<br/>';
                  }
                }
                else
                {
                  $business_category=array('Accommodation/Tourism','Automotive','Beauty/Health','Education/Training','Food/Hospitality','Franchise','Home/Garden','Import/Export/Whole','Industrial/Manufacturing','Leisure/Entertainment','Professional','Retail','Rural','Services','Transport/Distribution');
                  foreach ($business_category as $key=>$value) {
                    $checked="";
                    if(isset($businessCategory))
                    if(in_array($value, $businessCategory))
                      $checked='checked = "checked"';
                    echo '<input type="checkbox" '.$checked.' classAttr="business_category'.$key.'" autocomplete="off" name="category[]" class="category" value="'.$value.'" /> '.$value.'<br/>';
                  }
                }

                ?>
              </div>
              <!--		dropdown menu end  --> 
            </li>
          </ul>
        </div>
        <div class="boxex">
          <ul>
            <li>Price</li>
            <li> 
              <input class="txt_width_hieight" type="text" placeholder="$ Min" name="price_min" value="<?php echo $price_min; ?>"  style="color: #285069; font-weight: normal;" />
              <input class="txt_width_hieight" type="text" placeholder="$ Max" name="price_max" value="<?php echo $price_max; ?>" style="color: #285069; font-weight: normal;"/>
              <!--		dropdown menu end  -->
            <? if($page_type == 'business')
            {
              ?>
              <li style="margin:0px 0 17px 0;">Sub  Category</li>
              <!--    dropdown menu  -->
              <div class="dropdown w100 w80 propert_top" >
              <div class="dropdown-text dd_fonts" style="visibility:hidden;">Bedroom</div>
			  <div id="sub_category" class="width95">
                  <?
                  if(isset($businessCategory))
                  {
					  if(isset($sub_category) && is_array($sub_category)) { } else $sub_category=array();
					  $i=0;
					  foreach($businessCategory as $businessvalue)
					  {
						  foreach($buy['Business'][$businessvalue] as $business_subcategory)
						  {
							  $checked = '';
							  if(in_array($business_subcategory,$sub_category))
							  $checked = 'checked = "checked"';
							  echo '<span class="business_category'.$i.'"><input name="sub_category[]" class="sub_category_margin" '.$checked.'type="checkbox" value="'.$business_subcategory.'" />'.$business_subcategory.'</br></span>';
						  }
						  $i++;
					  }
				  }				  
                   ?>
				</div>
              </div>
              <!--    dropdown menu  -->
              <input class="return_bussi" type="text" name="return" value="<? echo (isset($return))?$return:''; ?>"/>
              <span class="return_pa">% Return (p.a)</span>
            <?
            }
            else
            {
			 if($page_type == 'residential') 
			{?>
              <li style="margin:0px 0 17px 0;" class="bedroom" >Bedroom</li>
              <!--    dropdown menu  -->
              <div class="dropdown w100 w59 propert_top bedroom">
              <div class="dropdown-text dd_fonts" style="visibility:hidden;">Bedroom</div>
                <select class="dropdown-text dd_fonts" name="bedroom">
                  <option value="">Any</option>
                  <? for($i=1; $i<10; $i++) { echo '<option value="'.$i.'"'; if($i == $bedroom)echo 'selected = "selected"'; echo '>'.$i.'</option>'; ?> <? } ?>
                </select>
              </div>
            <?
			}
            }
            ?>
            <li>
            <div class="boxex width22">
              <ul>
              </ul>
            </div>
            </li>
          </ul>
        </div>
        <div class="boxex width9">
			<p id="error_msg">
			</p>
          <p class="serh_box">
            <input id="search" class="serch_box" type="submit" name="search" value="Search">
          </p>
			<? if($page_type != 'business') 
			{?>
			  <p class="more_srh" id="moresearch">More Search Option</p>
			<? } ?>
        </div>
      </div>
      <div class="clearall"></div>
      <!--		Less Search Option End --> 
      
      <!--		More Search Option  -->      
      <div class="width_90">
        <div class="boxex width9">
          <p style="visibility:hidden;" class="color_orange">Search</p>
        </div>
        <div class="boxex width9">
          <ul style="visibility:hidden;">
            <li style="margin:45px 0 0 0;">
              <input type="radio" name="sale_type" checked="checked" disabled="true" />
              Buy</li>
            <li style="margin: 25px 0 0 0;">
              <input type="radio" name="sale_type" disabled="true" />
              Sale</li>
          </ul>
        </div>
        <? if($page_type == 'residential') 
			{
		?>
        <div class="boxex moresearch width14">
          <ul>
            <li>Bathroom</li>
            <li> 
              <!--		dropdown menu  -->
              <div class="dropdown width84 propert_top">
                <div class="dropdown-text dd_fonts" style="visibility:hidden;">Bathroom</div>
                <!--<ul class="dropdown-content">
                  <li><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                </ul>-->
                <select class="dropdown-text dd_fonts moreinput" autocomplete="off" name="bathroom">
                <option value="">Any</option>
                  <? for($i=1; $i<10; $i++) { echo '<option value="'.$i.'"'; if($i == $bathroom)echo 'selected = "selected"'; echo '>'.$i.'</option>'; ?> <? } ?>
              </select>
              </div>
              <!--		dropdown menu end  --> 
            </li>
          </ul>
        </div>
        <? } 
        else
        {?>
        <div class="boxex moresearch width13">
          <ul>
            <li>Energy Efficiency</li>
            <li> 
              <!--    dropdown menu  -->
              <div class="dropdown width84 propert_top">
                <div class="dropdown-text dd_fonts" style="visibility:hidden;">Car Ports</div>
                <select class="dropdown-text dd_fonts moreinput" autocomplete="off" name="energyRating">
                  <option value="">Any</option>
                  <? for($i=1; $i<10; $i++) { echo '<option value="'.$i.'"'; if($i == $energyRating)echo 'selected = "selected"'; echo '>'.$i.'</option>'; ?> <? } ?>
                </select>
              </div>
              <!--    dropdown menu end  --> 
            </li>
          </ul>
        </div>
        <? } ?>
        <div class="boxex moresearch width13">
          <ul>
            <li>Car Ports</li>
            <li> 
              <!--		dropdown menu  -->
              <div class="dropdown width84 propert_top">
                <div class="dropdown-text dd_fonts" style="visibility:hidden;">Car Ports</div>
                <!--<ul class="dropdown-content">
                  <li><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                </ul>-->
                <select class="dropdown-text dd_fonts moreinput" autocomplete="off" name="carport">
                  <option value="">Any</option>
                  <? for($i=1; $i<10; $i++) { echo '<option value="'.$i.'"'; if($i == $carport)echo 'selected = "selected"'; echo '>'.$i.'</option>'; ?> <? } ?>
                </select>
              </div>
              <!--		dropdown menu end  --> 
            </li>
          </ul>
        </div>
        <? if($page_type == 'residential') 
			{?>
        <div class="boxex moresearch width14">
          <ul>
            <li>Garages</li>
            <li> 
              <!--		dropdown menu  -->
              <div class="dropdown w100 propert_top">
                <div class="dropdown-text dd_fonts" style="visibility:hidden;">Garages</div>
                <!--<ul class="dropdown-content">
                  <li><a href="#">Garages 1</a></li>
                  <li><a href="#">Garages 2</a></li>
                  <li><a href="#">Garages 3</a></li>
                </ul>-->
                <select class="dropdown-text dd_fonts moreinput" name="garage" autocomplete="off">
                  <option value="">Any</option>
                  <? for($i=1; $i<10; $i++) { echo '<option value="'.$i.'"'; if($i == $garage)echo 'selected = "selected"'; echo '>'.$i.'</option>'; ?> <? } ?>
                </select>
              </div>
              <!--		dropdown menu end  --> 
            </li>
          </ul>
        </div>
        <? } ?>
        <? if($page_type == 'residential' || $page_type == 'commercial') 
		{?>
        <div id="area" class="boxex moresearch width18 ">
          <ul>
            <li>Area </li>
            <li> 
              <!--		dropdown menu  -->
              <input class="area_txt_width_hieight moreinput" placeholder="Min" autocomplete="off" type="text" class="amount" value="<?php echo $area_min; ?>" name="area_min" style="border: 0; color: #285069; font-weight: normal;" />
              <input class="area_txt_width_hieight moreinput" placeholder="Max" autocomplete="off"  type="text" class="amount" value="<?php echo $area_max; ?>" name="area_max" style="border: 0; color: #285069; font-weight: normal;" />
              <div class="slider-range"></div>
              <!--		dropdown menu end  --> 
            </li>
          </ul>
        </div>
        <? } ?>
      </div>      
      <!--		More Search Option End -->
    </form>
    <!-- search end --> 
  </div>
</div>
<div class="comm_resi_header_top width_1060">
  <h1><a href="<?php echo base_url(); ?>"><img class="inner_plogo" src="<?php echo base_url('assets/images/logo.png'); ?>" alt="samaras one logo" title="samaras one"/></a> </h1>
  <h5 class="page_name"><p><?php echo ucwords($page_type); ?></p></h5>
 </div>
 
<!-- container -->
<?php 
if(isset($result)) {
	if($page_type=='business') 
	$this->load->view('result_two', $data['result']=$result);
	else
	$this->load->view('result_one', $data['result']=$result);
     } ?>

<!-- header end --> 
<script type="text/javascript" src="<?php echo base_url($this->config->item('path_js_file').'jquery.multiselect.js');?>"></script> 
<script type="text/javascript" src="<?php echo base_url($this->config->item('path_js_file').'prettify.js');?>"></script> 
<script type="text/javascript" src="<?php echo base_url($this->config->item('path_js_file').'searchnew.js');?>"></script> 
<script type="text/javascript">
$(function(){

	$(".multi-select").multiselect({
		selectedList: 2
	});
	
});
</script> 


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

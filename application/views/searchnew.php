
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
              <input value="sale" class="radio" autocomplete="off" type="radio" name="type" <?php if($type=='sale') echo 'checked="checked"'; ?> />
              Buy
            </li>
            <li style="margin: 25px 0 0 0;">
              <input value="lease" class="radio" autocomplete="off" type="radio" name="type" <?php if($type=='lease') echo 'checked="checked"'; ?> />
              <?php if($page_type=='residential') echo 'Rent'; else echo 'Lease'; ?>
            </li>
          </ul>
        </div>
        <div class="boxex">
          <ul>
            <li>Region</li>
            <li> 
              <!--		dropdown menu  -->
              <div class="dropdown width84">
                <input class="dropdown-toggle" type="text">
                <div class="dropdown-text dd_fonts">Select</div>
                <ul class="dropdown-content">
                  <li>Region 1</li>
                </ul>
              </div>
              <!--		dropdown menu end  --> 
            </li>
            <li style="margin:63px 0 5px 0;">Suburb</li>
            <li> 
              <!--		dropdown menu  -->
              <select name="suburb[]" class="multi-select" multiple="multiple" style="width:232px;" size="8">
                <option value="">Any Suburb</option>
              </select>
              
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
                <input class="dropdown-toggle" type="text">
                <div class="dropdown-text dd_fonts" style="visibility:hidden;">Select</div>
				<?php if($page_type!='business') { ?>
                <select class="dropdown-text dd_fonts" name="property" id="property" autocomplete="off">
									<option value="<?=$property;?>"><? if($property) echo $property; else echo 'Select'; ?></option>
                  <?php if($page_type=='commercial') { ?>
                  <option value="Commercial">Commercial</option>
                  <option value="commercialLand">Commercial Land</option>
                  <?php } ?>
                </select>
				 <?php } else {?> 
				 <select class="dropdown-text dd_fonts" name="property" id="property">
				 <option value="Business">Business</option>
				 </select>
				 <?} ?>
              </div>
              <!--		dropdown menu end  --> 
            </li>
            <li style="margin:63px 0 5px 0;">Category</li>
            <li> 
              <!--		dropdown menu  -->
              <div id="category" class="width85">
                <?php
                if($page_type!='business')
                {
                  if($category)
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
              <input class="txt_width_hieight" type="text" name="price_min" value="<?php echo $price_min; ?>"  style="color: #285069; font-weight: normal;" />
              <input class="txt_width_hieight" type="text" name="price_max" value="<?php echo $price_max; ?>" style="color: #285069; font-weight: normal;"/>
              <!--		dropdown menu end  -->
            <? if($page_type == 'business')
            {
              ?>
              <li style="margin:0px 0 17px 0;">Sub  Category</li>
              <!--    dropdown menu  -->
              <div class="dropdown w100 propert_top" >
              <input class="dropdown-toggle" type="text">
              <div class="dropdown-text dd_fonts" style="visibility:hidden;">Bedroom</div>
			  <div id="sub_category" class="width85">
                  <?
                  if(is_array($sub_category)) {
                  foreach ($sub_category as $value) {
                    echo '<span ><input type="checkbox" value="'.$value.'" checked = "checked" />'.$value.'</br></span>';
                  }} ?>
				</div>
              </div>
            <?
            }
            else
            {?>
              <li style="margin:0px 0 17px 0;">Bedroom</li>
              <!--    dropdown menu  -->
              <div class="dropdown w100 propert_top">
              <input class="dropdown-toggle" type="text">
              <div class="dropdown-text dd_fonts" style="visibility:hidden;">Bedroom</div>
                <select class="dropdown-text dd_fonts" name="bedroom">
                  <option value="">Any</option>
                  <? for($i=1; $i<10; $i++) { echo '<option value="'.$i.'"'; if($i == $bedroom)echo 'selected = "selected"'; echo '>'.$i.'</option>'; ?> <? } ?>
                </select>
              </div>
            <?
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
          <p class="more_srh"><a href="#">More Search Option</a></p>
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
        <div class="boxex width14">
          <ul>
            <li>Bathroom</li>
            <li> 
              <!--		dropdown menu  -->
              <div class="dropdown width84 propert_top">
                <input class="dropdown-toggle" type="text">
                <div class="dropdown-text dd_fonts" style="visibility:hidden;">Bathroom</div>
                <!--<ul class="dropdown-content">
                  <li><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                </ul>-->
                <select class="dropdown-text dd_fonts" name="bathroom">
                <option value="">Any</option>
                  <? for($i=1; $i<10; $i++) { echo '<option value="'.$i.'"'; if($i == $bathroom)echo 'selected = "selected"'; echo '>'.$i.'</option>'; ?> <? } ?>
              </select>
              </div>
              <!--		dropdown menu end  --> 
            </li>
          </ul>
        </div>
        <div class="boxex width13">
          <ul>
            <li>Energy Efficiency</li>
            <li> 
              <!--    dropdown menu  -->
              <div class="dropdown width84 propert_top">
                <input class="dropdown-toggle" type="text">
                <div class="dropdown-text dd_fonts" style="visibility:hidden;">Car Ports</div>
                <select class="dropdown-text dd_fonts" name="energyRating">
                  <option value="">Any</option>
                  <? for($i=1; $i<10; $i++) { echo '<option value="'.$i.'"'; if($i == $energyRating)echo 'selected = "selected"'; echo '>'.$i.'</option>'; ?> <? } ?>
                </select>
              </div>
              <!--    dropdown menu end  --> 
            </li>
          </ul>
        </div>
        <div class="boxex width13">
          <ul>
            <li>Car Ports</li>
            <li> 
              <!--		dropdown menu  -->
              <div class="dropdown width84 propert_top">
                <input class="dropdown-toggle" type="text">
                <div class="dropdown-text dd_fonts" style="visibility:hidden;">Car Ports</div>
                <!--<ul class="dropdown-content">
                  <li><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                </ul>-->
                <select class="dropdown-text dd_fonts" name="carport">
                  <option value="">Any</option>
                  <? for($i=1; $i<10; $i++) { echo '<option value="'.$i.'"'; if($i == $carport)echo 'selected = "selected"'; echo '>'.$i.'</option>'; ?> <? } ?>
                </select>
              </div>
              <!--		dropdown menu end  --> 
            </li>
          </ul>
        </div>
        <div class="boxex width14">
          <ul>
            <li>Garages</li>
            <li> 
              <!--		dropdown menu  -->
              <div class="dropdown w100 propert_top">
                <input class="dropdown-toggle" type="text">
                <div class="dropdown-text dd_fonts" style="visibility:hidden;">Garages</div>
                <!--<ul class="dropdown-content">
                  <li><a href="#">Garages 1</a></li>
                  <li><a href="#">Garages 2</a></li>
                  <li><a href="#">Garages 3</a></li>
                </ul>-->
                <select class="dropdown-text dd_fonts" name="garage">
                  <option value="">Any</option>
                  <? for($i=1; $i<10; $i++) { echo '<option value="'.$i.'"'; if($i == $garage)echo 'selected = "selected"'; echo '>'.$i.'</option>'; ?> <? } ?>
                </select>
              </div>
              <!--		dropdown menu end  --> 
            </li>
          </ul>
        </div>
        <div class="boxex width14">
          <ul>
            <li>Area </li>
            <li> 
              <!--		dropdown menu  -->
              <input class="area_txt_width_hieight" type="text" class="amount" value="<?php echo $area_min; ?>" name="area_min" style="border: 0; color: #285069; font-weight: normal;" />
              <input class="area_txt_width_hieight"  type="text" class="amount" value="<?php echo $area_max; ?>" name="area_max" style="border: 0; color: #285069; font-weight: normal;" />
              <div class="slider-range"></div>
              <!--		dropdown menu end  --> 
            </li>
          </ul>
        </div>
      </div>      
      <!--		More Search Option End -->
    </form>
    <!-- search end --> 
  </div>
</div>
<div class="comm_resi_header_top width_1060">
  <h1><a href="<?php echo base_url(); ?>"><img class="inner_plogo" src="<?php echo base_url('assets/images/logo.png'); ?>" alt="samaras one logo" title="samaras one"/></a> </h1>
  <h5 class="page_name"><a href="#"><?php echo ucwords($page_type); ?></a></h5>
 </div>

<!-- container -->
<?php if(isset($result)) { ?>
<div class="container border_img">
  <div class="conti_border">
    <p class="color_orange">North Shore <span></span></p>
    <?php 
              foreach ($result as $row) { ?>
    <div class="s_img_boxes_commer">
      <div class="search_img"> <img class="inner_plogo" src="<?php echo base_url('assets/images/s_img1.jpg'); ?>"/> </div>
      <div class="content_commer">
        <h3><?php echo $row->headline; ?>,</h3>
        <h4><?php echo $row->suburb.'<br />'.$row->price; ?></h4>
        <p class="cnt"><?php echo $row->description; ?></p>
        <p class="fleft">Available area from <span>837m2 - 938 m2</span></p>
        <a class="fright" href="#">More</a> </div>
    </div>
    <?php } ?>
    
    <!--       	<div class="s_img_boxes_commer">
              	<div class="search_img">
               	 <img class="inner_plogo" src="<?php echo base_url('assets/images/s_img1.jpg'); ?>"/>
                </div>
                <div class="content_commer">
                  <h3>110 Albert Avenue,</h3>
                  <h4>Chatswood</h4>
                  <p class="cnt">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer hendrerit elementum est, ac accumsan
                  justo. Morbi tristique lorem viverra odio feugiat, at semper nisi aliquam. Nunc lacinia placerat ipsum.
                  Proin ac molestie dui. Maecenas lacinia sollicitudin bibendum. Curabitur suscipit quam vitae elit accumsan, 
                  vel vulputate felis gravida. Curabitur tempor nulla sed venenatis condimentum.</p>
                  <p class="fleft">Available area from <span>837m2 - 938 m2</span></p>
                  <a class="fright" href="#">More</a>
                 </div>
              </div>
      
          </div>
 			  <!-- container --> 
    
    <!-- Next Menu -->
    <div class="clearall"></div>
    <div class="pagenation">
      <ul>
        <?php echo $this->pagination->create_links(); ?>
      </ul>
    </div>
    
    <!-- <div class="next_menu">
        	<ul>
        		<li class="previous_img previous"><a href="#">Previous</a></li>
          	<li class="center" ><a  href="#">&nbsp;</a></li>
          	<li class="active"><a  href="#">&nbsp;</a></li>
          	<li class="next_img next"><a  href="#">Next</a></li>
          </ul>
        </div>--> 
    
    <!-- Next end -->
    <?php } ?>
    <div class="clearall"></div>
  </div>
</div>
</div>
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
<script type="text/javascript">
/*
	Custom checkbox and radio button - Jun 18, 2013
	(c) 2013 @ElmahdiMahmoud 
	license: http://www.opensource.org/licenses/mit-license.php
*/   
/*$('input[type="radio"]').wrap('<div class="radio-btn"><i></i></div>');
$(".radio-btn").on('click', function () {
    var _this = $(this),
        block = _this.parent().parent();
    block.find('input:radio').attr('checked', false);
    block.find(".radio-btn").removeClass('checkedRadio');
    _this.addClass('checkedRadio');
    _this.find('input:radio').attr('checked', true);
});*/
</script> 
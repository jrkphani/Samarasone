<body>
	<div class="wrapper">
 	 <div class="wrapper_bg">
   	<div class="wrapper_white_bg"></div>
   	<div class="wrapper_gradient_bg">
    </div>
  	<div class="inner_pheader border_img">
      <!-- search box -->
     <div class="search_box">
     <form name="form1" method="post" action="<?php echo base_url('search/result'); ?>">
			<div class="width_90">
      	<div class="boxex width9">
        	<p class="color_orange">Search</p>
        </div>
      	<div class="boxex width9">
          	<ul>
            	<li><input type="radio" name="radio-btn" <?php if($sale_type=='buy') echo 'checked="checked"'; ?> checked="checked" disabled="true" />Buy</li>
              <li style="margin: 15px 0 0 0;"><input type="radio" name="radio-btn" <?php if($sale_type=='rent') echo 'checked="checked"'; ?> disabled="true" />Sale</li>
            </ul>
        </div>
      	<div class="boxex">
          	<ul>
            	<li>Suburb</li>
              <li>
          <!--		dropdown menu  -->


		<select name="example-list" multiple="multiple" style="width:232px;" multiple name="suburb[]" size="8">
    <option value="" <?php if($suburb[0]==NULL) echo 'selected="selected"'; ?>>Any Suburb</option>

    <?php foreach ($result as $row)
		{//echo '<option value="'.$row->suburb.'">'.$row->suburb.'</option>';?>
			<option value="<?php echo $row->suburb; ?>" <?php if(is_array($suburb) && in_array($row->suburb,$suburb)) echo 'selected="selected"'; ?>><?php echo $row->suburb; ?></option>
		<?php }
		?>
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
		<select name="example-list type[]" multiple="multiple" style="width:232px;" size="10">
		<option value="" <?php if($type[0]==NULL) echo 'selected="selected"'; ?>>Any Property Type</option>
		<option value="House" <?php if(is_array($type) && in_array('House',$type)) echo 'selected="selected"'; ?>>House</option>
		<option value="Unit" <?php if(is_array($type) && in_array('Unit',$type)) echo 'selected="selected"'; ?>>Unit</option>
		<option value="Townhouse" <?php if(is_array($type) && in_array('Townhouse',$type)) echo 'selected="selected"'; ?>>Townhouse</option>
		<option value="Villa" <?php if(is_array($type) && in_array('Villa',$type)) echo 'selected="selected"'; ?>>Villa</option>
		<option value="Apartment" <?php if(is_array($type) && in_array('Apartment',$type)) echo 'selected="selected"'; ?>>Apartment</option>
		<option value="Flat" <?php if(is_array($type) && in_array('Flat',$type)) echo 'selected="selected"'; ?>>Flat</option>
		<option value="Studio" <?php if(is_array($type) && in_array('Studio',$type)) echo 'selected="selected"'; ?>>Studio</option>
		<option value="Warehouse" <?php if(is_array($type) && in_array('Warehouse',$type)) echo 'selected="selected"'; ?>>Warehouse</option>
		<option value="DuplexSemi" <?php if(is_array($type) && in_array('DuplexSemi',$type)) echo 'selected="selected"'; ?>>DuplexSemi-detached</option>
		<option value="Alpine" <?php if(is_array($type) && in_array('Alpine',$type)) echo 'selected="selected"'; ?>>Alpine</option>
		<option value="AcreageSemi-rural" <?php if(is_array($type) && in_array('AcreageSemi-rural',$type)) echo 'selected="selected"'; ?>>AcreageSemi-rural</option>
		<option value="BlockOfUnits" <?php if(is_array($type) && in_array('BlockOfUnits',$type)) echo 'selected="selected"'; ?>>BlockOfUnits</option>
		<option value="Terrace" <?php if(is_array($type) && in_array('Terrace',$type)) echo 'selected="selected"'; ?>>Terrace</option>
		<option value="Retirement" <?php if(is_array($type) && in_array('Retirement',$type)) echo 'selected="selected"'; ?>>Retirement</option>
		<option value="ServicedApartment" <?php if(is_array($type) && in_array('ServicedApartment',$type)) echo 'selected="selected"'; ?>>ServicedApartment</option>
		<option value="Other" <?php if(is_array($type) && in_array('Other',$type)) echo 'selected="selected"'; ?>>Other</option>
		</select>
          <!--		dropdown menu end  -->  
              </li>
            </ul>
        </div>
      	<div class="boxex">
          	<ul>
            	<li>Price</li>
              <li>
          <!--		dropdown menu  -->
          <select name="example-list price_from" multiple="multiple" style="width:232px;">
          <option value="" <?php if($price_from==NULL) echo 'selected="selected"'; ?>>Price from</option>
          <option value="100000" <?php if($price_from=='100000') echo 'selected="selected"'; ?>>100000</option>
          <option value="250000" <?php if($price_from=='250000') echo 'selected="selected"'; ?>>250000</option>
          <option value="1500000" <?php if($price_from=='1500000') echo 'selected="selected"'; ?>>1500000</option>
          </select>
          <!--		dropdown menu end  --> 
              </li>
            </ul>
        </div>
      	<div class="boxex width22">
          	<ul>
            	<li>Title</li>
              <li style="">
          <!--		dropdown menu  -->
              <div class="dropdown w100">
		<select name="example-list bedroom" multiple="multiple" style="width:232px;">
		<option value="" <?php if($bedroom==NULL) echo 'selected="selected"'; ?>>Bedroom</option>
		<?php for($i=0;$i<=5;$i++) { ?>
		<option value="<?php echo $i; ?>" <?php if($bedroom!=NULL && $bedroom==$i) echo 'selected="selected"'; ?>><?php echo $i; ?></option>
		<?php } ?>
		</select>
              </div>
          <!--		dropdown menu end  --> 
          <!--		dropdown menu  -->
              <div class="dropdown w100">
              
	<select name="garage">
		<option value="" <?php echo $garage; if($garage==NULL) echo 'selected="selected"'; ?>>Garages</option>
		<?php for($i=0;$i<=25;$i++) { ?>
		<option value="<?php echo $i; ?>" <?php if($garage!=NULL && $garage==$i) echo 'selected="selected"'; ?>><?php echo $i; ?></option>
		<?php } ?>
	</select>
              </div>
          <!--		dropdown menu end  --> 
              </li>
            </ul>
        </div>
      	<div class="boxex width9">
       	 <p><input class="serch_box" type="submit" name="search" value="Search"></p>        
      </div>
     </div>
     </form>
     <!-- search end -->	
		</div>
  </div>
    	<div class="comm_resi_header_top width_1060">   
      	<h1><a href="#"><img class="inner_plogo" src="<?php echo base_url('assets/images/logo.png'); ?>" alt="samaras one logo" title="samaras one"/></a>   </h1>
        <h5 class="page_name"><a href="#">COMMERCIAL</a></h5>
      	<a class="inner_pmenu" href="#"></a>
        <h6><a class="inner_smenu" href="#"></a></h6>
        <a class="inner_search_icon" href="#"><span>Find a Property</span></a>
      </div> 
      
        <!-- container -->     
          <div class="container">
						<p class="color_orange">North Shore <span></span></p> 
              <?php foreach ($result2 as $row2) { ?>        
            	<div class="s_img_boxes_commer">
              	<div class="search_img">
               	 <img class="inner_plogo" src="<?php echo base_url('assets/images/s_img1.jpg'); ?>"/>
                </div>
                <div class="content_commer">
                  <h3><?php echo $row2->headline; ?>,</h3>
                  <h4><?php echo $row2->suburb.'<br />'.$row2->price; ?></h4>
                  <p class="cnt"><?php echo $row2->description; ?></p>
                  <p class="fleft">Available area from <span>837m2 - 938 m2</span></p>
                  <a class="fright" href="#">More</a>
                 </div>
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
            	<div class="s_img_boxes_commer">
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
            	<div class="s_img_boxes_commer">
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
            	<div class="s_img_boxes_commer">
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
              </div>   -->       
          </div>
 			  <!-- container -->
        
 			  <!-- Next Menu -->
        <div class="clearall"></div>
        <div class="next_menu">
        	<ul>
        		<li class="previous_img"><a class="previous" href="#">Previous</a></li>
          	<li><a class="center" href="#">&nbsp;</a></li>
          	<li><a class="active" href="#">&nbsp;</a></li>
          	<li class="next_img"><a class="next" href="#">Next</a></li>
          </ul>
        </div>
        
 			  <!-- Next end -->
        
			<div class="clearall"></div>
     </div>
    </div>
<!-- header end --> 

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script>


<script type="text/javascript" src="<?php echo base_url($this->config->item('path_js_file').'jquery.multiselect.js');?>"></script>

<script type="text/javascript" src="<?php echo base_url($this->config->item('path_js_file').'prettify.js');?>"></script>
<script type="text/javascript">
$(function(){

	$("select").multiselect({
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
$('input[name="radio-btn"]').wrap('<div class="radio-btn"><i></i></div>');
$(".radio-btn").on('click', function () {
    var _this = $(this),
        block = _this.parent().parent();
    block.find('input:radio').attr('checked', false);
    block.find(".radio-btn").removeClass('checkedRadio');
    _this.addClass('checkedRadio');
    _this.find('input:radio').attr('checked', true);
});
</script>

    	<div class="comm_resi_header_top width_1060">   
      	<h1><a href="<?php echo base_url(''); ?>"><img class="inner_plogo" src="<?php echo base_url('assets/images/logo.png'); ?>" alt="samaras one logo" title="samaras one"/></a>   </h1>
        <h5 class="page_name"><p>Commercial</p></h5>
        <h6><a class="inner_smenu" href=""></a></h6>
        <a class="inner_search_icon" href="<?php echo base_url('search/index/commercial'); ?>"><span>Find a Property</span></a>
      
      </div>      
    	<div class="header_res_btm width_1060">   
<!--    	<h1>“ The home should be the treasure chest of living. ”<br /><span>Le Corbusier</span></h1>
        <h6></h6>-->
        <h2>Commercial</h2>   
      </div>
   
<!-- header end --> 
  <div class="body_cnt">

<?php echo $content; ?>

 </div>
  <div class="res_img_container">
	<ul id="scroller">
		<?
		$i=0; 
		foreach($image as $img)
		{?>
			<li class="buzzbutton"><a  href="#" title="<?=$headline[$i];?>"><img src="<?=$img?>" height="383" alt="<?=$headline[$i];?>" /><span class="some-element"><?=$headline[$i];?></span></a></li>
		<?
		$i++;
		}?>
	</ul>
  </div>
  <form>
  </form>
  <div class="clearall"></div>
<div class="push"></div>
</div>
  <!-- bottom slider js -->
  <script src="<?php echo base_url($this->config->item('path_js_file').'jquery.simplyscroll.min.js');?>"></script>
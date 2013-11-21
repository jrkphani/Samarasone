<div class="container border_img">
  <div class="conti_border">
    <p class="color_orange">North Shore <span></span></p>
    <?php 
              foreach ($result as $row) {
				  //if((isset($row->images)) && ($row->images))
				  if(0)
				  {
					  $imagelist = unserialize($row->images);
				  }
				  else
				  {
					  $imagelist['url']= base_url('assets/images/s_img1.jpg');
				  }
				   ?>
    <div class="s_img_boxes_commer">
      <div class="search_img"> <img class="inner_plogo" src="<?php echo $imagelist['url']; ?>"/> </div>
      <div class="content_commer">
        <h3><?php echo $row->headline; ?>,</h3>
        <h4><?php echo $row->suburb.'<br />'.$row->price; ?></h4>
        <p class="cnt"><?php echo $row->description; ?></p>
        <? if(isset($row->area))
        {?>
			<p class="fleft">Available area <span><?=$row->area; ?></span></p>
		<?}else if(isset($row->area_min)){
			if($row->area_min == $row->area_max)
			{
		?>
			<p class="fleft">Available area from <span><? echo $row->area_min; ?><span></p>
		<? } else {?>
			<p class="fleft">Available area from <span><? echo $row->area_min." - ".$row->area_min; ?><span></p>
		<?}}?>
        <a class="fright" uniqueID="<?=$row->uniqueID;?>" href='<?=base_url("view/index/$page_type/$type/$property/$row->uniqueID");?>'>More</a> </div>
    </div>
    <?php } ?>
    <div class="clearall"></div>
    <div class="pagenation">
      <ul>
        <?php echo $this->pagination->create_links(); ?>
      </ul>
    </div>
        <div class="clearall"></div>
  </div>
</div>
</div>
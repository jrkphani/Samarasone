<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="">
<meta name="keywords" content="" />
<title>Samaras One</title>

<link rel="stylesheet" type="text/css" href="<?php echo base_url($this->config->item('path_css_file')."style.css"); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url($this->config->item('path_css_file')."inner_pages.css"); ?>" />
<link rel="icon" href="<?=base_url("assets/images/favicon.ico")?>"/>
</head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script type="text/javascript">
  var baseurl = "<?php print base_url(); ?>";
</script>
<?php 
$page = $this->uri->segment(1); 
$subpage = $this->uri->segment(2);?>

<body>
	<div class="wrapper">
		    <? if($page!= 'admin' && $page!= 'login') { ?>
				
				<? if($page =='' || $page =='home')
				{?>
					<div  id="menu_logo" class="home_menu_logo"></div>
					<div id="mainmenu" class="home_mainmenu" style="display:none;">
						<ul>
						  <li class="mainmenu_top_bg"></li>
						</ul>
						<ul class="menu_bg">
							<li class="residential"><a href="<?php echo base_url('residential'); ?>">Residential</a></li>
							<li class="commercial"><a href="<?php echo base_url('commercial'); ?>">Commercial</a></li>
							<li class="business"><a href="<?php echo base_url('business'); ?>">Business</a></li>
						</ul>
					</div>
				<?}
				else
				{?>
					<div  id="menu_logo" class="menu_logo"></div>
					<div id="mainmenu" class="mainmenu" style="display:none;">
					<ul>
					  <li class="menu_top_bg"></li>
					</ul>
					<ul class="menu_bg">
						<? 
						if($page =='search' || $page =='view') 
						{
							$slidepage = ($this->uri->segment(3))?$this->uri->segment(3):'residential';
							
						}
							 else 
						{
							$slidepage =$page;
						}
						?>
						
						<li class="ovalue"><a href="<?php echo base_url($slidepage.'/ourvalueproposition'); ?>">Our Value Proposition</a></li>
						<li class="oteam"><a href="<?php echo base_url($slidepage.'/ourteam'); ?>">Our Team</a></li>
						<li class="contact"><a href="<?php echo base_url($slidepage.'/contact'); ?>">Contact</a></li>
					</ul>
					
					<ul class="menu_bg bg_border">
						<li class="inner_logo"><a href="<?php echo base_url(); ?>">Samaras One Home</a></li>
					</ul>
					<ul class="menu_bg">
						<?
						if($slidepage!='business') { ?><li class="residential"><a href="<?php echo base_url('residential'); ?>">Residential</a></li>
						<li class="commercial"><a href="<?php echo base_url('commercial'); ?>">Commercial</a></li><? } else {?>
						<li class="business"><a href="<?php echo base_url('business'); ?>">Business</a></li><? }?>
					</ul>
				  </div>
				<?}
				 if(($page != 'view') && ($page != 'search')) 
				{
					$imageslist = array('slide1.jpg','slide2.jpg','slide3.jpg','slide4.jpg','slide5.jpg','slide11.jpg','slide7.jpg','slide8.jpg','slide10.jpg','slide6.jpg');
					if($page == 'residential')
					$imageslist = array('slide2.jpg','slide16.jpg','slide19.jpg','slide3.jpg','slide6.jpg','slide21.jpg','slide11.jpg');
					if($page == 'commercial')
					$imageslist = array('slide14.jpg','slide7.jpg','slide22.jpg','slide1.jpg','slide15.jpg','slide4.jpg');
					if($page == 'business')
					$imageslist = array('slide18.jpg','slide22.jpg','slide20.jpg','slide15.jpg','slide10.jpg','slide17.jpg');
				?>
				<div id="slides">
					<?
					foreach($imageslist as $img)
					{
						// echo '<img src="'.base_url("assets/images/$img").'">';
						echo '<div class="slidex" style="background:url('.base_url("assets/images/$img").') no-repeat center center; background-size: cover;"></div>';
					}
					?>
				</div>
        <?
				}
			}
				?>


	<?
	if($page == 'admin')
	{?>
		<!-- admin header -->
		<div class="comm_resi_header_top width_1060">   
			<h1><a href="<?php echo base_url(''); ?>"><img class="inner_plogo" src="<?php echo base_url('assets/images/logo.png'); ?>" alt="samaras one logo" title="samaras one"/></a></h1>          
		</div>
	<?}
	$session_data = $this->session->userdata('logged_in');
	if($session_data)
	{ 
		echo "<h1 class='admin_header'>Hello Admin </h1> <p class='admin_calign'><a href='".base_url('admin/logout')."'>Logout</a></p></li>";
		//echo "Hello ".$session_data['email']." <a href='".base_url('admin/logout')."'>Logout</a></li>";
	} ?>
		


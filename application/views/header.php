<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="">
<meta name="keywords" content="" />
<title>Samaras One</title>

<link rel="stylesheet" type="text/css" href="<?php echo base_url($this->config->item('path_css_file')."style.css"); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url($this->config->item('path_css_file')."inner_pages.css"); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url($this->config->item('path_css_file')."jquery.simplyscroll.css"); ?>" />

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
    <div  id="menu_logo" class="<?php if($page =='' || $page =='home') { echo ''; } else { echo 'menu_logo'; } ?>">
    </div>
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
        	<? if($page!='business') { ?><li class="commercial"><a href="<?php echo base_url('commercial'); ?>">Commercial</a></li>
        	<li class="residential"><a href="<?php echo base_url('residential'); ?>">Residential</a></li><? } else {?>
        	<li class="business"><a href="<?php echo base_url('business'); ?>">Business</a></li><? } ?>
        </ul>
      </div>
    	
    	  <?
				 if(($page != 'view') && ($page != 'search')) 
				{
					$imageslist = array('slide1.jpg','slide2.jpg','slide3.jpg','slide4.jpg','slide5.jpg','slide6.jpg','slide7.jpg','slide8.jpg','slide9.jpg','slide10.jpg');
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
	$menus = array(1=>'home',2=>'residential',3=>'commercial',4=>'business',5=>'residential_proposition',6=>'commercial_proposition',7=>'business_proposition',8=>'residential_ourteam',9=>'commercial_ourteam',10=>'business_ourteam',11=>'residential_contact',12=>'commercial_contact',13=>'business_contact');
	$session_data = $this->session->userdata('logged_in');
	 ?>
		
			<?php if($session_data) { ?><?php echo $session_data['email'];?>
		<header class="admin_header">
		<nav>
			<ul>
				<li><a href="<?php echo base_url('admin'); ?>">User List</a></li>
				<li><!-- Edit Page -->
					<ul>
					<?php foreach ($menus as $key => $value) { ?>
						<li><a href="<?php echo base_url('admin/dynamics').'/'.$key; ?>"><?php echo $value; ?></a></li>
					<?php } ?>
					</ul>
				</li>
				<li><a href="<?php echo base_url('login/logout'); ?>">Logout</a></li>
			</ul>
			</nav>
	</header>
			<?php } ?>
		


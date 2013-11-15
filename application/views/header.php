<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="">
<meta name="keywords" content="" />
<title>Samaras One</title>

<link rel="stylesheet" type="text/css" href="<?php echo base_url($this->config->item('path_css_file')."style.css"); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url($this->config->item('path_css_file')."inner_pages.css"); ?>" />

</head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script type="text/javascript">
  var baseurl = "<?php print base_url(); ?>";
</script>
<?php 
$page = $this->uri->segment(1); 
$subpage = $this->uri->segment(2); ?>

<body>
	<div class="wrapper">
  	<div class="wrapper_bg">
  	<div class="header">
    <div  id="menu_logo" class="<?php if($page =='' || $page =='home') { echo 'home_menu_logo'; } else { echo 'menu_logo'; } ?>">
    </div>
    	<div id="mainmenu" class="mainmenu" style="display:none;">
				<ul>
       	  <li class="menu_top_bg"></li>
        </ul>
        <ul class="menu_bg">
        	<!--<li class="home"><a href="<?php echo base_url(); ?>">Home</a></li>-->
        	<li class="ovalue"><a href="#">Our Value Proposition</a></li>
        	<li class="oteam"><a href="#">Our Team</a></li>
        	<li class="contact"><a href="<?php echo base_url('contacts'); ?>">Contact</a></li>
        </ul>
        <ul class="menu_bg bg_border">
        	<li class="inner_logo"><a href="<?php echo base_url(); ?>">Samaras One Home</a></li>
        </ul>
        <ul class="menu_bg">
        	<li class="commercial"><a href="<?php echo base_url('commercial'); ?>">Commercial</a></li>
        	<li class="residential"><a href="<?php echo base_url('residential'); ?>">Residential</a></li>
        	<li class="business"><a href="<?php echo base_url('business'); ?>">Business</a></li>
        </ul>
      </div>
    	
    	  <?
				 if(($page != 'contacts') && ($page != 'search') && ($page != 'searchnew')) 
				{
				?>
        <div class="touchslider">
          <div class="touchslider-viewport" style="width:100%px; height:900px;overflow:hidden;position:relative;">
          <div>
            <div class="touchslider-item"><div class="sl1" > &nbsp;</div> </div>
            <div class="touchslider-item"><div class="sl2" > &nbsp;</div> </div>
            <div class="touchslider-item"><div class="sl3" > &nbsp;</div> </div>
            <div class="touchslider-item"><div class="sl4" > &nbsp;</div> </div>
            <div class="touchslider-item"><div class="sl5" > &nbsp;</div> </div>
            <div class="touchslider-item"><div class="sl6" > &nbsp;</div> </div>
            <div class="touchslider-item"><div class="sl7" > &nbsp;</div> </div>
            <div class="touchslider-item"><div class="sl8" > &nbsp;</div> </div>
            <div class="touchslider-item"><div class="sl9" > &nbsp;</div> </div>
            <div class="touchslider-item"><div class="sl10" > &nbsp;</div> </div>
          </div>
        </div>	
				</div>
        <?
				}
				?>







<header>
	<?
	$menus = array('1' => 'home','2' => 'about', '3' => 'feature');
	$page = $this->uri->segment(1);
	$function = $this->uri->segment(2);
	$register=NULL;
	$session_data = $this->session->userdata('logged_in');
	if($this->uri->segment(3)=='register')
	{
		$register='yes';
	}
	 ?>
		<nav>
			<?php if($session_data) { ?><?php echo $session_data['firstname'];
			if($session_data['role']=='admin') { ?>
			<a href="<?php echo base_url('admin'); ?>">User List</a>&nbsp&nbsp
				<?php foreach ($menus as $key => $value) { ?>
					<a href="<?php echo base_url('admin/dynamics').'/'.$key; ?>"><?php echo $value; ?></a>&nbsp&nbsp
				<?php } ?>
			<?php } ?>
			<a href="<?php echo base_url('login/logout'); ?>">Logout</a>
			<?php } ?>
		</nav>
		
	</header>
	
	<!-- login functionality 

			<?php if($session_data = $this->session->userdata('logged_in')) { ?>
					<div class="span10 headerRight">
						<p>Howdy! <?php echo $session_data['firstname']; ?>&nbsp|&nbsp
							<a href="<?php echo base_url('profile'); ?>">Profile</a>&nbsp|&nbsp
							<?php if($session_data['role']=='user') { ?>
								<a href="<?php echo base_url('home'); ?>">Resume</a>&nbsp|&nbsp
							<?php } else if($session_data['role']=='member') { ?>
								<a href="<?php echo base_url('member/searchresume'); ?>">Search</a>&nbsp|&nbsp
								<a href="<?php echo base_url('member/selectedResume'); ?>">Selected Resume</a>&nbsp|&nbsp
							<?php } else if($session_data['role']=='admin') { ?>
								<a href="<?php echo base_url('admin'); ?>">User List</a>&nbsp|&nbsp
							<?php } ?>
							<a href="<?php echo base_url('login/logout'); ?>">Logout</a>
						</p>
					</div>
					<?php } else { ?>
					
			<?php } ?>
		</div>
	</header>-->
	
	<!-- login functionality end-->



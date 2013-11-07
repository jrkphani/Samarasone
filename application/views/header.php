<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="">
<meta name="keywords" content="" />
<title>Samaras One</title>

<link rel="stylesheet" type="text/css" href="<?php echo base_url($this->config->item('path_css_file')."style.css"); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url($this->config->item('path_css_file')."inner_pages.css"); ?>" />
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
  <script src="<?php echo base_url($this->config->item('path_js_file').'jquery.touchslider.min.js');?>"></script>
		<script>
					jQuery(function($) {
						$(".touchslider").touchSlider({mouseTouch: true, autoplay: true, delay: 3000});
					});
				</script>	
</head>


<script src="<?php echo base_url($this->config->item('path_js_file').'jquery.js');?>"></script>
<script type="text/javascript">
  var baseurl = "<?php print base_url(); ?>";
</script>

<body>
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
			<?php if($session_data) { ?><?php echo $session_data['firstname']; ?>
			<?php /* ?><a href="<?php echo base_url('profile'); ?>" <? if($page =="profile") echo 'class="ezcv_header_current"'; ?> ><?php echo $session_data['firstname']; ?></a><?php */ ?>

			<?php if($session_data['role']=='user') { ?>
			<a href="<?php echo base_url('resume'); ?>" <? if($page =="resume") echo 'class="ezcv_header_current"'; ?> >My Resume</a>
			<a href="<?php echo base_url('mailresume'); ?>" <? if($page =="mailresume") echo 'class="ezcv_header_current"'; ?> >Mail Your Resume</a>
			<?php } else if($session_data['role']=='member') { ?>
			<a href="<?php echo base_url('member/searchresume'); ?>" <? if($page =="member" && $function !="selectedresume") echo 'class="ezcv_header_current"'; ?> >Search Resume</a>
			<a href="<?php echo base_url('member/selectedresume'); ?>" <? if($function =="selectedresume") echo 'class="ezcv_header_current"'; ?> >Selected Resume</a>
			<!--<a href="#">My Recommendations</a>
			<a href="#">Refer Friends</a>
			<a href="#">My Page</a>
			<a href="#">My Portfolio Space</a>
			<a href="#">My Contact List</a>
			<a href="#">Resume On Mobile</a>-->
			<?php } else if($session_data['role']=='admin') { ?>
			<a href="<?php echo base_url('admin'); ?>">User List</a>&nbsp&nbsp
				<?php foreach ($menus as $key => $value) { ?>
					<a href="<?php echo base_url('admin/dynamics').'/'.$key; ?>"><?php echo $value; ?></a>&nbsp&nbsp
				<?php } ?>
			<?php } ?>
			<a href="<?php echo base_url('login/logout'); ?>">Logout</a>
			<?php } /* else {  ?>
			<span><a  href="<?php echo base_url('login/index/register'); ?>" <? if($page =="login" && $register == 'yes') echo 'class="ezcv_header_current"'; ?> >Register</a>
			<a href="<?php echo base_url('login'); ?>" <? if($page =="login" && $register != 'yes') echo 'class="ezcv_header_current"'; ?> >Sign in</a></span>
			<?php } */ ?>
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



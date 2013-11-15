<?php
# inclue the ActiveRecord library
 require_once 'php-activerecord/ActiveRecord.php';

 ActiveRecord\Config::initialize(function($cfg)
 {
  $cfg->set_connections(array('development' =>
    'mysql://root:password@localhost/bcci'));
 });

?>

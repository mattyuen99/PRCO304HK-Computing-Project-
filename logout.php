<?php

include_once( dirname(__FILE__). '/includes/config.php' );

unset($_SESSION['user_id']);

$goto = $website_url . '/login.php';
header ('location: ' . $goto);

?>
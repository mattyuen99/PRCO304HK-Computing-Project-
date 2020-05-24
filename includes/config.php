<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

ob_start();

session_start();

$hosted = 0;

$path_of_this_path = dirname(__FILE__);
$root_dir_path = $path_of_this_path . "/..";

/* DB Configrations */
if($hosted == 0)
{
	// Localhost
	define('HOST','localhost');
	define('USER','root');
	define('PASSWORD','');
	define('DB_NAME','personnel_records');

	
	$website_url = "http://localhost/project";
	
	date_default_timezone_set("Asia/Hong_Kong");
}
else
{
	// Hosted
	define('HOST','');
	define('USER','');
	define('PASSWORD','');
	define('DB_NAME','');

	$website_url = "";
	
	date_default_timezone_set("Asia/Hong_Kong");
}

$connection =  @mysqli_connect(HOST,USER,PASSWORD,DB_NAME);

// Checking connection
if(mysqli_connect_errno())
{
	echo "<center><p style='color:red; margin-top:10%;'>Failed to connect to MySQL Database : " . mysqli_connect_error($connection)." ..... !!</p></center>";
	exit;
}

$current_time_numeric = time();

define( 'PROJECT_NAME', 'Personnel Records' );
define( 'COPYRIGHT_YEAR', '2020' );

$current_url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

?>

<script>
var root_dir_path = "<?php echo str_replace("\\", "/", $root_dir_path); ?>";
var website_url = "<?php echo $website_url; ?>";
</script>
<?php

include_once( dirname(__FILE__). '/includes/config.php' );

// Redirect If some Session Exist
if(isset($_SESSION['user_id']))
{
	$goto = $website_url . '/user/index.php';
	header ('location: ' . $goto);
}

if(isset($_POST['login_submit']))
{
	$email = strtolower($_POST['email']);
	$password = $_POST['password'];
	
	$query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
	$result = mysqli_query($connection,$query);
	$affected_rows = $connection->affected_rows;
	if(!$result)
	{
		echo "Error: " . mysqli_error($connection)." ..... !!";
		exit;
	}
	else if($affected_rows == 0)
	{
		$invalid = true;
	}
	else
	{
		unset($_SESSION['user_id']);
		$row = mysqli_fetch_array($result);
		$_SESSION['user_id'] = $row['auto_id'];
		$_SESSION['type'] = $row['type'];
		$goto = $website_url . '/user/index.php';
		header ('location: ' . $goto);
	}
}

include_once( $root_dir_path . '/includes/above_navbar.php' );

?>

<link rel="stylesheet" href="<?php echo $website_url; ?>/css/login.css">

<br /><br />
<div class="fixed" id="site">
	<div class="clearfix" id="content">
		<div class="DesignSystem">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-3">
						<div class="Content center-block">
							<div class="u-taCenter">
								<h1 style="font-weight:bold; color: #005885;">AccountDB</h1>
								<h2 style="font-weight:bold; color: #005885;">Your Secret Account Manager</h2>
								<hr class="custom_hr_colored_line" />
							</div>
							
							<?php
							if(isset($invalid))
							{
								?>
								<div class="alert alert-danger login-alert u-taCenter u-mt6x">
									<p>Invalid Account or Password.</p>
								</div>
							<?php
							}
							?>
							
							<br />

							<form accept-charset="UTF-8" action="<?php echo $website_url . '/login.php'; ?>" method="post">

								<div class="row" style="margin-top:-30px;">
									<div class="col-xs-12 u-positionRelative u-mt6x u-mb8x">
										
										<div class="form-group">
											<label class="control-label" for="login-modal-email-input">Account:</label>
											<input autofocus="" class="TextInput TextInput--lg TextInput--dark u-mb8x" id="login-modal-email-input" name="email" placeholder="Enter Account ...." type="text" value="<?php echo (!empty($_POST['email'])) ? $_POST['email']: '';?>" required />
										</div>
										
										<div class="form-group" style="margin-top:-20px;">
											<label class="control-label" for="login-modal-password-input">Password:</label>
											<div class="u-floatRight"></div>
											<input class="TextInput TextInput--lg TextInput--dark u-mb8x" id="login-modal-password-input" name="password" placeholder="Enter Password ...." type="password" value="<?php echo (!empty($_POST['password'])) ? $_POST['password']: '';?>" required />
										</div>

										<div class="row">
											<div class="form-group col-md-12">
												<button style="margin-left:5px;" type="submit" class="btn btn-primary pull-right" name="login_submit">Login</button>
											</div>
										</div>
										
										<hr class="custom_hr_colored_line" />

									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
include_once( $root_dir_path . '/includes/footer.php' );
include_once( $root_dir_path . '/includes/below_footer.php' );
?>
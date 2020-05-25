14:10 25/5/2020<?php

include_once( dirname(__FILE__). '/../includes/config.php' );

if(!isset($_SESSION['user_id']))
{
	$goto = $website_url . '/login.php';
	header ('location: ' . $goto);
}

include_once( $root_dir_path . '/includes/above_navbar.php' );

include_once( $root_dir_path . '/user/includes/navbar.php' );

?>

<div class="container">
	<h2 class="well custom_border_colored_line">
		Viewing All Account
		<?php
        if($_SESSION['type'] == '2')
		{
		?>
		<a href="#" data-toggle="modal" data-target="#Add_Modal" class="btn btn-primary pull-right">Add New</a>
		<?php
		}
		?>
	</h2>

	<?php
	if(isset($_SESSION['msg']))
	{
		?>
		<center>
			<div class="alert alert-info">
				<strong><?php echo $_SESSION['msg']; ?></strong>
			</div>
		</center>
		<?php
		unset($_SESSION['msg']);
	}
	?>

</div>

<style>
th,td
{
	text-align:center;
}
</style>

<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="table-responsive">
					<table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" style="font-size:14px;">
						<thead>
							<tr>
								<th class="no-sort">Sr.</th>
								<th class="no-sort">Service</th>
								<th class="no-sort">Phone Number</th>
								<th class="no-sort">Date</th>
								<th class="no-sort">Account</th>
								<th class="no-sort">Password</th>
								<th class="no-sort">Address</th>
								<?php
                                                                                                                                        	if($_SESSION['type'] == '2')
								{
								?>
								<th class="no-sort">Delete</th>
								<th class="no-sort">Update</th>
								<?php
								}
								?>
							</tr>
						</thead>
						<tbody>
		<?php
		$select_query = "SELECT auto_id, AES_DECRYPT(Service, 'key') AS Service, AES_DECRYPT(Phone, 'key') AS Phone, Date, AES_DECRYPT(account, 'key') AS account, AES_DECRYPT(password, 'key') AS password, AES_DECRYPT(address, 'key') AS address FROM personnel";
		$select_result = mysqli_query($connection,$select_query);
		$affected_rows = $connection->affected_rows;
		if(!$select_result)
		{
			echo "<tr><td>Error: " . mysqli_error($connection)." ..... !!</td></tr>";
		}
		else if($affected_rows == 0)
		{
			// echo "<tr><td>No Record Exist.</td></tr>";
		}
		else
		{
			$serial_no = 1;
			while ( $row = mysqli_fetch_array($select_result) )
			{
				$personnel_auto_id = $row['auto_id'];
				$Service = $row['Service'];
				$Phone = $row['Phone'];
				$Date = $row['Date'];
				$address = $row['address'];
		?>				
							<tr>
								<td><b><?php echo $serial_no; ?>.</b></td>
								<td><?php echo $Service; ?></td>
								<td><?php echo $Phone; ?></td>
								<td><?php echo $Date; ?></td>
								<td><?php echo $row['account']; ?></td>
								<td><?php echo $row['password']; ?></td>
								<td><?php echo $address; ?></td>
								<?php
								if($_SESSION['type'] == '2')
								{
								?>
								<td>
									<form action="<?php echo $website_url ?>/action.php" method="POST">
										<input type="hidden" name="personnel_auto_id" value="<?php echo $personnel_auto_id; ?>" />
										<button type="submit" class="btn btn-xs btn-danger" name="delete_personnel" value="1" onclick="return confirm('Are you sure you want to delete this Personnel?')">Delete</button>
									</form>
								</td>
								<td>
									<a href="#" data-toggle="modal" data-target="#Update_Modal_<?php echo $serial_no; ?>" class="btn btn-xs btn-info">Update</a>
								</td>
								<?php
								}
								?>
							</tr>

<div class="modal fade" id="Update_Modal_<?php echo $serial_no; ?>" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h3 class="modal-title" id="">Updating Account</h3>
			</div>
			<div class="modal-body">
				<form method="POST" action="<?php echo $website_url . '/action.php'; ?>">
					<input type="hidden" name="personnel_auto_id" value="<?php echo $personnel_auto_id; ?>" />
					<label>Password:</label>
					<div class="row">
						<div class="form-group col-md-12 ">
							<input type="text" class="form-control" name="password" value="" placeholder="Modify Password ....." required />
						</div>
					</div>
										<div class="row">
						<div class="form-group col-md-12">
							<button style="margin-left:5px;" type="submit" class="btn btn-primary pull-right" name="update_personnel">Modify</button>
						
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

		<?php
			$serial_no++;
			}
		}	
		?>	
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="Add_Modal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h3 class="modal-title" id="">Adding Account</h3>
			</div>
			<div class="modal-body">
				<form method="POST" action="<?php echo $website_url . '/action.php'; ?>">
					<label>Service:</label>
					<div class="row">
						<div class="form-group col-md-12 ">
							<input type="text" class="form-control" name="Service" value="" placeholder="Add Service ....." required />
						</div>
					</div>
					<label>Phone:</label>
					<div class="row">
						<div class="form-group col-md-12 ">
							<input type="text" class="form-control" name="Phone" value="" placeholder="Add Phone ....." required />
						</div>
					</div>
					<label>Date: Current Time</label>
					<div class="row">
						<div class="form-group col-md-12 ">
							<input type="hidden" class="form-control" name="Date" value=NOW() placeholder="Add Date ....." required/>
						</div>
					</div>
					<label>Account:</label>
					<div class="row">
						<div class="form-group col-md-12 ">
							<input type="text" class="form-control" name="account" value="" placeholder="Add Account ....." required />
						</div>
					</div>
					<label>Password:</label>
					<div class="row">
						<div class="form-group col-md-12 ">
							<input type="text" class="form-control" name="password" value="" placeholder="Add Password ....." required />
						</div>
					</div>
					<label>Address:</label>
					<div class="row">
						<div class="form-group col-md-12 ">
							<input type="text" class="form-control" name="address" value="" placeholder="Add Address ....." required />
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-12">
							<button style="margin-left:5px;" type="submit" class="btn btn-primary pull-right" name="add_personnel">Add</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php
include_once( $root_dir_path . '/includes/footer.php' );
include_once( $root_dir_path . '/includes/below_footer.php' );
?>
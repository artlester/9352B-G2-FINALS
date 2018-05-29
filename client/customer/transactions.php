<?php
	require('db.php');
	require('session.php');
?> 
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Audirentur: Homepage</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="http://customer.audirentur.com/img/logo.png" />
    <!--CSS-->
    <link rel="stylesheet" type="text/css" href="http://customer.audirentur.com/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="http://customer.audirentur.com/css/fontawesome-all.css">
    <link rel="stylesheet" type="text/css" href="http://customer.audirentur.com/css/products.css">
    <link rel="stylesheet" type="text/css" href="http://customer.audirentur.com/css/userbar.css">
</head>
<body>
	<?php include 'userbar.php' ?>
	<div id="grad-bg">
	<br>
	<h3 class="text-center">Transactions</h3>
	<br>
	</div>
	<br>
	<?php
	$query = "SELECT rentals.rental_id, rentals.rental_date, rentals.return_date, rentals.status, sounds.name 
				FROM ((customers INNER JOIN rentals on customers.customer_id=rentals.customer_id) 
				INNER JOIN sounds on rentals.sound_id=sounds.sound_id)
				WHERE customers.cust_username= '$user' AND rentals.status= 'Pending'";
		
	$result = mysqli_query($mysqli, $query);
	if(!$result ) {
				die('Could not display data: ' . mysql_error()); //display errors 
	}
	?>
	<table class="table table-striped">
		<thead><tr style="text-align:left;background-color:gray;"><td colspan="4"><h4>Pending Rentals</h4></td></tr></thead>
			<thead class="thead-dark">
				<tr>
					<th width="10%">Name</th>
					<th width="10%">Rental Date</th>
					<th width="10%">Return Date</th>
					<th width="5%">Status</th>
				</tr>
			</thead>
			<tbody>
			<?php //for the data will be displayed
			$no=1;
				while ($row = mysqli_fetch_array($result)){
				echo '<tr>
						<td >'.$row['name'].'</td>
						<td >'.$row['rental_date'].'</td>
						<td >'.$row['return_date'].'</td>
						<td>'.$row['status'].'</td>
					</tr>';
				$no++;
				}
	?>
			</tbody>
	</table>
	<?php
	$query = "SELECT rentals.rental_id, rentals.rental_date, rentals.return_date, rentals.status, sounds.name 
				FROM ((customers INNER JOIN rentals on customers.customer_id=rentals.customer_id) 
				INNER JOIN sounds on rentals.sound_id=sounds.sound_id)
				WHERE customers.cust_username= '$user' AND rentals.status= 'Renting'";
		
	$result = mysqli_query($mysqli, $query);
	if(!$result ) {
				die('Could not display data: ' . mysql_error()); //display errors 
	}
	?>
	<table class="table table-striped">
		<thead><tr style="text-align:left;background-color:gray;"><td colspan="4"><h4>Renting Rentals</h4></td></tr></thead>
			<thead class="thead-dark">
				<tr>
					<th width="10%">Name</th>
					<th width="10%">Rental Date</th>
					<th width="10%">Return Date</th>
					<th width="5%">Status</th>
				</tr>
			</thead>
			<tbody>
			<?php
			$no=1;
				while ($row = mysqli_fetch_array($result)){
				echo '<tr>
						<td >'.$row['name'].'</td>
						<td >'.$row['rental_date'].'</td>
						<td >'.$row['return_date'].'</td>
						<td>'.$row['status'].'</td>
					</tr>';
				$no++;
				}
				?>
		    </tbody>
		</table>
	<br>
	<?php
	$query = "SELECT rentals.rental_id, rentals.rental_date, rentals.return_date, rentals.status, sounds.name 
				FROM ((customers INNER JOIN rentals on customers.customer_id=rentals.customer_id) 
				INNER JOIN sounds on rentals.sound_id=sounds.sound_id)
				WHERE customers.cust_username= '$user' AND rentals.status= 'Cancelled'";
		
	$result = mysqli_query($mysqli, $query);
	if(!$result ) {
				die('Could not display data: ' . mysql_error()); //display errors 
	}
	?>
	<table class="table table-striped">
	<thead><tr style="text-align:left;background-color:gray;"><td colspan="4"><h4>Cancelled Rentals</h4></td></tr></thead>
			<thead class="thead-dark">
				<tr>
					<th width="10%">Name</th>
					<th width="10%">Rental Date</th>
					<th width="10%">Return Date</th>
					<th width="5%">Status</th>
				</tr>
			</thead>
			<tbody>
			<?php
			$no=1;
				while ($row = mysqli_fetch_array($result)){
				echo '<tr>
						<td >'.$row['name'].'</td>
						<td >'.$row['rental_date'].'</td>
						<td >'.$row['return_date'].'</td>
						<td>'.$row['status'].'</td>
					</tr>';
				$no++;
				}
				?>
				 </tbody>
			</table>
	<?php
	$query = "SELECT rentals.rental_id, rentals.rental_date, rentals.return_date, rentals.status, sounds.name 
				FROM ((customers INNER JOIN rentals on customers.customer_id=rentals.customer_id) 
				INNER JOIN sounds on rentals.sound_id=sounds.sound_id)
				WHERE customers.cust_username= '$user' AND rentals.status= 'Rented'";
		
	$result = mysqli_query($mysqli, $query);
	if(!$result ) {
				die('Could not display data: ' . mysql_error()); //display errors 
	}
	?>
	<table class="table table-striped">
	<thead><tr style="text-align:left;background-color:gray;"><td colspan="4"><h4>Rented Rentals</h4></td></tr></thead>
			<thead class="thead-dark">
				<tr>
					<th width="10%">Name</th>
					<th width="10%">Rental Date</th>
					<th width="10%">Return Date</th>
					<th width="5%">Status</th>
				</tr>
			</thead>
			<tbody>
			<?php
			$no=1;
				while ($row = mysqli_fetch_array($result)){
				echo '<tr>
						<td >'.$row['name'].'</td>
						<td >'.$row['rental_date'].'</td>
						<td >'.$row['return_date'].'</td>
						<td>'.$row['status'].'</td>
					</tr>';
				$no++;
				}
				?>
		    </tbody>
			</table>
	<footer>
        <span>© Copyright 2018 Audirentur</span>
    </footer>
	<!--JAVASCRIPT-->
    <script src="http://customer.audirentur.com/js/jquery-3.3.1.js"></script>
    <script src="http://customer.audirentur.com/js/bootstrap.min.js"></script>
	</body>	
	</html>
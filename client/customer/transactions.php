<html>
	<body>
	<head>
		
</head>
<nav class="nav">
	<h4>Transactions</h4>
</nav>
<?php
	require('db.php');
	require('session.php');
	
	$query = "SELECT rentals.rental_id, rentals.rental_date, rentals.return_date, rentals.status, sounds.name 
				FROM ((customers INNER JOIN rentals on customers.customer_id=rentals.customer_id) 
				INNER JOIN sounds on rentals.sound_id=sounds.sound_id)
				WHERE customers.cust_username= '$user' "; 

	//database			
	$result = mysqli_query($mysqli, $query);

	if(!$result ) {
				die('Could not display data: ' . mysql_error()); //display errors 
	}
?> 
<style>
	table td {
			transition: all .5s;
		}
		
		/* Table */
		.data-table {
			margin-top:20px;
			border-collapse: collapse;
			font-size: 14px;
			min-width: 537px;
			text-align:center;
		}

		.data-table th, 
		.data-table td {
			border: 1px solid #e1edff;
			padding: 7px 17px;
		}
		.data-table caption {
			margin: 7px;
		}

		/* Table Header */
		.data-table thead th {
			background-color: #508abb;
			color: #FFFFFF;
			border-color: #6ea1cc !important;
			text-transform: uppercase;
		}

		/* Table Body */
		.data-table tbody td {
			color: #353535;
		}
		.data-table tbody tr:nth-child(odd) td {
			background-color: #f4fbff;
		}
		.data-table tbody tr:hover td {
			background-color: #ffffa2;
			border-color: #ffff0f;
		}
	</style>
	<table class="data-table">
			<thead>
				<tr>
					<th width="10%">Name of Package</th>
					<th width="10%">Rental Date</th>
					<th width="10%">Return Date</th>
					<th width="5%">Status</th>
				</tr>
			</thead>
			<tbody>
			<?php	//for the data will be displayed
				$no=1;
				while ($row = mysqli_fetch_array($result)){
				echo '<tr>
						<td >'.$row['name'].'</td>
						<td >'.$row['rental_date'].'</td>
						<td >'.$row['return_date'].'</td>
						<td>'.$row['status'].'</td>
					</tr>';
					$no++;
			}?>
		    
	</body>	
	</html>

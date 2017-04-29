<?php
$request = strip_tags($_POST['ip']);
if ($request == "") { $request = $_SERVER['REMOTE_ADDR']; }
	$xml=simplexml_load_file("api.php" . $request) or die("Error: Cannot create object");
	if ($xml->status == "fail") { $xml=simplexml_load_file("http://ip-api.com/xml/" . $_SERVER['REMOTE_ADDR']) or die("Error: Cannot create object"); }
	$ip =  $xml->query;
	$hostname = gethostbyaddr($xml->query);
	$isp = $xml->isp;
	$org = $xml->org;
	$as = $xml->as;
	$country = $xml->country;
	$city = $xml->city;
	$region = $xml->regionName;
	$zip = $xml->zip;
	$countrycode = $xml->countryCode;
	$regioncode = $xml->region;
	$lat = $xml->lat;
	$lon = $xml->lon;
	$timezone = $xml->timezone;
?>
<!DOCTYPE html>
<html lang="en">
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>IP Geolocation</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	</head>
	<body style="background-color: palegreen;">
		<div class="container">
			<center>
				<h1>IP Geolocation</h1>
				<br/>
				<form method="post">
					<label>IP:</label>
					<input type="ip" name="ip" class="form-control" style="width:250px;" required><br/>
					<button type="submit" class="btn btn-primary btn-xs">Submit</button>
				</form>
				<br/>
				<table class="table table-inverse">
					<thead>
						<tr>
							<th>IP</th>
							<th>Hostname</th>
							<th>ISP</th>
							<th>Organisation</th>
							<th>AS</th>
							<th>Country</th>
							<th>City</th>
							<th>Region</th>
							<th>Zip</th>
							<th>CC</th>
							<th>RC</th>
							<th>Latitude</th>
							<th>Longitude</th>
							<th>Timezone</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><?php echo $ip ?></td>
							<td><?php echo $hostname ?></td>
							<td><?php echo $isp ?></td>
							<td><?php echo $org ?></td>
							<td><?php echo $as ?></td>
							<td><?php echo $country ?></td>
							<td><?php echo $city ?></td>
							<td><?php echo $region ?></td>
							<td><?php echo $zip ?></td>
							<td><?php echo $countrycode ?></td>
							<td><?php echo $regioncode ?></td>
							<td><?php echo $lat ?></td>
							<td><?php echo $lon ?></td>
							<td><?php echo $timezone ?></td>
							
						</tr>
					</tbody>
				</table>
			</center>
		</div>
	<br/>
	<footer>
		<center>
			<p>Developed by <a href="https://github.com/legorek">Rekkeh</a></p>
		</center>
	</footer>
	</body>
</html>

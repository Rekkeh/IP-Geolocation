<?php
$request = strip_tags($_POST['ip']);
if ($request == "") { $request = $_SERVER['REMOTE_ADDR']; }
	$grab = file_get_contents("http://ip-api.com/xml/" . $request);
$xml=simplexml_load_string($grab) or die("Error: Cannot create object");
	//if ($xml->status == "fail") { $xml=simplexml_load_file("http://ip-api.com/xml/" . $_SERVER['REMOTE_ADDR']) or die("Error: Cannot create object"); }
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
	<body style="color:#0e5077; background-color: #3476ff;">
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
							<th style="border-bottom:2px solid #3476da;">IP</th>
							<th style="border-bottom:2px solid #3476da;">Hostname</th>
							<th style="border-bottom:2px solid #3476da;">ISP</th>
							<th style="border-bottom:2px solid #3476da;">Organisation</th>
							<th style="border-bottom:2px solid #3476da;">AS</th>
							<th style="border-bottom:2px solid #3476da;">Country</th>
							<th style="border-bottom:2px solid #3476da;">City</th>
							<th style="border-bottom:2px solid #3476da;">Region</th>
							<th style="border-bottom:2px solid #3476da;">Zip</th>
							<th style="border-bottom:2px solid #3476da;">CC</th>
							<th style="border-bottom:2px solid #3476da;">RC</th>
							<th style="border-bottom:2px solid #3476da;">Latitude</th>
							<th style="border-bottom:2px solid #3476da;">Longitude</th>
							<th style="border-bottom:2px solid #3476da;">Timezone</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td style="border-top:2px solid #3476da;"><?php echo $ip ?></td>
							<td style="border-top:2px solid #3476da;"><?php echo $hostname ?></td>
							<td style="border-top:2px solid #3476da;"><?php echo $isp ?></td>
							<td style="border-top:2px solid #3476da;"><?php echo $org ?></td>
							<td style="border-top:2px solid #3476da;"><?php echo $as ?></td>
							<td style="border-top:2px solid #3476da;"><?php echo $country ?></td>
							<td style="border-top:2px solid #3476da;"><?php echo $city ?></td>
							<td style="border-top:2px solid #3476da;"><?php echo $region ?></td>
							<td style="border-top:2px solid #3476da;"><?php echo $zip ?></td>
							<td style="border-top:2px solid #3476da;"><?php echo $countrycode ?></td>
							<td style="border-top:2px solid #3476da;"><?php echo $regioncode ?></td>
							<td style="border-top:2px solid #3476da;"><?php echo $lat ?></td>
							<td style="border-top:2px solid #3476da;"><?php echo $lon ?></td>
							<td style="border-top:2px solid #3476da;"><?php echo $timezone ?></td>
							
						</tr>
					</tbody>
				</table>
			</center>
		</div>
	<br/>
	<footer>
		<center>
			<p>Developed by <a style="color:white;" href="https://github.com/Rekkeh">Rekkeh</a></p>
			<!-- <p>Hosted by <a style="color:white;" href="http://example.org">Example</a></p> -->
		</center>
	</footer>
	</body>
</html>

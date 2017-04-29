<?xml version="1.0" encoding="UTF-8"?>
<?php
header('Content-type: text/xml');

$host = strip_tags($_GET['host']);

if ($host == "") { $host = $_SERVER['REMOTE_ADDR']; }
$xml=simplexml_load_file("http://ip-api.com/xml/" . $host) or die("Error: Cannot create object");
if ($xml->status == "fail") { $xml=simplexml_load_file("http://ip-api.com/xml/" . $_SERVER['REMOTE_ADDR']) or die("Error: Cannot create object"); }
  echo "<QUERY>\n";
  echo "<IP>" . $xml->query . "</IP>\n";
  echo "<HOSTNAME>" . gethostbyaddr($xml->query) . "</HOSTNAME>\n";
  echo "<ISP>" . $xml->isp . "</ISP>\n";
  echo "<ORGANISATION>" . $xml->org . "</ORGANISATION>\n";
  echo "<AS>" . $xml->as . "</AS>\n";
  echo "<COUNTRY>" . $xml->country . "</COUNTRY>\n";
  echo "<CITY>" . $xml->city . "</CITY>\n";
  echo "<REGION>" . $xml->regionName . "</REGION>\n";
  echo "<ZIP>" . $xml->zip . "</ZIP>\n";
  echo "<COUNTRYCODE>" . $xml->countryCode . "</COUNTRYCODE>\n";
  echo "<REGIONCODE>" . $xml->region . "</REGIONCODE>\n";
  echo "<LATITUDE>" . $xml->lat . "</LATITUDE>\n";
  echo "<LONGITUDE>" . $xml->lon . "</LONGITUDE>\n";
  echo "<TIMEZONE>" . $xml->timezone . "</TIMEZONE>\n";
  echo "</QUERY>";
    echo $content;
?>

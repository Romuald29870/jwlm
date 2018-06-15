<?php
require_once("../login.php");

$id_groupe=$_GET['id_groupe'];
//$langue='Arabe';

function parseToXML($htmlStr)
{
  $xmlStr=str_replace('<','&lt;',$htmlStr);
  $xmlStr=str_replace('>','&gt;',$xmlStr);
  $xmlStr=str_replace('"','&quot;',$xmlStr);
  $xmlStr=str_replace("'",'&#39;',$xmlStr);
  $xmlStr=str_replace("&",'&amp;',$xmlStr);
  return $xmlStr;
}


// Opens a connection to a MySQL server
$conn = new mysqli($hn, $un, $pw, $db);
  if($conn->connect_error) die($conn->connect_error);

// Select all the rows in the markers table
$query = "SELECT * FROM adresse WHERE id_groupe='$id_groupe'";
//echo $query;
$result = $conn->query($query);
if (!$result) {
  die('Invalid query: ' . mysql_error());
}

header("Content-type: text/xml");

// Start XML file, echo parent node
echo '<markers>';


// Iterate through the rows, adding XML nodes for each
$result->data_seek(0);
  while ($row = $result->fetch_assoc()){
  // Add to XML document node
  echo '<marker ';
  echo 'numero="' . parseToXML($row['numero']) . '" ';
  echo 'apt="' . parseToXML($row['apt']) . '" ';
  echo 'rue="' . parseToXML($row['rue']) . '" ';
  echo 'lat="' . parseToXML($row['lat']) . '" ';
  echo 'longi="' . parseToXML($row['longi']) . '" ';
  echo '/>';
}

echo '</markers>';

?>
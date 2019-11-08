<?php 
// $db_host		= 'localhost';
// $db_user		= 'root';
// $db_pass		= '';
// $db_database	= 'votebook';

// ini_set('display_errors', 1);
// error_reporting(E_ALL);
// $db = new PDO('mysql:host='.$db_host.';dbname='.$db_database, $db_user, $db_pass);
// $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);

// $firstName = $_POST['fnames'];
// $assemblyName = $_POST['assemblys'];
// $distName = $_POST['dists'];



$con = mysqli_connect("localhost","root","","new_votebook");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$firstName = 'अमृत';
mysqli_set_charset($con,'utf8');
// mysql_set_charset();	
// echo $firstName;
$assemblyName = 'Asr';
$distName = 'Gsp';


$finalArray = array();
//$firstName = 'sayali';
//mysqli_set_charset($db,'utf8_bin');
$query = "SELECT * FROM voters WHERE svot_fullname LIKE '".$firstName."%'  and svot_assembly= '".$assemblyName."' and svot_distt= '".$distName."' ";

// $query = $db->prepare("SELECT * FROM voters WHERE svot_fullname LIKE '".$firstName."%'  and svot_assembly= ? and svot_distt= ? ");
// $query->execute(array($assemblyName,$distName));        
// if ($query->rowCount() > 0)
// {
//echo 'successful';
	if ($result=mysqli_query($con,$query)){
	  // Fetch one and one row
	  while ($row=mysqli_fetch_array($result))
	    {
	    	// echo '<pre>';
	    	// print_r($row);
	    	// echo $row['svot_fullname'];
    		array_push($finalArray, array('Voter_Name' => $row['svot_fullname']));
	    }
	}
	// $res = mysqli_query($con,$query);
 //    while($row1 = $row->fetch()) {
	// }
// }
// else {
//     echo 'Data not fetched';
// }
	// print_r($finalArray);
echo json_encode($finalArray,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
 
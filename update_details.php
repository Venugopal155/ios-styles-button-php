<?php
/* Connection for Mysql */
$con = mysql_connect('localhost','root','');
mysql_select_db('test');
$status =  $_REQUEST['status_value'];
	
//echo $status;

$spilt_get_value = split ("\_", $status); 
   
/*  echo    "checkbox value : $spilt_get_value[0] <br />";
echo  "rowid: $spilt_get_value[1] <br />" ;
 */
 $sql_q = "update ios_button set status = '".$spilt_get_value[0]."' where id = ".$spilt_get_value[1];
$results = mysql_query($sql_q);

if($results>0){
	//echo "updated";
	
} else{
	echo "Oh god got error".die(mysql_errno());
}  
 
?>

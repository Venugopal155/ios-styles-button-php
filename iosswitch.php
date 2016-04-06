<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>iOS 8 Check Box Button using CSS</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
$('.switch').click(function(){

$(this).toggleClass("switchOn");
});

$('.checkbox').click(function(){
	
	var checked_value =  $(this).val();
	/* value is checkbox_rowid ex:1_1,1_2..*/
	var arr = checked_value.split('_');
	//alert("checkox_id="+arr[0]+"row_id="+arr[1]);
	
	var cheking_value = $(this).is(':checked') ? checked_value : 0+"_"+arr[1];
	
	//alert(cheking_value);
	
	$.ajax({
		type:"POST",
		url:"update_details.php",
		data:"status_value="+cheking_value,
		success:function(data){
			$(".ress").html(data);
			
		}
	});
	
});



});



</script>
<style>
body
{
font-family:arial
}

.switch {
width: 62px;
height: 32px;
background: #e5e5e5;
z-index: 0;
margin: 0;
padding: 0;
appearance: none;
border: none;
cursor: pointer;
position: relative;
border-radius:16px;
-moz-border-radius:16px;
-webkit-border-radius:16px;
}

.switch:before {
content: ' ';
position: absolute;
left: 1px;
top: 1px;
width: 60px;
height: 30px;
background: #fff;
z-index: 1;
border-radius:16px;
-moz-border-radius:16px;
-webkit-border-radius:16px;
}

.switch:after {
content: ' ';
height: 29px;
width: 29px;
border-radius: 28px;
background: #fff;
position: absolute;
z-index: 2;
top: 1px;
left: 1px;
-webkit-transition-duration: 300ms;
transition-duration: 300ms;
-webkit-box-shadow: 0 2px 5px #999999;
box-shadow: 0 2px 5px #999999;
}
.switchOn,.switchOn:before
{
background: #4cd964 !important;
}

.switchOn:after
{
left: 32px !important;
}


.switchBig {
width: 200px;
height: 105px;
background: #e5e5e5;
z-index: 0;
margin: 0;
padding: 0;
appearance: none;
border: none;
cursor: pointer;
position: relative;
border-radius:53px;
-moz-border-radius:53px;
-webkit-border-radius:53px;
}

.switchBig:before {
content: ' ';
position: absolute;
left: 2px;
top: 2px;
width: 196px;
height: 101px;
background: #fff;
z-index: 1;
border-radius:52px;
-moz-border-radius:52px;
-webkit-border-radius:52px;
}

.switchBig:after {
content: ' ';
height: 100px;
width: 100px;
border-radius: 52px;
background: #fff;
position: absolute;
z-index: 2;
top: 2px;
left: 2px;
-webkit-transition-duration: 300ms;
transition-duration: 300ms;
-webkit-box-shadow: 0 2px 5px #999999;
box-shadow: 0 2px 5px #999999;
}

.switchBigOn, .switchBigOn:before
{
background: #4cd964 !important;
}

.switchBigOn:after
{
left: 98px !important;
}
.checkbox{
	display:none;
}
</style>
</head>

<body>

<div class="ress"></div>
<table>
<?php $con = mysql_connect('localhost','root','');


mysql_select_db('test');

$sql_q = "select * from ios_button";
$results = mysql_query($sql_q);
while($get_row = mysql_fetch_assoc($results)){
?>


<tr><td><?php echo $get_row['name'];?></td>
<td>
<label>
<input type="hidden" value="<?php echo $get_row['id'];?>" class="row_id">
<input type="checkbox" name="checkboxName" class="checkbox" value="1_<?php echo $get_row['id'];?>" <?php if($get_row['status']==1){echo "checked"; }?>/> 
<div class="switch <?php if($get_row['status']==1){echo "switchOn"; }?>"></div>
</label>
</td>
<td><?php echo $get_row['status'];?></td>
</tr>

<?php  } ?>
</table>
</body>
</html>

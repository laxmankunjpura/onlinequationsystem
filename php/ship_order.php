<?php
include '../db/connect.php';

$sql = "select * from customerorders where isShip = 1 && delivered= 'no' ";

$result = mysql_query($sql) or die(mysql_error());

?>
<!DOCTYPE html>
<html lang="en">
<head>
 
  <meta charset="utf-8">
  <!--meta name="viewport" content="width=device-width, initial-scale=1"-->
  <!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <!--script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script-->
<script>
/*var deleteid;
function deleteRecord(r) {
    var i = r.parentNode.parentNode.rowIndex;
    document.getElementById("processtable").deleteRow(i);
alert(document.getElementById("id1").innerHTML);
}*/
  $(document).ready(function(){
$('.closediv').click(function(){
		// To close the div and empty it
		$("#response_here").empty();
	});
  $("#ordertable").on('click', '.btnClear', function () {
		
		var customerId = $(this).closest('tr').find('#id1').text();
		$.post("../php/order_deliver.php", {id:customerId}, function(){
            $('#response_here').html($('#shiporderdata'));
        });
	  //alert(id);
	  $(this).closest('tr').remove();
  });

 

}); 

</script>
</head>
<body>
<div class="affix-btn">
                    <button name="submit" type="submit" value="Save" class="btn pull-right closediv" data-offset-top="0">Close</button>
                </div>
<div class="container">
<div id="shiporderdata">
  <div class="row">
						<div class="col-lg-10"><h3>Ship Orders</h3></div>
						</div>
  <!--p>Contextual classes can be used to color table rows or table cells. The classes that can be used are: .active, .success, .info, .warning, and .danger.</p-->
  <div class="row">
  <div class="col-lg-10">
  <table class="table table-responsive" id="ordertable">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Contact</th>
		<th>Address</th>
        <th>Message</th>
        <th>Location</th>
		<th>Date</th>
		<th >Orders</th>
		<th>Action</th>
      </tr>
    </thead>
    <tbody>
	<?php
	while($row = mysql_fetch_array($result))
	{		
	?>
      <tr class="success">
	  <td style="display:none;" id="id1"><?php echo $row[0]; ?></td>
	    <td><?php echo $row[0] . '-' . $row[1]; ?></td>
        <td><?php echo $row[2]; ?></td>
        <td><?php echo $row[3]; ?></td>
		<td><?php echo $row[4]; ?></td>
		<td><?php echo $row[5]; ?></td>
		<td><?php echo $row[6]; ?></td>
		<td><?php echo $row[12]; ?></td>
		<td class="info"><?php echo $row[14]; ?></td>
		<td><button type="button" class="btn btn-success btnClear">Clear</button></td>
      </tr>
     <?php
	}
?>	 
    </tbody>
  </table>
  </div>
  </div>
</div>
</body>
</html>


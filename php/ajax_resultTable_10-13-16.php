 <?php
 include 'connect.php';
 // remove this to add extra parameter option but will give error
 error_reporting(0);
 $arrayIDs ='';
 $deleteid='';
 
?>

<!DOCTYPE html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!--script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script-->
<script src="../js/global.js"></script>

<script>
$(document).ready(function(){
	
	
});
</script>

<head>
<body>

<?php 
 $arrayIDs = $_GET['ids'];
 $delete = $_GET['d'];
//echo $delete;
//print_r($delete);
 if(sizeof($delete)>0)
 {
	 $pos = array_search($delete, $arrayIDs);
	//echo 'Linus Trovalds found at: ' . $pos;
	echo $pos;
	// Remove from array
	//unset($arrayIDs[$pos]);
  unset($arrayIDs[$pos]);
  //$result=unset($arrayIDs[$delete]);
  print_r($arrayIDs);
  
  $resultIDs = array_unique($arrayIDs);
  $totalIDs = count($resultIDs);
  //die();
 }
 else{
 //die();
//$qtyArray = $_GET['quanity'];
//To remove dupliicates array
$resultIDs = array_unique($arrayIDs);
//print_r($resultIDs);
//print_r($_POST['quanity']);
//echo http_build_query($resultIDs);
$totalIDs = count($resultIDs);

//echo 'total ids: ' . $totalIDs . '<br>';
//die();
//print_r(array_values($resultIDs));
echo "<div class='table-responsive' id='deletetbl'>";
echo "<table class='table table-hover table-striped' id='tbl' align='center' border='1'>";
echo "<tr class='info'><td><b>Items</b></t><td><b>Price</b></td><td><b>Quanity</b></td><td><b>Item</b></td><td style='margin-left:100px;' align='center'><b>Subtotal</b></td><td><b>Action</b></td></tr>";

$totalprice = 0;

for($i =0; $i<$totalIDs;$i++)
{
		//echo $resultIDs[$i] . '<br>';

//$query = "select * from parameters where id = ' " . $resultIDs[$i] . " ' ";
$query = "select * from products_parameters_opt where id = ' $resultIDs[$i] ' ";

$result = mysql_query($query) or die(mysql_error());

 while($r = mysql_fetch_row($result))
 {
	 //var_dump($arrayIDs);
	 //print_r($arrayIDs);
	 $totalprice = $totalprice + $r[5];
	 echo "<tr class='table-success' id='dr'><td><input type='hidden' id='dd' value=".$r[0].">" . $r[3] . "</td><td class='two'>" . $r[5] . "</td><td class='cartitem'></td><td><img src='../images/minus.png' height='20' width='20' id='minusvalue'/><input type='text' name='quantity' class='qnt' size='3' minlength='1' maxlength='3' value='1' style='margin-left:5px; margin-right:5px'><img src='../images/plus.png' height='20' width='20' id='plusvalue'/></td> <td class='updateprice'></td><td align='center'><button class=' glyphicon glyphicon-trash btn-danger btnDelete' style='margin-left:50px;'></button></td></tr>";

}

 }
 //print_r($deleteid);
 echo "</table>";
 echo "</div>";
 echo "<!--span class='glyphicon glyphicon-shopping-cart same-text'><p class='cart-item'></p></span-->";
 }
?>

 <!--tr><td bgcolor='yellow'><b>Total Value</b></td><td bgcolor='#66ccff' colspan='2'><b>  " . $totalprice . " </b> </td></tr>";
 <tr class='info'><td colspan='3'><b>Total Cart: " . $totalIDs . " </b> </td></tr-->
 

<!--div class="col-lg-8"-->
<!--button type="button" class="btn btn-success finalOrder">Finalize</button-->
<div class="row">
<div class="col-lg-6 col-md-offset-3">
<button type="submit" class="btn btn-success" data-toggle="modal" data-target="#myModal" id="onclick"><span class="glyphicon glyphicon-shopping-cart"></span> Checkout</button>
</div>
</div>
<!--/div-->
 
<!-- New Form Started Here -->
<!--form action="submitOrder.php" method="post" class="form-horizontal col-lg-10" id="contact"-->
 <div id="contact-form"  style="display:none;">
 
<div class="row">
<div class="col-lg-12">
                    <h4 class="page-header">Customer Details</h4>
                </div>
	<!--/div-->
	
<form action="../php/submitOrder.php" method="post" role="form" class="form-horizontal col-lg-10" id="contact-form22">

    <!--div class="messages"></div-->

    <div class="controls">

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="form_name">Name *</label>
												 <?php
								   $postvalue=$resultIDs;
								   
										foreach($postvalue as $value)
										{
										  echo '<input type="hidden" name="arrid[]" value="'. $value. '">';
										}
								  ?>
								  <input type="hidden" name="totalprice" value="'. $totalprice. '">
                    <input id="form_name" type="text" name="name" class="form-control" placeholder="Please enter your firstname *" required="required" data-error="Firstname is required.">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
           
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="form_email">Email *</label>
                    <input id="form_email" type="email" name="email" class="form-control" placeholder="Please enter your email *" required="required" data-error="Valid email is required.">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="form_phone">Contact No *</label>
                    <input id="form_phone" type="tel" name="contact" class="form-control" required="required" placeholder="Please enter your phone">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
        </div>
		<div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="form_message">Address *</label>
                    <textarea id="form_address" name="address" class="form-control" placeholder="Address*" rows="4" required="required" data-error="Please,enter your address."></textarea>
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="form_message">Message *</label>
                    <textarea id="form_message" name="message" class="form-control" placeholder="Message for me *" rows="4" required="required" data-error="Please,leave us a message."></textarea>
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="col-md-12">
                <input type="submit" class="btn btn-success btn-send" value="Submit Order">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p class="text-muted" style="margin-top:5px;"><strong>*</strong> These fields are required.</a></p>
            </div>
        </div>
    </div>

</form>
</div>

<!-- End Form --> 

  
</div>

</body>
</html>
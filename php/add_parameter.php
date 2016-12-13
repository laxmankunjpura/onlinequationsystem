<?php
include '../db/connect.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <!--script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script-->
  <script>
 $(document).ready(function(){
 var idval = new Array();

$('#tblParameter').load('../php/showparametertbl.php');

<!-- Grid Table Show / Hide -->
 $(".showParameterTable").click(function(){
        $("#tblParameter").toggle();
    });
<!-- Grid Table End -->
 
var txt; 
$('#plist').load('../php/product_list.php');

console.log(selectopt);
	}); 
	
		 function showParam(str) {
	 //alert('a');
    if (str.length == 0) { 
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "../php/display_param.php?q="+str, true);
        xmlhttp.send();
		//document.getElementByName("<p>").element.style.display = 'block';          // Show
    }
}
  </script>
</head>
<body>
<div id="productform">
<div class="row">
<div class="col-lg-4">
                    <h3 class="page-header">Parameter form</h3>
                </div>
				<div class="col-lg-4">
                    <h3 class="page-header">Search Parameter</h3>
                </div>
				<div class="col-lg-4">
                    <h3 class="page-header"><button type="button" class="btn btn-primary showParameterTable">Update</button></h3>
					
                </div>
	</div>

  <!--p>Resize the browser window to see the effect.</p-->
  <!-- action="../php/addproduct.php?status='text'"-->
  <div class="row">
    <div class="col-sm-6"> 
<form  method="post" action="../php/addparameter.php" class="form-horizontal" id="parameterForm">
<!--form method="post" class="form-horizontal"-->
<!--form class="form-horizontal"-->
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Name:</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" name="name" id="name1" placeholder="Enter parameter name" required="required">
		
      </div>
    </div>
  <div class="form-group">
      <label class="control-label col-sm-2" for="desc">Description:</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" name="description" id="description" placeholder="Enter Description" required="required">
      </div>
    </div>
<div class="form-group">
  <label class="control-label col-sm-2" for="sel1">Select list:</label>
  
       <span id='plist'></span>
  
</div>
 <div class="form-group">
      <label class="control-label col-sm-2" for="date">Date:</label>
      <div class="col-sm-4">
        <input type="date" name="date" class="form-control" id="date" required="required">
      </div>
    </div>
	
  
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-2">
        <button type="submit" class="btn btn-default" id="submitProduct">Submit</button>
      </div>
    </div>
  </form></div>
  
    <div class="col-sm-4">
<!--div class="texttt">Search Product!</div-->	
	<form class="form-horizontal">
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Name:</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" id="name" placeholder="parameter name" onkeyup="showParam(this.value)"><br>
		<p>Available: <span id="txtHint"></span></p>
      </div>
    </div>
   
    <!--div class="form-group">
      <div class="col-sm-offset-2 col-sm-4">
        <button type="submit" class="btn btn-default">Search</button>
      </div>
    </div-->
  </form>
  </div>
   
  </div>
    <div class="row">
<div class="col-lg-10">
 <div class="panel-body text-center">
        <div id="tblParameter"  style='display:none;'></div>
      </div>
</div>
</div>
</div>
</body>
</html>


<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8" />
<title>Survey</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
</head>
<body>

      <div class="list-right">
        <form name="phpform" id="phpform" enctype="multipart/form-data" method="post" onSubmit="return frmcheck();">
			<div class="list-left">
			  <div class="leftbox form">
				<h2>Survey</h2>

				<div class="filter-row"><label>How old are you?</label>
					<select  name="age" id="age" class="inputbox" >
						<option value="">Select</option>
						<? for($a=18;$a<100;$a++){?>
						<option value="<? echo $a;?>"><? echo $a;?></option>
						<? }?>
					</select>
				</div>
				<div class="filter-row"><label>How many children do you have?</label>
					<select  name="childrens" id="childrens" class="inputbox" >
						<option value="">Select</option>
						<? for($a=1;$a<=10;$a++){?>
						<option value="<? echo $a;?>"><? echo $a;?></option>
						<? }?>
					</select>
				</div>
				<div class="filter-row"><label>Did you graduate from college?</label>
					<select  name="college" id="college" class="inputbox" >
						<option value="">Select</option>
						<option value="Yes">Yes</option>
						<option value="No">No</option>
					</select>
				</div>
				<div class="filter-row"><label>Name someone you admire/respect.</label>
					<input autocomplete="off" name="admire" id="admire" value="" type="text" class="inputbox" >
				</div>

			  </div>
			</div>

			<div class="list-left">
			  <div class="leftbox form">
				<div class="filter-col fleft"><br>
				  <input name="submitbtn" id="submitbtn" type="submit" class="inputbtn" value="Submit">
				</div>
			  </div>
			</div>

			</form>


      </div>
    </div>
  </div>
</div>
<script language="javascript">
function frmcheck()
{
	var form = document.phpform;

	if(form.Vehicle.value=="")
	{
		alert("Please select Vehicle.");
		return false;
	}
	return true;
}
</script>
</body>
</html>

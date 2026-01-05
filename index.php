<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>SnipeTools</title>
	<link rel = "stylesheet" href = "/sites/style.css">
	<style>
	body{
		background-color: #337ab7;
		color: white;
		margin: 0;
	}
	</style>
	<script>
	function brokenToOfficeAlert(){
		alert("READ ME\nThis Tool does the following to each scanned Chromebook:\n1. Sets status to Broken (should already be set)\n2. Sets location to Office\nThis Tool should ONLY be used ON-SITE at a school BEFORE THE CHROMEBOOK ENTERS THE VAN FOR TRANSIT\nOnce you've read the following message, click 'Okay'");
	}
	function workingToSchoolsAlert(){
		alert("READ ME\nThis Tool does the following to each scanned Chromebook:\n1. Sets status to Ready to Deploy\n2. Sets location to a specific school\nThis Tool should ONLY be used ON-SITE at a school AFTER THE CHROMEBOOK HAS BEEN TAKEN OUT OF THE VAN\nOnce you've read the following message, click 'Okay'");
	}
	function outForRepairAlert(){
		alert("READ ME\nThis Tool does the following to each scanned Chromebook:\n1. Sets status to In Repair\n2. Sets location to In Transit\nThis Tool should ONLY be used IN THE OFFICE IMMEDIATELY BEFORE BEING PACKAGED FOR SHIPPING\nOnce you've read the following message, click 'Okay'");
	}
	function repairedAlert(){
		alert("READ ME\nThis Tool does the following to each scanned Chromebook:\n1. Sets status to Ready to Deploy\n2. Sets location to Office\nThis Tool should ONLY be used IN THE OFFICE IMMEDIATELY AFTER UNPACKING REPAIRED CHROMEBOOKS\nOnce you've read the following message, click 'Okay'");
	}
	function deprovisionAlert(){
		alert("READ ME\nThis Tool does the following to each scanned Chromebook:\n1. Sets status to Deprovisioned\n2. Sets location to Elderton High (Storage)\n3. Deprovisions the Chromebook on Google Admin\nThis Tool should ONLY be used IN THE OFFICE IMMEDIATELY BEFORE PLACING CHROMEBOOK INTO THE ELDERTON PILE\nOnce you've read the following message, click 'Okay'");
	}
	</script>
</head>
<body>

<div id = "indexpage">

<h1>SnipeTools</h1>
<h2>New and Improved!</h2>

<?php
echo ((time()-filemtime("../snipe-it/.git") > 30 * 24 * 3600)?("<h3 class = 'warning'>SnipeIT hasn't been updated in over a month. Please remote into<br>this server and run the SnipeIT update script on the Desktop.</h3>"):(""));
?>

<h3><a href="/sites/brokenToOffice.php" class="menu" onclick="brokenToOfficeAlert()">Return Broken Chromebooks to Office</a></h3>
<h3><a href="/sites/workingToSchools.php" class="menu" onclick="workingToSchoolsAlert()">Bring Working Chromebooks to Schools</a></h3>
<h3><a href="/sites/outForRepair.php" class="menu" onclick="outForRepairAlert()">Send Chromebook Out For Repair</a></h3>
<h3><a href="/sites/repaired.php" class="menu" onclick="repairedAlert()">Mark Chromebook as Repaired</a></h3>
<h3><a href="/sites/deprovision.php" class="menu" onclick="deprovisionAlert()">Deprovision a Chromebook</a></h3>


</div>
</body>
</html>
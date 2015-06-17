<?php
	ob_start();
	header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
	header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past
	include_once("lib.php");	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"  "http://www.w3.org/TR/html4/loose.dtd">

<html>
<head>
	<title>French Institute of Pondicherry - BIOTIK</title>
	<script src="lib.js" type="text/javascript"></script>
	<link rel="stylesheet" type="text/css" href="default.css">

</head>

<body>
<?php
	if (isset($_REQUEST))
	{
		$cname =  $_REQUEST['txtcharname'];
		//print_r ($_REQUEST);
	}
	else
		//echo "Not available";
?>

<div>
	<form name="frmgeneral" action="selectquest.php" method="post" >
		<div id="pageleft">									
				<?php
					$agent = $_SERVER['HTTP_USER_AGENT'];
					if (eregi("MSIE", $agent)) 
					{
						$str = '<embed id="svgquest" name="svgquest" type="image/svg+xml" src="drawdefaultsvg.php" width="100%" height="100%"/>';	
						echo "<script type=\"text/javascript\" src=\"writethis.js\"></script>\n";
						$jval .= "<script type=\"text/javascript\">\n";
						$jval .= " var strtowrite= '$str';\n";
						$jval .= " writethis(strtowrite);\n";
						$jval .= "</script>\n";
						$jval .= "<noscript>Javascript not enabled</noscript>\n";
						echo $jval;
					}
					else
					{
						echo('<object id="svgquest" name="svgquest" type="image/svg+xml" data="drawdefaultsvg.php" width="100%" height="100%"><param name="src" value="drawdefaultsvg.php"></object>');
					} 
				?>
		</div>
		
		<div id="pageright">
			<div id="header"><h1>BIOTIK</h1></div>
			<div id="navbuttons">
				<a href="index.php"><img src="images/new_ident_btn.jpg" alt=""></a><br>
				<?php
					getConn();
                    
					$query = "select * from but_deter";
					$data = $conn->select($query, 'OBJECT');
					//print("myconnectionok -index");
					for ($i = 0; $i < sizeof($data); $i++)
					{
						$imgname = $data[$i]->File;
						$key = $data[$i]->Key;
						echo "\n<a href=\"#\" onclick=\"showquest('" . $key . "')\">";
						echo "<img src=\"images/$imgname\" alt=''>";
						echo "</a><br>";
					}
				?>
				<a href="#" onclick="showsearch()"><img src="images/search.jpg" alt=""></a><br>
				<a href="#" onclick="showspecies()"><img src="images/species_list_btn.jpg" alt=""></a><br>
				<a href="#" onclick="showresults()"><img src="images/results_btn.jpg" alt=""></a><br>
				<a href="about.php"><img src="images/about_btn.jpg" alt=""></a><br>
				<a href="help.php"><img src="images/help_btn.jpg" alt=""></a><br>
			</div>	
			<br>
			<?php
				getConn();			
				getParameters();		
				apparrayinit();
				echo "<p class='result'>" . $_GLOBALS["no_species"] .  " species at 0%</p>";
				ob_end_flush();
			?>
		</div>
		<input type="hidden" name="txtstore" id="txtstore" value="0">
		<input type="hidden" name="txtappstr" value="<?php echo $appstr; ?>">
		<input type="hidden" name="txtcharname" id="txtcharname">
	</form>	
</div>
</body>
</html>


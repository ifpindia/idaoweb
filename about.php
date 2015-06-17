<?php
	header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
	header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past
	$store = $_POST["txtstore"];
	include_once("lib.php");	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"  "http://www.w3.org/TR/html4/loose.dtd">

<html>
<head>
	<title>French Institute of Pondicherry - BIOTIK</title>
	<script src="lib.js" type="text/javascript"></script>
	<link rel="stylesheet" type="text/css" href="default.css">
		<style type="text/css">
		p, li {
			font-family: verdana, arial;
			font-size: 12px;
			line-height: 18px;
			margin-left: 25px;
			text-align: justify;
		}
	</style>
</head>

<body>
	<form name="frmgeneral" method="post" action="selectquest.php">
		<div id="pageleft">
			<!--<p><b>Introduction </b></p>-->
			<p><b>BIOTIK</b> is a graphical identification system of the trees species of two “hotspots” of biodiversity: the rain forests in the <b>Western Ghats of India</b> and in the <b>Northern Annamites Mountain range of Lao PDR</b>. </p>
			<p>This web application covers 528 species selected among the most widespread in the Western Ghats. This graphical web application, enables specialists and non-specialists to make determinations with the help of just a few number of characters, chosen according to their availability for the particular tree to be identified. The use of vegetative characters, as well as an extensive illustration of species, has been privileged. </p>

			<p><b>Team Information</b></p>
			<p><b>Authors</b></p>
			<ul>
				<li>B. R. Ramesh</li>
				<li>N. Ayyappan</li>
				<li>P. Grard</li>
				<li>J. Prosperi</li>
				<li>S. Aravajy</li>
				<li>J-P. Pascal</li>
			</ul>
			
			<p><b>Technical support</b></p>
			<ul>
				<li>D. Balasubramanian</li>
				<li>K. Ramesh Kumar</li>
				<li>N. Ravichandran</li>
			</ul>
			
			<p><b>Web Programming</b></p>
			<ul>
				<li>K. Iswarialakshmi</li>
			</ul>
			
			<p><b>Translators</b></p>
			<ul>
				<li>K.R. Keshava Murthy</li>
				<li>S. Muthuramkumar</li>
				<li>K.P. Rajesh</li>
			</ul>
		</div>
		<div id="pageright">
			<div id="header"><h1>BIOTIK</h1></div>
			<div id="navbuttons">
				<a href="index.php"><img src="images/new_ident_btn.jpg" alt=""></a><br>
				<?php
					getConn();
					$query = "select * from but_deter";
					$data = $conn->select($query, 'OBJECT');
					
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
				<a href="#" onclick="showabout()"><img src="images/about_btn.jpg" alt=""></a><br>
				<a href="#" onclick="showhelp()"><img src="images/help_btn.jpg" alt=""></a><br>
			</div>	
			<br>
			<?php	
				$appstr = $_POST["txtappstr"];			
				echo "<input type=\"hidden\" name=\"txtstore\" value=\"$store\" >\n";
				echo "<input type=\"hidden\" name=\"txtcharname\" >\n";
				echo "<input type=\"hidden\" name=\"txtappstr\" value=\"$appstr\">\n";		
				include_once("lib.php");
				getConn();
				calculateper();
				echo "<p class='result'>" . $_GLOBALS['topcount'] . " species at " . $_GLOBALS['pertop'] . "%</p>";
			?>
		</div>
	</form>
</body>
</html>
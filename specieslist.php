<?php
		include_once("lib.php");
		getConn();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"  "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title>French Institute of Pondicherry - BIOTIK</title>
	<link rel="stylesheet" type="text/css" href="lib/jquery.treeview.css" />

	<script src="lib.js" type="text/javascript"></script>
	<script src="ajax.js" type="text/javascript"></script>
	<link rel="stylesheet" type="text/css" href="default.css">
	<script src="lib/jquery.js" type="text/javascript"></script>
	<script src="lib/jquery.cookie.js" type="text/javascript"></script>
	<script src="lib/jquery.treeview.js" type="text/javascript"></script>
	<style type="text/css">
		#clang {
			display: none;
		}
	</style>
</head>
<body>

	<form name="frmgeneral" method="post" action="selectquest.php">
		<div id="pageleft">
			<?php
				include_once("lib.php");
				getConn();	
				$store = $_POST["txtstore"];
			?>
			
			<h4>Species List</h4>
			<label  for="cbotype" id="labeltype">Search species by  </label>
			<select name="cbotype" id="cbotype" onchange="showtreespecies()">
				<option value="0">--select search type--</option>
				<option value="1">Common name</option>
				<option value="2">Family name</option>
				<option value="3">Species name</option>
			</select>
			
			<div id="clang">
				<br>
				<label  for="cbolang">Language</label>				
				<select name="cbolang" id="cbolang" onchange="showcnames()">
				<option>Select Language</option>
				<?php
					$query = "select * from communs_langues";
					$data = $conn->select($query, 'OBJECT');
					for ($i = 0; $i < sizeof($data); $i++)
					{
						echo "<option value='" . $data[$i]->Langue ."'>" . $data[$i]->Langue . "</option>";
					}
				?>
				</select>
			</div>
			
		<!--	<div id="sidetreecontrol" >
				<a href="?#">Collapse All</a> | <a href="?#">Expand All</a>
			</div> -->
			
				<div id="species">
					<div id="sidetree">
						<div class="treeheader">&nbsp;</div>
						<ul id="tree"></ul>						
					</div>
				</div>	
		</div>	
			
		
		<div id="pageright">
			<div id="header"><h1>BIOTIK</h1></div>
			<div id="navbuttons">
				<a href="index.php"><img src="images/new_ident_btn.jpg" alt=""></a><br>
				<?php					
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
				echo "<input type=\"hidden\" name=\"txtstore\" value=\"$store\" >";
				echo "<input type=\"hidden\" name=\"txtcharname\" >";
				calculateper();
				echo "<p class='result'>" . $_GLOBALS['topcount'] . " species at " . $_GLOBALS['pertop'] . "%</p>";
			?>
		</div>
	</form>
	
	<script type="text/javascript">
		$(document).ready(function(){
			$("#tree").treeview({
				animated: "fast",
				collapsed: true,
				unique: true,
				persist: location
			});
		})				
	</script>
	
</body>
</html>

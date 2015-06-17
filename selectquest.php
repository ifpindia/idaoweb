<?php
	ob_start();
	error_reporting( error_reporting() & ~E_NOTICE );
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"  "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title>French Institute of Pondicherry - BIOTIK</title>
	<script src="lib.js" type="text/javascript"></script>
	<link rel="stylesheet" type="text/css" href="default.css">
</head>
<body>
<div>
<form name="frmquest" method="post" action="redrawdefault.php">
	<div id="pageleft">
	<?php
		include_once("lib.php");
		getConn();  // get database connection
		getParameters();		// get parameters like number of species, number of characters and so on
		$elemflag = 0;
		
		$cname = $_POST['txtcharname'];	
		$store = $_POST["txtstore"];
		$appstr = $_POST["txtappstr"];
		
		if (strlen($store) > 1 )
		{	
			$store = $_POST["txtstore"];	
			$elemflag = 1;
		}
		else
		{		// so far no character has been selected, so store is empty
			$store = "";
			$elemflag = 0;
			//echo 
			for ($i=0; $i<$_GLOBALS["no_state"]; $i++)
				$store .= "0";
		}

		$query = "select * from caracteres";
		$data = $conn->select($query, 'OBJECT');
		//	echo "size: " . sizeof($data);
			
		$charvalues = array();	
		$char_val = array();	
		for ($i = 0; $i < sizeof($data); $i++)
		{
			$carac =  $data[$i]->ID_CARAC;	
			$char_val[$carac] = $data[$i]->NUM;
		}	
		
		//echo $query;
		$query = "select * from objets_fic where Objet='$cname'";		
		$data = $conn->select($query, 'OBJECT');
		if (sizeof($data) == 1)
		{
			if ($data->Contrainte == NULL)
			{
				$questname = "quest/" . $data->Popup;
				$no_of_car = $data->Nb_Car; 
				$start = $data->Index_Car;
			}
		}
		else
		{
			for ($i = 0; $i < sizeof($data); $i++)
			{
				if ($data[$i]->Contrainte != NULL)
					// check whether the constraint value in array is 1
				{				
					if ($char_val[$data[$i]->Contrainte] == 1)
					{
						$questname = "quest/" . $data[$i]->Popup;
						$no_of_car = $data[$i]->Nb_Car; 
						$start = $data[$i]->Index_Car;
						break;
					}
				}
				else
				{
					$questname = "quest/" . $data[$i]->Popup;
					$no_of_car = $data[$i]->Nb_Car; 
					$start = $data[$i]->Index_Car;
					break;
				}			
			}
		}
			// user selection is put in the array from string
		$usrstore = array();
		for ($i=0; $i<$_GLOBALS["no_state"]; $i++)
			$usrstore[$i] .= substr($store, $i, 1);
		
		if ($elemflag == 1)
		{
			$charfound = 0;
			$incrval = 0;
			while ($incrval < $no_of_car)
			{
				if ($usrstore[$start] == "1")
				{
					$charpos = $start;
					$charfound = 1;	
					break;
				}
				$start++;
				$incrval++;
			}
		}
		
		$agent = $_SERVER['HTTP_USER_AGENT'];
		if (eregi("MSIE", $agent)) 
		{
			$str = '<embed id="svgquest" name="svgquest" type="image/svg+xml" src="' . $questname . '" width="100%" height="100%"/>';	
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
			echo('<object id="svgquest" name="svgquest" type="image/svg+xml" data="' . $questname . '" width="100%" height="100%"><param name="src" value="' . $questname. '"></object>');
		} 
		
		//echo $store;
		echo "<input type=\"hidden\" name=\"txtstore\" value=\"$store\">\n";
		echo "<input type=\"hidden\" name=\"txtquest\" value=\"$cname\">\n"; 
		echo "<input type=\"hidden\" name=\"txtcharname\" id=\"txtcharname\">\n";
		echo "<input type=\"hidden\" name=\"txtcarname\" >\n";	
		echo "<input type=\"hidden\" name=\"txtappstr\" value=\"$appstr\">\n";		
	?>
	</div>

		<div id="pageright">
			<div id="header"><h1>BIOTIK</h1></div>
			<div id="navbuttons">
				<a href="index.php"><img src="images/new_ident_btn.jpg"  alt=""></a><br>
				<?php
					// Display buttons from the database
					
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
					echo "\n";
				?>
				<a href="#" onclick="showsearch()"><img src="images/search.jpg" alt=""></a><br>
				<a href="#" onclick="showspecies()"><img src="images/species_list_btn.jpg" alt=""></a><br>
				<a href="#" onclick="showresults()"><img src="images/results_btn.jpg" alt=""></a><br>
				<a href="#" onclick="showabout()"><img src="images/about_btn.jpg" alt=""></a><br>
				<a href="#" onclick="showhelp()"><img src="images/help_btn.jpg" alt=""></a><br>
				
			</div>	<br><br>	
			<div style="text-align:center;">
				<a href="javascript:history.go(-1);"><img src="images/cancel_btn.png" style="border:0;" alt=""></a>
			</div>
			<?php
				calculateper();
				echo "<p class='result'>" . $_GLOBALS['topcount'] . " species at " . $_GLOBALS['pertop'] . "%</p>";
			?>
		</div>
	</form>

</div>

	<?php
	
		// Display tick mark, if any of the character in the quest is already selected.
		// Tick display is done through javascript.
		
		if ($charfound == 1)
		{
			$query = "select * from caracteres where NUM=$charpos";		
			$data = $conn->select($query, 'OBJECT');
			if (sizeof($data) == 1)
			{
				$idcarac = $data->ID_CARAC;
				$str  =  "<script type=\"text/javascript\">";
				$str .= "	window.onload = function() {";
				$str .= " 		markselected('" . $idcarac . "');";
				$str .= " } ";
				$str .= "</script>";
				echo $str;
			}
		}
		ob_end_flush();
	?>
	
</body>
</html>

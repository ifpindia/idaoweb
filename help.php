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
		
		#pageleft img {
			text-align:center;
			margin-left: auto;
			margin-right: auto;
		}
	</style>
</head>

<body>
	<form name="frmgeneral" method="post" action="selectquest.php">
		<div id="pageleft">
			<!--<p><b>Introduction </b></p>-->
			<p>The initial screen:</p>
			<div align="center"><img src="images/s1.jpg"></div>
			<p>Left-side shows the navigational menu.</p>
			<div align="center"><img src="images/menu.jpg"></div>
			<p>The database lists 528 species at the start-up of the identification process. Their number is indicated below the navigational menu. To identify one of the species, you have to provide the software with the botanical characters that seem the most relevant and that are available to you. Examine your sample in order to find in it the characters presented in this tool. To access these characters, click on the frames of the identikit or on the different drawings. When we slide the cursor on one of the drawings or frames, a link gives the name of the character.</p>

<p>Examine you sample in order to find in it, the characters presented in this tool. To access these characters, click on the frames of the identikit, or on the different drawings.  When we slide the cursor on one of the drawings or frames, a link gives the name of the character. </p>

<p><b>The identification process</b> </p>

<p>Although it is possible to start with any kind of character, there is one method that is particularly appropriate to choose your criteria. </p>

<p>To examine the characteristics in the following order: 
<ul>
<li>The leaf and its venation </li>
<li>The phyllotaxy </li>
<li>The bark </li>
<li>The latex and the stem section </li></ul>
<p>To choose a small number of characteristics of which you are sure of, instead of a large number of which you are uncertain. Remember that the quality of the identification depends on the quality of your observation. </p>

<p><b>Example</b> </p>

<p> Select the leaf at first by clicking on any leaf located on the stem. A new window opens. </p>

<div align="center"><img src="images/s2.jpg"></div>

<p>Select the leaf of your plant by clicking on the relevant drawing. Now, the user will be taken to the identikit. The user can notice the following changes:

<ol>
	<li>The chosen type of leaf appears in the identikit interface. </li>
	<li>The number of species having the specified character is displayed in the lower right frame of your screen. </li>
</ol>
</p>

<p>Again if you click the leaf, a blue tick sign is shown on the user selection. We can remove the current selection, by clicking the character state again.</p>

<p>During the identification, it is important to take into account the values displayed. They indicate:
<ul>
<li>The number of species that match the drawn identikit; </li>
<li>The percentage of similarity between a listed species, and the identikit made. When this percentage does not reach 100%, it means that the combination of your identification criteria does not exactly correspond to any species listed in the flora. </li></ul>
</p>  

<p>You can access the results by clicking the "Results" button at any time, whatever the values displayed. However, we would advise you to continue selecting additional identification criteria, while the number of species is only one or at least  still above 10.</p>

<p>You can pursue your identification in the same way. Note that it is not necessary to determine one single species at 100%. It is better to use the descriptions and illustrations, to identify the observed plant among a small number of species displayed in the results.</p>


<p><b>The "Search" button </b></p>

<p>If you do not succeed in determining your plant, ask the software to help you to refine your identification by using the "Search" button. It will display new windows in the most appropriate order. Select the right character on each one. </p>

<p><b>Important remarks </b></p>
<ul>
<li>
To change the state of a previously chosen character, you need only to return to the interface presenting the different states of this character, to click on a new state, and to validate. In the same way, if you wish to delete a character previously chosen, click on the state highlighted for this character, in order for the blue frame surrounding it to disappear, then validate.</li>

<li>This tool allows for an identification of plants, from the characters that you choose. It is not useful to use all the available characters; you can use only a few characters that are accessible to you. It is the combination of selected characters that enables you to refine the research and quickly find the name of species.</li>

<li>Some characters common to only a few species (e.g., “stilting” ss) can give quickly a small list of species displaying these characteristics.</li>

<li>Some characters are not accessible directly and require beforehand the choice of a first character. This is the case for the choice of certain type of fruits, as for the example below in which by clicking on the stipule you will access to another window with more precise characters.</li>
</ul>

<div align="center"><img src="images/sa.jpg"/></div>

<p><b>The Result Window </b></p>  

<p>To see the result of your identification at the end or at any moment of the process click on the "Result" button. A new window opens : </p>

<p>To access the description of one of these species, you just have to click on its name. The user therefore has access to the following information:</p>
<p>
The scientific name of the species along with family name and authority, the list of would-be synonyms, <br>
The vernacular names and the descriptions in English and in Lao,<br>
The Pictures, herbaria and botanical line drawing,<br>
A detailed botanical description, <br>
The major aspects of its biology, <br>
The phenology,<br>
The ecology: information on habitat as well as geographic range, <br>
The distribution,<br>
The uses, <br>
The list of accessible bibliographical references on this species</p>

<p><b>Pictures </b></p>

<p>This descriptive page also presents a set of photography and botanical beds that one can enlarge by a simple click of the mouse. When the cursor is positioned on these illustrations, a brief description appears, and gives the name of its author. Once the illustration enlarged, you can click on the button “Back” button in the browser, to return to the description sheet. </p>


<p><b>Glossary </b></p>

<p>This description sheet also provides a definition of each botanical term written in green. Just a click on it, will give you access to it. To come back to the description sheet, click the same way on the “Backwards” button. </p>

<p>If you have just made an identikit that does not correspond to species listed in this tool, the percentage of similarity that appears next to the name of the species is not 100%. In this case, an “View” button appears  next to the species name. By clicking on it, you will return to your drawn identikit interface, to which have been added red crosses indicating characters which do not match with the selected species .You can then select the correct states of the highlighted characters. This manipulation will enable you to refine your results and to pursue, by comparing the only species that will match the identikit, which you have just made. </p>

<p><b>Species list</b></p>
<p>You can access the species list by</p>
	<ul>
		<li>Scientific names listed in alphabetical order;</li>
		<li>Plant families;</li>
		<li>Vernacular names listed in alphabetical order;</li>
	</ul>
<p>These different options can be of great use when you wish to quickly have access to a species of which you know a certain number of characteristics (like its family or its vernacular name).
</p>	
	
<p><b>Limits to this application </b></p>

<p>This application for popularisation uses major characters of identification related to different vegetative and sexual organs of plants. These botanical characters are easily accessible for the majority of trees met in the evergreen forests of Western Ghats. They are acknowledged as being stable, but may not stay as such, depending on the place or environment in which the tree grow. This is why each identification made with this tool should be taken with precaution, and we would recommend you, if possible, to check each one of them, with clearly identified herbarium samples. </p>

<!--
<p>Click on the secondary venation: a new window opens which shows the main types of venation. Select the right one and validate. </p>
-->


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
				include_once("lib.php");	
				
				$appstr = $_POST["txtappstr"];				
				echo "<input type=\"hidden\" name=\"txtstore\" value=\"$store\" >";
				echo "<input type=\"hidden\" name=\"txtcharname\" >";
				echo "<input type=\"hidden\" name=\"txtappstr\" value=\"$appstr\">\n";		
				
				getConn();
				calculateper();
				echo "<p class='result'>" . $_GLOBALS['topcount'] . " species at " . $_GLOBALS['pertop'] . "%</p>";
			?>
		</div>
	</form>
</body>
</html>
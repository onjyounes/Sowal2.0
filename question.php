<html>
	<head>
		<meta charset="utf-8">
		<link href="style.css" rel="stylesheet">
		<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
		<link rel="stylesheet" href="css/buttons.css">
	</head>
	<body>
	<?php
		if(isset($_GET['id'])){
			$id=$_GET['id'];
			mysql_connect("localhost","root","");
			mysql_select_db("sowal");
			$question=mysql_query("SELECT * FROM questions where id=$id");
			$ques=mysql_fetch_assoc($question);
			if(isset($_POST["confirmer"]))
				{
					$Nom=$_POST["Nom"];
					$Question=$_POST["Question"];
					$Time=gmdate("Y-m-d H:i:s");
					mysql_query("INSERT INTO `sowal`.`reponses` (`ID`, `Reponse`, `Date`, `Nom_Complet`,`id_question`) VALUES (NULL, '$Question', '$Time', '$Nom','$id');");
				}
		}
	?>
	<a href="poser_sa_question.php"><img class="logo" src="question.png"/></a>
	<div class="div">
	<h2 class="q2"><?php  echo "\"".$ques["Question"]."\""; ?></h2>
	<form class="f1" method="POST">
		<table border="0">
				<tr class="tr">
					<td><label for="Nom">Nom complet : </label></td>
					<td colspan="2"><input class="form-control" name="Nom" id="Nom" type="text"></input> <br/></td>
				</tr>
				<tr class="tr">
					<td><label for="Question">Votre question : </label></td>
					<td colspan="2"><textarea class="form-control" name="Question" rows="6" cols="30" id="Question"></textarea><br/></td>
				</tr>
				<tr class="tr">
					<td></td>
					<td colspan="2" align="right"><input name="confirmer" class="button glow button-primary" type="submit" value="Confirmer"></input>
					<input type="reset" class="button glow button-caution" value="Réinitialiser"></input></td>
				</tr>
		</table>
	</form>
	</div>
							<?php
										$REQ = mysql_query("SELECT * FROM reponses  where id_question=$id");
										while($row=mysql_fetch_assoc($REQ)){
										?>
					<div class="div">
					<table border="0" align="center" width=600>
										<?php
											echo "<tr><td colspan=2 height=100>".$row["Reponse"]."</td></tr>"."<br/>";
											echo "<tr><td>Question posée par : ".$row["Nom_Complet"]."</td>";
											echo "<td>Date : ".$row["Date"]."</td></tr>";
										}
							?>
					</table>
					</div>
	</body>
</html>
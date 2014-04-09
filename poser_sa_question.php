<html>
	<head>
		<meta charset="utf-8"></meta>
		<link href="style.css" rel="stylesheet">
		<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
		<link rel="stylesheet" href="css/buttons.css">
	</head>
	<body>
	<a href="http://onjyounes.wix.com/sowal"><img class="logo" src="question.png"/></a>
	<?php
		mysql_connect("localhost","root","");
		mysql_select_db("sowal");
		if(isset($_POST["confirmer"]))
			{
				$Nom=$_POST["Nom"];
				$Question=$_POST["Question"];
				$Time=gmdate("Y-m-d H:i:s");
				mysql_query("INSERT INTO `sowal`.`questions` (`ID`, `Question`, `Date`, `Nom_Complet`) VALUES (NULL, '$Question', '$Time', '$Nom');");
			}
	?>
	<div class="div">
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
										$REQ = mysql_query("SELECT q.id as 'idr',Question,q.Date,q.Nom_Complet FROM questions q  left join reponses r on r.id_question=q.ID LIMIT 0,10");
										while($row=mysql_fetch_assoc($REQ)){
										?>
					<div class="div">
					<table border="0" align="center" width=600>
										<?php
											echo "<tr><td height=100><p class=\"text\">".$row["Question"]."</p></td>"."<td><a href=\"question.php?id=".$row["idr"]."\"><img src='voirrep.png'/></a>"."</td></tr>"."<br/>";
											echo "<tr><td>Question posée par : ".$row["Nom_Complet"]."</td>";
											echo "<td>Date : ".$row["Date"]."</td></tr>";
										}
							?>
					</table>
					</div>
	</body>
</html>
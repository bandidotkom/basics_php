<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Einmaleins</title>
	</head>
	<body>
		<h1>Einmaleins</h1>
		<table cellpadding="10">
		<?php
		echo "<tr>";
			echo "<th align=\"center\">*</th>";
			for($i=1;$i<11;$i++)
			{
				echo "<th align=\"right\">$i</th>";
			}
		echo "</tr>";
		for($i=1;$i<11;$i++)
			{
			echo "<tr>";
				echo "<th align =\"right\">".$i."</th>";
				for($j=1;$j<11;$j++)
				{
					echo "<td align =\"right\">".$i*$j."</td>";
				}
			echo "</tr>";
			}
		?>
		</table>
	</body>
</html>
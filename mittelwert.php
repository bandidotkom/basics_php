<?php
function mittelwert($liste)
{
	$summe ="";
	for($i=0; $i<count($liste); $i++)
	{
		$summe += $liste[$i];
	}
	//alternativ:
	//foreach($liste as $elem){$summe += $elem;}
	$mittelwert = $summe/count($liste);
	return $mittelwert;
}
$eingabe = array(1,2,3,4,5,6,7,8,10);
echo "Der Mittelwert betraegt: ".mittelwert($eingabe);
?>
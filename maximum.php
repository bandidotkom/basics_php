<?php
function maximum($liste)
{
	$maximum ="";
	foreach($liste as $elem)
	{
		if ($elem>=$maximum)
		{
			$maximum = $elem;
		}
	}
	return $maximum;
}
$eingabe = array(1,2,3,4,5,6,7,8,10);
echo "Das Maximum ist: ".maximum($eingabe);
?>
<?php

if (file_exists("zaehler.txt") == false)
{
	file_put_contents("zaehler.txt", 1);
	$counter = file_get_contents("zaehler.txt");
	echo $counter;
}
else{
	$counter = file_get_contents("zaehler.txt");
	$counter += 1;
	file_put_contents("zaehler.txt", $counter);
	echo $counter;
}
?>
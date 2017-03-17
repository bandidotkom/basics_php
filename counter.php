<?php
	if(!file_exists("counter.txt")){
		file_put_contents("counter.txt", 1);
		echo"<p>Sie sind der erste Besucher.</p>";
	}
	else{
		$counter = file_get_contents("counter.txt");
		$counter += 1;
		file_put_contents("counter.txt", $counter);
		echo "<p>Sie sind der $counter -te Besucher</p>";
	}	
?>

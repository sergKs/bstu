<?php

$handle = fopen('names.csv', 'r');

while ($row = fgetcsv($handle)) {
	mail($row[1], 'Lecture', 'Message !!!');
	echo "$row[0]: $row[1]", PHP_EOL;
	sleep(1);
}

fclose($handle);
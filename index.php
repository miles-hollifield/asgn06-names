<?php

include_once('functions/utility-functions.php');
include_once('functions/names-functions.php');

$namesHandle = fopen("names.txt", "r");

$fullNames = get_full_names($namesHandle);
$validFullNames = clean_full_names($fullNames);

?>


<!-- Output -->

<h1>asgn06 Names</h1>
<h2>Unique Count of Full Names</h2>
<?= sizeof(array_unique($validFullNames)); ?>


<h2>Unique Count of Last Names</h2>
<?= sizeof(array_unique(get_last_names($validFullNames))); ?>


<h2>Unique Count of First Names</h2>
<?= sizeof(array_unique(get_first_names($validFullNames))); ?>


<h2>Ten Most Common Last Names</h2>
<?= loop_dump(ten_most_common_names(get_last_names($validFullNames))) ?>

<h2>Ten Most Common First Names</h2>
<?= loop_dump(ten_most_common_names(get_first_names($validFullNames))) ?>

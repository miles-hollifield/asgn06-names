<?php

function get_full_names($namesHandle) {
  
  $lineNumber = 0;
  $fullName = [];
  
  $nextName = fgets($namesHandle);
  while(!feof($namesHandle)) {
    if($lineNumber % 2 == 0) {
      $fullName[] = trim(substr($nextName, 0, strpos($nextName, " --")));
    }
    
    $lineNumber++;
    $nextName = fgets($namesHandle);
  }
  return $fullName;
}

function clean_full_names($fullName) {
  for($i = 0; $i < sizeof($fullName); $i++) {
    if(preg_match("/^([A-Z][a-zA-Z']+), ([A-Z][a-zA-Z']+)/", $fullName[$i] )) {
      $validFullName[] = $fullName[$i];
    }
  }
  return $validFullName;
}

function get_last_names($fullNames) {
  foreach($fullNames as $fullName) {
    $commaPosition = strpos($fullName, ",");
    $lastNames[] = substr($fullName, 0, $commaPosition);
  }
  return $lastNames;
}

function get_first_names($fullNames) {
  foreach($fullNames as $fullName) {
    $startingPosition = strpos($fullName, ",") + 1;
    $firstNames[] = trim(substr($fullName, $startingPosition));
  }
  return $firstNames;
}

function ten_most_common_names($names) {
  $values = array_count_values($names);
  arsort($values);
  $ten_most_popular_names = array_slice(array_keys($values), 0, 10, true);
  return $ten_most_popular_names;
}

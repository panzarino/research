<?php
$xml = file_get_contents("http://en.wikipedia.org/w/api.php?format=xml&action=query&prop=extracts&titles=google&redirects=true");
$xml = strip_tags($xml);
$xml = html_entity_decode($xml);
echo $xml;
//Makes the basic data but formatting comes next
?>
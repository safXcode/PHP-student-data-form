<?php
/*** set the content type header ***/
/*** Without this header, it wont work ***/
header("Content-type: text/css");


$font_family = 'Arial, Helvetica, sans-serif';
$font_size = '0.9em';
$border = '1px solid';
?>

table {
margin: 15px auto;
width: 50%;
}

th {
    font-family: Arial, Helvetica, sans-serif;
    font-size: 1.7em;
    background: #666;
    color: #FFF;
    padding: 2px 10px;
    border-collapse: separate;
    border: 1px solid #000;
}

td {
font-family: <?=$font_family?>;
font-size: <?=$font_size?>;
border: <?=$border?> #DDD;
}
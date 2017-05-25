<?php
/**
 * Created by PhpStorm.
 * User: maksymprysiazhnyi
 * Date: 25/05/2017
 * Time: 19:20
 */


$url = 'http://fashiondropshippers.com/media/feed/fashiondropshippers-feeds.csv';
$data = @file_get_contents($url);

$csv = new parseCSV($data);
$csv->auto();

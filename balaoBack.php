<?php

$niveis = array('adm', 'caixa');
require_once 'inc/inc.validateCookie.php';

$getEvent  = mysqli_query($mysqli, "SELECT * FROM events AS e JOIN venue_has_events AS v ON e.event_id = v.event_id WHERE v.venue_id = '$venueId' AND e.status = '2'")->fetch_assoc();


$todayEvent = $getEvent['event_name'];
$eventIdBitch = $getEvent['event_id'];


$balaoBar = mysqli_query($mysqli, "SELECT name, rg, cell, entrance, SUM(product_price) AS totBalao FROM tabs AS t JOIN 	booze_sold AS b ON t.tab_number = b.tab_number JOIN patrons AS p ON p.patron_id = t.patron_id WHERE t.tab_status != '0'  AND t.event_id = '$eventIdBitch' GROUP BY p.name");


$balaoEntrada = mysqli_query($mysqli, "SELECT  event_id, venue_id, name, rg, cell,  SUM(entrance) as calote FROM tabs AS t JOIN patrons AS p ON t.patron_id = p.patron_id
									    WHERE t.tab_status != '0' AND t.event_id = '$eventIdBitch' GROUP BY p.name");



//MELHOR AINDA SEPARADO POR UNIDADES VENDIDAS 
  $report = mysqli_query($mysqli, "SELECT classification, sold_as, product, SUM(product_price) as qtd, COUNT(sale) as totSold FROM booze_sold as b JOIN products as p ON p.id_product = b.product_id WHERE b.event_id = '$eventIdBitch' GROUP BY p.product ORDER BY totSold DESC");



?>
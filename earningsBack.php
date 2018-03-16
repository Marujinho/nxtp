<?php
require_once 'connect.php';
$niveis = array('adm');
require_once 'inc/inc.validateCookie.php';

$getEvent  = mysqli_query($mysqli, "SELECT * FROM events AS e JOIN venue_has_events AS v ON e.event_id = v.event_id WHERE v.venue_id = '$venueId' AND e.status = '2'")->fetch_assoc();
$eventId = $getEvent['event_id'];
$eventName = $getEvent['event_name'];
$eventDate = $getEvent['day'];


//PEGA DADOS DA ENTRADA E COLOCA NA TABLE EM ganhos.php
$EventList = mysqli_query($mysqli, "SELECT * FROM events WHERE venue_id = '$venueId'"); 

//SOMA DOS GANHOS DE BAR E ENTRADA SEPARADOS (pq eu n consegui fazer td em uma query so :/)
$totEntrance = mysqli_query($mysqli, "SELECT SUM(entrance) AS totEntrance FROM tabs WHERE event_id = '$eventId' AND venue_id = '$venueId'")->fetch_assoc();


$totBar = mysqli_query($mysqli, "SELECT SUM(product_price) AS totBar FROM booze_sold AS b JOIN tabs AS t ON t.tab_number = b.tab_number WHERE t.event_id = '$eventId' AND t.venue_id = '$venueId'")->fetch_assoc();


$totPeople = mysqli_query($mysqli, "SELECT COUNT(tab_id) AS countPeople FROM tabs WHERE venue_id = '$venueId' AND event_id = '$eventId'")->fetch_assoc();




?>
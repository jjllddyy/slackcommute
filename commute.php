<?php
# Token for slash command in Slack (Find in Basic Information tab in app config of Slack).  Usage = /commute address (i.e. /commute 123 Main St Seattle WA 98102 or /commute 98112)
if (! isset($_REQUEST['token']) || $_REQUEST['token'] !== 'YOUR_SLACK_TOKEN') {
    exit('Invalid token.');
}
#Error message if no destination entered
if (empty($_REQUEST['text'])) {
    exit('You did not specify a destination (usage: `/commute your_address` or `/commute 98109`).>');
}
urlencode($_REQUEST['text']);
#Google map API key
$key="YOUR_KEY_HERE";
#specify origin of commute (i.e. office location. Encode with +)
$origin="400+broad+street+seattle+wa+98109";
#specify unix epoch time or "now"
$dtime="now";
#specify optimistic, pessimistic or best_guess
$model="best_guess";
#specify mode of travel - walking, biking, driving, transit (note transit requires transit type)
$mode="driving";
#specify metric or imperial
$units="imperial";
$dest=$_REQUEST['text'];
$json = file_get_contents("https://maps.googleapis.com/maps/api/distancematrix/json?origins=$origin&destinations=$dest&departure_time=$dtime&traffic_model=$model&mode=$mode&key=$key&units=$units");
$result = json_decode($json, true);
$txt1 = "*The current drive time in traffic is:* ";
$txt2 = "\n     _In a perfect world it would be:_ ";
$txt3 = "\n     _Total Distance:_ ";
echo $txt1; 
echo $result['rows'][0]['elements'][0]['duration_in_traffic']['text'];
echo $txt2;
echo $result['rows'][0]['elements'][0]['duration']['text'];
echo $txt3;
echo $result['rows'][0]['elements'][0]['distance']['text'];
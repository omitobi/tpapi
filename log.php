<?php
$output=shell_exec('cat /var/log/syslog | grep myapi');
$months = array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct"."Nov","Dec");
$output = $output."";

//foreach ($months as $month){
//    $newlog = explode($output,$month) ;
//}
//
//foreach ($newlog as $log){
//    print "<br/>".$log."";
//}
$string = "";
//foreach ($months as $month){
//    $string = str_replace($month, '<br>'.$month, $output);
//}
//$string = str_replace("Aug", '<br>'.'Aug', $output);

//foreach ($months as $month) {
//    $string = str_replace($month, '<br>'.$month, $output);
//}
////foreach ($string2 as $st)
//    echo $st . "</br>";

//echo $string;
//credit: http://php.net/manual/en/function.str-replace.php#100871
function str_replace_json($search, $replace, $subject){
    return json_decode(str_replace($search, $replace,  json_encode($subject)));

}

foreach($months as $mnt) {
    if (strpos($output,$mnt) !== false ) {
        $string .= str_replace_json($mnt, "<br>$mnt", $output);
    }
}
echo str_replace("Crit", "<font style='color: red'>Crit</font>",$string);
//echo $string;
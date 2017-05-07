<?php
//$output=shell_exec('cat /var/log/syslog | grep myapi');
$op = shell_exec('cat /Applications/MAMP/htdocs/issuesminer/storage/logs/lumen.log | grep lumen');

$months = array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct"."Nov","Dec");
$op = $op."";
$output = substr( $op, strlen($output)-10000 );
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

//foreach($months as $mnt) {
    if (strpos($output,'[2017-') !== false ) {

        $string =  str_replace('[2017-',"<br>[2017-", $output);
//        $string .= str_replace_json('[2017-', "<br>[2017-", $output);
    }
//}
//echo  $string;
//exit;

$str .= str_replace('NOTICE', "             <font style='color: orange'>NOTICE</font>",$string);
echo $str;
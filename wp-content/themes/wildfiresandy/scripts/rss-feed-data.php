<?php
//storyline test 1
//$feed_url = 'http://vojo.co/en/node/15578/feed';
$feed_url = 'http://www.vojo.co/en/node/15682/feed';
$feed_content = file_get_contents($feed_url);
$feed_sxe = new SimpleXmlElement($feed_content);
//$feedData = '';
$date = date("Y-m-d H:i:s");

//convert to JSON + date
$output =  array('date'=>$date,
                 'stories'=>$feed_sxe);

echo json_encode($output);

?>
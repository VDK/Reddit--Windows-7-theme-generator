<?php

//Function that creates a part of the XML for an item.
function item_start($item)
{
  return '
    <item> 
      <guid>'.$item['id'].'</guid>
      <title>'.$item['title'].'</title>
      <pubDate>'.date(DATE_ATOM,$item['created']).'</pubDate>
      <link ref="'.$item['url'].'" />
      <description>Reddit '.$subreddit.' win7 theme</description>
  ';
        
}

//Set content type.
header ("Content-Type:text/xml");  

//Get subreddit name.
$subreddit =
  (!empty($_GET['sub']) ? $_GET['sub'] : 'EarthPorn');

//Get file content.
$request =
  file_get_contents('http://www.reddit.com/r/'.$subreddit.'.json', 0, null, null);

//Parse json.
$json =
  json_decode($request, true);

//Start XML file output.
echo '
  <rss version="2.0"> 
    <channel>
      <title>Reddit '.$subreddit.' Windows 7 theme rss feed</title>
      <link>http://veradekok.nl/win7theme/rss.php</link>
      <description></description>
      <ttl>Reddit '.$subreddit.' win7 theme</ttl>
';

//Loop JSON feed items.
foreach ($json['data']['children'] as $child)
{
  $extension =
    substr($child['data']['url'],-4);
    $extension = strtolower($extension);
  //Determine data type.
  $data_type = '';
  switch($extension)
  { 
    case '.png':
      $data_type = 'image/png';
      break;
    case '.gif':
      $data_type = 'image/gif';
      break;
    case '.jpg':
    case 'jpeg': 
      $data_type = 'image/jpeg';
      break; 
  }

  //If this is an image from imgur.com, the data type has to be image/jpeg as well.
  if($child['data']['domain'] == 'imgur.com'){
    $data_type = 'image/jpeg';
  }

  //If data type is set, return item:
  if(!empty($data_type)){

    echo
      item_start($child['data']).
      '<enclosure url="'.$child['data']['url'].'" type="'.$data_type.'"/></item>';

  }
}

//Close XML file output.
echo '</channel></rss>';

?>
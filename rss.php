<?php
header ("Content-Type:text/xml");  
if(empty($_GET['sub'])) {
  $subreddit = 'EarthPorn';
}
else {
     $subreddit = $_GET['sub'];
}
$json = json_decode(file_get_contents("http://www.reddit.com/r/".$subreddit.".json",0,null,null), true);
echo '
<rss version="2.0">
<channel>
<title>Reddit '.$subreddit.' Windows 7 theme rss feed</title>
<link>http://veradekok.nl/win7theme/rss.php</link>
<description></description>
 <ttl>Reddit '.$subreddit.' win7 theme</ttl>';
foreach ($json['data']['children'] as $child){
  $extension = substr($child['data']['url'],-4);  
  if ($extension == '.jpg' || $extension == '.png' || $extension =='.gif' || $extension == 'jpeg'){
    item_start ($child['data']);
    switch ($extension){ 
      case '.jpg':
      case 'jpeg': 
                  $data_type = 'image/jpeg';
                  break; 
       case '.png':
                  $data_type = 'image/png';
                  break;
       case '.gif':
                  $data_type = 'image/gif';
                  break;
     }
     echo   ' <enclosure url="'.$child['data']['url'].'" type="'.$data_type.'"/>
            </item>';
  }
  else if ( $child['data']['domain'] == 'imgur.com'){
    item_start ($child['data']);
    echo '<enclosure url="'.$child['data']['url'].'.jpg" type="image/jpeg" />
    
          </item>';
  }
}

  echo '</channel></rss>';
  
  function item_start($item){
    echo '<item> 
          <guid>'.$item['id'].'</guid>
          <title>'.$item['title'].'</title>
          <pubDate>'.date(DATE_ATOM,$item['created']).'</pubDate>
          <link ref=\''.$item['url'].'\'/>
          <description>Reddit '.$subreddit.' win7 theme</description>
          ';
          
  }
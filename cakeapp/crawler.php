<?php
 $main_url="https://stackoverflow.com/questions/31043521/cant-connect-mysql-database-in-phpmyadmin-by-python";
 $str = file_get_contents($main_url);
 
 // Gets Webpage Title
 if(strlen($str)>0)
 {
  $str = trim(preg_replace('/\s+/', ' ', $str)); // supports line breaks inside <title>
  preg_match("/\<title\>(.*)\<\/title\>/i",$str,$title); // ignore case
  $title=$title[1];
 }
   
 // Gets Webpage Description
 $b =$main_url;
 @$url = parse_url( $b );
 @$tags = get_meta_tags($url['scheme'].'://'.$url['host'] );
 $description=$tags['description'];
   
 // Gets Webpage Internal Links
 $doc = new DOMDocument; 
 @$doc->loadHTML($str); 
 
 $items = $doc->getElementsByTagName('td'); 
 foreach($items as $value) 
 { 
  $attrs = $value->attributes; 
  $sec_url[]=$attrs->getNamedItem('')->nodeValue;
 }
 $all_links=implode(",",$sec_url);
 print_r($all_links);
 ?>
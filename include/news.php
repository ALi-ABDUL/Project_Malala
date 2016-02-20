<?php
//////////////////////////////////////////
//          ALi Abdul
//      Adelaide Australia
//  The Noob Coder :)   20-Feb-2016
//////////////////////////////////////////
?>
<div id="content">
<?php

    $News_Source = 'http://www.abc.net.au/news/feed/46182/rss.xml';
    $xml = Simplexml_load_file($News_Source);  
    Foreach($xml as $topics){
        echo $topics->link.' ';
        foreach($topics as $news){
            echo '<b>'.$news->title.'</b>'.
                 $news->description.''.
                 $news->item.'<br/>';
            
        }
    }
    
    
?>
</div>
<?php
    require_once ('simple_html_dom.php');
    require_once ('phpQuery-onefile.php');

    $url='http://www.t.zp.ua/%D0%B7%D0%B0%D0%B3%D1%80%D0%B0%D0%BD%D0%BF%D0%B0%D1%81%D0%BF%D0%BE%D1%80%D1%82';
    $file_get = file_get_html($url);
    echo file_put_contents('zpzg.html', $file_get) . ' put <br>';

    $file_read=file_get_html('zpzg.html');
    
    $pqDoc = phpQuery::newDocument($file_read);

    //$article = $pqDoc->find('.entry-content ')->text();
    //echo $article;
    
    
//    foreach ($pqDoc->find('.entry-content ') as $a) {
        
        $a=$pqDoc->find('.entry-content');
    
        //$a=pq($a);
        
        $a->find('.header_address, .menu_10, .banners_top, .tl, .img_bio')->remove();
        

        
        foreach($a->find('table') as $e) {
            
            $e=pq($e);
            
            $txt=$e->html();
            
            echo $txt;
            exit();
        }
        
//        $txt = $a->find('div');
//        echo $txt;
            
        
        //echo $a->text();
        
        


//------------------------counter-----------------------------
        //words($a->text());

//    }
    
    


    

//    function prr($arr) {
//        echo '<pre>' . print_r($arr, true) . '</pre>';
//    }

        
 function words($text) {
        
        $search_words = preg_split("/[\s,.]/", $text);

        foreach ($search_words as $word) {
            
            preg_match_all ('/'.$word.'/', $text, $matches);

            $result[$word] = count ($matches[0]);
        }

        foreach ($result as $index => $val) {
            echo("$index - $val <br>");
        }
        
}        
    
//    //file_put_contents('file.txt', $res . PHP_EOL, FILE_APPEND | LOCK_EX,);

    
    phpQuery::unloadDocuments()

?>
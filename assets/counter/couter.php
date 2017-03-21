<?php
    $filename= "../assets/counter/counter.txt";
    $fp = fopen($filename,"r");
    $views = fread($fp,filesize($filename));
    fclose($fp);
    $views+=1;
    $fp = fopen($filename,"w");
    $fw = fopen($filename,"w");
    fwrite($fp,$views);
    fclose($fp);
?>

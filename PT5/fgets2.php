<?php
$file=fopen("test1.txt","r");
while(!feof($file))
{
echofgets($file)."<br/>";
}
fclose($file);
?>
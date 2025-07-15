<!DOCTYPE html>
<html>
<head>
<style>
body {
font-family: 'poppins',sans-serif;
margin: 0;
background: #f3e8ff;
line-height: 1.8;
font-size: 19px;
text-align: center;
}
h2 {
color: pink;
}
</style>
</head>
<body>
<h2>Hello! Welcome to my website</h2>

<?php
echo"No of Visitor is:";
$handler=fopen("file.txt","r");
$hit=(int)fread($handler,20);
fclose($handler);
$hit++;
$handler=fopen("file.txt","w");
fwrite($handler,$hit);
fclose($handler);
echo $hit;
echo "<h1> REFRESH PAGE </h1>" ;
$file = 'count.txt' ;
$c = file_get_contents($file) ;
file_put_contents($file, $c+1);
echo "The number of users visited : ".$c ;
?>
</body>
</html>
<?php

$conn = mysql_connect("localhost", "root", "70450289");
mysql_select_db("weddingbudget",$conn);
if(!$conn)
echo "no connection established";



?>
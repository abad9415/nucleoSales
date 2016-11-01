<?php
try
{
	$bdd = new PDO('mysql:host=mysql.red-7.com.mx;dbname=nucleoSales;charset=utf8', 'admin', '7R@server');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

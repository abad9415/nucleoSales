<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=nucleoSales;charset=utf8', 'admin', '7R@server');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

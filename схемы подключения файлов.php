<?

//неправильно
	//test1.php	
	require 'db.php';
	connect();
															//файл index.php
															require_once 'test1.php';
															require_once 'test2.php';
	//test2.php 
	require 'db.php';
	connect();


//правильно
	//test1.php
	connect();
															//файл index.php
															require 'db.php';
															require_once 'test1.php';
															require_once 'test2.php';
	//test2.php 
	connect();

//или, но лишний код. зато понятно откуда методы

		//test1.php
	require_once 'db.php';
	connect();
															//файл index.php
													
															require_once 'test1.php';
															require_once 'test2.php';
	//test2.php 
	require_once 'db.php';
	connect();
?>
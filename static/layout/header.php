<?php
session_start();
  include('conexao.php');
  include('verificar_login.php');
  $status = 10;
  ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Sistema de Gestao Inovatis">
	<meta name="author" content="Inovatis">
	

	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />
	

	<title>Admin - InoGest</title>

	<link href="css/app.css" rel="stylesheet">


	<style>
			* {box-sizing: border-box;}
			ul {list-style-type: none;}
			

			.month {
			padding: 25px 10;
			width: 100%;
			background: #fff;
			text-align: center;
			}
			
			.month ul {
			margin: 0;
			padding: 0;
			}

			.month ul li {
			color: white;
			font-size: 20px;
			text-transform: uppercase;
			letter-spacing: 3px;
			}

			.month .prev {
			float: left;
			padding-top: 10px;
			}

			.month .next {
			float: right;
			padding-top: 10px;
			}

			.weekdays {
			margin: 0;
			padding: 10px 0;
			background-color: #fff;
			}

			.weekdays li {
			display: inline-block;
			width: 13.6%;
			color: #666;
			text-align: center;
			}

			.days {
			padding: 10px 0;
			background: #fff;
			margin: 0;
			}

			.days li {
			list-style-type: none;
			display: inline-block;
			width: 13.6%;
			text-align: center;
			margin-bottom: 5px;
			font-size:12px;
			color: #777;
			}

			.days li .active {
			padding: 5px;
			background: #1abc9c;
			color: white !important
			}

			/* Add media queries for smaller screens */
			@media screen and (max-width:720px) {
			.weekdays li, .days li {width: 13.1%;}
			}

			@media screen and (max-width: 420px) {
			.weekdays li, .days li {width: 12.5%;}
			.days li .active {padding: 2px;}
			}

			@media screen and (max-width: 290px) {
			.weekdays li, .days li {width: 12.2%;}
			}
	</style>
</head>


<body>
    <div class="wrapper">
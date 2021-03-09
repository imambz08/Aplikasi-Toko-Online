<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$set = $this->func->globalset("semua");
$nama = (isset($titel)) ? $set->nama." &#8211; ".$titel: $set->nama." &#8211; ".$set->slogan;
$nama = ($this->func->demo() == true) ? $nama." App by @Agus088801219155" : $nama;
$headerclass = (isset($titel)) ? "header-v4" : "";
$keranjang = (isset($_SESSION["usrid"]) AND $_SESSION["usrid"] > 0) ? $this->func->getKeranjang() : 0;
$keyw = $this->db->get("kategori");
$keywords = "";
$img = (isset($img)) ? $img : base_url("i/assets/img/".$set->favicon);
$url = (isset($url)) ? $url : site_url();
$desc = (isset($desc)) ? $desc : "Aplikasi Toko Online ".$nama;
$color1 = $set->color1;
$color2 = $set->color2;
$colorbody = $set->colorbody;
$colorbutton = $set->colorbutton;
$colortext = '#292929';
$colorwhite = '#ffffff';
$colorbg = '#fff';
$coloricon = '#fff';

if($colorbody == '#0e0e0e'){
	$colortext = '#fff';
	$colorbg = '#000';
}else{
	$colorbg = '#fff';
}
if ($color1 == '#ffffff'){
	$colorwhite = '#111111';
}
if ($color2 == '#ffffff'){
	$coloricon = $color1;
}


foreach($keyw->result() as $key){ $keywords .= ",".$key->nama; }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title><?=$nama?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/png" href="<?=base_url("i/assets/img/".$set->favicon)?>"/>
	<meta name="google-site-verification" content="G35UyHn6lX6mRzyFws0NJYYxHQp_aejuAFbagRKCL7c" />
	<meta name="description" content="<?=$desc?>" />
	<!--  Social tags      -->
	<meta name="keywords" content="Aplikasi toko online <?=$nama?>">
	<meta name="description" content="<?=$desc?>">
	<!-- Schema.org markup for Google+ -->
	<meta itemprop="name" content="<?=$nama?>">
	<meta itemprop="description" content="<?=$desc?>">
	<meta itemprop="image" content="<?=$img?>">
	<!-- Twitter Card data -->
	<meta name="twitter:card" content="product">
	<meta name="twitter:site" content="@magusjalaludin18">
	<meta name="twitter:title" content="<?=$nama?>">
	<meta name="twitter:description" content="<?=$desc?>">
	<meta name="twitter:creator" content="@magusjalaludin18">
	<meta name="twitter:image" content="<?=$img?>">
	<!-- Open Graph data -->
	<meta property="fb:app_id" content="<?=$set->fb_pixel?>">
	<meta property="og:title" content="<?=$nama?>" />
	<meta property="og:type" content="article" />
	<meta property="og:url" content="<?=$url?>" />
	<meta property="og:image" content="<?=$img?>" />
	<meta property="og:description" content="<?=$desc?>" />
	<meta property="og:site_name" content="<?=$nama?>" />

	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/font-awesome.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/aos.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/select2/select2.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/select2/select2-bootstrap4.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/slick/slick.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/slick/slick-theme.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/swal/sweetalert2.min.css') ?>">
	<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
	<link rel="stylesheet" href="https://ijs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
	<link href='https://css.gg/css' rel='stylesheet'>
	<link rel="stylesheet"  href="<?= base_url('assets/vendor/owl/owl.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/util.min.css') ?>">
  	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/main.css?v='.time()) ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/responsive.css?v='.time()) ?>">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet"> 


	<!--===============================================================================================-->
	<script type="text/javascript" src="<?= base_url('assets/js/jquery-3.5.1.min.js') ?>"></script>

	<!-- GENERATED CUSTOM COLOR -->
	<style rel="stylesheet">
		.colorw{
			color: #fff;
		}
		a:hover,
		.color1{
			color: <?=$set->color1?>;
		}
		.color2{
			color: <?=$set->color2?>;
		}
		.cat-item .nama{
			background: rgba(<?=$set->color1rgba?>,0.75);
		}
		.cat-bg:hover > .nama{
			background: <?=$set->color1?>;
		}
		.bg-1,
		.tab-riwayat .nav-tabs .nav-link.active,
		.header-icons-noti{
			background-color: <?=$set->color1?>;
		}
		.bg-2{
			background-color: <?=$set->color2?>;
		}
		.bdg-1,
		.hovbtn1:hover,
		.arrow-slick1{
			color: #fff;
			background-color: <?=$set->color1?>;
		}
		.hovbtn2:hover{
			color: #333;
			background-color: <?=$set->color2?>;
		}
		.bdg-2,
		.block2-labelnew::before,
		.arrow-slick1:hover{
			color: #fff;
			background-color: <?=$set->color2?>;
		}
		.hov1:hover {
			border: 1px solid <?=$set->color1?>;
			background-color: white;
			color: <?=$set->color1?>;
		}
		.active-pagination1 {
			border-color: <?=$set->color1?>;
			background-color: <?=$set->color1?>;
			color: white;
		}
		.active-pagination1:hover {
			border-color: <?=$set->color1?>;
			background-color: white;
			color: <?=$set->color1?>;
		}
		.toaster,
		.nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active{
			border-bottom: 3px solid <?=$set->color1?>;
			color: <?=$set->color1?>;
		}
		.main_menu > li:hover > a{
			border-bottom: 2px solid <?=$set->color1?>;
		}
		.toaster .img img{
			border: 1px solid <?=$set->color1?>;
		}
		.block2-overlay{ cursor: pointer;}
		.blog:hover .titel{
			color: <?=$set->color1?>;
		}
		.color1{
			color: <?= $color1;?>
		}
		.color2{
			color: <?= $color2;?>
		}
		.colorwhite{
			color: <?= $colorwhite;?>;
		}
		.colorbg{
			background-color: <?= $colorbg;?>
		}
		.bg-color1{
			background-color: <?= $color1;?>
		}
		.bg-color2{
			background-color: <?= $color2;?>
		}
		.colortext{
			color: <?= $colortext;?>
		}
		.btn-color1{
		    background: <?= $color1;?>;
		    color:  <?= $colorwhite;?>
		}
		.btn-color1:hover{
		    background: <?= $color1;?>;
		    color: <?= $colorwhite;?>;
		    webkit-transition: all 0.1s ease-in-out;
		    transition: all 0.1s ease-in-out;
		}
		.btn-outline-color1{
		    background: <?= $colorwhite;?>;
		    color:  <?= $color1;?>;
		}
		.btn-outline-color1:hover{
		    webkit-transition: all 0.1s ease-in-out;
		    transition: all 0.1s ease-in-out;
		    box-shadow: 0px 0px 3px #555;
		    color:  <?= $color1;?>;
		}
		.btn-colorbutton{
			background-color: <?= $colorbutton;?>;
			color: #fff;
		}
		.btn-colorbutton:hover{
			background: <?= $colorbutton;?>;
		    color: #fff;
		    box-shadow: 0px 0px 3px #555;
		    webkit-transition: all 0.1s ease-in-out;
		    transition: all 0.1s ease-in-out;
		}
		.btn-outline-colorbutton{
			background-color: #fff;
			color: <?= $colorbutton;?>;
			border: 1px solid <?= $colorbutton;?>;
		}
		.btn-outline-colorbutton:hover{
			background: <?= $colorbutton;?>;
		    color: #fff;
		    box-shadow: 0px 0px 3px #555;
		    webkit-transition: all 0.1s ease-in-out;
		    transition: all 0.1s ease-in-out;
		}
		.color2{
			color: <?= $colorbutton;?>;
		}
		.coloricon{
			color: <?= $coloricon;?>;
		}
		input.border_bottom{
			border: 0px;
			border-radius: 0px;
			border-bottom: 2px solid <?= $color1;?>;
		}
		.box_border_bottom{
			border: 0px;
			border-radius: 0px;
			border-bottom: 3px dashed #ccc;
		}
		.colorbody{
			background-color:  <?= $colorbody;?>;
		}
		.colorfooter{
			background-color: #fff;
		}
		.border-bottom-active{
			border-bottom: 2px solid <?= $color1;?>;
		}
		.border-bottom-nonaktif{
			border-bottom: 0px;
		}
	</style>
		<script  type="text/javascript" charset="utf-8" async defer>
		$(document).ready(function(){
		   // PAGE IS FULLY LOADED  
		   // FADE OUT YOUR OVERLAYING DIV
		   $('#overlay').fadeOut();
		 
		});
	</script>
	
</head>
<body class="colorbody">

	<!-- Header -->
	<?php  if(isset($titel)){ ?>
	<div class="m-b-120"></div>
	<?php }else{ ?>
	<div class="m-b-100"></div>
	<?php } ?>
	<div id="overlay" class="load">
		
					<div class="img_load mx-auto d-block">
							<img src="<?= base_url('assets/images/load6.gif') ?>"  />
					</div>
					<center><h5 style="position: relative; top: 360px">Mohon Menunggu...</h5></center>
		
				
	</div>
	


	
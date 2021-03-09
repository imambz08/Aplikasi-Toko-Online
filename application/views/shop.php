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
?>
	<header class="header1">
		
		<nav class="navbar navbar-expand-lg  navbar-top-lain fixed bg-color1 absolute">
			<div class="container">
				
				<div class="col-8">
					<a class="navbar-brand hidesmall" href="<?=site_url()?>">
						<img src="<?= base_url('i/assets/img/'.$set->favicon) ?>" height="38" />
					</a>
					<div class="search-product m-b-0 animate__animated animate__slideInDown animate__delay-1s">
						<form action="<?=site_url('shop')?>" class="row" method="GET">
							<input class="col-9 fs-14" type="text" value="" name="cari" id="typed" class="typed" placeholder="Cari sesuatu?">

							<button type="submit" class="col-3 fs-14" style="text-align: right">
								<i class="fas fa-search" aria-hidden="true"></i>
							</button>
						</form>
					</div>
				</div>
				<div class="col-4">
					<ul class="menu_top">
						<div class="hidesmall">
							<li style="margin:0px 30px">
								<a href="<?=site_url('manage')?>" class="btn btn-sm btn-colorbutton">
									Akun
								</a>
							</li>
							<li>
								<?php if($this->func->cekLogin() == true){ ?>
								
										
								<a href="<?=site_url('home/keranjang')?>" class="fs-22  colorwhite">

									<i class="gg-shopping-cart"></i>
									<label class="notif_badge_header bg-color2 color1"><?=$this->func->getKeranjang()?></label>
									
								</a>
								<?php }else{ ?>
								<a href="<?=site_url('home/signin')?>" class="fs-22 colorwhite">
									<i class="gg-shopping-cart"></i>
								</a>
								<?php }?>
							</li>
						
							<li>
								<?php if($this->func->cekLogin() == true){ ?>
								<a href="javascript:void(0)" class="fs-22 colorwhite"  onclick='$("#modalpilihpesan").modal()'>
									<i class="far fa-paper-plane"></i>
								</a>
								<?php }else{ ?>
								<a href="https://wa.me/<?=$this->func->getRandomWasap()?>" target="_blank"   class="fs-22 colorwhite">
									<i class="far fa-paper-plane"></i>
								</a>
								<?php }?>
							</li>

						</div>
						<div class="hide-lg">
							<li class="bg-dark">
								<a href="<?=site_url()?>" class="fs-22 colorwhite">
									<i class="material-icons">arrow_back</i>

								</a>
							</li>
						</div>
						<li>
							<?php if($this->func->cekLogin() == true){ ?>
							<a href="<?=site_url('home/wishlist')?>" class="fs-22 colorwhite">
								<i class="gg-heart"></i>
								<label class="notif_badge_header bg-color2 color1" style="top:-30px; left:13px"><?=$this->func->getWishlistCount()?></label>
							</a>
							<?php }else{ ?>
							<a href="<?=site_url('home/signin')?>" class="fs-22 colorwhite">
								<i class="gg-heart"></i>

							</a>
							<?php }?>
						</li>
						
							
						
					</ul>
				</div>
			</div>
		</nav>
		


		<!-- Bottom Navbar -->
			
		
			
		
	</header>

<?php
	$page = (isset($_GET["page"]) AND $_GET["page"] != "") ? $_GET["page"] : 1;
	$orderby = (isset($_GET["orderby"]) AND $_GET["orderby"] != "") ? $_GET["orderby"] : "stok DESC";
	$cari = (isset($_GET["cari"]) AND $_GET["cari"] != "") ? $this->func->clean($_GET["cari"]) : "";
	$perpage = 12;
?>
	<!-- Content page -->
	<section class="section-shop p-lr-10 p-t-10 p-b-10 colorbg colortext" style="margin-top: -46px">

		<div class="container-fluid colorbg" >
			<div class="row">
				
						<div class="col-4">
							<button type="button" class="btn btn-sm btn-block f-sm-12" data-toggle="modal" data-target="#modal_filter"   id="btn_filter"><i class="fa fa-list"></i> Filter</button>
						</div>
						<div class="col-4">
							<button type="button" class="btn btn-sm btn-block f-sm-12" data-toggle="modal" data-target="#modal_urutkan"   id="btn_urutkan"></i> Urutkan <i class="fa fa-sort"></i></button>
						</div>
						<div class="col-4">
							<button type="button" class="btn btn-sm btn-block f-sm-12" data-toggle="modal" data-target="#modal_kategori"   id="btn_kategori"> Kategori <i class="fa fa-align-center"></i></button>
						</div>
						

						<!--<div class="cat-button" style="display: inline-block;">
							<a href="javascript:void(0)" class="btn btn-primary bo-rad-23 p-l-16 p-r-16 m-r-4 m-b-12 button-kategori"> Semua</a>
							<?php 
								$this->db->where("parent",0);
								$db = $this->db->get("kategori");
								foreach($db->result() as $r){
							?>
								<a href="<?=site_url("kategori/".$r->url)?>" class="btn btn-outline-primary bo-rad-23 p-l-16 p-r-16 m-r-4 m-b-12 button-kategori">
									<?=ucwords(strtolower($r->nama))?>
								</a>
							<?php
								}
							?>
						</div>-->
					
			</div>
		</div>
		
	</section>
	

<section class="produk colorbg colortext m-t-10">
   	<div class="container p-b-10">
  		<div class="row">
  			<div class="col-6 animate__animated animate__slideInLeft  animate__delay-3s" style="text-align: left; height: 35px; line-height: 45px">
  				<span class="fs-12 color1">SEMUA PRODUK</span>
  			</div>
  			<div class="col-6 animate__animated animate__fadeInDown  animate__delay-3s" style="text-align: right;height: 35px; line-height: 45px">
  				
  			</div>
  		</div>
  		<div class="row display-flex produk-wrap">
				<?php
					$this->db->select("SUM(stok) AS stok,idproduk");
								$this->db->group_by("idproduk");
								$dbvar = $this->db->get("produkvariasi");
								$notin = array();
								foreach($dbvar->result() as $not){
									if($not->stok <= 0){
										$notin[] = $not->idproduk;
									}
								}
				
								$where = "(nama LIKE '%$cari%' OR harga LIKE '%$cari%' OR hargareseller LIKE '%$cari%' OR hargaagen LIKE '%$cari%' OR deskripsi LIKE '%$cari%') AND status = 1 AND preorder != 1 AND stok > 0";
								$this->db->where($where);
								if(count($notin) > 0){
									$this->db->where_not_in($notin);
								}
								$dbs = $this->db->get("produk");
								
								$this->db->where($where);
								if(count($notin) > 0){
									$this->db->where_not_in($notin);
								}
								$this->db->limit($perpage,($page-1)*$perpage);
								$this->db->order_by($orderby);
								$db = $this->db->get("produk");
								$totalproduk = 0;
								
								foreach($db->result() as $r){
									$level = isset($_SESSION["lvl"]) ? $_SESSION["lvl"] : 0;
									if($level == 5){
										$result = $r->hargadistri;
									}elseif($level == 4){
										$result = $r->hargaagensp;
									}elseif($level == 3){
										$result = $r->hargaagen;
									}elseif($level == 2){
										$result = $r->hargareseller;
									}else{
										$result = $r->harga;
									}
									$ulasan = $this->func->getReviewProduk($r->id);

									$this->db->where("idproduk",$r->id);
									$dbv = $this->db->get("produkvariasi");
									$totalstok = ($dbv->num_rows() > 0) ? 0 : $r->stok;
									$hargs = 0;
									$harga = array();
									foreach($dbv->result() as $rv){
										$totalstok += $rv->stok;
										if($level == 5){
											$harga[] = $rv->hargadistri;
										}elseif($level == 4){
											$harga[] = $rv->hargaagensp;
										}elseif($level == 3){
											$harga[] = $rv->hargaagen;
										}elseif($level == 2){
											$harga[] = $rv->hargareseller;
										}else{
											$harga[] = $rv->harga;
										}
										$hargs += $rv->harga;
									}

									if($totalstok > 0){
										$totalproduk += 1;
										$wishis = ($this->func->cekWishlist($r->id)) ? "active" : "";
				?>
					<div class="col-6 col-md-3 m-b-30 cursor-pointer produk-item">
						<!-- Block2 -->
						<div class="block2">
							
							<div class="block2-img wrap-pic-w of-hidden pos-relative"  onclick="window.location.href='<?php echo site_url('produk/'.$r->url); ?>'">
								<img loading="lazy" src="<?= base_url('assets/images/no_image.png');?>" data-src="<?=$this->func->getFoto($r->id,"utama");?>" class="lazy" alt="">
							</div>
							<div class="row block2-ulasan">
								<div class='col-12'>
									<button class="block2-wishlist" onclick="tambahWishlist(<?=$r->id?>,'<?=$r->nama?>')"><i class="fas fa-heart <?=$wishis?>"></i></button>
									<span class="color1 fs-14"><i class="fa fa-comment"> <small><?=$ulasan['ulasan']?></small> 	</i> |  <i class='fa fa-star'></i> <small><?=$ulasan['nilai']?></small> </span>
								</div>
							</div>
							<div class="block2-txt" onclick="window.location.href='<?php echo site_url('produk/'.$r->url); ?>'">
								<a href="<?php echo site_url('produk/'.$r->url); ?>" class="block2-name dis-block p-b-5 colortext">
									<?=$r->nama?>
								</a>
								<span class="block2-price-coret btn-block colortext">
									<?php if($r->hargacoret > 0){ echo "Rp. ".$this->func->formUang($r->hargacoret); } ?>
								</span>
								<b>
								<span class="block2-price p-r-5 color1">
									<?php 
										if($hargs > 0){
											echo "Rp. ".$this->func->formUang(min($harga))." - ".$this->func->formUang(max($harga));
										}else{
											echo "Rp. ".$this->func->formUang($result);
										}
									?>
								</span>
								</b>
								<br>
							</div>
							
						</div>
					</div>
				<?php
						}
					}
							
					if($totalproduk == 0){
						echo "<div class='col-12 text-center m-tb-40'><h2><mark>Produk Kosong</mark></h2></div>";
					}
				?>
					</div>
					<!-- Pagination -->
						<div class="pagination flex-m flex-w p-t-26">
							<?php
								if($totalproduk > 0){
									echo $this->func->createPagination($dbs->num_rows(),$page,$perpage);
								}
							?>
						</div>
  		
	</div>
</section>
<section class="produk colorbg colortext m-t-10">
   	<div class="container p-b-10">
  		<div class="row">
  			<div class="col-6 animate__animated animate__slideInLeft  animate__delay-3s" style="text-align: left; height: 35px; line-height: 45px">
  				<span class="fs-12 color1">PRODUK PRE-ORDER</span>
  			</div>
  			<div class="col-6 animate__animated animate__fadeInDown  animate__delay-3s" style="text-align: right;height: 35px; line-height: 45px">
  				
  			</div>
  		</div>
  		<div class="row display-flex produk-wrap">
				<?php
					$this->db->select("SUM(stok) AS stok,idproduk");
								$this->db->group_by("idproduk");
								$dbvar = $this->db->get("produkvariasi");
								$notin = array();
								foreach($dbvar->result() as $not){
									if($not->stok <= 0){
										$notin[] = $not->idproduk;
									}
								}
				
								$where = "(nama LIKE '%$cari%' OR harga LIKE '%$cari%' OR hargareseller LIKE '%$cari%' OR hargaagen LIKE '%$cari%' OR deskripsi LIKE '%$cari%') AND status = 1 AND preorder = 1 AND stok > 0";
								$this->db->where($where);
								if(count($notin) > 0){
									$this->db->where_not_in($notin);
								}
								$dbs = $this->db->get("produk");
								
								$this->db->where($where);
								if(count($notin) > 0){
									$this->db->where_not_in($notin);
								}
								$this->db->limit($perpage,($page-1)*$perpage);
								$this->db->order_by($orderby);
								$db = $this->db->get("produk");
								$totalproduk = 0;
								
								foreach($db->result() as $r){
									$level = isset($_SESSION["lvl"]) ? $_SESSION["lvl"] : 0;
									if($level == 5){
										$result = $r->hargadistri;
									}elseif($level == 4){
										$result = $r->hargaagensp;
									}elseif($level == 3){
										$result = $r->hargaagen;
									}elseif($level == 2){
										$result = $r->hargareseller;
									}else{
										$result = $r->harga;
									}
									$ulasan = $this->func->getReviewProduk($r->id);

									$this->db->where("idproduk",$r->id);
									$dbv = $this->db->get("produkvariasi");
									$totalstok = ($dbv->num_rows() > 0) ? 0 : $r->stok;
									$hargs = 0;
									$harga = array();
									foreach($dbv->result() as $rv){
										$totalstok += $rv->stok;
										if($level == 5){
											$harga[] = $rv->hargadistri;
										}elseif($level == 4){
											$harga[] = $rv->hargaagensp;
										}elseif($level == 3){
											$harga[] = $rv->hargaagen;
										}elseif($level == 2){
											$harga[] = $rv->hargareseller;
										}else{
											$harga[] = $rv->harga;
										}
										$hargs += $rv->harga;
									}

									if($totalstok > 0){
										$totalproduk += 1;
										$wishis = ($this->func->cekWishlist($r->id)) ? "active" : "";
				?>
					<div class="col-6 col-md-3 m-b-30 cursor-pointer produk-item">
						<!-- Block2 -->
						<div class="block2">
							
							<div class="block2-img wrap-pic-w of-hidden pos-relative"  onclick="window.location.href='<?php echo site_url('produk/'.$r->url); ?>'">
								<img loading="lazy" src="<?= base_url('assets/images/no_image.png');?>" data-src="<?=$this->func->getFoto($r->id,"utama");?>" class="lazy" alt="">
							</div>
							<div class="row block2-ulasan">
								<div class='col-12'>
									<button class="block2-wishlist" onclick="tambahWishlist(<?=$r->id?>,'<?=$r->nama?>')"><i class="fas fa-heart <?=$wishis?>"></i></button>
									<span class="color1 fs-14"><i class="fa fa-comment"> <small><?=$ulasan['ulasan']?></small> 	</i> |  <i class='fa fa-star'></i> <small><?=$ulasan['nilai']?></small> </span>
								</div>
							</div>
							<div class="block2-txt" onclick="window.location.href='<?php echo site_url('produk/'.$r->url); ?>'">
								<a href="<?php echo site_url('produk/'.$r->url); ?>" class="block2-name dis-block p-b-5 colortext">
									<?=$r->nama?>
								</a>
								<span class="block2-price-coret btn-block colortext">
									<?php if($r->hargacoret > 0){ echo "Rp. ".$this->func->formUang($r->hargacoret); } ?>
								</span>
								<b>
								<span class="block2-price p-r-5 color1">
									<?php 
										if($hargs > 0){
											echo "Rp. ".$this->func->formUang(min($harga))." - ".$this->func->formUang(max($harga));
										}else{
											echo "Rp. ".$this->func->formUang($result);
										}
									?>
								</span>
								</b>
								<br>
							</div>
							
						</div>
					</div>
				<?php
						}
					}
							
					if($totalproduk == 0){
						echo "<div class='col-12 text-center m-tb-40'><h2><mark>Produk Kosong</mark></h2></div>";
					}
				?>
					</div>
					<!-- Pagination -->
						<div class="pagination flex-m flex-w p-t-26">
							<?php
								if($totalproduk > 0){
									echo $this->func->createPagination($dbs->num_rows(),$page,$perpage);
								}
							?>
						</div>
  		
	</div>
</section>


	<div class="modal animate__animated animate__slideInUp animate__slow" id="modal_filter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content modal_fixed">
				<div class="modal-body">
					<div class="">
						<h1>Fitur Ini belum tersedia</h1>
					</div>
				</div>


			</div>

		</div>
	</div>

	<div class="modal animate__animated animate__slideInUp animate__slow" id="modal_urutkan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content modal_fixed">
				<div class="modal-body">
					<div class="">
						<h1>urutkan</h1>
					</div>
				</div>


			</div>

		</div>
	</div>

	<div class="modal animate__animated animate__slideInUp animate__slow" id="modal_kategori" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content modal_fixed">
				<div class="modal-header">
					<h5 class="fs-14 color1 modal-title">Cari Berdasarkan Kategori</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="float: left">
			          <span aria-hidden="true">&times;</span>
			        </button>
				</div>
				<div class="modal-body">
					<div class="">
						<div class="cat-button" style="display: inline-block;">
							<a href="javascript:void(0)" class="btn btn-colorbutton bo-rad-23 p-l-16 p-r-16 m-r-4 m-b-12 button-kategori"> Semua</a>
							<?php 
								$this->db->where("parent",0);
								$db = $this->db->get("kategori");
								foreach($db->result() as $r){
							?>
								<a href="<?=site_url("kategori/".$r->url)?>" class="btn btn-outline-colorbutton bo-rad-23 p-l-16 p-r-16 m-r-4 m-b-12 button-kategori">
									<?=ucwords(strtolower($r->nama))?>
								</a>
							<?php
								}
							?>
						</div>
					</div>
				</div>


			</div>

		</div>
	</div>
	
	<script type="text/javascript">
		function refreshTabel(page){
			window.location.href = "<?=site_url("shop?cari=".$cari)?>&page="+page;
		}


	</script>

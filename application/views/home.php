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
		
		<nav class="navbar navbar-expand-lg  navbar-top-transparan absolute">
			<div class="container">
				
				<div class="col-8">
					<a class="navbar-brand hidesmall" href="<?=site_url()?>">
						<img src="<?= base_url('i/assets/img/'.$set->favicon) ?>" height="38" />
					</a>
					<div class="search-product m-b-0 animate__animated animate__slideInDown animate__delay-1s">
						<form action="<?=site_url('shop')?>" class="row" method="GET">
							<input class="col-9 fs-14" type="text" value="" name="cari" id="typed" class="typed" placeholder="">

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
								<a href="<?=site_url('home/keranjang')?>" class="fs-22 hidesmall colorwhite">
									<i class="gg-shopping-cart"></i>
								</a>
								<?php }else{ ?>
								<a href="<?=site_url('home/signin')?>" class="fs-22 hidesmall colorwhite">
									<i class="gg-shopping-cart"></i>
								</a>
								<?php }?>
							</li>
						</div>
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
						<li>
							<?php if($this->func->cekLogin() == true){ ?>
							<a href="<?=site_url('home/wishlist')?>" class="fs-22 colorwhite">
								<i class="gg-heart"></i>
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
		<nav class="navbar navbar-expand-lg  navbar-top-warna  hide bg-color1">
			<div class="container">
				
				<div class="col-8">
					<a class="navbar-brand hidesmall" href="<?=site_url()?>">
						<img src="<?= base_url('i/assets/img/'.$set->favicon) ?>" height="38" />
					</a>
					<div class="search-product m-b-0">
						<form action="<?=site_url('shop')?>" class="row" method="GET">
							<input class="col-9 fs-14" type="text" value="" name="cari"  class="typed" placeholder="Cari disini...">

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
								
										
								<a href="<?=site_url('home/keranjang')?>" class="fs-22 hidesmall colorwhite">

									<i class="gg-shopping-cart"></i>
									<label class="notif_badge_header bg-color2 color1"><?=$this->func->getKeranjang()?></label>
									
								</a>
								<?php }else{ ?>
								<a href="<?=site_url('home/signin')?>" class="fs-22 hidesmall colorwhite">
									<i class="gg-shopping-cart"></i>
								</a>
								<?php }?>
							</li>
						</div>
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
			
		<nav class="navbar navbar-expand d-md-none d-lg-none d-xl-none fixed-bottom navbar-bottom animate__animated animate__fadeInUp animate__delay-3s" style="background-color: transparent;">
			
					<div class="container-fluid navbar-nav nav-justified container_nav"  id="container_navbar">
						
							<div class="col-sm-4 nav-item nav-kiri hide">
								<ul class="navbar-nav nav-justified" style="margin-left: 0px">
									<a href="<?=site_url()?>"><li class="menu-bot coloricon"><i class="material-icons">store</i></li></a>
									 <a href="<?=site_url("manage/pesanan")?>"><li class="menu-bot coloricon"><i class="material-icons">local_mall</i></li></a>
								</ul>
							</div>
							<div class="col-sm-4 nav-item">
								<input type="hidden" value="0" id="value_menu">
								<?php if($this->func->cekLogin() == true){ ?><label class="notif_badge_menu bg-color1" id="notif_badge_menu"><?=$this->func->getKeranjang()?></label>
										<?php } ?>
								<div class="nav-menu menu-in" id="menu"> <i class="fa fa-th">	</i> </div>
							</div>
							<div class="col-sm-4 nav-item nav-kanan hide">
								<ul class="navbar-nav nav-justified" style="float:right;">
									 <a href="<?=site_url("home/keranjang")?>"><li class="menu-bot coloricon">
										<?php if($this->func->cekLogin() == true){ ?><label class="notif_badge" style="color:#fff !important"><?=$this->func->getKeranjang()?></label>
										<?php } ?>
										<i class="material-icons">shopping_cart</i>

										
									</li></a>
									<a href="<?=site_url("manage")?>"><li class="menu-bot coloricon">
											<i class="material-icons">account_circle</i></li>
										
									</li></a>
								</ul>
							</div>
							
						
					</div>
					
				

				
				
			
		</nav>
	</header>
 <!-- Swiper Slide -->
  <div class="swiper-container" id="slide">
    <div class="swiper-wrapper">
	<?php
		$this->db->where("tgl<=",date("Y-m-d H:i:s"));
		$this->db->where("tgl_selesai>=",date("Y-m-d H:i:s"));
		$this->db->where("jenis",1);
		$this->db->where("status",1);
		$this->db->order_by("id","DESC");
		$sld = $this->db->get("promo");
		if($sld->num_rows() > 0){
			foreach($sld->result() as $s){
	?>
      <div class="swiper-slide" style="background-image: url('<?= base_url('i/promo/'.$s->gambar);?> '); background-size:100% 100%"></div>
      <?php
				}
			}
		?>
    </div>
    <!-- Add Pagination -->
    <div class="swiper-pagination" id="pag-slide" style="text-align: left !important; text-indent: 10px; ;left: 0px !important"></div>
    <!-- Add Arrows -->
    
  </div>
  <!-- /End Slide -->

   <section class="kategori colorbg colortext"  style="margin-top: -100px;">
   	<div class="container">
  		<div class="row colortext">
  			<div class="col-6 animate__animated animate__slideInLeft  animate__delay-2s" style="text-align: left; height: 35px; line-height: 45px">
  				<span class="fs-12 color1 ">KATEGORI</span>
  			</div>
  			<div class="col-6 animate__animated animate__fadeIn animate__delay-2s" style="text-align: right;height: 35px; line-height: 45px">
  				<span class="fs-12 "><a href="#" class="colortext">Lihat Lainnya <i class="fa fa-chevron-right"></i></a></span>
  			</div>
  		</div>
  		<div class="row">
  			<div class="col-12">
			    <div class="owl-carousel owl-theme m-t-5">
			  	
				  	<?php
								$this->db->where("parent",0);
								$db = $this->db->get("kategori");
								foreach($db->result() as $r){
							?>
				    <div class="item  animate__animated animate__fadeInDown animate__delay-2s text-center text-truncate">
				    	<div class="kategori-container" onclick="window.location.href='<?=site_url("kategori/".$r->url)?>'">
				    		<img src="<?=base_url("i/kategori/".$r->icon)?>" alt="">
				    	</div>
				    	<span class="nama_kategori fs-12"><?=$r->nama?></span>
				    </div>
				    <?php
								}
							?>
				    
				</div>
			</div>
		</div>
	</div>
    </section>
    <section class="produk colorbg colortext m-t-10">
   	<div class="container">
  		<div class="row">
  			<div class="col-6 animate__animated animate__slideInLeft  animate__delay-3s" style="text-align: left; height: 35px; line-height: 45px">
  				<span class="fs-12 color1">REKOMENDASI</span>
  			</div>
  			<div class="col-6 animate__animated animate__fadeInDown  animate__delay-3s" style="text-align: right;height: 35px; line-height: 45px">
  				<span class="fs-12"><a href="<?= site_url("shop");?>" class="colortext">Lihat Lainnya <i class="fa fa-chevron-right"></i></a></span>
  			</div>
  		</div>
  		<div class="row display-flex produk-wrap">
				<?php
					$this->db->where("preorder !=",1);
					$this->db->limit(8);
					$this->db->order_by("stok DESC,tglupdate DESC");
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

						if($totalstok > 0 AND $totalproduk < 12){
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
									<span class="color1 f-sm-10 f-md-12"><i class="fa fa-comment"> <?=$ulasan['ulasan']?> 	</i> |  <i class='fa fa-star'></i> <?=$ulasan['nilai']?> <?php if($this->func->getTerjualBerapa($r->id) > 0):?> | Terjual <?= $this->func->getTerjualBerapa($r->id);?> <?php endif;?> </span>
								</div>
							</div>
							<div class="block2-txt" onclick="window.location.href='<?php echo site_url('produk/'.$r->url); ?>'">
								<a href="<?php echo site_url('produk/'.$r->url); ?>" class="block2-name dis-block p-b-5 colortext">
									<?=$r->nama?>
								</a>
								<span class="block2-price-coret btn-block colortext">
									<?php if($r->hargacoret > 0){ echo "IDR ".$this->func->formUang($r->hargacoret); } ?>
								</span>
								<b>
								<span class="block2-price p-r-5 color1">
									<?php 
										if($hargs > 0){
											echo "IDR ".$this->func->formUang(min($harga))." - ".$this->func->formUang(max($harga));
										}else{
											echo "IDR ".$this->func->formUang($result);
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
  		
	</div>
    </section>


    <section class="produk colorbg colortext m-t-10">
   	<div class="container">
  		<div class="row">
  			<div class="col-6 animate__animated animate__slideInLeft  animate__delay-3s" style="text-align: left; height: 35px; line-height: 45px">
  				<span class="fs-12 color1">TERLARIS</span>
  			</div>
  			<div class="col-6 animate__animated animate__fadeInDown  animate__delay-3s" style="text-align: right;height: 35px; line-height: 45px">
  				<span class="fs-12">Lihat Lainnya <i class="fa fa-chevron-right"></i></span>
  			</div>
  		</div>
  		<div class="row display-flex produk-wrap">
				<?php
					/*$this->db->where("preorder !=",1);
					$this->db->limit(8);
					$this->db->order_by("stok DESC,tglupdate DESC");
					$db = $this->db->get("produk");*/
					$this->db->select('*, COUNT(idproduk) AS jumlah_jual');
					$this->db->from('transaksiproduk');
					$this->db->join('produk', 'produk.id=transaksiproduk.idproduk');
					$this->db->group_by('transaksiproduk.idproduk');
					$this->db->order_by('jumlah_jual DESC');
					$db = $this->db->get();
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

						if($totalstok > 0 AND $totalproduk < 12){
							$totalproduk += 1;
							$wishis = ($this->func->cekWishlist($r->id)) ? "active" : "";
				?>
					<div class="col-6 col-md-3 m-b-30 cursor-pointer produk-item">
						<!-- Block2 -->
						<div class="block2">
							
							<div class="block2-img wrap-pic-w of-hidden pos-relative" style="background-image:url('<?=$this->func->getFoto($r->id,"utama")?>');" onclick="window.location.href='<?php echo site_url('produk/'.$r->url); ?>'"></div>
							<div class="row block2-ulasan" onclick="window.location.href='<?php echo site_url('produk/'.$r->url); ?>'">
								<div class='col-12'>
									<button class="block2-wishlist" onclick="tambahWishlist(<?=$r->id?>,'<?=$r->nama?>')"><i class="fas fa-heart <?=$wishis?>"></i></button>
									<span class="color1 f-sm-10 f-md-12"><i class="fa fa-comment"> <?=$ulasan['ulasan']?> 	</i> |  <i class='fa fa-star'></i> <?=$ulasan['nilai']?> <?php if($this->func->getTerjualBerapa($r->id) > 0):?> | Terjual <?= $this->func->getTerjualBerapa($r->id);?> <?php endif;?> </span>
								</div>
							</div>
							<div class="block2-txt" onclick="window.location.href='<?php echo site_url('produk/'.$r->url); ?>'">
								<a href="<?php echo site_url('produk/'.$r->url); ?>" class="block2-name dis-block p-b-5 colortext">
									<?=$r->nama?>
								</a>
								<span class="block2-price-coret btn-block colortext">
									<?php if($r->hargacoret > 0){ echo "IDR ".$this->func->formUang($r->hargacoret); } ?>
								</span>
								<b>
								<span class="block2-price p-r-5 color1">
									<?php 
										if($hargs > 0){
											echo "IDR ".$this->func->formUang(min($harga))." - ".$this->func->formUang(max($harga));
										}else{
											echo "IDR ".$this->func->formUang($result);
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
  		
	</div>
    </section>
	
	
	
	

	<!-- Testismoni -->
	<section class="testismoni colorbg colortext m-t-10">
		<div class="container">
			<div class="row">
	  			<div class="col-6 animate__animated animate__slideInLeft  animate__delay-3s" style="text-align: left; height: 35px; line-height: 45px">
	  				<span class="fs-12 color1">TESTIMONI</span>
	  			</div>
	  			<div class="col-6 animate__animated animate__fadeInDown  animate__delay-3s" style="text-align: right;height: 35px; line-height: 45px">
	  				<span class="fs-12">Lihat Lainnya <i class="fa fa-chevron-right"></i></span>
	  			</div>
	  		</div>
			<div class="testimoni">
				<div class="m-r-24"></div>
			<?php
				$this->db->where("status",1);
				$this->db->limit(9);
				$db = $this->db->get("testimoni");
				foreach($db->result() as $r){
			?>
				<div class="testimoni-item">
					<div class="testimoni-wrap">
						<div class="row m-lr-0">
							<div class="col-3 p-lr-0">
								<div class="testimoni-img" style="background-position:center center;background-image:url('<?=base_url("i/uploads/".$r->foto)?>');background-size:cover;"></div>
							</div>
							<div class="col-9 p-r-4">
								<div class="font-bold color1 fs-14 ellipsis"><?=$r->nama?></div>
								<div class="fs-12"><?=$r->jabatan?></div>
							</div>
						</div>
						<div class="m-t-10 testimoni-komentar" style="max-height: 200px">" <?=$r->komentar?> "</div>
						
					</div>
				</div>
			<?php
				}
			?>
			</div>
		</div>
	</section>

	

	<script type="text/javascript">

			



		function refreshTabel(page){
			window.location.href = "<?=site_url("blog")?>?page="+page;
		}
	</script>

	<?php $notif_booster = $this->func->getSetting("notif_booster"); if($notif_booster == 1){ ?>
	<div id="toaster" class="toaster row col-md-4" style="display:none;">
		<div class="col-3 img p-lr-6"><img id="toast-foto" src="<?=base_url("i/uploads/520200116140232.jpg")?>" /></div>
		<div class="col-9 p-lr-6">
			<h5 id="toast-user" class="f-sm-12 f-md-14" style="font-weight: bold"><strong class="">USER</strong></h5> <span class="f-sm-12 f-md-14">telah membeli</span> <span id="toast-produk" class="f-sm-12 f-md-14">Nama Produknya</span>
		</div>
	</div>
	<?php } ?>
	<script src="<?= base_url('assets/vendor/owl/owl.min.js') ?>" type="text/javascript" charset="utf-8" async defer></script>
	<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			//Navbar Top
			$(window).bind('scroll', function () {
			    if ($(window).scrollTop() > 110) {
			      
			       $('.navbar-top-warna').removeClass('hide');
			       $('.navbar-top-warna').addClass('fixed animate__animated animate__slideInDown');
			    } else {
			        $('.navbar-top-warna').addClass('hide');
			       $('.navbar-top-warna').removeClass('fixed animate__animated animate__slideInDown');
			    }
			});

			$('#menu').click(function(){
				let kondisi = $('#value_menu').attr('value');
			
				if (kondisi == 0) {
					$('#container_navbar').addClass('bg-color2');
					$('.container_nav').css("box-shadow", "0px 0px 15px #555");
					$('.container_nav').css("border-radius", "5px");
					$('#notif_badge_menu').addClass('hide');

					$('#value_menu').val("1");

					$('.nav-kiri').removeClass('hide');
					$('.nav-kiri').addClass('animate__animated animate__fadeInLeft');

					$('.nav-kanan').removeClass('hide');
					$('.nav-kanan').addClass('animate__animated animate__fadeInRight');


					$('#menu').removeClass('menu-in');
					$('#menu').addClass('menu-out');
				}
				else{
					$('#container_navbar').removeClass('bg-color2 animate__animated animate__fadeIn');
					$('.container_nav').removeAttr("style");

					$('#notif_badge_menu').removeClass('hide');
					$('.navbar-nav').removeClass('bg-color2');
					$('#value_menu').val("0");

					$('.nav-kiri').removeClass('animate__animated animate__fadeInLeft');
					$('.nav-kiri').addClass('hide');
					
					

					$('.nav-kanan').removeClass('animate__animated animate__fadeInRight');
					$('.nav-kanan').addClass('hide');
					

					$('#menu').removeClass('menu-out');
					$('#menu').addClass('menu-in');
					
				}
			});

			//Auto Text
			new Typed('#typed',{
			  strings : ['Cari produk disini...','Dapatkan diskon!','Gratis Ongkir!'],
			  typeSpeed : 200,
			  delaySpeed : 300,
			  loop : false,
			});


			//Slide Banner
			var swiper = new Swiper('#slide', {
		      spaceBetween: 30,
		      centeredSlides: true,
		      autoplay: {
		        delay: 5000,
		        disableOnInteraction: false,
		      },
		      pagination: {
		        el: '#pag-slide',
		        clickable: true,
		      },
		    });

			//Slide Kategori
		    $('.owl-carousel').owlCarousel({
			    loop:true,
			    margin:20,
			    responsive:{
			        0:{
			            items:5
			        },
			        600:{
			            items:7
			        },
			        1000:{
			            items:8
			        }
			    },
			    lazyLoad:true,
			});

		    function updateToken(token){
				$("#tokens,.tokens").val(token);
			}

		    


		    
				

			
		});

		$(function(){
			$('.carousel .slick-slide').on('click', function(ev){
				var slideIndex = $(ev.currentTarget).data('slick-index');
				var current = $('.carousel').slick('slickCurrentSlide');
				if(slideIndex == current){
					window.location.href= $(this).data("onclick");
				}else{
					$('.carousel').slick('slickGoTo',parseInt(slideIndex));
				}
			});
		});

		<?php if($notif_booster == 1){ ?>
		$(function(){
			setTimeout(() => {
				toaster();
			}, 1000);
			
		});

		function toaster(){
			$.post("<?=site_url("assync/booster")?>",{"id":0,[$("#names").val()]:$("#tokens").val()},function(msg){
				var data = eval("("+msg+")");
				updateToken(data.token);
				if(data.success == true){
					$("#toast-foto").attr("src",data.foto);
					$("#toast-user").html(data.user);
					$("#toast-produk").html(data.produk);

					$("#toaster").show("slow");
					setTimeout(() => {
						$("#toaster").hide("slow");
						setTimeout(() => {
							toaster();
						}, 3000);
					}, 5000);
				}else{
					setTimeout(() => {
						toaster();
					}, 5000);
				}
			});
		}
		<?php } ?>
	</script>
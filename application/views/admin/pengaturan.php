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
		
		<nav class="navbar  navbar-expand-lg  navbar-top-transparan nav-akun absolute">
			<div class="container">
				
				<div class="col-8">
					<div class="hide-lg" style="position: relative; left: -30px; height:38px; line-height: 38px">
				        <ul class="menu_top" style="float: left; margin-top: 6px">
				          <li class="" style="float: left">
				            <a href="<?=site_url()?>" class="fs-22 colorwhite">
				              <i class="material-icons">arrow_back</i>

				            </a>
				          </li>
				          <h5 class="text-light fs-18" style="margin-left: 48px">Akun Saya</h5>
				        </ul>
				    </div>
					<a class="navbar-brand hidesmall" href="<?=site_url()?>">
						<img src="<?= base_url('i/assets/img/'.$set->favicon) ?>" height="38" />
					</a>
					<div class="search-product m-b-0 animate__animated animate__slideInDown animate__delay-1s hidesmall">
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
					<div class="hide-lg" style="position: relative; left: -30px; height:38px; line-height: 38px">
				        <ul class="menu_top" style="float: left; margin-top: 6px">
				          <li class="" style="float: left">
				            <a href="<?=site_url()?>" class="fs-22 colorwhite">
				              <i class="material-icons">arrow_back</i>

				            </a>
				          </li>
				          <h5 class="text-light fs-18" style="margin-left: 48px">Akun Saya</h5>
				        </ul>
				    </div>
					<a class="navbar-brand hidesmall" href="<?=site_url()?>">
						<img src="<?= base_url('i/assets/img/'.$set->favicon) ?>" height="38" />
					</a>
					<div class="search-product m-b-0 hidesmall">
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
								<a href="<?=site_url('home/manage')?>" class="btn btn-sm btn-colorbutton">
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
<!-- Product Detail -->
	<?php
		$profil = $this->func->getProfil($_SESSION["usrid"],"semua","usrid");
		$user = $this->func->getUser($_SESSION["usrid"],"semua");
		if ($user->level == 1) {
			$level = "Member Silver";
		}else if($user->level == 2){
			$level = "Reseller";
		}else if($user->level == 3){
			$level = "Agen";
		}else{
			$level = "Distributor";
		}
	?>
	<section class="sec-product-detail sec-akun p-t-0 p-b-10 colorbg colortext">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">	
					<div class="prod-preview-akun" style="background-color:#f1f2f3">
						<img src="<?php echo base_url("assets/images/akun_profil.jpg"); ?>" alt="IMG-PRODUCT" id="prod-img">
						<div class="p-t-10 p-lr-10 p-b-10 sec-profil">
							<h5 class="text-light font-bold f-sm-14 f-md-24"><strong><?= $profil->nama;?></strong></h5>
							<h5 class="member f-sm-12 f-md-14 bg-color1 text-light"><?= $level;?> <i class="fa fa-chevron-right"></i></h5>
							<h5 class="text-light f-sm-10 f-md-14">Pengikut 8 | Mengikuti 3</h5>
						</div>
					</div>
				</div>

			</div>
		</div>
	</section>

	<section class="sec-akun-menu colortext">
		<div class="container-fluid">
			<div class="row p-o-md-20">
				<div class="col-md-4 col-12 colorbg br-md-5">
					<div class="pesanan_saya_pengaturan container-fluid colorbg p-o-sm-10 p-o-md-20">
						<div class="row border-bottom">
							<div class="col-6 m-b-10">
								<span class="f-sm-14 f-md-16 color1"><i class="fa fa-shopping-bag"></i> Pesanan Saya</span>
							</div>
							<div class="col-6 m-b-10 text-right" style="float: right">
								<a href="<?= site_url('manage/pesanan');?>" class="text-secondary"><span class="f-sm-12 f-md-14">Lihat Riwayat Pesanan <i class="fa fa-chevron-right"></i></span></a>
							</div>
						</div>
						<div class="row text-center m-t-10 m-b-10">
							<div class="col-3">
								<a href="<?= site_url('manage/pesanan');?>" class="text-secondary">
									<span class="f-sm-16 f-md-20"><i class="fas fa-wallet"></i></span><br>
									<span class="f-sm-8 f-md-10">Belum Bayar</span>
								</a>
							</div>
							<div class="col-3">
								<a href="<?= site_url('manage/pesanan');?>" class="text-secondary">
									<span class="f-sm-16 f-md-20"><i class="fas fa-box"></i></span><br>
									<span class="f-sm-8 f-md-10"> Dikemas</span>
								</a>
							</div>
							<div class="col-3">
								<a href="<?= site_url('manage/pesanan');?>" class="text-secondary">
									<span class="f-sm-16 f-md-20"><i class="fas fa-shipping-fast"></i></span><br>
									<span class="f-sm-8 f-md-10"> Dikirim</span>
								</a>
							</div>
							<div class="col-3">
								<a href="<?= site_url('manage/pesanan');?>" class="text-secondary">
									<span class="f-sm-16 f-md-20"><i class="fas fa-star"></i></span><br>
									<span class="f-sm-8 f-md-10"> Beri Nilai</span>
								</a>
							</div>
						</div>
						<div class="row">
							<div class="col-12" style="height:10px; background-color:#eaeaea; position: absolute; left: 0"></div>
						</div>
						<div class="row border-bottom m-t-10" style="padding-top:10px">
							<div class="col-6 m-b-10">
								<a href="javascript:void(0)" onclick="memberSaya()">
									<span class="f-sm-14 f-md-16 color1"><i class="fa fa-id-card-alt"></i> Member Saya</span>
								</a>
							</div>
							<div class="col-6 m-b-10 text-right" style="float: right">
								<a href="#" class="text-secondary"><span class="f-sm-12 f-md-14"><?= $level;?> <i class="fa fa-chevron-right"></i></span></a>
							</div>
						</div>
						<div class="row border-bottom m-t-10">
							<div class="col-6 m-b-10">
								<a href="<?= site_url('home/wishlist');?>">
										<span class="f-sm-14 f-md-16 color1"><i class="fa fa-heart"></i> Favorit Saya</span>
								</a>
							</div>
							<div class="col-6 m-b-10 text-right" style="float: right">
								<a href="<?= site_url('home/wishlist');?>" class="text-secondary"><span class="f-sm-12 f-md-14"><?=$this->func->getWishlistCount()?> Favorit <i class="fa fa-chevron-right"></i></span></a>
							</div>
						</div>
						<div class="row border-bottom m-t-10">
							<div class="col-6 m-b-10">
								<a href="javascript:void(0)" onclick="memberSaya()">
									<span class="f-sm-14 f-md-16 color1"><i class="fa fa-history"></i> Terakhir Dilihat</span>
								</a>
							</div>
							<div class="col-6 m-b-10 text-right" style="float: right">
								<a href="#" class="text-secondary"><span class="f-sm-12 f-md-14"> <i class="fa fa-chevron-right"></i></span></a>
							</div>
						</div>
						<div class="row border-bottom m-t-10">
							<div class="col-10 m-b-10">
								<a href="javascript:void(0)" onclick="memberSaya()">
									<span class="f-sm-14 f-md-16 color1"><i class="fa fa-video"></i> <?php echo $this->func->globalset("nama"); ?> Live</span>
								</a>
							</div>
							<div class="col-2 m-b-10 text-right" style="float: right">
								<a href="#" class="text-secondary"><span class="f-sm-12 f-md-14"> <i class="fa fa-chevron-right"></i></span></a>
							</div>
						</div>
						<div class="row border-bottom m-t-10">
							<div class="col-10 m-b-10">
								<a href="javascript:void(0)" onclick="memberSaya()">
									<span class="f-sm-14 f-md-16 color1"><i class="fa fa-wallet"></i> <?php echo $this->func->globalset("nama"); ?> Pay</span>
								</a>
							</div>
							<div class="col-2 m-b-10 text-right" style="float: right">
								<a href="#" class="text-secondary"><span class="f-sm-12 f-md-14"> <i class="fa fa-chevron-right"></i></span></a>
							</div>
						</div>
						<div class="row border-bottom m-t-10">
							<div class="col-6 m-b-10">
								<a href="javascript:void(0)" onclick="memberSaya()">
									<span class="f-sm-14 f-md-16 color1"><i class="fa fa-envelope-open"></i> Undang Teman</span>
								</a>
							</div>
							<div class="col-6 m-b-10 text-right" style="float: right">
								<a href="#" class="text-secondary"><span class="f-sm-12 f-md-14"> <i class="fa fa-chevron-right"></i></span></a>
							</div>
						</div>
						<div class="row border-bottom m-t-10">
							<div class="col-6 m-b-10">
								<a href="javascript:void(0)" onclick="memberSaya()">
									<span class="f-sm-14 f-md-16 color1"><i class="fa fa-star"></i> Penilaian Saya</span>
								</a>
							</div>
							<div class="col-6 m-b-10 text-right" style="float: right">
								<a href="#" class="text-secondary"><span class="f-sm-12 f-md-14"> <i class="fa fa-chevron-right"></i></span></a>
							</div>
						</div>
						<div class="row">
							<div class="col-12" style="height:10px; background-color:#eaeaea; position: absolute; left: 0"></div>
						</div>
						<div class="row border-bottom m-t-10" style="padding-top:10px">
							<div class="col-6 m-b-10">
								<a href="javascript:void(0)" onclick="memberSaya()">
									<span class="f-sm-14 f-md-16 color1"><i class="fa fa-users-cog"></i> Pengaturan Akun</span>
								</a>
							</div>
							<div class="col-6 m-b-10 text-right" style="float: right">
								<a href="#" class="text-secondary"><span class="f-sm-12 f-md-14"><i class="fa fa-chevron-right"></i></span></a>
							</div>
						</div>
						<div class="row border-bottom m-t-10">
							<div class="col-6 m-b-10">
								<a href="javascript:void(0)" onclick="memberSaya()">
									<span class="f-sm-14 f-md-16 color1"><i class="fa fa-question-circle"></i> Pusat Bantuan</span>
								</a>
							</div>
							<div class="col-6 m-b-10 text-right" style="float: right">
								<a href="#" class="text-secondary"><span class="f-sm-12 f-md-14"><i class="fa fa-chevron-right"></i></span></a>
							</div>
						</div>
						<div class="row border-bottom m-t-10">
							<div class="col-10 m-b-10">
								<a href="javascript:void(0)" onclick="memberSaya()">
									<span class="f-sm-14 f-md-16 color1"><i class="fa fa-headset"></i> Chat dengan <?php echo $this->func->globalset("nama"); ?></span>
								</a>
							</div>
							<div class="col-2 m-b-10 text-right" style="float: right">
								<a href="#" class="text-secondary"><span class="f-sm-12 f-md-14"><i class="fa fa-chevron-right"></i></span></a>
							</div>
						</div>
						<div class="row border-bottom m-t-10">
							<div class="col-6 m-b-10">
								<a href="javascript:void(0)" onclick="signoutNow()">
									<span class="f-sm-14 f-md-16 color1"><i class="fa fa-sign-out-alt"></i> Logout</span>
								</a>
							</div>
							<div class="col-6 m-b-10 text-right" style="float: right">
								<a href="javascript:void(0)" onclick="signoutNow()" class="text-secondary"><span class="f-sm-12 f-md-14"><i class="fa fa-chevron-right"></i></span></a>
							</div>
						</div>

					</div>
					
				</div>

				<div class="col-md-8 col-12 mt-on-sm-10 hidesmall">
					<div class="tab">
						<div class="tab-header">
							<a class="navlink btn btn-color1 m-r-8 m-b-8" href="javascript:void(0)" data-link="#saldo" style="width: 155px"><i class="fas fa-wallet"></i> Saldo Saya</a>

							<a id="navrekening" class="navlink klikrek btn btn-outline-color1 m-r-8 m-b-8" href="javascript:void(0)" data-link="#rekening" style="width: 155px"><i class="far fa-credit-card"></i> Rekening</a>

							<a id="navalamat" class="navlink btn btn-outline-color1 m-r-8 m-b-8" href="javascript:void(0)" data-link="#alamat" style="width: 155px"><i class="fas fa-house-user"></i> Alamat</a>

							<a id="navinformasi" class="navlink btn btn-outline-color1 m-r-8 m-b-8" href="javascript:void(0)" data-link="#informasi" style="width: 155px"><i class="fas fa-users-cog"></i> Pengaturan </a>

							<a class="btn btn-colorbutton m-b-8" href="javascript:void(0)" onclick="signoutNow()" style="width: 155px"><i class="fas fa-power-off"></i> Logout</a>
						</div>

						<!-- Tab panes -->
						<div class="tab-content">
		          			<!-- SALDO -->
							<div class="tab-pane in m-b-10" style="display:block;" id="saldo">
								<div class="section row m-lr-0 m-t-10 m-b-40 p-tb-10 p-lr-20">
									<div class="col-md-8 m-lr-auto">
										<div class="p-tb-10">
											<h4 class="font-medium">Saldo Saat Ini</h4>
											<h2 class="font-bold text-success m-t-20"><b>Rp <?php echo $this->func->formUang($this->func->getSaldo($_SESSION["usrid"],"saldo","usrid")); ?>,-</b></h2>
										</div>
									</div>
									<div class="col-md-4 m-lr-auto">
										<div class="p-tb-10">
											<a href="javascript:topupSaldo()" class="btn btn-colorbutton btn-md btn-block m-b-10">
												<i class="fas fa-chevron-circle-up"></i>&nbsp; Top Up
											</a>
											<a href="javascript:tarikSaldo()" class="btn btn-outline-colorbutton btn-md btn-block">
											<i class="fas fa-chevron-circle-down"></i>&nbsp; Tarik Saldo
												</a>
										</div>
									</div>
								</div>

								<!-- Riwayat  Topup -->
								<div class="row p-tb-10 m-lr-0">
									<h4 class="color1 font-bold">Riwayat Top Up Saldo</h4>
								</div>
								<div id="loadhistorytopup">
								</div>

								<!-- Riwayat  Tarik -->
								<div class="row p-t-10 p-b-20 m-lr-0">
									<h4 class="color1 font-bold">Transaksi Terakhir</h4>
								</div>
								<div id="loadhistorysaldo">
								</div>
							</div>

		  					<!-- Tab Informasi Akun -->
							<div class="tab-pane in" id="informasi">
								<div class="row">
									<div class="col-md-6 m-lr-auto m-tb-10">
										<h4 class="m-b-20 font-bold color1">
											Profil Pengguna
										</h4>
										<div class="p-all-40 section">
											<?php
												$profil = $this->func->getProfil($_SESSION["usrid"],"semua","usrid");
												$user = $this->func->getUser($_SESSION["usrid"],"semua");
											?>
											<form class="form-horizontal" id="profil">
												<div class="form-group m-b-12">
													<label>Nama</label>
													<input class="form-control" type="text" name="nama" value="<?php echo $profil->nama; ?>">
												</div>
												<div class="form-group m-b-12">
													<label>Email</label>
													<input class="form-control" type="text" name="email" value="<?php echo $user->username; ?>">
													</div>
												<div class="form-group m-b-12">
													<label>No Handphone</label>
													<input class="form-control col-md-6" type="text" name="nohp" value="<?php echo $profil->nohp; ?>">
												</div>
												<div class="form-group m-b-12">
													<label>Kelamin</label>
													<div class="rs1-select2 rs2-select2">
														<select class="js-select2 form-control" name="kelamin">
															<option value="">Kelamin</option>
																<option value="1" <?php if($profil->kelamin == 1){ echo "selected"; } ?>>Laki-laki</option>
															<option value="2" <?php if($profil->kelamin == 2){ echo "selected"; } ?>>Perempuan</option>
														</select>
														<div class="dropDownSelect2"></div>
													</div>
												</div>
												<div class="form-group m-t-50">
													<a href="javascript:void(0)" onclick="simpanProfil()" class="btn btn-success btn-block btn-lg">
														<i class="fas fa-check-circle"></i> &nbsp;Simpan Profil
														</a>
													<span id="profilload" style="display:none;"><i class='fas fa-spin fa-compact-disc text-success'></i> Menyimpan...</span>
												</div>
											</form>
										</div>
									</div>

									<div class="col-md-6 m-lr-auto p-lr-0 m-tb-10">
										<h4 class="m-b-20 font-bold color1">
											Ganti Password
										</h4>
										<div class="section p-all-40 m-b-20">
											<form class="form-horizontal" id="gantipassword">
												<div class="form-group m-b-12">
													<label>Password Baru</label>
													<input class="form-control" type="password" name="password" value="">
												</div>
												<div class="form-group m-b-12">
													<label>Ulangi Password</label>
													<input class="form-control" type="password" value="">
												</div>
												<div class="form-group m-t-10">
													<a href="javascript:void(0)" onclick="simpanPassword()" class="btn btn-success btn-block btn-lg">
														<i class="fas fa-check-circle"></i> &nbsp;Simpan Password
													</a>
													<span id="passwload" style="display:none;"><i class='fas fa-spin fa-compact-disc text-success'></i> Menyimpan...</span>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>

							<!-- REKENING -->
							<div class="tab-pane" id="rekening">
								<?php
									$this->db->where("usrid",$_SESSION["usrid"]);
									$db = $this->db->get("rekening");

									if($db->num_rows() <= 10){
								?>
									<div class="row m-t-10">
										<div class="col-md-6 hidesmall font-bold color1">
											<h4>Daftar Rekening</h4>
										</div>
										<div class="col-md-6 text-right m-b-20">
											<a href="javascript:tambahRekening();" class="btn btn-success">
												<i class="fas fa-plus"></i> &nbsp;Tambah Rekening
											</a>
										</div>
									</div>
								<?php
									}
								?>

								<div class="section p-all-10 table-responsive">
									<table class="table table-hover table-bordered table-striped">
										<tr class="table_head">
											<th class="p-l-20">#</th>
											<th>No Rekening</th>
											<th>Atasnama</th>
											<th>Bank</th>
											<th>Kantor Cabang</th>
											<th></th>
										</tr>

										<?php
											$no = 1;
											foreach($db->result() as $res){
										?>
										<tr class="table_row">
											<td class="p-lr-20 p-tb-10">
												<p><?php echo $no; ?></p>
											</td>
											<td>
												<p><?php echo $res->norek; ?></p>
											</td>
											<td>
												<p><?php echo $res->atasnama; ?></p>
											</td>
											<td>
												<p>BANK <?php echo $this->func->getBank($res->idbank,"nama"); ?></p>
											</td>
											<td>
												<p><?php echo $res->kcp; ?></p>
											</td>
											<td>
												<a href="javascript:editRekening(<?php echo $res->id; ?>)" class="btn btn-success btn-sm" title="Edit"><i class="fas fa-edit"></i></a>
												<a href="javascript:hapusRekening(<?php echo $res->id; ?>)" class="btn btn-danger btn-sm" title="Hapus"><i class="fas fa-trash-alt"></i></a>
											</td>
										</tr>
										<?php
												$no++;
											}
											if($db->num_rows() == 0){
												echo "<tr><td class='p-all-10 txt-center' colspan=6>
												<p><i class='fas fa-exclamation-triangle text-danger'></i> Belum ada daftar rekening, silahkan tambah data untuk menarik saldo.</p>
												</td></tr>";
											}
										?>
									</table>
								</div>
		          			</div>

							<!-- ALAMAT -->
							<div class="tab-pane" id="alamat">
								<?php
									$this->db->where("usrid",$_SESSION["usrid"]);
									$db = $this->db->get("alamat");

									if($db->num_rows() <= 10){
								?>
								<div class="row m-t-10">
									<div class="col-md-6 hidesmall font-bold color1">
										<h4>Daftar Rekening</h4>
									</div>
									<div class="col-md-6 text-right m-b-20">
										<a href="javascript:tambahAlamat();" class="btn btn-success">
											<i class="fas fa-plus"></i> &nbsp;Tambah Alamat
										</a>
									</div>
								</div>
								<?php
									}
								?>

								<div class="section p-all-30 table-responsive">
									<table class="table table-hover table-bordered table-striped">
										<tr class="table_head">
											<th class="p-l-20">#</th>
											<th>Nama Penerima</th>
											<th>No Handphone</th>
											<th>Alamat</th>
											<th></th>
										</tr>

										<?php
											$no = 1;
											foreach($db->result() as $res){
										?>
										<tr class="table_row">
											<td class="p-lr-20 p-tb-10">
												<p><?php echo $res->judul; ?></p>
												<?php if($res->status == 1){ echo '<small class="badge badge-warning">Alamat Utama</small>'; } ?>
											</td>
											<td>
												<p><?php echo $res->nama; ?></p>
											</td>
											<td>
												<p><?php echo $res->nohp; ?></p>
											</td>
											<td>
												<p><?php echo $res->alamat."<br/><small>Kodepos ".$res->kodepos."</small>"; ?></p>
											</td>
											<td>
												<a href="javascript:editAlamat(<?php echo $res->id; ?>)" class="btn btn-success btn-sm" title="Edit"><i class="fas fa-edit"></i></a>
												<a href="javascript:hapusAlamat(<?php echo $res->id; ?>)" class="btn btn-danger btn-sm" title="Hapus"><i class="fas fa-trash-alt"></i></a>
											</td>
										</tr>
										<?php
												$no++;
											}
											if($db->num_rows() == 0){
												echo "<tr><td class='p-all-10 txt-center' colspan=6>
												<p><i class='fas fa-exclamation-triangle text-danger'></i> Belum ada daftar alamat, silahkan tambah data pengiriman pesanan.</p>
												</td></tr>";
											}
										?>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>

				
			</div>
		</div>
	</section>

	<div class="modal animate__animated animate__slideInUp animate__slow" id="modal_memberSaya" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content modal_fixed">
				<div class="modal-header">
					<h5 class="modal-title">Fitur Belum Tersedia</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="float: left">
			          <span aria-hidden="true">&times;</span>
			        </button>
				</div>
				<div class="modal-body">
					<div class="alert alert-danger" style="text-align: justify;">
						Mohon maaf fitur ini dalam proses pengembangan dalam mode mobile, Silakan buka dalam versi Desktop.<br><br>
						Khusus untuk pemesanan hari ini dapatkan free update fitur dengan harga sekarang, tanpa kenaikan harga untuk kedepannya.<br><br>
						Hubungi pihak Developer di menu header icon <i class="fa fa-paper-plane"></i> atau klik <a href="https://wa.me/6288801219155" target="_blank">disini</a>
					</div>
				</div>
			</div>

		</div>
	</div>





  <script type="text/javascript">
    $(function(){

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




      	$("#loadhistorysaldo").load("<?php echo site_url("assync/getHistoryTarik"); ?>");
		$("#loadhistorytopup").load("<?php echo site_url("assync/getHistoryTopup"); ?>");

		$("#rekeningchange").change(function(){
			if($(this).val() == 0){
				$('.modal').modal("hide");
				$('#tambahrekening').modal();
				//$(this).val("").trigger("change");
			}
		});
			
		$(".navlink").each(function(){
			var link = $(this);
			var tab = $(this).data("link");
			var res = tab.replace("#","");
				
			$(this).click(function(){
				$(".navlink.btn-success").addClass("btn-info");
				$(".navlink.btn-success").removeClass("btn-success");
				link.removeClass("btn-info");
				link.addClass("btn-success");
				$(".tab-pane").hide();
				$(tab).show();
				//$(tab).html("<div class='m-lr-auto text-center p-tb-40'><h5><i class='fas fa-spin fa-compact-disc'></i> loading...</h5></div>");
				//$(tab).load("<?php echo site_url("assync/pesanan?status="); ?>"+res);
			});
		});

		$("#tariksaldo form").on("submit",function(e){
			e.preventDefault();
			$(".submitbutton",this).parent().append("<span class='cl1'><i class='fas fa-spin fa-compact-disc color1'></i> Memproses...</span>");
			$(".submitbutton",this).hide();
			var submitbtn =	$(".submitbutton",this);
			var datar = $(this).serialize();
			datar = datar + "&"+$("#names").val()+"="+$("#tokens").val();

			$.post("<?php echo site_url("manage/saldo"); ?>",datar,function(msg){
				var data = eval("("+msg+")");
				updateToken(data.token);
				if(data.success == true){
					swal.fire("Berhasil!","Berhasil menarik saldo, tunggu maks. 2 hari kerja sampai uang Anda masuk ke rekening","success").then((value) => {
						location.reload();
					});
				}else{
					swal.fire("Gagal!",data.msg,"error");
					submitbtn.show();
					submitbtn.parent().find("span").remove();
				}
			});
		});

		$("#topupsaldo form").on("submit",function(e){
			e.preventDefault();
			$(".submitbutton",this).parent().append("<span class='cl1'><i class='fas fa-spin fa-compact-disc color1'></i> Memproses...</span>");
			$(".submitbutton",this).hide();
			var submitbtn =	$(".submitbutton",this);
			var datar = $(this).serialize();
			datar = datar + "&"+$("#names").val()+"="+$("#tokens").val();

			$.post("<?php echo site_url("assync/topupsaldo"); ?>",datar,function(msg){
				var data = eval("("+msg+")");
				updateToken(data.token);
				if(data.success == true){
					window.location.href= "<?=site_url("home/topupsaldo")?>?inv="+data.idbayar;
				}else{
					swal.fire("Gagal!",data.msg,"error");
					submitbtn.show();
					submitbtn.parent().find("span").remove();
				}
			});
		});

		$("#tambahalamat form").on("submit",function(e){
			e.preventDefault();
			$(".submitbutton",this).parent().append("<span class='cl1'><i class='fas fa-spin fa-compact-disc color1'></i> Memproses...</span>");
			$(".submitbutton",this).hide();
			var submitbtn =	$(".submitbutton",this);
			var datar = $(this).serialize();
			datar = datar + "&"+$("#names").val()+"="+$("#tokens").val();

			$.post("<?php echo site_url("assync/tambahalamat"); ?>",datar,function(msg){
				var data = eval("("+msg+")");
				updateToken(data.token);
				if(data.success == true){
					swal.fire("Berhasil!","Berhasil menambah alamat","success").then((value) => {
						location.reload();
						//$("#navalamat").trigger("click");
					});
				}else{
					swal.fire("Gagal!","Gagal menambah alamat baru, silahkan ulangi beberapa saat lagi.","error");
					submitbtn.show();
					submitbtn.parent().find("span").remove();
				}
			});
		});

		$("#tambahrekening form").on("submit",function(e){
			e.preventDefault();
			$(".submitbutton",this).parent().append("<span class='cl1'><i class='fas fa-spin fa-compact-disc color1'></i> Memproses...</span>");
			$(".submitbutton",this).hide();
			var submitbtn =	$(".submitbutton",this);
			var datar = $(this).serialize();
			datar = datar + "&"+$("#names").val()+"="+$("#tokens").val();

			$.post("<?php echo site_url("assync/tambahrekening"); ?>",datar,function(msg){
				var data = eval("("+msg+")");
				updateToken(data.token);
				if(data.success == true){
					swal.fire("Berhasil!","Berhasil menambah rekening","success").then((value) => {
						location.reload();
						//$("#navrekening").trigger("click");
					});
				}else{
					swal.fire("Gagal!","Gagal menambah rekening baru, silahkan ulangi beberapa saat lagi.","error");
					submitbtn.show();
					submitbtn.parent().find("span").remove();
				}
			});
		});

		localStorage["isedit"] = false;
		$("#alamatprov").change(function(){
			if(localStorage["isedit"] != true){
	      		changeKab($(this).val(),"");
			}
		});

		$("#alamatkab").change(function(){
			if(localStorage["isedit"] != true){
	      		changeKec($(this).val(),"");
			}
		});

    });
		
		function memberSaya(){
			$('#modal_memberSaya').modal('show');
		}
		function copyLink() {
			$("#copylink").select();
			document.execCommand("copy");
			swal.fire("Berhasil menyalin!","silahkan paste/tempel dan kirim alamat yg sudah disalin ke teman Anda","success");
		}

		// FORM CHANGING
		function changeProv(proval){
			$("#alamatprov").val(proval).trigger("change");
		}
		function changeKec(kabval,valu){
			$("#alamatkec").html("<option value=''>Loading...</option>").trigger("change");
			$.post("<?php echo site_url("assync/getkec"); ?>",{"id":kabval,[$("#names").val()]:$("#tokens").val()},function(msg){
				var data = eval("("+msg+")");
				updateToken(data.token);
				$("#alamatkec").html(data.html).promise().done(function(){
					$("#alamatkec").val(valu);
				});
			});
		}
		function changeKab(proval,valu){
			$("#alamatkab").html("<option value=''>Loading...</option>").trigger("change");
			$("#alamatkec").html("<option value=''>Kecamatan</option>").trigger("change");

			$.post("<?php echo site_url("assync/getkab"); ?>",{"id":proval,[$("#names").val()]:$("#tokens").val()},function(msg){
				var data = eval("("+msg+")");
				updateToken(data.token);
				$("#alamatkab").html(data.html).promise().done(function(){
					$("#alamatkab").val(valu);
				})
			});
		}

		// REKENING
		function tambahRekening(){
			$('.modal').modal("hide");
			$('#tambahrekening').modal();
		}
		function editRekening(rek){
			$.post("<?php echo site_url("assync/getRekening"); ?>",{"rek":rek,[$("#names").val()]:$("#tokens").val()},function(msg){
				var data = eval("("+msg+")");
				updateToken(data.token);

				if(data.success == true){
					$("#rekeningid").val(rek);
					$("#rekeningidbank").val(data.idbank).trigger("change");
					$("#rekeningatasnama").val(data.atasnama);
					$("#rekeningnorek").val(data.norek);
					$("#rekeningkcp").val(data.kcp);

					$('.modal').modal('hide');
					$('#tambahrekening').modal();
				}else{
					swal.fire("Error!","terjadi kesalahan silahkan ulangi beberapa saat lagi.","error");
				}
			});
		}
		function hapusRekening(rek){
			swal.fire({
				title: "Anda yakin?",
				text: "menghapus rekening ini dari akun Anda?",
				icon: "warning",
				showDenyButton: true,
				confirmButtonText: "Oke",
				denyButtonText: "Batal"
			})
			.then((willDelete) => {
				if (willDelete.isConfirmed) {
					$.post("<?php echo site_url("assync/hapusRekening"); ?>",{"rek":rek,[$("#names").val()]:$("#tokens").val()},function(msg){
						var data = eval("("+msg+")");
						updateToken(data.token);

						if(data.success == true){
							swal.fire("Berhasil!","Berhasil menghapus rekening","success").then((value) => {
								location.reload();
							});
						}else{
							swal.fire("Error!","terjadi kesalahan silahkan ulangi beberapa saat lagi.","error");
						}
					});
				}
			});
		}
		function batalTopup(rek){
			swal.fire({
				title: "Anda yakin?",
				text: "membatalkan topup saldo ini?",
				icon: "warning",
				showDenyButton: true,
				confirmButtonText: "Oke",
				denyButtonText: "Batal"
			})
			.then((willDelete) => {
				if (willDelete.isConfirmed) {
					$.post("<?php echo site_url("assync/bataltopup"); ?>",{"id":rek,[$("#names").val()]:$("#tokens").val()},function(msg){
						var data = eval("("+msg+")");
						updateToken(data.token);

						if(data.success == true){
							swal.fire("Berhasil!","Berhasil membatalkan topup saldo","success").then((value) => {
								location.reload();
							});
						}else{
							swal.fire("Error!","terjadi kesalahan silahkan ulangi beberapa saat lagi.","error");
						}
					});
				}
			});
		}

		// ALAMAT
		function tambahAlamat(){
			localStorage["isedit"] = false;
			$("#alamatid").val(0);
			$("#alamatnama").val("");
			$("#alamatnohp").val("");
			$("#alamatstatus").val(0).trigger("change");
			$("#alamatalamat").val("");
			$("#alamatkodepos").val("");
			$("#alamatjudul").val("");
			$("#alamatprov").val("").trigger("change");
			$('.modal').modal("hide");
			$('#tambahalamat').modal();
		}
		function editAlamat(rek){
			localStorage["isedit"] = true;
			$.post("<?php echo site_url("assync/getAlamat"); ?>",{"rek":rek,[$("#names").val()]:$("#tokens").val()},function(msg){
				var data = eval("("+msg+")");
				updateToken(data.token);

				if(data.success == true){
					changeProv(data.prov),
					changeKab(data.prov,data.kab),
					changeKec(data.kab,data.idkec);
					$("#alamatid").val(rek);
					$("#alamatnama").val(data.nama);
					$("#alamatnohp").val(data.nohp);
					$("#alamatstatus").val(data.status).trigger("change");
					$("#alamatalamat").val(data.alamat);
					$("#alamatkodepos").val(data.kodepos);
					$("#alamatjudul").val(data.judul);
					$('.modal').modal("hide");
					$('#tambahalamat').modal();
				}else{
					swal.fire("Error!","terjadi kesalahan silahkan ulangi beberapa saat lagi.","error");
				}
			});
		}
		function hapusAlamat(rek){
			swal.fire({
				title: "Anda yakin?",
				text: "menghapus alamat ini dari akun Anda?",
				icon: "warning",
				showDenyButton: true,
				confirmButtonText: "Oke",
				denyButtonText: "Batal"
			})
			.then((willDelete) => {
				if (willDelete.isConfirmed) {
					$.post("<?php echo site_url("assync/hapusAlamat"); ?>",{"rek":rek,[$("#names").val()]:$("#tokens").val()},function(msg){
						var data = eval("("+msg+")");
						updateToken(data.token);

						if(data.success == true){
							swal.fire("Berhasil!","Berhasil menghapus alamat","success").then((value) => {
								location.reload();
							});
						}else{
							swal.fire("Error!","terjadi kesalahan silahkan ulangi beberapa saat lagi.","error");
						}
					});
				}
			});
		}

		// SALDO
		function topupSaldo(){
			$('#topupsaldo').modal();
		}
		function tarikSaldo(){
			$('#tariksaldo').modal();
		}
		function historySaldo(page){
			$("#loadhistorysaldo").html("<i class='fas fa-spin fa-compact-disc color1'></i> Loading...");
			$("#loadhistorysaldo").load("<?php echo site_url("assync/getHistoryTarik"); ?>?page="+page);
		}
		function getopupSaldo(page){
			$("#loadhistorysaldo").html("<i class='fas fa-spin fa-compact-disc color1'></i> Loading...");
			$("#loadhistorysaldo").load("<?php echo site_url("assync/getHistoryTopup"); ?>?page="+page);
		}
		function simpanProfil(){
			$("#profil a").hide();
			$("#profilload").show();
			var datar = $("#profil").serialize();
			datar = datar + "&" + $("#names").val() + "=" + $("#tokens").val();
			
			$.post("<?php echo site_url("assync/updateprofil"); ?>",datar,function(msg){
				var data = eval("("+msg+")");
				updateToken(data.token);
				$("#profil a").show();
				$("#profilload").hide();
				if(data.success == true){
					swal.fire("Berhasil!","Berhasil menyimpan informasi pengguna","success");
				}else{
					swal.fire("Gagal!","Gagal menyimpan informasi pengguna","error");
				}
			});
		}
		function simpanPassword(){
			$("#gantipassword a").hide();
			$("#passwload").show();
			var datar = $("#gantipassword").serialize();
			datar = datar + "&" + $("#names").val() + "=" + $("#tokens").val();
			
			$.post("<?php echo site_url("assync/updatepass"); ?>",datar,function(msg){
				var data = eval("("+msg+")");
				updateToken(data.token);
				$("#gantipassword a").show();
				$("#passwload").hide();
				if(data.success == true){
					$("#gantipassword input").val("");
					swal.fire("Berhasil!","Berhasil menyimpan password baru","success");
				}else{
					swal.fire("Gagal!","Gagal menyimpan informasi password","error");
				}
			});
		}
  </script>


    <!-- Modal3-Topup Saldo -->
	<div class="modal fade" id="topupsaldo" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Top Up Saldo</h5>
					<button type="button" data-dismiss="modal" aria-label="Close">
						<i class="fas fa-times text-danger fs-24 p-all-2"></i>
					</button>
				</div>
				<div class="modal-body">
					<form method="POST" action="<?=site_url("manage/topupsaldo")?>">
						<div class="col-md-12 p-b-30 m-t-30 p-lr-30">
							<div class="form-group">
								<label for="jumlahtopup">Jumlah</label>
								<input class="form-control fs-20 font-medium" type="text" id="jumlahtopup" name="jumlah" placeholder="Rp" required>
							</div>
							<div class="form-group row">
								<div class="col-6 col-md-3 m-t-10">
									<button type="button" class="btn btn-info btn-block" onclick="$('#jumlahtopup').val(50000)">50.000</button>
								</div>
									<div class="col-6 col-md-3 m-t-10">
									<button type="button" class="btn btn-info btn-block" onclick="$('#jumlahtopup').val(100000)">100.000</button>
								</div>
								<div class="col-6 col-md-3 m-t-10">
									<button type="button" class="btn btn-info btn-block" onclick="$('#jumlahtopup').val(150000)">150.000</button>
								</div>
								<div class="col-6 col-md-3 m-t-10">
									<button type="button" class="btn btn-info btn-block" onclick="$('#jumlahtopup').val(200000)">200.000</button>
								</div>
							</div>
							<div class="form-group m-t-36">
								<button type="submit" class="submitbutton btn btn-success btn-block btn-lg">
									Topup Saldo
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

    <!-- Modal3-Tarik Saldo -->
	<div class="modal fade" id="tariksaldo" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Penarikan Saldo</h5>
					<button type="button" data-dismiss="modal" aria-label="Close">
						<i class="fas fa-times text-danger fs-24 p-all-2"></i>
					</button>
				</div>
				<div class="modal-body p-tb-40">
					<form>
						<div class="p-b-10 p-lr-30">
							<div class="form-group row">
								<div class="col-sm-4">
									<label>Jumlah</label>
								</div>
								<div class="col-md-8 m-b-12">
									<input class="form-control" type="text" name="jumlah" placeholder="Rp" required>
								</div>
								<div class="col-sm-4">
								<label>Rekening Tujuan</label>
								</div>
								<div class="col-md-8">
									<div class="m-b-12 rs1-select2 rs2-select2">
									<select class="js-select2 form-control" id="rekeningchange" name="idrek" required >
										<option value="" id='defaultrek'>Pilih Rekening</option>
										<?php
											$this->db->where("usrid",$_SESSION["usrid"]);
											$db = $this->db->get("rekening");
											foreach($db->result() as $res){
												echo "<option value='".$res->id."'>".$res->norek." - ".$res->atasnama."</option>";
											}
										?>
										<option value="0">+ Tambah Rekening Baru</option>
									</select>
									<div class="dropDownSelect2"></div>
									</div>
								</div>
								<div class="col-sm-4">
									<label>Catatan</label>
								</div>
								<div class="col-md-8 m-b-12">
									<input class="form-control" type="text" name="keterangan" placeholder="Catatan">
								</div>
							</div>
						</div>
						<div class="p-lr-30">
							<button type="submit" class="submitbutton btn btn-success btn-block btn-lg">
								Tarik Saldo
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

    <!-- Modal3-Tambah Rekening -->
	<div class="modal fade" id="tambahrekening" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Informasi Rekening Bank</h5>
					<button type="button" data-dismiss="modal" aria-label="Close">
						<i class="fas fa-times text-danger fs-24 p-all-2"></i>
					</button>
				</div>
				<div class="modal-body p-tb-40">
					<form class="form-horizontal">
						<input type="hidden" name="id" id="rekeningid" value="0" />
						<div class="p-b-20 p-lr-30">
							<div class="m-b-12">
								<label>Bank</label>
								<div class="m-b-12 rs1-select2 rs2-select2">
									<select class="js-select2 form-control" id="rekeningidbank" name="idbank" required >
										<option value="">Pilih Bank</option>
										<?php
											$db = $this->db->get("rekeningbank");
											foreach($db->result() as $res){
												echo "<option value='".$res->id."'>".$res->nama."</option>";
											}
										?>
									</select>
									<div class="dropDownSelect2"></div>
								</div>
							</div>
							<div class="m-b-12">
								<label>No Rekening</label>
								<input class="form-control" id="rekeningnorek" type="text" name="norek" placeholder="" required>
							</div>
							<div class="m-b-12">
								<label>Atas Nama</label>
								<input class="form-control" id="rekeningatasnama" type="text" name="atasnama" placeholder="" required>
							</div>
							<div class="m-b-12">
								<label>Kantor Cabang</label>
								<input class="form-control" id="rekeningkcp" type="text" name="kcp" placeholder="" required>
							</div>
						</div>
						<div class="p-lr-30">
							<button type="submit" class="submitbutton btn btn-lg btn-success btn-block">
								Simpan Rekening
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

    <!-- Modal3-Tambah Rekening -->
	<div class="modal fade" id="tambahalamat" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Informasi Alamat</h5>
					<button type="button" data-dismiss="modal" aria-label="Close">
						<i class="fas fa-times text-danger fs-24 p-all-2"></i>
					</button>
				</div>
				<div class="modal-body p-tb-40">
					<form class="form-horizontal">
						<input type="hidden" name="id" id="alamatid" value="0" />
						<div class="p-b-15 p-lr-30">
							<div class="m-b-12">
								<label>Simpan sebagai? <small>cth: Alamat Rumah, Alamat Kantor, dll</small></label>
								<input class="form-control" id="alamatjudul" type="text" name="judul" placeholder="" required>
							</div>
							<div class="m-b-12">
								<label>Nama Penerima</label>
								<input class="form-control" id="alamatnama" type="text" name="nama" placeholder="" required>
							</div>
							<div class="m-b-12">
								<label>No Handphone</label>
								<input class="form-control" id="alamatnohp" type="text" name="nohp" placeholder="" required>
							</div>
							<div class="m-b-12">
								<label>Alamat Lengkap</label>
								<input class="form-control" id="alamatalamat" type="text" name="alamat" placeholder="" required>
							</div>
								<div class="m-b-12">
								<label>Provinsi</label>
								<div class="rs1-select2 rs2-select2">
									<select class="js-select2 form-control" id="alamatprov" required >
										<option value="">Pilih Provinsi</option>
										<?php
											$db = $this->db->get("prov");
											foreach($db->result() as $res){
												echo "<option value='".$res->id."'>".$res->nama."</option>";
											}
										?>
									</select>
									<div class="dropDownSelect2"></div>
								</div>
							</div>
							<div class="m-b-12">
								<label>Kabupaten</label>
								<div class="rs1-select2 rs2-select2">
									<select class="js-select2 form-control" id="alamatkab" required >
										<option value="">Pilih Kabupaten/Kota</option>
									</select>
									<div class="dropDownSelect2"></div>
								</div>
							</div>
							<div class="m-b-12">
								<label>Kecamatan</label>
								<div class="rs1-select2 rs2-select2">
									<select class="js-select2 form-control" id="alamatkec" name="idkec" required >
										<option value="">Pilih Kecamatan</option>
									</select>
									<div class="dropDownSelect2"></div>
								</div>
							</div>
							<div class="m-b-12">
								<label>Kodepos</label>
								<input class="form-control" id="alamatkodepos" type="text" name="kodepos" placeholder="" required>
							</div>
							<div class="m-b-12">
								<label>Simpan Sebagai</label>
								<div class="rs1-select2 rs2-select2">
									<select class="js-select2 form-control" id="alamatstatus" name="status" required >
										<option value="0">Alamat</option>
										<option value="1">Alamat Utama</option>
									</select>
									<div class="dropDownSelect2"></div>
								</div>
							</div>
						</div>
						<div class="p-lr-30">
							<button type="submit" class="submitbutton btn btn-success btn-block btn-lg">
								Simpan Alamat
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

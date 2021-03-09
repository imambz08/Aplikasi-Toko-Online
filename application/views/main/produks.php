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
	<!-- breadcrumb -->
	<div class="container-fluid colorbg colortext " style="top: -55px; position: relative; ">
		<div class="bread-crumb bread-crumb-produk fs-13 color1" style="background-color: transparent;">
			<a href="<?php echo site_url(); ?>" class="color1">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

		    <?php
				$set = $this->func->getSetting("semua");
				$kategori = $this->func->getKategori($data->idcat,"semua");
				$kategorinama = is_object($kategori) ? $kategori->nama : "";
				$textorder = $data->preorder == 0 ? "Beli Sekarang" : "Pre Order";
				
				$level = isset($_SESSION["lvl"]) ? $_SESSION["lvl"] : 0;
				if($level == 5){
					$result = $data->hargadistri;
				}elseif($level == 4){
					$result = $data->hargaagensp;
				}elseif($level == 3){
					$result = $data->hargaagen;
				}elseif($level == 2){
					$result = $data->hargareseller;
				}else{
					$result = $data->harga;
				}
				
				$this->db->where("idproduk",$data->id);
				$dbv = $this->db->get("produkvariasi");
				$totalstok = 0;
				$hargs = 0;
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
	   		?>
			<a href="<?php echo site_url("kategori/".$kategori->url); ?>" class="color1">
				<?php echo ucwords(strtolower($kategorinama)); ?>
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="fs-13 color1">
				<?php echo $data->nama; ?>
			</span>
		</div>
	</div>


	<!-- Product Detail -->
	<section class="sec-product-detail p-t-0 p-b-10 colorbg colortext">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-4 p-b-30 container-produk-single m-b-10">
					
							<?php
								$this->db->where("idproduk",$data->id);
								$this->db->order_by("jenis","DESC");
								$db = $this->db->get("upload");
								$no = 1;
								foreach ($db->result() as $res){
									if($no == 1){
							?>
								<div class="prod-preview bg-success">
									<img src="<?php echo base_url("i/uploads/".$res->nama); ?>" alt="IMG-PRODUCT" id="prod-img">
								</div>
								<div class="p-l-30 p-r-35 p-lr-0-lg">
								<div class="prod-thumb">
									<div class="m-r-26"></div>
							<?php
									}
							?>
									<div class="prod-thumb-item" data-thumb="<?php echo base_url("i/uploads/".$res->nama); ?>" style="background-image:url('<?php echo base_url("i/uploads/".$res->nama); ?>');"></div>
							<?php
									if($no == $db->num_rows()){ echo "</div>"; }
									$no++;
								}
							?>
								</div>
								<div class="m-t-20 sharer hidesmall">
									<div class="m-b-10 font-medium">Bagikan</div>
									<a href="whatsapp://send?text=<?=site_url("produk/".$data->url)?>" class="btn btn-outline-success m-r-4 showsmall-inline" target="_blank" data-action="share/whatsapp/share">
										<i class="fab fa-whatsapp fs-20 m-t-4"></i>
									</a>
									<a href="https://api.whatsapp.com/send?text=<?=site_url("produk/".$data->url)?>" class="btn btn-outline-success m-r-4 hidesmall" target="_blank" data-action="share/whatsapp/share">
										<i class="fab fa-whatsapp fs-20 m-t-4"></i>
									</a>
									<a href="http://www.facebook.com/sharer.php?u=<?=site_url("produk/".$data->url)?>" class="btn btn-outline-primary m-r-4" target="_blank">
										<i class="fab fa-facebook-f fs-20 m-lr-4 m-t-4"></i>
									</a>
									<a href="https://plus.google.com/share?url=<?=site_url("produk/".$data->url)?>" class="btn btn-outline-danger m-r-4" target="_blank">
										<i class="fab fa-google-plus-g fs-20 m-t-4"></i>
									</a>
									<a href="https://twitter.com/share?url=<?=site_url("produk/".$data->url)?>" class="btn btn-outline-info m-r-4" target="_blank">
										<i class="fab fa-twitter fs-20 m-t-4"></i>
									</a>
									<a href="mailto:?Subject=Beli%20produk%20ini&amp;Body=<?=site_url("produk/".$data->url)?>" class="btn btn-outline-warning m-r-4" target="_blank">
										<i class="fas fa-envelope fs-20 m-t-4"></i>
									</a>
								</div>
					
				</div>

				<div class="col-md-5 p-b-5 p-30">
					<div class="p-t-5 p-lr-0-lg m-t-10">
						<h5 id="js-name-detail" class="font-medium f-sm-14">
							<?php echo $data->nama; ?>
						</h5>
						<p class="f-sm-12">
						  <span class="f-sm-12">
							<?php
							  $ulasan = $this->func->getBintang($data->id);
							  $star = $ulasan["star"];
							  for($i=1; $i<=5; $i++){
								$color = ($i <= $star) ? "color2" : "text-secondary";
								echo '<i class="fa fa-star '.$color.'"></i>';
							  }
							?>
						  </span> &nbsp;
						  <span class="f-sm-12 fs-12"><?php echo $ulasan["jml"]; ?> Ulasan | Terjual <?= $this->func->getTerjualBerapa($data->id);?></span>
						</p>
						
						<span id="hargacetak" class="fs-18 font-medium color1">
							<?php 
								if($hargs > 0){
									echo "IDR ".$this->func->formUang(min($harga))." - ".$this->func->formUang(max($harga));
								}else{
									echo "IDR ".$this->func->formUang($result);
								}
							?>
						</span><br>
						<?php 
							if($data->hargacoret > 0){
								echo "<span class=\"f-sm-14 harga-coret\">IDR ".$this->func->formUang($data->hargacoret)."</span>";
							}
						?>
						
						<div class="row m-t-10">
							<div class="col-md-12">
								<ul class="nav nav-tabs">
								    <li class="nav-item">
								      <a class="nav-link deskripsi active f-sm-12">Deskripsi</a>
								    </li>
								    <li class="nav-item">
								      <a class="nav-link ulasan f-sm-12">Ulasan</a>
								    </li>
								    <li class="nav-item">
								      <a class="nav-link ulasan f-sm-12">Diskusi</a>
								    </li>
								</ul>

									<div class="tab-content">
									    <div id="deskripsi" class="container tab-pane active deskripsi_tab f-sm-10 fs-13"><br>
									      		<p class="colortext fs-12 f-sm-12">
												<?=$this->security->xss_clean($data->deskripsi)?>
											</p>
										
									    </div>
									    <div id="ulasan" class="container tab-pane ulasan_tab colortext"><br>
									        <h6 class="js-toggle-dropdown-content flex-sb-m cursor-pointer color1 m-b-18 f-sm-12">
												Ulasan Pembeli 
											</h6>


											<div class="dropdown-content dis-none p-lr-14" style="font-size: 12px !important">
												<p class="s-text8">
													<?php
														$this->db->where("idproduk",$data->id);
														$this->db->limit(8);
														$this->db->order_by("nilai,id DESC");
														$re = $this->db->get("review");
														if($re->num_rows() > 0){
															foreach($re->result() as $rev){
																$staron = "<i class='fa fa-star color2'></i>";
																$staroff = "<i class='fa fa-star text-secondary'></i>";
																$star = "";
																for($i=1; $i<=5; $i++){
																	$star .= ($i <= $rev->nilai) ? $staron : $staroff;
																}
																echo "
																	<div class='ulasan row m-b-16'>
																		<div class='col-8 font-medium color1'><strong>".$this->func->getProfil($rev->usrid,"nama","usrid")."</strong></div>
																		<div class='col-4 font-medium color'><small>".$this->func->ubahTgl("d/m/Y",$rev->tgl)."</small></div>
																		<div class='col-12 m-t-4'>".$star."</div>
																		<div class='col-12 m-t-10 keterangan'>
																		".$rev->keterangan."
																		</div>
																	</div>
																";
															}
														}else{
															echo "<i>Belum ada ulasan.</i>";
														}
													?>
												</p>
											</div>
									    </div>
									    
									</div>
								</div>
								
							</div>
							<div class="m-t-20 sharer hide-lg">
								<div class="m-b-10 font-medium">Bagikan</div>
								<a href="whatsapp://send?text=<?=site_url("produk/".$data->url)?>" class="btn btn-outline-success m-r-4 showsmall-inline" target="_blank" data-action="share/whatsapp/share">
									<i class="fab fa-whatsapp fs-20 m-t-4"></i>
								</a>
								<a href="https://api.whatsapp.com/send?text=<?=site_url("produk/".$data->url)?>" class="btn btn-outline-success m-r-4 hidesmall" target="_blank" data-action="share/whatsapp/share">
									<i class="fab fa-whatsapp fs-20 m-t-4"></i>
								</a>
								<a href="http://www.facebook.com/sharer.php?u=<?=site_url("produk/".$data->url)?>" class="btn btn-outline-primary m-r-4" target="_blank">
									<i class="fab fa-facebook-f fs-20 m-lr-4 m-t-4"></i>
								</a>
								<a href="https://plus.google.com/share?url=<?=site_url("produk/".$data->url)?>" class="btn btn-outline-danger m-r-4" target="_blank">
									<i class="fab fa-google-plus-g fs-20 m-t-4"></i>
								</a>
								<a href="https://twitter.com/share?url=<?=site_url("produk/".$data->url)?>" class="btn btn-outline-info m-r-4" target="_blank">
									<i class="fab fa-twitter fs-20 m-t-4"></i>
								</a>
								<a href="mailto:?Subject=Beli%20produk%20ini&amp;Body=<?=site_url("produk/".$data->url)?>" class="btn btn-outline-warning m-r-4" target="_blank">
									<i class="fas fa-envelope fs-20 m-t-4"></i>
								</a>
							</div>
							
						</div>
						
						<?php if($data->preorder != 0){ ?>
						<div class="m-t-20 m-b-20">
							<div class="btn font-bold text-info">
								PRODUK PRE ORDER
							</div>
						</div>
						<?php } ?>

						

						
						
					
				</div>

				<div class="col-md-3 p-r-30 hidesmall" style="height:50px">
					<div class="buy">
						<!--  -->
						<?php if($this->func->cekLogin() == true){ ?>
						<?php if($data->preorder == 0){ ?>
						<!--<div class="p-t-10 p-b-10 p-l-10 p-r-20 m-b-16 m-t-16" style="border-radius:6px;background-color:#dcdde1;color:#c0392b;position:relative;align-items:middle;">
							<span onclick="$(this).parent().hide();" class="pointer" style="position:absolute;right:10px;"><i class="fa fa-times"></i></span>
							Sebelum membeli pastikan terlebih dahulu ketersediaan stok.
						</div>-->
						<?php } ?>
						<?php
							if($dbv->num_rows() == 0){ $totalstok = $data->stok; }
							if($data->preorder > 0){
								$this->db->where("idproduk",$data->id);
								$t = $this->db->get("preorder");
								$totalorder = 0;
								foreach($t->result() as $r){
									$totalorder += $r->jumlah;
								}
								$totalstok = $totalstok - $totalorder;
							}
							
							if($totalstok > 0){
						?>
						<form id="keranjang" class="p-lr-20">
						  <input type="hidden" name="<?=$this->security->get_csrf_token_name()?>" value="<?=$this->security->get_csrf_hash();?>" />
						  <input type="hidden" name="idproduk" value="<?php echo $data->id; ?>" />
						  <input type="hidden" id="variasi" name="variasi" value="0" />
						  <input type="hidden" id="harga" name="harga" value="<?=$result?>" />
							<div class="p-t-10">
								<div class="flex-w p-b-10">
									<?php
										if($dbv->num_rows() > 0){
											$warnaid = array();
											$sizeid = array();
											foreach($dbv->result() as $var){
												$this->db->where("variasi",$var->id);
												$dbf = $this->db->get("preorder");
												$totalpre = 0;
												foreach($dbf->result() as $rf){
													$totalpre += $rf->jumlah;
												}
							
												//$warna[] = $this->func->getWarna($var->warna,"nama");
												$warnaid[] = $var->warna;
												$variasi[$var->warna][] = $var->id;
												$sizeid[$var->warna][] = $var->size;
												$har[$var->warna][] = $var->harga;
												$harreseller[$var->warna][] = $var->hargareseller;
												$haragen[$var->warna][] = $var->hargaagen;
												$haragensp[$var->warna][] = $var->hargaagensp;
												$hardistri[$var->warna][] = $var->hargadistri;
												if(isset($stoks[$var->warna])){
													$stoks[$var->warna] += ($data->preorder == 0) ? $var->stok : $var->stok - $totalpre;
												}else{
													$stoks[$var->warna] = ($data->preorder == 0) ? $var->stok : $var->stok - $totalpre;
												}
												$stok[$var->warna][] = ($data->preorder == 0) ? $var->stok : $var->stok - $totalpre;
												//$size[$var->warna][] = $this->func->getSize($var->size,"nama");
											}
											$warnaid = array_unique($warnaid);
											$warnaid = array_values($warnaid);
											//$sizeid = array_unique($sizeid);
											//$sizeid = array_values($sizeid);
									?>
									<div class="col-12 p-lr-0 m-b-6 fs-14">
									<?=$data->variasi?>
									</div>
									<div class="col-12 p-lr-0 m-b-10 fs-14">
										<select class="form-control variasi fs-14" id="warna" required >
											<option value=""> Pilih <?=$data->variasi?> </option>
											<?php
												for($i=0; $i<count($warnaid); $i++){
													if($stoks[$warnaid[$i]] > 0){
														echo "<option value='".$warnaid[$i]."'>".$this->func->getWarna($warnaid[$i],"nama")."</option>";
													}
												}
											?>
										</select>
									</div>
									<div class="col-12 p-lr-0 m-b-6 fs-14">
										<?=$data->subvariasi?>
									</div>
									<div class="col-12 p-lr-0 m-b-10">
										<select class="form-control variasi fs-14" id="size" required >
											<option value="">Pilih <?=$data->subvariasi?> dulu </option>
										</select>
									</div>
									<?php
										}
									?>
									<div class="col-12 p-lr-0 fs-14">
										Jumlah
									</div>
									<div class="m-b-5 col-12 row p-lr-0 m-lr-0 align-items-center">
										<div class="wrap-num-product input-group m-tb-10 col-7 p-lr-0">
											<div class="num-product-down input-group-prepend cursor-pointer text-center">
												<span class="input-group-text btn btn-outline-colorbutton fs-9" style="border:0px; border-radius:50%; width: 25px; height:25px;  padding:0px 9px;"><i class="fa fa-minus"></i></span>
											</div>
													
											<input class="form-control text-center num-product" type="number" min="<?php echo $data->minorder; ?>" name="jumlah" value="<?php echo $data->minorder; ?>" id="jumlahorder" required style="border:0px; height:29px; width: 50px; margin-left: 10px; margin-right: 10px; border-bottom: 1px solid #ccc">
												
											<div class="num-product-up input-group-append cursor-pointer text-center">
												<span class="input-group-text btn btn-colorbutton fs-9" style="border:0px; border-radius:50%; width: 25px; height:25px; padding:0px 9px;"><i class="fa fa-plus"></i></span>
											</div>
										</div>
										<div id="stokrefresh" class="col-5 p-lr-20"></div>
									</div>
									<div class="col-12 m-b-0 p-lr-0">
										Catatan pembeli
									</div>
									<div class="col-12 p-lr-0">
										<input class="form-control" type="text" name="keterangan" value="">
									</div>

									<div class="col-12 m-t-10 p-lr-0">
										<?php if($this->func->cekWishlist($data->id) == false){ ?>
										<button type="button" onclick="tambahWishlist(<?=$data->id?>,'<?=$data->nama?>')" class="btn btn-md btn-outline-danger btn-block btn-wish m-b-40"><i class="fas fa-heart"></i> &nbsp;Tambah ke Wishlist</button>
										<?php } ?>
										<button type="submit" id="submit" class="btn btn-md btn-colorbutton btn-block">
											<i class="fa fa-shopping-cart"></i> &nbsp;<?=$textorder?>
										</button>
										<a href="javascript:void(0)"  data-url="<?= $data->url;?>"	class="btn btn-block btn-md btn-outline-colorbutton btn_beli_wa">
											<i class="fab fa-whatsapp"></i> &nbsp;Beli via Whatsapp
										</a>
										<span id="proses" class="" style="display:none;"><b><i class="fa fa-spin fa-spinner text-primary"></i> Memproses pesanan</b></span>
										<span id="gagal" class="m-t-20" style="display:none;"><i class="text-danger fa fa-exclamation-triangle"></i> Gagal memproses pesanan.</span>
									</div>
									<!--
									<nav class="navbar navbar-expand navbar-dark d-md-none d-lg-none d-xl-none fixed-bottom navbar-bottom" style="background: #fff; margin: 10px 5px; border-radius:10px; box-shadow: 0px 0px 15px #555">
									    <ul class="navbar-nav nav-justified" style="font-size: 12px;">
									      
									      <li class="nav-item">
									      	<a href="https://wa.me/<?=$this->func->getRandomWasap()?>/?text=Halo,%20saya%20ingin%20membeli%20produk%20*<?=$data->nama?>*%20apakah%20masih%20tersedia?" class="btn btn-block btn-sm btn-dark" style="height: 50px">
											<i class="fab fa-whatsapp"></i> &nbsp;Beli via Whatsapp
											</a>
									      </li>
									      <li class="nav-item">
									        <button type="submit" id="submit" class="btn btn-sm btn-primary btn-block" style="height: 50px; margin-left:15px">
											<i class="fa fa-shopping-cart"></i> &nbsp;<?=$textorder?>
											</button>

									      </li>
									      
									    </ul>
									</nav> -->
								</div>
							</div>
						</form>
						<?php }else{ ?>
						<div class="p-tb-10 p-lr-20 m-b-16 m-t-32 btn font-medium bg-danger text-light btn-block">
							<?php if($data->preorder == 0){ ?>
								Maaf, Stok telah habis
							<?php }else{ ?>
								Maaf, Kuota Pre Order sudah penuh
							<?php } ?>
						</div>
						<?php } ?>
					<?php }else{ ?>
						<div class="col-12 m-t-40 p-lr-10">
							<a href="<?php echo site_url("home/signin"); ?>" class="btn btn-lg btn-primary btn-block">
								Beli Produk
							</a>
							 <!--<a href="https://wa.me/<?=$this->func->getRandomWasap()?>/?text=Halo,%20saya%20ingin%20membeli%20produk%20*<?=$data->nama?>*%20apakah%20masih%20tersedia?" class="btn btn-lg btn-outline-dark btn-block">
								<i class="fab fa-whatsapp"></i> &nbsp;Beli via Whatsapp-->
								<a href="javascript:void(0)" class="btn_beli_wa btn btn-lg btn-outline-dark btn-block" data-url="<?= $data->url;?>">
								<i class="fab fa-whatsapp"></i> &nbsp;Beli via Whatsapp
							</a>
						</div>
					<?php } ?>
					</div>
				</div>
			</div>
			<div class="row">
				<?php 
					if($this->func->cekLogin() == true){ ?>
				
					<nav class="navbar navbar-expand d-md-none d-lg-none d-xl-none fixed-bottom navbar-bottom animate__animated animate__fadeInUp animate__delay-1s" style="background-color: transparent;">
				
						<div class="container-fluid navbar-nav nav-justified bg-color2 p-t-8 p-b-8" style="border-radius: 5px; box-shadow: 0px 0px 15px #555" id="container_navbar">
							<div class="col-sm-1 nav-item">
									<input type="hidden" value="0" id="value_menu">

									<?php if($this->func->cekLogin() == true){ ?><label class="notif_badge_menu bg-color1" id="notif_badge_menu" style="left: 5px"><?=$this->func->getKeranjang()?></label>
										<?php } ?>
									<a href="<?= site_url('home/keranjang');?>">
									<div class="nav-menu menu-in" id="menu" style="margin-top:-30px; float: left; width: 40px; height:40px; font-size:12px !important; line-height: 57px;"> <i class="material-icons">shopping_cart</i> </div>
									<a href="<?= site_url('home/keranjang');?>">

								</div>
							
								<div class="col-sm-5 nav-item nav-kiri">
									<ul class="navbar-nav nav-justified" style="float: right;">
										<a href="javascript:void(0)" class="btn_beli_wa" data-url="<?= $data->url;?>"><li class="btn btn-sm btn-beli btn btn-outline-colorbutton"><i class="fab fa-whatsapp"></i> Beli via WA</li></a>
										 
									</ul>
								</div>
								<div class="col-1"></div>
								<div class="col-sm-5 nav-item nav-kanan">
									<ul class="navbar-nav nav-justified" style="float:right;">
										 
										<li class="btn btn-sm btn-beli btn btn-colorbutton"><button type="button" class="animate__animated animate__tada  animate__delay-3s text-light" data-toggle="modal" data-target="#modal_beli"  data-url="<?= $data->url;?>" id="btn_beli_langsung_login"><i class="fa fa-plus"></i> Beli Sekarang</button></li>
									</ul>
								</div>
								
							
						</div>
					</nav>
				<?php } else{ ?>

					<nav class="navbar navbar-expand d-md-none d-lg-none d-xl-none fixed-bottom navbar-bottom animate__animated animate__fadeInUp animate__delay-1s" style="background-color: transparent;">
				
						<div class="container-fluid navbar-nav nav-justified bg-color2 p-t-8 p-b-8" style="border-radius: 5px; box-shadow: 0px 0px 15px #555" id="container_navbar">
							<div class="col-sm-1 nav-item">
									<input type="hidden" value="0" id="value_menu">
									<a href="<?= site_url('home/keranjang');?>">
										<div class="nav-menu menu-in" id="menu" style="margin-top:0px; float: left; width: 40px; height:40px; font-size:12px !important; line-height: 57px;"> <i class="material-icons">shopping_cart</i> </div>
									</a>
								</div>
							
								<div class="col-sm-5 nav-item nav-kiri">
									<ul class="navbar-nav nav-justified" style="float: right;">
										<a href="javascript:void(0)" class="btn_beli_wa" data-url="<?= $data->url;?>"><li class="btn btn-sm btn-beli btn btn-outline-colorbutton"><i class="fab fa-whatsapp"></i> Beli via WA</li></a>
										 
									</ul>
								</div>
								<div class="col-1"></div>
								<div class="col-sm-5 nav-item nav-kanan">
									<ul class="navbar-nav nav-justified" style="float:right;">
										 
										<li class="btn btn-sm btn-beli btn btn-colorbutton"><button type="button" class="animate__animated animate__tada  animate__delay-3s text-light" data-toggle="modal" data-target="#modal_beli"  data-url="<?= $data->url;?>" id="btn_beli_langsung"><i class="fa fa-plus"></i> Beli Sekarang</button></li>
									</ul>
								</div>
								
							
						</div>
					</nav> 

				<?php } ?>
			</div>
		</div>
	</section>

	<section class="produk colorbg colortext">
	   	<div class="container">
	  		<div class="row">
	  			<div class="col-6 animate__animated animate__slideInLeft  animate__delay-3s" style="text-align: left; height: 35px; line-height: 45px">
	  				<span class="fs-12 color1">PRODUK TERKAIT</span>
	  			</div>
	  			<div class="col-6 animate__animated animate__fadeInDown  animate__delay-3s" style="text-align: right;height: 35px; line-height: 45px">
	  				<span class="fs-12"><a href="<?= site_url("shop");?>" class="colortext">Lihat Lainnya <i class="fa fa-chevron-right"></i></a></span>
	  			</div>
	  		</div>
	  		<div class="row display-flex produk-wrap">
					<?php
						$this->db->where("idcat",$kategori->id);
			            $this->db->where("id!=",$data->id);
			            $this->db->limit(12);
			            $this->db->order_by("id","RANDOM");
			            $dbs = $this->db->get("produk");
						$totalproduk = 0;
						foreach($dbs->result() as $r){
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
										<span class="color1 fs-14"><i class="fa fa-comment"> <small><?=$ulasan['ulasan']?></small> 	</i> |  <i class='fa fa-star'></i> <small><?=$ulasan['nilai']?></small> </span>
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

	<!-- Related Products -->
	<div class="modal animate__animated animate__slideInUp animate__slow" id="modal_beli" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content modal_fixed">
				<div id="detail_produk"></div>
			</div>

		</div>
	</div>

	<div class="modal animate__animated animate__slideInUp animate__slow" id="modal_beli_wa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content modal_fixed">
				<div id="detail_produk_wa"></div>
			</div>

		</div>
	</div>

	<!-- Hidden Input For Checkout WA -->
	<input type="hidden" id="nama_produk" value="-">
	<input type="hidden" id="varian" value="-">
	<input type="hidden" id="subvarian" value="-">
	<input type="hidden" id="harga" value="-">
	<input type="hidden" id="jml_beli" value="-">
	<input type="hidden" id="berat_produk" value="-">
	<input type="hidden" id="catatan" value="-">

	<input type="hidden" id="ongkir" value="-">
	<input type="hidden" id="ekspedisi" value="-">

	<input type="hidden" id="nama_pembeli" value="-">
	<input type="hidden" id="no_hp" value="-">
	<input type="hidden" id="alamat" value="-">
	<input type="hidden" id="provinsi" value="-">
	<input type="hidden" id="kab" value="-">
	<input type="hidden" id="kec" value="-">
	<input type="hidden" id="kodepos" value="-">
	

  <script>
	

	$(document).ready(function(){


		$(window).bind('scroll', function () {
		    if ($(window).scrollTop() > 110) {
		      
		       $('.buy').removeClass('fixed');
		       //$('.buy').addClass('fixed animate__animated animate__slideInDown');
		    } else {
		       $('.buy').addClass('fixed');
		       //$('.buy').removeClass('fixed animate__animated animate__slideInDown');
		    }
		});
		function updateToken(token){
			$("#tokens,.tokens").val(token);
		}
		$('#btn_beli_langsung').click(function(){
			let data_id = $(this).attr('data-url');
			$.get("<?= base_url(); ?>home/masuk_dulu/" + data_id, function(data) {
				$('#detail_produk').html(data);
				$('#form_masuk_yuk').submit(function(e){
					e.preventDefault();
					var me = $(this);

		                $.ajax({
		                  url:me.attr('action'),
		                  method:'POST',
		                  data:new FormData(this),
		                  dataType:'JSON',
		                  contentType:false,
		                  processData:false,
		                  beforeSend:function(){
		                    $('.button-login').html('Loading...');
		                  },
		                  success: function(data){
		                    if (data.hasil == true) {
		                      swal.fire({
		                        title:"Berhasil",
		                        text:"Oke",
		                        icon:"success"
		                      });

		                      $('#modalbeli').hide();

		                      location.reload(true);
		                    }
		                    else{
		                      swal.fire({
		                        title:"Gagal",
		                        text:"Oke",
		                        icon:"error"
		                      });

		                      $('.button-login').html('Selanjutnya');
		                    }
		                  }
		                });

				});


				$('#form_login_biasa').submit(function(e){
					e.preventDefault();
					var datar = $(this).serialize();
					datar = datar + "&" + $("#names").val() + "=" + $("#tokens").val();
					$.post("<?=site_url("home/login_biasa")?>",datar,function(s){
						fbq("track","Contact");
						var data = eval("("+s+")");
						updateToken(data.token);
						$("#kirimpesan input").val("");
						if(data.success == true){
							swal.fire({
		                        title:"Berhasil",
		                        text:"Login Berhasil",
		                        icon:"success"
		                      });

		                      $('#modalbeli').hide();

		                      location.reload(true);
						}else{
							swal.fire({
		                        title:"Gagal",
		                        text:data.pesan,
		                        icon:"error"
		                      });

		                      $('.button-login').html('Selanjutnya');
						}
					});

				});
			});
			

		});

		$('#btn_beli_langsung_login').click(function() {
			let data_id = $(this).attr('data-url');
			$('#detail_produk').html("");
			
			$.get("<?= base_url(); ?>home/detail_produk/" + data_id, function(data) {
				$('.modal_class').addClass('animate__animated animate__fadeIn')

				$('#detail_produk').html(data);


				$('.num-product-down').on('click', function(e) {
					e.stopPropagation();
					e.preventDefault();
					var numProduct = Number($(this).next().val());
					if (numProduct > 1) $(this).next().val(numProduct - 1).trigger("change");
				});

				$('.num-product-up').on('click', function(e) {
					e.stopPropagation();
					e.preventDefault();
					var numProduct = Number($(this).prev().val());
					$(this).prev().val(numProduct + 1).trigger("change");
				});

				$(".jumlahorder").change(function() {
					if (parseInt($(this).val()) < parseInt($(this).attr("min"))) {
						$(this).val($(this).attr("min")).trigger("change");
					}

					if (parseInt($(this).val()) > parseInt($(this).attr("max"))) {
						$(this).val($(this).attr("max")).trigger("change");
					}
				});

				$(".warna").on("change", function() {
					let data_variasi = $(this).attr('data_variasi');
					if ($(this).val() != "") {
						$(".size").html($("#warna_" + $(this).val()).html());

					} else {
						$(".size").html('<option value="">Pilih ' + data_variasi + ' dulu</option>');

					}

					$("#stokrefresh2").html("");
				});

				$(".size").on("change", function() {
					$("#variasi2").val($(this).find(":selected").data('variasi'));
					$("#jumlahorder2").attr("max", $(this).find(":selected").data('stok'));
					$("#stokmaks2").html($(this).find(":selected").data('stok'));
					$("#harga2").val($(this).find(":selected").data('harga'));
					$("#hargacetak2").html("IDR " + formUang($(this).find(":selected").data('harga')));
					$("#stokrefresh2").html("stok: "+$(this).find(":selected").data('stok'));
				});

				$("#keranjang2").on("submit", function(e) {
					e.preventDefault();
					var submit = $("#submit2").html();
					$("#submit2").html("<i class='fas fa-compact-disk fa-spin'></i> memproses...");

					$.post("<?php echo site_url("assync/prosesbeli"); ?>", $(this).serialize(), function(msg) {
						var data = eval("(" + msg + ")");
						//$("#proses").hide();
						$("#submit2").html(submit);
						if (data.success == true) {

							Swal.fire({
								title: 'Berhasil!',
								text: "Ditambahkan ke keranjang belanja, Lanjutkan ke Pembayaran?",
								icon: 'success',
								showCancelButton: true,
								confirmButtonText: 'Lanjut Pembayaran',
								cancelButtonText: 'Kembali Belanja'
							}).then((result) => {
								if (result.value) {
									window.location.href = "<?php echo site_url("home/keranjang"); ?>";
								} else {
									window.location.href = "<?php echo site_url("shop"); ?>";
								}
							});
						} else {
							swal.fire("Gagal", "tidak dapat memproses pesanan \n " + data.msg, "error");
						}
					});

				});




			});
		});

		$('.btn_beli_wa').click(function(){
			let data_id = $(this).attr('data-url');
			$('#modal_beli_wa').modal('show');
			

			let total_harga = parseInt(harga) * parseInt(jml_beli);
			
			let berat_produk = $('#berat_produk').val();
			let ongkir = $('#ongkir').val();
			let jml_total = jml_beli + parseInt(ongkir);
			
			let ekspedisi = $('#ekspedisi').val();
			let nama_pembeli = $('#nama_pembeli').val();
			let no_hp = $('#hp').val();
			let alamat = $('#alamat').val();
			let prov = $('#prov').val();
			let kab = $('#kab').val();
			let kec = $('#kec').val();
			let kodepos = $('#kodepos').val();

			$.get("<?= base_url(); ?>home/beli_wa/" + data_id, function(data) {
				$('#detail_produk_wa').html(data);
				
				$('.num-product-down').on('click', function(e) {
					e.stopPropagation();
					e.preventDefault();
					var numProduct = Number($(this).next().val());
					if (numProduct > 1) $(this).next().val(numProduct - 1).trigger("change");
				});

				$('.num-product-up').on('click', function(e) {
					e.stopPropagation();
					e.preventDefault();
					var numProduct = Number($(this).prev().val());
					$(this).prev().val(numProduct + 1).trigger("change");
				});

				$(".jumlahorder").change(function() {
					if (parseInt($(this).val()) < parseInt($(this).attr("min"))) {
						$(this).val($(this).attr("min")).trigger("change");
					}

					if (parseInt($(this).val()) > parseInt($(this).attr("max"))) {
						$(this).val($(this).attr("max")).trigger("change");
					}
				});

				$(".warna").on("change", function() {
					let data_variasi = $(this).attr('data_variasi');
					let variasi_selected = $(".warna option:selected").attr('data-varian');
					
					if ($(this).val() != "") {
						
						$(".size").html($(".warna_" + $(this).val()).html());
						$('#formnya_varian').val(variasi_selected);
						

					} else {
						$(".size").html('<option value="">Pilih ' + data_variasi + ' dulu</option>');

					}

					$("#stokrefresh2").html("");
				});

				$(".size").on("change", function() {
					//$("#variasi2").val($(this).find(":selected").data('variasi'));
					$("#jumlahorder2").attr("max", $(this).find(":selected").data('stok'));
					$("#stokmaks2").html($(this).find(":selected").data('stok'));
					$("#harga2").val($(this).find(":selected").data('harga'));
					$("#hargacetak2").html("IDR " + formUang($(this).find(":selected").data('harga')));
					$("#stokrefresh2").html("stok: "+$(this).find(":selected").data('stok'));
					let data_subvarian = $('.size option:selected').attr('data-subvarian');
					$('#formnya_subvarian').val(data_subvarian);
				});

				$("#keranjang2").on("submit", function(e) {
					e.preventDefault();
					var submit = $("#submit2").html();
					$("#submit2").html("<i class='spinner-border spinner-border-sm text-light'></i> Memproses...");


					let beli_nama_produk = $('#beli_nama_produk').attr('data-produk');
					let beli_harga = $('#harga2').val();
					let beli_varian = $('#formnya_varian').val();
					let beli_subvarian = $('#formnya_subvarian').val();
					let beli_jml_beli = $('#beli_jml_beli').val();
					let beli_berat_produk = $('#beli_berat_produk').val();
					let beli_catatan = $('#beli_catatan').val();

					$('#nama_produk').val(beli_nama_produk);
					$('#harga').val(beli_harga);
					$('#varian').val(beli_varian);
					$('#subvarian').val(beli_subvarian);
					$('#jml_beli').val((beli_jml_beli));
					$('#berat_produk').val(beli_berat_produk);
					$('#catatan').val(beli_catatan);

					let total_harga = parseInt(beli_harga) * parseInt(beli_jml_beli);
					


					//alert($('#harga').val()+'-'+$('#varian').val()+'-'+$('#subvarian').val()+'-'+$('#jml_beli').val()+'-'+$('#catatan').val());
					$.get("<?= base_url(); ?>home/form_beli_wa/"+beli_berat_produk+"/"+beli_nama_produk+"/"+beli_harga+"/"+beli_jml_beli+"/"+total_harga+"/"+beli_varian+"/"+beli_subvarian+"/"+beli_catatan, function(data){
						$('#detail_produk_wa').html(data);
						
						$("#form_beli_wa").on("submit",function(e){
						  e.preventDefault();
						  $("#button_beli_wa").html('Sedang diproses...');
					      
					      var total = parseFloat($("#totalsemua").val());

					      var datar = $(this).serialize();
						  datar = datar + "&" + $("#csrf_name").val() + "=" + $("#csrf_token").val();
						  $.post("<?php echo site_url("assync/bayarpesananwa"); ?>",$("#form_beli_wa").serialize()+"&"+$("#csrf_name").val()+"="+$("#csrf_token").val(),function(msg){
						    var data = eval("("+msg+")");
						    $(".csrf_token").val(data.token);
						    if(data.success == true){
						      swal.fire({
		                        title:"Berhasil",
		                        text:"Terima kasih sudah memesan, pesanan anda akan kami proses",
		                        icon:"success"
		                      });
		                      $('#modal_beli_wa').hide();
		                      location.reload(true);
						    }else{
						      swal.fire({
		                        title:"Gagal",
		                        text:"Gagal membuat pesanan",
		                        icon:"error"
		                      });
		                      $('#button_beli_wa').html('<i class="fab fa-whatsapp"></i> Pesan Via WA');
						    }
						    
						  });
												

			               

						});




						$('.js-select2').select2();
						
						$(".js-select2").select2({
						    dropdownCssClass: "f-sm-12 f-md-14"// need to override the changed default
						});

						$(".nav-tabs a").click(function(){
						    $(this).tab('show');
						  });

						$('.data_saya').click(function(){
							$('.alamat_saya_tab').hide();
							$('.info_pesanan_tab').hide();
							$('.data_saya_tab').show();
						});

						$('.alamat_saya').click(function(){
							$('.data_saya_tab').hide();
							$('.info_pesanan_tab').hide();
							$('.alamat_saya_tab').show();
						});
						$('.info_pesanan').click(function(){
							$('.data_saya_tab').hide();
							$('.alamat_saya_tab').hide();
							$('.info_pesanan_tab').show();
						});

						$(".ongkir").change(function(){
						  var ongkir = $(this).val();
						  //if(ongkir > 0){
							var harga = $("#totalharga").val();
							var totalharga = Number(harga) + Number(ongkir);

							//$("#ongkirtoko").html(formUang(ongkir));
							//$("#totaltoko").html(formUang(totalharga));
						  //}
						});

					    function hitungOngkir(){
					    	let form_nama_penerima = $("#form_nama_penerima").val();
					    	var tujuan = $("#tujuan").val();
					      if((form_nama_penerima != null) && (tujuan > 0)){
					        
					      	
					          var kurir = $(".kurir").val();
					          var service = $(".paket").val();
					          var berat = $("#berat").val();
					          var dari = $("#dari").val();
					          if(kurir != "" && service != ""){
					            $.post("<?php echo site_url("assync/cekongkir"); ?>",{"berat":berat,"dari":dari,"tujuan":tujuan,"kurir":kurir,"service":service,[$("#csrf_name").val()]: $("#csrf_token").val()},function(msg){
					              var data = eval("("+msg+")");
					              $(".csrf_token").val(data.token);
					              if(data.success == true){
					                $("#ongkir").val(data.harga).trigger("change");
					                if(data.harga == 0 && $(".kurir").val() != "cod"){
					                  errorKurir();
					                }
					                calculateOngkir();
					                $('.button_beli_wa').removeClass('hide');

					               
					              }else{
					                $("#ongkir").val(0).trigger("change");
					                calculateOngkir();
					                errorKurir();
					              }
					            });
					          }
					      }else{
					        swal.fire("Penting!", "Lengkapi data diri dan alamat terlebih dahulu","error");
					      }
					    }
					    function calculateOngkir(){
					      var sum = 0;
					      var sumi = true;
					      $(".ongkir").each(function(){
					        sum += parseFloat($(this).val());
					        if($(this).val() > 0 && sumi == true){
					          sumi = true;
					        }else{
								if($(".kurir").val() == "cod"){
									sumi == true;
								}else{
									sumi = false;
								}
					        }
					      });
					      var totalsemuashow = sum + parseFloat($("#totalharga").val());

					      if(sumi == false){
					        $(".pembayaran").hide();
					        $("#error-bayar").show();
					        $('#button_beli_wa').hide();
					        $('#button_beli_wa_false').show();

					      
					      }else{
					        $(".pembayaran").show();
					        $("#error-bayar").hide();
					        $('#button_beli_wa').show();
					        $('#button_beli_wa_false').hide();
					      }

					      $("#total").val(totalsemuashow);
					      $("#totalsemuashow").html(formUang(totalsemuashow));
					      $("#ongkirshow").html(formUang(sum));

					      
					 
					      $(".ongkirshow").html(formUang(sum));

					      $('#totalsemua').val(totalsemuashow);
					      $('#ongkir').val(sum);

					      //$('html, body').animate({ scrollTop: $("#totalbayar").offset().top - 400 });

					      //RESET PEMBAYARAN
					     
					    }
					   function resetOngkir(){
						  $('#totalsemuashow').html('');
						  $('#ongkirshow').html('');
						  $('#totalsemua').val(0);
						  $('#ongkir').val(0);
						  $('#button_beli_wa').hide();
						  $('#button_beli_wa').hide();
					      $('#button_beli_wa_false').show();
					    }
					    function errorKurir(){
					      $("#error-kurir").show();
					      //$('html, body').animate({ scrollTop: $("#error-kurir-"+idtoko).offset().top - 260 });
					    }

					    let form_no_hp = $('#form_no_hp').val();
					    if (form_no_hp = null) {
					    	resetOngkir();
					    }


						//KURIR
						 $(".kurir").change(function(){
						    $("#error-kurir").hide();
						      var me = $(this).val();
						      if($(this).val() != ""){
						      	$('#kurir_nama').val(me);
						        var data = $("#service"+$(this).val()).html();
						        $(".paket").html(data)
						        $(".ongkir").val("0");
						        $("#ongkirshow").html("0");
						        

						        hitungOngkir();
						      }else{
						        resetOngkir();
						        
						      }
						});
						$(".paket").change(function(){
							var me = $('.paket option:selected').val();
							$('#kurir_service').val(me);
					        $("#error-kurir").hide();
					        hitungOngkir();
					    });
						//LOAD KABUPATEN KOTA & KECAMATAN
					    $("#prov").change(function(){
					      	$("#kab").html("<option value=''>Loading...</option>");
					      	$("#kec").html("<option value=''>Kecamatan</option>");
					      	var me = $("#prov option:selected").attr('data-nama');
					      	$('#alamat_prov').val(me);
					      	
					      	resetOngkir();
							$.post("<?php echo site_url("assync/getkab"); ?>",{"id":$(this).val(),[$("#csrf_name").val()]: $("#csrf_token").val()},function(msg){
								var data = eval("("+msg+")");
					        	$(".csrf_token").val(data.token);
									$("#kab").html(data.html);
								});
							});
							$("#kab").change(function(){
					     		resetOngkir();
					     		var me = $("#kab option:selected").attr('data-nama');
					      		$('#alamat_kab').val(me);
					     	 	$("#kec").html("<option value=''>Loading...</option>");
								$.post("<?php echo site_url("assync/getkec"); ?>",{"id":$(this).val(),[$("#csrf_name").val()]: $("#csrf_token").val()},function(msg){
									var data = eval("("+msg+")");
					        		$(".csrf_token").val(data.token);
									$("#kec").html(data.html);
								});
							});
						    $("#kec").change(function(){
						     	var data = $(this).find(":selected").val();
						     	$("#tujuan").val(data);
						     	$(".tujuan").val(data);
						      	let tujuan = $("#tujuan").val();
						     	var me = $("#kec option:selected").attr('data-nama');
					      	  	$('#alamat_kec').val(me);

									hitungOngkir();
						    });   
						});

					
					

				});
			});
		});



		$('.num-product-down').on('click', function(e){
	        e.stopPropagation();
	        e.preventDefault();
	        var numProduct = Number($(this).next().val());
	        if(numProduct > 1) $(this).next().val(numProduct - 1).trigger("change");
	    });

	    $('.num-product-up').on('click', function(e){
	        e.stopPropagation();
	        e.preventDefault();
	        var numProduct = Number($(this).prev().val());
	        $(this).prev().val(numProduct + 1).trigger("change");
	    });

		$(".prod-thumb-item").on("click",function(){
			$("#prod-img").attr("src",$(this).data("thumb"));
		});

		$(".btn-wish").click(function(){
			setTimeout(() => {
				$(this).hide("slow");
			}, 1000);
		});

		$(".nav-tabs a").click(function(){
		    $(this).tab('show');
		  });

		$('.deskripsi').click(function(){
			$('.ulasan_tab').hide();
			$('.deskripsi_tab').show();
		});

		$('.ulasan').click(function(){
			$('.deskripsi_tab').hide();
			$('.ulasan_tab').show();
		});
		


		$("#keranjang").on("submit",function(e){
			e.preventDefault();
			var submit = $("#submit").html();
			$("#submit").html("<i class='fas fa-compact-disk fa-spin'></i> memproses...");
			<?php if($data->preorder == 0){ ?>
				$.post("<?php echo site_url("assync/prosesbeli"); ?>",$(this).serialize(),function(msg){
					var data = eval("("+msg+")");
					updateToken(data.token);
					//$("#proses").hide();
					$("#submit").html(submit);
					if(data.success == true){
						fbq('track', 'AddToCart', {content_ids:"<?=$data->id?>",content_type:"<?=$kategorinama?>",content_name:"<?=$data->nama?>",currency: "IDR", value: data.total});
						var nameProduct = $('#js-name-detail').html();
						swal.fire(nameProduct, "berhasil ditambahkan ke keranjang", "success").then((value) => {
							window.location.href = "<?php echo site_url("home/keranjang"); ?>";
						});
					}else{
						swal.fire("Gagal", "tidak dapat memproses pesanan \n "+data.msg, "error");
					}
				});
			<?php }else{ ?>
				$.post("<?php echo site_url("assync/prosespreorder"); ?>",$(this).serialize(),function(msg){
					var data = eval("("+msg+")");
					//$("#proses").hide();
					$("#submit").html(submit);
					if(data.success == true){
						fbq('track', 'AddToCart', {content_ids:"<?=$data->id?>",content_type:"<?=$kategori->nama?>",content_name:"<?=$data->nama?>",currency: "IDR", value: data.total});
						var nameProduct = $('#js-name-detail').html();
						swal.fire(nameProduct, "berhasil mengikuti preorder", "success").then((value) => {
							window.location.href = "<?php echo site_url("home/invoicepreorder"); ?>?inv="+data.inv;
						});
					}else{
						swal.fire("Gagal", "tidak dapat memproses pesanan", "error");
					}
				});
			<?php } ?>
		});

		$("#jumlahorder").change(function(){
			if(parseInt($(this).val()) < parseInt($(this).attr("min"))){
				$(this).val($(this).attr("min")).trigger("change");
			}
			
			if(parseInt($(this).val()) > parseInt($(this).attr("max"))){
				$(this).val($(this).attr("max")).trigger("change");
			}
		});
		
		$("#warna").on("change",function(){
			if($(this).val() != ""){
				$("#size").html($("#warna_"+$(this).val()).html());
			}else{
				$("#size").html("<option value=\"\"> Pilih <?=$data->variasi?> dulu </option>");
			}
			$("#stokrefresh").html("");
		});
		$("#size").on("change",function(){
			$("#variasi").val($(this).find(":selected").data('variasi'));
			$("#jumlahorder").attr("max",$(this).find(":selected").data('stok'));
			$("#stokmaks").html($(this).find(":selected").data('stok'));
			$("#harga").val($(this).find(":selected").data('harga'));
			$("#hargacetak").html("IDR "+formUang($(this).find(":selected").data('harga')));
			$("#stokrefresh").html("stok: "+$(this).find(":selected").data('stok'));
		});
	});
  </script>
  
  <div style="display:none;">
	<?php
		for($i=0; $i<count($warnaid); $i++){
			echo "
				<div id='warna_".$warnaid[$i]."'>
					<option value=''> Pilih ".$data->subvariasi." </option>
			";
			for($a=0; $a<count($sizeid[$warnaid[$i]]); $a++){
				if($stok[$warnaid[$i]][$a] > 0){
					if($level == 5){
						$result = $hardistri[$warnaid[$i]][$a];
					}elseif($level == 4){
						$result = $haragensp[$warnaid[$i]][$a];
					}elseif($level == 3){
						$result = $haragen[$warnaid[$i]][$a];
					}elseif($level == 2){
						$result = $harreseller[$warnaid[$i]][$a];
					}else{
						$result = $har[$warnaid[$i]][$a];
					}
					echo "<option value='".$sizeid[$warnaid[$i]][$a]."' data-stok='".$stok[$warnaid[$i]][$a]."' data-harga='".$result."' data-variasi='".$variasi[$warnaid[$i]][$a]."'>".$this->func->getSize($sizeid[$warnaid[$i]][$a],"nama")."</option>";
				}
			}
			echo "
				</div>
			";
		}
	?>
  </div>

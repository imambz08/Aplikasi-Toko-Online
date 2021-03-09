<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$set = $this->func->globalset("semua");
$nama = (isset($titel)) ? $set->nama." &#8211; ".$titel: $set->nama." &#8211; ".$set->slogan;
$nama_app = $set->nama;
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
					<div class="hide-lg" style="position: relative; left: -30px; height:38px; line-height: 38px">
						<ul class="menu_top" style="float: left; margin-top: 6px">
							<li class="" style="float: left">
								<a href="<?=site_url()?>" class="fs-22 colorwhite">
									<i class="material-icons">arrow_back</i>

								</a>
							</li>
							<h5 class="text-light fs-18" style="margin-left: 48px">Masuk</h5>
						</ul>
					</div>
					<a class="navbar-brand hidesmall" href="<?=site_url()?>">
						<img src="<?= base_url('i/assets/img/'.$set->favicon) ?>" height="38" />
					</a>
					<div class="search-product m-b-0 animate__animated animate__slideInDown animate__delay-1s hidesmall">
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
								
										
								<a href="<?=site_url('home/wishlist')?>" class="fs-22  colorwhite">

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
						</div>
						
							
						
					</ul>
				</div>
			</div>
		</nav>
		


		<!-- Bottom Navbar -->
			
		
			
		
	</header>
	
	<div class="container-fluid sec-login colorbg colortext " style="top: -55px; position: relative; ">
		<div class="row colorbg">
			<div class="col-md-6 col-12 hidesmall">
				<?php
				$this->db->where("tgl<=",date("Y-m-d H:i:s"));
				$this->db->where("tgl_selesai>=",date("Y-m-d H:i:s"));
				$this->db->where("jenis",2);
				$this->db->where("status",1);
				$this->db->where("link","#login");
				$this->db->order_by("id","DESC");
				$sld = $this->db->get("promo");
				if($sld->num_rows() > 0){
					foreach($sld->result() as $s){
				?>
	      		<div class="img-login" style="background-image: url('<?= base_url('i/promo/'.$s->gambar);?> '); background-size:100% 100%; margin-top:50px;  z-index: 99999"></div>
		        <?php
					}
				}
				?>
			</div>

			<div class="col-md-6 col-12">
				<div class="form-login" style="margin-top:50px">
					
					<div class="col-md-10 m-l-auto m-r-auto  bg-sign">
                    	<div class="p-l-2 p-r-20 m-lr-0-xl p-lr-15-sm p-t-10" id="load">
                    		<h5 class="fs-18 text-center m-t-10" style="top: 20px">
								Masuk Yuk!
							</h5>
							<?php 
								$set = $this->func->getSetting("login_otp");
								if($set == 0){
							?>
							<form id="signin" class="p-t-10 p-b-10 p-lr-30 f-sm-12 f-md-14">
								<div class="m-b-20 f-sm-12 f-md-14">
									<input class="form-control f-sm-12 f-md-14 border_bottom" type="text" name="email" placeholder="Email" required >
								</div>
								<div class="m-t-15 m-b-10 f-sm-12 f-md-14">
									<input class="form-control f-sm-12 f-md-14 border_bottom" type="password" name="pass" placeholder="Password" required >
								</div>
								<div class="row m-b-20">
									<div class="col-6">
										<div class="checkbox checkbox-danger">
											<input id="checkbox6" class="dis-inline" type="checkbox" name="remember">
											<label for="checkbox6" class="dis-inline cursor-pointer">
												Ingat Saya
											</label>
										</div>
									</div>
									<div class="col-6 text-right">
										<a href="javascript:void(0)" id="reset" class="text-danger"><b>Lupa Password?</b></a>
									</div>
								</div>
								<div class="row m-t-10">
									<div class="col-md-12 f-sm-12 f-md-14">
										<button type="submit" id="submit" class="btn btn-colorbutton btn-block btn-md f-sm-12 f-md-14">MASUK</button>
										<p class="text-center m-t-20 m-b-10 f-sm-12 f-md-14">Belum punya akun? <a href="<?php echo site_url("home/signup"); ?>" class="color1 f-sm-12 f-md-14">Daftar disini</a></p>
									</div>
								</div>
							</form>
							<?php
								}else{
							?>
							<form id="signin_otp" class="p-t-50 p-b-50 p-lr-30">
								<div class="m-b-12 t-center">
									Masukkan nomor handphone atau alamat email anda untuk mengirimkan kode otp
								</div>
								<div class="m-b-18">
									<input class="form-control p-tb-20 p-lr-24 f-sm-12 f-md-14 font-medium text-center" type="text" name="email" placeholder="No Handphone / Email" required >
								</div>
								<div class="row m-t-20">
									<div class="col-md-12">
										<button type="submit" id="submit" class="btn f-sm-12 f-md-14 btn-colorbutton btn-block btn-lg">MASUK</button>
										<p class="text-center m-t-20 m-b-10 f-sm-12 f-md-14">Belum punya akun? <a href="<?php echo site_url("home/signup"); ?>" class="color1 f-sm-12 f-md-14">Daftar disini</a></p>
									</div>
								</div>
							</form>
							<?php
								}
							?>
						</div>
                    </div>
                </div>
			</div>
			<div class="col-md-6 col-12 hide-lg colorfooter" style="height:100%; padding:0px; margin-top:0px;">
				<?php
				$this->db->where("tgl<=",date("Y-m-d H:i:s"));
				$this->db->where("tgl_selesai>=",date("Y-m-d H:i:s"));
				$this->db->where("jenis",2);
				$this->db->where("status",1);
				$this->db->where("link","#login");
				$this->db->order_by("id","DESC");
				$sld = $this->db->get("promo");
				if($sld->num_rows() > 0){
					foreach($sld->result() as $s){
				?>
	      		<div class="img-login" style="background-image: url('<?= base_url('i/promo/'.$s->gambar);?> '); background-size:100% 100%; margin-top:-20px; margin-left:0px;  z-index: 99999; height: 250px; width: 100%"></div>
		        <?php
					}
				}
				?>
			</div>
		</div>
		<div class="t-center p-l-15 p-r-15">
			<div class="t-center p-t-20">
				Copyright © <?=date('Y');?> <?=ucwords(strtolower($nama_app
					))?></a>
			</div>
		</div>
			
	</div>
	
	<!-- Login -->


  <script type="text/javascript">
  	$(function(){
  		$('footer').hide();
  		$('body').addClass('colorfooter');
  		$('body').removeClass('colorbody');
  		$("#signin").on("submit",function(e){
  			e.preventDefault();

  			var submit = $("#submit").html();
  			$(".form").prop("readonly",true);
  			$("#submit").html("<i class='spinner-border spinner-border-sm'></i> Loading...");
			var datar = $(this).serialize();
			datar = datar + "&" + $("#names").val() + "=" + $("#tokens").val();
  			$.post("<?php echo site_url("home/signin"); ?>",datar,function(msg){
  				var data = eval('('+msg+')');
				updateToken(data.token);
  				if(data.success == true){
  					window.location.href=data.redirect;
  				}else{
  					$("#submit").html(submit);
  					swal.fire("Warning!","alamat email atau password salah, silahkan cek kembali","error");
  				}
  			});
  		});

  		$("#signin_otp").on("submit",function(e){
  			e.preventDefault();

  			var submit = $("#submit").html();
  			$(".form").prop("readonly",true);
  			$("#submit").html("<i class='spinner-border spinner-border-sm'></i> Loading...");
			var datar = $(this).serialize();
			datar = datar + "&" + $("#names").val() + "=" + $("#tokens").val();
  			$.post("<?php echo site_url("home/signin_otp"); ?>",datar,function(msg){
  				var data = eval('('+msg+')');
				updateToken(data.token);
  				if(data.success == true){
  					window.location.href="<?=site_url("home/signin_otp/challenge")?>";
  				}else{
  					$("#submit").html(submit);
  					swal.fire("Warning!","alamat email atau no handphone tidak ditemukan, silahkan cek kembali","error");
  				}
  			});
  		});

  		$("#reset").click(function(){
  			$("#load").html("<div class='t-center m-tb-40'><i class='spinner-border spinner-border-sm'></i> Loading...</div>");
  			$("#load").load("<?php echo site_url("home/signin/pwreset"); ?>");
  		});
  	});
  </script>

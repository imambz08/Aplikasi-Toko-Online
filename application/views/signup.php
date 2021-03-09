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
								<a href="<?=site_url('home/signin')?>" class="fs-22 colorwhite">
									<i class="material-icons">arrow_back</i>

								</a>
							</li>
							<h5 class="text-light fs-18" style="margin-left: 48px">Daftar</h5>
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
								Daftar Yuk!
							</h5>
							<?php 
								$set = $this->func->getSetting("login_otp");
								if($set == 0){
							?>
							<form id="signup" class="p-t-10 p-b-10 p-lr-30">
								<div class="m-b-12">
									<input class="form-control f-sm-12 f-md-14 border_bottom" type="text" id="nama" name="nama" placeholder="Nama Lengkap" required >
								</div>
								<div class="m-b-12">
									<input onkeypress="return isNumber(event)" class="form-control f-sm-12 f-md-14 border_bottom" type="text" name="nohp" placeholder="No Whatsapp" required >
								</div>
								<div class="bor8 m-b-12 how-pos4-parent">
									<input class="form-control f-sm-12 f-md-14 border_bottom" type="text" id="email" name="email" placeholder="Alamat Email" required >
								</div>
								<p id="imelerror" class="text-danger" style="display:none;"><small>terjadi kesalahan, mohon formulir dilengkapi dulu</small></p>
								<div class="bor8 m-t-15 m-b-12 how-pos4-parent">
									<input class="form-control f-sm-12 f-md-14 border_bottom" type="password" name="pass" placeholder="Password" required >
								</div>
								<div class="rs1-select2 rs2-select2 bor8 how-pos4-parent m-b-12" style="display:none">
								<select class="form-control js-select2" name="kelamin" required >
								
									<option value="1">Laki - laki</option>
									<option value="2">Perempuan</option>
								</select>
								<div class="dropDownSelect2" style="display:none"></div>
								</div>
								<div class="row m-b-12 m-t-24 m-l-0 m-r-0" style="display:none">
								<div class='col-12 p-r-0 p-l-5 m-b-10'>Tanggal lahir</div>
								<div class="select2 col-md-3 m-b-10 p-l-0 p-r-0 m-r-14">
									<select class="form-control js-select2" name="tgl" required >
									<option value="1">Tanggal</option>
									<?php
														for($i=1; $i<=31; $i++){
															$a = ($i<10) ? 0 .$i : $i;
															echo '<option value="'.$a.'">'.$i.'</option>';
														}
													?>
									</select>
									<div class="dropDownSelect2"></div>
								</div>
								<div class="select2 col-md-5 m-b-10 p-l-0 p-r-0">
									<select class="form-control js-select2" name="bln" required >
									<option value="01">Bulan</option>
										<option value="01">Januari</option>
										<option value="02">Februari</option>
										<option value="03">Maret</option>
										<option value="04">April</option>
										<option value="05">Mei</option>
										<option value="06">Juni</option>
										<option value="07">Juli</option>
										<option value="08">Agustus</option>
										<option value="09">September</option>
										<option value="10">Oktober</option>
										<option value="11">November</option>
										<option value="12">Desember</option>
									</select>
									<div class="dropDownSelect2"></div>
								</div>
								<div class="select2 col-md-3 m-b-20 p-l-0 p-r-0 m-l-14">
									<select class="form-control js-select2" name="thn" required >
									<option value="2003">Tahun</option>
									<?php
													$awal = date("Y") - 65;
													$akhir = date("Y") - 17;
													for($i=$akhir; $i>=$awal; $i--){
														echo '<option value="'.$i.'">'.$i.'</option>';
													}
												?>
									</select>
									<div class="dropDownSelect2"></div>
								</div>
								</div>
								<div class="row m-t-20">
									<div class="col-md-12">
										<p class="text-warning imelcek" style="display:none;"><i class="spinner-border spinner-border-sm"></i> Sedang memeriksa...</p>
										<div id="proses" style="display:none;"><h5 class="cl1"><i class="spinner-border spinner-border-sm"></i> Sedang memperoses...</div>
										<button id="submit" type="submit" class="btn btn-colorbutton f-sm-12 f-md-14 btn-md btn-block">DAFTAR</button>
										<button type="button" class="btn btn-medium btn-md btn-block btn-primary imelcek" style="display:none;">DAFTAR</button>
										<p class="text-center m-t-20 m-b-10 f-sm-12 f-md-14">Sudah punya akun? <a href="<?php echo site_url("home/signin"); ?>" class="color1 f-sm-12 f-md-14">Masuk disini</a></p>
									</div>
								</div>
							</form>
							<?php
								}else{
							?>
							<form id="signup_otp" class="p-t-50 p-b-50 p-lr-30">
								<div class="m-b-12 t-center">
									Masukkan nomor handphone atau alamat email anda untuk mengirimkan kode otp
								</div>
								<div class="m-b-18">
									<input class="form-control p-tb-20 p-lr-24 f-sm-12 f-md-14 font-medium text-center" type="text" id="emailhp" name="email" placeholder="No Handphone / Email" required >
									<p id="imelerror" class="text-danger" style="display:none;"><small>terjadi kesalahan, mohon formulir dilengkapi dulu</small></p>
									<p class="text-warning imelcek" style="display:none;"><i class="spinner-border spinner-border-sm"></i> Sedang memeriksa...</p>
								</div>
								<div class="row m-t-20">
									<div class="col-md-12">
										<div id="proses" style="display:none;"><h5 class="cl1"><i class="spinner-border spinner-border-sm"></i> Sedang memperoses...</h5></div>
										<button id="submit" type="submit" class="btn btn-colorbutton f-sm-12 f-md-14 btn-lg btn-block">DAFTAR</button>
										<button type="button" class="btn btn-medium btn-lg btn-block imelcek" style="display:none;">DAFTAR</button>
										<p class="text-center m-t-20 m-b-10 f-sm-12 f-md-14">Sudah punya akun? <a href="<?php echo site_url("home/signin"); ?>" class="color1 f-sm-12 f-md-14">Masuk disini</a></p>
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




  <script type="text/javascript">
  $(document).ready(function(){
  	$('footer').hide();
	$('body').addClass('colorfooter');
	$('body').removeClass('colorbody');
  });
  	function validation(){
  		return 0;
  	}
  	function isNumber(evt) {
  		evt = (evt) ? evt : window.event;
  		var charCode = (evt.which) ? evt.which : evt.keyCode;
  		if (charCode > 31 && (charCode < 48 || charCode > 57)) {
  			return false;
  		}
  		return true;
  	}

    $(".email").each(function(){
      if($(this).val() != ""){
        $(this).trigger("change");
      }
    });

  	$(function(){
  		localStorage["error"] = 1;

  		$("#signup").on("submit",function(e){
  			e.preventDefault();

  			if(localStorage["error"] == 0){
				if($("#email").val().length > 8){
					$("input,select").prop("readonly",true);
						$("#proses").show();
						$("#submit").hide();
				//	$("#submit").html("<i class='fa fa-spin fa-spinner'></i> tunggu sebentar...");
					var datar = $(this).serialize();
					datar = datar + "&" + $("#names").val() + "=" + $("#tokens").val();
					$.post("<?php echo site_url("home/signup"); ?>",datar,function(msg){
						var res = eval('('+msg+')');
						updateToken(res.token);
						if(res.success == true){
							fbq('track', 'CompleteRegistration',{content_name:$("#nama").val()});
							$("#load").html(res.result);
							$('html, body').animate({ scrollTop: $("#load").offset().top - 300 });
						}else{
							swal.fire("Belum sesuai","Cek kembali alamat email atau nomor handphone apakah sudah benar/sesuai?","error");
						}
					});
				}else{
					swal.fire("Belum sesuai","Cek kembali alamat email atau nomor handphone apakah sudah benar/sesuai?","error");
				}
  			}else{
  				swal.fire("Sudah terdaftar","Alamat email atau nomor handphone sudah terdaftar, silahkan menuju halaman login untuk masuk ke akun","error");
  			}
  		});
  		$("#signup_otp").on("submit",function(e){
  			e.preventDefault();

  			if(localStorage["error"] == 0){
				if($("#emailhp").val().length > 8){
					$("input,select").prop("readonly",true);
					$("#proses").show();
					$("#submit").hide();
					var datar = $(this).serialize();
					datar = datar + "&" + $("#names").val() + "=" + $("#tokens").val();
					$.post("<?php echo site_url("home/signup_otp"); ?>",datar,function(msg){
						var result = eval('('+msg+')');
						updateToken(result.token);
						fbq('track', 'CompleteRegistration',{content_name:$("#emailhp").val()});
						window.location.href="<?=site_url("home/signup_otp/challenge")?>";
					});
				}else{
					swal.fire("Belum sesuai","Cek kembali alamat email atau nomor handphone apakah sudah benar/sesuai?","error");
				}
  			}else{
  				swal.fire("Sudah terdaftar","Alamat email atau nomor handphone sudah terdaftar, silahkan menuju halaman login untuk masuk ke akun","error");
  			}
  		});

  		$("#email,#emailhp").keyup(function(){
			$("#submit").hide();
			$(".imelcek").show();
  			$("#imelerror").hide();
		});
  		$("#email").change(function(){
			$("#submit").hide();
			$(".imelcek").show();
  			if($(this).val().indexOf("@") != -1 && $(this).val().indexOf(".") != -1){
  				$.post("<?php echo site_url("home/signup/cekemail"); ?>",{"email":$("#email").val(),[$("#names").val()]:$("#tokens").val()},function(msg){
					$("#submit").show();
					$(".imelcek").hide();
  					var result = eval('('+msg+')');
					updateToken(result.token);
					if(result.success == true){
  						$("#imelerror").hide();
						localStorage["error"] = 0;
  					}else{
						localStorage["error"] = 1;
  						$("#imelerror").show();
  						$("#imelerror small").html(result.message);
  					}
  				});
  			}else{
				$("#submit").show();
				$(".imelcek").hide();
				localStorage["error"] = 1;
  				$("#imelerror").show();
  				$("#imelerror small").html("masukkan format email dengan benar");
  			}
      	});
  		$("#emailhp").change(function(){
			$("#submit").hide();
			$(".imelcek").show();
  			$.post("<?php echo site_url("home/signup/cekemail"); ?>",{"email":$("#emailhp").val(),[$("#names").val()]:$("#tokens").val()},function(msg){
				$("#submit").show();
				$(".imelcek").hide();
  				var result = eval('('+msg+')');
				updateToken(result.token);
				if(result.success == true){
  					$("#imelerror").hide();
					localStorage["error"] = 0;
  				}else{
  					$("#imelerror").show();
					localStorage["error"] = 1;
  					$("#imelerror small").html(result.message);
				}
			});
      	});

  	});
  </script>

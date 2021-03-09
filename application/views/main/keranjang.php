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
					<div class="hide-lg" style="position: relative; left: -30px; height:38px; line-height: 38px">
				        <ul class="menu_top" style="float: left; margin-top: 6px">
				          <li class="" style="float: left">
				            <a href="<?=site_url()?>" class="fs-22 colorwhite">
				              <i class="material-icons">arrow_back</i>

				            </a>
				          </li>
				          <h5 class="text-light fs-18" style="margin-left: 48px">Keranjang Saya</h5>
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
			
		
			
		
	</header>
	
	<div class="container-fluid colortext m-b-10" style="top: -55px; position: relative; ">
		<div class="bread-crumb bread-crumb-produk fs-13" style="background-color: transparent;">
			<a href="/" class="text-secondary">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="cl4 color1">
				Keranjang
			</span>
		</div>
	</div>
 	

	<!-- Shoping Cart -->
	<div class="container colorbg colortext" style="position: relative; top: -65px">
			<div class="row m-lr-0">
				<div class="col-md-12 m-r-auto m-l-auto m-b-5 m-t-20">
					
				</div>
			</div>
      <?php
		$keranjang = (isset($_SESSION["usrid"]) AND $_SESSION["usrid"] > 0) ? $this->func->getKeranjang() : 0;
		$hapusProduk = "";
        if($keranjang > 0){
      ?>
			<div class="m-lr-auto m-b-20">
                <?php
                  $this->db->where("usrid",$_SESSION['usrid']);
                  $this->db->where("idtransaksi",0);
                  $ca = $this->db->get("transaksiproduk");
                  $totalbayar = 0;
                  foreach ($ca->result() as $car) {
					$produk = $this->func->getProduk($car->idproduk,"semua");
					if($produk == null){ $hapusProduk .= "hapusProduk(".$car->id.")"; }
                    $totalbayar += $car->harga * $car->jumlah;
					$variasi = $this->func->getVariasi($car->variasi,"semua");
                ?>
					<div class="keranjang row" id="produk_<?php echo $car->id; ?>">
						<div class="col-md-2 col-6">
							<div class="img" style="background-image:url('<?php echo $this->func->getFoto($produk->id,"utama"); ?>')"></div>
							<div class="wrap-num-product input-group hide-lg m-t-10 m-l-5">
									<div class="num-product-down input-group-prepend cursor-pointer text-center">
										<span class="input-group-text btn btn-outline-colorbutton fs-9" style="border:0px; border-radius:50%; width: 25px; height:25px;  padding:0px 9px;"><i class="fa fa-minus"></i></span>
									</div>

									<input class=" text-center num-product produk-jumlah fs-14" type="number" min="<?php echo $produk->minorder; ?>" id="jumlah_<?php echo $car->id; ?>" name="jumlah[]" value="<?php echo $car->jumlah; ?>" data-proid="<?php echo $car->id; ?>" style="border:0px; height:29px; width: 50px; margin-left: 10px; margin-right: 10px; border-bottom: 1px solid #ccc"/>

									<div class="num-product-up input-group-append cursor-pointer text-center">
										<span class="input-group-text btn btn-colorbutton fs-9" style="border:0px; border-radius:50%; width: 25px; height:25px; padding:0px 9px;"><i class="fa fa-plus"></i></span>
									</div>
								</div>
						</div>
						<div class="col-md-10 col-6 row m-lr-0">
							<div class="col-md-5 m-b-10 centered flex-column">
								<span class="font-medium fs-20 w-full"><?php echo $produk->nama; ?></span>
								<?php
								if($car->variasi > 0){
									echo "<span class='color1 w-full' style='font-size:80%;'><b>".$produk->variasi." ".$this->func->getWarna($variasi->warna,'nama')." ".$produk->subvariasi." ".$this->func->getSize($variasi->size,'nama')."</b></span>";
								}
								if($car->keterangan != ""){
									echo "<span class='text-secondary w-full' style='font-size:80%;'><b>Catatan: </b> <i>".$car->keterangan."</i></span>";
								}
								?>
							</div>
							<div class="col-md-3 col-12 m-b-20 centered">
								<div class="wrap-num-product input-group hidesmall">
									<div class="num-product-down input-group-prepend cursor-pointer text-center">
										<span class="input-group-text btn btn-outline-colorbutton fs-9" style="border:0px; border-radius:50%; width: 25px; height:25px;  padding:0px 9px;"><i class="fa fa-minus"></i></span>
									</div>

									<input class=" text-center num-product produk-jumlah fs-14" type="number" min="<?php echo $produk->minorder; ?>" id="jumlah_<?php echo $car->id; ?>" name="jumlah[]" value="<?php echo $car->jumlah; ?>" data-proid="<?php echo $car->id; ?>" style="border:0px; height:29px; width: 50px; margin-left: 10px; margin-right: 10px; border-bottom: 1px solid #ccc"/>

									<div class="num-product-up input-group-append cursor-pointer text-center">
										<span class="input-group-text btn btn-colorbutton fs-9" style="border:0px; border-radius:50%; width: 25px; height:25px; padding:0px 9px;"><i class="fa fa-plus"></i></span>
									</div>
								</div>
							</div>
							<div class="col-9 col-md-3 centered">

								Rp&nbsp;<span id="totalhargauang_<?php echo $car->id; ?>"><?php echo $this->func->formUang($car->harga*$car->jumlah); ?></span>
							</div>
							<div class="col-3 col-md-1 centered">
								<a href="javascript:void(0)" onclick="hapus(<?=$car->id?>)" class="btn btn-sm fs-12 btn-outline-danger"><i class="fa fa-trash-alt"></i></a>
							</div>
						</div>
					</div>
					<input type="hidden" id="harga_<?php echo $car->id; ?>" value="<?php echo $car->harga; ?>" />
					<input type="hidden" class="totalhargaproduk" id="totalharga_<?php echo $car->id; ?>" value="<?php echo $car->harga*$car->jumlah; ?>" />
					<input type="hidden" name="id[]" value="<?php echo $car->id; ?>" />
                <?php
                  }
                ?>
			</div>

			<div class="p-b-15 p-lr-40 p-lr-15-sm m-b-90">
				<div class="row">
					<div class="col-md-8"></div>
					<div class="col-md-4">
						<h5 class="m-b-20 font-bold color1 text-right font-bold fs-18">Total : Rp <strong><span class="totalbayar font-bold" style="padding-left:40px"><?php echo $this->func->formUang($totalbayar); ?></span></strong></h5>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6"></div>
					<div class="col-md-3 m-b-10 p-lr-6">
						<a href="<?php echo site_url("shop"); ?>" class="btn btn-outline-colorbutton btn-md btn-block">
							Kembali Belanja
						</a>
					</div>
					<div class="col-md-3 m-b-10 p-lr-6">
						<a href="<?php echo site_url("home/pembayaran"); ?>" class="btn btn-colorbutton btn-md btn-block">
							Checkout <i class="fa fa-chevron-right"></i>
						</a>
					</div>
				</div>
				<nav class="navbar navbar-expand d-md-none d-lg-none d-xl-none fixed-bottom navbar-bottom animate__animated animate__fadeInUp animate__delay-1s" style="background-color: transparent;">
				
						<div class="container-fluid navbar-nav bg-color2 p-t-8 p-b-8" style="border-radius: 5px; box-shadow: 0px 0px 15px #555" id="container_navbar">
							<div class="row" style="position: relative; left: 15px; width: 100%;">
								<div class="col-6" style="text-align: center;">
									<h6 class="color1 fs-14 m-t-10">Total: Rp <span class="totalbayar" style="font-weight: bold"><?php echo $this->func->formUang($totalbayar); ?></span></h6>
								</div>
								<div class="col-6 text-right" style="align-content: right; align-items: right">
									<div style="float: right; text-align: right;">
										<a href="<?php echo site_url("home/pembayaran"); ?>" class="btn btn-sm btn-colorbutton pull-right font-bold" style="height: 40px; line-height:30px; position: relative; right: 0px">
										 Checkout <i class="fa fa-chevron-right"></i>
										</a>
									</div>
								</div>
							</div>
						</div>
				</nav>
			</div>
		<?php
			}else{
		?>
			<div class="row p-lr-16">
				<div class="col-lg-12 m-lr-auto p-tb-150 m-t-40 m-b-150 text-light" style="border-radius: 16px;">
					<div class="m-lr-0-xl text-center">
						<h3>Keranjang belanja masih kosong.</h3>
					</div>
				</div>
			</div>
		<?php
			}
		?>
	</div>
  <script>
	<?=$hapusProduk?>
	  
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

    $(".produk-jumlah").on('change',function(){
      var jumlah = $(this).val();
      var prodid = $(this).attr("data-proid");
      var harga = Number($("#harga_"+prodid).val());
	  var hargatotal = Number(jumlah) * harga;

      if(jumlah > 0){

		if(jumlah < Number($(this).attr("min"))){
			$(this).val($(this).attr("min")).trigger("change");
			return;
	    }

		$.post("<?php echo site_url("assync/updatekeranjang"); ?>",{"update":prodid,"jumlah":jumlah,[$("#names").val()]: $("#tokens").val()},function(msg){
			var data = eval("("+msg+")");
			updateToken(data.token);
			if(data.success == false){
				swal.fire("Gagal",data.msg,"error")
				.then((willDelete) => {
					location.reload();
				});
			}
		});

        $("#totalhargauang_"+prodid).html(formUang(hargatotal));
        $("#totalharga_"+prodid).val(hargatotal);
        var sum = 0;
        $(".totalhargaproduk").each(function(){
          sum += parseFloat($(this).val());
        });
        $(".totalbayar").html(formUang(sum));

	  }else{
		swal.fire({
		  	title: "Anda yakin?",
		  	text: "menghapus produk dari keranjang belanja",
		  	icon: "warning",
			showDenyButton: true,
			confirmButtonText: "Oke",
			denyButtonText: "Batal",
		})
		.then((willDelete) => {
		  if (willDelete.isConfirmed) {
          //$("#produk_"+prodid).hide();
	        $.post("<?php echo site_url("assync/hapuskeranjang"); ?>",{"hapus":prodid,[$("#names").val()]: $("#tokens").val()},function(msg){
	          	var data = eval("("+msg+")");
			  	updateToken(data.token);
	          	if(data.success == true){
	            	location.reload();
	          	}else{
	            	swal.fire("Gagal","Gagal menghapus pesanan, silahkan ulangi beberapa saat lagi","error");
	          	}
	        });
		  }else{
			$(this).val($(this).attr("min"));
		  }
        });
      }
    });
	
	function hapus(id){
		$("#jumlah_"+id).val(0).trigger("change");
	}
	
	function hapusProduk(id){
		$.post("<?php echo site_url("assync/hapuskeranjang"); ?>",{"hapus":id,[$("#names").val()]: $("#tokens").val()},function(msg){
	        var data = eval("("+msg+")");
			updateToken(data.token);
	        if(data.success == true){
	            location.reload();
	        }else{
	            swal.fire("Gagal","Gagal menghapus pesanan, silahkan ulangi beberapa saat lagi","error");
	        }
	    });
	}
  </script>

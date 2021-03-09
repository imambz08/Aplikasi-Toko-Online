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
		
		<nav class="navbar navbar-expand-lg  navbar-top-lain fixed bg-color1">
			<div class="container">
				
				<div class="col-8">
					<div class="hide-lg" style="position: relative; left: -30px; height:38px; line-height: 38px">
				        <ul class="menu_top" style="float: left; margin-top: 6px">
				          <li class="" style="float: left">
				            <a href="<?=site_url()?>" class="fs-22 colorwhite">
				              <i class="material-icons">arrow_back</i>

				            </a>
				          </li>
				          <h5 class="text-light fs-18" style="margin-left: 48px">Pesanan Saya</h5>
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
	<!-- Container -->
	<div class="p-b-140" style="margin-top:-30px">
		<div class="container-fluid">
			<div class="tab">
				<div class="tab-head pesanan_saya colorbg">

					<ul class="nav list-inline">
						
						  <li class="item nav-item">
						   <a class="navlink belumbayar  border-bottom-active color1" href="javascript:void(0)" data-link="#belumbayar"><i class="fas fa-wallet"></i> Belum Bayar</a>
						  </li>
						  <li class="item nav-item">
						   <a class="navlink dikemas text-secondary" href="javascript:void(0)" data-link="#dikemas"><i class="fas fa-box"></i> Dikemas</a>
						  </li>
						  <li class="nav-item">
						    <a class="navlink dikirim text-secondary" href="javascript:void(0)" data-link="#dikirim"><i class="fas fa-shipping-fast"></i> Dikirim</a>
						  </li>
						   <li class="nav-item">
						    <a class="navlink selesai text-secondary" href="javascript:void(0)" data-link="#selesai"><i class="fas fa-star"></i> Selesai</a>
						  </li>
						   <li class="nav-item">
						    <a class="navlink batal text-secondary" href="javascript:void(0)" data-link="#batal"><i class="fas fa-times"></i> Dibatalkan</a>
						  </li>
						   <li class="nav-item">
						    <a class="navlink preorder text-secondary" href="javascript:void(0)" data-link="#preorder"><i class="fas fa-hourglass-half"></i> Preorder</a>
						  </li>
						
					  
					</ul>

					<!--
					<a class="navlink belumbayar btn btn-primary m-r-8 m-b-8" href="javascript:void(0)" data-link="#belumbayar"><i class="fas fa-money-check-alt"></i> Belum Bayar</a>
					<a class="navlink dikemas btn btn-outline-primary m-r-8 m-b-8" href="javascript:void(0)" data-link="#dikemas"><i class="fas fa-box"></i> Dikemas</a>
					<a class="navlink dikirim btn btn-outline-primary m-r-8 m-b-8" href="javascript:void(0)" data-link="#dikirim"><i class="fas fa-shipping-fast"></i> Dikirim</a>
					<a class="navlink selesai btn btn-outline-primary m-r-8 m-b-8" href="javascript:void(0)" data-link="#selesai"><i class="fas fa-clipboard-check"></i> Selesai</a>
					<a class="navlink batal btn btn-outline-primary m-r-8 m-b-8" href="javascript:void(0)" data-link="#batal"><i class="fas fa-times"></i> Dibatalkan</a>
					<a class="navlink preorder btn btn-outline-primary m-r-8 m-b-8" href="javascript:void(0)" data-link="#preorder"><i class="fas fa-hourglass-half"></i> Preorder</a> -->
				</div>
				<div class="tab-content" style="padding-top:2px">
					<!-- BELUM BAYAR -->
					<div class="tab-pane" id="belumbayar" style="display:block;">
						<div class='m-lr-auto m-t-50 text-center p-tb-10'>
							<h4>
								<div class="spinner-border color1" role="status">
					  				<span class="sr-only">Loading...</span>
								</div>
							</h4>
						</div>
					</div>
					
					<!-- DIKEMAS -->
					<div class="tab-pane" id="dikemas" style="display:none;"></div>

					<!-- DIKIRIM -->
					<div class="tab-pane" id="dikirim" style="display:none;"></div>

					<!-- SELESAI -->
					<div class="tab-pane" id="selesai" style="display:none;"></div>

					<!-- BATAL -->
					<div class="tab-pane" id="batal" style="display:none;"></div>

					<!-- PRE ORDER -->
					<div class="tab-pane" id="preorder" style="display:none;"></div>
				</div>
			</div>
		</div>
	</div>
  	<script type="text/javascript">
		$(function(){
			<?php
				if(isset($_GET["konfirmasi"])){
					$datar = [
						"ipaymu"=>"",
						"ipaymu_link"=>"",
						"ipaymu_trx"=>"",
						"ipaymu_tipe"=>"",
						"ipaymu_channel"=>"",
						"ipaymu_nama"=>"",
						"ipaymu_kode"=>"",
						"midtrans_id"=>""
					];
					$this->db->where("id",$_GET["konfirmasi"]);
					$this->db->update("pembayaran",$datar);
					$this->func->notiftransfer($_GET["konfirmasi"]);
					echo "konfirmasi(".$_GET["konfirmasi"].")";
				}
			?>

			$("#belumbayar").load("<?php echo site_url("assync/pesanan?status=belumbayar"); ?>");

			$(".navlink").each(function(){
				var link = $(this);
				var tab = $(this).data("link");
				var res = tab.replace("#","");
				
				$(this).click(function(){
					$(".navlink.border-bottom-active").addClass("border-bottom-nonaktif text-secondary");
					$(".navlink.border-bottom-active").removeClass("border-bottom-active color1");
					link.removeClass("border-bottom-nonaktif text-secondary");
					link.addClass("border-bottom-active color1");
					$(".tab-pane").hide();
					$(tab).show();
					$(tab).html("<div class='m-lr-auto m-t-50 text-center p-tb-10'><h4><div class='spinner-border color1' role='status'><span class='sr-only'>Loading...</span></div></h4></div>");
					$(tab).load("<?php echo site_url("assync/pesanan?status="); ?>"+res);
				});
			});


			$("#upload").on("submit",function(e){
				$("#upload button").hide();
				$("#upload").append("<h5 class=''><div class='spinner-border color1' role='status'><span class='sr-only'>Loading...</span></div> Mengunggah...</h5>");
			});
		});

		function cekMidtrans(bayar){
			$('#statusmodal').modal();
			$("#status").load("<?=site_url("assync/cekmidtrans")?>?bayar="+bayar);
		}
    	function bayarUlang(trx,invoice){
			swal.fire({
				title: "Anda yakin?",
				text: "metode pembayaran sebelumnya akan dibatalkan.",
				icon: "warning",
				showDenyButton: true,
				confirmButtonText: "Oke",
				denyButtonText: "Batal"
			})
			.then((willDelete) => {
				if (willDelete.isConfirmed) {
					<?php
						$revoke = site_url("home/invoice?revoke=true&inv=");
						$klik = site_url("home/invoice?inv=");
						$set = $this->func->getSetting("semua");
						if(strpos($set->midtrans_snap,"sandbox") == false){
					?>
					/*$.post("<?php echo site_url("assync/bayarulangpesanan"); ?>",{"bayar":trx},function(msg){
						var data = eval("("+msg+")");
						if(data.success == true){
							window.location.href = "<?=$klik?>";
						}else{
							swal("Gagal!","Gagal membatalkan pembayaran sebelumnya, coba ulangi beberapa saat lagi","error");
						}
					});*/
					$.ajax({
						type: "POST",
						url:  "<?=site_url("assync/bayarulangpesanan")?>",
						data: {"bayar":trx},
						statusCode: {
							200: function(responseObject, textStatus, jqXHR) {
								var data = eval("("+msg+")");
								window.location.href = "<?=$revoke?>";
							},
							404: function(responseObject, textStatus, jqXHR) {
								window.location.href = "<?=$revoke?>"+invoice;
							},
							500: function(responseObject, textStatus, jqXHR) {
								window.location.href = "<?=$revoke?>"+invoice;
							}
						}
					});
					<?php }else{ ?>
						//swal("Gagal!","Admin menggunakan server sandbox dari midtrans, jadi tidak dapat mengubah status transaksi di midtrans, tapi anda dapat mengganti metode pembayaran lain","error").then((res) =>{
							window.location.href = "<?=$revoke?>"+invoice;
						//});
					<?php } ?>
				}
			});
    	}
		function konfirmasi(bayar){
			$('#konfirmasimodal').modal();
			$("#bayar").val(bayar);
		}
    	function terimaPesanan(trx){
			swal.fire({
				title: "Anda yakin?",
				text: "pesanan akan di selesaikan dan dana akan diteruskan kepada penjual.",
				icon: "warning",
				showDenyButton: true,
				confirmButtonText: "Oke",
				denyButtonText: "Batal"
			})
			.then((willDelete) => {
				if (willDelete.isConfirmed) {
					$.post("<?php echo site_url("assync/terimaPesanan"); ?>",{"pesanan":trx,[$("#names").val()]: $("#tokens").val()},function(msg){
						var data = eval("("+msg+")");
						updateToken(data.token);
						if(data.success == true){
							refreshDi
							kirim(1);
							$(".selesai").trigger("click");
						}else{
							swal.fire("Gagal!","Gagal menyelesaikan pesanan, coba ulangi beberapa saat lagi","error");
						}
					});
				}
			});
    	}
    	function ajukanbatal(trx){
			swal.fire({
				title: "Anda yakin?",
				text: "pesanan akan dibatalkan dan apabila penjual telah menyetujui maka pembayaran akan dikembalikan ke saldo Anda.",
				icon: "warning",
				showDenyButton: true,
				confirmButtonText: "Oke",
				denyButtonText: "Batal"
			})
			.then((willDelete) => {
				if (willDelete.isConfirmed) {
					$.post("<?php echo site_url("assync/requestbatalkanPesanan"); ?>",{"pesanan":trx,[$("#names").val()]: $("#tokens").val()},function(msg){
						var data = eval("("+msg+")");
						updateToken(data.token);
						if(data.success == true){
							refreshBatal(1);
							$(".batal").trigger("click");
						}else{
							swal.fire("Gagal!","Gagal mengajukan pembatalan pesanan, coba ulangi beberapa saat lagi","error");
						}
					});
				}
			});
   		}
		function batal(bayar){
			swal.fire({
				title: "Anda yakin?",
				text: "pesanan akan dibatalkan.",
				icon: "warning",
				showDenyButton: true,
				confirmButtonText: "Oke",
				denyButtonText: "Batal"
			})
			.then((willDelete) => {
				if (willDelete.isConfirmed) {
					$.post("<?php echo site_url("assync/batalkanPesanan"); ?>",{"pesanan":bayar,[$("#names").val()]:$("#tokens").val()},function(msg){
						var data = eval("("+msg+")");
						updateToken(data.token);
						if(data.success == true){
							refreshBatal(1);
							$(".batal").trigger("click");
						}else{
							swal.fire("Gagal!","Gagal membatalkan pesanan, doba ulangi beberapa saat lagi","error");
						}
					});
				}
			});
		}
		function perpanjang(bayar){
			swal.fire({
				title: "Anda yakin?",
				text: "Batas waktu pengemasan penjual akan diperpanjang 2 hari.",
				icon: "warning",
				showDenyButton: true,
				confirmButtonText: "Oke",
				denyButtonText: "Batal"
			})
			.then((willDelete) => {
				if (willDelete.isConfirmed) {
					$.post("<?php echo site_url("assync/perpanjangPesanan"); ?>",{"pesanan":bayar,[$("#names").val()]: $("#tokens").val()},function(msg){
						var data = eval("("+msg+")");
						updateToken(data.token);
						if(data.success == true){
							refreshBatal(1);
							$(".dikemas").trigger("click");
						}else{
							swal.fire("Gagal!","Gagal membatalkan pesanan, doba ulangi beberapa saat lagi","error");
						}
					});
				}
			});
		}
		function refreshBelumbayar(page){
			$("#belumbayar").html("<div class='m-lr-auto text-center p-tb-40'><h4><i class='fas fa-spin fa-compact-disc text-success'></i> loading...</h4></div>");
			$("#belumbayar").load("<?php echo site_url("assync/pesanan?status=belumbayar&page="); ?>"+page);
		}
		function refreshBatal(page){
			$("#batal").html("<div class='m-lr-auto txt-center p-tb-40'><h4><i class='fas fa-spin fa-compact-disc text-success'></i> loading...</h4></div>");
			$("#batal").load("<?php echo site_url("assync/pesanan?status=batal&page="); ?>"+page);
		}
		function refreshDikemas(page){
			$("#dikemas").html("<div class='m-lr-auto txt-center p-tb-40'><h4><i class='fas fa-spin fa-compact-disc text-success'></i> loading...</h4></div>");
			$("#dikemas").load("<?php echo site_url("assync/pesanan?status=dikemas&page="); ?>"+page);
		}
		function refreshDikirim(page){
			$("#dikirim").html("<div class='m-lr-auto txt-center p-tb-40'><h4><i class='fas fa-spin fa-compact-disc text-success'></i> loading...</h4></div>");
			$("#dikirim").load("<?php echo site_url("assync/pesanan?status=dikirim&page="); ?>"+page);
		}
		function refreshSelesai(page){
			$("#selesai").html("<div class='m-lr-auto txt-center p-tb-40'><h4><i class='fas fa-spin fa-compact-disc text-success'></i> loading...</h4></div>");
			$("#selesai").load("<?php echo site_url("assync/pesanan?status=selesai&page="); ?>"+page);
		}
		function refreshPO(page){
			$("#preorder").html("<div class='m-lr-auto txt-center p-tb-40'><h4><i class='fas fa-spin fa-compact-disc text-success'></i> loading...</h4></div>");
			$("#preorder").load("<?php echo site_url("assync/pesanan?status=po&page="); ?>"+page);
		}
  	</script>


	<!-- Modal1 -->
	<div class="modal fade" id="statusmodal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Status Pembayaran</h5>
					<button type="button" data-dismiss="modal" aria-label="Close">
						<i class="fas fa-times text-danger fs-24 p-all-2"></i>
					</button>
				</div>
				<div class="modal-body">
					<div id="status" class="col-12"></div>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal1 -->
	<div class="modal fade" id="konfirmasimodal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Konfirmasi Pembayaran</h5>
					<button type="button" data-dismiss="modal" aria-label="Close">
						<i class="fas fa-times text-danger fs-24 p-all-2"></i>
					</button>
				</div>
				<div class="modal-body">
					<div class="row m-lr-0 p-tb-20">
						<div class="col-md-12 p-b-20">
							Upload Bukti Transfer <span class="fs-14">(.jpg, .png, .pdf)</span>
						</div>
						<form id="upload" class="row p-lr-0 m-lr-0 w-full" method="POST" enctype="multipart/form-data" action="<?php echo site_url("manage/konfirmasi"); ?>">
							<input name="idbayar" type="hidden" id="bayar" value="0"/>
							<input type="hidden" class="tokens" name="<?=$this->security->get_csrf_token_name()?>" value="<?=$this->security->get_csrf_hash();?>" />
							<div class="col-md-12 p-b-20">
								<input type="file" name="bukti" class="form-control" accept="image/*" />
							</div>
							<div class="col-md-4">
								<button type="submit" class="btn btn-success">
									<i class="fas fa-chevron-circle-up"></i> Upload
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

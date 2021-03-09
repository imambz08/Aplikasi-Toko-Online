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
				            <a href="<?=site_url('manage/pesanan')?>" class="fs-22 colorwhite">
				              <i class="material-icons">arrow_back</i>

				            </a>
				          </li>
				          <h5 class="text-light fs-18" style="margin-left: 48px">Pilih Metode Pembayaran</h5>
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
	<!-- breadcrumb -->
	<div class="container-fluid colortext m-b-10" style="top: -56px; position: relative; ">
		<div class="bread-crumb bread-crumb-produk fs-13" style="background-color: transparent;">
			<a href="/" class="text-secondary">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="cl4 color1">
				Invoice
			</span>
		</div>
	</div>


	<!-- Shoping Cart -->
	<style rel="stylesheet">
		@media only screen and (min-width:721px){
			.mobilefix{
				margin-left: -36px;
			}
		}
	</style>
	<?php 
		$session_login_usrid = $this->func->getProfil($_SESSION["usrid"],"semua","usrid"); 
		if ($session_login_usrid->usrid != $this->func->getProfil($usrid->id,"usrid","usrid")) {
			header('location:404_index');
		}
		else{
	?>
	<form class="p-t-0 p-b-5">
		<div class="container-fluid p-b-5 checkout" style="margin-top:-20px">
			<div class="row m-b-10">
				<div class="m-lr-auto">
					<div class="p-lr-10 p-t-10 p-b-30 m-l-0-xl m-r-0-xl p-r-15-sm p-l-15-sm">
						<div class="row">
							<div class="col-2 m-lr-auto text-center">
								<i class="fas fa-check-circle text-success fs-54"></i>
							</div>
							
							<div class="col-9">
								<h5 class="f-sm-16 f-md-18">Order ID <?php echo $data->invoice; ?></h5>
								<h5 class="color2 font-medium f-sm-14 f-md-16">Terima Kasih  <?php echo $this->func->getProfil($usrid->id,"nama","usrid"); ?></h5>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-6 m-b-10" style="position: relative; top: -30px">
					<div class="section p-all-20">
						<h5 class="f-sm-14 f-md-16"><strong>Pembayaran</strong></h5>
						<?php
							if($data->transfer > 0){
								$bayartotal = $data->transfer + $data->kodebayar;
						?>
							<div class="p-b-13">
								<div class="row">
									<div class="col-md-12 m-b-10 f-sm-12 f-md-14">
										Mohon lakukan pembayaran sejumlah <br/>
										<h5 class="f-sm-14 f-md-18 color1"><strong>IDR <?php echo $this->func->formUang($bayartotal); ?></strong></h5>
									</div>
									<div class="col-md-12 m-b-10">
										<h6 class="text-black f-sm-12 f-md-14">Pilih Metode Pembayaran:</h6>
									</div>
									<div class="col-md-12 metode-bayar m-b-10">
										<?php if($set->payment_transfer == 1){ ?>
										<div class="col-md-12 m-b-12 section metode-item manual"  onclick="bayarManual()">
											<div class="row">
												<div class="col-12 bg-color1"><i class="cek fas fa-check-circle fs-24"></i></div>
											</div>
											<div class="row">
												<div class="col-3">
													<img class="icon" src="<?=base_url("assets/images/tf_manual.png")?>" />
												</div>
												<div class="col-9 f-sm-12 f-md-14">
													<strong>Transfer Manual</strong>&nbsp;<br>
													<span class="f-sm-10 f-md-12">Lakukan transfer ke No Rekening <?= $set->nama;?>, kemudian upload bukti transfer.</span>
												</div>
											</div>
										</div>
										<?php 
											}
											if($set->payment_ipaymu == 1){
										?>
										<div class="col-md-12 m-b-12 section metode-item otomatis" onclick="bayarOtomatis()">
											<div class="row">
												<div class="col-12 bg-color1"><i class="cek fas fa-check-circle fs-24"></i></div>
											</div>
											<div class="row">
												<div class="col-3">
													<img class="icon" src="<?=base_url("assets/images/tf_minimarket.png")?>" />
												</div>
												<div class="col-9 f-sm-12 f-md-14">
													<strong>Ipaymu</strong>&nbsp;<br>
													<span class="f-sm-10 f-md-12">Lakukan pembayaran melalui minimarket, virtual account bank, go pay, ovo, dan sebagainya.</span>
												</div>
											</div>
										</div>
										<?php 
											}
											if($set->payment_midtrans == 1){
										?>
										<div class="col-md-12 m-b-12 section metode-item midtrans"  onclick="bayarMidtrans()">
											<div class="row">
												<div class="col-12 bg-color1"><i class="cek fas fa-check-circle fs-24"></i></div>
											</div>
											<div class="row">
												<div class="col-3">
													<img class="icon" src="<?=base_url("assets/images/tf_minimarket.png")?>" />
												</div>
												<div class="col-9 f-sm-12 f-md-14">
													<strong>Midtrans</strong>&nbsp;<br>
													<span class="f-sm-10 f-md-12">Lakukan pembayaran melalui minimarket, virtual account bank, go pay, ovo, dan sebagainya.</span>
												</div>
											</div>
										</div>
										<?php } ?>
									</div>
								</div>
								<!--
								<div class="row p-t-5 m-t-30 bayarmanual" style="display:none;">
									<div class="col-md-12 m-b-20">
										<h5 class="text-black">Silahkan transfer pembayaran ke rekening berikut:</h5>
									</div>
									<div class="col-md-12">
										<p></p>
										<?php
													foreach($bank->result() as $bn):?>
															
																<h5 class="cl2 m-t-10 m-b-10 p-t-10 p-l-10 p-b-10" style="border-left: 8px solid #f1f2f3;">
																	<b class="text-dark f-sm-12 f-md-14">Bank <?= $bn->nama;?>: </b><b class="color1 f-sm-12 f-md-14"><?= $bn->norek;?></b> <button type="button" class="btn btn-sm btn-light copyText fs-10" onclick="copyText()" data-clipboard-text="<?= $bn->norek;?>" data-toggle="tooltip" data-placement="right" title="Copy">Copy</Button><br>
																	<span class="f-sm-12 f-md-14">a/n <?= $bn->atasnama;?><br/>
																	KCP <?= $bn->kcp;?></span>
																</h5>
														
													<?php endforeach;?>
										<p class="m-b-5 m-t-20">
										<b>PENTING: </b>
										</p>
										<ul style="margin-left: 15px;">
											<li style="list-style-type: disc;">Mohon lakukan pembayaran dalam <b>1x24 jam</b></li>
											<li style="list-style-type: disc;">Sistem akan otomatis mendeteksi apabila pembayaran sudah masuk</li>
											<li style="list-style-type: disc;">Apabila sudah transfer dan status pembayaran belum berubah, mohon konfirmasi pembayaran manual di bawah</li>
											<li style="list-style-type: disc;">Pesanan akan dibatalkan secara otomatis jika Anda tidak melakukan pembayaran.</li>
										</ul>
									</div>
								</div>-->

								<div class="modal animate__animated animate__slideInUp animate__slow" id="modal_bayarmanual" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog modal-lg" role="document">
										<div class="modal-content modal_fixed">
											<div class="modal-header">
												<h5 class="modal-title f-sm-14 f-md-16"><strong>Metode Pembayaran: Transfer Manual</strong></h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="float: left">
										          <span aria-hidden="true">&times;</span>
										        </button>
											</div>
											<div class="modal-body">
												<div class="f-sm-12 f-md-14" style="text-align: justify;">
													<h5 class="text-black f-sm-12 f-md-14">Silahkan transfer pembayaran ke rekening berikut:</h5>
													<?php
													foreach($bank->result() as $bn):?>
															
																<h5 class="cl2 m-t-10 m-b-10 p-t-10 p-l-10 p-b-10" style="border-left: 8px solid #f1f2f3;">
																	<b class="text-dark f-sm-12 f-md-14">Bank <?= $bn->nama;?>: </b><b class="color1 f-sm-12 f-md-14"><?= $bn->norek;?></b>
																	
																	 <button type="button" class="btn btn-sm btn-light copyText fs-10"  data-clipboard-target="#copy-input" data-toggle="tooltip" data-placement="right" title="Copy" id="copy-btn" onclick="copyText('<?= $bn->norek;?>')">Copy</Button><br>
																	<span class="f-sm-12 f-md-14">a/n <?= $bn->atasnama;?><br/>
																	KCP <?= $bn->kcp;?></span>
																</h5>
														
													<?php endforeach;?>
													
													<p class="m-b-5 m-t-20">
													<b>PENTING: </b>
													</p>
													<ul style="margin-left: 15px;">
														<li style="list-style-type: disc;">Mohon lakukan pembayaran dalam <b>1x24 jam</b></li>
														<li style="list-style-type: disc;">Sistem akan otomatis mendeteksi apabila pembayaran sudah masuk</li>
														<li style="list-style-type: disc;">Apabila sudah transfer dan status pembayaran belum berubah, mohon konfirmasi pembayaran manual di bawah atau di menu pesanan</li>
														<li style="list-style-type: disc;">Pesanan akan dibatalkan secara otomatis jika Anda tidak melakukan pembayaran.</li>
													</ul>
												</div>
											</div>
											<div class="modal-footer">
												<a href="<?php echo site_url("manage/pesanan?konfirmasi=".$data->id); ?>" class="btn btn-colorbutton btn-block btn-md text-center bayarmanual m-t-5  f-sm-14 f-md-16"><b>Konfirmasi Pembayaran</b> &nbsp;<i class="fa fa-chevron-circle-right"></i></a>
											</div>
										</div>
									</div>
								</div>



							</div>
							<a href="javascript:void(0)" onclick="payMidtrans()" class="btn btn-colorbutton f-sm-14 f-md-16 btn-block btn-md text-center bayarmidtrans" style="display:none;"><i class="fa fa-chevron-circle-right"></i> &nbsp;<b>Bayar Sekarang</b></a>

							<a href="<?php echo site_url("manage/pesanan"); ?>" class="btn btn-outline-colorbutton btn-block btn-md text-center bayarmidtrans f-sm-14 f-md-16" style="display:none;"><i class="fa fa-times"></i> &nbsp;<b>Bayar Nanti Saja</b></a>

							<a href="<?php echo site_url("assync/bayaripaymu/".$data->id); ?>" style="display:none;" class="btn btn-colorbutton f-sm-14 f-md-16 btn-block btn-md text-center bayarotomatis m-t-20"><i class="fa fa-chevron-circle-right"></i> &nbsp;<b>Bayar Sekarang</b></a>
							<a href="<?php echo site_url("manage/pesanan"); ?>" style="display:none;" class="btn btn-outline-colorbutton btn-block btn-md text-center bayarotomatis f-sm-14 f-md-16"><i class="fa fa-times"></i> &nbsp;<b>Bayar Nanti Saja</b></a>

							
						<?php
							}else{
						?>
							<div class="p-b-13">
								<div class="row p-t-20">
									<div class="col-md-12">
										<h5 class="text-black">Metode Pembayaran: <span class="cl1" style="font-size: 16px;">Saldo <?=$this->func->getSetting("nama")?></span> </h5>
									</div>
								</div>
								<div class="row p-t-5">
									<div class="col-md-12">
										<p>Terima kasih, saldo <b class='cl1'><?=$this->func->getSetting("nama")?></b> sudah terpotong sebesar
											<span style="color: #c0392b; font-size: 20px;"><b>Rp <?php echo $this->func->formUang($data->saldo); ?></b></span>
											untuk pembayaran pesanan Anda.<br/>
											<!--Kami sudah menginformasikan kepada merchant untuk memproses pesanan Anda.-->
										</p>
									</div>
								</div>
							</div>
							<hr class="m-t-30"/>
							<a href="<?php echo site_url("manage/pesanan"); ?>" class="cl1 text-center w-full dis-block"><b>STATUS PESANAN</b> <i class="fa fa-chevron-circle-right"></i></a>
						<?php } ?>

					</div>
				</div>
				<div class="col-md-6 m-b-10" style="position: relative; top: -30px">
					<div class="section p-all-20">
						<h5 class="f-sm-14 f-md-16"><strong>Informasi Pengiriman</strong></h5>
						<div class="">
							<div class="row p-t-10">
								<div class="col-6">
									<h5 class="text-black f-sm-12 f-md-14">Nama Penerima</h5>
									<p class="text-secondary f-sm-12 f-md-14"><?php echo strtoupper(strtolower($alamat->nama)); ?></p>
								</div>
								<div class="col-6">
									<h5 class="text-black  f-sm-12 f-md-14">No Telepon</h5>
									<p class="text-secondary f-sm-12 f-md-14"><?php echo $alamat->nohp; ?></p>
								</div>
							</div>
							<div class="row p-t-10">
								<div class="col-md-12">
									<h5 class="text-black f-sm-12 f-md-14">Alamat Pengiriman</h5>
									<span class="text-secondary f-sm-12 f-md-14">
										<?php
											$kec = $this->func->getKec($alamat->idkec,"semua");
											$kab = $this->func->getKab($kec->idkab,"nama");
											echo strtoupper(strtolower($alamat->alamat."<br/>".$kec->nama.", ".$kab."<br/>Kodepos ".$alamat->kodepos));
										?>
									</span>
								</div>
							</div>

						</div>

						<h5 class="f-sm-14 f-md-16 m-t-20"><strong>Informasi Pesanan</strong></h5>
				    	<div class="produk p-b-30 m-l-0 m-r-0 f-sm-12 f-md-14">
								<?php
									for($i=0; $i<count($transaksi); $i++){
										$ongkir = (isset($ongkir)) ? $transaksi[$i]->ongkir + $ongkir : $transaksi[$i]->ongkir;
										$this->db->where("idtransaksi",$transaksi[$i]->id);
										$db = $this->db->get("transaksiproduk");
										foreach($db->result() as $res){
											//$total = (isset($total)) ? ($res->harga * $res->jumlah) + $total : $res->harga * $res->jumlah;
											$produk = $this->func->getProduk($res->idproduk,"semua");
											$variasee = $this->func->getVariasi($res->variasi,"semua");
											$variasi = ($res->variasi != 0) ? $this->func->getWarna($variasee->warna,"nama")." size ".$this->func->getSize($variasee->size,"nama") : "";
											$variasi = ($res->variasi != 0) ? "<br/><small class='text-secondary'>variasi: ".$variasi."</small>" : "";
								?>
								<div class="produk-item row m-b-30 p-t-10 m-lr-0" style="position: relative; margin-bottom: 10px; background-color:#f7f8f9">
					              <div class="col-3 col-md-2 row m-lr-0 p-lr-0">
					                <div class="img" style="<?php if($produk!= null){?>background-image:url('<?php echo $this->func->getFoto($produk->id,"utama"); ?>')<?php }else{echo"Produk telah dihapus";} ?>"></div>
					              </div>
					              <div class="col-6 col-md-6">
					                <div class="p-l-10 font-medium"><?php if($produk != null){ echo $produk->nama.$variasi; }else{ echo "Produk telah dihapus"; } ?></div>
					              </div>
					              <div class="col-3 col-md-4 font-medium text-dark">
					                <p>x <?php echo $res->jumlah; ?><br>  <?php echo $this->func->formUang($res->harga); ?></p>
					              </div>
									<?php
											}
										}
									?>
								</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
	<div id="tokenGenerated" style="display:none;"></div>
	<?php } ?>
<?php $set = $this->func->getSetting("semua"); ?>
<script type="text/javascript" src="<?=$set->midtrans_snap?>" data-client-key="<?=$set->midtrans_client?>"></script>
<script type="text/javascript" src="<?= base_url('assets/vendor/clipboard.min.js') ?>"></script>
<script type="text/javascript">
	$(function(){
		/*$.post("<?=site_url("home/midtranstoken")?>",{"invoice":<?=$data->invoice?>},function(data,status){
			if(status == 'success'){
				$("#tokenGenerated").html(data);
			}else{
				swal("Sudah diproses","Pembayaran sudah diproses","success").then(res=>{
					window.location.href = "<?=site_url("manage/pesanan")?>";
				});
			}
		});*/

	});
	/*function copyText(){
		let copy = new ClipboardJS('.copyText');	
		/*
		
		
	}*/

	function copyText(text){
		var textField = document.createElement('textarea');
	    textField.innerText = text;
	    document.body.appendChild(textField);
	    textField.select();
	    textField.focus(); //SET FOCUS on the TEXTFIELD
	    document.execCommand('copy');
	    textField.remove();
	    Swal.fire({
		  icon: 'success',
		  title: 'No Rekening berhasil disalin',
		  showConfirmButton: false,
		  timer: 1500
		});
	}
	
	function bayarManual(){
		$(".metode-item").removeClass("active");
		//$(".metode-item.manual").addClass("active");
		$("#modal_bayarmanual").modal('show', function(){
			$('.copyText').click(function(){
				alert('Ok');
			});
		});
		$(".bayarmanual").show();
		$(".bayarotomatis").hide();
		$(".bayarmidtrans").hide();
	}
	function bayarOtomatis(){
		$(".metode-item").removeClass("active");
		$(".metode-item.otomatis").addClass("active");
		$(".bayarmanual").hide();
		$(".bayarmidtrans").hide();
		$(".bayarotomatis").show();
	}
	function bayarMidtrans(){
		$(".metode-item").removeClass("active");
		$(".metode-item.midtrans").addClass("active");
		$(".bayarmanual").hide();
		$(".bayarotomatis").hide();
		$(".bayarmidtrans").show();
	}
	function payMidtrans(){
		$.ajax({
			type: "POST",
			url:  "<?=site_url("home/midtranstoken")?>",
			data: {"invoice":"<?=$data->invoice?>",[$("#names").val()]:$("#tokens").val()},
			statusCode: {
				200: function(responseObject, textStatus, jqXHR) {
					var data = eval("("+responseObject+")");
					updateToken(data.token)
					$("#tokenGenerated").html(data.midtranstoken);
					payMidtransNow();
				},
				404: function(responseObject, textStatus, jqXHR) {
					swal.fire("Sudah diproses","Pembayaran gagal diproses, kami akan mencobanya kembali, apabila pesan ini terjadi berulang silahkan hubungi admin toko.","success").then(res=>{
						window.location.href = "<?=site_url("home/invoice?revoke=true&inv=".$_GET["inv"])?>"; //"<?=site_url("manage/pesanan")?>";
					});
				},
				500: function(responseObject, textStatus, jqXHR) {
					swal.fire("Sudah diproses","Pembayaran gagal diproses, API Key tidak valid, silahkan hubungi admin toko untuk memperbaiki kendala ini.","success").then(res=>{
						window.location.href = "<?=site_url("home/invoice?revoke=true&inv=".$_GET["inv"])?>"; //"<?=site_url("manage/pesanan")?>";
					});
				}
			}
		});
	}
	function payMidtransNow(){
		snap.pay($("#tokenGenerated").html(), {
			onSuccess: function(result){
				//confirm(result.transaction_id);
				var url = "<?=site_url("home/midtranspay")?>?order_id=<?=$data->invoice?>&status=success&transaction_id="+result.transaction_id;
				var form = document.createElement("form");
				form.setAttribute("method", "post");
				form.setAttribute("action", url);
				//form.setAttribute("target", "_blank");
				var hiddenField = document.createElement("input");
				hiddenField.setAttribute("name", "response");
				hiddenField.setAttribute("value", JSON.stringify(result));
				form.appendChild(hiddenField);
				var hiddenFields = document.createElement("input");
				hiddenFields.setAttribute("name", $("#names").val());
				hiddenFields.setAttribute("value", $("#tokens").val());
				form.appendChild(hiddenFields);

				document.body.appendChild(form);
				form.submit();
				console.log(result);
			},
			onPending: function(result){
				//confirm("Pending: "+result.transaction_id);
				/* You may add your own implementation here */
				//alert("wating your payment!"); 
				var url = "<?=site_url("home/midtranspay")?>?order_id=<?=$data->invoice?>&status=pending&transaction_id="+result.transaction_id;
				var form = document.createElement("form");
				form.setAttribute("method", "post");
				form.setAttribute("action", url);
				//form.setAttribute("target", "_blank");
				var hiddenField = document.createElement("input");
				hiddenField.setAttribute("name", "response");
				hiddenField.setAttribute("value", JSON.stringify(result));
				form.appendChild(hiddenField);
				var hiddenFields = document.createElement("input");
				hiddenFields.setAttribute("name", $("#names").val());
				hiddenFields.setAttribute("value", $("#tokens").val());
				form.appendChild(hiddenFields);

				document.body.appendChild(form);
				form.submit();
				console.log(result);
			},
			onError: function(result){
			},
			onClose: function(){
			}
		}); 
	}
</script>

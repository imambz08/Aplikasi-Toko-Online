<?php
	$page = (isset($_GET["page"]) AND $_GET["page"] != "" AND intval($_GET["page"]) > 0) ? intval($_GET["page"]) : 1;
	$perpage = 10;

	$this->db->where("status",2);
	$this->db->where("resi !=","");
	$this->db->where("usrid",$_SESSION["usrid"]);
	$rows = $this->db->get("transaksi");
	$rows = $rows->num_rows();

	$this->db->where("status",2);
	$this->db->where("resi !=","");
	$this->db->where("usrid",$_SESSION["usrid"]);
	$this->db->order_by("id","DESC");
	$this->db->limit($perpage,($page-1)*$perpage);
	$db = $this->db->get("transaksi");
	if($db->num_rows() > 0){
?>
<div class="mt-on-sm-10 mt-on-md-30">
<?php
    foreach($db->result() as $rx){
?>

		<div class="m-b-10">
			<div class="section pesanan-item p-lr-10 p-tb-10 m-lr-0-xl">
				<div class="row p-b-10">
					<div class="col-6">
						<span class="font-medium f-sm-12 f-md-16">
							Order ID <strong><span class="color1">#<?php echo $rx->orderid; ?></span></strong>
						</span>
					</div>
					<div class="col-6 text-right">
						<a href="<?php echo site_url("manage/detailpesanan/?orderid=").$rx->orderid; ?>" class="btn btn-sm btn-colorbutton f-sm-12 f-md-14"><i class="fas fa-angle-double-right"></i> Rincian<span class="hidesmall"> Pesanan</span></a>
					</div>
				</div>
				<div class="row m-lr-0">
					<div class="col-md-8 p-lr-0">
						<?php
							$this->db->where("idtransaksi",$rx->id);
							$trp = $this->db->get("transaksiproduk");
							$totalproduk = 0;
							$no = 1;
							foreach ($trp->result() as $key) {
								$totalproduk += $key->harga * $key->jumlah;
								$produk = $this->func->getProduk($key->idproduk,"semua");
								$variasee = $this->func->getVariasi($key->variasi,"semua");
								$variasi = ($key->variasi != 0 AND $variasee != null) ? $this->func->getWarna($variasee->warna,"nama")." ".$produk->subvariasi." ".$this->func->getSize($variasee->size,"nama") : "";
								$variasi = ($key->variasi != 0 AND $variasee != null) ? "<small class='text-secondary'>".$produk->variasi.": ".$variasi."</small>" : "";
								if($no == 2){
						?>
							<div class="m-b-10 show-product">
						<?php
								}
						?>
							<div class="row p-b-10 m-lr-0 produk-item">
								<div class="col-4 col-md-2">
									<div class="img" style="background-image:url('<?php echo $this->func->getFoto($key->idproduk,"utama"); ?>');border-radius: 5px; box-shadow: 0px 0px 0px !important;" alt="IMG" ></div>
								</div>
								<div class="col-8 col-md-10">
									<span class="font-medium text-dark btn-block f-sm-12 f-md-16"><?php if($produk != null){ echo $produk->nama; }else{ echo "Produk telah dihapus"; } ?></span>
									<span class="f-sm-10 f-md-14 text-secondary"><?=$variasi?></span>
									<p class="font-medium text-dark btn-block f-sm-12 f-md-16">IDR <?php echo $this->func->formUang($key->harga); ?> <span style="font-size:12px">x<?php echo $key->jumlah; ?></span></p>
								</div>
							</div>
						<?php
									$no++;
								}
							if($no > 2){
						?>
            				</div>
							<div class="p-b-10 p-r-10">
								<a href="javascript:void(0)" class="view-product color1 f-sm-12 f-md-14"><i class="fas fa-chevron-circle-down"></i> Lihat produk lainnya</a>
								<a href="javascript:void(0)" class="view-product color1 f-sm-12 f-md-14" style="display:none;"><i class='fas fa-chevron-circle-up'></i> Sembunyikan produk</a>
							</div>
						<?php
							}
						?>
		  			</div>
					<div class="col-md-4 f-sm-12 f-md-16">
						Waktu Pengiriman:<br/>
						<span class="text-dark p-r-8 font-medium"><?php echo $this->func->ubahTgl("d M Y H:i",$rx->kirim); ?> WIB</span>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-md-6">
						<div class="row">
							<div class="col-6">
								<a href="<?php echo site_url("manage/lacakpaket/".$rx->orderid); ?>" class="btn btn-outline-colorbutton btn-block m-b-10 f-sm-12 f-md-14">
									Lacak Kiriman
								</a>
							</div>
							<div class="col-6">
								<a href="javascript:void(0)" onclick="terimaPesanan(<?php echo $rx->id; ?>)" class="btn btn-colorbutton btn-block m-b-10 f-sm-12 f-md-14">
									Terima Pesanan
								</a>
							</div>
						</div>
					</div>
					<div class="col-md-2 m-b-14"></div>
					<div class="col-md-4 text-right">
						<h5 class="text-dark f-sm-12 f-md-14">Total Order &nbsp;<strong><span class="color1 font-bold text-right f-sm-12 f-md-14">IDR <?php echo $this->func->formUang($rx->ongkir + $totalproduk); ?></span></strong></h5>
					</div>
				</div>
			</div>
		</div>
	<?php
		}
		echo $this->func->createPagination($rows,$page,$perpage,"refreshDikirim");
	?>
</div>
<?php
	}else{
?>
	<div class="text-center p-tb-40 section m-t-30">
		<i class="fas fa-box-open fs-100 text-secondary m-b-20"></i>
		<h5 class="text-secondary font-bold f-sm-14 f-md-18">TIDAK ADA PESANAN</h5>
	</div>
<?php
	}
?>

<script type="text/javascript">
	$(document).ready(function(){
		$(".show-product").hide();
		$(".view-product").click(function(){
			$(this).parent().parent().find(".show-product").slideToggle();
			$(this).parent().parent().find(".view-product").toggle();
		});
	});
</script>

<?php
  if($data->num_rows() == 0){
    redirect("home");
    exit;
  }
?>
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
                    <a href="<?=site_url('home/keranjang')?>" class="fs-22 colorwhite">
                      <i class="material-icons">arrow_back</i>

                    </a>
                  </li>
                  <h5 class="text-light fs-18" style="margin-left: 48px">Checkout</h5>
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
	<div class="container-fluid m-b-10 colortext " style="top: -55px; position: relative; ">
		<div class="bread-crumb bread-crumb-produk fs-13 color1" style="background-color: transparent;">
			<a href="<?php echo site_url(); ?>" class="text-secondary">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>
			<a href="<?php echo site_url("home/keranjang"); ?>" class="text-secondary">
				Keranjang
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4 color1">
				Checkout
			</span>
		</div>
	</div>


	<!-- Shoping Cart -->
	<form class="bg0 p-t-0 p-b-10" id="cekout">
		<div class="container-fluid checkout">
			<div class="row bayarpesanan">
        <div class="col-md-8 sec-bg m-b-10">
          <div class="p-lr-20 p-t-20 p-b-20 m-l-0-xl m-r-0-xl p-l-10 p-r-17  colorbg colortext">
            <?php
              $this->db->where("usrid",$_SESSION["usrid"]);
              $this->db->order_by("status","DESC");
              $row = $this->db->get("alamat");
            ?>
            <div class="p-b-13">
              <input type="hidden" id="tujuan" value="" name="tujuan" />
              <div class="m-b-10 alamatform">
                <b><span class="color1 f-sm-12 f-md-14"><i class="fa fa-map-marker-alt"></i> Alamat Pengiriman</span></b>
              </div>
              <div class="rs1-select2 rs2-select2 m-b-10 alamatform f-sm-12 f-md-14">
                <select class="js-select2 form-control fs-12" name="alamat" id="idalamat">
                  <option value="">- Pilih Alamat Tujuan -</option>
                  <option value="0">+ Tambah Alamat Baru</option>
                  <?php
                    foreach($row->result() as $al){
                      //RAJAONGKIR
                      $kec = $this->func->getKec($al->idkec,"semua");
                      $idkab = $kec->idkab;
                      $keckab = $kec->nama.", ".$this->func->getKab($idkab,"nama");
                      echo '<option value="'.$al->id.'" data-tujuan="'.$al->idkec.'">'.strtoupper(strtolower($al->judul.' - '.$al->nama)).' ('.$keckab.')</option>';
                    }
                  ?>
                </select>
                <div class="dropDownSelect2"></div>
              </div>
              <div class="">
                <?php
                  foreach($row->result() as $als){
                    $kec = $this->func->getKec($al->idkec,"semua");
                    $idkab = $kec->idkab;
                    $kec = $kec->nama;
                    $kab = $this->func->getKab($idkab,"nama");
                    echo "
                      <div class='alamat f-sm-12 f-md-14 box_border_bottom p-tb-10 p-lr-10 m-t-5' id='alamat_".$als->id."' data-tujuan='".$al->idkec."' style='display:none;'>
                        <b class='color1'>Nama Penerima:</b><br/>".strtoupper(strtolower($als->nama))."<br/>
                        <b class='color1'>No HP:</b><br/>".$als->nohp."<br/>
                        <b class='color1'>Alamat Lengkap:</b><br/>".strtoupper(strtolower($als->alamat."<br/>".$kec.", ".$kab))."<br/>KODEPOS ".$als->kodepos."
                      </div>
                    ";
                  }
                ?>
              </div>
            </div>

            <div class="p-b-13">
              <div class="m-b-12 tambahalamat" style="display:none;">
                <b>Tambah Alamat Pengiriman</b>
              </div>
              <div class="tambahalamat f-sm-12 f-md-14" style="display:none;">
                  <div class="m-b-12 col-md-12 p-lr-0 f-sm-12 f-md-14">
                    <input class="form-control f-sm-12 f-md-14" type="text" name="judul" placeholder="Simpan Sebagai? ex: Alamat Rumah, Alamat Kantor, Dll">
                  </div>
                  <div class="m-b-12 col-md-12 p-lr-0">
                    <input class="form-control f-sm-12 f-md-14" type="text" name="nama" placeholder="Nama Penerima">
                  </div>
                  <div class="m-b-12 col-md-12 p-lr-0 f-sm-12 f-md-14">
                    <input class="form-control f-sm-12 f-md-14" type="text" name="nohp" placeholder="No Handphone Penerima">
                  </div>
                  <div class="m-b-12 f-sm-12 f-md-14">
                    <textarea class="form-control f-sm-12 f-md-14l" name="alamatbaru" placeholder="Alamat lengkap"></textarea>
                  </div>
                  <div class="row m-lr-0">
                    <div class="rs1-select2 rs2-select2 col-md-5 m-b-12 p-lr-0">
                      <select class="js-select2 form-control" name="negara" readonly>
                        <option value="ID">Indonesia</option>
                      </select>
                      <div class="dropDownSelect2"></div>
                    </div>
                    <div class="col-md-12 p-b-10"></div>
                    <div class="rs1-select2 rs2-select2 col-md-5 m-b-12 p-lr-0">
                      <select class="js-select2 form-control" id="prov">
                        <option value="">Provinsi</option>
                        <?php
                          $prov = $this->db->get("prov");
                          foreach($prov->result() as $pv){
                            echo '<option value="'.$pv->id.'">'.$pv->nama.'</option>';
                          }
                        ?>
                      </select>
                      <div class="dropDownSelect2"></div>
                    </div>
                    <div class="col-md-1 p-b-10"></div>
                    <div class="rs1-select2 rs2-select2 col-md-5 m-b-12 p-lr-0">
                      <select class="js-select2 form-control" id="kab">
                        <option value="">Kabupaten</option>
                      </select>
                      <div class="dropDownSelect2"></div>
                    </div>
                    <div class="col-md-1 p-b-10"></div>
                    <div class="rs1-select2 rs2-select2 col-md-5 m-b-12 p-lr-0">
                      <select class="js-select2 form-control" id="kec" name="idkec">
                        <option value="">Kecamatan</option>
                      </select>
                      <div class="dropDownSelect2"></div>
                    </div>
                    <div class="col-md-1 p-b-10"></div>
                    <div class="m-b-12 col-md-5 p-lr-0 f-sm-12 f-md-14">
                      <input class="form-control f-sm-12 f-md-14" type="number" name="kodepos" placeholder="Kode POS">
                    </div>
                  </div>
              </div>
            </div>

            <div class="p-t-10 p-b-10">
              <b><span class="color1 f-sm-12 f-md-14"><i class="material-icons f-sm-14 f-md-14">local_mall</i> Pesanan Saya</span></b>
            </div>
          <?php
            $totalharga = 0;
            $totalbayar = 0;
            $totalberat = 0;
          ?>
          <div class="produk p-b-30 m-l-0 m-r-0 f-sm-12 f-md-14">
            <?php
                foreach($data->result() as $res){
                  $produk = $this->func->getProduk($res->idproduk,"semua");
                  $totalbayar += $res->harga * $res->jumlah;
                  $totalberat += $produk->berat * $res->jumlah;
                  $totalproduks = $res->harga*$res->jumlah;
                  $totalharga += $res->harga*$res->jumlah;
                  $variasee = $this->func->getVariasi($res->variasi,"semua");
                  $variasi = ($res->variasi != 0) ? $this->func->getWarna($variasee->warna,"nama")." ".$produk->subvariasi." ".$this->func->getSize($variasee->size,"nama") : "";
                  $variasi = ($res->variasi != 0) ? "<br/><small class='color1'>".$produk->variasi.": ".$variasi."</small>" : "";
            ?>
            <div class="produk-item row m-b-30 p-t-10 m-lr-0" style="position: relative; margin-bottom: 10px; background-color:#f7f8f9">
              <div class="col-3 col-md-2 row m-lr-0 p-lr-0">
                <div class="img" style="background-image:url('<?php echo $this->func->getFoto($produk->id,"utama"); ?>')"></div>
              </div>
              <div class="col-6 col-md-6">
                <div class="p-l-10 font-medium"><?php echo $produk->nama.$variasi; ?></div>
              </div>
              <div class="col-3 col-md-4 font-medium text-dark">
                <p>x <?php echo $res->jumlah; ?><br>  <?php echo $this->func->formUang($res->harga); ?></p>
              </div>

              <input type="hidden" class="idproduks" name="idproduk[]" value="<?php echo $res->id; ?>" />
              <input type="hidden" id="totalproduks_<?php echo $res->id; ?>" value="<?php echo $totalproduks; ?>" />
              <input type="hidden" id="namaproduks_<?php echo $res->id; ?>" value="<?php echo $produk->nama; ?>" />
              <input type="hidden" id="kategoriproduks_<?php echo $res->id; ?>" value="<?php echo $this->func->getKategori($produk->idcat,"nama"); ?>" />
            </div>
            <?php
                }
            ?>
              <input type="hidden" id="totalharga" value="<?php echo $totalharga; ?>" />
              <input type="hidden" name="berat" class="berat" id="berat" value="<?php echo $totalberat; ?>" />
              <input type="hidden" name="ongkir" class="ongkir" id="ongkir" value="0" />
              <!-- RAJAONGKIR -->
              <input type="hidden" name="dari" id="dari" value="<?php echo $this->func->getSetting("kota"); ?>" />
          </div>





            <div class="p-t-10 p-b-10">
              <b><span class="color1 f-sm-12 f-md-14"><i class="fa fa-truck"></i> Kurir Pengiriman</span></b>
            </div>
            <div class="row m-l-0 m-r-0 p-b-20">
              <div class="col-md-5 p-lr-0">
                <div class="rs1-select2 rs2-select2 bor8 bg0 w-full  f-sm-12 f-md-14">
                  <select class="js-select2 kurir form-control f-sm-12 f-md-14"  name="kurir">
                    <option value="">Pilih Ekspedisi</option>
                    <?php
                      $kur = $this->db->get("kurir");
                      foreach($kur->result() as $kr){
                        $kurir = explode("|",$this->func->getSetting("kurir"));
                        if(in_array($kr->id,$kurir)){
                          echo '<option value="'.$kr->rajaongkir.'">'.$kr->nama.'</option>';
                        }
                      }
                    ?>
                  </select>
                  <div class="dropDownSelect2"></div>
                </div>
              </div>
              <div class="col-md-1 p-b-10"></div>
              <div class="col-md-5 p-lr-0">
                <div class="rs1-select2 rs2-select2 bor8 bg0 w-full  f-sm-12 f-md-14" id="paketform">
                  <select class="js-select2 paket form-control  f-sm-12 f-md-14" name="paket">
                    <option value="">Pilih Paket Pengiriman</option>
                  </select>
                  <div class="dropDownSelect2"></div>
                </div>
              </div>
              <div class="error text-danger col-md-12 m-t-10  f-sm-12 f-md-14" id="error-kurir" style="display:none;">
                <span><i class="fa fa-exclamation-circle"></i> pilihan ekspedisi atau paket pengiriman tidak tersedia, silahkan pilih yg lain.</span><p/>
              </div>
            </div>
            <div class="p-t-20">
              <b>Dropship</b>
            </div>
            <div class="dropship">
                <div class="m-t-10">
                  <button type="button" id="nodrop" class="btn btn-sm btn-colorbutton m-r-10"><i class="fa fa-check-square"></i> Tidak Dropship</button>
                  <div class="showsmall m-t-10"></div>
                  <button type="button" id="yesdrop" class="btn btn-sm btn-outline-colorbutton"><i class="fa fa-check-square" style="display:none"></i> Dropship</button>
                </div>
                <div class="p-t-20" id="dropform" style="display:none;">
                  <input type="text" name="dropship" class="form-control col-md-8" placeholder="nama/olshop pengirim" />
                  <input type="text" name="dropshipnomer" class="form-control col-md-6 m-t-5" placeholder="no telepon" />
                  <input type="text" name="dropshipalamat" class="form-control m-t-5" placeholder="alamat pengirim" />
                </div>
            </div>
            <div class="p-lr-10 f-sm-12 f-md-14 p-t-20 p-b-20 m-lr-0 m-b-10 m-t-20" style="background-color: #f7f8f9">
            <div class="input-group m-t-10 f-sm-12 f-md-14">
              <input type="text" class="form-control f-sm-12 f-md-14" placeholder="Masukkan voucher" id="kodevoucher" name="kodevoucher" />
              <input type="hidden" name="diskon" id="diskon" value='0' />
              <div class="input-group-append">
                <button class="btn btn-colorbutton f-sm-12 f-md-14" type="button" onclick="cekVoucher()">Cek Voucher</button>
              </div>
            </div>
            <div class="m-t-10 m-b-20">
              <div class="vouchergagal text-danger" style="display:none;">Maaf, Voucher sudah tidak berlaku</div>
              <div class="vouchersukses color1" style="display:none;">Selamat, Voucher berhasil dipakai dan nikmati potongannya</div>
            </div>
            <div class="voucher">
              <div class="m-r-20"></div>
              <?php
                $this->db->where("mulai <=",date("Y-m-d"));
                $this->db->where("selesai >=",date("Y-m-d"));
                $voc = $this->db->get("voucher");
                foreach($voc->result() as $v){
                  $pot = $this->func->formUang($v->potongan);
                  $potongan = $v->tipe == 2 ? "<div class=\"font-bold fs-24 text-success text-center p-tb-12\">Rp ".$pot."</div>" : '<div class="font-bold fs-38 text-success text-center p-tb-0">'.$pot."%</div>";
                  $jenis = $v->jenis == 1 ? "Harga" : "Ongkir";
                  echo '
                  <div class="voucher-item m-lr-10 m-tb-14 cursor-pointer" data-kode="'.$v->kode.'">
                    <div class="potongan">
                      '.$potongan.'
                      <div class="m-t-10 m-b-10 t-center fs-12">Potongan '.$jenis.' </div>
                    </div>
                    <div class="kode">
                      <div class="text-danger fs-20 font-bold p-all-0">'.$v->kode.'</div>
                    </div>
                    <div class="detail">
                      <div class="p-all-0">
                        <span class="text-success font-medium">'.$v->nama.'</span><br/>
                        <small>
                          '.$v->deskripsi.'<br/>
                          <small>minimal pembelian Rp. '.$this->func->formUang( $v->potonganmin).'</small>
                        </small>
                      </div>
                    </div>
                  </div>';
                }
              ?>
            </div>
          </div>
			    </div>
			    <div class="p-lr-24 p-t-10 p-b-10 m-lr-0">
            
          </div>
          
          
			    
		    </div>

        <div class="sticky sec-bg col-md-4 m-l-auto m-r-auto">
          <div class="p-lr-20 p-t-20 p-b-20 m-l-0-xl m-r-0-xl p-l-10 p-r-17  colorbg colortext">
			   
            <div class="section p-lr-24 p-t-30 p-b-40 m-r-0 m-l-0 m-b-30 bg-dark text-light">
              <input type="hidden" id="subtotal" value="<?php echo $totalbayar; ?>" />
              <input type="hidden" id="total" name="total" value="<?php echo $totalbayar; ?>" />
              <!-- Subtotal -->
              <div class="row">
                <div class="col-md-6">
                  <p>Subtotal</p>
                </div>
                <div class="col-md-6">
                  <p style="text-align: right">Rp <span id="subtotalbayar"><?php echo $this->func->formUang($totalbayar); ?></p>
                </div>
              </div>
              <hr style="border-color: #fff;">
              <div class="row">
                <div class="col-md-6">
                  <p>Ongkos Kirim</p>
                </div>
                <div class="col-md-6">
                  <p style="text-align: right">Rp <span id="ongkirshow">0</span></p>
                </div>
              </div>
              <hr style="border-color: #fff;">
              <div class="row">
                <div class="col-md-6">
                  <p>Voucher</p>
                </div>
                <div class="col-md-6">
                  <p style="text-align: right">- Rp <span id="diskonshow">0</span></p>
                </div>
              </div>
              <hr style="border-color: #fff;">
              <div class="row">
                <div class="col-md-4">
                  <h5>Total</h5>
                </div>
                <div class="col-md-8">
                  <h5 style="text-align: right">Rp <span id="totalbayar"><?php echo $this->func->formUang($totalbayar); ?></h5>
                </div>
              </div>
              
              
            </div>

            <div class="section p-lr-24 p-tb-30 m-l-0 m-l-0 p-r-15 p-l-15" style="background-color:#f1f2f3 !important">
              <div class="error text-danger" id="error-bayar">
                <i>Belum dapat menyelesaikan pesanan, silahkan lengkapi alamat dan total beserta ongkos kirim terlebih dahulu.</i><p/>
              </div>
              <div class="text-warning" id="proses" style="display:none;">
                <h5><i class="fas fa-compact-disk fa-spin"></i> <i>Memproses pesanan, mohon tunggu sebentar</i></h5><p/>
              </div>
              <?php if($saldo > 0){ ?>
              <div class="p-b-13 pembayaran" style="display:none;">
                <div class="m-b-12">
                  <b>Pilih Pembayaran</b>
                </div>
                <div class="row m-r-0 m-l-0">
                  <div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 col-md-6 p-l-0 p-r-0">
                    <select class="js-select2" name="metode" id="metode">
                      <option value="1">Transfer</option>
                      <option value="2">Saldo (Rp <?php echo $this->func->formUang($saldo); ?>)</option>
                    </select>
                    <div class="dropDownSelect2"></div>
                  </div>
                  <div class="col-md-6 row m-r-0 m-l-0">
                    <?php if($saldo > 0){ ?>
                    <div class="col-md-6">
                      Potong Saldo:<br/>
                      <h5 id="saldo">Rp 0</h5>
                    </div>
                    <?php } ?>
                    <div class="col-md-6">
                      Transfer:<br/>
                      <h5 id="transfer">Rp <?php echo $this->func->formUang($totalbayar); ?></h5>
                    </div>
                  </div>
                </div>
              </div>
              <?php }else{ ?>
              <input type="hidden" name="metode" value="1" />
              <?php } ?>
              <input type="hidden" id="saldoval" value="<?php echo $saldo ?>" />
              <input type="hidden" name="saldo" id="saldopotong" value="0" />
              <div class="pembayaran" style="display:none;">
              	<a href="javascript:void(0);" onclick="checkoutNow();" class="btn btn-lg btn-primary btn-block">
              		Lanjut Pembayaran <i class="fas fa-chevron-circle-right"></i>
              	</a>
            	</div>
            </div>
          </div>
        </div>
			</div>
		</div>
    <!-- NAVIGATION BOTTOM -->
            <nav class="navbar bg-color2 navbar-expand d-md-none d-lg-none d-xl-none fixed-bottom navbar-bottom" style="z-index: 9999">
              <ul class="navbar-nav nav-justified" style="font-size: 12px;">
                
                <li class="nav-item" style="text-align: left">
                  <h6 class="colortext" style="font-size: 10px">SubTotal: Rp <span class="subtotalbayar" style="font-weight: bold"><?php echo $this->func->formUang($totalbayar); ?></span></h6>
                  <h6 class="colortext" style="font-size: 10px">Ongkir: Rp <span class="ongkirshow" style="font-weight: bold">0</span></h6>
                  <h6 class="colortext" style="font-size: 10px">SubTotal: Rp <span class="totalbayar" style="font-weight: bold"><?php echo $this->func->formUang($totalbayar); ?></span></h6>
                </li>
                <li class="nav-item">
                  <div class="button-lanjut-bayar-hide">
                    <a href="#" class="btn btn-sm btn-dark btn-block disabled" style="height: 50px; position: relative; right: -50px;">
                      Lanjut Pembayaran <i class="fas fa-chevron-circle-right"></i>
                    </a>
                  </div>
                  <div class="button-lanjut-bayar-show" style="display: none;">
                    <a href="javascript:void(0);" onclick="checkoutNow();" class="btn btn-sm btn-colorbutton btn-block button-lanjut-bayar-show" style="height: 50px; position: relative; right: -50px;"> <span id="lanjut_pembayaran">
                      Lanjut Pembayaran <i class="fas fa-chevron-circle-right"></i></span> 
                    </a>
                  </div>


                </li>
                
              </ul>
            </nav>
    <!-- /NAVIGATION BOTTOM -->

    <input type="hidden" name="<?=$this->security->get_csrf_token_name()?>" class="csrf_token" value="<?=$this->security->get_csrf_hash();?>" />
	</form>
	<input type="hidden" id="csrf_name" value="<?=$this->security->get_csrf_token_name()?>" />
	<input type="hidden" id="csrf_token" class="csrf_token" value="<?=$this->security->get_csrf_hash();?>" />

  <script type="text/javascript">
	$(function(){
		$("#cekout").on("submit",function(e){
		  e.preventDefault();
		});

    $(".voucher-item").on("click",function(){
      var kode = $(this).data("kode");
      //confirm(kode);//
      $("#kodevoucher").val(kode);
      setTimeout(cekVoucher(),1000);
    });
		
		$("#nodrop").click(function(){
			$("#yesdrop").removeClass("btn-colorbutton");
			$("#yesdrop").addClass("btn-outline-colorbutton");
			$(this).removeClass("btn-outline-colorbutton");
			$(this).addClass("btn-colorbutton");
			$(".fa",this).show()
			$("#yesdrop .fa").hide();
			$("#dropform").hide();
			$("#dropform input").val("");
			$("#dropform input").prop("required",false);
		});
		$("#yesdrop").click(function(){
			$("#nodrop").removeClass("btn-colorbutton");
			$("#nodrop").addClass("btn-outline-colorbutton");
			$(this).removeClass("btn-outline-colorbutton");
			$(this).addClass("btn-colorbutton");
			$("#dropform").show();
			$(".fa",this).show()
			$("#nodrop .fa").hide();
			$("#dropform input").prop("required",true);
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

		$("#idalamat").change(function(){
		  var idalamat = $(this).val();
		  var tujuan = $("#alamat_"+idalamat).data('tujuan');
		  $("#tujuan").val(tujuan);

		  $(".alamat").hide();
		  if($(this).val() == ""){
			resetOngkir();
			$(".tambahalamat").hide();
			$(".tambahalamat input,.tambahalamat textarea").prop("required",false);
		  }else if($(this).val() == 0){
			resetOngkir();
			$(".tambahalamat").show();
			$(".tambahalamat input,.tambahalamat textarea").prop("required",true);
			if($("#kab").val() != ""){
			  $("#tujuan").val($("#kab").val());
			  hitungOngkir();
			}else{
			  resetOngkir();
			}
		  }else if($(this).val() > 0){
			$("#alamat_"+idalamat).show();
			$(".tambahalamat").hide();
			$(".tambahalamat input,.tambahalamat textarea").prop("required",false);

			hitungOngkir();
		  }
		});
		
		$("#kodevoucher").change(function(){
			$("#diskon").val(0);
			$("#diskonshow").html(0);
			//$("#totalbayar").html(formUang($("#total").val()));
			hitungOngkir();
			$(".vouchergagal").hide();
			$(".vouchersukses").hide();
		});
	});
	
	//CEK VOUCHER
	function cekVoucher(){
		if($("#kodevoucher").val() != ""){
			$.post("<?=site_url("assync/cekvoucher")?>",{"kode":$("#kodevoucher").val(),"harga":$("#totalharga").val(),[$("#csrf_name").val()]: $("#csrf_token").val(),"ongkir":$("#ongkir").val()},function(msg){
				var data = eval("("+msg+")");
        $(".csrf_token").val(data.token);
				if(data.success == true){ 
					var total = parseFloat($("#total").val()) - data.diskon;
					$("#diskon").val(data.diskon);
					$("#diskonshow").html(formUang(data.diskon));
					$("#totalbayar").html(formUang(total));
					$("#transfer").html(formUang(total));
					$(".vouchergagal").hide();
					$(".vouchersukses").show();
				}else{
					$("#diskon").val(0);
					$("#diskonshow").html(0);
					$(".vouchergagal").show();
					$(".vouchersukses").hide();
				}
			});
		}else{
			swal.fire("Masukkan Kode Voucher!","masukkan kode voucher terlebih dahulu lalu klik tombol cek voucher","warning");
		}
	}

    //HITUNG ONGKIR
    function hitungOngkir(){
      if(($("#idalamat").val() != "" && $("#idalamat").val() != "0") || $("#tujuan").val() > 0){
        var tujuan = $("#tujuan").val();

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
              }else{
                $("#ongkir").val(0).trigger("change");
                calculateOngkir();
                errorKurir();
              }
            });
          }
      }else{
        swal.fire("Penting!","mohon cek kembali dan pastikan alamat sudah benar","error");
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
      var totalbayar = sum + parseFloat($("#subtotal").val()) - parseFloat($("#diskon").val());

      if(sumi == false){
        $(".pembayaran").hide();
        $("#error-bayar").show();
        $(".button-lanjut-bayar-hide").show();
        $(".button-lanjut-bayar-show").hide();
      
      }else{
        $(".pembayaran").show();
        $("#error-bayar").hide();
        $(".button-lanjut-bayar-hide").hide();
         $(".button-lanjut-bayar-show").show();
      }

      $("#total").val(totalbayar);
      $("#totalbayar").html(formUang(totalbayar));
      $("#ongkirshow").html(formUang(sum));
      $(".total").val(totalbayar);
      $(".totalbayar").html(formUang(totalbayar));
      $(".ongkirshow").html(formUang(sum));
      //$('html, body').animate({ scrollTop: $("#totalbayar").offset().top - 400 });

      //RESET PEMBAYARAN
      $("#transfer").html("Rp "+formUang(totalbayar));
      $("#saldo").html("Rp 0");
      $("#saldopotong").val(0);
      $("#metode option").prop("selected",false);
      $("#metode option[value=1]").prop("selected",true).trigger("change");
    }
    function resetOngkir(){
	  var total = parseFloat($("#subtotal").val()) - parseFloat($("#diskon").val());
      $("#total").val($("#subtotal").val());
      $("#totalbayar").html(formUang(total));
      $("#saldo").html("Rp 0");
      $(".ongkir").val(0);
      $("#ongkirshow").html(0);
       $(".ongkirshow").html(0);
       $(".totalbayar").html(formUang(total));
      //$("#tujuan").val(0);

      //RESET PEMBAYARAN
      $(".pembayaran").hide();
      $("#error-bayar").show();
      $(".button-lanjut-bayar-hide").show();
      $(".button-lanjut-bayar-show").hide();
      $("#transfer").html("Rp "+formUang($("#subtotal").val()));
      $("#saldopotong").val(0);
      $("#saldo").html("Rp 0");
      $("#metode option").prop("selected",false);
      $("#metode option[value=1]").prop("selected",true).trigger("change");
    }
    function errorKurir(){
      $("#error-kurir").show();
      //$('html, body').animate({ scrollTop: $("#error-kurir-"+idtoko).offset().top - 260 });
    }

    //METODE Bayar
    $("#metode").change(function(){
      var saldo = parseFloat($("#saldoval").val());
      var total = parseFloat($("#total").val());

      if($(this).val() == 2){
        if(saldo >= total){
          $("#saldopotong").val(total);
          $("#saldo").html("Rp "+formUang(total));
          $("#transfer").html("Rp 0");
        }else{
          var selisih = total - saldo;
          $("#saldopotong").val(saldo);
          $("#saldo").html("Rp "+formUang(saldo));
          $("#transfer").html("Rp "+formUang(selisih));
        }
      }else{
        $("#saldopotong").val(0);
        $("#saldo").html("Rp 0");
        $("#transfer").html("Rp "+formUang(total));
      }
    });

    //KURIR PENGIRIMAN
    $(".kurir").change(function(){
      $("#error-kurir").hide();
      if($(this).val() != ""){
        var data = $("#service"+$(this).val()).html();
        $(".paket").html(data)
        $(".ongkir").val("0");
        $("#ongkirshow").html("0");
        $(".alamatform").show();

        hitungOngkir();
      }else{
        resetOngkir();
        $(".alamatform").hide();
      }
    });
    $(".paket").change(function(){
      $("#error-kurir").hide();
      hitungOngkir();
    });

    //LOAD KABUPATEN KOTA & KECAMATAN
    $("#prov").change(function(){
      $("#kab").html("<option value=''>Loading...</option>");
      $("#kec").html("<option value=''>Kecamatan</option>");
      resetOngkir();
			$.post("<?php echo site_url("assync/getkab"); ?>",{"id":$(this).val(),[$("#csrf_name").val()]: $("#csrf_token").val()},function(msg){
				var data = eval("("+msg+")");
        $(".csrf_token").val(data.token);
				$("#kab").html(data.html);
			});
		});
		$("#kab").change(function(){
      resetOngkir();
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
			hitungOngkir();
    });

    function checkoutNow(){
      $(".pembayaran").hide();
      $("#proses").show();
      $("#lanjut_pembayaran").html('Sedang diproses...');
      
      var total = parseFloat($("#total").val());

      $(".idproduks").each(function(){
        var id = $(this).val();
        var nama = $("#namaproduks_"+id).val();
        var kategori = $("#kategoriproduks_"+id).val();
        var total = $("#totalproduks_"+id).val();
        fbq('track', 'Purchase', {content_ids:id,content_type:kategori,content_name:nama,currency: "IDR", value: total});
      });

      $.post("<?php echo site_url("assync/bayarpesanan"); ?>",$("#cekout").serialize(),function(msg){
        var data = eval("("+msg+")");
        $(".csrf_token").val(data.token);
        if(data.success == true){
          window.location.href = data.url;
        }else{
          $(".pembayaran").show();
          $("#proses").hide();
        }
      });
    }
  </script>

  <!-- ADDITIONAL DATA FOR RAJAONGKIR -->
  <select id="servicecod" style="display:none;">
  	<option value="cod" selected>COD</option>
  </select>
  <select id="servicetoko" style="display:none;">
  	<option value="toko" selected>Kurir Toko</option>
  </select>
  <?php
    $kr = $this->db->get("kurir");
    foreach($kr->result() as $kur){
  ?>
  <select id="service<?php echo $kur->rajaongkir; ?>" style="display:none;">
  	<option value="">Pilih Paket</option>
    <?php
      $this->db->where("idkurir",$kur->id);
      $pak = $this->db->get("paket");
      $no = 1;
      foreach($pak->result() as $pk){
        $select = ($no == 1) ? "selected" : "";
  	    echo '<option value="'.$pk->rajaongkir.'" '.$select.'>'.$pk->nama.'</option>';
        $no++;
      }
    ?>
  </select>
  <?php
    }
  ?>

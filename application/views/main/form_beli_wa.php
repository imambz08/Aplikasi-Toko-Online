<style type="text/css">
	select, option{
		font-size: 10px !important;
	}
</style>
<div class="modal-header">
	<h5 class="modal-title f-sm-14"><strong>Mau dikirim kemana?</strong></h5>
	<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 16px !important">
      <h3 aria-hidden="true" class="f-sm-16" style="font-size: 16px !important"> <i class="fa fa-times"></i></h3>
    </button>
</div>

<div class="modal-body">
	<?php
    	/*$attributes = array('name' => 'login_biasa', 'id' => 'form_login_biasa');
		echo form_open('home/login_biasa', $attributes);*/
    ?>
    <form id="form_beli_wa">
    	
    	<input type="hidden" id="totalharga" value="<?php echo $total_bayar; ?>" name="totalharga" />
    	<input type="hidden" id="totalsemua" value="0" name="totalsemua">
        <input type="hidden" name="berat" class="berat" id="berat" value="<?php echo $totalberat; ?>" />
        

        <input type="hidden" id="form_nama_produk" name="form_nama_produk" value="<?= $nama_produk; ?>">
		<input type="hidden" id="form_varian" name="form_varian" value="<?= $varian; ?>">
		<input type="hidden" id="form_subvarian" name="form_subvarian" value="<?= $subvarian; ?>">
		<input type="hidden" id="form_harga" name="form_harga" value="<?= $harga_produk; ?>">
		<input type="hidden" id="form_jml_beli" name="form_jml_beli" value="<?= $jml_beli;?>">
		<input type="hidden" id="form_berat_produk" name="form_berat_produk" value="<?= $berat_produk;?>">
		<input type="hidden" id="form_catatan" name="form_catatan" value="<?= $catatan;?>">
		 <input type="hidden" name="dari" id="dari" value="<?php echo $this->func->getSetting("kota"); ?>" />
		 <input type="hidden" id="tujuan" value="" name="tujuan" />
		 <input type="hidden" id="kurir_nama" name="kurir_nama" value="-">
		 <input type="hidden" id="kurir_service" name="kurir_service" value="-">
		 <input type="hidden" id="alamat_prov" name="alamat_prov" value="-">
		  <input type="hidden" id="alamat_kab" name="alamat_kab" value="-">
		   <input type="hidden" id="alamat_kec" name="alamat_kec" value="-">

		<input type="hidden" id="ongkir" name="ongkir" class="ongkir" value="0">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<ul class="nav nav-tabs">
					    <li class="nav-item">
					      <a class="nav-link data_saya active f-sm-10">1. Penerima</a>
					    </li>
					    
					    <li class="nav-item">
					      <a class="nav-link alamat_saya f-sm-10">2. Alamat</a>
					    </li>
					     <li class="nav-item">
					      <a class="nav-link info_pesanan f-sm-10">3. Kurir</a>
					    </li>
					   
					    
					</ul>
					<div class="tab-content">

						<div class="container-fluid tab-pane active data_saya_tab m-t-10" id="data_saya">
							<div class="row">
								<div class="col-6">
									<div class="form-group" style="margin-top:0px">
										<label class="f-sm-12 f-md-14 text-secondary">Nama Penerima</label>
										<input type="text"id="form_nama_penerima" name="form_nama_penerima" class="form-control f-sm-12 f-sm-12 f-md-14" placeholder="Nama penerima.." autocomplete="off" required>
										
									</div>
								</div>
								<div class="col-6">
									<div class="form-group" style="margin-top:0px">
										<label class="f-sm-12 f-md-14 text-secondary">No HP</label>
										<input type="number"  id="form_no_hp" name="form_no_hp" class="form-control f-sm-12 f-sm-12 f-md-14" placeholder="cth: 088801219155" autocomplete="off" required>
									</div>
								</div>
								<div class="col-12">
									<div class="form-group" style="margin-top:-15px">
										<label class="f-sm-12 f-md-14 text-secondary">Alamat Rumah/Penerima</label>
										<textarea id="form_alamat" name="form_alamat" class="form-control f-sm-12 f-sm-12 f-md-14" placeholder="cth: Nama Jalan - Desa/Keluarah RT 02 RW 06" autocomplete="off" required></textarea>
									</div>
								</div>
							</div>
						</div>
						<div class="container-fluid tab-pane alamat_saya_tab m-t-10 m-b-10" id="alamat_saya">
							<div class="row">
								<div class="col-6 col-md-6">
									<div class="rs1-select2 rs2-select2   m-b-12 p-lr-0 f-sm-12 f-md-14">
										<label class="label-control f-sm-12 f-md-14">Provinsi</label>
					                  <select class="js-select2 form-control f-sm-12 f-md-14" id="prov" style="height: 10%" name="prov">
					                    <option value="">Provinsi</option>
					                    <?php
					                      $prov = $this->db->get("prov");
					                      foreach($prov->result() as $pv){
					                        echo '<option value="'.$pv->id.'" data-nama="'.$pv->nama.'">'.$pv->nama.'</option>';
					                      }
					                    ?>
					                  </select>
					                  <div class="dropDownSelect2"></div>
					                </div>
								</div>
								<div class="col-6 col-md-6">
									<div class="rs1-select2 rs2-select2   m-b-12 p-lr-0 f-sm-12 f-md-14">
										<label class="label-control f-sm-12 f-md-14">Kota/Kab</label>
					                  <select class="js-select2 form-control f-sm-12 f-md-14" id="kab" name="kab">
					                    <option value="">Kabupaten</option>
					                  </select>
					                  <div class="dropDownSelect2"></div>
					                </div>
								</div>
								<div class="col-6 col-md-6">
									<div class="rs1-select2 rs2-select2   m-b-12 p-lr-0 f-sm-12 f-md-14">
										<label class="label-control f-sm-12 f-md-14">Kecamatan</label>
					                  <select class="js-select2 form-control f-sm-12 f-md-14" id="kec" name="kec">
					                    <option value="">Kecamatan</option>
					                  </select>
					                  <div class="dropDownSelect2"></div>
					                </div>
								</div>
								<div class="col-6 col-md-6">
									<div class="form-group" style="margin-top:-2px" name="kodepos">
										<label class="label-control f-sm-12 f-md-14">Kode Pos (opsional)</label>
										<input type="text" name="kodepos" id="beli_kodepos" class="form-control f-sm-12 f-sm-12 f-md-14" placeholder="Kode Pos" autocomplete="off"  style="margin-top:-2px">
										
									</div>
								</div>
							</div>
						</div>
						<div class="container-fluid tab-pane info_pesanan_tab m-t-10 m-b-10" id="info_pesanan">
							<div class="row">
								
								<div class="row p-all-5" style="background-color: #f1f2f3">
									<div class="col-12">
										<h5 class="f-sm-12 f-md-12"><strong>Informasi Pesanan</strong></h5>
									</div>
									<div class="col-6">
										<h5 class="f-sm-8 f-md-12"><?= $nama_produk; ?> <?= $varian;?> <?= $subvarian;?></h5>
										<h6 class="f-sm-8 f-md-12"><small>Berat 1 produk <?= $berat_produk;?> gram</small></h6>
									</div>
									<div class="col-3">
										<h5 class="f-sm-8 f-md-12"><?= $this->func->formUang($harga_produk);?> x <?= $jml_beli;?></h5>
									</div>
									<div class="col-3">
										<h5 class="f-sm-8 f-md-12"><?= $this->func->formUang($total_bayar);?></h5>
									</div>
									
									<div class="col-6">
										<h5 class="f-sm-8 f-md-12">Ongkos Kirim</h5>
										
									</div>
									<div class="col-3">
										<h5 class="f-sm-8 f-md-12"> <?= $totalberat;?> gram</h5>
									</div>
									<div class="col-3">
										<h5 class="f-sm-8 f-md-12" id="ongkirshow"></h5>
									</div>
									<div class="col-6">
										<h5 class="f-sm-8 f-md-12"><strong>Total</strong></h5>
									</div>
									<div class="col-3">
										<h5 class="f-sm-8 f-md-12"></h5>
									</div>
									<div class="col-3">
										<h5 class="f-sm-8 f-md-12"><strong id="totalsemuashow"></strong></h5>
									</div>
									
								</div>
								<div class="col-6 col-md-6 f-sm-12 f-md-14 m-t-10 m-b-10">
									<div class="rs1-select2 rs2-select2  bor8 bg0 w-full  f-sm-12 f-md-14">
										<label class="label-control f-sm-12 f-md-14">Ekspedisi</label>
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
								<div class="col-6 f-sm-12 f-md-14 m-t-10 m-b-10">
									<div class="rs1-select2 rs2-select2  bor8 bg0 w-full  f-sm-12 f-md-14" id="paketform">
										<label class="label-control f-sm-12 f-md-14">Paket Pengiriman</label>
					                  <select class="js-select2 paket form-control  f-sm-12 f-md-14" name="paket">
					                    <option value="">Pilih Paket Pengiriman</option>
					                  </select>
					                  <div class="dropDownSelect2"></div>
					                </div>
								</div>
								<div class="col-12">
									<div class="error text-danger col-md-12 m-t-10  f-sm-12 f-md-14" id="error-kurir" style="display:none;">
					                	<span><i class="fa fa-exclamation-circle"></i> pilihan ekspedisi atau paket pengiriman tidak tersedia, silahkan pilih yg lain.</span>
					             	</div>
								</div>
								

								<button type="submit" class="btn btn-colorbutton btn-md button_beli_wa f-sm-12 f-md-14 btn-block m-t-10" name="button_beli_wa" id="button_beli_wa" style="display: none"><i class="fab fa-whatsapp"></i> Pesan Via WA</button>
								<button type="button" class="btn btn-outline-colorbutton btn-md  f-sm-12 f-md-14 btn-block m-t-10"  id="button_beli_wa_false" disabled=""><i class="fab fa-whatsapp"></i> Lengkapi Data</button>
							</div>
						</div>


					</div>
				</div>
			</div>
		</div>
	
    	
		<!--
		
		

		<div class="container info_pesanan hide m-b-10">
	    	
				
			</div>
		</div>-->
		
		
		
		
		
		

	</form>
</div>
<input type="hidden" id="csrf_name" value="<?=$this->security->get_csrf_token_name()?>" name="csrf_name" />
<input type="hidden" id="csrf_token" class="csrf_token" value="<?=$this->security->get_csrf_hash();?>" name="csrf_token"/>
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
  <select id="service<?php echo $kur->rajaongkir; ?>" class="kurir_service" name="kurir_service" style="display:none;">
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


	       <?php


		
		$level = isset($_SESSION["lvl"]) ? $_SESSION["lvl"] : 1;
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
		$totalstokbarang = ($dbv->num_rows() > 0) ? 0 : $data->stok;
		$totalstok = 0;
		$hargs = 0;
		foreach($dbv->result() as $rv){
			$totalstokbarang += $rv->stok;
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
      
	      <div class="modal-header">
	      	
	      					<?php

								$this->db->where("idproduk",$data->id);
								$this->db->order_by("jenis","DESC");
								$this->db->limit(1);
								$db = $this->db->get("upload");
								
								foreach ($db->result() as $res){
									
							?>
			
							<img src="<?php echo base_url("i/uploads/".$res->nama); ?>" alt="IMG-PRODUCT"  style="width: 65px; height: 65px; margin-right:10px">
								
							<?php } ?>
				
			      	<h5 class="modal-title fs-14" id="beli_nama_produk" data-produk="<?= $data->nama;?>"><?= $data->nama;?></h5>
					<?php 
						if($data->hargacoret > 0){
							echo "<h5 class=\"fs-14 modal-title harga-coret\" style=\"margin-top:15px; left:90px; position:absolute \">IDR ".$this->func->formUang($data->hargacoret)."</h5>";
						}
					?>
				
					<h5 class="fs-14 text-dark color1 modal-title" style="margin-top: 30px; left: 90px; position: absolute;">
							<?php 
								if($hargs > 0){
									echo "IDR ".$this->func->formUang(min($harga))." - ".$this->func->formUang(max($harga));
								}else{
									echo "IDR ".$this->func->formUang($result);
								}
							?>
					</h5>
					<h5 class="fs-14 text-dark2 color1 modal-title" style="margin-top: 45px; left: 90px; position: absolute;" id="stokrefresh2">
						Stok : <?= $totalstokbarang;?>
					</h5>
												
			      	<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="float: left">
			          <span aria-hidden="true">&times;</span>
			        </button>
			    
	      </div>
	      <div class="modal-body">
	      	<?php
	      	if($totalstokbarang > 0)
	      	{
	      	?>
	      				<form id="keranjang2">
						  <input type="hidden" name="<?=$this->security->get_csrf_token_name()?>" value="<?=$this->security->get_csrf_hash();?>" id="token"/>
						  <input type="hidden" name="idproduk" value="<?php echo $data->id; ?>" id="data_id"/>
						  <input type="hidden" id="variasi2" name="variasi" value="0" />
						  <input type="hidden" id="harga2" name="harga" value="<?=$result?>" />
						  <input type="hidden" id="formnya_varian" value="">
						  <input type="hidden" id="formnya_subvarian" value="">
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
									<div class="col-6 p-lr-0 m-b-6">
									<?=$data->variasi?>
									</div>
									<div class="col-6 p-lr-0 m-b-10">
										<select class="form-control warna"  required data_variasi="<?= $data->variasi;?>">
											<option value=""> Pilih <?=$data->variasi?> </option>
											<?php
												for($i=0; $i<count($warnaid); $i++){
													if($stoks[$warnaid[$i]] > 0){
														echo "<option value='".$warnaid[$i]."' data-varian='".$data->variasi.": ".$this->func->getWarna($warnaid[$i],"nama")."'>".$this->func->getWarna($warnaid[$i],"nama")."</option>";
														//echo "<input type='hidden' id='beli_varian' value='".$data->variasi.": ".$this->func->getWarna($warnaid[$i],"nama")."'>";
													}
												}
											?>
										</select>
									</div>
									<div class="col-6 p-lr-0 m-b-6">
										<?=$data->subvariasi?>
									</div>
									<div class="col-6 p-lr-0 m-b-6">
										<select class="form-control size"  required >
											<option value=""> Pilih <?=$data->subvariasi?> dulu </option>
										</select>
									</div>
									<?php
										}
									?>
									<div class="col-6 p-lr-0 m-t-10">
										<div id="tes"></div>
									</div>
									<div class="col-6 row p-lr-0 m-lr-0 m-t-10">
										<div class="wrap-num-product input-group col-12 p-lr-0">
											<div class="num-product-down input-group-prepend cursor-pointer text-center">
												<span class="input-group-text btn btn-outline-colorbutton fs-9" style="border:0px; border-radius:50%; width: 25px; height:25px;  padding:0px 9px;"><i class="fa fa-minus"></i></span>
											</div>
											
											<input class="form-control text-center num-product jumlahorder" type="number" min="<?php echo $data->minorder; ?>" name="jumlah" value="<?php echo $data->minorder; ?>"  required style="border:0px; height:29px; width: 50px; margin-left: 10px; margin-right: 10px; border-bottom: 1px solid #ccc" id="beli_jml_beli">
												
											<div class="num-product-up input-group-append cursor-pointer text-center">
												<span class="input-group-text btn btn-colorbutton fs-9" style="border:0px; border-radius:50%; width: 25px; height:25px; padding:0px 9px;"><i class="fa fa-plus"></i></span>
											</div>
										</div>
										<div id="stokrefresh" class="col-6 p-lr-20"></div>
									</div>
									<div class="col-12 m-b-0 p-lr-0 m-t-10">
										Catatan pembeli
									</div>
									<div class="col-12 p-lr-0">
										<input class="form-control" type="text" name="keterangan" value="" id="beli_catatan">
										<input type="hidden" id="beli_berat_produk" value="<?= $data->berat;?>">
									</div>

									
									<div class="col-12 m-t-10 p-lr-0">
										<button type="submit" id="submit2" class="btn btn-md btn-colorbutton btn-block">
											&nbsp;Selanjutnya <i class="fa fa-chevron-right"></i>
										</button>
										<span id="proses2" class="" style="display:none;"><b><i class="fa fa-spin fa-spinner color1"></i> Memproses pesanan</b></span>
										<span id="gagal2" class="m-t-20" style="display:none;"><i class="text-danger fa fa-exclamation-triangle"></i> Gagal memproses pesanan.</span>
									</div>

									
								</div>
							</div>
						</form>
			<?php 
		    }
			else{ ?>
						<div class="p-tb-10 p-lr-20 m-b-16 m-t-32 btn font-medium bg-danger text-light btn-block">
							<?php if($data->preorder == 0){ ?>
								Maaf, Stok telah habis
							<?php }else{ ?>
								Maaf, Kuota Pre Order sudah penuh
							<?php } ?>
	        
	      				</div>
	      		<?php } ?>
	      

	       <div style="display:none;">
	<?php
		for($i=0; $i<count($warnaid); $i++){
			echo "
				<div class='warna_".$warnaid[$i]."' id='warna_".$warnaid[$i]."'>
					<option value=''>-- Pilih ".$data->subvariasi." --</option>
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
					echo "<option value='".$sizeid[$warnaid[$i]][$a]."' data-stok='".$stok[$warnaid[$i]][$a]."' data-harga='".$result."' data-variasi='".$variasi[$warnaid[$i]][$a]."' data-subvarian='".$data->subvariasi.": ".$this->func->getSize($sizeid[$warnaid[$i]][$a],"nama")."'>".$this->func->getSize($sizeid[$warnaid[$i]][$a],"nama")."</option>";
					//echo "<input type='hidden' id='beli_subvarian' value='".$data->subvariasi.": ".$this->func->getSize($sizeid[$warnaid[$i]][$a],"nama")."'>";
				}
			}
			echo "
				</div>
			";
		}
	?>
  </div>

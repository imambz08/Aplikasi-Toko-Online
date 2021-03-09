<div class="modal-header">
	<h5 class="modal-title f-sm-16"><strong>Masuk yuk untuk lanjut</strong></h5>
	<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 16px !important">
      <h3 aria-hidden="true" class="f-sm-16" style="font-size: 16px !important"> <i class="fa fa-times"></i></h3>
    </button>
</div>
<?php 
	$set = $this->func->getSetting("login_otp");
	if($set == 1){
?>
<div class="modal-body">
	<?php
    	$attributes = array('name' => 'masuk_yuk', 'class' => 'form_masuk_yuk');
		echo form_open('home/masuk_yuk', $attributes);
    ?>
		<div class="form-group" style="margin-top:-10px">
			<label class="f-sm-10 text-secondary">Nomor Whatsapp atau Email</label>
			<input type="text" name="email_otp" id="email_otp" class="form-control border_bottom f-sm-12" placeholder="cth: 088801219155" autocomplete="off" required>
			<span class="f-sm-10 text-secondary"><i class="fa fa-lock"></i> Data kamu terjamin keamanannya</span>
		</div>
		<button type="submit" class="btn btn-block btn-colorbutton btn-md button-login">Selanjutnya</button>
	</form>
	<center><span class="f-sm-12 text-secondary"></i> Belum memiliki akun? yuk <a href="<?= site_url('home/signup');?>" class="color1">Daftar</a></span></center>
</div>
<?php } else{ ?>
<div class="modal-body">
	<?php
    	/*$attributes = array('name' => 'login_biasa', 'id' => 'form_login_biasa');
		echo form_open('home/login_biasa', $attributes);*/
    ?>
    <form id="form_login_biasa" action="<?= site_url();?>/home/login_biasa" method="post">
		<div class="form-group" style="margin-top:-10px">
			<label class="f-sm-10 text-secondary">Nomor Whatsapp atau Email</label>
			<input type="text" name="email" id="email" class="form-control border_bottom f-sm-12" placeholder="cth: 088801219155" autocomplete="off" required>
			
		</div>
		<div class="form-group" style="margin-top:-10px">
			<label class="f-sm-10 text-secondary">Password</label>
			<input type="password" name="pass" id="pass" class="form-control border_bottom f-sm-12" placeholder="Masukan Password" autocomplete="off" required>
			<span class="f-sm-10 text-secondary"><i class="fa fa-lock"></i> Data kamu terjamin keamanannya</span>
		</div>
		<button type="submit" class="btn btn-block btn-colorbutton btn-md button-login" name="button_login">Selanjutnya</button>
	</form>
	<center><span class="f-sm-12 text-secondary"></i> Belum memiliki akun? yuk <a href="<?= site_url('home/signup');?>" class="color1">Daftar</a></span></center>
</div>

<?php }?>
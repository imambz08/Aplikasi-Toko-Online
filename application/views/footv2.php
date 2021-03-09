
	<!-- Footer -->
	<footer class="bg-foot p-t-45 p-b-43 bg-dark text-light" style="margin-top: -2px;">
		<div class="row p-b-90 container m-l-auto m-r-auto">
			<div class="col-md-4 m-b-20">
				<h4 class="font-medium foot-title p-b-0">
					KONTAK KAMI
				</h4>

				<div>
					<?php $set = $this->func->getSetting("semua"); ?>
					<table>
						<tr><td class='p-r-10'><i class="fab fa-whatsapp color1"></i></td><td><?=$set->wasap?></td></tr>
						<tr><td class='p-r-10'><i class="fab fa-instagram color1"></i> </td><td><?=$set->lineid?></td></tr>
						<tr><td class='p-r-10'><i class="fa fa-envelope-open color1"></i> </td><td><?=$set->email?></td></tr>
						<tr><td class='p-r-10'><i class="fa fa-map-marker color1"></i> </td><td><?=$set->alamat?></td></tr>
					</table>
				</div>
			</div>

			<div class="col-md-4 m-b-20">
				<h4 class="font-medium foot-title p-b-0">
					SITE MAP
				</h4>

				<ul class="foot-menu color1">
					
					<li class="p-b-9" class="color1">
						<a href="<?=site_url();?>" class="text-light">
							HOME
						</a>
					</li>
					<li class="p-b-9">
						<a href="<?=site_url('shop');?>" class="text-light">
							SHOP
						</a>
					</li>
					<li class="p-b-9">
						<a href="<?=site_url('blog');?>" class="text-light">
							BLOG
						</a>
					</li>
					<li class="p-b-0">
						<a href="#" class="text-light">
							INFORMASI
						</a>
					</li>
					
				</ul>
			</div>

			<div class="col-md-4 m-b-20">
				<h4 class="font-medium foot-title p-b-30">
					Selalu  Terhubung
				</h4>
				<div class="">
					<a target="_blank" onclick="fbq('track','Contact')" href="https://wa.me/<?=$this->func->getRandomWasap()?>/?text=Halo,%20mohon%20infonya%20untuk%20menjadi%20reseller%20*<?=$this->func->getSetting("nama")?>*%20caranya%20bagaimana%20ya?%20dan%20syaratnya%20apa%20saja,%20terima%20kasih" class="btn btn-colorbutton btn-block"><i class="fab fa-whatsapp"></i> Hubungi Admin</a>
					&nbsp;<p>Dapatkan potongan harga khusus untuk reseller.
					</div>
				<div class="flex-m p-t-10">
					<a onclick="fbq('track','Contact')" href="<?=$set->facebook?>"  class="fs-32 text-light p-r-20 fab fa-facebook-square"></a>
					<a onclick="fbq('track','Contact')" href="<?=$set->instagram?>" class="fs-32 text-light p-r-20 fab fa-instagram"></a>
					<a onclick="fbq('track','Contact')" href="mailto:<?=$set->email?>" class="fs-32 text-light p-r-20 fas fa-envelope"></a>
				</div>
			</div>
		</div>

		<div class="t-center p-l-15 p-r-15">
			<div class="t-center p-t-20">
				Copyright © <?=date('Y');?> <?=ucwords(strtolower($set->nama))?></a>
			</div>
		</div>
	</footer>



	<!-- Back to top
	<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
	</div> -->
	<input type="hidden" id="names" value="<?=$this->security->get_csrf_token_name()?>" />
	<input type="hidden" id="tokens" value="<?=$this->security->get_csrf_hash();?>" />

	<?php if($this->func->cekLogin() == true){ ?>
	<script type="text/javascript">
		

		$(function(){
			//$("#modalpesan").modal();
			//
			
		
			$("#modalpilihpesan,#modalpesan").on('shown.bs.modal', function(){
				$(".chat-sticky").hide();
			});
			$("#modalpilihpesan,#modalpesan").on('hidden.bs.modal', function(){
				$(".chat-sticky").show();
			});
			$("#modalpesan").on('shown.bs.modal', function(){
				fbq("track","Contact");
				loadPesan(0);
				var seti = setInterval(()=>{ loadPesan(1); },3000);
				$("#modalpesan").on('hidden.bs.modal', function(){
					clearInterval(seti);
				});
			});
			
			$("#kirimpesan").on("submit",function(e){
				e.preventDefault();
				var datar = $(this).serialize();
				datar = datar + "&" + $("#names").val() + "=" + $("#tokens").val();
				$.post("<?=site_url("assync/kirimpesan")?>",datar,function(s){
					fbq("track","Contact");
					var data = eval("("+s+")");
					updateToken(data.token);
					$("#kirimpesan input").val("");
					if(data.success == true){
						$("#pesan").html('<div class="isipesan"><i class="fas fa-spin fa-compact-disc text-success"></i> memuat pesan...</div>');
						loadPesan(0);
					}else{
						swal.fire("GAGAL!","terjadi kendala saat mengirim pesan, coba ulangi beberapa saat lagi","error");
					}
				});
			});
			
			//$("#modalpilihpesan").modal();
			
			function loadPesan(nul){
				$("#pesan").load("<?=site_url("assync/pesanmasuk")?>",function(){
					if(nul != 1){
						$("#pesan").animate({ scrollTop: $("#pesan").prop('scrollHeight')}, 1000);
					}
				});
			}

		});
	</script>
	
	<div class="modal fade" id="modalpesan" tabindex="-1" role="dialog" style="background: rgba(0,0,0,.5);" style="bottom:0;right:0;" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title text-primary font-medium"><i class="fa fa-comments"></i> Live Chat</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body pesan" id="pesan">
					<div class="pesanwrap center">
						<div class="isipesan"><i class="fas fa-spin fa-compact-disc text-success"></i> memuat pesan...</div>
					</div>
				</div>
				<form id="kirimpesan" method="POST">
					<div class="modal-footer">
						<div class="input-group">
							<input type="text" class="form-control" placeholder="ketik pesan..." name="isipesan" required />
							<div class="input-group-append">
								<button type="submit" id="submit" class="btn btn-success"><i class="fa fa-paper-plane"></i> KIRIM</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="modal fade" id="modalpilihpesan" tabindex="-1" role="dialog" style="background: rgba(0,0,0,.5);" style="bottom:0;right:0;" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content p-lr-30 p-tb-40 text-center">
				<h3 class="text-primary font-bold">Hubungi Admin</h3><br/>
				<a href="https://wa.me/<?=$this->func->getRandomWasap()?>" target="_blank" class="btn btn-lg btn-block btn-utama m-b-10"><i class="fab fa-whatsapp"></i> &nbsp;Chat via Whatsapp</a>
				<button onclick="$('#modalpilihpesan').modal('hide');$('#modalpesan').modal()" class="btn btn-lg btn-block btn-outline-kedua"><i class="fas fa-comments"></i> &nbsp;Live Chat</button>
			</div>
		</div>
	</div>

	
	
	<?php }else{ ?>
	
	<?php }?>

	<div class="modal fade" id="modalpengaturan" tabindex="-1" role="dialog" style="background: rgba(0,0,0,.7);" style="bottom:0;right:0;" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content p-lr-10 p-tb-15">
				<div class="modal-header" style="height: 10px">
					<h6 class="modal-title" style="margin-top: -20px"><i class="fas fa-cog"></i> Pengaturan</h6>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: -35px">
	         	 	<span aria-hidden="true">&times;</span>
	        		</button>
	            </div>
	            <?php
	            	$attributes = array('name' => 'editpengaturan', 'id' => 'editpengaturan');
					echo form_open('home/editpengaturan', $attributes);
	            ?>
	            <div class="modal-body">
					<div class="row">
						<div class="col-3"><span class="fs-12">Header</span></div>
						
						<div class="col-9">
							<table>
								<tr>
									<td width="30px"><div class="color1_blue"><input type="radio" name="color1" value="#1da1f2" checked></div></td>
									<td width="30px"><div class="color1_orange"><input type="radio" name="color1" value="#ff6702"></div></td>
									<td width="30px"><div class="color1_merah"><input type="radio" name="color1" value="#ea4335"></div></td>
									<td width="30px"><div class="color1_kuning"><input type="radio" name="color1" value="#fbbc05"></div></td>
									<td width="30px"><div class="color1_hijau"><input type="radio" name="color1" value="#34a853"></div></td>
									<td width="30px"><div class="color1_hitam"><input type="radio" name="color1" value="#3c4856"></div></td>
									
								</tr>
							</table>
						</div>
					</div>
					<div class="row m-t-10">
						<div class="col-3"><span class="fs-12">Navbar</span></div>
						
						<div class="col-9">
							<table>
								<tr>
									<td width="30px"><div class="color1_blue"><input type="radio" name="color2" value="#1da1f2"></div></td>
									<td width="30px"><div class="color1_orange"><input type="radio" name="color2" value="#ff6702"></div></td>
									<td width="30px"><div class="color1_merah"><input type="radio" name="color2" value="#ea4335"></div></td>
									<td width="30px"><div class="color1_kuning"><input type="radio" name="color2" value="#fbbc05"></div></td>
									<td width="30px"><div class="color1_hijau"><input type="radio" name="color2" value="#34a853"></div></td>
									<td width="30px"><div class="color1_hitam"><input type="radio" name="color2" value="#111111" checked></div></td>
									<td width="30px"><div class="color1_abu"><input type="radio" name="color2" value="#ffffff" checked></div></td>
									
								</tr>
							</table>
						</div>
					</div>
					<div class="row m-t-10">
						<div class="col-3"><span class="fs-12">Button</span></div>
						
						<div class="col-9">
							<table>
								<tr>
									<td width="30px"><div class="color1_blue"><input type="radio" name="button" value="#1da1f2"></div></td>
									<td width="30px"><div class="color1_orange"><input type="radio" name="button" value="#ff6702"></div></td>
									<td width="30px"><div class="color1_merah"><input type="radio" name="button" value="#ea4335"></div></td>
									<td width="30px"><div class="color1_kuning"><input type="radio" name="button" value="#fbbc05"></div></td>
									<td width="30px"><div class="color1_hijau"><input type="radio" name="button" value="#34a853"></div></td>
									<td width="30px"><div class="color1_hitam"><input type="radio" name="button" value="#111111" checked></div></td>
									
								</tr>
							</table>
						</div>
					</div>
					<div class="row m-t-10">
						<div class="col-3"><span class="fs-12">Body</span></div>
						
						<div class="col-9">
							<table>
								<tr>
									<td width="30px"><div class="color1_hitam"><input type="radio" name="body" value="#0e0e0e"></div></td>
									<td width="30px"><div class="color1_putih"><input type="radio" name="body" value="#eaeaea" checked></div></td>
								</tr>
							</table>
						</div>
					</div>
					
					
				</div>
				<div class="modal-footer" style="height: 30px;">
							
							<button type="submit" class="btn btn-sm btn-color1 pull-right" style="margin-top:-5px"><i class="fas fa-save"></i> &nbsp; <span class="pesan">Simpan</span></button>
						
				</div>
				</form>
			</div>
		</div>
	</div>
	<a href="javascript:void(0)" class="chat-sticky" onclick='$("#modalpengaturan").modal()'><button type="button" class="chat-sticky-wrapper" data-bs-toggle="modal" data-bs-target="#modalpengaturan"><i class="fas fa-cog"></i></button></a>


	
	

	<script type="text/javascript" src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/vendor/select2/select2.min.js') ?>"></script>
	<script type="text/javascript">
		$(".js-select2").each(function(){
			$(this).select2({
    			theme: 'bootstrap4',
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		});
	</script>
	<script type="text/javascript" src="<?= base_url('assets/vendor/slick/slick.min.js') ?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/vendor/swal/sweetalert2.min.js') ?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/js/aos.js') ?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/js/main.js') ?>"></script>
	<script src="https://i.jsdelivr.net/npm/typed.js@2.0.9"></script>

	<script type="text/javascript">
  		AOS.init();
  		$(document).ready(function(){
  			let images = document.querySelectorAll("[data-src]");

  			function preloadImage(img){
  				let src = img.getAttribute("data-src");
  				if (!src) {
  					return;
  				}

  				img.src = src;
  			}

  			let imgOptions = {
  				treshold: 1,
  				rootMargin: "0px 0px 1000px 0px"
  			};

  			let imgObserver = new IntersectionObserver((entries, imgObserver) => {
  				entries.forEach(entry => {
  					if(!entry.isIntersecting){
  						return;
  					}
  					else{
  						preloadImage(entry.target);
  						imgObserver.unobserve(entry.target);
  					}
  				});
  			}, imgOptions);

  			images.forEach(image => {
  				imgObserver.observe(image);
  			});


			//edit pengaturan
			$('#editpengaturan').submit(function(e){
				e.preventDefault();
				var me = $(this);

		                $.ajax({
		                  url:me.attr('action'),
		                  method:'POST',
		                  data:new FormData(this),
		                  dataType:'JSON',
		                  contentType:false,
		                  processData:false,
		                  beforeSend:function(){
		                    $('.pesan').html('Loading...');
		                  },
		                  success: function(data){
		                    if (data.hasil == true) {
		                      
		                      
		                      

		                      swal.fire({
		                        title:"Berhasil",
		                        text:data.pesan,
		                        icon:"success"
		                      });

		                      $('#modalpengaturan').hide();

		                      location.reload(true);
		                    }
		                    else{
		                      swal.fire({
		                        title:"Gagal",
		                        text:data.pesan,
		                        icon:"error"
		                      });

		                      $('.pesan').html('Simpan');
		                    }
		                  }
		                });
			});

				
  		});
  		
		  
		function formUang(data){
			return data.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
		}
		function signoutNow(){
			swal.fire({
				title: "Logout",
				text: "yakin akan logout dari akun anda?",
				icon: "warning",
				showDenyButton: true,
				confirmButtonText: "Oke",
				denyButtonText: "Batal"
			})
			.then((willDelete) => {
				if (willDelete.isConfirmed) {
					window.location.href="<?=site_url("home/signout")?>";
				}
			});
		}

		function tambahWishlist(id,nama){
			$.post("<?php echo site_url("assync/tambahwishlist/"); ?>"+id,{[$("#names").val()]:$("#tokens").val()},function(msg){
				var data = eval("("+msg+")");
				var wish = parseInt($(".wishlistcount").html());
				updateToken(data.token);
				if(data.success == true){
					$(".wishlistcount").html(wish+1);
					swal.fire(nama, "berhasil ditambahkan ke wishlist", "success");
				}else{
					swal.fire("Gagal", data.msg, "error");
				}
			});
		}

		function updateToken(token){
			$("#tokens,.tokens").val(token);
		}

		$(".block2-wishlist .fas").on("click",function(){
			$(this).removeClass("active");
			$(this).addClass("active");
		});

	</script>
	<script src="<?= base_url('assets/js/main.js') ?>"></script>

	<!-- Facebook Pixel Code -->
		<script>
		!function(f,b,e,v,n,t,s)
		{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
		n.callMethod.apply(n,arguments):n.queue.push(arguments)};
		if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
		n.queue=[];t=b.createElement(e);t.async=!0;
		t.src=v;s=b.getElementsByTagName(e)[0];
		s.parentNode.insertBefore(t,s)}(window, document,'script',
		'https://connect.facebook.net/en_US/fbevents.js');
		fbq('init', '<?=$set->fb_pixel?>');
		fbq('track', 'PageView');
		</script>
		<noscript>
		<img height="1" width="1" style="display:none" 
			src="https://www.facebook.com/tr?id=<?=$set->fb_pixel?>&ev=PageView&noscript=1"/>
		</noscript>
	<!-- End Facebook Pixel Code -->

</body>
</html>

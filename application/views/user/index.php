<!DOCTYPE html>
<html lang="en">
	<?php $this->load->view('user/head') ?>


	<body class="no-skin">
		<!-- #section:basics/navbar.layout -->

		<?php $this->load->view('user/navbar') ?>
		

		<!-- /section:basics/navbar.layout -->
		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<!-- #section:basics/sidebar -->

			<?php $this->load->view('user/sidebar') ?>
			
				<!-- /section:basics/sidebar.layout.minimize -->
				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
				</script>
			</div>

			<!-- /section:basics/sidebar -->
			<div class="main-content">
				<div class="main-content-inner">
					<!-- #section:basics/content.breadcrumbs -->
					<div class="breadcrumbs" id="breadcrumbs">
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>

						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="<?= base_url ('user') ;?>">Home</a>
							</li>

							
						</ul><!-- /.breadcrumb -->

						<!-- #section:basics/content.searchbox -->
						

						<!-- /section:basics/content.searchbox -->
					</div>

					<!-- /section:basics/content.breadcrumbs -->
					<div class="page-content">
						<!-- #section:settings.box -->
						<div class="ace-settings-container" id="ace-settings-container">
							

							<div class="ace-settings-box clearfix" id="ace-settings-box">
								<div class="pull-left width-50">
									<!-- #section:settings.skins -->
									

									<!-- /section:settings.skins -->

									<!-- #section:settings.navbar -->
									

									<!-- /section:settings.container -->
								</div><!-- /.pull-left -->

								<div class="pull-left width-50">
									<!-- #section:basics/sidebar.options -->
									
									<!-- /section:basics/sidebar.options -->
								</div><!-- /.pull-left -->
							</div><!-- /.ace-settings-box -->
						</div><!-- /.ace-settings-container -->
						<!-- /section:settings.box -->

						<div class="page-header">
							<h1 >
								Selamat Datang <?= $user['name'];?> di Aplikasi SI-GUDANG !!!
								
							</h1>
						</div><!-- /.page-header -->
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div class="row">

								
									<div class="row">
														<div class="col-xs-12 col-sm-6">
															<div class="widget-box transparent">
																<div class="widget-header widget-header-small">
																	<h4 class="widget-title smaller">
																		<i class="ace-icon fa fa-check-square-o bigger-110"></i>
																		Latar Belakang
																	</h4>
																</div>

																<div class="widget-body">
																	<div class="widget-main">
																		<p align="justify">
																			Inventarisasi adalah serangkaian kegiatan melaksanakan pengurusan, pengaturan, pencatatan dan pendaftaran barang-barang inventaris milik UPT / kantor yang dipakai dalam melaksanakan tugas. Inventarisasi ini mengacu pada  persediaan barang sumber daya yang berbentuk Suku cadang komponen yang digunakan oleh teknisi Stasiun Klimatologi Lombok Barat melakukan pemeliharaan dan perbaikan alat. 
																		</p>
												
																		<p align="justify">
																			Inventarisasi suku cadang / aset peralatan dilaksanakan berdasarkan prinsip efisien, efektif, transparan dan akuntabel. Untuk menunjang kegiatan inventarisasi di Stasiun Klimatologi Kelas I Lombok Barat diperlukan sebuah aplikasi yang disebut Sistem Monitoring Suku Cadang (Si-GUDANG).
																		</p>
																							
																	</div>
																</div>
																
															</div>
														</div>


														<div class="col-xs-12 col-sm-6">
															<div class="widget-box transparent">
																<div class="widget-header widget-header-small header-color-blue2">
																	<h4 class="widget-title smaller">
																		<i class="ace-icon fa fa-lightbulb-o bigger-120"></i>
																		Aplikasi Si-GUDANG
																	</h4>
																</div>


																<div class="widget-body">
																	<div class="widget-main">
																		<p align="justify">
																			Aplikasi Si-GUDANG (Sistem Monitoring Suku Cadang) dibuat untuk memfasilitasi proses monitoring persediaan jumlah suku cadang / aset peralatan secara online di Stasiun Klimatologi Kelas I Lombok Barat. 
																		</p>
												
																		<p align="justify">
																			Aplikasi ini bisa memberikan kemudahan dalam proses pengecekan suku cadang / aset peralatan yang masuk maupun yang keluar, memberikan informasi persediaan suku cadang / aset peralatan, serta membantu dalam proses pelacakan lokasi suku cadang / aset peralatan berada. Sistem ini juga memberikan cetak laporan berdasarkan harian, mingguan, dan bulanan.
																		</p>
																							
																		</p>
																	</div>
																</div>

																

																		

																		<!-- #section:pages/profile.skill-progress -->
																		

																		<!-- /section:pages/profile.skill-progress -->
																	</div>
																</div>
															</div>
														</div>
														<h3 class="header smaller lighter purple">Fitur Aplikasi Si-GUDANG</h3>
													<div class="profile-skills">
																			<div class="progress">
																				<div class="progress-bar progress-bar-danger" style="width:60%">
																					<span class="pull-left">Fitur untuk mengetahui stok barang yang tersedia</span>
																					<span class="pull-right"></span>
																				</div>
																			</div>

																			<div class="progress">
																				<div class="progress-bar progress-bar-success" style="width:52%">
																					<span class="pull-left">Fitur untuk pencatatan barang masuk</span>

																					<span class="pull-right"></span>
																				</div>
																			</div>

																			<div class="progress">
																				<div class="progress-bar progress-bar-purple" style="width:40%">
																					<span class="pull-left"> Fitur untuk pencatatan barang keluar</span>

																					<span class="pull-right"></span>
																				</div>
																			</div>

																			<div class="progress">
																				<div class="progress-bar progress-bar-warning" style="width:30%">
																					<span class="pull-left">Fitur untuk pembuatan laporan stok barang</span>

																					<span class="pull-right"></span>
																				</div>
																			</div>

																			
																		</div>

												
											</div>
										</div>
									
									
									<!-- /section:pages/pricing.large -->
								
					
								</div><!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->
			<?php $this->load->view('user/footer') ?>

			
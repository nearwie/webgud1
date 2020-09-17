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

							<li>
								<a href="<?= base_url ('dataasetsc') ;?>">Persediaan Suku Cadang</a>
							</li>
							<li class="active">Notifikasi Dynamis</li>
						</ul><!-- /.breadcrumb -->

						<!-- #section:basics/content.searchbox -->
						<div class="nav-search" id="nav-search">
							<form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" >
									<i class="ace-icon fa fa-search nav-search-icon"></i>
								</span>
							</form>
						</div><!-- /.nav-search -->

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
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div class="row">

								<div class="col-sm-12 infobox-container">
										<!-- #section:pages/dashboard.infobox -->
										<div class="infobox infobox-purple">
											<div class="infobox-icon">
												<i class="ace-icon fa fa-inbox"></i>
											</div>

											<div class="infobox-data">
												<span class="infobox-data-number"><?= $aset; ?></span>
												<div class="infobox-content">Total Data SU-CA</div>
											</div>

											<!-- #section:pages/dashboard.infobox.stat -->
											

											<!-- /section:pages/dashboard.infobox.stat -->
										</div>

										<div class="infobox infobox-blue">
											<div class="infobox-icon">
												<i class="ace-icon fa fa-filter"></i>
											</div>

											<div class="infobox-data">
												<span class="infobox-data-number"><?= $stok; ?></span>
												<div class="infobox-content">Total Stok SU-CA</div>
											</div>

											
										</div>

										
										

										

										
								</div>
							</div>
							<div class="space-6"></div>

							
									<!-- #section:pages/pricing.large -->
									
								<div class="space-6"></div>

			

									<!-- /section:pages/pricing.large -->
								</div>


						
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div class="row">
									<!-- #section:pages/pricing.large -->
									<div class="col-xs-6 col-sm-4 pricing-box">
										<div class="widget-box widget-color-dark">
											<div class="widget-header">
												<h5 class="widget-title bigger lighter">Stok Aset Minimum</h5>
											</div>

											<div class="widget-body">
												<div class="widget-main">
												
								                            <table class="table mb-0 text-center table-striped table-sm">
								                                <thead>
								                                    <tr>
								                                        <th>Aset</th>
								                                        <th>Stok</th>
								                                        <th>Pasok</th>
								                                    </tr>
								                                </thead>
								                                <tbody>
								                                    <?php
								                                    if ($aset_min) :
								                                        foreach ($aset_min as $b) :
								                                            ?>
								                                            <tr>
								                                                <td><?= $b['nama_brg']; ?></td>
								                                                <td><?= $b['stok']; ?></td>
								                                                <td>
								                                                    <a href="<?= base_url('asetmasuk/add/') . $b['kode_brg'] ?>" class="btn btn-warning btn-sm"><i class="fa fa-plus"></i></a>
								                                                </td>
								                                            </tr>
								                                        <?php endforeach; ?>
								                                    <?php else : ?>
								                                        <tr>
								                                            <td colspan="3" class="text-center">
								                                                Tidak ada aset stok minim
								                                            </td>
								                                        </tr>
								                                    <?php endif; ?>
								                                </tbody>
								                            </table>
								                       

													<hr />
													
												</div>
											</div>
										</div>
									</div>

									<div class="col-xs-6 col-sm-4 pricing-box">
										<div class="widget-box widget-color-green">
											<div class="widget-header">
												<h5 class="widget-title bigger lighter">Transaksi Terakhir Aset Masuk</h5>
											</div>

											<div class="widget-body">
												<div class="widget-main">
													<table class="table mb-0 table-sm table-striped text-center">
						                                <thead>
						                                    <tr>
						                                        <th>Tanggal</th>
						                                        <th>Aset</th>
						                                        <th>Jumlah</th>
						                                    </tr>
						                                </thead>
						                                <tbody>
						                                    <?php foreach ($transaksi['asetsc_masuk'] as $tbm) : ?>
						                                        <tr>
						                                            <td><strong><?= $tbm['tanggal_masuk']; ?></strong></td>
						                                            <td><?= $tbm['nama_brg']; ?></td>
						                                            <td><span class="badge badge-success"><?= $tbm['jumlah_masuk']; ?></span></td>
						                                        </tr>
						                                    <?php endforeach; ?>
						                                </tbody>
						                            </table>
													<hr />
													
												</div>
											</div>
										</div>
									</div>

									<div class="col-xs-6 col-sm-4 pricing-box">
										<div class="widget-box widget-color-red">
											<div class="widget-header">
												<h5 class="widget-title bigger lighter">5 Transaksi Terakhir Aset Keluar</h5>
											</div>

											<div class="widget-body">
												<div class="widget-main">
													 <table class="table mb-0 table-sm table-striped text-center">
						                                <thead>
						                                    <tr>
						                                        <th>Tanggal</th>
						                                        <th>Aset</th>
						                                        <th>Jumlah</th>
						                                    </tr>
						                                </thead>
						                                <tbody>
						                                    <?php foreach ($transaksi['asetsc_keluar'] as $tbk) : ?>
						                                        <tr>
						                                            <td><strong><?= $tbk['tanggal_keluar']; ?></strong></td>
						                                            <td><?= $tbk['nama_brg']; ?></td>
						                                            <td><span class="badge badge-danger"><?= $tbk['jumlah_keluar']; ?></span></td>
						                                        </tr>
						                                    <?php endforeach; ?>
						                                </tbody>
						                            </table>

													<hr />
													
												</div>

												
											</div>
										</div>
									</div>

					
								</div><!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->
			<?php $this->load->view('user/footer') ?>

			
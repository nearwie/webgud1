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
								<a href="<?= base_url ('satuan') ;?>">Data Satuan</a>
							</li>
							<li class="active">Tambah Satuan</li>
						</ul><!-- /.breadcrumb -->

						<!-- #section:basics/content.searchbox -->
						
						<!-- /section:basics/content.searchbox -->
					</div>

					<!-- /section:basics/content.breadcrumbs -->
						<div class="page-header">
							<h1>
								Data Satuan
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Tambah Satuan Barang
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div class="form-horizontal">
									 <?= $this->session->flashdata('pesan'); ?>
                					<?= form_open(); ?>
									<!-- #section:elements.form -->
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="nama_satuan">Nama Satuan</label>

										<div class="col-sm-4">
											   <input value="<?= set_value('nama_satuan'); ?>" name="nama_satuan" id="nama_satuan" type="text" class="form-control" placeholder="Nama Satuan...">
                       							 <?= form_error('nama_satuan', '<small class="text-danger">', '</small>'); ?>
										</div>
									</div>

									
									<!-- /section:elements.form -->
									
									<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
											<button class="btn btn-info" type="submit">
												<i class="ace-icon fa fa-check bigger-110"></i>
												Submit
											</button>

											&nbsp; &nbsp; &nbsp;
											<button class="btn" type="reset">
												<i class="ace-icon fa fa-undo bigger-110"></i>
												Reset
											</button>
										</div>
									</div>
								
													
												
											</div>
										</div><!-- /.modal-content -->
									</div><!-- /.modal-dialog -->
								</div><!-- PAGE CONTENT ENDS -->
								 <?= form_close(); ?>
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->
							


									<!-- /section:basics/sidebar.options -->
								</div><!-- /.pull-left -->
							</div><!-- /.ace-settings-box -->
						</div><!-- /.ace-settings-container -->

						<!-- /section:settings.box -->
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->
			
<?php $this->load->view('user/footer') ?>
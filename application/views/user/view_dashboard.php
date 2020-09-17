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
								<a href="<?= base_url ('dashboard') ;?>">Dashboard</a>
							</li>
							
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
								<h3 class="header smaller lighter purple">Grafik (Pias)</h3>
								<div class="row">

								<div class="col-sm-12 infobox-container">
										<!-- #section:pages/dashboard.infobox -->
										

										

										

										
								</div>
							</div>
							<div class="space-6"></div>

								<div class="row">
									<!-- #section:pages/pricing.large -->
									<div class="col-xl-8 col-sm-6 pricing-box">
										<div class="widget-box widget-color-purple">
											<div class="widget-header">
												<h5 class="widget-title bigger lighter">Total Transaksi (Pias) Perbulan pada Tahun <?= date('Y'); ?></h5>
											</div>

											<div class="widget-body">
												<div class="widget-main">
															<div class="card-body">
									                            <div class="chart-area">
									                                <div class="chartjs-size-monitor">
									                                    <div class="chartjs-size-monitor-expand">
									                                        <div class=""></div>
									                                    </div>
									                                    <div class="chartjs-size-monitor-shrink">
									                                        <div class=""></div>
									                                    </div>
									                                </div>
									                                <canvas id="myAreaChart" width="400" height="320" class="chartjs-render-monitor" style="display: block; width: 669px; height: 320px;"></canvas>
									                            </div>
									                        </div>
									                    </div>
									               
																

													<hr />
													
												</div>

												
											</div>
										</div>
									
									<div class="col-xl-4 col-sm-6 pricing-box">
										<div class="widget-box widget-color-blue">
											<div class="widget-header">
												<h5 class="widget-title bigger lighter">Transaksi (Pias)</h5>
											</div>

											<div class="widget-body">
												<div class="widget-main">
														<div class="card-body">
								                            <div class="chart-pie pt-4 pb-2">
								                                <div class="chartjs-size-monitor">
								                                    <div class="chartjs-size-monitor-expand">
								                                        <div class=""></div>
								                                    </div>
								                                    <div class="chartjs-size-monitor-shrink">
								                                        <div class=""></div>
								                                    </div>
								                                </div>
								                                <canvas id="myPieChart" width="302" height="245" class="chartjs-render-monitor" style="display: block; width: 302px; height: 297px;"></canvas>
								                            </div>
								                            <div class="mt-4 text-center small">
								                                <span class="mr-2">
								                                    <i class="ace-icon fa fa-circle fa-2x red"></i> Barang Keluar
								                                </span>

								                                <span class="mr-2">
								                                    <i class="ace-icon fa fa-circle fa-2x green"></i> Barang Masuk
								                                </span>
								                            </div>
								                        </div>
								                    </div>
													<hr />
													
												</div>

												
											</div>
										</div>
									</div>

								<div class="space-6"></div>
								<div>
									<div class="row">
									<!-- #section:pages/pricing.large -->
									<div class="col-xl-8 col-sm-6 pricing-box">
										<div class="widget-box widget-color-purple">
											<div class="widget-header">
												<h5 class="widget-title bigger lighter">Total Transaksi (Toolkit) Perbulan pada Tahun <?= date('Y'); ?></h5>
											</div>

											<div class="widget-body">
												<div class="widget-main">
															<div class="card-body">
									                            <div class="chart-area">
									                                <div class="chartjs-size-monitor">
									                                    <div class="chartjs-size-monitor-expand">
									                                        <div class=""></div>
									                                    </div>
									                                    <div class="chartjs-size-monitor-shrink">
									                                        <div class=""></div>
									                                    </div>
									                                </div>
									                                <canvas id="myAreaChart" width="400" height="320" class="chartjs-render-monitor" style="display: block; width: 669px; height: 320px;"></canvas>
									                            </div>
									                        </div>
									                    </div>
									               
																

													<hr />
													
												</div>

												
											</div>
										</div>
									
									<div class="col-xl-4 col-sm-6 pricing-box">
										<div class="widget-box widget-color-blue">
											<div class="widget-header">
												<h5 class="widget-title bigger lighter">Transaksi (Toolkit)</h5>
											</div>

											<div class="widget-body">
												<div class="widget-main">
														<div class="card-body">
								                            <div class="chart-pie pt-4 pb-2">
								                                <div class="chartjs-size-monitor">
								                                    <div class="chartjs-size-monitor-expand">
								                                        <div class=""></div>
								                                    </div>
								                                    <div class="chartjs-size-monitor-shrink">
								                                        <div class=""></div>
								                                    </div>
								                                </div>
								                                <canvas id="myPieChart" width="302" height="245" class="chartjs-render-monitor" style="display: block; width: 302px; height: 297px;"></canvas>
								                            </div>
								                            <div class="mt-4 text-center small">
								                                <span class="mr-2">
								                                    <i class="ace-icon fa fa-circle fa-2x red"></i> Barang Keluar
								                                </span>

								                                <span class="mr-2">
								                                    <i class="ace-icon fa fa-circle fa-2x green"></i> Barang Masuk
								                                </span>
								                            </div>
								                        </div>
								                    </div>
													<hr />
													
												</div>

												
											</div>
										</div>
									</div>






								</div>

			

									<!-- /section:pages/pricing.large -->
								</div>


						
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div class="row">
									<!-- #section:pages/pricing.large -->
									
					
								</div><!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->
			<?php if ($this->uri->segment(1) == 'dashboard') : ?>
        <!-- Chart -->
        <script src="<?= base_url(); ?>assets/chart.js/Chart.min.js"></script>

        <script type="text/javascript">
            // Set new default font family and font color to mimic Bootstrap's default styling
            Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
            Chart.defaults.global.defaultFontColor = '#858796';

            function number_format(number, decimals, dec_point, thousands_sep) {
                // *     example: number_format(1234.56, 2, ',', ' ');
                // *     return: '1 234,56'
                number = (number + '').replace(',', '').replace(' ', '');
                var n = !isFinite(+number) ? 0 : +number,
                    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                    s = '',
                    toFixedFix = function(n, prec) {
                        var k = Math.pow(10, prec);
                        return '' + Math.round(n * k) / k;
                    };
                // Fix for IE parseFloat(0.55).toFixed(0) = 0;
                s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
                if (s[0].length > 3) {
                    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
                }
                if ((s[1] || '').length < prec) {
                    s[1] = s[1] || '';
                    s[1] += new Array(prec - s[1].length + 1).join('0');
                }
                return s.join(dec);
            }

            // Area Chart Example
            var ctx = document.getElementById("myAreaChart");
            var myLineChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"],
                    datasets: [{
                            label: "Total Aset Masuk",
                            lineTension: 0.3,
                            backgroundColor: "rgba(78, 115, 223, 0.05)",
                            borderColor: "#49b32e",
                            pointRadius: 3,
                            pointBackgroundColor: "#49b32e",
                            pointBorderColor: "#49b32e",
                            pointHoverRadius: 3,
                            pointHoverBackgroundColor: "#5a5c69",
                            pointHoverBorderColor: "#5a5c69",
                            pointHitRadius: 10,
                            pointBorderWidth: 2,
                            data: <?= json_encode($cbm); ?>,
                        },
                        {
                            label: "Total Aset Keluar",
                            lineTension: 0.3,
                            backgroundColor: "rgba(231, 74, 59, 0.05)",
                            borderColor: "#e74a3b",
                            pointRadius: 3,
                            pointBackgroundColor: "#e74a3b",
                            pointBorderColor: "#e74a3b",
                            pointHoverRadius: 3,
                            pointHoverBackgroundColor: "#5a5c69",
                            pointHoverBorderColor: "#5a5c69",
                            pointHitRadius: 10,
                            pointBorderWidth: 2,
                            data: <?= json_encode($cbk); ?>,
                        }
                    ],
                },
                options: {
                    maintainAspectRatio: false,
                    layout: {
                        padding: 5
                    },
                    scales: {
                        xAxes: [{
                            time: {
                                unit: 'date'
                            },
                            gridLines: {
                                display: false,
                                drawBorder: false
                            },
                            ticks: {
                                maxTicksLimit: 7
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                maxTicksLimit: 5,
                                padding: 10,
                                // Include a dollar sign in the ticks
                                callback: function(value, index, values) {
                                    return number_format(value);
                                }
                            },
                            gridLines: {
                                color: "rgb(234, 236, 244)",
                                zeroLineColor: "rgb(234, 236, 244)",
                                drawBorder: false,
                                borderDash: [2],
                                zeroLineBorderDash: [2]
                            }
                        }],
                    },
                    legend: {
                        display: false
                    },
                    tooltips: {
                        backgroundColor: "rgb(255,255,255)",
                        bodyFontColor: "#858796",
                        titleMarginBottom: 10,
                        titleFontColor: '#6e707e',
                        titleFontSize: 14,
                        borderColor: '#dddfeb',
                        borderWidth: 1,
                        xPadding: 15,
                        yPadding: 15,
                        displayColors: false,
                        intersect: false,
                        mode: 'index',
                        caretPadding: 10,
                        callbacks: {
                            label: function(tooltipItem, chart) {
                                var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                                return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
                            }
                        }
                    }
                }
            });

            // Pie Chart Example
            var ctx = document.getElementById("myPieChart");
            var myPieChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ["Aset Masuk", "Aset Keluar"],
                    datasets: [{
                        data: [<?= $barang_masuk; ?>, <?= $barang_keluar; ?>],
                        backgroundColor: ['#49b32e', '#e74a3b'],
                        hoverBackgroundColor: ['#acf29b', '#eb8383'],
                        hoverBorderColor: "rgba(234, 236, 244, 1)",
                    }],
                },
                options: {
                    maintainAspectRatio: false,
                    tooltips: {
                        backgroundColor: "rgb(255,255,255)",
                        bodyFontColor: "#858796",
                        borderColor: '#dddfeb',
                        borderWidth: 1,
                        xPadding: 15,
                        yPadding: 15,
                        displayColors: false,
                        caretPadding: 10,
                    },
                    legend: {
                        display: false
                    },
                    cutoutPercentage: 80,
                },
            });
        </script>
    <?php endif; ?>
			<?php $this->load->view('user/footer') ?>

			
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
								<a href="<?= base_url ('jenis') ;?>">Data Jenis</a>
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
						<div class="row">
									<div class="col-xs-12">

          							<?= $this->session->flashdata('message'); ?>
          							<?= $this->session->flashdata('pesan'); ?>

										<h3 class="header smaller lighter blue">Data Jenis</h3>
										<div class="pull-right tableTools-container"></div>
										</div>
										<div class="col-auto">
							                <a href="<?= base_url('Jenis/add_jenis'); ?>" class="btn btn-success">
							                    <span class="icon">
							                        <i class="fa fa-plus"></i>
							                    </span>
							                    <span class="text">
							                       Tambah Jenis
							                    </span>
							                </a>
							            </div>

										<div class="clearfix">

										<div class="table-header">
											Daftar Jenis Barang
										</div>

										<!-- div.table-responsive -->

										<!-- div.dataTables_borderWrap -->
										<div>
											<table id="table-responsive" class="table table-striped table-bordered table-hover" width="50%">
												<thead>
													<tr>
														
														<th >No</th>
														<th >Nama Jenis</th>
														<th >Opsi</th>

													
													</tr>
												</thead>

												<tbody>
													
			                							<?php $i = 1;  ?>
			                							<?php  
			                   							 foreach ($jeniss as $j) :
			                        						?>
													<tr>
														 
														<td><?= $i;?></td>
															<td ><?= $j['nama_jenis']; ?></td>
													      
													     
														<td>
															<div class="hidden-sm hidden-xs action-buttons">
																

																<a class="green" href="<?= base_url('jenis/edit_jenis/') . $j['id_jenis'] ?>" class="badge badge-success">
																	<i class="ace-icon fa fa-pencil bigger-130"></i>
																</a>

																<a class="red" onclick="return confirm('Yakin ingin hapus?')" href="<?= base_url('jenis/delete/') . $j['id_jenis'] ?>" class="badge badge-danger">
																	<i class="ace-icon fa fa-trash-o bigger-130"></i>
																</a>
															</div>

															<div class="hidden-md hidden-lg">
																
															</div>
														</td>
													</tr>
													
														<?php $i++; ?>
													<?php endforeach; ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>


								
													
												
											</div>
										</div><!-- /.modal-content -->
									</div><!-- /.modal-dialog -->
								</div><!-- PAGE CONTENT ENDS -->
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
			

			<!-- inline scripts related to this page -->
			<!-- inline scripts related to this page -->
		<div class="footer">
				<div class="footer-inner">
					<!-- #section:basics/footer -->
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">SI-GUDANG</span>
							Application &copy;  <?= date ('Y'); ?>
						</span>

						&nbsp; &nbsp;
						
					</div>

					<!-- /section:basics/footer -->
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<!-- basic scripts -->
		<script src="<?= base_url('assets/'); ?>back/js/jquery-2.1.4.min.js"></script>

		<!--[if !IE]> -->
	

		<!-- <![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='<?= base_url('assets/'); ?>back/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="<?= base_url('assets/'); ?>back/js/bootstrap.min.js"></script>


		<!-- page specific plugin scripts -->
		<script src="<?= base_url('assets/') ;?>js/dataTables/jquery.dataTables.js"></script>
		<script src="<?= base_url('assets/') ;?>js/dataTables/jquery.dataTables.bootstrap.js"></script>
		<script src="<?= base_url('assets/') ;?>js/dataTables/extensions/TableTools/js/dataTables.tableTools.js"></script>
		<script src="<?= base_url('assets/') ;?>js/dataTables/extensions/ColVis/js/dataTables.colVis.js"></script>

		<!-- ace scripts -->
		<script src="<?= base_url('assets/') ;?>js/ace/elements.scroller.js"></script>
		<script src="<?= base_url('assets/') ;?>js/ace/elements.colorpicker.js"></script>
		<script src="<?= base_url('assets/') ;?>js/ace/elements.fileinput.js"></script>
		<script src="<?= base_url('assets/') ;?>js/ace/elements.typeahead.js"></script>
		<script src="<?= base_url('assets/') ;?>js/ace/elements.wysiwyg.js"></script>
		<script src="<?= base_url('assets/') ;?>js/ace/elements.spinner.js"></script>
		<script src="<?= base_url('assets/') ;?>s/ace/elements.treeview.js"></script>
		<script src="<?= base_url('assets/') ;?>js/ace/elements.wizard.js"></script>
		<script src="<?= base_url('assets/') ;?>js/ace/elements.aside.js"></script>
		<script src="<?= base_url('assets/') ;?>js/ace/ace.js"></script>
		<script src="<?= base_url('assets/') ;?>js/ace/ace.ajax-content.js"></script>
		<script src="<?= base_url('assets/') ;?>js/ace/ace.touch-drag.js"></script>
		<script src="<?= base_url('assets/') ;?>js/ace/ace.sidebar.js"></script>
		<script src="<?= base_url('assets/') ;?>js/ace/ace.sidebar-scroll-1.js"></script>
		<script src="<?= base_url('assets/') ;?>js/ace/ace.submenu-hover.js"></script>
		<script src="<?= base_url('assets/') ;?>js/ace/ace.widget-box.js"></script>
		<script src="<?= base_url('assets/') ;?>js/ace/ace.settings.js"></script>
		<script src="<?= base_url('assets/') ;?>js/ace/ace.settings-rtl.js"></script>
		<script src="<?= base_url('assets/') ;?>js/ace/ace.settings-skin.js"></script>
		<script src="<?= base_url('assets/') ;?>js/ace/ace.widget-on-reload.js"></script>
		<script src="<?= base_url('assets/') ;?>js/ace/ace.searchbox-autocomplete.js"></script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
				//initiate dataTables plugin
				var oTable1 = 
				$('#dynamic-table')
				//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
				.dataTable( {
					bAutoWidth: false,
					"aoColumns": [
					  { "bSortable": false },
					  null, null,null, null, null,
					  { "bSortable": false }
					],
					"aaSorting": [],
			
					//,
					//"sScrollY": "200px",
					//"bPaginate": false,
			
					//"sScrollX": "100%",
					//"sScrollXInner": "120%",
					//"bScrollCollapse": true,
					//Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
					//you may want to wrap the table inside a "div.dataTables_borderWrap" element
			
					//"iDisplayLength": 50
			    } );
				//oTable1.fnAdjustColumnSizing();
			
			
				//TableTools settings
				TableTools.classes.container = "btn-group btn-overlap";
				TableTools.classes.print = {
					"body": "DTTT_Print",
					"info": "tableTools-alert gritter-item-wrapper gritter-info gritter-center white",
					"message": "tableTools-print-navbar"
				}
			
				//initiate TableTools extension
				var tableTools_obj = new $.fn.dataTable.TableTools( oTable1, {
					"sSwfPath": "<?= base_url('assets/'); ?>js/dataTables/extensions/TableTools/swf/copy_csv_xls_pdf.swf", //in Ace demo ../assets will be replaced by correct assets path
					
					"sRowSelector": "td:not(:last-child)",
					"sRowSelect": "multi",
					"fnRowSelected": function(row) {
						//check checkbox when row is selected
						try { $(row).find('input[type=checkbox]').get(0).checked = true }
						catch(e) {}
					},
					"fnRowDeselected": function(row) {
						//uncheck checkbox
						try { $(row).find('input[type=checkbox]').get(0).checked = false }
						catch(e) {}
					},
			
					"sSelectedClass": "success",
			        "aButtons": [
						{
							"sExtends": "copy",
							"sToolTip": "Copy to clipboard",
							"sButtonClass": "btn btn-white btn-primary btn-bold",
							"sButtonText": "<i class='fa fa-copy bigger-110 pink'></i>",
							"fnComplete": function() {
								this.fnInfo( '<h3 class="no-margin-top smaller">Table copied</h3>\
									<p>Copied '+(oTable1.fnSettings().fnRecordsTotal())+' row(s) to the clipboard.</p>',
									1500
								);
							}
						},
						
						{
							"sExtends": "csv",
							"sToolTip": "Export to CSV",
							"sButtonClass": "btn btn-white btn-primary  btn-bold",
							"sButtonText": "<i class='fa fa-file-excel-o bigger-110 green'></i>"
						},
						
						{
							"sExtends": "pdf",
							"sToolTip": "Export to PDF",
							"sButtonClass": "btn btn-white btn-primary  btn-bold",
							"sButtonText": "<i class='fa fa-file-pdf-o bigger-110 red'></i>"
						},
						
						{
							"sExtends": "print",
							"sToolTip": "Print view",
							"sButtonClass": "btn btn-white btn-primary  btn-bold",
							"sButtonText": "<i class='fa fa-print bigger-110 grey'></i>",
							
							"sMessage": "<div class='navbar navbar-default'><div class='navbar-header pull-left'><a class='navbar-brand' href='#'><small>Optional Navbar &amp; Text</small></a></div></div>",
							
							"sInfo": "<h3 class='no-margin-top'>Print view</h3>\
									  <p>Please use your browser's print function to\
									  print this table.\
									  <br />Press <b>escape</b> when finished.</p>",
						}
			        ]
			    } );
				//we put a container before our table and append TableTools element to it
			    $(tableTools_obj.fnContainer()).appendTo($('.tableTools-container'));
				
				//also add tooltips to table tools buttons
				//addding tooltips directly to "A" buttons results in buttons disappearing (weired! don't know why!)
				//so we add tooltips to the "DIV" child after it becomes inserted
				//flash objects inside table tools buttons are inserted with some delay (100ms) (for some reason)
				setTimeout(function() {
					$(tableTools_obj.fnContainer()).find('a.DTTT_button').each(function() {
						var div = $(this).find('> div');
						if(div.length > 0) div.tooltip({container: 'body'});
						else $(this).tooltip({container: 'body'});
					});
				}, 200);
				
				
				
				//ColVis extension
				var colvis = new $.fn.dataTable.ColVis( oTable1, {
					"buttonText": "<i class='fa fa-search'></i>",
					"aiExclude": [0, 6],
					"bShowAll": true,
					//"bRestore": true,
					"sAlign": "right",
					"fnLabel": function(i, title, th) {
						return $(th).text();//remove icons, etc
					}
					
				}); 
				
				//style it
				$(colvis.button()).addClass('btn-group').find('button').addClass('btn btn-white btn-info btn-bold')
				
				//and append it to our table tools btn-group, also add tooltip
				$(colvis.button())
				.prependTo('.tableTools-container .btn-group')
				.attr('title', 'Show/hide columns').tooltip({container: 'body'});
				
				//and make the list, buttons and checkboxed Ace-like
				$(colvis.dom.collection)
				.addClass('dropdown-menu dropdown-light dropdown-caret dropdown-caret-right')
				.find('li').wrapInner('<a href="javascript:void(0)" />') //'A' tag is required for better styling
				.find('input[type=checkbox]').addClass('ace').next().addClass('lbl padding-8');
			
			
				
				/////////////////////////////////
				//table checkboxes
				$('th input[type=checkbox], td input[type=checkbox]').prop('checked', false);
				
				//select/deselect all rows according to table header checkbox
				$('#dynamic-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
					var th_checked = this.checked;//checkbox inside "TH" table header
					
					$(this).closest('table').find('tbody > tr').each(function(){
						var row = this;
						if(th_checked) tableTools_obj.fnSelect(row);
						else tableTools_obj.fnDeselect(row);
					});
				});
				
				//select/deselect a row when the checkbox is checked/unchecked
				$('#dynamic-table').on('click', 'td input[type=checkbox]' , function(){
					var row = $(this).closest('tr').get(0);
					if(!this.checked) tableTools_obj.fnSelect(row);
					else tableTools_obj.fnDeselect($(this).closest('tr').get(0));
				});
				
			
				
				
					$(document).on('click', '#dynamic-table .dropdown-toggle', function(e) {
					e.stopImmediatePropagation();
					e.stopPropagation();
					e.preventDefault();
				});
				
				
				//And for the first simple table, which doesn't have TableTools or dataTables
				//select/deselect all rows according to table header checkbox
				var active_class = 'active';
				$('#simple-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
					var th_checked = this.checked;//checkbox inside "TH" table header
					
					$(this).closest('table').find('tbody > tr').each(function(){
						var row = this;
						if(th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
						else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
					});
				});
				
				//select/deselect a row when the checkbox is checked/unchecked
				$('#simple-table').on('click', 'td input[type=checkbox]' , function(){
					var $row = $(this).closest('tr');
					if(this.checked) $row.addClass(active_class);
					else $row.removeClass(active_class);
				});
			
				
			
				/********************************/
				//add tooltip for small view action buttons in dropdown menu
				$('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
				
				//tooltip placement on right or left
				function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('table')
					var off1 = $parent.offset();
					var w1 = $parent.width();
			
					var off2 = $source.offset();
					//var w2 = $source.width();
			
					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
					return 'left';
				}
			
			})
		</script>

		<!-- the following scripts are used in demo only for onpage help and you don't need them -->
		<link rel="stylesheet" href="<?= base_url('assets/') ;?>css/ace.onpage-help.css" />
		<link rel="stylesheet" href="<?= base_url('assets/') ;?>docs/assets/js/themes/sunburst.css" />

		<script type="text/javascript"> ace.vars['base'] = '..'; </script>
		<script src="<?= base_url('assets/') ;?>js/ace/elements.onpage-help.js"></script>
		<script src="<?= base_url('assets/') ;?>js/ace/ace.onpage-help.js"></script>
		<script src="<?= base_url('assets/') ;?>docs/assets/js/rainbow.js"></script>
		<script src="<?= base_url('assets/') ;?>docs/assets/js/language/generic.js"></script>
		<script src="<?= base_url('assets/') ;?>docs/assets/js/language/html.js"></script>
		<script src="<?= base_url('assets/') ;?>docs/assets/js/language/css.js"></script>
		<script src="<?= base_url('assets/') ;?>docs/assets/js/language/javascript.js"></script>
	</body>
</html>

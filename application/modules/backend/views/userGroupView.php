<link href="http://103.28.57.133/fc_madrid/assets/css/themes/all-themes.css" rel="stylesheet" />
<!-- jQuery -->
<script src="<?php echo base_url(); ?>assets/backend/vendors/bower_components/jquery/dist/jquery.min.js"></script>
<!--
<style>
div.dataTables_wrapper {
        width: 800px;
        margin: 0 auto;
    }
</style>
-->

<style>

/* Switch
   ========================================================================== */
.switch,
.switch * {
  -webkit-tap-highlight-color: transparent;
  -webkit-user-select: none;
     -moz-user-select: none;
      -ms-user-select: none;
          user-select: none;
}

.switch label {
  cursor: pointer;
}

.switch label input[type=checkbox] {
  opacity: 0;
  width: 0;
  height: 0;
}

.switch label input[type=checkbox]:checked + .lever {
  background-color: #84c7c1;
}

.switch label input[type=checkbox]:checked + .lever:before, .switch label input[type=checkbox]:checked + .lever:after {
  left: 18px;
}

.switch label input[type=checkbox]:checked + .lever:after {
  background-color: #26a69a;
}

.switch label .lever {
  content: "";
  display: inline-block;
  position: relative;
  width: 36px;
  height: 14px;
  background-color: rgba(0, 0, 0, 0.38);
  border-radius: 15px;
  margin-right: 10px;
  -webkit-transition: background 0.3s ease;
  transition: background 0.3s ease;
  vertical-align: middle;
  margin: 0 16px;
}

.switch label .lever:before, .switch label .lever:after {
  content: "";
  position: absolute;
  display: inline-block;
  width: 20px;
  height: 20px;
  border-radius: 50%;
  left: 0;
  top: -3px;
  -webkit-transition: left 0.3s ease, background .3s ease, -webkit-box-shadow 0.1s ease, -webkit-transform .1s ease;
  transition: left 0.3s ease, background .3s ease, -webkit-box-shadow 0.1s ease, -webkit-transform .1s ease;
  transition: left 0.3s ease, background .3s ease, box-shadow 0.1s ease, transform .1s ease;
  transition: left 0.3s ease, background .3s ease, box-shadow 0.1s ease, transform .1s ease, -webkit-box-shadow 0.1s ease, -webkit-transform .1s ease;
}

.switch label .lever:before {
  background-color: rgba(38, 166, 154, 0.15);
}

.switch label .lever:after {
  background-color: #F1F1F1;
  -webkit-box-shadow: 0px 3px 1px -2px rgba(0, 0, 0, 0.2), 0px 2px 2px 0px rgba(0, 0, 0, 0.14), 0px 1px 5px 0px rgba(0, 0, 0, 0.12);
          box-shadow: 0px 3px 1px -2px rgba(0, 0, 0, 0.2), 0px 2px 2px 0px rgba(0, 0, 0, 0.14), 0px 1px 5px 0px rgba(0, 0, 0, 0.12);
}

input[type=checkbox]:checked:not(:disabled) ~ .lever:active::before,
input[type=checkbox]:checked:not(:disabled).tabbed:focus ~ .lever::before {
  -webkit-transform: scale(2.4);
          transform: scale(2.4);
  background-color: rgba(38, 166, 154, 0.15);
}

input[type=checkbox]:not(:disabled) ~ .lever:active:before,
input[type=checkbox]:not(:disabled).tabbed:focus ~ .lever::before {
  -webkit-transform: scale(2.4);
          transform: scale(2.4);
  background-color: rgba(0, 0, 0, 0.08);
}

.switch input[type=checkbox][disabled] + .lever {
  cursor: default;
  background-color: rgba(0, 0, 0, 0.12);
}

.switch label input[type=checkbox][disabled] + .lever:after,
.switch label input[type=checkbox][disabled]:checked + .lever:after {
  background-color: #949494;
}
	/* Switch ====================================== */
.switch label {
  font-weight: normal;
  font-size: 13px; }
  .switch label .lever {
    margin: 0 14px; }
  .switch label input[type=checkbox]:checked:not(:disabled) ~ .lever.switch-col-red:active:after {
    box-shadow: 0 1px 3px 1px rgba(0, 0, 0, 0.4), 0 0 0 15px rgba(244, 67, 54, 0.1); }
  .switch label input[type=checkbox]:checked + .lever.switch-col-red {
    background-color: rgba(244, 67, 54, 0.5); }
    .switch label input[type=checkbox]:checked + .lever.switch-col-red:after {
      background-color: #F44336; }
  .switch label input[type=checkbox]:checked:not(:disabled) ~ .lever.switch-col-pink:active:after {
    box-shadow: 0 1px 3px 1px rgba(0, 0, 0, 0.4), 0 0 0 15px rgba(233, 30, 99, 0.1); }
  .switch label input[type=checkbox]:checked + .lever.switch-col-pink {
    background-color: rgba(233, 30, 99, 0.5); }
    .switch label input[type=checkbox]:checked + .lever.switch-col-pink:after {
      background-color: #E91E63; }
  .switch label input[type=checkbox]:checked:not(:disabled) ~ .lever.switch-col-purple:active:after {
    box-shadow: 0 1px 3px 1px rgba(0, 0, 0, 0.4), 0 0 0 15px rgba(156, 39, 176, 0.1); }
  .switch label input[type=checkbox]:checked + .lever.switch-col-purple {
    background-color: rgba(156, 39, 176, 0.5); }
    .switch label input[type=checkbox]:checked + .lever.switch-col-purple:after {
      background-color: #9C27B0; }
  .switch label input[type=checkbox]:checked:not(:disabled) ~ .lever.switch-col-deep-purple:active:after {
    box-shadow: 0 1px 3px 1px rgba(0, 0, 0, 0.4), 0 0 0 15px rgba(103, 58, 183, 0.1); }
  .switch label input[type=checkbox]:checked + .lever.switch-col-deep-purple {
    background-color: rgba(103, 58, 183, 0.5); }
    .switch label input[type=checkbox]:checked + .lever.switch-col-deep-purple:after {
      background-color: #673AB7; }
  .switch label input[type=checkbox]:checked:not(:disabled) ~ .lever.switch-col-indigo:active:after {
    box-shadow: 0 1px 3px 1px rgba(0, 0, 0, 0.4), 0 0 0 15px rgba(63, 81, 181, 0.1); }
  .switch label input[type=checkbox]:checked + .lever.switch-col-indigo {
    background-color: rgba(63, 81, 181, 0.5); }
    .switch label input[type=checkbox]:checked + .lever.switch-col-indigo:after {
      background-color: #3F51B5; }
  .switch label input[type=checkbox]:checked:not(:disabled) ~ .lever.switch-col-blue:active:after {
    box-shadow: 0 1px 3px 1px rgba(0, 0, 0, 0.4), 0 0 0 15px rgba(33, 150, 243, 0.1); }
  .switch label input[type=checkbox]:checked + .lever.switch-col-blue {
    background-color: rgba(33, 150, 243, 0.5); }
    .switch label input[type=checkbox]:checked + .lever.switch-col-blue:after {
      background-color: #2196F3; }
  .switch label input[type=checkbox]:checked:not(:disabled) ~ .lever.switch-col-light-blue:active:after {
    box-shadow: 0 1px 3px 1px rgba(0, 0, 0, 0.4), 0 0 0 15px rgba(3, 169, 244, 0.1); }
  .switch label input[type=checkbox]:checked + .lever.switch-col-light-blue {
    background-color: rgba(3, 169, 244, 0.5); }
    .switch label input[type=checkbox]:checked + .lever.switch-col-light-blue:after {
      background-color: #03A9F4; }
  .switch label input[type=checkbox]:checked:not(:disabled) ~ .lever.switch-col-cyan:active:after {
    box-shadow: 0 1px 3px 1px rgba(0, 0, 0, 0.4), 0 0 0 15px rgba(0, 188, 212, 0.1); }
  .switch label input[type=checkbox]:checked + .lever.switch-col-cyan {
    background-color: rgba(0, 188, 212, 0.5); }
    .switch label input[type=checkbox]:checked + .lever.switch-col-cyan:after {
      background-color: #00BCD4; }
  .switch label input[type=checkbox]:checked:not(:disabled) ~ .lever.switch-col-teal:active:after {
    box-shadow: 0 1px 3px 1px rgba(0, 0, 0, 0.4), 0 0 0 15px rgba(0, 150, 136, 0.1); }
  .switch label input[type=checkbox]:checked + .lever.switch-col-teal {
    background-color: rgba(0, 150, 136, 0.5); }
    .switch label input[type=checkbox]:checked + .lever.switch-col-teal:after {
      background-color: #009688; }
  .switch label input[type=checkbox]:checked:not(:disabled) ~ .lever.switch-col-green:active:after {
    box-shadow: 0 1px 3px 1px rgba(0, 0, 0, 0.4), 0 0 0 15px rgba(76, 175, 80, 0.1); }
  .switch label input[type=checkbox]:checked + .lever.switch-col-green {
    background-color: rgba(76, 175, 80, 0.5); }
    .switch label input[type=checkbox]:checked + .lever.switch-col-green:after {
      background-color: #4CAF50; }
  .switch label input[type=checkbox]:checked:not(:disabled) ~ .lever.switch-col-light-green:active:after {
    box-shadow: 0 1px 3px 1px rgba(0, 0, 0, 0.4), 0 0 0 15px rgba(139, 195, 74, 0.1); }
  .switch label input[type=checkbox]:checked + .lever.switch-col-light-green {
    background-color: rgba(139, 195, 74, 0.5); }
    .switch label input[type=checkbox]:checked + .lever.switch-col-light-green:after {
      background-color: #8BC34A; }
  .switch label input[type=checkbox]:checked:not(:disabled) ~ .lever.switch-col-lime:active:after {
    box-shadow: 0 1px 3px 1px rgba(0, 0, 0, 0.4), 0 0 0 15px rgba(205, 220, 57, 0.1); }
  .switch label input[type=checkbox]:checked + .lever.switch-col-lime {
    background-color: rgba(205, 220, 57, 0.5); }
    .switch label input[type=checkbox]:checked + .lever.switch-col-lime:after {
      background-color: #CDDC39; }
  .switch label input[type=checkbox]:checked:not(:disabled) ~ .lever.switch-col-yellow:active:after {
    box-shadow: 0 1px 3px 1px rgba(0, 0, 0, 0.4), 0 0 0 15px rgba(255, 232, 33, 0.1); }
  .switch label input[type=checkbox]:checked + .lever.switch-col-yellow {
    background-color: rgba(255, 232, 33, 0.5); }
    .switch label input[type=checkbox]:checked + .lever.switch-col-yellow:after {
      background-color: #ffe821; }
  .switch label input[type=checkbox]:checked:not(:disabled) ~ .lever.switch-col-amber:active:after {
    box-shadow: 0 1px 3px 1px rgba(0, 0, 0, 0.4), 0 0 0 15px rgba(255, 193, 7, 0.1); }
  .switch label input[type=checkbox]:checked + .lever.switch-col-amber {
    background-color: rgba(255, 193, 7, 0.5); }
    .switch label input[type=checkbox]:checked + .lever.switch-col-amber:after {
      background-color: #FFC107; }
  .switch label input[type=checkbox]:checked:not(:disabled) ~ .lever.switch-col-orange:active:after {
    box-shadow: 0 1px 3px 1px rgba(0, 0, 0, 0.4), 0 0 0 15px rgba(255, 152, 0, 0.1); }
  .switch label input[type=checkbox]:checked + .lever.switch-col-orange {
    background-color: rgba(255, 152, 0, 0.5); }
    .switch label input[type=checkbox]:checked + .lever.switch-col-orange:after {
      background-color: #FF9800; }
  .switch label input[type=checkbox]:checked:not(:disabled) ~ .lever.switch-col-deep-orange:active:after {
    box-shadow: 0 1px 3px 1px rgba(0, 0, 0, 0.4), 0 0 0 15px rgba(255, 87, 34, 0.1); }
  .switch label input[type=checkbox]:checked + .lever.switch-col-deep-orange {
    background-color: rgba(255, 87, 34, 0.5); }
    .switch label input[type=checkbox]:checked + .lever.switch-col-deep-orange:after {
      background-color: #FF5722; }
  .switch label input[type=checkbox]:checked:not(:disabled) ~ .lever.switch-col-brown:active:after {
    box-shadow: 0 1px 3px 1px rgba(0, 0, 0, 0.4), 0 0 0 15px rgba(121, 85, 72, 0.1); }
  .switch label input[type=checkbox]:checked + .lever.switch-col-brown {
    background-color: rgba(121, 85, 72, 0.5); }
    .switch label input[type=checkbox]:checked + .lever.switch-col-brown:after {
      background-color: #795548; }
  .switch label input[type=checkbox]:checked:not(:disabled) ~ .lever.switch-col-grey:active:after {
    box-shadow: 0 1px 3px 1px rgba(0, 0, 0, 0.4), 0 0 0 15px rgba(158, 158, 158, 0.1); }
  .switch label input[type=checkbox]:checked + .lever.switch-col-grey {
    background-color: rgba(158, 158, 158, 0.5); }
    .switch label input[type=checkbox]:checked + .lever.switch-col-grey:after {
      background-color: #9E9E9E; }
  .switch label input[type=checkbox]:checked:not(:disabled) ~ .lever.switch-col-blue-grey:active:after {
    box-shadow: 0 1px 3px 1px rgba(0, 0, 0, 0.4), 0 0 0 15px rgba(96, 125, 139, 0.1); }
  .switch label input[type=checkbox]:checked + .lever.switch-col-blue-grey {
    background-color: rgba(96, 125, 139, 0.5); }
    .switch label input[type=checkbox]:checked + .lever.switch-col-blue-grey:after {
      background-color: #607D8B; }
  .switch label input[type=checkbox]:checked:not(:disabled) ~ .lever.switch-col-black:active:after {
    box-shadow: 0 1px 3px 1px rgba(0, 0, 0, 0.4), 0 0 0 15px rgba(0, 0, 0, 0.1); }
  .switch label input[type=checkbox]:checked + .lever.switch-col-black {
    background-color: rgba(0, 0, 0, 0.5); }
    .switch label input[type=checkbox]:checked + .lever.switch-col-black:after {
      background-color: #000000; }
  .switch label input[type=checkbox]:checked:not(:disabled) ~ .lever.switch-col-white:active:after {
    box-shadow: 0 1px 3px 1px rgba(0, 0, 0, 0.4), 0 0 0 15px rgba(255, 255, 255, 0.1); }
  .switch label input[type=checkbox]:checked + .lever.switch-col-white {
    background-color: rgba(255, 255, 255, 0.5); }
    .switch label input[type=checkbox]:checked + .lever.switch-col-white:after {
      background-color: #ffffff; }

	.modal-dialog {
	  width: 100%;
	  height: 100%;
	  margin: 0;
	  padding: 0;
	}

	.modal-content {
	  height: auto;
	  min-height: 100%;
	  border-radius: 0;
	}
</style>
	<!-- Row -->
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-default card-view">
				<div class="panel-heading">
					<div class="pull-left">
						<h6 class="panel-title txt-dark"><button type="button" id="add_pengguna" class="btn btn-success">[ + ] tambah</button></h6>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="panel-wrapper collapse in">
					<div class="panel-body">
						<div class="table-wrap">
							<table id="table_pasien" class="table-hover table-bordered">
								<thead>
									<tr>
										<th width="20px">No</th>
										<th width="150px">Group</th>
										<th width="230px">Action</th>
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
						</div>	
					</div>	
				</div>	
			</div>	


		</div>	
	</div>

<!-- Modal -->
<div class="modal fade" id="modalPengguna" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
	<div class="modal-dialog" role="document">
		<div class="modal-content" >
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h5 class="modal-title" id="title_pengguna"> </h5>
			</div>
			<div class="modal-body">
				<form id="frm">
					<input type="hidden" name="id_group" id="id_group">
					
					<div class="form-group">
						<label for="recipient-name" class="control-label mb-10">Group Name </label>
						<input type="text" class="form-control"  name="group_name" id="group_name" required="">
					</div>

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">Dasboard</h6>
								</div>
								<div class="pull-right switch">
		                             <label style="color:#4ab879;">OFF<input type="checkbox" name="role[]" id="dashboard" value="dashboard"><span class="lever switch-col-green"></span>ON<label>
								</div>
							</div>
						</div>
					</div>

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">Courses</h6>
								</div>
								<div class="pull-right">
									<a data-toggle="collapse" class="lm" href="#rg_p" aria-expanded="true">
										<i class="fa fa-angle-down fa-fw"></i>
										<i class="fa fa-angle-up fa-fw"></i>
									</a>
								</div>
							</div>
							<div  id="rg_p" class="panel-wrapper collapse in">
								<div  class="panel-body">

										<div class="panel">
											<div class="panel-heading">
												<div class="pull-left">
													<h6 class="panel-title txt-dark">Courses</h6>
												</div>
												<div class="pull-right switch">
						                             <label style="color:#4ab879;">OFF<input type="checkbox" name="role[]" id="courses" value="courses"><span class="lever switch-col-green"></span>ON<label>
												</div>
											</div>
										</div>

										<div class="panel">
											<div class="panel-heading">
												<div class="pull-left">
													<h6 class="panel-title txt-dark">Material</h6>
												</div>
												<div class="pull-right switch">
						                             <label style="color:#4ab879;">OFF<input type="checkbox" name="role[]" id="material" value="material"><span class="lever switch-col-green"></span>ON<label>
												</div>
											</div>
										</div>

										<div class="panel">
											<div class="panel-heading">
												<div class="pull-left">
													<h6 class="panel-title txt-dark">Lesson</h6>
												</div>
												<div class="pull-right switch">
						                             <label style="color:#4ab879;">OFF<input type="checkbox" name="role[]" id="lesson" value="lesson"><span class="lever switch-col-green"></span>ON<label>
												</div>
											</div>
										</div>
									
								</div>
							</div>
						</div>
					</div>

          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">Offer</h6>
								</div>
								<div class="pull-right switch">
		                             <label style="color:#4ab879;">OFF<input type="checkbox" name="role[]" id="offer" value="offer"><span class="lever switch-col-green"></span>ON<label>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">Newsletter</h6>
								</div>
								<div class="pull-right switch">
		                             <label style="color:#4ab879;">OFF<input type="checkbox" name="role[]" id="newsletter" value="newsletter"><span class="lever switch-col-green"></span>ON<label>
								</div>
							</div>
						</div>
					</div>

          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">Gallery</h6>
								</div>
								<div class="pull-right switch">
		                <label style="color:#4ab879;">OFF<input type="checkbox" name="role[]" id="gallery" value="gallery"><span class="lever switch-col-green"></span>ON<label>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">Corfirmation</h6>
								</div>
								<div class="pull-right switch">
		                <label style="color:#4ab879;">OFF<input type="checkbox" name="role[]" id="confirmation" value="confirmation"><span class="lever switch-col-green"></span>ON<label>
								</div>
							</div>
						</div>
					</div>

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">Contact</h6>
								</div>
								<div class="pull-right switch">
		                             <label style="color:#4ab879;">OFF<input type="checkbox" name="role[]" id="contact" value="contact"><span class="lever switch-col-green"></span>ON<label>
								</div>
							</div>
						</div>
					</div>

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">Master Data</h6>
								</div>
								<div class="pull-right">
									<a data-toggle="collapse" href="#mst" class="lm" aria-expanded="true">
										<i class="fa fa-angle-down fa-fw"></i>
										<i class="fa fa-angle-up fa-fw"></i>
									</a>
								</div>
								<div class="clearfix"></div>
							</div>
							<div  id="mst" class="panel-wrapper collapse in">
								<div  class="panel-body">


										<div class="panel">
											<div class="panel-heading">
												<div class="pull-left">
													<h6 class="panel-title txt-dark">Employee</h6>
												</div>
												<div class="pull-right switch">
						                             <label style="color:#4ab879;">OFF<input type="checkbox" name="role[]" id="employee" value="employee"><span class="lever switch-col-green"></span>ON<label>
												</div>
											</div>
										</div>

										<div class="panel">
											<div class="panel-heading">
												<div class="pull-left">
													<h6 class="panel-title txt-dark">Student</h6>
												</div>
												<div class="pull-right switch">
						                             <label style="color:#4ab879;">OFF<input type="checkbox" name="role[]" id="student" value="student"><span class="lever switch-col-green"></span>ON<label>
												</div>
											</div>
										</div>


										<div class="panel">
											<div class="panel-heading">
												<div class="pull-left">
													<h6 class="panel-title txt-dark">Teacher</h6>
												</div>
												<div class="pull-right switch">
						                             <label style="color:#4ab879;">OFF<input type="checkbox" name="role[]" id="teacher" value="teacher"><span class="lever switch-col-green"></span>ON<label>
												</div>
											</div>
										</div>

										<!-- User -->
											<div class="panel">
												<div class="panel-heading">
													<div class="pull-left">
														<h6 class="panel-title txt-dark">user Manager</h6>
													</div>
													<div class="pull-right">
														<a data-toggle="collapse" class="lm" href="#usr" aria-expanded="true">
															<i class="fa fa-angle-down fa-fw"></i>
															<i class="fa fa-angle-up fa-fw"></i>
														</a>
													</div>
												</div>
												<div  id="usr" class="panel-wrapper collapse in">
													<div  class="panel-body">

															<div class="panel">
																<div class="panel-heading">
																	<div class="pull-left">
																		<h6 class="panel-title txt-dark">User</h6>
																	</div>
																	<div class="pull-right switch">
											                             <label style="color:#4ab879;">OFF<input type="checkbox" name="role[]" id="user" value="user"><span class="lever switch-col-green"></span>ON<label>
																	</div>
																</div>
															</div>

															<div class="panel">
																<div class="panel-heading">
																	<div class="pull-left">
																		<h6 class="panel-title txt-dark">User Group</h6>
																	</div>
																	<div class="pull-right switch">
											                             <label style="color:#4ab879;">OFF<input type="checkbox" name="role[]" id="usergroup" value="usergroup"><span class="lever switch-col-green"></span>ON<label>
																	</div>
																</div>
															</div>
															
													</div>
												</div>
											</div>
										<!-- End User -->
								</div>
							</div>
						</div>
					</div>

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">Blog</h6>
								</div>
								<div class="pull-right">
									<a data-toggle="collapse" class="lm" href="#rg_b" aria-expanded="true">
										<i class="fa fa-angle-down fa-fw"></i>
										<i class="fa fa-angle-up fa-fw"></i>
									</a>
								</div>
							</div>
							<div  id="rg_b" class="panel-wrapper collapse in">
								<div  class="panel-body">

										<div class="panel">
											<div class="panel-heading">
												<div class="pull-left">
													<h6 class="panel-title txt-dark">Blog</h6>
												</div>
												<div class="pull-right switch">
						                             <label style="color:#4ab879;">OFF<input type="checkbox" name="role[]" id="blog" value="blog"><span class="lever switch-col-green"></span>ON<label>
												</div>
											</div>
										</div>

										<div class="panel">
											<div class="panel-heading">
												<div class="pull-left">
													<h6 class="panel-title txt-dark">Comment</h6>
												</div>
												<div class="pull-right switch">
						                             <label style="color:#4ab879;">OFF<input type="checkbox" name="role[]" id="comment" value="comment"><span class="lever switch-col-green"></span>ON<label>
												</div>
											</div>
										</div>
									
								</div>
							</div>
						</div>
					</div>

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">Settings</h6>
								</div>
								<div class="pull-right">
									<a data-toggle="collapse" class="lm" href="#rg_set" aria-expanded="true">
										<i class="fa fa-angle-down fa-fw"></i>
										<i class="fa fa-angle-up fa-fw"></i>
									</a>
								</div>
							</div>
							<div  id="rg_set" class="panel-wrapper collapse in">
								<div  class="panel-body">

										<div class="panel">
											<div class="panel-heading">
												<div class="pull-left">
													<h6 class="panel-title txt-dark">Slider</h6>
												</div>
												<div class="pull-right switch">
						                             <label style="color:#4ab879;">OFF<input type="checkbox" name="role[]" id="slider" value="slider"><span class="lever switch-col-green"></span>ON<label>
												</div>
											</div>
										</div>

										<div class="panel">
											<div class="panel-heading">
												<div class="pull-left">
													<h6 class="panel-title txt-dark">Web Info</h6>
												</div>
												<div class="pull-right switch">
						                             <label style="color:#4ab879;">OFF<input type="checkbox" name="role[]" id="webinfo" value="webinfo"><span class="lever switch-col-green"></span>ON<label>
												</div>
											</div>
										</div>

										<div class="panel">
											<div class="panel-heading">
												<div class="pull-left">
													<h6 class="panel-title txt-dark">Social Media</h6>
												</div>
												<div class="pull-right switch">
						                             <label style="color:#4ab879;">OFF<input type="checkbox" name="role[]" id="socmed" value="socmed"><span class="lever switch-col-green"></span>ON<label>
												</div>
											</div>
										</div>
									
								</div>
							</div>
						</div>
					</div>

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">About</h6>
								</div>
								<div class="pull-right switch">
		                             <label style="color:#4ab879;">OFF<input type="checkbox" name="role[]" id="about" value="about"><span class="lever switch-col-green"></span>ON<label>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" id="close" class="btn btn-danger" data-dismiss="modal">Batal</button>
				<button type="button" class="btn btn-success" id="simpan">Simpan</button>
			</div>
		</div>
	</div>
</div>
<!-- /modal -->

<script type="text/javascript">
	$(document).ready(function(){
		$.fn.modal.Constructor.prototype.enforceFocus = function() {};
		
		var group = $('#table_pasien').DataTable({ 
        	"processing": true, //Feature control the processing indicator.
        	"serverSide": true, //Feature control DataTables' server-side processing mode.
        	"order": [], //Initial no order.
 
        	// Load data for the table's content from an Ajax source
        	"ajax": {
            	"url": "<?php echo base_url('backend/user/ajax_list_group')?>",
            	"type": "POST"
        	},
 
	        //Set column definition initialisation properties.
    	    "columnDefs": [
        		{ 
            		"targets": [ 0,1,2], //first column / numbering column
            		"orderable": false, //set not orderable
        		},
       	 	],
 
	    });

		$(document).on("click","#delete_pengguna",function(){
			var id_group = $.trim($(this).attr("id_group"));
			var c = confirm("Yakin hapus data ini?");

			if(c){
				$.ajax({
					type:"POST",
					error: function(){
						alert('Error!');
					},
					data:"id_group="+id_group,
					url:"<?php echo base_url();?>backend/user/delete_group",
					dataType:"json",
					beforeSend: function(){
					$("#loading").show();
					},
					success: function(data){
						if(data.error=='1'){
							alert(data.message);
							$("#loading").hide();
						}else{
							group.ajax.reload();
							$(".close").click();
							$("#loading").hide();
						}
					}
				});
			}
		});

		$(document).on("click","#close",function(){
            $(".lm").trigger('click');
		});
		$(document).on("click",".close",function(){
            $(".lm").trigger('click');
		});

	    $(document).on("click","#add_pengguna",function(){
            $('#modalPengguna').modal('show');
            $("#title_pengguna").text('Tambah Group');
            $("#group_name").val('');
            $("#id_group").val('');
            $(".lm").trigger('click');
            $("#frm").trigger('reset');
	    });


	    $(document).on("click","#edit_pengguna",function(){
	    	
            $("#frm").trigger('reset');
            $(".lm").trigger('click');
            var id_group = $.trim($(this).attr("id_group"));
            var group_name = $.trim($(this).attr("group_name"));
            var role = $.trim($(this).attr("role"));
            var s = role.split(",");
            s.forEach( function(e, index) {
            	// statements
            	$("#"+e).prop("checked",true);
            });

            $("#id_group").val(id_group);
            $("#group_name").val(group_name);
            

            $('#modalPengguna').modal('show');
            $("#title_pengguna").text('Edit Group');

	    });

	    $(document).on("click","#simpan",function(){

	    	var form = $("#frm").serialize();
			var judul = $.trim($("#title_pengguna").text());
			if (judul ==  "Tambah Group") {
				$.ajax({
					type:"POST",
					error: function(){
						alert('Error!');
					},
					data:form,
					url:"<?php echo base_url();?>backend/user/insert_group",
					dataType:"json",
					beforeSend: function(){
					$("#loading").show();
					},
					success: function(data){
						if(data.error=='1'){
							alert(data.message);
							$("#loading").hide();
						}else{
							group.ajax.reload();
							$(".close").click();
							$("#loading").hide();
						}
					}
				});
			}

			else if (judul ==  "Edit Group") {
				$.ajax({
					type:"POST",
					error: function(){
						alert('Error!');
					},
					data:form,
					url:"<?php echo base_url();?>backend/user/update_group",
					dataType:"json",
					beforeSend: function(){
					$("#loading").show();
					},
					success: function(data){
						if(data.error=='1'){
							alert(data.message);
							$("#loading").hide();
						}else{
							group.ajax.reload();
							$(".close").click();
							$("#loading").hide();
              window.location = window.location.href;
						}
					}
				});
			}
	    });

	});
</script>



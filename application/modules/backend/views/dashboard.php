
				
				<!-- Row -->
				<div class="row">
					<div class="col-lg-3 col-md-4 col-sm-5 col-xs-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">Conversion Rate</h6>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="sm-graph-box">
										<div class="row">
											<div class="col-xs-6">
												<div id="sparkline_1"></div>
											</div>
											<div class="col-xs-6">
												<div class="counter-wrap text-right">
													<span class="counter-cap"><i class="fa  fa-level-up txt-success"></i></span><span class="counter">23</span><span>%</span>
												</div>	
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
							<div class="panel panel-default card-view">
								<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title txt-dark">Total Visits</h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="sm-graph-box">
											<div class="row">
												<div class="col-xs-6">
													<div id="sparkline_2"></div>
												</div>
												<div class="col-xs-6">
													<div class="counter-wrap text-right">
														<span class="counter-cap"><i class="fa  fa-level-up txt-success"></i></span><span class="counter">12</span><span>m</span>
													</div>	
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="panel panel-default card-view">
								<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title txt-dark">downloads</h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="sm-graph-box">
											<div class="row">
												<div class="col-xs-6">
													<div id="sparkline_6"></div>
												</div>
												<div class="col-xs-6">
													<div class="counter-wrap text-right">
														<span class="counter-cap"><i class="fa  fa-level-down txt-danger"></i></span><span class="counter">1122</span>
													</div>	
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						
					</div>
					<div class="col-lg-9 col-md-8 col-sm-7 col-xs-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark"><i class="icon-share mr-10"></i>Visits Conversion</h6>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
                                <div class="panel-body">
									<canvas id="chart_1" height="417"></canvas>	
								</div>
                            </div>
                        </div>
					</div>
				</div>
				<!-- /Row -->
				
				<div class="row">
					<div class="col-lg-3 col-md-6">
						<div class="panel panel-primary card-view">
							<div class="panel-heading mb-20">
								<div class="pull-left">
									<h6 class="panel-title txt-light">top countries</h6>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="table-wrap">
										<div class="table-responsive">
											<table  class="table  top-countries" >
												<tbody>
													<tr>
														<td>
															<img src="dist/img/country/gb.svg" alt="user_img">	
														</td>
														<td>
															United Kingdom
														</td>
														<td>
															$50
														</td>
													</tr>
													<tr>
														<td>
															<img src="dist/img/country/my.svg" alt="user_img">	
														</td>
														<td>
															Malaysia
														</td>
														<td>
															$20
														</td>
													</tr>
													<tr>
														<td>
															<img src="dist/img/country/au.svg" alt="user_img">
														</td>
														<td>
															Australia
														</td>
														<td>
															$5
														</td>
													</tr>
													
													<tr>
														<td>
															<img src="dist/img/country/us.svg" alt="user_img">
														</td>
														<td>
															United States
														</td>
														<td>
															$5
														</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark"><i class="icon-pie-chart mr-10"></i>Impressions</h6>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<canvas id="chart_6" height="280"></canvas>
								</div>
							</div>
						</div>	
					</div>
					<div class="col-lg-6 col-md-12">
                        <div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark"><i class="icon-clock mr-10"></i>Average Position</h6>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div id="morris_extra_line_chart" class="morris-chart" style="height:280px;"></div>
								</div>
							</div>
						</div>
					</div>
					
				</div>
				
				<!-- Row -->
				<div class="row">
					<div class="col-lg-3 col-md-4 col-sm-5 col-xs-12">
						<div class="panel panel-default card-view pa-0">
							<div class="panel-wrapper collapse in">
								<div class="panel-body pa-0">
									<div class="sm-data-box bg-green">
										<div class="row ma-0">
											<div class="col-xs-5 text-center pa-0 icon-wrap-left">
												<i class="icon-diamond txt-light"></i>
											</div>
											<div class="col-xs-7 text-center data-wrap-right">
												<h6 class="txt-light">monthly sales</h6>
												<span class="txt-light counter counter-anim">45678</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div id="weather_3" class="panel panel-default card-view pa-0 weather-info">
							<div class="panel-wrapper collapse in">
								<div class="panel-body pa-0">
									<div class="row ma-0">
										<div class="col-xs-6 pa-0">
											<div class="left-block-wrap pa-30">
												<p class="block nowday"></p>
												<span class="block nowdate"></span>
												<div class="left-block  mt-15"></div>
											</div>
										</div>
										<div class="col-xs-6 pa-0">
											<div class="right-block-wrap pa-30">
												<div class="right-block"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<div class="col-lg-9 col-md-8 col-sm-7 col-xs-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">statement table</h6>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="table-wrap">
										<div class="table-responsive">
											<table class="table display product-overview" id="statement">
												<thead>
													<tr>
														<th>date</th>
														<th>Order ID</th>
														<th>type</th>
														<th>Details</th>
														<th>price</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>10-7-2016</td>
														<td>#85457898</td>
														<td>
															<span class="label label-primary font-weight-100">fee</span>
														</td>
														<td>
															Author Fee for included support sale IVIP13444036
														</td>
														<td>$20</td>
													</tr>
													<tr>
														<td>10-7-2016</td>
														<td>#85457897</td>
														<td>
															<span class="label label-danger font-weight-100">refund</span>
														</td>
														<td>
															Author Fee for included support sale IVIP13444036
														</td>
														<td>$20</td>
													</tr>
													<tr>
														<td>10-7-2016</td>
														<td>#85457896</td>
														<td>
															<span class="label label-primary font-weight-100">fee</span>
														</td>
														<td>
															Author Fee for included support sale IVIP13444036
														</td>
														<td>$20</td>
													</tr>
													<tr>
														<td>10-7-2016</td>
														<td>#85457895</td>
														<td>
															<span class="label label-info font-weight-100">support</span>
														</td>
														<td>
															Author Fee for included support sale IVIP13444036
														</td>
														<td>$20</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>	
								</div>	
							</div>
						</div>
					</div>
				</div>	
				<!-- Row -->
			</div>
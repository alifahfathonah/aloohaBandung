							<ol class="breadcrumb">

								<li class=""><a href="index.html">Home</a></li>
								<li class="active"><a href="index.html">Dashboard</a></li>

							</ol>
							<div class="page-heading">
								<h1>Dashboard</h1>
								<div class="options">
									<div class="btn-toolbar">
										<a href="#" class="btn btn-default"><i class="fa fa-fw fa-wrench"></i></a>
									</div>
								</div>
							</div>
							<div class="container-fluid">


								<div data-widget-group="group1">

									<div class="row">
										<div class="col-md-3">
											<div class="amazo-tile tile-success">
												<div class="tile-heading">
													<div class="title">Revenue</div>
													<div class="secondary">past 28 days</div>
												</div>
												<div class="tile-body">
													<div class="content">$75,800</div>
												</div>
												<div class="tile-footer">
													<span class="info-text text-right">13.4% <i class="fa fa-level-up"></i></span>
													<div id="sparkline-revenue" class="sparkline-line"></div>
												</div>
											</div>
										</div>
										<div class="col-md-3">
											<div class="amazo-tile tile-info" href="#">
												<div class="tile-heading">
													<div class="title">Goals</div>
													<div class="secondary">orders this month</div>
												</div>
												<div class="tile-body">
													<div class="content">3,690</div>
												</div>
												<div class="tile-footer">
													<span class="info-text text-right">82% of 4,500</span>
													<div class="progress">
														<div class="progress-bar" style="width: 82%"></div>
													</div>
												</div>
											</div>
										</div>

										<div class="col-md-3">
											<div class="amazo-tile tile-white">
												<div class="tile-heading">
													<div class="title">Items</div>
													<div class="secondary">past 28 days</div>
												</div>
												<div class="tile-body">
													<span class="content">407</span>
												</div>
												<div class="tile-footer text-center">
													<span class="info-text text-right" style="color: #f04743">13.4% <i class="fa fa-level-down"></i></span>
													<div id="sparkline-item" class="sparkline-bar"></div>
												</div>
											</div>
										</div>



										<div class="col-md-3">
											<div class="amazo-tile tile-white">
												<div class="tile-heading">
													<span class="title">Commision</span>
													<span class="secondary">past 28 days</span>
												</div>
												<div class="tile-body">
													<span class="content">$9,500</span>
												</div>
												<div class="tile-footer">
													<span class="info-text text-right" style="color: #94c355">9.2% <i class="fa fa-level-up"></i></span>
													<div id="sparkline-commission" class="sparkline"></div>
												</div>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-12">
											<div class="panel panel-default demo-dashboard-graph" data-widget=''>
												<div class="panel-heading">
													<div class="panel-ctrls button-icon-bg" data-actions-container="" data-action-collapse='{"target": ".panel-body"}' data-action-expand='' data-action-colorpicker='' data-action-refresh='{"type": "circular"}' data-action-close=''>
													</div>
													<h2>
							<ul class="nav nav-tabs" id="chartist-tab">
								<li><a href="#tab-visitor" data-toggle="tab"><i class="fa fa-user visible-xs"></i><span class="hidden-xs">Visitor Stats</span></a></li>
								<li class="active"><a href="#tab-revenues" data-toggle="tab"><i class="fa fa-bar-chart-o visible-xs"></i><span class="hidden-xs">Revenues</span></a></li>
							</ul>
						</h2>
												</div>
												<div class="panel-editbox" data-widget-controls=""></div>
												<div class="panel-body">
													<div class="tab-content">
														<div class="clearfix mb-md">
															<button class="btn btn-default pull-left" id="daterangepicker2">
																<i class="fa fa-calendar visible-xs"></i>
																<span class="hidden-xs" style="text-transform: uppercase;"> - <b class="caret"></b>
								</button>

							    <div class="btn-toolbar pull-right">
							        <div class="btn-group">
							            <a href='#' class="btn btn-default dropdown-toggle" data-toggle='dropdown'><i class="fa fa-cloud-download visible-xs"></i><span class="hidden-xs">Export as </span> <span class="caret"></span></a>
																<ul class="dropdown-menu">
																	<li><a href="#">Text File (*.txt)</a></li>
																	<li><a href="#">Excel File (*.xlsx)</a></li>
																	<li><a href="#">PDF File (*.pdf)</a></li>
																</ul>
														</div>
													</div>
												</div>
												<div id="tab-visitor" class="tab-pane">
													<div class="demo-chartist" id="chart1"></div>
												</div>
												<div id="tab-revenues" class="tab-pane active">
													<div class="demo-chartist-sales" id="chart2"></div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-4">
									<div class="tile-sparkline">
										<div class="tile-sparkline-heading clearfix">
											<div class="pull-left">
												<h2 class="block">9,172</h2>
												<span class="tile-sparkline-subheading block">Page Views <span class="text-muted">This week</span></span class="block">
											</div>
											<div class="pull-right">
												<span class="label label-success">+121%</span>
											</div>
										</div>
										<div class="tile-sparkline-body">
											<div id="tiles-sparkline-stats-pageviews"></div>
											<div class="tabular">
												<div class="tabular-row">
													<div class="tabular-cell">
														<div class="week-day sun">S</div>
													</div>
													<div class="tabular-cell">
														<div class="week-day mon">M</div>
													</div>
													<div class="tabular-cell">
														<div class="week-day tue">T</div>
													</div>
													<div class="tabular-cell">
														<div class="week-day wed">W</div>
													</div>
													<div class="tabular-cell">
														<div class="week-day thu">T</div>
													</div>
													<div class="tabular-cell">
														<div class="week-day fri">F</div>
													</div>
													<div class="tabular-cell">
														<div class="week-day sat">S</div>
													</div>
												</div>
											</div>
										</div>
										<div class="tile-sparkline-footer">
											<a href="#">Go to analytics</a>
										</div>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="tile-sparkline">
										<div class="tile-sparkline-heading clearfix">
											<div class="pull-left">
												<h2 class="block">$19,501</h2>
												<span class="tile-sparkline-subheading block">Total Sales <span class="text-muted">This week</span></span class="block">
											</div>
											<div class="pull-right">
												<span class="label label-danger">-37%</span>
											</div>
										</div>
										<div class="tile-sparkline-body">
											<div id="tiles-sparkline-stats-totalsales"></div>
											<div class="tabular">
												<div class="tabular-row">
													<div class="tabular-cell">
														<div class="week-day sun">S</div>
													</div>
													<div class="tabular-cell">
														<div class="week-day mon">M</div>
													</div>
													<div class="tabular-cell">
														<div class="week-day tue">T</div>
													</div>
													<div class="tabular-cell">
														<div class="week-day wed">W</div>
													</div>
													<div class="tabular-cell">
														<div class="week-day thu">T</div>
													</div>
													<div class="tabular-cell">
														<div class="week-day fri">F</div>
													</div>
													<div class="tabular-cell">
														<div class="week-day sat">S</div>
													</div>
												</div>
											</div>
										</div>
										<div class="tile-sparkline-footer">
											<a href="#">Go to accounts</a>
										</div>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="widget-weather">
										<div class="weather-heading">
											<div class="weather-heading-top">
												<h4 class="pull-left m-n">Cloudy</h4>
												<a class="weather-settings pull-right" style="line-height:25px; height: 25px; width: 25px;"><i class="fa fa-wrench"></i></a>
											</div>
											<!-- weather-heading-top -->
											<div class="weather-heading-bottom">
												<div class="weather-symbol pull-left"><i class="fa fa-cloud"></i></div>
												<div class="pull-right">
													<h1 class="weather-result">41°
									<span class="weather-details">
										<h4>Today</h4>
										<p>Cloudy</p>
										<p class="degree-range">42°-34°</p>
									</span><!-- weather-details -->
								</h1>
													<!-- weather-result -->
												</div>
											</div>
											<!-- weather-heading-bottom -->
										</div>
										<!-- weather-heading -->
										<div class="weather-body">
											<div class="col-sm-6">
												<div class="input-group location-search">
													<span class="input-group-btn">
						        <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
						      </span>
													<input type="text" class="form-control" placeholder="Location">
												</div>
												<!-- /input-group -->
											</div>
											<!-- /.col-lg-6 -->
											<div class="location-name pull-right">
												<p><span>London,</span>
													<br>United Kindom</p>
											</div>
										</div>
										<!-- weather-body -->
										<div class="weather-footer">
											<div class="day-list">
												<ul>
													<li>
														<p><i class="fa fa-sun-o"></i></p>
														<p>Sat</p>
													</li>
													<li>
														<p><i class="fa fa-cloud"></i></p>
														<p>Sun</p>
													</li>
													<li>
														<p><i class="fa fa-bolt"></i></p>
														<p>Mon</p>
													</li>
													<li>
														<p><i class="fa fa-bolt"></i></p>
														<p>Tue</p>
													</li>
													<li>
														<p><i class="fa fa-cloud"></i></p>
														<p>Wed</p>
													</li>
													<li>
														<p><i class="fa fa-sun-o"></i></p>
														<p>Thu</p>
													</li>
												</ul>
											</div>
										</div>
										<!-- weather-footer -->
									</div>
									<!-- widget-weather -->
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="panel panel-default" data-widget=''>
										<div class="panel-heading">
											<h2>Todo List</h2>
											<div class="panel-ctrls button-icon-bg" data-actions-container="" data-action-collapse='{"target": ".panel-body"}' data-action-expand='' data-action-colorpicker='' data-action-edit='' data-action-close=''>
											</div>
										</div>
										<div class="panel-editbox" data-widget-controls=""></div>
										<div class="panel-body panel-no-padding panel-todo">
											<ul class="connectedSortable" id="sortable-todo">
												<li class="">
													<span class="drag-todo"> 
	                                <div class="checkbox-inline icheck"><input type="checkbox"></div>
	                            </span>
													<p class="todo-description">
														Send project demo files to client
													</p>

												</li>
												<li class="">
													<span class="drag-todo"> 
	                                <div class="checkbox-inline icheck"><input type="checkbox"></div>
	                            </span>
													<p class="todo-description">
														Sketch wireframes for new project and send it to client as soon as possible
													</p>

												</li>
												<li class="">
													<span class="drag-todo"> 
	                                <div class="checkbox-inline icheck"><input type="checkbox"></div>
	                            </span>
													<p class="todo-description">
														Buy some milk
													</p>

												</li>
												<li class="">
													<span class="drag-todo"> 
	                                <div class="checkbox-inline icheck"><input type="checkbox"></div>
	                            </span>
													<p class="todo-description">
														Prepare documentation for completed project
													</p>

												</li>
												<li class="">
													<span class="drag-todo"> 
	                                <div class="checkbox-inline icheck"><input type="checkbox"></div>
	                            </span>
													<p class="todo-description">
														Buy some drinks
													</p>

												</li>
												<li class="">
													<span class="drag-todo"> 
	                                <div class="checkbox-inline icheck"><input type="checkbox"></div>
	                            </span>
													<p class="todo-description">
														Prepare presentation slides
													</p>

												</li>
												<li class="">
													<span class="drag-todo"> 
	                                <div class="checkbox-inline icheck"><input type="checkbox"></div>
	                            </span>
													<p class="todo-description">
														Meeting with the development team
													</p>

												</li>

											</ul>
											<span class="todo-header"></span>
											<ul class="todo-completed connectedSortable" id="completed-todo">

												<li class="">
													<span class="drag-todo"> 
	                                <div class="checkbox-inline icheck"><input type="checkbox" checked></div>
	                                <span class="drag-image"></span>
													</span>
													<p class="todo-description">
														Assign todo to designers
													</p>

												</li>
												<li class="">
													<span class="drag-todo"> 
	                                <div class="checkbox-inline icheck"><input type="checkbox" checked></div>
	                                <span class="drag-image"></span>
													</span>
													<p class="todo-description">
														Backend bug fixes
													</p>

												</li>
												<li class="">
													<span class="drag-todo"> 
	                                <div class="checkbox-inline icheck"><input type="checkbox" checked></div>
	                                <span class="drag-image"></span>
													</span>
													<p class="todo-description">
														Set up a meeting with new client
													</p>

												</li>

											</ul>
											<div class="todo-footer clearfix">
												<a href="#" class="btn btn-sm btn-success"><i class="visible-xs fa fa-plus"></i> <span class="hidden-xs">New</span></a>
												<a href="#" class="btn btn-sm btn-default"><i class="visible-xs fa fa-check"></i> <span class="hidden-xs">Mark All Done</span></a>
												<a href="app-todo.html" class="btn-link btn-sm pull-right" style="padding-right: 0">Go to todo page</a>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="panel panel-default" data-widget=''>
										<div class="panel-heading">
											<h2>Calendar</h2>
											<div class="panel-ctrls button-icon-bg" data-actions-container="" data-action-collapse='{"target": ".panel-body"}' data-action-expand='' data-action-colorpicker='' data-action-edit='' data-action-close=''>
												<a href="#" class="button-icon custom-icon has-bg"><i class="fa fa-cog"></i></a>
											</div>
										</div>
										<div class="panel-editbox" data-widget-controls=""></div>
										<div class="panel-body">
											<div id="calendar-drag"></div>
										</div>
									</div>
								</div>
							</div>

						</div>


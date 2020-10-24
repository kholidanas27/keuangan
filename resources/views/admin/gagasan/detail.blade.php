@extends('layouts.app')

@section('breadcrumb')
<div class="breadcrumb">
	<h1 class="mr-2">Detail Tenant</h1>
</div>
<div class="separator-breadcrumb border-top"></div>
@endsection
@section('content')
<section class="ul-contact-detail">
	<div class="row">
		<div class="col-lg-4 col-xl-4">
			<div class="card o-hidden"><img class="d-block w-100" src="{{ asset('theme/images/products/iphone-1.jpg')}}" alt="First slide" />
				<div class="card-body">
					<div class="ul-contact-detail__info">
						<div class="row">
							<div class="col-6 text-center">
								<div class="ul-contact-detail__info-1">
									<h5>Name</h5><span>Genelia Deshmukh</span>
								</div>
								<div class="ul-contact-detail__info-1">
									<h5>Name</h5><span>Genelia Deshmukh</span>
								</div>
							</div>
							<div class="col-6 text-center">
								<div class="ul-contact-detail__info-1">
									<h5>Name</h5><span>Genelia Deshmukh</span>
								</div>
								<div class="ul-contact-detail__info-1">
									<h5>Name</h5><span>Genelia Deshmukh</span>
								</div>
							</div>
							<div class="col-12 text-center">
								<div class="ul-contact-detail__info-1">
									<h5>Address</h5><span>DieSachbearbeiter Choriner Straße 49 10435 Berlin</span>
								</div>
							</div>
							<div class="col-12 text-center">
								<div class="ul-contact-detail__social">
									<div class="ul-contact-detail__social-1">
										<button class="btn btn-facebook btn-icon m-1" type="button"><span class="ul-btn__icon"><i class="i-Facebook-2"></i></span></button><span class="t-font-boldest ul-contact-detail__followers">400</span>
									</div>
									<div class="ul-contact-detail__social-1">
										<button class="btn btn-twitter btn-icon m-1" type="button"><span class="ul-btn__icon"><i class="i-Twitter"></i></span></button><span class="t-font-boldest ul-contact-detail__followers">900</span>
									</div>
									<div class="ul-contact-detail__social-1">
										<button class="btn btn-dribble btn-icon m-1" type="button"><span class="ul-btn__icon"><i class="i-Dribble"></i></span></button><span class="t-font-boldest ul-contact-detail__followers">658</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-8 col-xl-8">
			<!--  begin::basic-tab -->
			<div class="card mb-4">
				<div class="card-header bg-transparent">Basic Tabs</div>
				<div class="card-body">
					<nav>
						<div class="nav nav-tabs" id="nav-tab" role="tablist"><a class="nav-item nav-link active show" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Home</a><a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</a><a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Edit Contact</a></div>
					</nav>
					<div class="tab-content ul-tab__content" id="nav-tabContent">
						<div class="tab-pane fade active show" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
							<div class="ul-contact-detail__timeline">
								<div class="row">
									<div class="col-lg-12 col-xl-12">
										<div class="ul-contact-detail__timeline-row">
											<div class="row">
												<div class="col-lg-1">
													<div class="ul-contact-detail__left-timeline">
														<div class="ul-widget3-img"><img class="img-fluid" id="userDropdown" src="{{ asset('theme/images/faces/1.jpg')}}" alt="alt" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" /></div>
													</div>
												</div>
												<div class="col-lg-11">
													<div class="ul-contact-detail__right-timeline"><a class="ul-widget4__title d-block" href="href">Timity Clarkson</a><small class="text-mute">10 minutes</small>
														<p>assign a new task <a href="#">Weblayout</a></p>
														<div class="ul-contact-detail__timeline-image"><img class="d-block" src="{{ asset('theme/images/products/iphone-1.jpg')}}" alt="First slide" /><img class="d-block" src="{{ asset('theme/images/products/iphone-1.jpg')}}" alt="First slide" /><img class="d-block" src="{{ asset('theme/images/products/iphone-1.jpg')}}" alt="First slide" /></div>
													</div>
												</div>
											</div>
										</div>
										<div class="ul-contact-detail__timeline-row">
											<div class="row">
												<div class="col-lg-1">
													<div class="ul-contact-detail__left-timeline">
														<div class="ul-widget3-img"><img id="userDropdown" src="{{ asset('theme/images/faces/1.jpg')}}" alt="alt" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" /></div>
													</div>
												</div>
												<div class="col-lg-11">
													<div class="ul-contact-detail__right-timeline"><a class="ul-widget4__title d-block" href="href">Timity Clarkson</a><small class="text-mute">10 minutes</small>
														<div class="ul-contact-detail__timeline-image-2 mt-3"><img class="d-block" src="{{ asset('theme/images/products/iphone-1.jpg')}}" alt="First slide" />
															<div class="ul-contact-detail__timeline-image-info">
																<p style="width:80%">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta.</p>
																<button class="btn btn-primary btn-lg m-1" type="button">Weblayout</button>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="ul-contact-detail__timeline-row">
											<div class="row">
												<div class="col-lg-1">
													<div class="ul-contact-detail__left-timeline">
														<div class="ul-widget3-img"><img id="userDropdown" src="{{ asset('theme/images/faces/1.jpg')}}" alt="alt" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" /></div>
													</div>
												</div>
												<div class="col-lg-8">
													<div class="ul-contact-detail__right-timeline"><a class="ul-widget4__title d-block" href="href">Timity Clarkson</a><small class="text-mute">10 minutes</small>
														<p class="mt-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper</p>
													</div>
												</div>
											</div>
										</div>
										<div class="ul-contact-detail__timeline-row">
											<div class="row">
												<div class="col-lg-1">
													<div class="ul-contact-detail__left-timeline">
														<div class="ul-widget3-img"><img id="userDropdown" src="{{ asset('theme/images/faces/1.jpg')}}" alt="alt" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" /></div>
													</div>
												</div>
												<div class="col-lg-11">
													<div class="ul-contact-detail__right-timeline"><a class="ul-widget4__title d-block" href="href">Timity Clarkson</a><small class="text-mute">10 minutes</small>
														<p>assign a new task <a href="#">Weblayout</a></p>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
							<div class="row">
								<div class="col-lg-12 col-xl-12">
									<div class="ul-contact-detail__profile">
										<div class="ul-contact-detail__inner-profile">
											<h4 class="heading">Full Name</h4><span class="tetx-muted">Timity Clarkson</span>
										</div>
										<div class="ul-contact-detail__inner-profile">
											<h4 class="heading">Full Name</h4><span class="tetx-muted">Timity Clarkson</span>
										</div>
										<div class="ul-contact-detail__inner-profile">
											<h4 class="heading">Full Name</h4><span class="tetx-muted">Timity Clarkson</span>
										</div>
										<div class="ul-contact-detail__inner-profile">
											<h4 class="heading">Full Name</h4><span class="tetx-muted">Timity Clarkson</span>
										</div>
									</div>
									<div class="custom-separator"></div>
								</div>
								<div class="col-lg-12 col-xl-12">
									<div class="ul-contact-dwtail__profile-swcription">
										<p class="mt-3">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries</p>
										<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries</p>
										<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries</p>
									</div>
								</div>
								<div class="col-lg-12 col-xl-12">
									<h4 class="card-title mb-3">Skills</h4>
									<div class="custom-separator"></div><span>Wordpress</span>
									<div class="progress mb-3 mt-2">
										<div class="progress-bar bg-primary" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">10%</div>
									</div><span>HTML 5</span>
									<div class="progress mb-3 mt-2">
										<div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
									</div><span>React.js</span>
									<div class="progress mb-3 mt-2">
										<div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
									</div><span>Photoshop</span>
									<div class="progress mb-3 mt-2">
										<div class="progress-bar bg-warning" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">75%</div>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
							<form>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label" for="inputEmail3">Email</label>
									<div class="col-sm-10">
										<input class="form-control" id="inputEmail3" type="email" placeholder="Email" />
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label" for="inputPassword3">Password</label>
									<div class="col-sm-10">
										<input class="form-control" id="inputPassword3" type="password" placeholder="Password" />
									</div>
								</div>
								<fieldset class="form-group">
									<div class="row">
										<div class="col-form-label col-sm-2 pt-0">Radios</div>
										<div class="col-sm-10">
											<div class="form-check">
												<input class="form-check-input" id="gridRadios1" type="radio" name="gridRadios" value="option1" checked="checked" />
												<label class="form-check-label ml-3" for="gridRadios1">
													First radio

												</label>
											</div>
											<div class="form-check">
												<input class="form-check-input" id="gridRadios2" type="radio" name="gridRadios" value="option2" />
												<label class="form-check-label ml-3" for="gridRadios2">
													Second radio

												</label>
											</div>
											<div class="form-check disabled">
												<input class="form-check-input" id="gridRadios3" type="radio" name="gridRadios" value="option3" disabled="disabled" />
												<label class="form-check-label ml-3" for="gridRadios3">
													Third disabled radio

												</label>
											</div>
										</div>
									</div>
								</fieldset>
								<div class="form-group row">
									<div class="col-sm-2">Checkbox</div>
									<div class="col-sm-10">
										<div class="form-check">
											<input class="form-check-input" id="gridCheck1" type="checkbox" />
											<label class="form-check-label ml-3" for="gridCheck1">
												Example checkbox

											</label>
										</div>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-sm-10">
										<button class="btn btn-primary" type="submit">Sign in</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!--  end::basic-tab -->
		</div>
	</div>
</section>
@endsection
@extends('layouts.app')
@section('breadcrumb')
<div class="breadcrumb">
	<h1 class="mr-2">Inkubator</h1>
</div>
<div class="separator-breadcrumb border-top"></div>
@endsection
@section('content')
<section class="ul-contact-page">
<div class="row">
	<div class="col-lg-12 col-md-12 mb-4">
		<div class="card">
			<div class="card-body">
			<a href="{{route('admin.inkubator.view','grid')}}">Grid</a>
			<a href="{{route('admin.inkubator.view','list')}}">List</a>
			<button class="btn btn-primary btn-md m-1" type="button" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="i-Add-User text-white mr-2"></i> Add Contact</button>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-4 col-xl-4 mb-3">
		<div class="card">
			<div class="card-body">
				<div class="ul-contact-page__profile">
					<div class="user-profile"><img class="profile-picture mb-2" src="{{ asset('theme/images/faces/1.jpg')}}" alt="alt" /></div>
					<div class="ul-contact-page__info">
						<p class="m-0 text-24">Timothy Carlson</p>
						<p class="text-muted m-0">Digital Marketer</p>
						<p class="text-muted mt-3">DieSachbearbeiter Choriner Straße 49 10435 Berlin</p>
						<p class="text-muted mt-3">NO: 234-987-665-340</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-4 col-xl-4 mb-3">
		<div class="card">
			<div class="card-body">
				<div class="ul-contact-page__profile">
					<div class="user-profile"><img class="profile-picture mb-2" src="{{ asset('theme/images/faces/2.jpg')}}" alt="alt" /></div>
					<div class="ul-contact-page__info">
						<p class="m-0 text-24">Jaret Leto</p>
						<p class="text-muted m-0">Web Developer</p>
						<p class="text-muted mt-3">DieSachbearbeiter Choriner Straße 49 10435 Berlin</p>
						<p class="text-muted mt-3">NO: 234-987-665-340</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-4 col-xl-4 mb-3">
		<div class="card">
			<div class="card-body">
				<div class="ul-contact-page__profile">
					<div class="user-profile"><img class="profile-picture mb-2" src="{{ asset('theme/images/faces/3.jpg')}}" alt="alt" /></div>
					<div class="ul-contact-page__info">
						<p class="m-0 text-24">Timothy Carlson</p>
						<p class="text-muted m-0">Digital Marketer</p>
						<p class="text-muted mt-3">DieSachbearbeiter Choriner Straße 49 10435 Berlin</p>
						<p class="text-muted mt-3">NO: 234-987-665-340</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-4 col-xl-4 mb-3">
		<div class="card">
			<div class="card-body">
				<div class="ul-contact-page__profile">
					<div class="user-profile"><img class="profile-picture mb-2" src="{{ asset('theme/images/faces/4.jpg')}}" alt="alt" /></div>
					<div class="ul-contact-page__info">
						<p class="m-0 text-24">Timothy Carlson</p>
						<p class="text-muted m-0">Digital Marketer</p>
						<p class="text-muted mt-3">DieSachbearbeiter Choriner Straße 49 10435 Berlin</p>
						<p class="text-muted mt-3">NO: 234-987-665-340</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-4 col-xl-4 mb-3">
		<div class="card">
			<div class="card-body">
				<div class="ul-contact-page__profile">
					<div class="user-profile"><img class="profile-picture mb-2" src="{{ asset('theme/images/faces/5.jpg')}}" alt="alt" /></div>
					<div class="ul-contact-page__info">
						<p class="m-0 text-24">Timothy Carlson</p>
						<p class="text-muted m-0">Digital Marketer</p>
						<p class="text-muted mt-3">DieSachbearbeiter Choriner Straße 49 10435 Berlin</p>
						<p class="text-muted mt-3">NO: 234-987-665-340</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-4 col-xl-4 mb-3">
		<div class="card">
			<div class="card-body">
				<div class="ul-contact-page__profile">
					<div class="user-profile"><img class="profile-picture mb-2" src="{{ asset('theme/images/faces/1.jpg')}}" alt="alt" /></div>
					<div class="ul-contact-page__info">
						<p class="m-0 text-24">Timothy Carlson</p>
						<p class="text-muted m-0">Digital Marketer</p>
						<p class="text-muted mt-3">DieSachbearbeiter Choriner Straße 49 10435 Berlin</p>
						<p class="text-muted mt-3">NO: 234-987-665-340</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-4 col-xl-4 mb-3">
		<div class="card">
			<div class="card-body">
				<div class="ul-contact-page__profile">
					<div class="user-profile"><img class="profile-picture mb-2" src="{{ asset('theme/images/faces/2.jpg')}}" alt="alt" /></div>
					<div class="ul-contact-page__info">
						<p class="m-0 text-24">Jaret Leto</p>
						<p class="text-muted m-0">Web Developer</p>
						<p class="text-muted mt-3">DieSachbearbeiter Choriner Straße 49 10435 Berlin</p>
						<p class="text-muted mt-3">NO: 234-987-665-340</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-4 col-xl-4 mb-3">
		<div class="card">
			<div class="card-body">
				<div class="ul-contact-page__profile">
					<div class="user-profile"><img class="profile-picture mb-2" src="{{ asset('theme/images/faces/3.jpg')}}" alt="alt" /></div>
					<div class="ul-contact-page__info">
						<p class="m-0 text-24">Timothy Carlson</p>
						<p class="text-muted m-0">Digital Marketer</p>
						<p class="text-muted mt-3">DieSachbearbeiter Choriner Straße 49 10435 Berlin</p>
						<p class="text-muted mt-3">NO: 234-987-665-340</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-4 col-xl-4 mb-3">
		<div class="card">
			<div class="card-body">
				<div class="ul-contact-page__profile">
					<div class="user-profile"><img class="profile-picture mb-2" src="{{ asset('theme/images/faces/4.jpg')}}" alt="alt" /></div>
					<div class="ul-contact-page__info">
						<p class="m-0 text-24">Timothy Carlson</p>
						<p class="text-muted m-0">Digital Marketer</p>
						<p class="text-muted mt-3">DieSachbearbeiter Choriner Straße 49 10435 Berlin</p>
						<p class="text-muted mt-3">NO: 234-987-665-340</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-4 col-xl-4 mb-3">
		<div class="card">
			<div class="card-body">
				<div class="ul-contact-page__profile">
					<div class="user-profile"><img class="profile-picture mb-2" src="{{ asset('theme/images/faces/5.jpg')}}" alt="alt" /></div>
					<div class="ul-contact-page__info">
						<p class="m-0 text-24">Timothy Carlson</p>
						<p class="text-muted m-0">Digital Marketer</p>
						<p class="text-muted mt-3">DieSachbearbeiter Choriner Straße 49 10435 Berlin</p>
						<p class="text-muted mt-3">NO: 234-987-665-340</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-4 col-xl-4 mb-3">
		<div class="card">
			<div class="card-body">
				<div class="ul-contact-page__profile">
					<div class="user-profile"><img class="profile-picture mb-2" src="{{ asset('theme/images/faces/1.jpg')}}" alt="alt" /></div>
					<div class="ul-contact-page__info">
						<p class="m-0 text-24">Timothy Carlson</p>
						<p class="text-muted m-0">Digital Marketer</p>
						<p class="text-muted mt-3">DieSachbearbeiter Choriner Straße 49 10435 Berlin</p>
						<p class="text-muted mt-3">NO: 234-987-665-340</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-4 col-xl-4 mb-3">
		<div class="card">
			<div class="card-body">
				<div class="ul-contact-page__profile">
					<div class="user-profile"><img class="profile-picture mb-2" src="{{ asset('theme/images/faces/2.jpg')}}" alt="alt" /></div>
					<div class="ul-contact-page__info">
						<p class="m-0 text-24">Jaret Leto</p>
						<p class="text-muted m-0">Web Developer</p>
						<p class="text-muted mt-3">DieSachbearbeiter Choriner Straße 49 10435 Berlin</p>
						<p class="text-muted mt-3">NO: 234-987-665-340</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-4 col-xl-4 mb-3">
		<div class="card">
			<div class="card-body">
				<div class="ul-contact-page__profile">
					<div class="user-profile"><img class="profile-picture mb-2" src="{{ asset('theme/images/faces/3.jpg')}}" alt="alt" /></div>
					<div class="ul-contact-page__info">
						<p class="m-0 text-24">Timothy Carlson</p>
						<p class="text-muted m-0">Digital Marketer</p>
						<p class="text-muted mt-3">DieSachbearbeiter Choriner Straße 49 10435 Berlin</p>
						<p class="text-muted mt-3">NO: 234-987-665-340</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-4 col-xl-4 mb-3">
		<div class="card">
			<div class="card-body">
				<div class="ul-contact-page__profile">
					<div class="user-profile"><img class="profile-picture mb-2" src="{{ asset('theme/images/faces/4.jpg')}}" alt="alt" /></div>
					<div class="ul-contact-page__info">
						<p class="m-0 text-24">Timothy Carlson</p>
						<p class="text-muted m-0">Digital Marketer</p>
						<p class="text-muted mt-3">DieSachbearbeiter Choriner Straße 49 10435 Berlin</p>
						<p class="text-muted mt-3">NO: 234-987-665-340</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-4 col-xl-4 mb-3">
		<div class="card">
			<div class="card-body">
				<div class="ul-contact-page__profile">
					<div class="user-profile"><img class="profile-picture mb-2" src="{{ asset('theme/images/faces/5.jpg')}}" alt="alt" /></div>
					<div class="ul-contact-page__info">
						<p class="m-0 text-24">Timothy Carlson</p>
						<p class="text-muted m-0">Digital Marketer</p>
						<p class="text-muted mt-3">DieSachbearbeiter Choriner Straße 49 10435 Berlin</p>
						<p class="text-muted mt-3">NO: 234-987-665-340</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-4 col-xl-4 mb-3">
		<div class="card">
			<div class="card-body">
				<div class="ul-contact-page__profile">
					<div class="user-profile"><img class="profile-picture mb-2" src="{{ asset('theme/images/faces/1.jpg')}}" alt="alt" /></div>
					<div class="ul-contact-page__info">
						<p class="m-0 text-24">Timothy Carlson</p>
						<p class="text-muted m-0">Digital Marketer</p>
						<p class="text-muted mt-3">DieSachbearbeiter Choriner Straße 49 10435 Berlin</p>
						<p class="text-muted mt-3">NO: 234-987-665-340</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-4 col-xl-4 mb-3">
		<div class="card">
			<div class="card-body">
				<div class="ul-contact-page__profile">
					<div class="user-profile"><img class="profile-picture mb-2" src="{{ asset('theme/images/faces/2.jpg')}}" alt="alt" /></div>
					<div class="ul-contact-page__info">
						<p class="m-0 text-24">Jaret Leto</p>
						<p class="text-muted m-0">Web Developer</p>
						<p class="text-muted mt-3">DieSachbearbeiter Choriner Straße 49 10435 Berlin</p>
						<p class="text-muted mt-3">NO: 234-987-665-340</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-4 col-xl-4 mb-3">
		<div class="card">
			<div class="card-body">
				<div class="ul-contact-page__profile">
					<div class="user-profile"><img class="profile-picture mb-2" src="{{ asset('theme/images/faces/3.jpg')}}" alt="alt" /></div>
					<div class="ul-contact-page__info">
						<p class="m-0 text-24">Timothy Carlson</p>
						<p class="text-muted m-0">Digital Marketer</p>
						<p class="text-muted mt-3">DieSachbearbeiter Choriner Straße 49 10435 Berlin</p>
						<p class="text-muted mt-3">NO: 234-987-665-340</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-4 col-xl-4 mb-3">
		<div class="card">
			<div class="card-body">
				<div class="ul-contact-page__profile">
					<div class="user-profile"><img class="profile-picture mb-2" src="{{ asset('theme/images/faces/4.jpg')}}" alt="alt" /></div>
					<div class="ul-contact-page__info">
						<p class="m-0 text-24">Timothy Carlson</p>
						<p class="text-muted m-0">Digital Marketer</p>
						<p class="text-muted mt-3">DieSachbearbeiter Choriner Straße 49 10435 Berlin</p>
						<p class="text-muted mt-3">NO: 234-987-665-340</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-4 col-xl-4 mb-3">
		<div class="card">
			<div class="card-body">
				<div class="ul-contact-page__profile">
					<div class="user-profile"><img class="profile-picture mb-2" src="{{ asset('theme/images/faces/5.jpg')}}" alt="alt" /></div>
					<div class="ul-contact-page__info">
						<p class="m-0 text-24">Timothy Carlson</p>
						<p class="text-muted m-0">Digital Marketer</p>
						<p class="text-muted mt-3">DieSachbearbeiter Choriner Straße 49 10435 Berlin</p>
						<p class="text-muted mt-3">NO: 234-987-665-340</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</section>
<!-- begin::modal-->
			<div class="ul-card-list__modal">
				<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-body">
								<form>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label" for="inputName">Name</label>
										<div class="col-sm-10">
											<input class="form-control" id="inputName" type="email" placeholder="Name" />
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label" for="inputEmail3">Email</label>
										<div class="col-sm-10">
											<input class="form-control" id="inputEmail3" type="email" placeholder="Email" />
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label" for="">Phone</label>
										<div class="col-sm-10">
											<input class="form-control" type="number" id="" placeholder="number...." />
										</div>
									</div>
									<fieldset class="form-group">
										<div class="row">
											<div class="col-form-label col-sm-2 pt-0">Radios</div>
											<div class="col-sm-10">
												<div class="form-check">
													<input class="form-check-input" id="gridRadios1" type="radio" name="gridRadios" value="option1" checked="" />
													<label class="form-check-label ml-3" for="gridRadios1">First radio</label>
												</div>
												<div class="form-check">
													<input class="form-check-input" id="gridRadios2" type="radio" name="gridRadios" value="option2" />
													<label class="form-check-label ml-3" for="gridRadios2">Second radio</label>
												</div>
												<div class="form-check disabled">
													<input class="form-check-input" id="gridRadios3" type="radio" name="gridRadios" value="option3" disabled="" />
													<label class="form-check-label ml-3" for="gridRadios3">Third disabled radio</label>
												</div>
											</div>
										</div>
									</fieldset>
									<div class="form-group row">
										<div class="col-sm-2">Checkbox</div>
										<div class="col-sm-10">
											<div class="form-check">
												<input class="form-check-input" id="gridCheck1" type="checkbox" />
												<label class="form-check-label ml-3" for="gridCheck1">Example checkbox</label>
											</div>
										</div>
									</div>
									<div class="form-group row">
										<div class="col-sm-10">
											<button class="btn btn-success" type="submit">Update</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- end::modal-->
@endsection
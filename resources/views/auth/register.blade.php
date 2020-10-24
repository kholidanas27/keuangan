@extends('layouts.front')

@section('content')
		<section class="login first grey">
			<div class="container">
				<div class="box-wrapper">				
					<div class="box box-border">
						<div class="box-body">
							<h4>Register</h4>
							<form method="POST" action="{{ route('register') }}">
								@csrf
								<div class="form-group">
									<label>Name</label>
									<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
								</div>
								<div class="form-group">
									<label>Email</label>
									 <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
								</div>
								<div class="form-group">
									<label>Password</label>
									 <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
								</div>
								<div class="form-group">
									<label class="fw">Confirm Password</label>
									 <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
								</div>
								<div class="form-group text-right">
									<button class="btn btn-primary btn-block" type="submit">Register</button>
								</div>
								<div class="form-group text-center">
									<span class="text-muted">Already have an account?</span> <a href="/login">Login</a>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
@endsection

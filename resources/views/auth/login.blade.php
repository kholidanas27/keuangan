@extends('layouts.front')

@section('content')
		<section class="login first grey">
			<div class="container">
				<div class="box-wrapper">				
					<div class="box box-border">
						<div class="box-body">
							<h4>Login</h4>
							<form method="POST" action="{{ route('login') }}">
                        @csrf
								<div class="form-group">
									<label>Username</label>
									<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
								</div>
								<div class="form-group">
									<label class="fw">Password
										<a href="forgot.html" class="pull-right">Forgot Password?</a>
									</label>
									 <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
								</div>
								<div class="form-group text-right">
									<button class="btn btn-primary btn-block" type="submit">Login</button>
								</div>
								<div class="form-group text-center">
									<span class="text-muted">Don't have an account?</span> <a href="/register">Create one</a>
								</div>
								<!--<div class="title-line">
									or
								</div>
              	<a href="#" class="btn btn-social btn-block facebook"><i class="ion-social-facebook"></i> Login with Facebook</a> -->
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>


@endsection

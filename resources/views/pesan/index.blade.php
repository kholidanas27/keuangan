@extends('layouts.app')
@section('content')
<div class="main-content">
	<!-- MAIN SIDEBAR CONTAINER-->
	<div class="inbox-main-sidebar-container" data-sidebar-container="main">
		<div class="inbox-main-content" data-sidebar-content="main">
			<!-- SECONDARY SIDEBAR CONTAINER-->
			<div class="inbox-secondary-sidebar-container box-shadow-1" data-sidebar-container="secondary">
				<div data-sidebar-content="secondary">
					<div class="inbox-secondary-sidebar-content position-relative" style="min-height: 500px">
						<div class="inbox-topbar box-shadow-1 perfect-scrollbar rtl-ps-none pl-3" data-suppress-scroll-y="true">
							<!-- <span class="d-sm-none">Test</span>--><a class="link-icon d-md-none" data-sidebar-toggle="main"><i class="icon-regular i-Arrow-Turn-Left"></i></a><a class="link-icon mr-3 d-md-none" data-sidebar-toggle="secondary"><i class="icon-regular mr-1 i-Left-3"></i> Inbox</a>
							<div class="d-flex"><a class="link-icon mr-3" href=""><i class="icon-regular i-Mail-Reply"></i> Reply</a><a class="link-icon mr-3" href=""><i class="icon-regular i-Mail-Reply-All"></i> Forward</a><a class="link-icon mr-3" href=""><i class="icon-regular i-Mail-Reply-All"></i> Delete</a></div>
						</div>
						<!-- EMAIL DETAILS-->
						<div class="inbox-details perfect-scrollbar rtl-ps-none" data-suppress-scroll-x="true">
							<div class="row no-gutters">
								<div class="mr-2" style="width: 36px"><img class="rounded-circle" src="{{ asset('theme/images/faces/1.jpg')}}" alt="" /></div>
								<div class="col-xs-12">
									<p class="m-0">Jhon Doe</p>
									<p class="text-12 text-muted">20 Dec, 2018</p>
								</div>
							</div>
							<h4 class="mb-3">Confirm your email</h4>
							<div>
								<p>Natus consequuntur perspiciatis esse beatae illo quos eaque.</p>
								<p>
									Earum, quisquam, fugit? Numquam dolor magni nisi? Suscipit odit, ipsam iusto enim culpa, temporibus vero possimus error voluptates sequi. Iusto ipsam, nihil? Eveniet modi maxime animi excepturi a dignissimos doloribus,
									inventore sed ratione, ducimus atque earum maiores tenetur officia commodi dicta tempora consequatur non nesciunt ipsam, consequuntur quia fuga aspernatur impedit et? Natus, earum.
								</p>
								<blockquote class="blockquote">Earum, quisquam, fugit? Numquam dolor magni nisi? Suscipit odit, ipsam iusto enim culpa, temporibus vero possimus error voluptates sequi.</blockquote>
								<p>
									Earum, quisquam, fugit? Numquam dolor magni nisi? Suscipit odit, ipsam iusto enim culpa, temporibus vero possimus error voluptates sequi. Iusto ipsam, nihil? Eveniet modi maxime animi excepturi a dignissimos doloribus,
									inventore sed ratione, ducimus atque earum maiores tenetur officia commodi dicta tempora consequatur non nesciunt ipsam, consequuntur quia fuga aspernatur impedit et? Natus, earum.
								</p><br /> Thanks<br /> Jhone
							</div>
						</div>
					</div>
				</div>
				<!-- Secondary Inbox sidebar-->
				<div class="inbox-secondary-sidebar perfect-scrollbar rtl-ps-none" data-sidebar="secondary"><i class="sidebar-close i-Close" data-sidebar-toggle="secondary"></i>
					<div class="mail-item">
						<div class="avatar"><img src="{{ asset('theme/images/faces/1.jpg')}}" alt="" /></div>
						<div class="col-xs-6 details"><span class="name text-muted">John Doe</span>
							<p class="m-0">Confirm your email</p>
						</div>
						<div class="col-xs-3 date"><span class="text-muted">20 Dec 2018</span></div>
					</div>
					<div class="mail-item">
						<div class="avatar"><img src="{{ asset('theme/images/faces/5.jpg')}}" alt="" /></div>
						<div class="col-xs-6 details"><span class="name text-muted">John Doe</span>
							<p class="m-0">Confirm your email</p>
						</div>
						<div class="col-xs-3 date"><span class="text-muted">20 Dec 2018</span></div>
					</div>
					<div class="mail-item">
						<div class="avatar"><img src="{{ asset('theme/images/faces/2.jpg')}}" alt="" /></div>
						<div class="col-xs-6 details"><span class="name text-muted">John Doe</span>
							<p class="m-0">Confirm your email</p>
						</div>
						<div class="col-xs-3 date"><span class="text-muted">20 Dec 2018</span></div>
					</div>
					<div class="mail-item">
						<div class="avatar"><img src="{{ asset('theme/images/faces/3.jpg')}}" alt="" /></div>
						<div class="col-xs-6 details"><span class="name text-muted">John Doe</span>
							<p class="m-0">Confirm your email</p>
						</div>
						<div class="col-xs-3 date"><span class="text-muted">20 Dec 2018</span></div>
					</div>
					<div class="mail-item">
						<div class="avatar"><img src="{{ asset('theme/images/faces/4.jpg')}}" alt="" /></div>
						<div class="col-xs-6 details"><span class="name text-muted">John Doe</span>
							<p class="m-0">Confirm your email</p>
						</div>
						<div class="col-xs-3 date"><span class="text-muted">20 Dec 2018</span></div>
					</div>
					<div class="mail-item">
						<div class="avatar"><img src="{{ asset('theme/images/faces/5.jpg')}}" alt="" /></div>
						<div class="col-xs-6 details"><span class="name text-muted">John Doe</span>
							<p class="m-0">Confirm your email</p>
						</div>
						<div class="col-xs-3 date"><span class="text-muted">20 Dec 2018</span></div>
					</div>
					<div class="mail-item">
						<div class="avatar"><img src="{{ asset('theme/images/faces/4.jpg')}}" alt="" /></div>
						<div class="col-xs-6 details"><span class="name text-muted">John Doe</span>
							<p class="m-0">Confirm your email</p>
						</div>
						<div class="col-xs-3 date"><span class="text-muted">20 Dec 2018</span></div>
					</div>
					<div class="mail-item">
						<div class="avatar"><img src="{{ asset('theme/images/faces/9.jpg')}}" alt="" /></div>
						<div class="col-xs-6 details"><span class="name text-muted">John Doe</span>
							<p class="m-0">Confirm your email</p>
						</div>
						<div class="col-xs-3 date"><span class="text-muted">20 Dec 2018</span></div>
					</div>
				</div>
			</div>
		</div>
		<!-- MAIN INBOX SIDEBAR-->
		<div class="inbox-main-sidebar" data-sidebar="main" data-sidebar-position="left">
		<h4>Pesan</h4>
			<div class="pt-3 pr-3 pb-3"><i class="sidebar-close i-Close" data-sidebar-toggle="main"></i>
				<button class="btn btn-rounded btn-primary btn-block mb-4">Compose</button>
				<div class="pl-3">
					<p class="text-muted mb-2">Browse</p>
					<ul class="inbox-main-nav">
						<li><a class="active" href=""><i class="icon-regular i-Mail-2"></i> Inbox (2)</a></li>
						<li><a href=""><i class="icon-regular i-Mail-Outbox"></i> Sent</a></li>
						<li><a href=""><i class="icon-regular i-Mail-Favorite"></i> Starred</a></li>
						<li><a href=""><i class="icon-regular i-Folder-Trash"></i> Trash</a></li>
						<li><a href=""><i class="icon-regular i-Spam-Mail"></i> Spam</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('js')
<script src="{{asset('theme/js/scripts/sidebar.script.min.js')}}"></script>
@endsection
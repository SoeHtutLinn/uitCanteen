@extends('layouts.layout')

@section('content')


	<div class="profile-section">
		<div class="profile-img d-flex justify-content-center mt-3">
			<img src="uploads/menu/green tea.jpg">
		</div>
		<div class="profile-name mt-3">
			<h5>{{ Auth::user()->name }}</h5>
			<h5>{{ Auth::user()->email }}</h5>
		</div>
		<div class="profile-tabs">
			<ul class="nav nav-pills" id="pills-tab" role="tablist">
				<li class="nav-item nav-profile">
					<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Order List</a>
				</li>
				<li class="nav-item nav-profile">
					<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Noti</a>
				</li>
			</ul>
			<div class="tab-content" id="pills-tabContent">
				<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
					<div class="orderlist-item" data-toggle="modal" data-target="#exampleModalLong">
						<div class="d-flex">
							<div class="shop-name p-2 mr-auto" style="color: yellow;">
								Oasis
							</div>
							<div class="date p-2">
								14.7.2019
							</div>
							<div class="time p-2">
								9:30AM
							</div>
						</div>
						<div class="d-flex justify-content-center">
							<div class="p-2">
								3 Orders
							</div>
							<div class="p-2">
								Total-3000 Kyats
							</div>
						</div>
					</div>
					
					<!-- Modal -->
					<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content p-2">
								<div class="shopname">
									<div class="d-flex d-flex justify-content-between">
										<div><h5>Oasis</h5></div>
										<div>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
									</div>
									<div class="d-flex justify-content-end">
										<div class="date p-2">
											14.7.2019
										</div>
										<div class="time p-2">
											9:30AM
										</div>
									</div>
								</div>
								<div class="voc-itemlist">
									<table class="table">
										<tr>
											<td>Ramen</td>
											<td style="text-align: right;">x2</td>
											<td style="text-align: right;">2000 Kyats</td>
										</tr>
										<tr>
											<td>Green Tea</td>
											<td style="text-align: right;">x1</td>
											<td style="text-align: right;">1000 Kyats</td>
										</tr>
									</table>
									<div class="voc-total d-flex justify-content-between">
										<div class="p-2">Total</div>
										<div class="p-2">3000 Kyats</div>
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-ok">OK</button>
								</div>
							</div>
						</div>
					</div>

					<div class="orderlist-item">
						<div class="d-flex">
							<div class="shop-name p-2 mr-auto" style="color: yellow;">
								ThinGi ThinGar
							</div>
							<div class="date p-2">
								14.7.2019
							</div>
							<div class="time p-2">
								9:30AM
							</div>
						</div>
						<div class="d-flex justify-content-center">
							<div class="p-2">
								3 Orders
							</div>
							<div class="p-2">
								Total-3000 Kyats
							</div>
						</div>
					</div>
					<div class="orderlist-item">
						<div class="d-flex">
							<div class="shop-name p-2 mr-auto" style="color: yellow;">
								San Hteik Htar
							</div>
							<div class="date p-2">
								14.7.2019
							</div>
							<div class="time p-2">
								9:30AM
							</div>
						</div>
						<div class="d-flex justify-content-center">
							<div class="p-2">
								3 Orders
							</div>
							<div class="p-2">
								Total-3000 Kyats
							</div>
						</div>
					</div>
				</div>
				<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
					<div class="noti-item">
						<div class="d-flex justify-content-end">
							<div class="date p-2">
								14.7.2019
							</div>
							<div class="time p-2">
								9:30AM
							</div>
						</div>
						<div class="noti-text p-2">
							<p>Dear customer, your order at <span style="color: yellow;">Oasis</span> is now <span style="color: #00f700;">Ready.</span></p>
							<p>Have a nice day.</p>
						</div>
					</div>
					<div class="noti-item">
						<div class="d-flex justify-content-end">
							<div class="date p-2">
								14.7.2019
							</div>
							<div class="time p-2">
								9:30AM
							</div>
						</div>
						<div class="noti-text p-2">
							<p>Dear customer, your order at <span style="color: yellow;">ThinGi ThinGar</span> is now <span style="color: #00f700;">Ready.</span></p>
							<p>Have a nice day.</p>
						</div>
					</div>
					<div class="noti-item">
						<div class="d-flex justify-content-end">
							<div class="date p-2">
								14.7.2019
							</div>
							<div class="time p-2">
								9:30AM
							</div>
						</div>
						<div class="noti-text p-2">
							<p>Dear customer, your order at <span style="color: yellow;">San Hteik Htar</span> is now <span style="color: #00f700;">Ready.</span></p>
							<p>Have a nice day.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="logout">
			<a href="{{ route('logout') }}"onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
			<button type="button" class="btn btn-logout btn-lg btn-block">Log Out</button>
			 </a>

			 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
                                        
                                   
		</div>
	</div>

@endsection
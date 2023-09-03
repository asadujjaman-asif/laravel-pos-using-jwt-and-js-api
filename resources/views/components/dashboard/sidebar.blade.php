<nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="{{asset('assets/backend/img/find_user.png')}}" class="user-image img-responsive"/>
					</li>
				
					
                    <li>
                        <a class="active-menu"  href="{{route('dashboard')}}"><i class="fa fa-dashboard fa-1x"></i> Dashboard</a>
                    </li>
                     <li>
                        <a  href="{{ route('user-profile')}}"><i class="fa fa-desktop fa-1x"></i> My Profile</a>
                    </li>
                    <li>
                        <a  href="{{ route('category-list')}}"><i class="fa fa-qrcode fa-1x"></i>Manage category</a>
                    </li>
						   <li  >
                        <a   href="{{ route('brand-list')}}"><i class="fa fa-bar-chart-o fa-1x"></i> Mange Brand</a>
                    </li>	
                      <li  >
                        <a  href="{{ route('sub-category-list')}}"><i class="fa fa-table fa-1x"></i> Sub Category</a>
                    </li>
                    <li  >
                        <a  href="{{ route('unit-list')}}"><i class="fa fa-edit fa-1x"></i> Unit </a>
                    </li>
                    <li  >
                        <a  href="{{ route('product-list')}}"><i class="fa fa-edit fa-1x"></i> Manage Product </a>
                    </li>				
					
					                   
                    <li>
                        <a href="#"><i class="fa fa-sitemap fa-1x"></i> Ecommerse Setup<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{ route('slider-list')}}"><i class='fas fa-images fa-1x'></i> Slider Setup</a>
                            </li>
                            <li>
                                <a href="#">Second Level Link</a>
                            </li>
                            <li>
                                <a href="#">Ecommerse Setup<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="#">Third Level Link</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level Link</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level Link</a>
                                    </li>

                                </ul>
                               
                            </li>
                        </ul>
                      </li>  
                  <li  >
                        <a  href="blank.html"><i class="fa fa-square-o fa-1x"></i> Blank Page</a>
                    </li>	
                </ul>
               
            </div>
        </nav> 
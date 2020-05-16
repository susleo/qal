<header id="tt-header">
    <div class="container">
        <div class="row tt-row no-gutters">
            <div class="col-auto">
                <!-- toggle mobile menu -->
                <a class="toggle-mobile-menu" href="#">
                    <svg class="tt-icon">
                        <use xlink:href="#icon-menu_icon"></use>
                    </svg>
                </a>
                <!-- /toggle mobile menu -->
                <!-- logo -->
                <div class="tt-logo">
                    <a href="{{route('home')}}"><img src="{{asset('frontend/assets/images/logo.png')}}" alt=""></a>
                </div>
                <!-- /logo -->
                <!-- desctop menu -->
                <div class="tt-desktop-menu">
                    <nav>
                        <ul>
                            <li><a href="{{route('category')}}"><span>Categories</span></a></li>
                            <li><a href="page-tabs.html"><span>Trending</span></a></li>
                            <li><a href="{{route('discussion.create')}}"><span>New</span></a></li>
                        </ul>
                    </nav>
                </div>
                <!-- /desctop menu -->
                <!-- tt-search -->
                <div class="tt-search">
                    <!-- toggle -->
                    <button class="tt-search-toggle" data-toggle="modal" data-target="#modalAdvancedSearch">
                        <svg class="tt-icon">
                            <use xlink:href="#icon-search"></use>
                        </svg>
                    </button>
                    <!-- /toggle -->
                    <form class="search-wrapper">
                        <div class="search-form">
                            <input type="text" class="tt-search__input" placeholder="Search">
                            <button class="tt-search__btn" type="submit">
                                <svg class="tt-icon">
                                    <use xlink:href="#icon-search"></use>
                                </svg>
                            </button>
                            <button class="tt-search__close">
                                <svg class="tt-icon">
                                    <use xlink:href="#cancel"></use>
                                </svg>
                            </button>
                        </div>
                        <div class="search-results">
                            <div class="tt-search-scroll">
                                <ul>
                                    <li>
                                        <a href="page-single-topic.html">
                                            <h6 class="tt-title">Rdr2 secret easter eggs</h6>
                                            <div class="tt-description">
                                                Here’s what I’ve found in Red Dead Redem..
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="page-single-topic.html">
                                            <h6 class="tt-title">Top 10 easter eggs in Red Dead Rede..</h6>
                                            <div class="tt-description">
                                                You can find these easter eggs in Red Dea..
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="page-single-topic.html">
                                            <h6 class="tt-title">Red Dead Redemtion: Arthur Morgan..</h6>
                                            <div class="tt-description">
                                                Here’s what I’ve found in Red Dead Redem..
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="page-single-topic.html">
                                            <h6 class="tt-title">Rdr2 secret easter eggs</h6>
                                            <div class="tt-description">
                                                Here’s what I’ve found in Red Dead Redem..
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="page-single-topic.html">
                                            <h6 class="tt-title">Top 10 easter eggs in Red Dead Rede..</h6>
                                            <div class="tt-description">
                                                You can find these easter eggs in Red Dea..
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="page-single-topic.html">
                                            <h6 class="tt-title">Red Dead Redemtion: Arthur Morgan..</h6>
                                            <div class="tt-description">
                                                Here’s what I’ve found in Red Dead Redem..
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <button type="button" class="tt-view-all" data-toggle="modal" data-target="#modalAdvancedSearch">Advanced Search</button>
                        </div>
                    </form>
                </div>
                <!-- /tt-search -->
            </div>

            @guest
                <div class="col-auto ml-auto">
                    <div class="tt-account-btn">
                        <a href="{{route('login')}}" class="btn btn-primary">Log in</a>
                        <a href="page-signup.html" class="btn btn-secondary">Sign up</a>
                    </div>
                </div>
            @else
                <div class="col-auto ml-auto">
                    <div class="tt-user-info d-flex justify-content-center">
                        <div class="tt-avatar-icon tt-size-md">
                            <a href="{{route('notifcations')}}">
                            <span class="badge badge-danger" >
                            {{auth()->user()->unreadNotifications->count()}} unread notifcations
                                </span>
                            </a>
                            <img src="{{auth()->user()->image ?? Gravatar::src(auth()->user()->email)}}"
                                 alt=""height="50px" width="60px" style="border-radius: 50%">
                            <span class="tt-color01 tt-badge" >
                                   {{auth()->user()->name}}
                                </span>
                                <span class="tt-col-btn" id="js-settings-btn">
                                      <a href="#" class="tt-btn-icon">
                                    <i class="fa fa-cog"></i>
                                      </a>
                                </span>
                         </div>
                    </div>
                </div>

            @endguest


            <div id="js-popup-settings" class="tt-popup-settings">
                <div class="tt-btn-col-close">
			<span class="tt-icon-text">
				Settings
			</span>

              <span style="float: right" >
				 <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
			</span>

                </div>
                <form class="form-default">
                    <div class="form-group">
                        <label for="settingsUserName">Username</label>
                        <input type="text" name="name" class="form-control" id="settingsUserName" placeholder="azyrusmax">
                    </div>
                    <div class="form-group">
                        <label for="settingsUserEmail">Email</label>
                        <input type="text" name="name" class="form-control" id="settingsUserEmail" placeholder="Sample@sample.com">
                    </div>
                    <div class="form-group">
                        <label for="settingsUserPassword">Password</label>
                        <input type="password" name="name" class="form-control" id="settingsUserPassword" placeholder="************">
                    </div>
                    <div class="form-group">
                        <label for="settingsUserAbout">About</label>
                        <textarea name="" placeholder="Few words about you" class="form-control" id="settingsUserAbout"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="settingsUserAbout">Notify me via Email</label>
                        <div class="checkbox-group">
                            <input type="checkbox" id="settingsCheckBox01" name="checkbox">
                            <label for="settingsCheckBox01">
                                <span class="check"></span>
                                <span class="box"></span>
                                <span class="tt-text">When someone replies to my thread</span>
                            </label>
                        </div>
                        <div class="checkbox-group">
                            <input type="checkbox" id="settingsCheckBox02" name="checkbox">
                            <label for="settingsCheckBox02">
                                <span class="check"></span>
                                <span class="box"></span>
                                <span class="tt-text">When someone likes my thread or reply</span>
                            </label>
                        </div>
                        <div class="checkbox-group">
                            <input type="checkbox" id="settingsCheckBox03" name="checkbox">
                            <label for="settingsCheckBox03">
                                <span class="check"></span>
                                <span class="box"></span>
                                <span class="tt-text">When someone mentions me</span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <a href="#" class="btn btn-secondary">Save</a>
                    </div>
                </form>
            </div>

        </div>
    </div>
</header>
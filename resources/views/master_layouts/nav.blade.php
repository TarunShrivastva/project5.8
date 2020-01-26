<div class="newspaper-main-menu" id="stickyMenu">
    <div class="classy-nav-container breakpoint-off">
        <div class="container">
            <!-- Menu -->
            <nav class="classy-navbar justify-content-between" id="newspaperNav">
                <!-- Logo -->
                <div class="logo">
                    <a href="index.html"><img src="img/core-img/logo.png" alt=""></a>
                </div>
                <!-- Navbar Toggler -->
                <div class="classy-navbar-toggler">
                    <span class="navbarToggler"><span></span><span></span><span></span></span>
                </div>
                <!-- Menu -->
                <div class="classy-menu">
                    <!-- close btn -->
                    <div class="classycloseIcon">
                        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                    </div>
                    <!-- Nav Start -->
                    <div class="classynav">
                        <ul>
                        @foreach($menus as $key => $value)
                            <li><a href="{{url('/hi')}}/{{ $value['title'] == 'home'? '': $value['title']}}">{{$value['title']}}</a>
                                @if(count($value['child_module']))
                                    <ul class="dropdown">
                                        @foreach($value['child_module'] as $key1 => $value1)
                                            <li class="{{ count($value1['child__child_module'])? 'has-down':''}}">
                                                <a href="
                                                {{ count($value1['child__child_module']) == 0 ? url('/hi').'/'.$value['title'].'/'.$value1['title']: 'javascript:void(0)'}}">{{ $value1['title']}}
                                                </a>    
                                                @if(count($value1['child__child_module']) > 0)
                                                    <ul class="dropdown">
                                                    @foreach($value1['child__child_module'] as $key2 => $value2)
                                                        <li>
                                                            <a href="{{url('/hi')}}/{{ $value['title'] }}/{{ $value2['title']}}">
                                                                    {{ $value2['title'] }}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                    </ul>
                                                @endif        
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>            
                        @endforeach
                        <li class="cn-dropdown-item has-down"><a href="javascript:void(0)">Language</a>
                            <ul class="dropdown">
                              @foreach($languages as $key => $value)
                                <li><a href="/{{ $value['alias'] != 'en'? $value['alias']: ''}}">{{ $value['name'] }}</a></li>
                              @endforeach
                            </ul>
                          </li>
                        </ul>
                    </div>
                    <!-- Nav End -->
                </div>
            </nav>
        </div>
    </div>
</div>
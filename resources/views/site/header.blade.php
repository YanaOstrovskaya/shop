<div class="container">
    <div class="header_box">
      <div class="logo"><a class="navbar-brand text-muted" style="font-size: 34px;" href="{{url('/')}}"><h2>FLORIST</h2></a></div>
    

     
	  <nav class="navbar navbar-inverse" role="navigation">
      <div class="navbar-header">
        <button type="button" id="nav-toggle" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>
	    <div id="main-nav" class="collapse navbar-collapse navStyle">
			<ul class="nav navbar-nav" id="mainNav">
        <li><a href="{{url('/')}}" class="scroll-link">Home</a></li>
         @if(isset($menu))
				@foreach($menu as $item)
	<li><a href="#{{$item['alias']}}" class="scroll-link">{{$item['title']}}</a></li>
				@endforeach
         @endif
@if (Auth::guest())
                     
@else
                        @if(Auth::user()->hasRole('Admin'))
                        <li><a href="{{ url('admin') }}">Admin</a></li>
                        @endif
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                       

<li>
  <a href="{{ route('cart.index') }}">
    <i class="fa fa-shopping-cart"></i> 
    Cart 
     <span class="label label-danger">{{Cart::count()}}</span>
  </a>
</li>
			</ul>
      </div>
	 </nav>
	 
    </div>
  </div>




@if(isset($pages) && is_object($pages))


<section id="home" class="top_cont_outer">
    <div class="container-fluid two csa-head">
        <div class="row justify-content-center">
            <div class="text-center text-white">
                <h1 class="font-weight-bold">FLORIST</h1>
                <h2 class="font-weight-bold">Flowers planet</h2>
            </div>
        </div>
    </div>
</section>
<!--Hero_Section--> 
@foreach($pages as $k=>$page)
<section id="aboutUs"><!--Aboutus-->
<div class="inner_wrapper">
  <div class="container">
    <h2>{{ $page->name }}</h2>
    <div class="inner_section">
  <div class="row">
      <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-12 pull-right">
        {!! Html::image($page->images, '', ['class'=>'img-circle delay-03s animated wow zoomIn']) !!}

        </div>
        <div class=" col-lg-7 col-md-7 col-sm-7 col-xs-12 pull-left">
          <div class=" delay-01s animated fadeInDown wow animated">
            {!!substr($page->text, 0, 350) !!}...
</div>
<div class="work_bottom"> <span>Want to know more..</span> <a href="{{route('page', array('alias'=>$page->alias))}}" class="contact_btn">Contact Us</a> </div>       
     </div>
        
      </div>
    
      
    </div>
  </div> 
  </div>
</section>

@endforeach
<!--Aboutus--> 




@endif




@if(isset($portfolios) && is_object($portfolios))
<!-- Portfolio -->
<section id="Shop" class="content"> 
  
  <!-- Container -->
  <div class="container portfolio_title"> 
    
    <!-- Title -->
    <div class="section-title">
      <h2>Shop</h2>
    </div>
    <!--/Title --> 
    
  </div>
  <!-- Container -->
  
  <div class="portfolio-top"></div>
  
  <!-- Portfolio Filters -->
  <div class="portfolio"> 
    
    @if(isset($tags))
    <div id="filters" class="sixteen columns">
      <ul class="clearfix">
        <li><a id="all" href="#" data-filter="*" class="active">
          <h5>All</h5>
          </a></li>

          @foreach($tags as $tag)
              <li><a class="" href="#" data-filter=".{{$tag}}">
               <h5>{{$tag}}</h5>
               </a></li>
          @endforeach
   
      </ul>
    </div>
    <!--/Portfolio Filters --> 
    @endif

    
    <!-- Portfolio Wrapper -->
    <div class="isotope fadeInLeft animated wow" style="position: relative; overflow: hidden; height: 480px;" id="portfolio_wrapper"> 
    
    @foreach($portfolios as $item)

    <div style="position: absolute; left: 0px; top: 0px; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1); width: 337px; opacity: 1;" class="portfolio-item one-four  {{$item->filter->name}} isotope-item">
        <a href="{{url('portfolio/'.$item->slug)}}">
        <div class="portfolio_img "> {{Html::image($item->images, $item->name)}} </div>        
        <div class="item_overlay">
          <div class="item_info"> 
            <h4 class="project_name">{{ $item->name }}</h4>
            <p style="color: white; font-size: 24px;">{{ $item->price }} $</p>
          </div>
        </div>
        </a>
        </div>

      <!--/Portfolio Item --> 
    @endforeach


   
      
    </div>
    <!--/Portfolio Wrapper --> 
    
  </div>
  <!--/Portfolio Filters -->
  
  <div class="portfolio_btm"></div>
  
  
  <div id="project_container">
    <div class="clear"></div>
    <div id="project_data"></div>
  </div>
 
  
</section>
<!--/Portfolio --> 
@endif


@if(isset($peoples) && is_object($peoples))
<!--Team-->
<section class="page_section team" id="team"><!--main-section team-start-->
  <div class="container">
    <h2>Team</h2>
    <h6>Lorem ipsum dolor sit amet, consectetur adipiscing.</h6>
    <div class="team_section clearfix">
  
    @foreach($peoples as $k=>$people)
     <div class="team_area">
        <div class="team_box wow fadeInDown delay-0{{($k+1)*3}}s">
          <div class="team_box_shadow"><a href="javascript:void(0)"></a></div>
          {{Html::image('assets/img/'.$people->images, $people->name)}}
          <ul>
            <li><a href="javascript:void(0)" class="fa fa-twitter"></a></li>
            <li><a href="javascript:void(0)" class="fa fa-facebook"></a></li>
            <li><a href="javascript:void(0)" class="fa fa-google-plus"></a></li>
          </ul>
        </div>
        <h3 class="wow fadeInDown delay-0{{($k+1)*3}}s">{{ $people->name }}</h3>
        <span class="wow fadeInDown delay-0{{($k+1)*3}}s">{{ $people->position }}</span>
        <p class="wow fadeInDown delay-0{{($k+1)*3}}s">{{ $people->text }}</p>
      </div>

    @endforeach

    </div>
  </div>
</section>
<!--/Team-->
@endif


<!--Footer-->

<!--Module top footer -->
  @isset ($layouts['footer'])
      @foreach ( $layouts['footer']  as $layout)
        @if ($layout->page == null ||  $layout->page =='*' || $layout->page =='' || (isset($layout_page) && in_array($layout_page, $layout->page) ) )
          @if ($layout->type =='html')
            {!! $layout->text !!}
          @elseif($layout->type =='view')
            @if (view()->exists('blockView.'.$layout->text))
             @include('blockView.'.$layout->text)
            @endif
          @elseif($layout->type =='module')
            {!! (new $layout->text)->render() !!}
          @endif
        @endif
      @endforeach
  @endisset
<!--//Module top footer -->

  <footer id="footer"><!--Footer-->
    <div class="footer-widget">
      <div class="container">
        <div class="row">
          <div class="col-sm-3">
            <div class="single-widget">
              <h2><a href="{{ route('home') }}"><img style="max-width: 150px;" src="{{  asset(SITE_LOGO) }}"></a></h2>
             <ul class="nav nav-pills nav-stacked">
               <li>{{ $configsGlobal['title'] }}</li>
             </ul>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="single-widget">
              <h2>{{ trans('language.my_account') }}</h2>
              <ul class="nav nav-pills nav-stacked">
                @if (!empty($layoutsUrl['footer']))
                  @foreach ($layoutsUrl['footer'] as $url)
                    <li><a {{ ($url->target =='_blank')?'target=_blank':''  }} href="{{ url($url->url) }}">{{ trans($url->name) }}</a></li>
                  @endforeach
                @endif
              </ul>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="single-widget">
              <h2>{{ trans('language.about') }}</h2>
              <ul class="nav nav-pills nav-stacked">
                <li><a href="#">{{ trans('language.shop_info.address') }}: {{ $configsGlobal['address'] }}</a></li>
                <li><a href="#">{{ trans('language.shop_info.hotline') }}: {{ $configsGlobal['long_phone'] }}</a></li>
                <li><a href="#">{{ trans('language.shop_info.email') }}: {{ $configsGlobal['email'] }}</a></li>
            </ul>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="single-widget">
              <h2>{{ trans('language.subscribe.title') }}</h2>
              <form action="{{ route('subscribe') }}" method="post" class="searchform">
                @csrf

                <input type="email" name="subscribe_email" required="required" placeholder="{{ trans('language.subscribe.subscribe_email') }}">
                <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
                <p>{{ trans('language.subscribe.subscribe_des') }}</p>
              </form>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="footer-bottom">
      <div class="container">
        <div class="row">
          <p class="pull-left">Copyright © 2018 <a href="{{ config('scart.homepage') }}">{{ config('scart.name') }} {{ config('scart.version') }}</a> Inc. All rights reserved.</p>
          <p class="pull-right">Hosted by  <span><a target="_blank" href="https://giaiphap247.com">GiaiPhap247</a></span></p>
            <!--
            S-Cart is free open source and you are free to remove the powered by S-cart if you want, but its generally accepted practise to make a small donation.
            Please donate via PayPal to https://www.paypal.me/LeLanh or Email: fastle.ktc@gmail.com
            //-->
        </div>
      </div>
    </div>
  </footer>
<!--//Footer-->

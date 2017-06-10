
<div class="container-fluid first-view">
  <div class="container-fluid intro-1">

    <div class="intro-title">
        <h2 class="text-center">{{trans('welcome.welcomToMLB')}}</h2>

        <h5 class="text-center">{{trans('welcome.secondTitle')}}</h5>
        <br>
        <div class="thirdTitle text-center">
          <p class="pThird">{{trans('welcome.lets')}}</p>
          <p class="pThird">
            <span class="word wisteria">{{trans('welcome.connect')}}</span>
            <span class="word belize">{{trans('welcome.share')}}</span>
            <span class="word pomegranate">{{trans('welcome.convers')}}</span>
            <span class="word green">{{trans('welcome.ask')}}</span>
            <span class="word midnight">{{trans('welcome.makeit')}}</span>
          </p>
        </div>
    </div>
  </div>

    <div class="row">
      <div class="col-md-4 col-xs-4 intro-grid">
        <div class="intro-box text-center">
          <h4>
            {{trans('welcome.introBox1.title')}}
          </h4>
          <p class="text-center">{{trans('welcome.introBox1.1')}}</p>
          <p class="text-center">{{trans('welcome.introBox1.2')}}</p>
          <p class="text-center">{{trans('welcome.introBox1.3')}}</p>
          <p class="text-center">{{trans('welcome.introBox1.4')}}</p>
          <p class="text-center">{{trans('welcome.introBox1.5')}}</p>
          <p class="text-center">{{trans('welcome.introBox1.6')}}</p>
          <p class="text-center">{{trans('welcome.introBox1.7')}}</p>
        </br>
          <span><a href="http://blog.kalkin7.com/2014/02/10/lets-write-using-markdown/">
            {{trans('welcome.introBox1.link')}}
          </a></span>

        </div>
      </div>
      <div class="col-md-4 col-xs-4 intro-grid">
        <div class="intro-box text-center">
          <h4>
            {{trans('welcome.introBox2.title')}}
          </h4>
          <p class="text-center">{{trans('welcome.introBox2.1')}}</p>
          <p class="text-center">{{trans('welcome.introBox2.2')}}</p>
          <p class="text-center">{{trans('welcome.introBox2.3')}}</p>
          <p class="text-center">{{trans('welcome.introBox2.4')}}</p>
          <p class="text-center">{{trans('welcome.introBox2.5')}}</p>
          <p class="text-center">{{trans('welcome.introBox2.6')}}</p>
          <p class="text-center">{{trans('welcome.introBox2.7')}}</p>
        </div>
      </div>
      <div class="col-md-4 col-xs-4 intro-grid">
        <div class="intro-box text-center">
          <h4>
            {{trans('welcome.introBox3.title')}}
          </h4>
          <p class="text-center">{{trans('welcome.introBox3.1')}}</p>
          <p class="text-center">{{trans('welcome.introBox3.2')}}</p>
          <p class="text-center">{{trans('welcome.introBox3.3')}}</p>
          <p class="text-center">{{trans('welcome.introBox3.4')}}</p>
          <p class="text-center">{{trans('welcome.introBox3.5')}}</p>
          <p class="text-center">{{trans('welcome.introBox3.6')}}</p>
          <p class="text-center">{{trans('welcome.introBox3.7')}}</p>
          <p class="text-center">{{trans('welcome.introBox3.8')}}</p>
        </div>
      </div>
    </div>

    </br>

    <div class="container intro-2 text-center">
      <h3>{{trans('welcome.HotStory')}}</h3>
    @forelse ($articles as $article)
      @include('articles.partial.popular-articles')
    @empty
    @endforelse

    </div>
  </div>

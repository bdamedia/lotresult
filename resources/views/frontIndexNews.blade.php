@include('header')
<style>
    .news-single-title{
        padding: 5px;
        border-width: 0px;
        background-color: rgba(255, 183, 0, 1);
        text-align: center;
        display: flex;
        font-family: 'Arial-BoldMT', 'Arial Bold', 'Arial';
        font-weight: 500;
        font-style: normal;
        color: #000000;
    }
    .news-index-image{
        width: 160px;
        height: 140px;
        border: 1px solid #ccc;
        background-position: center;
        background-size: 100%;
        background-repeat: no-repeat;
    }
    .news-index-container{
        margin-bottom: 10px;
    }
    .news-index-title{
        margin: 0px;
    }
    .no-padding{
        padding: 0px;
    }
    .news-content{
        height: 154px;
        overflow: hidden;
    }
</style>
<div class="main-content home">
    <div class="container">
        <div class="row margin-b">
            <div class="col-xs-12 col-sm-12 col-md-6">

                <div class="row">
                    @include('todayResult')
                    <div class="col-xs-12 news-list">
                       {{-- {{ print_r($data) }}--}}
                        <h3 class="news-single-title">Tin tức xổ số</h3>
                        @foreach($data as $news)

                        <div class="col-xs-12 news-index-container no-padding" >
                            <a target="_blank" href="{{ url('/tin-xo-so/').'/'.$news->news_slug }}" >
                                @if($news->image)
                                <div class="col-xs-4 news-index-image" style="background-image: url('{{ asset('images').'/'.$news->image }}')"></div>
                                    @else
                                    <div class="col-xs-4 news-index-image" style="background-image: url('{{ asset('images/u5541.svg') }}')"></div>

                                @endif
                            </a>
                        <div class="col-xs-8 news-content" >
                            <a target="_blank" href="{{ url('/tin-xo-so/').'/'.$news->news_slug }}" ><h3 class="news-index-title">{{ $news->title }}</h3></a>

                                {!! Str::words(html_entity_decode($news->content), $words = 26, $end = '...') !!}

                        </div>
                        </div>
                            @endforeach

                    </div>

                </div>


            </div>


            @include('sidebar')
        </div>
    </div>
</div>
@include('footer')
<script type="application/ld+json">
{{--{
   "@context":"http://schema.org",
   "@type":"WebPage",
   "@id":"{{ Request::fullUrl() }}",
   "url":"{{ Request::fullUrl() }}",
   "name":"{{ $data['title'] }}",
   "description":"{{ $data['title'] }}",
   "keywords":{{ $data['title'] }},
   "datePublished":"2020-01-06T18:25:16+07:00",
   "dateModified":"2020-01-06T18:25:16+07:00",
   "creator":{
      "@type":"Organization",
      "url":"{{ Request::fullUrl() }}",
      "name":"Asoicau"
   }
}--}}
</script>

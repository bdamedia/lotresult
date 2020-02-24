@include('header')
<style>
    .news-single-title{
        border-width: 0px;
        background-color: rgba(255, 183, 0, 1);
        text-align: center;
        height: 37px;
        display: flex;
        font-family: 'Arial-BoldMT', 'Arial Bold', 'Arial';
        font-weight: 700;
        font-style: normal;
        color: #000000;
        padding: 6px;
        margin-bottom: 15px;
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
    .news-index-container:first-child {
        margin-top: 10px;
    }
    a.news-titles{
        width: 100%;
        float: left;
    }
    @media (max-width: 480px){
        .news-index-image{
            width: 100%;
        }

    }
</style>
<div class="main-content home">
    <div class="container">
        <div class="row margin-b">
            <div class="col-xs-12 col-sm-12 col-md-6 xsmn">

                <div class="row">
                    @include('todayResult')
                    <div class="col-xs-12 news-list">
                       {{-- {{ print_r($data) }}--}}
                        <span class="news-single-title">Tin tức xổ số</span>
                        @foreach($data as $news)

                        <div class="col-xs-12 news-index-container no-padding" >
                            <a  target="_blank" href="{{ url('/tin-xo-so/').'/'.$news->news_slug }}" >
                                @if($news->image)
                                <div class="col-xs-12 col-md-4 news-index-image" style="background-image: url('{{ asset('images').'/'.$news->image }}')"></div>
                                    @else
                                    <div class="col-xs-12 col-md-4 news-index-image" style="background-image: url('{{ asset('images/u5541.svg') }}')"></div>

                                @endif
                            </a>
                        <div class="col-xs-12 col-md-8 news-content" >
                            <a class="news-titles"  target="_blank" href="{{ url('/tin-xo-so/').'/'.$news->news_slug }}" >
                                <span class="news-index-title">{{ Str::words($news->title,$word=10,$end='...') }}</span>
                            </a>

                                {{ Str::words(strip_tags($news->content), $words = 26, $end = '...') }}


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

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
    .news-single-image{
        width: 100%;
    }
</style>
<div class="main-content home">
    <div class="container">
        <div class="row margin-b">
            <div class="col-xs-12 col-sm-12 col-md-6">

                <div class="row">
                    @include('todayResult')
                    <div class="col-xs-12 news-list">
                        <div class="col-xs-12" ><h1 class="news-single-title">{{ $data['title'] }}</h1></div>
                        <div class="col-xs-12" ><img src="{{ asset('images').'/'.$data['image'] }}" class="news-single-image"></img></div>
                        <div class="col-xs-12" ><p  class="news-single-content">{!! html_entity_decode($data['content']) !!}</p></div>
                    </div>

                </div>


            </div>


            @include('sidebar')
        </div>
    </div>
</div>
@include('footer')
<script type="application/ld+json">
{
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
}
</script>

@extends('frontend.layout.master')
@section('headerCSS')
  <style type="text/css">
  </style>
@endsection

@section('content')
  <div class="main-content home">
    <div class="container">
      <div class="row margin-b">
        <div class="col-xs-12 col-sm-12 col-md-6">
          <div class="row">
            @include('frontend.includes.todayResult')
            <div class="margin-40 col-md-12">

              <button class="tablink" onclick="openPage('Home', this, 'red')">Home</button>
              <button class="tablink" onclick="openPage('News', this, 'green')" id="defaultOpen">News</button>
              <button class="tablink" onclick="openPage('Contact', this, 'blue')">Contact</button>
              <button class="tablink" onclick="openPage('About', this, 'orange')">About</button>

              <div id="Home" class="tabcontent">
                <h3>Home</h3>
                <p>Home is where the heart is..</p>
              </div>

              <div id="News" class="tabcontent">
                <h3>News</h3>
                <p>Some news this fine day!</p> 
              </div>

              <div id="Contact" class="tabcontent">
                <h3>Contact</h3>
                <p>Get in touch, or swing by for a cup of coffee.</p>
              </div>

              <div id="About" class="tabcontent">
                <h3>About</h3>
                <p>Who we are and what we do.</p>
              </div>
            </div>
          </div>
        </div>
        @include('frontend.includes.sidebar')
      </div>
    </div>
  </div>
@endsection

@section('footerJS')

  <script type="text/javascript">


    function openPage(pageName, elmnt, color) {
      // Hide all elements with class="tabcontent" by default */
      var i, tabcontent, tablinks;
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
      }

      // Remove the background color of all tablinks/buttons
      tablinks = document.getElementsByClassName("tablink");
      for (i = 0; i < tablinks.length; i++) {
        tablinks[i].style.backgroundColor = "";
      }

      // Show the specific tab content
      document.getElementById(pageName).style.display = "block";

      // Add the specific color to the button used to open the tab content
      elmnt.style.backgroundColor = color;
    }
    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();


  </script>
@endsection

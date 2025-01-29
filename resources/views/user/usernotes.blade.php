<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>blueneek</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="{{ asset('user/css/bootstrap.min.css')}}">
      <!-- style css -->
      <link rel="stylesheet" href="{{ asset('user/css/style.css')}}">
      <!-- Responsive-->
      <link rel="stylesheet" href="{{ asset('user/css/responsive.css')}}">
      <!-- fevicon -->
      <link rel="icon" href="{{ asset('user/images/fevicon.png')}}" type="user/image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="{{ asset('user/css/jquery.mCustomScrollbar.min.css')}}">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="{{ asset('https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css')}}">
      <link rel="stylesheet" href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css')}}" media="screen">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->

      <style>
        input{
          width: 500px;
          height: 35px;
          margin: 4px;
          padding: 8px;
          border:  1px solid grey;
          border-radius: 25px;
          margin-left: 300px
        }

.button-18 {
  align-items: center;
  border: 0;
  border-radius: 100px;
  box-sizing: border-box;
  color: black;
  cursor: pointer;
  display: inline-flex;
  font-family: -apple-system, system-ui, system-ui, "Segoe UI", Roboto, "Helvetica Neue", "Fira Sans", Ubuntu, Oxygen, "Oxygen Sans", Cantarell, "Droid Sans", "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Lucida Grande", Helvetica, Arial, sans-serif;
  font-size: 16px;
  font-weight: 600;
  justify-content: center;
  line-height: 20px;
  max-width: 480px;
  min-height: 40px;
  min-width: 0px;
  overflow: hidden;
  padding: 0px;
  padding-left: 20px;
  padding-right: 20px;
  text-align: center;
  touch-action: manipulation;
  transition: background-color 0.167s cubic-bezier(0.4, 0, 0.2, 1) 0s, box-shadow 0.167s cubic-bezier(0.4, 0, 0.2, 1) 0s, color 0.167s cubic-bezier(0.4, 0, 0.2, 1) 0s;
  user-select: none;
  -webkit-user-select: none;
  vertical-align: middle;
}

.button-18:hover,
.button-18:focus {
  background-color: #16437E;
  color: #ffffff;
}

.button-18:active {
  background: #09223b;
  color: rgb(255, 255, 255, .7);
}

.button-18:disabled {
  cursor: not-allowed;
  background: rgba(0, 0, 0, .08);
  color: rgba(0, 0, 0, .3);
}

      </style>
      <style>
        input[type=text],textarea{
          width: 90%;
          padding: 12px;
          border: 1px solid #ccc;
          border-radius: 4px;
          resize: vertical;
        }

        input[type=password]{
          width: 100%;
          padding: 12px;
          border: 1px solid #ccc;
          border-radius: 4px;
          resize: vertical;
        }


        label {
          padding: 12px 12px 12px 0;
          margin-left:15px;
          display: inline-block;
        }

        input[type=submit] {
          background-color: #04AA6D;
          width: 140px;
          color: white;
          padding: 10px 22px;
          border: none;
          border-radius: 4px;
          cursor: pointer;
          float: right;
        }

        input[type=submit]:hover {
          background-color: #45a049;
        }

        .containers {
          border-radius: 5px;
          background-color: #f2f2f2;
          padding: 20px;
        }

        .col-25 {
          float: left;
          width: 25%;
          margin-top: 6px;
        }

        .col-75 {
          float: left;
          width: 75%;
          margin-top: 6px;
        }

        /* Clear floats after the columns */
        .row:after {
          content: "";
          display: table;
          clear: both;
        }

        /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
        @media screen and (max-width: 600px) {
          .col-25, .col-75, input[type=submit] {
            width: 100%;
            margin-top: 0;
          }
        }

        </style>
   </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="{{ asset('user/images/loading.gif')}}" alt="#" /></div>
      </div>
      <!-- end loader -->
      <!-- header -->
      @include('user/header')
      <!-- end header inner -->
      <!-- end header -->
      <!-- banner -->
      <div id="myCarousel" class="carousel slide banner_main" data-ride="carousel">
         <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            {{-- <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
            <li data-target="#myCarousel" data-slide-to="4"></li> --}}
         </ol>
         <div class="carousel-inner">
            <div class="carousel-item active">
               <img class="first-slide" src="{{ asset('user/images/banner.jpg')}}" alt="First slide">
               <div class="container">
                  <div class="carousel-caption relative">
                    <h1 > <span style="font-size: 50px" >@include('user/timer')</span></h1>
                    <a href="{{url('/chat')}}">Contact Us</a>
                  </div>
               </div>
            </div>

         </div>
         <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
         <span class="carousel-control-prev-icon" aria-hidden="true"></span>
         <span class="sr-only">Previous</span>
         </a>
         <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
         <span class="carousel-control-next-icon" aria-hidden="true"></span>
         <span class="sr-only">Next</span>
         </a>
      </div>
      <!-- end banner -->
      <!-- about -->
    <div id="about"  class="about">
      <div class="container">
            {{-- <div class="row d_flex"> --}}
               {{-- <div class="col-md-7" > --}}
                <div class="titlepage">
                    <h2 align="center">Add Notes tttttt</h2>
                    <div class="containers">

                        <br>

                        <form action="{{url('/addusernote')}}" method="POST">
                            @csrf
                          <div class="row" >
                            <div class="col-25" >
                              <label for="">Title</label>
                            </div>
                            <div class="col-75" style=" width: 550px;margin-right:10px ;margin-left:-290px ;">
                                <input type="text" name="title"  placeholder="Enter title" id="name" required>
                            </div>
                          </div>

                          <br>
                          <div class="row">
                            <div class="col-25">
                              <label for="">Note</label>
                            </div>
                            <div class="col-75">
                              <textarea id="subject" name="note" placeholder="Write something.." style="height:200px"></textarea>
                            </div>
                          </div>

                          <div class="row">
                            <input type="submit" value="Add Note">
                        </div>
                        </form>
                    </div>


                </div>


      </div>
    </div>
      <!-- end contact -->
      <!--  footer -->
      @include('user/footer')
      <!-- end footer -->
      <!-- Javascript files-->
      @include('user/scripts')
   </body>
</html>

<head>
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   <style>
      #drop {
          background-color: teal;
          color: white;
          padding: 10px;
          font-size: 16px;
          width: : 200px;
          height: : 60px;
          border-radius: 5px;
          font-size: 20px;
      }
      #drop-down {
          position: relative;
          display: inline-block;

      }
      #dropdown-menu {
          display: none;
          position: absolute;
          background-color: none;
          width: 160px;
          margin-left:-45px;
          border-radius: 5px;
          z-index: 1;
      }
      #dropdown-menu a {
          color: black;
          padding: 12px 16px;
          text-decoration: none;
          display: block;
          margin-top: 3px;
      }
      .gfg {
          font-size:40px;
          font-weight:bold;
          color:#009900;
          Text-align:center;
      }
      p {
          font-size:20px;
          font-weight:bold;
          text-align:center;
      }
      #dropdown-menu a:hover {background-color: #ddd;}
      #drop-down:hover #dropdown-menu {display: block;}
  </style>

</head>
<header>
    <!-- header inner -->
    <div class="header">
       <div class="container-fluid">
          <div class="row">
             <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                <div class="full">
                   <div class="center-desk">
                      <div class="logo">
                      
                         <a href="{{url('/')}}"><img src="{{asset('user/images/logo.png')}}" alt="#" /></a>
                      </div>
                   </div>
                </div>
             </div>
             <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                <div class="header_information">
                   <nav class="navigation navbar navbar-expand-md navbar-dark ">
                      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                      </button>
                      <div class="collapse navbar-collapse" id="navbarsExample04">
                         {{-- <ul class="navbar-nav mr-auto"> --}}
                            {{-- <li class="nav-item active">
                               <a class="nav-link" href="about.html"> About Us  </a>
                            </li> 
                            <li class="nav-item">
                               <a class="nav-link" href="clients.html">Our Clients</a>
                            </li>
                            <li class="nav-item">
                               <a class="nav-link" href="ourwork.html">Our Work</a>
                            </li>
                            <li class="nav-item">
                               <a class="nav-link" href="contact.html">Contact Us</a>
                            </li> --}}
                        
                           <div class="sign_btn">
                              <div id="drop-down" style=" float: right; margin-right: 70px;">
                                 <div class="sign_btn"><a href="{{url('#')}}">Notes</a></div>
                                 <div id="dropdown-menu">
                                                      
                                       <a class="nav-link" href="{{url('/usernote')}}">Add Notes</a>
                  
                                       <a class="nav-link" href="{{url('/shownotes')}}">Show Notes</a>

                                    
                                 </div>
                           </div>
                           </div>
                          

                           
                           <div class="sign_btn">
                              <div id="drop-down" style=" float: right; margin-right: 70px;">
                                 <div class="sign_btn"><a href="{{url('/showmeetings')}}">Meetings</a></div>
                                 <div id="dropdown-menu">
                                 
                                 </div>
                           </div>
                           </div>
                        
                        
                           <div class="sign_btn">
                              <a class="nav-link" href="{{url('/')}}">Home</a>
                           </div>
                           
                         
                            
                         {{-- </ul> --}}
                      



<div class="sign_btn">
   <div id="drop-down" style=" float: right; margin-right: 70px;">
      <div class="sign_btn"><a href="{{url('admin/user/profile')}}">{{Auth::user()->name}}</a></div>
      <div id="dropdown-menu">
        
                        
            <x-jet-dropdown-link href="{{ url('admin/user/profile') }}">
               {{ __('Profile') }}
           </x-jet-dropdown-link>
         @if(Auth::id())
         <form method="GET" action="{{ url('store_logout') }}">
            @csrf 
            {{-- {{ url('logout') }} --}}
             <a href="{{url('store_logout')}}" onclick="event.preventDefault();
                  this.closest('form').submit(); " role="button">
                  {{ __('Log Out') }}
            </a>
        
         </form>
         @endif
          
          
      </div>
  </div>
</div>


                   </nav>
                </div>
             </div>
          </div>
       </div>
    </div>
 </header>

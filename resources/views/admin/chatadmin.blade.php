<!DOCTYPE html>
<html lang="en">
<head>
  @include('admin.adminhead')

    <style>
      .container{max-width:1170px; margin:auto;}
  img{ max-width:100%;}
  .inbox_people {
  background: #f8f8f8 none repeat scroll 0 0;
  float: left;
  overflow: hidden;
  height: 530px;
  width: 40%; border-right:1px solid #c4c4c4;
  }
  .inbox_msg {
  border: 1px solid #c4c4c4;
  clear: both;
  overflow: hidden;
  }
  .top_spac{ margin: 20px 0 0;}
  
  
  .recent_heading {float: left; width:40%;}
  .srch_bar {
  display: inline-block;
  text-align: right;
  width: 60%;
  }
  .headind_srch{ padding:10px 29px 10px 20px; overflow:hidden; border-bottom:1px solid #c4c4c4;}
  
  .recent_heading h4 {
  color: #05728f;
  font-size: 21px;
  margin: auto;
  }
  .srch_bar input{ border:1px solid #cdcdcd; border-width:0 0 1px 0; width:80%; padding:2px 0 4px 6px; background:none;}
  .srch_bar .input-group-addon button {
  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
  border: medium none;
  padding: 0;
  color: #707070;
  font-size: 18px;
  }
  .srch_bar .input-group-addon { margin: 0 0 0 -27px;}
  
  .chat_ib h5{ font-size:15px; color:#464646; margin:0 0 8px 0;}
  .chat_ib h5 span{ font-size:13px; float:right;}
  .chat_ib p{ font-size:14px; color:#989898; margin:auto}
  .chat_img {
  float: left;
  width: 11%;
  }
  .chat_ib {
  float: left;
  padding: 0 0 0 15px;
  width: 88%;
  }
  
  .chat_people{ overflow:hidden; clear:both;}
  .chat_list {
  border-bottom: 1px solid #c4c4c4;
  margin: 0;
  padding: 18px 16px 10px;
  }
  .inbox_chat { height: 550px; overflow-y: scroll;}
  
  .active_chat{ background:#ebebeb;}
  
  .incoming_msg_img {
  display: inline-block;
  width: 6%;
  }
  .received_msg {
  display: inline-block;
  padding: 0 0 0 10px;
  vertical-align: top;
  width: 92%;
  }
  .received_withd_msg p {
  background: #ebebeb none repeat scroll 0 0;
  border-radius: 3px;
  color: #646464;
  font-size: 14px;
  margin: 0;
  padding: 5px 10px 5px 12px;
  width: 80%;
  }
  .time_date {
  color: #747474;
  display: block;
  font-size: 12px;
  margin: 8px 0 0;
  }
  .received_withd_msg { width: 57%;}
  .mesgs {
  float: left;
  padding: 30px 15px 0 25px;
  width: 100%;
  }
  
  .sent_msg p {
  background: #05728f none repeat scroll 0 0;
  border-radius: 3px;
  font-size: 14px;
  margin: 0; color:#fff;
  padding: 5px 10px 5px 12px;
  width:100%;
  
  }
  .outgoing_msg{ overflow:hidden; margin:26px 0 26px;}
  .sent_msg {
  float: right;
  width: 55%;
  }
  .input_msg_write input {
  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
  border: medium none;
  color: #4c4c4c;
  font-size: 15px;
  min-height: 0px;
  width: 100%;
  margin-bottom:20px;
  
  }
  
  .type_msg {border-top: 1px solid #c4c4c4;position: relative;}
  .msg_send_btn {
  background: #05728f none repeat scroll 0 0;
  border: medium none;
  border-radius: 10%;
  color: #fff;
  cursor: pointer;
  font-size: 17px;
  height: 33px;
  position: absolute;
  right: 0;
  top: 6px;
  width: 100px;
  }
  .messaging { padding: 0 0 50px 0;}
  .msg_history {
  height: 516px;
  width: 60%;
  overflow-y: auto;
  margin-top:-510px;
  margin-bottom:20px;
  margin-left:287px;
  }
  </style>
  @livewireStyles
  
  </head>
<body class="g-sidenav-show  bg-gray-200">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="{{url('/adminhome')}}" target="_blank">
        <img src="admin/assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white">Admin Dashboard</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white active bg-gradient-primary" href="{{url('/adminhome')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white " href="{{url('/users')}}">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">person</i>
              </div>
              <span class="nav-link-text ms-1">Users</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white " href="{{url('/attendance')}}">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">person</i>
              </div>
              <span class="nav-link-text ms-1">Attendance</span>
            </a>
          </li>
        <li class="nav-item">
            <a class="nav-link text-white " href="{{url('/searchresult')}}"> 
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">table_view</i>
              </div>
              <span class="nav-link-text ms-1">Search Table</span>
            </a>
          </li>
         <li class="nav-item">
          <a class="nav-link text-white " href="chatnow/4">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">view_in_ar</i>
            </div>
            <span class="nav-link-text ms-1">Virtual Reality</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="{{url('/note')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Add Notes</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="{{url('/shownote')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Show Notes</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="{{url('/showusernotes')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Show Users Notes</span>
          </a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link text-white " href="{{url('/createmeetings')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Create Zoom Meeting</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="{{url('/list')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">List All Meetings</span>
          </a>
        </li>

       
      </ul>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
      <div class="mx-3">
        <a class="btn bg-gradient-primary mt-4 w-100" href="#" type="button">Upgrade to pro</a>
      </div>
    </div>
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    @include('admin.adminnav')
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      

        @include('admin.afternav')

     
            <x-slot name="header">
               <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                   {{ __('Dashboard') }}
               </h2>
           </x-slot>
       
           <div class="py-12 overflow-y-scroll">
               <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                   <div  class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                       <div style="background-color: none" class="p-6 bg-white border-b border-gray-200">
                           @livewire('chat',['reciever'=>$reciever])
                       </div>
                   </div>
               </div>
           </div>
       
        


      @include('admin.adminfooter')
    </div>
  </main>

  @include('admin.afterfooter')

  <!--   Core JS Files   -->
  @include('admin.adminjs')
  <script>
    function scrollDown() {
     document.getElementById('chat').scrollTop =  document.getElementById('chat').scrollHeight
    }
    setInterval(scrollDown, 1000);
      </script>
  @livewireScripts

</body>

</html> 
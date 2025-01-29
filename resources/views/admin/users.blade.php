<!DOCTYPE html>
<html lang="en">

    <head>

        @include('admin.adminhead')
        <style>
            #customers {
              font-family: Arial, Helvetica, sans-serif;
              border-collapse: collapse;
              width: 100%;
            }

            #customers td, #customers th {
              border: 1px solid #ddd;
              padding: 8px;
            }

            #customers tr:nth-child(even){background-color: #f2f2f2;}

            #customers tr:hover {background-color: #ddd;}

            #customers th {
              padding-top: 12px;
              padding-bottom: 12px;
              text-align: left;
              background-color: #04AA6D;
              color: white;
            }
            </style>
    </head>
<body class="g-sidenav-show  bg-gray-200">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="{{url('/adminhome')}}" target="_blank">
        <img src="{{ asset('admin/assets/img/logo-ct.png') }}" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white">Admin Dashboard</span>
      </a>
        {{-- @include('admin.admintimer') --}}
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
              <span class="nav-link-text ms-1">Tables</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white " href="{{url('/adduserview')}}">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">person</i>
              </div>
              <span class="nav-link-text ms-1">Add Users</span>
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

        {{-- <li class="nav-item">
          <a class="nav-link text-white " href="admin/pages/virtual-reality.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">view_in_ar</i>
            </div>
            <span class="nav-link-text ms-1">Virtual Reality</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="admin/pages/rtl.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">format_textdirection_r_to_l</i>
            </div>
            <span class="nav-link-text ms-1">RTL</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="admin/pages/notifications.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">notifications</i>
            </div>
            <span class="nav-link-text ms-1">Notifications</span>
          </a>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account pages</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="admin/pages/profile.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">person</i>
            </div>
            <span class="nav-link-text ms-1">Profile</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="admin/pages/sign-in.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">login</i>
            </div>
            <span class="nav-link-text ms-1">Sign In</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="admin/pages/sign-up.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">assignment</i>
            </div>
            <span class="nav-link-text ms-1">Sign Up</span>
          </a>
        </li> --}}
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

        <table id="customers" style="margin-top: 8px">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Hour Price</th>
            <th>Job</th>
            <th>Total Seconds</th>
            <th>start time 'Login'</th>
            <th>end time 'Logout'</th>
            <th>CV</th>
            <th>action1</th>
            <th>action2</th>
            <th>action3</th>
            {{-- <th>action4</th> --}}
        </tr>
        @foreach ($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->phone}}</td>
            <td>{{$user->address}}</td>
            <td>{{$user->price}}</td>
            <td>{{$user->job}}</td>
            <td>{{$user->total_sec}}</td>
            <td>{{$user->last_login_at}}</td>
            <td>{{$user->last_logout_at}}</td>
            <td>
              <a href="..\CvImageFolder\{{$user->CV}}" download>
                <img src="{{ asset('data:image/jpeg;base64,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') }}" />
                <div >{{$user->cv}}</div>
              </a>
            </td>
            @if($user->usertype == '1')
               <td> <p>Disabled</p> </td>

            @else
                <td class="btn-btn-danger"><a href="{{url('/deleteuser',$user->id)}}">Delete</a></td>


            @endif
            @if($user->usertype == '1')
                <td class="btn-btn-primary"><p>Disabled</p></td>
            @else
                <td class="btn-btn-primary"><a href="{{url('/choose',$user->id)}}">Choose</a></td>
            @endif
            @if($user->usertype == '1')
                <td class="btn-btn-primary"><p>Disabled</p></td>
            @else
                <td class="btn-btn-primary"><a href="{{url('/redefine',$user->id)}}">redefine</a></td>
            @endif
            {{-- @else
                <td class="btn-btn-primary"><a href="{{url('/deteils',$user->id)}}">detels</a></td>
            @endif          --}}
        </tr>

        @endforeach

        </table>


      @include('admin.adminfooter')
    </div>
  </main>

  @include('admin.afterfooter')

  <!--   Core JS Files   -->
  @include('admin.adminjs')
</body>

</html>

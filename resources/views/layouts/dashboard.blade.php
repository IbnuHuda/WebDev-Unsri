<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/dashboard.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard.css') }}">
</head>
<body class="dark-theme">
    <div id="app">
        <div id="sidebar" class="sidebar-expanded d-block col-4">
            <header>
                <a href="{{ route('index') }}" class="d-flex justify-content-center align-items-center mt-3">
                    <img src="{{ asset('images/websites/Logo_VeCo.png') }}" id="VeCoLogo" class="img-responsive">
                    <h2 class="mt-2 ml-2" id="VeCoHeader"><strong>VeCo</strong></h2>
                </a>
            </header>

            <hr />

            <content>
                <ul>
                    <a href="{{ Auth::guard('company')->check() ? route('companyDashboard') : route('usersDashboard') }}">
                        <li>
                            <i class="fa fa-home" id="iconDashboard"></i> <span style="margin-left: 27px;" id="dashboardTitle">Dashboard</span>
                        </li>
                    </a>

                    @if (Auth::guard('company')->check())

                        <a href="{{ route('companySelfProfile') }}">
                            <li>
                                <i class="fa fa-building" id="iconCompanyProfile"></i> <span style="margin-left: 27px;" id="companyProfileTitle">Company Profile</span>
                            </li>
                        </a>

                        <span id="Jobs">
                            <li>
                                <i class="fa fa-filter" id="iconJobs"></i> <span style="margin-left: 30px;" id="jobsTitle">Jobs</span> <i class="fa fa-chevron-right" id="jobsChevron"></i>
                            </li>
                        </span>

                        <ul id="jobsMenus">
                            <a href="{{ route('myCompanyJobs')}}   "><li>My Job</li></a>
                            <a href="{{ route('companyPublishJobs') }}"><li>Publish Job</li></a>
                            <a href="{{ route('companyListJobs')}}"><li>List Job</li></a>
                        </ul>

                        <span id="Activity">
                            <li>
                                <i class="fa fa-list" id="iconActivity"></i> <span style="margin-left: 25px;" id="activityTitle">Activity</span> <i class="fa fa-chevron-right" id="activityChevron"></i>
                            </li>
                        </span>

                        <ul id="activityMenus">
                            <a href="{{route('companyStepSubmission')}}"><li>Submission</li></a>
                            <a href="{{route('companyStepAssesment')}}"><li>Assesment</li></a>
                            <a href="{{route('companyStepApproval')}}"><li>Approval</li></a>
                        </ul>

                    @else

                        <span id="Team">
                            <li>
                                <i class="fa fa-users" id="iconTeam"></i> <span style="margin-left: 25px;" id="teamTitle">Team</span> <i class="fa fa-chevron-right" id="teamChevron"></i>
                            </li>
                        </span>

                        <ul id="teamMenus">
                            <a href="{{ route('usersCreateTeam') }}"><li>Create Team</li></a>
                            <a href="{{ route('usersProfileTeam') }}"><li>Profile Team</li></a>
                        </ul>

                        <span id="Activity">
                            <li>
                                <i class="fa fa-list" id="iconActivity"></i> <span style="margin-left: 25px;" id="activityTitle">Activity</span> <i class="fa fa-chevron-right" id="activityChevron"></i>
                            </li>
                        </span>

                        <ul id="activityMenus">
                            <a href="{{ route('usersListJobs') }}"><li>List Job</li></a>
                            <a href="{{ route('usersSubmission') }}"><li>Submission</li></a>
                            <a href="{{ route('usersAssesment') }}"><li>Assesment</li></a>
                            <a href="{{ route('usersApporval') }}"><li>Approval</li></a>
                        </ul>

                    @endif
                </ul>
            </content>

            <footer>
                <p id="reserved">&reg; 2020 Alright Reserved by VeCo Team</p>
            </footer>
        </div>

        <nav class="navbar navbar-dark" id="navbar">
            <div class="container-fluid">
                <button class="navbar-toggler float-left" id="{{ (Auth::guard('company')->check()) ? 'company-toggler' : 'users-toggler' }}" type="button" data-toggle="collapse" aria-controls="navbarsExample01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                @csrf
                <input type="hidden" id="tokenUsers" value="{{ csrf_token() }}">

                {{-- <div class="input-group w-25 float-left">
                    <input type="text" class="form-control" id="searchUsers" placeholder="Search user ..." aria-label="Recipient's username" aria-describedby="basic-addon2">

                    <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon2">@</span>
                    </div>
                </div> --}}
                @if (Auth::guard('company')->check())
                    <img src="{{ (Auth::guard('company')->user()->usersProfile->isEmpty() || Auth::guard('company')->user()->usersProfile[0]->photo == null) ? asset('images/websites/def_photo.png') : url('storage/images/company/'. Auth::guard('company')->user()->usersProfile[0]->photo) }}" style="border: 0.5px solid #fff;" class="rounded-circle float-right" id="photo" data-toggle="tooltip" data-html="true">
                @else
                    <img src="{{ (Auth::user()->usersProfile->isEmpty() || Auth::user()->usersProfile[0]->photo == null) ? asset('images/websites/def_photo.png') : url('storage/images/users/'. Auth::user()->usersProfile[0]->photo) }}" class="rounded-circle float-right" id="photo" style="border: 0.5px solid #fff;" data-toggle="tooltip" data-html="true">
                @endif
                {{-- <img src="{{ asset('/images/users/1/示例图片_01.jpg') }}" > --}}
            </div>
        </nav>

        <main>
            <div class="container-fluid" id="main-content">
                <br />
                <br />
                <br />
                {{-- <div class="col-5"></div> --}}
                {{-- <div class="col-md-9"> --}}
                @yield('content')

                {{-- </div> --}}
                <br />
            </div>
        </main>

        <div id="theme-toggler">
            <i class="fa fa-moon-o" id="themeIcon"></i>
        </div>

        <div id="profileBox" class="text-center">
            @if (Auth::guard('company')->check())
                <span>Logged as <br /><strong>{{ Auth::guard('company')->user()->name }}</strong></span>
                <hr width="100%" />
                <a href="{{ route('companyLogout') }}">Logout</a>
        </div>
            @else
                <span>Logged as <br /><strong>{{ Auth::user()->name }}</strong></span>
                <hr width="100%" />
                <a href="{{ route('usersProfile') }}">Profile</a><br />
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
        </div>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>

        @endif
    </div>
</body>
</html>

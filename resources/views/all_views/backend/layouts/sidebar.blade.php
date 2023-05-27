<!-- 
// Dynamic Menue..............

@php
    $prefix=Request::route()->getPrefix();
    $route=Route::current()->getName();
    $user_role_array=Auth::user()->user_role;
    if(count($user_role_array)==0){
      $user_role = [];
    }else{
      foreach($user_role_array as $rolee){
        $user_role[] = $rolee->role_id;
      }
    }
    $parentroutearray = explode('.',$route);
    $parentroute = $parentroutearray[0];
    $childroute = $parentroute.'.'.@$parentroutearray[1];
    $nav_menu=[];
@endphp

@if(Auth::user()->id=='1')
    @php
        $grand_parents = App\Model\Menu::where('parent', 0)->where('status',1)->orderBy('sort', 'asc')->get();
        foreach ($grand_parents as  $grand_parent){
          $nav_menu[$grand_parent->id]['grand_parent']=$grand_parent->name;
          $nav_menu[$grand_parent->id]['grand_parent_route']=$grand_parent->route;
          $nav_menu[$grand_parent->id]['grand_parent_icon']=$grand_parent->icon;
          $parents=App\Model\Menu::where('parent', $grand_parent->id)->where('status',1)->orderBy('sort', 'asc')->get();
          foreach($parents as $parent){
            $nav_menu[$grand_parent->id]['parent'][$parent->id]['parent_id']=$parent->id;
            $nav_menu[$grand_parent->id]['parent'][$parent->id]['parent_name']=$parent->name;
            $nav_menu[$grand_parent->id]['parent'][$parent->id]['parent_route']=$parent->route;
            $childs=App\Model\Menu::where('parent', $parent->id)->where('status',1)->orderBy('sort', 'asc')->get();
            foreach($childs as $child){
              $nav_menu[$grand_parent->id]['is_child']='yes';
              $nav_menu[$grand_parent->id]['parent'][$parent->id]['child'][$child->id]['child_id']=$child->id;
              $nav_menu[$grand_parent->id]['parent'][$parent->id]['child'][$child->id]['child_name']=$child->name;
              $nav_menu[$grand_parent->id]['parent'][$parent->id]['child'][$child->id]['child_route']=$child->route;
            }
          }
        }
    @endphp
@else
    @php
        $grand_parents = App\Model\Menu::where('parent', 0)->where('status',1)->where('id','!=',1)->orderBy('sort', 'asc')->get();
        foreach ($grand_parents as  $grand_parent){
          $parents=App\Model\Menu::where('parent', $grand_parent->id)->where('status',1)->orderBy('sort', 'asc')->get();
          foreach($parents as $parent){
            $check_parent=App\Model\MenuPermission::where('menu_id',$parent->id)->whereIn('role_id',@$user_role)->first();
            if($check_parent){
              $permission=App\Model\MenuPermission::where('permitted_route',$parent->route)->whereIn('role_id', @$user_role)->first();
              if($permission){
                $nav_menu[$grand_parent->id]['grand_parent']=$grand_parent->name;
                $nav_menu[$grand_parent->id]['grand_parent_route']=$grand_parent->route;
                $nav_menu[$grand_parent->id]['grand_parent_icon']=$grand_parent->icon;
                $nav_menu[$grand_parent->id]['parent'][$parent->id]['parent_id']=$parent->id;
                $nav_menu[$grand_parent->id]['parent'][$parent->id]['parent_name']=$parent->name;
                $nav_menu[$grand_parent->id]['parent'][$parent->id]['parent_route']=$parent->route;
              }
            }

            $childs=App\Model\Menu::where('parent', $parent->id)->where('status',1)->orderBy('sort', 'asc')->get();
            if(count($childs)>0){
              foreach($childs as $child){
                $permission=App\Model\MenuPermission::where('permitted_route',$child->route)->whereIn('role_id', @$user_role)->first();
                if($permission){
                  $nav_menu[$grand_parent->id]['is_child']='yes';
                  $nav_menu[$grand_parent->id]['grand_parent']=$grand_parent->name;
                  $nav_menu[$grand_parent->id]['grand_parent_route']=$grand_parent->route;
                  $nav_menu[$grand_parent->id]['grand_parent_icon']=$grand_parent->icon;
                  $nav_menu[$grand_parent->id]['parent'][$parent->id]['parent_name']=$parent->name;
                  $nav_menu[$grand_parent->id]['parent'][$parent->id]['parent_route']=$parent->route;
                  $nav_menu[$grand_parent->id]['parent'][$parent->id]['child'][$child->id]['child_id']=$child->id;
                  $nav_menu[$grand_parent->id]['parent'][$parent->id]['child'][$child->id]['child_name']=$child->name;
                  $nav_menu[$grand_parent->id]['parent'][$parent->id]['child'][$child->id]['child_route']=$child->route;
                }
              }
            }
          }
        }
    @endphp
@endif

// End Dynamick Menu -->
{{-- Menu Initialized from $nav_menu Array --}}
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{route('dashboard')}}" class="brand-link">
        <img src="{{asset('public/backend/img/AdminLTELogo.png')}}" alt="Admin Dashboard"
             class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Accounts</span>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('public/backend/profile.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{auth()->user()->name}}</a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{route('dashboard')}}" class="nav-link {{$route == 'dashboard'?'active':''}}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>


                {{--
                Statick master setup menue for temporary use
                Create date: 21/01/2021, Author : Rajan Bhatta.
                --}}
                <li class="nav-item has-treeview {!!  in_array(Request::segment(1), ['department', 'designation', 'employee', 'roster', 'visitor', 'visitor-assign', 'applied-leave']) ?  'menu-open' : "" !!}">
                    <a href="#" class="nav-link {!!  in_array(Request::segment(1), ['department', 'designation', 'employee', 'roster', 'visitor', 'visitor-assign']) ?  'active' : "" !!} ">
                        <i class="nav-icon fa fa-th-large"></i>
                        <p>
                            Basic Setup
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display:{!!  in_array(Request::segment(1), ['department', 'designation', 'employee', 'roster', 'visitor', 'visitor-assign', 'applied-leave']) ?  'block' : "" !!};">

                        <li class="nav-item">
                            <a href="{{route('department.index')}}" class="nav-link {!!  in_array(Request::segment(1), ['department']) ?  'active' : "" !!}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Departments</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('designation.index')}}" class="nav-link  {!!  in_array(Request::segment(1), ['designation']) ?  'active' : "" !!}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Designation</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('employee.index')}}" class="nav-link {!!  in_array(Request::segment(1), ['employee']) ?  'active' : "" !!}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Employee</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('roster.index')}}" class="nav-link {!!  in_array(Request::segment(1), ['roster']) ?  'active' : "" !!}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Roster</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('visitor.index')}}" class="nav-link {!!  in_array(Request::segment(1), ['visitor']) ?  'active' : "" !!}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Visitors</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('visitor-assign.index')}}" class="nav-link {!!  in_array(Request::segment(1), ['visitor-assign']) ?  'active' : "" !!}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Card assign to visitor</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('applied-leave.index')}}" class="nav-link {!!  in_array(Request::segment(1), ['applied-leave']) ?  'active' : "" !!}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Apply Leave</p>
                            </a>
                        </li>

                      <!--   <li class="nav-item">
                            <a href="#" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Declard Holiday</p>
                            </a>
                        </li> -->

                        <li class="nav-item">
                            <a href="{{route('attendance-live.index')}}" class="nav-link" target="_blank">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Live Attendance</p>
                            </a>
                        </li>

                    </ul>
                </li>


                <li class="nav-item has-treeview {!!  in_array(Request::segment(1), ['default-setting', 'another-setting']) ?  'menu-open' : "" !!}">
                    <a href="#" class="nav-link {!!  in_array(Request::segment(1), ['default-setting', 'another-setting']) ?  'active' : "" !!} ">
                        <i class="nav-icon fa fa-th-large"></i>
                        <p>
                             Fiscal Year Settings
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display:{!!  in_array(Request::segment(1), ['default-setting', 'another-setting']) ?  'block' : "" !!};">


                        <li class="nav-item">
                            <a href="{{route('default-setting.index')}}" class="nav-link {!!  in_array(Request::segment(1), ['default-setting']) ?  'active' : "" !!}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Default Setting</p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="{{route('another-setting.index')}}" class="nav-link {!!  in_array(Request::segment(1), ['another-setting']) ?  'active' : "" !!}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sepecific Employee setting</p>
                            </a>
                        </li>

                      

                       <!--  <li class="nav-item">
                            <a href="#" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sepecial Duty Time</p>
                            </a>
                        </li> -->


                    </ul>
                </li>


                <li class="nav-item has-treeview {!!  in_array(Request::segment(1), ['general-reports', 'roster-reports', 'driver-reports', 'management-reports', 'contractor-reports', 'daily_workers-reports', 'housekeeper-reports', 'security_guards-reports', 'temporary-reports', 'visitor-reports']) ?  'menu-open' : "" !!} ">
                    <a href="#" class="nav-link  {!!  in_array(Request::segment(1), ['general-reports', 'roster-reports', 'driver-reports', 'management-reports', 'contractor-reports', 'daily_workers-reports', 'housekeeper-reports', 'security_guards-reports', 'temporary-reports', 'visitor-reports']) ?  'active' : "" !!}  ">
                        <i class="nav-icon fa fa-th-large"></i>
                        <p>
                            Reports
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display:{!!  in_array(Request::segment(1), ['general-reports', 'roster-reports', 'driver-reports', 'management-reports', 'contractor-reports', 'daily_workers-reports', 'housekeeper-reports', 'security_guards-reports', 'temporary-reports', 'visitor-reports']) ?  'block' : "" !!}">

                         <li class="nav-item">
                            <a href="{{route('management-reports.index')}}" class="nav-link  {!!  in_array(Request::segment(1), ['management-reports']) ?  'active' : "" !!}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Management Attendance</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('general-reports.index')}}" class="nav-link  {!!  in_array(Request::segment(1), ['general-reports']) ?  'active' : "" !!}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>General Attendance</p>
                            </a>
                        </li>
                         <li class="nav-item">
                            <a href="{{route('roster-reports.index')}}" class="nav-link  {!!  in_array(Request::segment(1), ['roster-reports']) ?  'active' : "" !!}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Roster Attendance</p>
                            </a>
                        </li>

                         <li class="nav-item">
                            <a href="{{route('driver-reports.index')}}" class="nav-link  {!!  in_array(Request::segment(1), ['driver-reports']) ?  'active' : "" !!}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Driver Attendance</p>
                            </a>
                        </li>

                         <li class="nav-item">
                            <a href="{{route('contractor-reports.index')}}" class="nav-link  {!!  in_array(Request::segment(1), ['contractor-reports']) ?  'active' : "" !!}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Contractor Attendance</p>
                            </a>
                        </li>

                         <li class="nav-item">
                            <a href="{{route('daily_workers-reports.index')}}" class="nav-link  {!!  in_array(Request::segment(1), ['daily_workers-reports']) ?  'active' : "" !!}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Daily Workers Attendance</p>
                            </a>
                        </li>

                         <li class="nav-item">
                            <a href="{{route('housekeeper-reports.index')}}" class="nav-link  {!!  in_array(Request::segment(1), ['housekeeper-reports']) ?  'active' : "" !!}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>House keeper Attendance</p>
                            </a>
                        </li>

                         <li class="nav-item">
                            <a href="{{route('security_guards-reports.index')}}" class="nav-link  {!!  in_array(Request::segment(1), ['security_guards-reports']) ?  'active' : "" !!}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Security Guards Attendance</p>
                            </a>
                        </li>

                         <li class="nav-item">
                            <a href="{{route('temporary-reports.index')}}" class="nav-link  {!!  in_array(Request::segment(1), ['temporary-reports']) ?  'active' : "" !!}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Temporary Employee</p>
                            </a>
                        </li>


                         <li class="nav-item">
                            <a href="{{route('visitor-reports.index')}}" class="nav-link  {!!  in_array(Request::segment(1), ['visitor-reports']) ?  'active' : "" !!}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Visitors Reports</p>
                            </a>
                        </li>

                        

                    </ul>
                </li>


              <!--   //Dynamic Menue............

                <li class="nav-header">Site Settings</li>

                @foreach($nav_menu as $grand_menu)
                    <li class="nav-item has-treeview {{$parentroute==$grand_menu['grand_parent_route'] ? 'menu-open' :''}}">
                        <a href="#" class="nav-link {{$parentroute==$grand_menu['grand_parent_route'] ? 'active' :''}}">
                            <i class="nav-icon {{$grand_menu['grand_parent_icon'] ? $grand_menu['grand_parent_icon'] :'fas fa-tools'}}"></i>
                            <p>
                                {{$grand_menu['grand_parent']}}
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview"
                            style="{{$parentroute==$grand_menu['grand_parent_route'] ? 'display:block' :'display:none'}}">
                            @foreach($grand_menu['parent'] as $parent_menu)
                                @if(!empty($parent_menu['child']))
                                @else
                                    <li class="nav-item">
                                        <a href="{{route($parent_menu['parent_route'])}}"
                                           class="nav-link {{$route==$parent_menu['parent_route'] ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>{{$parent_menu['parent_name']}}</p>
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </li>
                @endforeach
                Dynamic Menue............. -->

            </ul>
        </nav>
    </div>
</aside>









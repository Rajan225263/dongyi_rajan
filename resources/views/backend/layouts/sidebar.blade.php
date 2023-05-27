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
                <li class="nav-item has-treeview {!!  in_array(Request::segment(1), ['department', 'designation', 'employee', 'roster', 'visitor', 'visitor-assign', 'applied-leave', 'account']) ?  'menu-open' : "" !!}">
                    <a href="#" class="nav-link {!!  in_array(Request::segment(1), ['department', 'designation', 'employee', 'roster', 'visitor', 'visitor-assign', 'account', 'transaction']) ?  'active' : "" !!} ">
                        <i class="nav-icon fa fa-th-large"></i>
                        <p>
                            Basic Setup
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display:{!!  in_array(Request::segment(1), ['account', 'transaction']) ?  'block' : "" !!};">

                        <li class="nav-item">
                            <a href="{{route('account.index')}}" class="nav-link {!!  in_array(Request::segment(1), ['account']) ?  'active' : "" !!}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Accounts</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('transaction.index')}}" class="nav-link {!!  in_array(Request::segment(1), ['transaction']) ?  'active' : "" !!}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Transactions</p>
                            </a>
                        </li>

                    </ul>
                </li>

            </ul>
        </nav>
    </div>
</aside>









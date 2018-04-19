<aside class="main-sidebar">
    <section class="sidebar">    
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('images/user.png')}}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>Inventory</p>
            </div>
        </div>
        <ul class="sidebar-menu" data-widget="tree">
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>menu</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('get.location')}}"><i class="fa fa-circle-o"></i>Add New Location</a></li>
                    @if (\Auth::user()->role == 'super-admin')
                    <li><a href="{{route('role')}}"><i class="fa fa-circle-o"></i>Set User Access</a></li>
                    @endif
                </ul>
            </li> 
        </ul>
    </section>
</aside>
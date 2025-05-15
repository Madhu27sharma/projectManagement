<aside class="main-sidebar">
   <section class="sidebar">
      <div class="user-panel">
         <div class="pull-left image">
            <img src="">
         </div>
         <div class="pull-left info">
            <p style="font-size: 20px; color: white; font-weight: 700;">Admin</p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
         </div>
      </div>

      <ul class="sidebar-menu" data-widget="tree">
         <!-- Dashboard -->
         <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>

         <!-- Projects -->
         <li class="treeview">
            <a href="#">
               <i class="fa fa-folder"></i> <span>Projects</span>
               <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
            </a>
            <ul class="treeview-menu">
               <li><a href="{{ route('projects.index') }}"><i class="fa fa-list"></i> All Projects</a></li>
               <li><a href="{{ route('projects.create') }}"><i class="fa fa-plus"></i> Create Project</a></li>
            </ul>
         </li>
         <!-- Tasks -->
         <!-- <li>
            <a href="{{ route('projects.index') }}">
               <i class="fa fa-tasks"></i> <span>Tasks</span>
            </a>
         </li> -->

         <!-- Logout -->
         <li>
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
               <i class="fa fa-sign-out"></i> Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
               @csrf
            </form>
         </li>
      </ul>
   </section>
</aside>

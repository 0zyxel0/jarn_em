<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('img/avatar5.png')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p> {{ Auth::user()->name }} </p>
            </div>
        </div>

        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
                <a href="/jarn_em/public/dashboard">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>Employees</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/jarn_em/public/newEmployee"><i class="fa fa-circle-o"></i> New Employee</a></li>
                    <li><a href="/jarn_em/public/showEmployeeList"><i class="fa fa-circle-o"></i> Employee List</a></li>

                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>Teams</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/jarn_em/public/createteam"><i class="fa fa-circle-o"></i> Create Team</a></li>

                    <li><a href="/jarn_em/public/viewTeamList"><i class="fa fa-circle-o"></i> View Team</a></li>

                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-asterisk"></i> <span>Projects</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <!--i><a href="/jarn_em/public/newprojects"><i class="fa fa-circle-o"></i> Create Project Category</a></li-->
                    <li><a href="/jarn_em/public/viewprojects"><i class="fa fa-circle-o"></i> View Projects</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>Attendance</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/jarn_em/public/areatiles"><i class="fa fa-circle-o"></i>Plot Attendance</a></li>


                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>Schedule</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/jarn_em/public/createSchedule"><i class="fa fa-circle-o"></i>Create Schedule</a></li>



                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>Deduction</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/jarn_em/public/createDeductionType"><i class="fa fa-circle-o"></i>Deduction Type</a></li>
                    <li><a href="/jarn_em/public/viewdeductionlist"><i class="fa fa-circle-o"></i>View Deduction List</a></li>


                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-table"></i> <span>Payroll</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/jarn_em/public/viewList"><i class="fa fa-circle-o"></i> Create Payslip</a></li>
                    <li><a href="/jarn_em/public/viewdeductionlist"><i class="fa fa-circle-o"></i> Manage Deduction</a></li>
                    <li><a href="/jarn_em/public/viewList"><i class="fa fa-circle-o"></i> Cash Advance</a></li>

                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Area</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/jarn_em/public/area"><i class="fa fa-circle-o"></i> Area List</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Inventory</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/jarn_em/public/viewInventory"><i class="fa fa-circle-o"></i>Inventory List</a></li>
                </ul>
            </li>

            <li><a href="/jarn_em/public/viewReports"><i class="fa fa-pie-chart"></i> <span>Reports</span></a></li>

            <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>Documentation</span></a></li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
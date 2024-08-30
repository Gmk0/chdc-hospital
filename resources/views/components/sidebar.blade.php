<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">

            @if (auth()->user()->isAdmin())


            <ul>
                <li class="menu-title">Main</li>
                <li>
                    <a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
                </li>
                <li>
                    <a href="{{route('admin.listdoctor')}}"><i class="fa fa-user-md"></i> <span>Doctors</span></a>
                </li>
                <li>
                    <a href=""><i class="fa fa-wheelchair"></i> <span>Patients</span></a>
                </li>
                <li>
                    <a href="{{route('admin.departement')}}"><i class="fa fa-calendar"></i> <span>Appointments</span></a>
                </li>
                <li>
                    <a href="{{route('admin.doctorschedule')}}"><i class="fa fa-calendar-check-o"></i> <span>Doctor
                            Schedule</span></a>
                </li>
                <li>
                    <a href="{{route('admin.departement')}}"><i class="fa fa-hospital-o"></i> <span>Departments</span></a>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fa fa-user"></i> <span> Employees </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{route('admin.employees')}}">Employees List</a></li>
                        <li><a href="{{route('admin.employeconge')}}">Conger</a></li>

                        <li><a href="{{route('admin.attendance')}}">Attendance</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fa fa-money"></i> <span> Comptes </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="invoices.html">Invoices</a></li>
                        <li><a href="payments.html">Payments</a></li>
                        <li><a href="expenses.html">Expenses</a></li>
                        <li><a href="taxes.html">Taxes</a></li>
                        <li><a href="provident-fund.html">Provident Fund</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fa fa-book"></i> <span> Payroll </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="salary.html"> Employee Salary </a></li>
                        <li><a href="salary-view.html"> Payslip </a></li>
                        <li><a href="{{route('admin.salarysettings')}}"> Parametres salaires </a></li>
                    </ul>
                </li>

                <li class="submenu">
                    <a href="#"><i class="fa fa-flag-o"></i> <span> Reports </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="expense-reports.html"> Expense Report </a></li>
                        <li><a href="invoice-reports.html"> Invoice Report </a></li>
                    </ul>
                </li>

                <li class="submenu">
                    <a href="#"><i class="fa fa-cog"></i> <span> Settings </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{route('admin.localisation')}}"> Localisation </a></li>
                        <li><a href="{{route('admin.rolepermissions')}}"> Roles et permissions </a>
                        </li> <li><a href="{{route('admin.themesettings')}}"> Theme </a></li>
                    </ul>
                </li>
                </ul>

                @endif

        </div>
    </div>
</div>







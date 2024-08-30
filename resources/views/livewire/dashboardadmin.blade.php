<?php

use Livewire\Volt\Component;

new class extends Component {

    public function with(){

        return [
            'patients'=>\App\Models\Patient::All()->count(),
            'staffMed'=>\App\Models\StaffMedical::All()->count(),
            'attent'=>\App\Models\Appointement::where('status','en attente')->count(),
            'annuler'=>\App\Models\Appointement::where('status','annuler')->count(),
        ];
    }
    //
}; ?>



<div class="content">
    <div class="row">
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="dash-widget">
                <span class="dash-widget-bg1"><i class="fa fa-stethoscope" aria-hidden="true"></i></span>
                <div class="text-right dash-widget-info">
                    <h3>{{$staffMed}}</h3>
                    <span class="widget-title1">Doctors <i class="fa fa-check" aria-hidden="true"></i></span>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="dash-widget">
                <span class="dash-widget-bg2"><i class="fa fa-user-o"></i></span>
                <div class="text-right dash-widget-info">
                    <h3>{{$patients}}</h3>
                    <span class="widget-title2">Patients <i class="fa fa-check" aria-hidden="true"></i></span>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="dash-widget">
                <span class="dash-widget-bg3"><i class="fa fa-user-md" aria-hidden="true"></i></span>
                <div class="text-right dash-widget-info">
                    <h3>{{$attent}}</h3>
                    <span class="widget-title3">Attend <i class="fa fa-check" aria-hidden="true"></i></span>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="dash-widget">
                <span class="dash-widget-bg4"><i class="fa fa-heartbeat" aria-hidden="true"></i></span>
                <div class="text-right dash-widget-info">
                    <h3>{{$annuler}}</h3>
                    <span class="widget-title4">Pending <i class="fa fa-check" aria-hidden="true"></i></span>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-6 col-lg-6 col-xl-6">
            <div class="card">
                <div class="card-body">
                    <div class="chart-title">
                        <h4>Patient Total</h4>
                        <span class="float-right"><i class="fa fa-caret-up" aria-hidden="true"></i> 15% Higher than Last
                            Month</span>
                    </div>
                    <canvas id="linegraph"></canvas>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-6 col-xl-6">
            <div class="card">
                <div class="card-body">
                    <div class="chart-title">
                        <h4>Patients In</h4>
                        <div class="float-right">
                            <ul class="chat-user-total">
                                <li><i class="fa fa-circle current-users" aria-hidden="true"></i>ICU</li>
                                <li><i class="fa fa-circle old-users" aria-hidden="true"></i> OPD</li>
                            </ul>
                        </div>
                    </div>
                    <canvas id="bargraph"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-6 col-lg-8 col-xl-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title d-inline-block">Upcoming Appointments</h4> <a href="appointments.html"
                        class="float-right btn btn-primary">View all</a>
                </div>
                <div class="p-0 card-body">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="d-none">
                                <tr>
                                    <th>Patient Name</th>
                                    <th>Doctor Name</th>
                                    <th>Timing</th>
                                    <th class="text-right">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="min-width: 200px;">
                                        <a class="avatar" href="profile.html">B</a>
                                        <h2><a href="profile.html">Bernardo Galaviz <span>New York, USA</span></a></h2>
                                    </td>
                                    <td>
                                        <h5 class="p-0 time-title">Appointment With</h5>
                                        <p>Dr. Cristina Groves</p>
                                    </td>
                                    <td>
                                        <h5 class="p-0 time-title">Timing</h5>
                                        <p>7.00 PM</p>
                                    </td>
                                    <td class="text-right">
                                        <a href="appointments.html" class="btn btn-outline-primary take-btn">Take up</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="min-width: 200px;">
                                        <a class="avatar" href="profile.html">B</a>
                                        <h2><a href="profile.html">Bernardo Galaviz <span>New York, USA</span></a></h2>
                                    </td>
                                    <td>
                                        <h5 class="p-0 time-title">Appointment With</h5>
                                        <p>Dr. Cristina Groves</p>
                                    </td>
                                    <td>
                                        <h5 class="p-0 time-title">Timing</h5>
                                        <p>7.00 PM</p>
                                    </td>
                                    <td class="text-right">
                                        <a href="appointments.html" class="btn btn-outline-primary take-btn">Take up</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="min-width: 200px;">
                                        <a class="avatar" href="profile.html">B</a>
                                        <h2><a href="profile.html">Bernardo Galaviz <span>New York, USA</span></a></h2>
                                    </td>
                                    <td>
                                        <h5 class="p-0 time-title">Appointment With</h5>
                                        <p>Dr. Cristina Groves</p>
                                    </td>
                                    <td>
                                        <h5 class="p-0 time-title">Timing</h5>
                                        <p>7.00 PM</p>
                                    </td>
                                    <td class="text-right">
                                        <a href="appointments.html" class="btn btn-outline-primary take-btn">Take up</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="min-width: 200px;">
                                        <a class="avatar" href="profile.html">B</a>
                                        <h2><a href="profile.html">Bernardo Galaviz <span>New York, USA</span></a></h2>
                                    </td>
                                    <td>
                                        <h5 class="p-0 time-title">Appointment With</h5>
                                        <p>Dr. Cristina Groves</p>
                                    </td>
                                    <td>
                                        <h5 class="p-0 time-title">Timing</h5>
                                        <p>7.00 PM</p>
                                    </td>
                                    <td class="text-right">
                                        <a href="appointments.html" class="btn btn-outline-primary take-btn">Take up</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="min-width: 200px;">
                                        <a class="avatar" href="profile.html">B</a>
                                        <h2><a href="profile.html">Bernardo Galaviz <span>New York, USA</span></a></h2>
                                    </td>
                                    <td>
                                        <h5 class="p-0 time-title">Appointment With</h5>
                                        <p>Dr. Cristina Groves</p>
                                    </td>
                                    <td>
                                        <h5 class="p-0 time-title">Timing</h5>
                                        <p>7.00 PM</p>
                                    </td>
                                    <td class="text-right">
                                        <a href="appointments.html" class="btn btn-outline-primary take-btn">Take up</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4 col-xl-4">
            <div class="card member-panel">
                <div class="bg-white card-header">
                    <h4 class="mb-0 card-title">Doctors</h4>
                </div>
                <div class="card-body">
                    <ul class="contact-list">
                        <li>
                            <div class="contact-cont">
                                <div class="float-left user-img m-r-10">
                                    <a href="profile.html" title="John Doe"><img src="assets/img/user.jpg" alt=""
                                            class="w-40 rounded-circle"><span class="status online"></span></a>
                                </div>
                                <div class="contact-info">
                                    <span class="contact-name text-ellipsis">John Doe</span>
                                    <span class="contact-date">MBBS, MD</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="contact-cont">
                                <div class="float-left user-img m-r-10">
                                    <a href="profile.html" title="Richard Miles"><img src="assets/img/user.jpg" alt=""
                                            class="w-40 rounded-circle"><span class="status offline"></span></a>
                                </div>
                                <div class="contact-info">
                                    <span class="contact-name text-ellipsis">Richard Miles</span>
                                    <span class="contact-date">MD</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="contact-cont">
                                <div class="float-left user-img m-r-10">
                                    <a href="profile.html" title="John Doe"><img src="assets/img/user.jpg" alt=""
                                            class="w-40 rounded-circle"><span class="status away"></span></a>
                                </div>
                                <div class="contact-info">
                                    <span class="contact-name text-ellipsis">John Doe</span>
                                    <span class="contact-date">BMBS</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="contact-cont">
                                <div class="float-left user-img m-r-10">
                                    <a href="profile.html" title="Richard Miles"><img src="assets/img/user.jpg" alt=""
                                            class="w-40 rounded-circle"><span class="status online"></span></a>
                                </div>
                                <div class="contact-info">
                                    <span class="contact-name text-ellipsis">Richard Miles</span>
                                    <span class="contact-date">MS, MD</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="contact-cont">
                                <div class="float-left user-img m-r-10">
                                    <a href="profile.html" title="John Doe"><img src="assets/img/user.jpg" alt=""
                                            class="w-40 rounded-circle"><span class="status offline"></span></a>
                                </div>
                                <div class="contact-info">
                                    <span class="contact-name text-ellipsis">John Doe</span>
                                    <span class="contact-date">MBBS</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="contact-cont">
                                <div class="float-left user-img m-r-10">
                                    <a href="profile.html" title="Richard Miles"><img src="assets/img/user.jpg" alt=""
                                            class="w-40 rounded-circle"><span class="status away"></span></a>
                                </div>
                                <div class="contact-info">
                                    <span class="contact-name text-ellipsis">Richard Miles</span>
                                    <span class="contact-date">MBBS, MD</span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="text-center bg-white card-footer">
                    <a href="doctors.html" class="text-muted">View all Doctors</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-6 col-lg-8 col-xl-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title d-inline-block">New Patients </h4> <a href="patients.html"
                        class="float-right btn btn-primary">View all</a>
                </div>
                <div class="card-block">
                    <div class="table-responsive">
                        <table class="table mb-0 new-patient-table">
                            <tbody>
                                <tr>
                                    <td>
                                        <img width="28" height="28" class="rounded-circle" src="assets/img/user.jpg"
                                            alt="">
                                        <h2>John Doe</h2>
                                    </td>
                                    <td>Johndoe21@gmail.com</td>
                                    <td>+1-202-555-0125</td>
                                    <td><button class="float-right btn btn-primary btn-primary-one">Fever</button></td>
                                </tr>
                                <tr>
                                    <td>
                                        <img width="28" height="28" class="rounded-circle" src="assets/img/user.jpg"
                                            alt="">
                                        <h2>Richard</h2>
                                    </td>
                                    <td>Richard123@yahoo.com</td>
                                    <td>202-555-0127</td>
                                    <td><button class="float-right btn btn-primary btn-primary-two">Cancer</button></td>
                                </tr>
                                <tr>
                                    <td>
                                        <img width="28" height="28" class="rounded-circle" src="assets/img/user.jpg"
                                            alt="">
                                        <h2>Villiam</h2>
                                    </td>
                                    <td>Richard123@yahoo.com</td>
                                    <td>+1-202-555-0106</td>
                                    <td><button class="float-right btn btn-primary btn-primary-three">Eye</button></td>
                                </tr>
                                <tr>
                                    <td>
                                        <img width="28" height="28" class="rounded-circle" src="assets/img/user.jpg"
                                            alt="">
                                        <h2>Martin</h2>
                                    </td>
                                    <td>Richard123@yahoo.com</td>
                                    <td>776-2323 89562015</td>
                                    <td><button class="float-right btn btn-primary btn-primary-four">Fever</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4 col-xl-4">
            <div class="hospital-barchart">
                <h4 class="card-title d-inline-block">Hospital Management</h4>
            </div>
            <div class="bar-chart">
                <div class="legend">
                    <div class="item">
                        <h4>Level1</h4>
                    </div>

                    <div class="item">
                        <h4>Level2</h4>
                    </div>
                    <div class="text-right item">
                        <h4>Level3</h4>
                    </div>
                    <div class="text-right item">
                        <h4>Level4</h4>
                    </div>
                </div>
                <div class="clearfix chart">
                    <div class="item">
                        <div class="bar">
                            <span class="percent">16%</span>
                            <div class="item-progress" data-percent="16">
                                <span class="title">OPD Patient</span>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="bar">
                            <span class="percent">71%</span>
                            <div class="item-progress" data-percent="71">
                                <span class="title">New Patient</span>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="bar">
                            <span class="percent">82%</span>
                            <div class="item-progress" data-percent="82">
                                <span class="title">Laboratory Test</span>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="bar">
                            <span class="percent">67%</span>
                            <div class="item-progress" data-percent="67">
                                <span class="title">Treatment</span>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="bar">
                            <span class="percent">30%</span>
                            <div class="item-progress" data-percent="30">
                                <span class="title">Discharge</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


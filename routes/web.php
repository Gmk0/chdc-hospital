<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;





Volt::route('/patients/add', 'patient.addpatient');
Volt::route('/patients/{patient}/edit', 'patient.editpatient')->name('patient.edit');
Volt::route('/patients', 'patient.listpatient');



Volt::route('/appointement/{apt}/edit', 'patient.editappointement')->name('patient.appointement.edit');



Volt::route('/appointement/add', 'patient.addappointement')->name('patient.appointement.add');


Volt::route('/appointement', 'patient.appointement');


Route::middleware(['auth'])->group(function(){

    Route::prefix('admin')->group(function(){
        Volt::route('/dashboard', 'dashboardAdmin')->name('admin.dashboard');
        Volt::route('/department/ajouter', 'admin.adddepartement')->name('admin.adddepartement');
        Volt::route('/department/modifier/{departement}', 'admin.editdepartement')->name('admin.editdepartement');
        Volt::route('/department', 'admin.departement')->name('admin.departement');
        Volt::route('/list-employee/add', 'employee.addemployee')->name('admin.addemployee');
        Volt::route('/list-employee/{user}/modifier', 'employee.modifieremploye')->name('admin.modifieremploye');
        Volt::route('/list-employee', 'employee.listemploye')->name('admin.employees');

        Volt::route('/conger-employee', 'employee.employeconge')->name('admin.employeconge');

        Volt::route('/presence-employee', 'employee.attendance')->name('admin.attendance');

        Volt::route('/doctors/{staff}/modifier', 'doctor.editdoctor')->name('admin.editdoctor');

        Volt::route('/doctors/add', 'doctor.adddoctor')->name('admin.adddoctor');

        Volt::route('/doctors', 'doctor.listdoctor')->name('admin.listdoctor');

        Volt::route('/doctors/schedule', 'doctor.doctorschedule')->name('admin.doctorschedule');

        Volt::route('/doctors/schedule/add', 'doctor.addschedule')->name('admin.addschedule');

        Volt::route('/settings/companysettings', 'settings.companysettings')->name('admin.companysettings');
        Volt::route('/settings/localisation', 'settings.localisation')->name('admin.localisation');
        Volt::route('/settings/rolepermissions', 'settings.rolepermissions')->name('admin.rolepermissions');
        Volt::route('/settings/themesettings', 'settings.themesettings')->name('admin.themesettings');
        Volt::route('/settings/salarysettings', 'settings.themesettings')->name('admin.salarysettings');

    });


});


Route::get('/', function(){

    if(!Auth::check()){
        return redirect(route('login'));
    }else{

        return redirect(route(Auth::user()->getRedirect()));
    }



});

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

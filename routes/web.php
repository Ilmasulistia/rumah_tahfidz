<?php

use Illuminate\Support\Facades\Route;

Route::get('/','HomeController@index')->name('login.index');
Route::get('/laporan/{class_id}', 'StudentAssessmentController@index')->name('laporan.index');
Route::get('/laporan/create/{student_assessment_id}', 'StudentAssessmentController@create')->name('laporan.create');
// Route::post('/laporan/create/', 'StudentAssessmentController@update')->name('laporan.update');
Route::patch('/laporan/{student_assessment_id}', 'StudentAssessmentController@update')->name('laporan.update');
Route::get('/cetak_pdf', 'StudentAssessmentController@cetak_pdf');
Route::get('/cetak_hafalan', 'DailyAssessmentController@cetak_hafalan');
Auth::routes();
Route::get('logout', function(){
    Auth::logout();
    return redirect('login.index');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
    Route::get('/profile', 'HomeController@profile')->name('profile');

    Route::middleware(['cekrole:Admin'])->group(function(){
        Route::get('/datauser', 'UserController@index')->name('user.index');
        Route::get('/datauser/{user_id}', 'UserController@edit')->name('user.edit');
        Route::patch('/datauser/{user_id}', 'UserController@update')->name('user.update');
        Route::post('/user/{user_id}','UserController@update')->name('user.update');
        Route::delete('/hapususer/{user_id}' , 'UserController@delete')->name('user.delete');

        Route::get('/datasantri', 'StudentController@index')->name('student.index');
        Route::get('/datasantri/create', 'StudentController@create')->name('student.create');
        Route::get('/datasantri/{student_id}', 'StudentController@show')->name('student.show');
        Route::get('/editsantri/{student_id}', 'StudentController@edit')->name('student.edit');
        Route::patch('/datasantri/{student_id}', 'StudentController@update')->name('student.update');
        Route::post('/datasantri/create', 'StudentController@store')->name('student.store');
        Route::delete('/hapussantri/{student_id}' , 'StudentController@delete')->name('student.delete');

        Route::get('/datapengajar', 'TeacherController@index')->name('teacher.index');
        Route::get('/datapengajar/create', 'TeacherController@create')->name('teacher.create');
        Route::get('/editpengajar/{nik}', 'TeacherController@edit')->name('teacher.edit');
        Route::patch('/datapengajar/{nik}', 'TeacherController@update')->name('teacher.update');
        Route::post('/datapengajar/create', 'TeacherController@store')->name('teacher.store');
        Route::delete('/hapuspengajar/{nik}' , 'TeacherController@delete')->name('teacher.delete');
        
        Route::get('/dataprogram', 'ProgramController@index')->name('program.index');
        Route::get('/dataprogram/create', 'ProgramController@create')->name('program.create');
        Route::get('/editprogram/{program_id}', 'ProgramController@edit')->name('program.edit');
        Route::patch('/dataprogram/{program_id}', 'ProgramController@update')->name('program.update');
        Route::post('/dataprogram/create', 'ProgramController@store')->name('program.store');
        Route::delete('/hapusprogram/{program_id}','ProgramController@delete')->name('program.delete');

        Route::get('/detailprogram/{program_id}', 'ProgramDetailController@index')->name('programdetail.index');
        Route::get('/detailprogram/create', 'ProgramDetailController@create')->name('programdetail.create');
        Route::get('/editdetailprogram/{detail_id}', 'ProgramDetailController@edit')->name('programdetail.edit');
        Route::patch('/programdetail/{detail_id}', 'ProgramDetailController@update')->name('programdetail.update');
        Route::post('/programdetail/create  ', 'ProgramDetailController@store')->name('programdetail.store');
        Route::delete('/hapusdetailprogram/{detail_id}','ProgramDetailController@delete')->name('programdetail.delete');

        Route::get('/datacourse', 'CourseController@index')->name('course.index');
        Route::get('/datacourse/create', 'CourseController@create')->name('course.create');
        Route::get('/editcourse/{course_id}', 'CourseController@edit')->name('course.edit');
        Route::patch('/datacourse/{course_id}', 'CourseController@update')->name('course.update');
        Route::post('/datacourse/create', 'CourseController@store')->name('course.store');
        Route::delete('/hapuscourse/{course_id}','CourseController@delete')->name('course.delete');

        Route::get('/datakelas', 'ClassController@index')->name('class.index');
        Route::get('/datakelas/create', 'ClassController@create')->name('class.create');
        Route::get('/editkelas/{class_id}', 'ClassController@edit')->name('class.edit');
        Route::get('/datakelas/show/{class_id}', 'ClassController@show')->name('class.show');
        Route::patch('/datakelas/{class_id}', 'ClassController@update')->name('class.update');
        Route::post('/datakelas/create', 'ClassController@store')->name('class.store');
        Route::delete('/hapuskelas/{class_id}','ClassController@delete')->name('class.delete');

        Route::get('/datakepengurusan', 'ManagementController@index')->name('management.index');
        Route::get('/datakepengurusan/create', 'ManagementController@create')->name('management.create');
        Route::get('/editkepengurusan/{management_id}', 'ManagementController@edit')->name('management.edit');
        Route::patch('/datakepengurusan/{management_id}', 'ManagementController@update')->name('management.update');
        Route::post('/datakepengurusan/create', 'ManagementController@store')->name('management.store');
        Route::delete('/hapuskepengurusan/{management_id}','ManagementController@delete')->name('management.delete');

        Route::get('/penilaianharian', 'DailyAssessmentController@index')->name('penilaian.index');
        Route::get('/editpenilaianharian/{daily_assessment_id}', 'DailyAssessmentController@edit')->name('penilaian.edit');
        Route::delete('/hapuspenilaian/{student_id}' , 'DailyAssessmentController@delete')->name('penilaian.delete');

       
        Route::post('/add-siswa/{class_id}', 'StudentAssessmentController@store')->name('add-siswa.store');
        
        Route::get('/editlaporan', 'StudentAssessmentController@edit')->name('laporan.edit');
        Route::delete('/hapuslaporan/{student_id}' , 'StudentAssessmentController@delete')->name('laporan.delete');

    });

    Route::middleware(['cekrole:Teacher'])->group(function(){
        Route::get('/penilaianharian/{class_id}', 'DailyAssessmentController@index')->name('penilaian.index');      
        Route::get('/penilaianharian/create/{student_id}/{class_id}', 'DailyAssessmentController@create')->name('penilaian.create');
        Route::get('/editpenilaianharian/{student_id}', 'DailyAssessmentController@edit')->name('penilaian.edit');
        Route::get('/batashafalan/show', 'DailyAssessmentController@show')->name('penilaian.show');
        Route::patch('/penilaianharian/create/', 'DailyAssessmentController@update')->name('penilaian.update');
        Route::post('/penilaianharian/show', 'DailyAssessmentController@store')->name('penilaian.store');
        Route::delete('/hapuspenilaian/{daily_assessment_id}' , 'DailyAssessmentController@delete')->name('penilaian.delete');

        
        
        // Route::get('/laporan/show/{student_id}', 'DailyAssessmentController@show')->name('laporan.show');

        Route::get('/detaillaporan', 'StudentAssessmentDetailController@index')->name('detaillaporan.index');
        Route::get('/detaillaporan/create', 'StudentAssessmentDetailController@create')->name('detaillaporan.create');

        
    });

    Route::middleware(['cekrole:Student'])->group(function(){
        
    });

});

Route::get('/home', 'HomeController@index')->name('home');

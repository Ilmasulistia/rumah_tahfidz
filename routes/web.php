<?php

use Illuminate\Support\Facades\Route;

Route::get('/','HomeController@index')->name('login.index');
Route::get('/laporan/{class_id}', 'StudentAssessmentController@index')->name('laporan.index');
Route::get('/laporan/create/{student_assessment_id}', 'StudentAssessmentController@create')->name('laporan.create');
// Route::post('/laporan/create/', 'StudentAssessmentController@update')->name('laporan.update');
Route::patch('/laporan/{student_assessment_id}', 'StudentAssessmentController@update')->name('laporan.update');
Route::get('/cetak_rapor/{student_assessment_id}', 'StudentAssessmentDetailController@cetak_rapor')->name('laporan.cetak');
Route::get('/cetak_hafalan/{student_assessment_id}', 'DailyAssessmentController@cetak_hafalan')->name('hafalan.cetak');
Auth::routes();
Route::get('logout', function(){
    Auth::logout();
    return redirect('login.index');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
    Route::get('/profile', 'HomeController@profile')->name('profile');
    Route::get('change-password', 'HomeController@changePassword')->name('view.changePassword');
    Route::post('change-password', 'HomeController@store')->name('change.password');

    Route::middleware(['cekrole:Admin'])->group(function(){
        Route::get('/datauser', 'UserController@index')->name('user.index');
        Route::get('/datauser/{user_id}', 'UserController@edit')->name('user.edit');
        Route::patch('/updateuser/{user_id}', 'UserController@update')->name('user.update');
        Route::post('/datauser/create', 'UserController@store')->name('user.store');
        Route::delete('/hapususer/{user_id}' , 'UserController@delete')->name('user.delete');

        Route::get('/datasantri', 'StudentController@index')->name('student.index');
        Route::get('/datasantri/create', 'StudentController@create')->name('student.create');
        Route::get('/datasantri/{student_id}', 'StudentController@show')->name('student.show');
        Route::get('/editsantri/{student_id}', 'StudentController@edit')->name('student.edit');
        Route::patch('/datasantri/{student_id}', 'StudentController@update')->name('student.update');
        Route::post('/datasantri/create', 'StudentController@store')->name('student.store');
        Route::delete('/hapussantri/{student_id}' , 'StudentController@delete')->name('student.delete');
        Route::get('/exportsantri', 'StudentController@studentexport')->name('student.export');

        Route::get('/datapengajar', 'TeacherController@index')->name('teacher.index');
        Route::get('/datapengajar/create', 'TeacherController@create')->name('teacher.create');
        Route::get('/editpengajar/{nik}', 'TeacherController@edit')->name('teacher.edit');
        Route::patch('/datapengajar/{nik}', 'TeacherController@update')->name('teacher.update');
        Route::post('/datapengajar/create', 'TeacherController@store')->name('teacher.store');
        Route::delete('/hapuspengajar/{nik}' , 'TeacherController@delete')->name('teacher.delete');
        Route::get('/exportpengajar', 'TeacherController@teacherexport')->name('teacher.export');
        
        Route::get('/dataprogram', 'ProgramController@index')->name('program.index');
        Route::get('/dataprogram/create', 'ProgramController@create')->name('program.create');
        Route::get('/editprogram/{program_id}', 'ProgramController@edit')->name('program.edit');
        Route::patch('/dataprogram/{program_id}', 'ProgramController@update')->name('program.update');
        Route::post('/dataprogram/create', 'ProgramController@store')->name('program.store');
        Route::delete('/hapusprogram/{program_id}','ProgramController@delete')->name('program.delete');

        Route::get('/detailprogram/{program_id}', 'ProgramDetailController@index')->name('programdetail.index');
        Route::get('/detailprogram/create', 'ProgramDetailController@create')->name('programdetail.create');
        Route::get('/editdetailprogram/{program_id}', 'ProgramDetailController@edit')->name('programdetail.edit');
        Route::patch('/programdetail/{detail_id}', 'ProgramDetailController@update')->name('programdetail.update');
        Route::post('/programdetail/create', 'ProgramDetailController@store')->name('programdetail.store');
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
        Route::get('/exportkelas', 'ClassController@classexport')->name('class.export');

        Route::get('/datakepengurusan', 'ManagementController@index')->name('management.index');
        Route::get('/datakepengurusan/create', 'ManagementController@create')->name('management.create');
        Route::get('/editkepengurusan/{management_id}', 'ManagementController@edit')->name('management.edit');
        Route::patch('/datakepengurusan/{management_id}', 'ManagementController@update')->name('management.update');
        Route::post('/datakepengurusan/create', 'ManagementController@store')->name('management.store');
        Route::delete('/hapuskepengurusan/{management_id}','ManagementController@delete')->name('management.delete');

        Route::get('/penilaianharian', 'DailyAssessmentController@index')->name('penilaian.index');
        Route::get('/editpenilaianharian/{daily_assessment_id}', 'DailyAssessmentController@edit')->name('penilaian.edit');
        Route::delete('/hapuspenilaian/{student_id}' , 'DailyAssessmentController@delete')->name('penilaian.delete');
        Route::get('/hafalansantri', 'DailyAssessmentController@hafalan')->name('penilaian.hafalan');

       
        Route::post('/add-siswa/{class_id}', 'StudentAssessmentController@store')->name('add-siswa.store');
        
        Route::get('/editlaporan', 'StudentAssessmentController@edit')->name('laporan.edit');
        Route::delete('/hapuslaporan/{student_id}' , 'StudentAssessmentController@delete')->name('laporan.delete');
        Route::get('/exportdatakelas', 'StudentAssessmentController@datakelasexport')->name('laporan.export');
        Route::get('/datakelaslengkap', 'StudentAssessmentController@show')->name('laporan.show');


    });

    Route::middleware(['cekrole:Teacher'])->group(function(){
        Route::get('/penilaianharian/{student_assessment_id}', 'DailyAssessmentController@index')->name('penilaian.index');
        Route::get('/batashafalan/show/{student_assessment_id}', 'DailyAssessmentController@show')->name('penilaian.show');
        Route::get('/penilaianharian/create/{student_assessment_id}', 'DailyAssessmentController@create')->name('penilaian.create');
        Route::get('/editpenilaianharian/{daily_assessment_id}', 'DailyAssessmentController@edit')->name('penilaian.edit');
        Route::patch('/penilaianharian/update', 'DailyAssessmentController@update')->name('penilaian.update');
        Route::post('/penilaianharian/create/{student_assessmet_id}', 'DailyAssessmentController@store')->name('penilaian.store');
        Route::delete('/hapuspenilaian/{daily_assessment_id}' , 'DailyAssessmentController@delete')->name('penilaian.delete');

        Route::get('/penilaianharian/create/input/{juz_no}', 'DailyAssessmentController@input')->name('penilaian.input');
        // Route::post('/penilaianharian/input/nilai/{student_id}', 'DailyAssessmentController@input')->name('penilaian.nilai');
        // Route::post('/penilaianharian/input/{juz_no}', 'DailyAssessmentController@store')->name('penilaian.store');
        // Route::post('/batashafalan/create', 'DailyAssessmentController@store')->name('penilaian.store');
        Route::get('/batashafalan/nilai/{daily_assessment_id}', 'DailyAssessmentController@nilai')->name('penilaian.nilai');


        Route::get('/penilaianharian/ChangeStatus1/{daily_assessment_id}', 'DailyAssessmentController@changepart1')->name('penilaian.part1');
        Route::get('/penilaianharian/ChangeStatus2/{daily_assessment_id}', 'DailyAssessmentController@changepart2')->name('penilaian.part2');
        Route::get('/penilaianharian/ChangeStatus3/{daily_assessment_id}', 'DailyAssessmentController@changepart3')->name('penilaian.part3');
        
        // Route::get('/laporan/show/{student_id}', 'StudentAssessmentController@show')->name('laporan.show');
        Route::get('/detaillaporan/ChangeStatusRapor/{student_assessment_id}', 'StudentAssessmentController@changeStatusRapor')->name('detaillaporan.status');


        Route::get('/detaillaporan/show/{student_assessment_id}', 'StudentAssessmentDetailController@show')->name('detaillaporan.show');
        Route::get('/detaillaporan/create/{student_assessment_id}', 'StudentAssessmentDetailController@create')->name('detaillaporan.create');
        Route::patch('/detaillaporan/show/', 'StudentAssessmentDetailController@update')->name('detaillaporan.update');
        Route::post('/detaillaporan/create/{student_id}', 'StudentAssessmentDetailController@store')->name('detaillaporan.store');
        
    });

    Route::middleware(['cekrole:Student'])->group(function(){
        Route::get('/datasantri/{student_id}', 'StudentController@show')->name('student.show');
        Route::get('/batashafalan/show/{student_assessment_id}', 'DailyAssessmentController@show')->name('penilaian.show');

        
    });

    Route::middleware(['cekrole:Head'])->group(function(){
        // Route::get('/detaillaporan/valid/{student_assessment_id}', 'StudentAssessmentDetailController@valid')->name('detaillaporan.valid');
        Route::get('/detaillaporan/ChangeStatus/{student_assessment_id}', 'StudentAssessmentDetailController@changeStatus')->name('detaillaporan.change');
        Route::get('/detaillaporan/ChangeCondition/{student_assessment_id}', 'StudentAssessmentController@changeCondition')->name('detaillaporan.condition');
        
    });

});

Route::get('/home', 'HomeController@index')->name('home');

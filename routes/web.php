<?php
use Illuminate\Support\Facades\Auth;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Grades\GradeController;
use App\Http\Controllers\Sections\SectionController;
use App\Http\Controllers\Classrooms\ClassroomController;
use App\Http\Controllers\Students\StudentController;
use App\Http\Controllers\Students\AttendanceController;
// use App\Http\Controllers\Auth;


Route::get('/',  [App\Http\Controllers\HomeController::class, 'index'])->name('selection');


Auth::routes();


    Route::get('/login/{type}',[App\Http\Controllers\Auth\LoginController::class,'loginForm'])->name('login.show');

    Route::post('/login',[App\Http\Controllers\Auth\LoginController::class,'login'])->name('login');

    Route::get('/logout/{type}', 'LoginController@logout')->name('logout');


Route::group(
    [

        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
    ], function () {

     //==============================dashboard============================
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class,'dashboard'])->name('dashboard');

   //==============================dashboard============================
        Route::resource('Grades', GradeController::class);


    //==============================Classrooms============================
    // Route::group(['namespace' => 'Classrooms'], function () {

        Route::resource('Classrooms', ClassroomController::class);
        Route::post('Classrooms/delete_all', [ClassroomController::class, 'delete_all'])->name('delete_all');
        Route::post('Classrooms/Filter_Classes', [ClassroomController::class, 'Filter_Classes'])->name('Filter_Classes');

    // });


    //==============================Sections============================

    // Route::group(['namespace' => 'Sections'], function () {

        Route::resource('Sections', SectionController::class);
        Route::get('/classes/{id}', [SectionController::class ,'getclasses']);

    // });

    //==========================parents============================

    Route::view('add_parent','livewire.show_Form')->name('add_parent');

    //==============================Teachers============================
    Route::group(['namespace' => 'Teachers'], function () {
        Route::resource('Teachers', TeacherController::class);
    });

    //==============================Students============================
        Route::resource('Students', StudentController::class);
        Route::get('indirect_admin', [OnlineClasseController::class, 'indirectCreate'])->name('indirect.create.admin');
        Route::post('indirect_admin', [OnlineClasseController::class, 'storeIndirect'])->name('indirect.store.admin');         Route::resource('online_classes', OnlineClasseController::class);
        Route::resource('Graduated', GraduatedController::class);
        Route::resource('Promotion', PromotionController::class);
        Route::resource('Fees_Invoices', FeesInvoicesController::class);
        Route::resource('Fees', FeesController::class);
        Route::resource('receipt_students', ReceiptStudentsController::class);
        Route::resource('ProcessingFee', ProcessingFeeController::class);
        Route::resource('Payment_students', PaymentController::class);
        Route::resource('Attendance', AttendanceController::class);
        Route::get('download_file/{filename}', [LibraryController::class, 'downloadAttachment'])->name('downloadAttachment');
        Route::resource('library', 'LibraryController');
        Route::get('/Get_classrooms/{id}', [StudentController::class, 'Get_classrooms']);
        Route::get('/Get_Sections/{id}', [StudentController::class, 'Get_Sections']);
        Route::post('Upload_attachment', [StudentController::class, 'Upload_attachment'])->name('Upload_attachment');
        Route::get('Download_attachment/{studentsname}/{filename}', [StudentController::class, 'Download_attachment'])->name('Download_attachment');
        Route::post('Delete_attachment', [StudentController::class, 'Delete_attachment'])->name('Delete_attachment');

    //==============================subjects============================
        Route::resource('subjects', SubjectController::class);


    //==============================Quizzes============================
    Route::group(['namespace' => 'Quizzes'], function () {
        Route::resource('Quizzes', 'QuizzController');
    });

    //==============================questions============================
    Route::group(['namespace' => 'questions'], function () {
        Route::resource('questions', 'QuestionController');
    });

    //==============================Setting============================
    Route::resource('settings', 'SettingController');
});

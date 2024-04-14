<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FacultyController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified', 'role:admin'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/', [IndexController::class, 'index'])->name('index');
    Route::resource('/roles', RoleController::class);
    Route::resource('/permissions', PermissionController::class);
});

// Route::get('/email/verify', function () {
//     return view('auth.verify-email');
// })->middleware('auth')->name('verification.notice');

// Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
//     $request->fulfill();
 
//     return redirect('/dashboard');
// })->middleware(['auth', 'signed'])->name('verification.verify');

// Route::post('/email/verification-notification', function (Request $request) {
//     $request->user()->sendEmailVerificationNotification();
 
//     return back()->with('message', 'Verification link sent!');
// })->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/enrolled-courses', [CourseController::class, 'enrolledCourses'])->middleware(['auth', 'verified'])->name('enrolled-courses');

Route::get('/view-course/{courseId}', [CourseController::class, 'learn'])->middleware(['auth', 'verified'])->name('view-course');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/profile', [ProfileController::class, 'updateData'])->name('profile.updateData');
});

Route::get('/admin/create-course', [CourseController::class, 'create'])->middleware(['auth', 'verified'])->name('courses.create');
Route::post('/admin/create-course', [CourseController::class, 'store'])->middleware(['auth', 'verified'])->name('courses.store');
Route::get('/faculty/edit-course/{courseId}', [CourseController::class, 'editCourse'])->middleware(['auth', 'verified'])->name('courses.edit');
Route::post('/faculty/edit-course/{courseId}', [CourseController::class, 'addMaterial'])->middleware(['auth', 'verified'])->name('courses.add');
Route::post('/faculty/update-link/{courseId}', [CourseController::class, 'updateCourse'])->middleware(['auth', 'verified'])->name('courses.intro');

Route::get('/my-courses', [CourseController::class, 'showFacultyCourses'])->middleware(['auth', 'verified'])->name('my-courses');
Route::get('/course-details/{courseId}', [CourseController::class, 'courseDetails'])->middleware(['auth', 'verified'])->name('course-details');
Route::get('/student-list/{courseId}', [FacultyController::class, 'studentIndex'])->middleware(['auth', 'verified'])->name('student-list');
Route::get('/student-accept/{studentId}/{courseId}', [FacultyController::class, 'studentAccept'])->middleware(['auth', 'verified'])->name('student-accept');
Route::get('/student-reject/{studentId}/{courseId}', [FacultyController::class, 'studentReject'])->middleware(['auth', 'verified'])->name('student-reject');

Route::get('/manage-courses', [CourseController::class, 'showCourses'])->middleware(['auth', 'verified'])->name('manage-courses');
Route::delete('/manage-courses/{courseId}', [CourseController::class, 'destroy'])->middleware(['auth', 'verified'])->name('courses.destroy');

Route::get('/manage-faculty', [FacultyController::class, 'index'])->middleware(['auth', 'verified'])->name('manage-faculty');
Route::get('/admin/add-faculty', [FacultyController::class, 'create'])->middleware(['auth', 'verified'])->name('add-faculty');
Route::post('/dashboard', [FacultyController::class, 'store'])->middleware(['auth', 'verified'])->name('faculty.store');
Route::delete('/manage-faculty/{facultyId}', [FacultyController::class, 'destroy'])->middleware(['auth', 'verified'])->name('faculty.destroy');
Route::get('/manage-students', [StudentController::class, 'index'])->middleware(['auth', 'verified'])->name('manage-students');
Route::delete('/manage-students/{studentId}', [StudentController::class, 'destroy'])->middleware(['auth', 'verified'])->name('student.destroy');

Route::get('/course-catalog', [CourseController::class, 'index'])->middleware(['auth', 'verified'])->name('course-catalog');
Route::get('/catalog-search', [StudentController::class, 'search'])->middleware(['auth', 'verified'])->name('catalog-search');
Route::get('/course-enrollment/{courseId}', [CourseController::class, 'enroll'])->middleware(['auth', 'verified'])->name('courses.enroll');
Route::post('/course-enrollment/{courseId}', [CourseController::class, 'enrollRequest'])->middleware(['auth', 'verified'])->name('courses.enrollRequest');
Route::post('/course-details/{contentId}', [CourseController::class, 'updateContent'])->middleware(['auth', 'verified'])->name('content.update');


Route::get('/initiate','PaytmController@initiate')->name('initiate.payment');
Route::post('/payment','PaytmController@pay')->name('make.payment');
Route::post('/payment/status', 'PaytmController@paymentCallback')->name('status');

require __DIR__ . '/auth.php';

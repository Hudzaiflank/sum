    <?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\AdminController;
    use App\Http\Controllers\Backend\UserController;
    use App\Http\Controllers\Backend\Setup\StudentClassController;
    use App\Http\Controllers\Backend\Student\StudentRegController;
    use App\Http\Controllers\Backend\Setup\AssignSubjectController;

    use App\Http\Controllers\Backend\Setup\SchoolSubjectController;

    use App\Http\Controllers\Backend\Employee\EmployeeRegController;
    use Monolog\Handler\RotatingFileHandler;

    /*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

    // Route::get('/', function () {
    //     return view('welcome'); // auth.login ==> ini waktu akses link awal di arahin ke login bukan ke laravel lagi
    // });

    Route::group(['middleware' => 'prevent-back-history'], function () {



        // Route::middleware([
        //     'auth:sanctum',
        //     config('jetstream.auth_session'),
        //     'verified',
        // ])->group(function () {
        //     Route::get('/dashboard', function () {
        //         return view('admin.index');
        //     })->name('dashboard');
        // });


        Route::get('/', function () {
            return view('auth.login');
        });

        Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
            return view('admin.index');
        })->name('dashboard');

        Route::get('/admin/logout', [AdminController::class, 'Logout'])->name('admin.logout');


        Route::middleware('auth')->group(function () {


            // User Management All Routes 

            Route::prefix('users')->group(function () {
                Route::get('/view', [UserController::class, 'UserView'])->name('user.view');

                Route::get('/add', [UserController::class, 'UserAdd'])->name('users.add');

                Route::post('/store', [UserController::class, 'UserStore'])->name('users.store');

                Route::get('/edit/{id}', [UserController::class, 'UserEdit'])->name('users.edit');

                Route::post('/update/{id}', [UserController::class, 'UserUpdate'])->name('users.update');

                Route::get('/delete/{id}', [UserController::class, 'UserDelete'])->name('users.delete');
            });

            /// User Profile and Change Password 




            /// User Profile and Change Password 
            Route::prefix('setups')->group(function () {

                // Student Class Routes 
                Route::get('student/class/view', [StudentClassController::class, 'ViewStudent'])->name('student.class.view');

                Route::get('student/class/add', [StudentClassController::class, 'StudentClassAdd'])->name('student.class.add');

                Route::post('student/class/store', [StudentClassController::class, 'StudentClassStore'])->name('store.student.class');

                Route::get('student/class/edit/{id}', [StudentClassController::class, 'StudentClassEdit'])->name('student.class.edit');

                Route::post('student/class/update/{id}', [StudentClassController::class, 'StudentClassUpdate'])->name('update.student.class');

                Route::get('student/class/delete/{id}', [StudentClassController::class, 'StudentClassDelete'])->name('student.class.delete');


                Route::get('school/subject/view', [SchoolSubjectController::class, 'ViewSubject'])->name('school.subject.view');

                Route::get('school/subject/add', [SchoolSubjectController::class, 'SubjectAdd'])->name('school.subject.add');

                Route::post('school/subject/store', [SchoolSubjectController::class, 'SubjectStore'])->name('store.school.subject');

                Route::get('school/subject/edit/{id}', [SchoolSubjectController::class, 'SubjectEdit'])->name('school.subject.edit');

                Route::post('school/subject/update/{id}', [SchoolSubjectController::class, 'SubjectUpdate'])->name('update.school.subject');

                Route::get('school/subject/delete/{id}', [SchoolSubjectController::class, 'SubjectDelete'])->name('school.subject.delete');



                Route::get('assign/subject/view', [AssignSubjectController::class, 'ViewAssignSubject'])->name('assign.subject.view');

                Route::get('assign/subject/add', [AssignSubjectController::class, 'AddAssignSubject'])->name('assign.subject.add');

                Route::post('assign/subject/store', [AssignSubjectController::class, 'StoreAssignSubject'])->name('store.assign.subject');

                Route::get('assign/subject/edit/{class_id}', [AssignSubjectController::class, 'EditAssignSubject'])->name('assign.subject.edit');

                Route::post('assign/subject/update/{class_id}', [AssignSubjectController::class, 'UpdateAssignSubject'])->name('update.assign.subject');

                Route::get('assign/subject/details/{class_id}', [AssignSubjectController::class, 'DetailsAssignSubject'])->name('assign.subject.details');
            });


            Route::prefix('students')->group(function () {

                Route::get('/reg/view', [StudentRegController::class, 'StudentRegView'])->name('student.registration.view');

                Route::get('/reg/Add', [StudentRegController::class, 'StudentRegAdd'])->name('student.registration.add');

                Route::post('/reg/store', [StudentRegController::class, 'StudentRegStore'])->name('store.student.registration');

                Route::get('/year/class/wise', [StudentRegController::class, 'StudentClassYearWise'])->name('student.year.class.wise');

                Route::get('/reg/edit/{student_id}', [StudentRegController::class, 'StudentRegEdit'])->name('student.registration.edit');

                Route::post('/reg/update/{student_id}', [StudentRegController::class, 'StudentRegUpdate'])->name('update.student.registration');

                Route::get('/reg/delete/{student_id}', [StudentRegController::class, 'StudentRegDelete'])->name('student.registration.delete');
            });

            Route::prefix('employees')->group(function () {

                Route::get('reg/employee/view', [EmployeeRegController::class, 'EmployeeView'])->name('employee.registration.view');

                Route::get('reg/employee/add', [EmployeeRegController::class, 'EmployeeAdd'])->name('employee.registration.add');

                Route::post('reg/employee/store', [EmployeeRegController::class, 'EmployeeStore'])->name('store.employee.registration');

                Route::get('reg/employee/edit/{id}', [EmployeeRegController::class, 'EmployeeEdit'])->name('employee.registration.edit');

                Route::post('reg/employee/update/{id}', [EmployeeRegController::class, 'EmployeeUpdate'])->name('update.employee.registration');
                Route::get('reg/employee/delete/{id}', [EmployeeRegController::class, 'EmployeeDelete'])->name('employee.registration.delete');
            });
        }); // End Middleare Auth Route 

    });  // Prevent Back Middleare
<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();
Route::get('user_register')->name('register')->uses('Auth\RegisterController@showRegistrationForm');
Route::get('course_register/{id}','UserController@course_registration');
Route::get('admin')->name('login')->uses('Auth\LoginController@showLoginForm');
Route::get('loginForm/{id}','UserController@login_form');

Route::get('/','HomeController@index')->name('home');
Route::get('aboutUs','HomeController@about_us');
Route::get('termsCondition','HomeController@terms_condition');
Route::get('privacyPolicy','HomeController@privacy_policy');
Route::get('contact','HomeController@contact');
Route::get('allCourses','HomeController@all_courses');
Route::get('categoryCourses/{id}','HomeController@category_courses');
Route::get('allPackages','HomeController@all_package');
Route::get('fullCourseDetails/{id}','HomeController@course_details');
Route::get('fullPackageDetails/{id}','HomeController@package_details');
Route::post('registration','UserController@register');
Route::group(['middleware' => ['auth','revalidate']], function() {
    Route::get('dashboard','AdminController@dashboard');
    Route::resource('roles','RoleController');
    Route::resource('permissions','PermissionController');
    Route::resource('users','UserController');
    Route::post('deleteRole','RoleController@delete_role');
    Route::get('addUser','UserController@add_user');
    Route::post('deleteUser','UserController@delete_user');

    Route::get('activitiesLog','AdminController@user_activities_log');
    Route::get('referralPackage','AdminController@referral_package_list');
    Route::get('referralPackageCreate','AdminController@referral_package_create');
    Route::post('referralPackageStore','AdminController@referral_package_store');
    Route::get('referralPackageEdit/{id}','AdminController@referral_package_edit');
    Route::put('referralPackageUpdate/{id}','AdminController@referral_package_update');
    Route::post('deleteReferralPackage','AdminController@referral_package_delete');
    Route::get('getReferral','AdminController@get_referral_package');
    Route::get('myReferral','AdminController@my_referral');
    Route::get('myReferredStudent','AdminController@my_referred_student');
    Route::get('referralAgent','AdminController@referral_agent_list');
    Route::get('editCommissionRate/{id}','AdminController@edit_referral_agent_commission');
    Route::put('referralCommissionUpdate/{id}','AdminController@referral_agent_commission_update');
    Route::get('referredStudent','AdminController@referred_student_list');
    Route::get('notificationList','AdminController@notification_list');
    Route::get('addNotification','AdminController@notification_create');
    Route::post('notificationStore','AdminController@notification_store');
    Route::get('editNotification/{id}','AdminController@notification_edit');
    Route::put('notificationUpdate/{id}','AdminController@notification_update');
    Route::post('closeNotification','AdminController@notification_close');
    Route::get('myNotifications','AdminController@my_notifications');
    Route::get('coursePrimaryCategory','AdminController@course_primary_category_list');
    Route::get('createPrimaryCategory','AdminController@create_course_primary_category');
    Route::post('primaryCategoryStore','AdminController@store_course_primary_category');
    Route::get('editPrimaryCategory/{id}','AdminController@edit_course_primary_category');
    Route::put('primaryCategoryUpdate/{id}','AdminController@update_course_primary_category');
    Route::get('courseSecondaryCategory','AdminController@course_secondary_category_list');
    Route::get('createSecondaryCategory','AdminController@create_course_secondary_category');
    Route::post('secondaryCategoryStore','AdminController@store_course_secondary_category');
    Route::get('editSecondaryCategory/{id}','AdminController@edit_course_secondary_category');
    Route::put('secondaryCategoryUpdate/{id}','AdminController@update_course_secondary_category');
    Route::get('courseSubCategory','AdminController@course_sub_category_list');
    Route::get('createSubCategory','AdminController@create_course_sub_category');
    Route::post('subCategoryStore','AdminController@store_course_sub_category');
    Route::get('editSubCategory/{id}','AdminController@edit_course_sub_category');
    Route::put('subCategoryUpdate/{id}','AdminController@update_course_sub_category');
    Route::get('institutionType','AdminController@institution_type_list');
    Route::get('createInstitutionType','AdminController@create_institution_type');
    Route::post('institutionTypeStore','AdminController@store_institution_type');
    Route::get('editInstitutionType/{id}','AdminController@edit_institution_type');
    Route::put('institutionTypeUpdate/{id}','AdminController@update_institution_type');
    Route::get('pendingCourse','AdminController@pending_course_list');
    Route::post('approveCourse','AdminController@approve_course');
    Route::post('rejectCourse','AdminController@reject_course');
    Route::get('activeCourse','AdminController@active_course_list');
    Route::post('inactivateCourse','AdminController@inactivate_course');
    Route::get('inactiveCourse','AdminController@inactive_course_list');
    Route::post('activateCourse','AdminController@active_course');
    Route::get('pendingCoursePackage','AdminController@pending_course_package_list');
    Route::post('approveCoursePackage','AdminController@approve_course_package');
    Route::post('rejectCoursePackage','AdminController@reject_course_package');
    Route::get('activeCoursePackage','AdminController@active_course_package_list');
    Route::post('inactivateCoursePackage','AdminController@inactivate_course_package');
    Route::get('inactiveCoursePackage','AdminController@inactive_course_package_list');
    Route::post('activateCoursePackage','AdminController@active_course_package');
    Route::get('libraryPdf','AdminController@pdf_library_list');
    Route::get('libraryVideo','AdminController@video_library_list');
    Route::get('libraryFreeQuiz','AdminController@free_quiz');
    Route::get('studentsCourseReview','AdminController@course_review');
    Route::get('studentsTeacherReview','AdminController@teacher_review');
    Route::post('withdrawRequest','AdminController@withdraw_request');
    Route::post('paymentRequestModal','AdminController@payment_request_modal');
    Route::post('approvePaymentRequest','AdminController@approve_payment_request');
    Route::post('paymentHistory','AdminController@payment_history');
    Route::post('agentReferredStudent','AdminController@agents_referred_student');
    Route::get('courseStatus','AdminController@course_status');
    Route::get('packageStatus','AdminController@package_status');
    Route::get('courseCompletedStudent','AdminController@course_completed_student');
    Route::get('accountSummery','AdminController@accounts_summery');

    Route::get('pendingTeacher','TeachersController@pending_teacher_list');
    Route::get('teachersList','TeachersController@teacher_list');
    Route::post('courseCommission','TeachersController@teachers_course_commission');
    Route::post('storeTeachersCommission','TeachersController@store_teachers_course_commission');
    Route::get('suspendedTeachersList','TeachersController@suspended_teacher_list');
    Route::get('courseList','TeachersController@course_list');
    Route::get('addCourse','TeachersController@course_create');
    Route::post('secondaryCat','TeachersController@ajax_secondaryCat');
    Route::post('subCat','TeachersController@ajax_subCat');
    Route::post('courseStore','TeachersController@course_store');
    Route::post('courseCostList','TeachersController@course_cost_list');
    Route::post('addCourseCost','TeachersController@add_course_cost');
    Route::post('storeCourseCost','TeachersController@store_course_cost');
    Route::post('editCourseCost','TeachersController@edit_course_cost');
    Route::put('updateCourseCost/{id}','TeachersController@update_course_cost');
    Route::get('courseDetails/{id}','TeachersController@course_details');
    Route::get('editCourse/{id}','TeachersController@edit_course');
    Route::put('courseUpdate/{id}','TeachersController@update_course');
    Route::post('courseLessonList','TeachersController@course_lesson_list');
    Route::post('addCourseLesson','TeachersController@add_course_lesson');
    Route::post('storeCourseLesson','TeachersController@store_course_lesson');
    Route::post('editCourseLesson','TeachersController@edit_course_lesson');
    Route::put('updateCourseLesson/{id}','TeachersController@update_course_lesson');
    Route::post('courseBatch','TeachersController@course_batch_list');
    Route::post('addCourseBatch','TeachersController@add_course_batch');
    Route::post('storeCourseBatch','TeachersController@store_course_batch');
    Route::post('editCourseBatch','TeachersController@edit_course_batch');
    Route::put('updateCourseBatch/{id}','TeachersController@update_course_batch');
    Route::post('closeCourseBatch','TeachersController@close_course_batch');
    Route::post('courseBatchStudentMapping','TeachersController@course_batch_student');
    Route::post('addCourseBatchStudent','TeachersController@create_course_batch_student');
    Route::post('storeCourseBatchStudent','TeachersController@store_course_batch_student');
    Route::post('removeStudentBatch','TeachersController@remove_course_batch_student');
    Route::post('courseQuiz','TeachersController@course_quiz');
    Route::post('addCourseQuiz','TeachersController@add_course_quiz');
    Route::post('storeCourseQuiz','TeachersController@store_course_quiz');
    Route::post('editCourseQuiz','TeachersController@edit_course_quiz');
    Route::put('updateCourseQuiz/{id}','TeachersController@update_course_quiz');
    Route::post('courseQuizQuestions','TeachersController@course_quiz_questions');
    Route::post('addCourseQuizQuestion','TeachersController@add_quiz_questions');
    Route::post('storeCourseQuizQuestion','TeachersController@store_quiz_questions');
    Route::post('editCourseQuizQuestion','TeachersController@edit_quiz_questions');
    Route::put('updateCourseQuizQuestion/{id}','TeachersController@update_quiz_questions');
    Route::post('courseAssignment','TeachersController@course_assignment');
    Route::post('addCourseAssignment','TeachersController@add_course_assignment');
    Route::post('storeCourseAssignment','TeachersController@store_course_assignment');
    Route::post('editCourseAssignment','TeachersController@edit_course_assignment');
    Route::put('updateCourseAssignment/{id}','TeachersController@update_course_assignment');

    Route::get('coursePackageList','TeachersController@course_package_list');
    Route::get('addCoursePackage','TeachersController@course_package_create');
    Route::post('coursePackageStore','TeachersController@course_package_store');
    Route::post('coursePackageCostList','TeachersController@course_package_cost_list');
    Route::post('addCoursePackageCost','TeachersController@add_course_package_cost');
    Route::post('storeCoursePackageCost','TeachersController@store_course_package_cost');
    Route::post('editCoursePackageCost','TeachersController@edit_course_package_cost');
    Route::put('updateCoursePackageCost/{id}','TeachersController@update_course_package_cost');
    Route::get('coursePackageDetails/{id}','TeachersController@course_package_details');
    Route::get('editCoursePackage/{id}','TeachersController@edit_course_package');
    Route::put('coursePackageUpdate/{id}','TeachersController@update_course_package');
    Route::post('coursePackageLessonList','TeachersController@course_package_lesson_list');
    Route::post('addCoursePackageLesson','TeachersController@add_course_package_lesson');
    Route::post('storeCoursePackageLesson','TeachersController@store_course_package_lesson');
    Route::post('editCoursePackageLesson','TeachersController@edit_course_package_lesson');
    Route::put('updateCoursePackageLesson/{id}','TeachersController@update_course_package_lesson');
    Route::post('packageBatch','TeachersController@package_batch_list');
    Route::post('addPackageBatch','TeachersController@add_package_batch');
    Route::post('storePackageBatch','TeachersController@store_package_batch');
    Route::post('editPackageBatch','TeachersController@edit_package_batch');
    Route::put('updatePackageBatch/{id}','TeachersController@update_package_batch');
    Route::post('closePackageBatch','TeachersController@close_package_batch');
    Route::post('packageBatchStudentMapping','TeachersController@package_batch_student');
    Route::post('addPackageBatchStudent','TeachersController@create_package_batch_student');
    Route::post('storePackageBatchStudent','TeachersController@store_package_batch_student');
    Route::post('removePackageStudentBatch','TeachersController@remove_package_batch_student');
    Route::post('packageQuiz','TeachersController@package_quiz');
    Route::post('addPackageQuiz','TeachersController@add_package_quiz');
    Route::post('storePackageQuiz','TeachersController@store_package_quiz');
    Route::post('editPackageQuiz','TeachersController@edit_package_quiz');
    Route::put('updatePackageQuiz/{id}','TeachersController@update_package_quiz');
    Route::post('packageQuizQuestions','TeachersController@package_quiz_questions');
    Route::post('addPackageQuizQuestion','TeachersController@add_package_quiz_questions');
    Route::post('storePackageQuizQuestion','TeachersController@store_package_quiz_questions');
    Route::post('editPackageQuizQuestion','TeachersController@edit_package_quiz_questions');
    Route::put('updatePackageQuizQuestion/{id}','TeachersController@update_package_quiz_questions');
    Route::post('packageAssignment','TeachersController@package_assignment');
    Route::post('addPackageAssignment','TeachersController@add_package_assignment');
    Route::post('storePackageAssignment','TeachersController@store_package_assignment');
    Route::post('editPackageAssignment','TeachersController@edit_package_assignment');
    Route::put('updatePackageAssignment/{id}','TeachersController@update_package_assignment');

    Route::post('studentQuiz','TeachersController@student_quizzes');
    Route::post('courseQuizAnswers','TeachersController@student_quiz_answers');
    Route::post('studentAssignment','TeachersController@student_assignment');
    Route::post('studentMarks','TeachersController@student_marks_list');
    Route::post('addStudentMarks','TeachersController@add_student_marks');
    Route::post('storeStudentMark','TeachersController@store_student_marks');
    Route::post('studentPackageQuiz','TeachersController@student_package_quizzes');
    Route::post('packageQuizAnswers','TeachersController@student_package_quiz_answers');
    Route::post('studentPackageAssignment','TeachersController@student_package_assignment');
    Route::post('studentPackageMarks','TeachersController@student_package_marks_list');
    Route::post('addStudentPackageMarks','TeachersController@add_student_package_marks');
    Route::post('storeStudentPackageMark','TeachersController@store_student_package_marks');

    Route::get('incompleteCourse','TeachersController@incomplete_course');
    Route::post('approveCompleteCourse','TeachersController@approve_complete_course');
    Route::get('incompletePackage','TeachersController@incomplete_package');
    Route::post('approveCompletePackage','TeachersController@approve_complete_package');
    Route::get('accountSummeryTeacher','TeachersController@accounts_summery');

    Route::get('pdfLibrary','TeachersController@pdf_library_list');
    Route::get('addPdfLibrary','TeachersController@pdf_library_create');
    Route::post('storePdfLibrary','TeachersController@pdf_library_store');
    Route::post('deletePdf','TeachersController@pdf_library_delete');
    Route::get('videoLibrary','TeachersController@video_library_list');
    Route::get('addVideoLibrary','TeachersController@video_library_create');
    Route::post('storeVideoLibrary','TeachersController@video_library_store');
    Route::post('deleteVideo','TeachersController@video_library_delete');
    Route::get('freeQuizSetting','TeachersController@free_quiz_setting');
    Route::get('createFreeQuiz','TeachersController@create_free_quiz');
    Route::post('storeFreeQuiz','TeachersController@store_free_quiz');
    Route::get('editFreeQuiz/{id}','TeachersController@edit_free_quiz');
    Route::put('updateFreeQuiz/{id}','TeachersController@update_free_quiz');
    Route::get('freeQuizQuestions/{id}','TeachersController@free_quiz_questions');
    Route::get('createFreeQuizQuestions/{id}','TeachersController@create_free_quiz_questions');
    Route::post('storeFreeQuizQuestions/{id}','TeachersController@store_free_quiz_questions');
    Route::get('editFreeQuizQuestion/{id}','TeachersController@edit_free_quiz_questions');
    Route::put('updateFreeQuizQuestions/{id}','TeachersController@update_free_quiz_questions');

    Route::get('pendingStudent','StudentsController@pending_student_list');
    Route::get('studentsList','StudentsController@student_list');
    Route::get('suspendedStudentsList','StudentsController@suspended_student_list');
    Route::get('pdfLibraryStudent','StudentsController@pdf_library');
    Route::get('videoLibraryStudent','StudentsController@video_library');
    Route::get('freeQuizStudent','StudentsController@free_quiz');
    Route::get('startFreeQuizExam/{id}','StudentsController@start_free_quiz_exam');
    Route::get('payCourseFee','StudentsController@pay_course_fee');
    Route::post('deleteEnrollment','StudentsController@cancel_course_enrollment');
    Route::get('courseStart/{id}','StudentsController@course_start');
    Route::get('studentCourseQuiz','StudentsController@course_quiz');
    Route::get('startCourseQuizExam/{id}','StudentsController@start_course_quiz_exam');
    Route::post('submitQuizAnswer','StudentsController@submit_course_quiz_exam');
    Route::get('studentCourseAssignment','StudentsController@course_assignment');
    Route::post('startCourseAssignment','StudentsController@start_course_assignment');
    Route::post('submitCourseAssignment','StudentsController@submit_course_assignment');
    Route::get('studentPackageQuiz','StudentsController@package_quiz');
    Route::get('startPackageQuizExam/{id}','StudentsController@start_package_quiz_exam');
    Route::post('submitPackageQuizAnswer','StudentsController@submit_package_quiz_exam');
    Route::get('studentPackageAssignment','StudentsController@package_assignment');
    Route::post('startPackageAssignment','StudentsController@start_package_assignment');
    Route::post('submitPackageAssignment','StudentsController@submit_package_assignment');
    Route::get('markSheet/{id}','StudentsController@mark_sheet');
    Route::get('courseReview/{id}','StudentsController@course_review');
    Route::post('storeCourseReview','StudentsController@store_course_review');
    Route::get('teacherEvaluation/{id}','StudentsController@teacher_evaluation');
    Route::post('storeTeacherEvaluation','StudentsController@store_teacher_evaluation');
    Route::post('courseSearchResult','StudentsController@course_search_result');
    Route::get('courseInfo/{id}','StudentsController@course_details');
    Route::get('purchaseCourse/{id}','StudentsController@purchase_course');
    Route::get('packageInfo/{id}','StudentsController@package_details');
    Route::get('purchasePackage/{id}','StudentsController@purchase_package');

    Route::get('pendingAgent','AgentsController@pending_agent_list');
    Route::get('agentsList','AgentsController@agent_list');
    Route::get('suspendedAgentsList','AgentsController@suspended_agent_list');
    Route::get('accountSummeryAgent','AgentsController@account_summery');

    Route::post('approveUsers','UserController@approve_users');
    Route::post('suspendUsers','UserController@suspend_users');
    Route::get('userProfile','UserController@user_profile');
    Route::get('profilePDF/{id}','UserController@user_profile_pdf');
    Route::post('updatePersonalInfo','UserController@update_personal_info');
    Route::post('addAcademic','UserController@add_academic');
    Route::post('updateAcademic','UserController@update_academic');
    Route::post('addTraining','UserController@add_training');
    Route::post('updateTraining','UserController@update_training');
    Route::post('addSpecial','UserController@add_special');
    Route::post('updateSpecial','UserController@update_special');
    Route::post('addEmployment','UserController@add_employment');
    Route::post('updateEmployment','UserController@update_employment');
    Route::post('addProfessional','UserController@add_professional');
    Route::post('updateProfessional','UserController@update_professional');
    Route::post('uploadCoverPhoto','UserController@upload_cover_photo');
    Route::post('uploadProfilePicture','UserController@upload_profile_picture');
});

// SSLCOMMERZ Start
Route::get('/example1', 'SslCommerzPaymentController@exampleEasyCheckout');
Route::get('/example2', 'SslCommerzPaymentController@exampleHostedCheckout');

Route::post('pay', 'SslCommerzPaymentController@index');
Route::post('/pay-via-ajax', 'SslCommerzPaymentController@payViaAjax');

Route::post('/success', 'SslCommerzPaymentController@success');
Route::post('/fail', 'SslCommerzPaymentController@fail');
Route::post('/cancel', 'SslCommerzPaymentController@cancel');

Route::post('/ipn', 'SslCommerzPaymentController@ipn');
//SSLCOMMERZ END

Route::get('logout','AdminController@logout');

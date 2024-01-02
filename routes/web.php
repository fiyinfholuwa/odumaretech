<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MasterClassController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\InnovationController;
use App\Http\Controllers\OtherPagesController;
use App\Http\Controllers\ExportController;

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


Route::get('/redirect', [AuthController::class, 'check_login'])->middleware(['auth', 'verified'])->name('redirect');
Route::get('admin/dashboard', [AuthController::class, 'admin_dashboard'])->middleware(['auth', 'verified'])->name('admin.dashboard');
Route::get('instructor/dashboard', [AuthController::class, 'instructor_dashboard'])->middleware(['auth', 'verified'])->name('instructor.dashboard');
Route::get('user/dashboard', [AuthController::class, 'user_dashboard'])->middleware(['auth', 'verified'])->name('user.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/admin/testimonial/view', 'testimonial_view')->name('testimonial.view');
    Route::get('/admin/testimonial/all', 'testimonial_all')->name('testimonial.all');
    Route::post('/admin/testimonial/add', 'testimonial_add')->name('testimonial.add');
    Route::post('/admin/testimonial/delete/{id}', 'testimonial_delete')->name('testimonial.delete');
    Route::get('/admin/testimonial/edit/{id}', 'testimonial_edit')->name('testimonial.edit');
    Route::post('/admin/testimonial/update/{id}', 'testimonial_update')->name('testimonial.update');
    Route::get('/company/training', 'company_view')->name('corporate.training');
    Route::get('/company/training/detail/{id}', 'company_view_detail')->name('corporate.training.detail');
    Route::post('/company/training/add', 'company_add')->name('corporate.training.add');
    Route::get('/company/training/all', 'company_all')->name('company.all');
    Route::get('/instructor', 'instructor_view')->name('instructor');
    Route::post('/instructor/add', 'instructor_add')->name('instructor.add');
    Route::get('/admin/intructor/applications', 'instructor_application_all')->name('instructor.application.all');
    Route::post('/admin/intructor/applicant/delete/{id}', 'applicant_delete')->name('applicant.delete');
    Route::get('/admin/intructor/applicant/edit/{id}', 'applicant_edit')->name('applicant.edit');
    Route::post('/admin/intructor/applicant/update/{id}', 'applicant_update')->name('applicant.update');
    Route::get('/admin/chat/all', 'admin_chat_all')->name('admin.chat.all');
    Route::get('/admin/chat/{id}', 'admin_chat_reply')->name('admin.chat.reply');
    Route::post('/admin/chat/reply/{id}', 'admin_chat_replied')->name('admin.chat.replied');

    Route::get('/admin/innovation/view', 'innovation_view')->name('innovation.view');
    Route::get('/admin/innovation/all', 'innovation_all')->name('innovation.all');
    Route::post('/admin/innovation/add', 'innovation_add')->name('innovation.add');
    Route::post('/admin/innovation/delete/{id}', 'innovation_delete')->name('innovation.delete');
    Route::get('/admin/innovation/edit/{id}', 'innovation_edit')->name('innovation.edit');
    Route::post('/admin/innovation/update/{id}', 'innovation_update')->name('innovation.update');

    Route::get('/admin/blog/view', 'blog_view')->name('blog.view');
    Route::get('/admin/blog/all', 'blog_all')->name('blog.all');
    Route::post('/admin/blog/add', 'blog_add')->name('blog.add');
    Route::post('/admin/blog/delete/{id}', 'blog_delete')->name('blog.delete');
    Route::get('/admin/blog/edit/{id}', 'blog_edit')->name('blog.edit');
    Route::post('/admin/blog/update/{id}', 'blog_update')->name('blog.update');

    Route::get('/admin/password/view/', 'admin_password_view')->name('admin.password.view');
    Route::post('/admin/password/change/', 'admin_password_change')->name('admin.password.change');
    Route::post('/admin/user/lock/{id}', 'user_lock')->name('user.lock');

    Route::get('/admin/applied/user/view', 'applied_view')->name('applied.view');
    Route::post('/admin/applied/user/update/{id}', 'applied_users_update')->name('applied.user.update');
    Route::post('/admin/dollar/save/', 'dollar_save')->name('dollar.save');
    Route::get('/admin/platform/configure', 'platform_configure')->name('platform.configure');
    Route::post('/admin/platform/message/delete', 'platform_message_delete')->name('platform.message.delete');
    Route::post('/admin/platform/corporate/delete', 'platform_corporate_delete')->name('platform.corporate.delete');
    Route::post('/admin/platform/masterclass/delete', 'platform_masterclass_delete')->name('platform.masterclass.delete');
    // Route::post('/admin/blog/add', 'blog_add')->name('blog.add');
});

Route::controller(CourseController::class)->group(function () {
    Route::get('/course', 'all_course')->name('course');
    Route::get('/admin/category/manage', 'category_view')->name('category.view');
    Route::post('/admin/category/add', 'category_add')->name('category.add');
    Route::post('/admin/category/delete/{id}', 'category_delete')->name('category.delete');
    Route::get('/admin/category/edit/{id}', 'category_edit')->name('category.edit');
    Route::post('/admin/category/update/{id}', 'category_update')->name('category.update');

    Route::get('/admin/cohort/manage', 'cohort_view')->name('cohort.view');
    Route::post('/admin/cohort/add', 'cohort_add')->name('cohort.add');
    Route::post('/admin/cohort/delete/{id}', 'cohort_delete')->name('cohort.delete');
    Route::get('/admin/cohort/edit/{id}', 'cohort_edit')->name('cohort.edit');
    Route::post('/admin/cohort/update/{id}', 'cohort_update')->name('cohort.update');


    Route::get('/admin/cohort/course', 'cohort_m_view')->name('cohort_m.view');
    Route::post('/admin/cohort/course/add', 'cohort_m_add')->name('cohort_m.add');
    Route::post('/admin/cohort/course/delete/{id}', 'cohort_m_delete')->name('cohort_m.delete');
    Route::get('/admin/cohort/course/edit/{id}', 'cohort_m_edit')->name('cohort_m.edit');
    Route::post('/admin/cohort/course/update/{id}', 'cohort_m_update')->name('cohort_m.update');



    Route::get('/admin/course/view', 'course_view')->name('course.view');
    Route::get('/admin/course/all', 'course_all')->name('course.all');
    Route::post('/admin/course/add', 'course_add')->name('course.add');
    Route::post('/admin/course/delete/{id}', 'course_delete')->name('course.delete');
    Route::get('/admin/course/edit/{id}', 'course_edit')->name('course.edit');
    Route::post('/admin/course/update/{id}', 'course_update')->name('course.update');
    Route::get('/course/{name}', 'course_detail')->name('course.detail');
    Route::get('/course/category/{name}', 'course_category')->name('course.category');
    Route::get('/search', 'search')->name('search');
    Route::get('/admin/coupon/manage', 'coupon_view')->name('coupon.view');
    Route::post('/admin/coupon/add', 'coupon_add')->name('coupon.add');
    Route::post('/admin/coupon/delete/{id}', 'coupon_delete')->name('coupon.delete');
    Route::get('/admin/coupon/edit/{id}', 'coupon_edit')->name('coupon.edit');
    Route::post('/admin/coupon/update/{id}', 'coupon_update')->name('coupon.update');
    Route::post('/coupon/validate', 'coupon_validate')->name('coupon.validate');
});

Route::controller(ContactController::class)->group(function () {
    Route::get('/contact', 'contact')->name('contact');
    Route::post('/contact/save', 'contact_save')->name('contact.save');
    Route::get('/admin/contact/all', 'get_all_message')->name('contact.all');
    Route::post('/admin/contact/delete/{id}', 'message_delete')->name('contact.delete');
});

Route::controller(MasterClassController::class)->group(function () {
    Route::get('/masterclass', 'masterclass')->name('masterclass');
    Route::get('/admin/masterclass/link', 'masterclass_link')->name('masterclass.link');
    Route::get('/admin/github/link', 'github_link')->name('github.link');
    Route::post('/admin/github/link/add', 'github_link_add')->name('github.link.add');
    Route::post('/admin/masterclass/link/add', 'masterclass_link_add')->name('masterclass.link.add');
    Route::post('/masterclass/save', 'masterclass_add')->name('masterclass.add');

    Route::post('/masterclass/update/{id}', 'masterclass_manage')->name('masterclass.manage');

    Route::get('/admin/masterclass/all', 'masterclass_all')->name('masterclass.all');
    Route::get('/admin/meeting/link', 'meeting_link')->name('meeting.link');
    Route::post('/admin/meeting/link/add', 'meeting_link_add')->name('meeting.link.add');

    Route::post('/admin/meeting/link/delete/{id}', 'meeting_link_delete')->name('meeting.link.delete');
    Route::get('/admin/meeting/link/edit/{id}', 'meeting_link_edit')->name('meeting.link.edit');
    Route::post('/admin/meeting/link/update/{id}', 'meeting_link_update')->name('meeting.link.update');

    Route::get('/admin/record/link', 'record_link')->name('record.link');
    Route::post('/admin/record/link/delete/{id}', 'record_link_delete')->name('record.link.delete');
    Route::get('/admin/record/link/edit/{id}', 'record_link_edit')->name('record.link.edit');
    Route::post('/admin/record/link/update/{id}', 'record_link_update')->name('record.link.update');
    Route::post('/admin/record/link/add', 'record_link_add')->name('record.link.add');
    // Route::post('/admin/contact/delete/{id}', 'message_delete')->name('contact.delete');
});

Route::controller(PaymentController::class)->group(function () {
    Route::post('/pay', 'makePayment')->name('pay');
    Route::get('/payment/callback/paystack', 'paymentCallbackPaystack')->name('pay.callback.paystack');
    Route::get('/payment/callback/stripe/success', 'paymentcallbackstripesuccess')->name('pay.callback.stripe.success');
    Route::get('/payment/callback/stripe/cancel', 'paymentCallbackStripeFailed')->name('pay.callback.stripe.failed');

    Route::get('/payment/callback/stripe/success/complete', 'user_complete_callback_stripe_complete')->name('pay.callback.stripe.success.complete');

    Route::get('/admin/transactions/all', 'transactions')->name('transaction.all');
    Route::get('/user/transactions/all', 'transactions_user')->name('transaction.user.all');
    Route::post('/payment/conplete/{id}', 'user_complete')->name('user.complete.payment');
    Route::post('/payment/resolution/{id}', 'payment_resolution')->name('payment.resolution');
    Route::get('/payment/callback/user', 'user_complete_callback')->name('pay.callback.user.complete');
});

Route::controller(AboutController::class)->group(function () {
    Route::get('/about', 'about')->name('about');
});

Route::controller(InnovationController::class)->group(function () {
    Route::get('/innovation', 'innovation')->name('innovation');
    Route::get('/innovation/detail/{id}', 'innovation_detail')->name('innovation.detail');
    Route::post('/innovation/add/', 'innovation_add')->name('innovation.apply');
    Route::get('/innovation/apply/view', 'innovation_apply_view')->name('innovation.apply.view');
    Route::post('/innovation/delete/{id}', 'innovation_delete')->name('inno.delete');
    Route::get('/blog', 'blog')->name('blog');
});

Route::controller(OtherPagesController::class)->group(function () {
    Route::get('/faq', 'faq')->name('faq');
    Route::get('/refund/policy', 'policy')->name('policy');
    Route::get('/term/condition', 'terms')->name('terms');
    Route::get('/privacy/policy', 'privacy')->name('privacy');
});

Route::controller(ExportController::class)->group(function () {
    Route::post('/export/users', 'export_users')->name('users.export');
    Route::post('/export/instructors', 'export_instructor')->name('instructors.export');
    Route::post('/export/masterclass', 'export_masterclass')->name('masterclass.export');
    Route::post('/export/company/training', 'export_company_training')->name('company.export');
    Route::post('/export/innovation/application', 'innovation_export')->name('innovation.export');
});

Route::middleware('auth')->group(function () {
Route::controller(InstructorController::class)->group(function () {
    Route::get('/instructor/slide/view', 'slide_view')->name('slide.view');
    Route::post('/instructor/slide/add', 'slide_add')->name('slide.add');
    Route::get('/instructor/slide/all', 'slide_all')->name('slide.all');
    Route::get('/instructor/slide/edit/{id}', 'slide_edit')->name('slide.edit');
    Route::post('/instructor/slide/delete/{id}', 'slide_delete')->name('slide.delete');
    Route::post('/instructor/slide/update/{id}', 'slide_update')->name('slide.update');
    Route::get('/instructor/assignment/view', 'assignment_view')->name('assignment.view');
    Route::post('/instructor/assigment/add', 'assignment_add')->name('assignment.add');
    Route::get('/instructor/assignment/all', 'assignment_all')->name('assignment.all');
    Route::get('/instructor/assignment/edit/{id}', 'assignment_edit')->name('assignment.edit');
    Route::post('/instructor/assignment/delete/{id}', 'assignment_delete')->name('assignment.delete');
    Route::post('/instructor/assignment/update/{id}', 'assignment_update')->name('assignment.update');
    Route::get('/instructor/session/view', 'session_view')->name('session.view.instructor');
    Route::post('/instructor/session/add', 'session_add')->name('session.add');
    Route::get('/instructor/session/all', 'session_all')->name('session.all.instructor');
    Route::get('/instructor/session/edit/{id}', 'session_edit')->name('session.edit');
    Route::post('/instructor/session/delete/{id}', 'session_delete')->name('session.delete');
    Route::post('/instructor/session/update/{id}', 'session_update')->name('session.update');
    Route::get('/instructor/notification/view', 'notification_view')->name('notification.view_instructor');
    Route::post('/instructor/notification/add', 'notification_add')->name('notification.add');
    Route::get('/instructor/notification/all', 'notification_all')->name('notification.all.instructor');
    Route::get('/instructor/notification/edit/{id}', 'notification_edit')->name('notification.edit');
    Route::post('/instructor/notification/delete/{id}', 'notification_delete')->name('notification.delete');
    Route::post('/instructor/notification/update/{id}', 'notification_update')->name('notification.update');
    Route::get('/instructor/assignment/submitted', 'assess_submitted_assignment')->name('assignment.submitted.review');
    Route::get('/instructor/assignment/review/{id}', 'view_submitted_assignment')->name('assignment.submitted.to');
    Route::post('/instructor/assignment/graded/{id}', 'assignment_instructor_grade')->name('assignment.review.instructor');
    Route::get('/instructor/chat/view', 'instructor_chat_view')->name('instructor.chat.view');
    Route::post('/instructor/chat/add', 'instructor_chat_add')->name('instructor.chat.add');
    Route::get('/instructor/chat/all', 'instructor_chat_all')->name('instructor.chat.all');
    Route::get('/instructor/chat/{id}', 'instructor_chat_reply')->name('instructor.chat.reply');
    Route::get('/instructor/chats/student', 'student_chat_all')->name('student.chat');
    Route::get('/instructor/student/chat/{id}', 'student_user_chat_reply')->name('student.chat.reply');
    Route::post('/instructor/chat/reply/{id}', 'instructor_chat_replied')->name('instructor.chat.replied');
    Route::get('/instructor/student/chat/reply/{id}', 'instructor_student_chat_reply')->name('instructor.student.chat.reply');
    Route::post('/instructor/student/chat/reply/add/{id}', 'instructor_student_chat_reply_add')->name('instructor.student.chat.reply.add');
    Route::get('/instructor/github/', 'instructor_github')->name('instructor.github');
    Route::get('/instructor/meeting/', 'instructor_meeting')->name('instructor.meeting');
    Route::get('/instructor/recording/', 'instructor_record')->name('instructor.record');
    Route::get('/instructor/password/view/', 'instructor_password_view')->name('instructor.password.view');
    Route::post('/instructor/password/change/', 'instructor_password_change')->name('instructor.password.change');
    Route::get('/instructor/project/final', 'project_final_view')->name('project.final.view');
    Route::post('/instructor/project/final/add', 'project_final_add')->name('project.final.add');
    Route::get('/instructor/project/final/all', 'project_final_all')->name('project.final.all');
    Route::post('/instructor/project/delete/{id}', 'project_delete')->name('project.delete');

    Route::get('/instructor/project/final_edit/{id}', 'project_edit_final')->name('project.instructor');

    Route::post('/instructor/project/update/{id}', 'project_update')->name('project.update');

    Route::get('/instructor/project/submitted', 'assess_submitted_project')->name('project.submitted.review');
    Route::get('/instructor/project/review/{id}', 'view_submitted_project')->name('project.submitted.to');
    Route::post('/instructor/project/graded/{id}', 'project_instructor_grade')->name('project.review.instructor');
});

Route::controller(UserController::class)->group(function () {
    Route::get('/user/resources/view', 'resource_view')->name('resource.view');
    Route::get('/user/resources/details/{id}/{co}', 'resource_detail')->name('resource.detail');
    Route::get('/user/course/active', 'course_active')->name('course.active');
    Route::get('/user/course/completed', 'course_complete')->name('course.complete');
    Route::get('/user/session/view', 'session_view')->name('session.view');
    Route::get('/user/sessions/all/{id}/{co}', 'session_all')->name('session.all');
    Route::get('/user/notification/view', 'notification_view')->name('notification.view');
    Route::get('/user/notification/all/{id}/{co}', 'notification_all')->name('notification.all');
    Route::get('/user/assignment/view', 'assignment_view_user')->name('assignment.user.view');
    Route::get('/user/assignment/all/{id}/{co}', 'assignment_user_all')->name('assignment.user.all');
    Route::get('/user/assignment/submit/{id}', 'assignment_submit')->name('assignment.submit');
    Route::post('/user/assignment/submit/save/{id}', 'assignment_submit_user')->name('assignment.submit.user');
    Route::get('/user/assignment/submitted', 'assignment_submitted')->name('assignment.submitted.user');
    Route::get('/user/chat/view', 'chat_user_view')->name('chat.user.view');
    Route::get('/user/chat/all', 'chat_user_all')->name('chat.user.all');
    Route::post('/user/chat/add', 'chat_user_add')->name('chat.user.add');
    Route::get('/user/chat/reply/{id}', 'user_chat_reply_view')->name('chat.user.read');
    Route::get('/user/github/', 'user_github')->name('user.github');
    Route::get('/user/records/view', 'record_user_view')->name('record.user.view');
    Route::get('/user/record/all/{id}/{co}', 'user_record')->name('records.user.all');
    Route::get('/user/password/view/', 'user_password_view')->name('user.password.view');
    Route::post('/user/password/change/', 'user_password_change')->name('user.password.change');

    Route::get('/user/project/view', 'project_view_user')->name('project.user.view');
    // Route::get('/user/assignment/all/{id}', 'assignment_user_all')->name('assignment.user.all');
    Route::get('/user/project/submit/{id}/{co}', 'project_submit')->name('project.submit');
    Route::post('/user/project/submit/save/{id}', 'project_submit_user')->name('project.submit.user');
    Route::get('/user/project/submitted', 'project_submitted')->name('project.submitted.user');
    Route::get('/user/download/certificate/{id}', 'download_certificate')->name('download.certificate');
});

});


Route::get('/refresh-migration', function () {
    \Artisan::call('migrate:refresh');
    return 'Migration Refreshed!';
});

Route::get('/create-storage-link', function () {
    try {
        Artisan::call('storage:link');
        return 'Storage link created!';
    } catch (\Exception $e) {
        return 'Error creating storage link: ' . $e->getMessage();
    }
});

require __DIR__.'/auth.php';

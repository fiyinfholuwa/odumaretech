<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\MasterClassLink;
use App\Models\AppliedCourse;
use App\Models\InstructorChat;
use App\Models\Course;
use App\Models\Category;
use App\Models\UserChat;
use Auth;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $searchTerm = request()->input('search');
        $searchResults = Course::where('title', 'like', '%' . $searchTerm . '%')->get();
        View::share('frontend.search', $searchResults);

        view()->composer('*',function($view) {
            $view->with('masterclass', MasterClassLink::first());
            if (Auth::check()) {
                $view->with('check_courses', AppliedCourse::where('user_id', '=', Auth::user()->id)->first() );
                $view->with('has_pending_course', AppliedCourse::where('user_id', '=', Auth::user()->id)
                ->where('status' , '=' , "pending")->first());
                $view->with('instructor_inbox', InstructorChat::where('user_id', '=', Auth::user()->id)
                ->where('instructor_status' , '=' , "pending")->get());
                $view->with('admin_inbox', InstructorChat::where('admin_status' , '=' , "pending")->get());
                $view->with('user_inbox', UserChat::where('user_id', '=', Auth::user()->id)
                ->where('user_status' , '=' , "pending")->get());
                
            }

            
        });
    }
}
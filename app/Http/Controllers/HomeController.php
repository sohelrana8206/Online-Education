<?php

namespace App\Http\Controllers;

use App\Course_primary_category;
use App\Course_secondary_category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Course;
use App\Course_package;
use App\Course_sub_category;

class HomeController extends Controller
{
    public function index(){
        $subCat = Course_sub_category::all();
        $cat = Course_primary_category::all();
        $secCat = Course_secondary_category::all();
        $data = Course::where([['is_course_verified',1],['status',1]])
            ->whereHas('course_cost', function ($query) {
                $query->where('course_registration_last_date','>=',date('Y-m-d'));
            })->orderBy('id','DESC')->limit(18)->get();
        $dataPackage = Course_package::where([['is_package_verified',1],['status',1]])
            ->whereHas('course_package_cost', function ($query) {
                $query->where('package_registration_last_date','>=',date('Y-m-d'));
            })->orderBy('id','DESC')->limit(9)->get();
        return view('frontend.index',compact('data','dataPackage','subCat','cat','secCat'));
    }

    public function about_us(){
        $cat = Course_primary_category::all();
        $secCat = Course_secondary_category::all();
        return view('frontend.about_us',compact('cat','secCat'));
    }

    public function terms_condition(){
        $cat = Course_primary_category::all();
        $secCat = Course_secondary_category::all();
        return view('frontend.terms_condition',compact('cat','secCat'));
    }

    public function privacy_policy(){
        $cat = Course_primary_category::all();
        $secCat = Course_secondary_category::all();
        return view('frontend.privacy_policy',compact('cat','secCat'));
    }

    public function contact(){
        $cat = Course_primary_category::all();
        $secCat = Course_secondary_category::all();
        return view('frontend.contact',compact('cat','secCat'));
    }

    public function all_courses(){
        $subCat = Course_sub_category::all();
        $cat = Course_primary_category::all();
        $secCat = Course_secondary_category::all();
        $data = Course::where([['is_course_verified',1],['status',1]])->orderBy('id','DESC')->paginate(18);
        return view('frontend.all_courses',compact('data','subCat','cat','secCat'));
    }

    public function category_courses($id){
        $cat = Course_primary_category::all();
        $subCat = Course_sub_category::where('course_secondary_category_id',$id)->get();
        $secCat = Course_secondary_category::all();
        $data = DB::table('courses')
            ->join('course_sub_categories', 'courses.course_sub_category_id', '=', 'course_sub_categories.id')
            ->join('institution_types', 'courses.institution_type_id', '=', 'institution_types.id')
            ->join('course_costs', 'courses.id', '=', 'course_costs.course_id')
            ->where('course_sub_categories.course_secondary_category_id',$id)
            ->select('courses.*', 'course_costs.course_fee', 'course_costs.course_discount_rate', 'course_costs.course_discounted_cost', 'course_costs.course_registration_last_date', 'course_costs.course_start_date','institution_types.institution_type_name','course_sub_categories.sub_category_name')
            ->get();
        return view('frontend.category_courses',compact('data','subCat','cat','secCat'));
    }

    public function all_package(){
        $subCat = Course_sub_category::all();
        $cat = Course_primary_category::all();
        $secCat = Course_secondary_category::all();
        $data = Course_package::where([['is_package_verified',1],['status',1]])->orderBy('id','DESC')->paginate(18);
        return view('frontend.all_package',compact('data','subCat','cat','secCat'));
    }

    public function course_details($id){
        $id = decrypt($id);
        $data = Course::find($id);
        $cat = Course_primary_category::all();
        $secCat = Course_secondary_category::all();
        $latestCourse = Course::where([['is_course_verified',1],['status',1],['id','!=',$id]])->orderBy('id','DESC')->limit(12)->get();
        $relatedCourse = Course::where([['is_course_verified',1],['status',1],['id','!=',$id],['course_sub_category_id',$data->course_sub_category_id]])->orderBy('id','DESC')->limit(12)->get();
        return view('frontend.course_details',compact('data','latestCourse','relatedCourse','cat','secCat'));
    }

    public function package_details($id){
        $id = decrypt($id);
        $data = Course_package::find($id);
        $cat = Course_primary_category::all();
        $subCat = Course_sub_category::all();
        $secCat = Course_secondary_category::all();
        $latestCourse = Course_package::where([['is_package_verified',1],['status',1],['id','!=',$id]])->orderBy('id','DESC')->limit(12)->get();
        return view('frontend.package_details',compact('data','latestCourse','subCat','cat','secCat'));
    }
}

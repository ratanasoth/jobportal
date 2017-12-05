<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
class FrontController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
           app()->setLocale(Session::get("lang"));
            return $next($request);
        });
    }
    // index
    public function index()
    {
        $cats = DB::table('categories')
            ->where('active',1)
            ->orderBy('name')
            ->get();
        $result = [];
        foreach ($cats as $cat)
        {
            $arr = [
              'id' => $cat->id,
                'name' => $cat->name,
                'total' => DB::table('jobs')->where('active', 1)->where('category_id', $cat->id)->count()
            ];
            $result[] = $arr;
        }
        $jobs = DB::table('jobs')
            ->join("categories", "jobs.category_id", "categories.id")
            ->where('jobs.active', 1)
            ->where('jobs.closing_date', ">=", date('Y-m-d'))
            ->orderBy('id', "desc")
            ->limit(10)
            ->select("jobs.*", "categories.name")
            ->get();
        return view('fronts.index', ['result'=>$result, "jobs"=>$jobs]);
    }
    public function category($id)
    {
        $data['categories'] = DB::table('categories')->where('active',1)
            ->orderBy('name')
            ->get();
        $data['jobs'] = DB::table('jobs')
            ->join("categories", "jobs.category_id", "categories.id")
            ->join("companies", "jobs.employer_id", "companies.employer_id")
            ->where('jobs.active', 1)
            ->where('jobs.category_id', $id)
            ->where('jobs.closing_date', ">=", date('Y-m-d'))
            ->select("jobs.id", "jobs.job_title", "jobs.create_at", "categories.name as catname", "jobs.closing_date", "companies.name as cname")
            ->orderBy("jobs.id", "desc")
            ->paginate(18);
        return view('fronts.job-by-category', $data);
    }
    public function job_list()
    {
        $data['categories'] = DB::table('categories')->where('active',1)
            ->orderBy('name')
            ->get();
        $data['jobs'] = DB::table('jobs')
            ->join("categories", "jobs.category_id", "categories.id")
            ->join("companies", "jobs.employer_id", "companies.employer_id")
            ->where('jobs.active', 1)
            ->where('jobs.closing_date', ">=", date('Y-m-d'))
            ->select("jobs.id", "jobs.job_title", "jobs.create_at", "categories.name as catname", "jobs.closing_date", "companies.name as cname")
            ->orderBy("jobs.id", "desc")
            ->paginate(22);
        return view('fronts.job-list', $data);
    }
    // job detail
    public function detail($id)
    {
        $data['categories'] = DB::table('categories')->where('active',1)
            ->orderBy('name')
            ->get();
        $data['job'] = DB::table("jobs")
            ->join("employers", "jobs.employer_id", "employers.id")
            ->join("categories", "jobs.category_id", "categories.id")
            ->join("companies", "jobs.employer_id", "companies.employer_id")
            ->where("jobs.id", $id)
            ->select("jobs.*", "employers.first_name", "employers.last_name", "employers.email", "employers.phone", "companies.name as cname", "categories.name as catname", "companies.address", "companies.description as profile")
            ->first();
        return view("fronts.job-detail", $data);
    }
    public function search(Request $r)
    {
        if($r->q)
        {
            $str = explode(" ", $r->q);
            $data['q'] = "";
            if (count($str)==1)
            {
                $data['jobs'] = DB::table('jobs')
                    ->join("categories", "jobs.category_id", "categories.id")
                    ->join("companies", "jobs.employer_id", "companies.employer_id")
                    ->where('jobs.active', 1)
                    ->where('jobs.closing_date', ">=", date('Y-m-d'))
                    ->Where(function ($query) use ($str){
                        $query->orWhere("jobs.job_title", "like", "%{$str[0]}%")
                            ->orWhere("jobs.job_type", "like", "%{$str[0]}%")
                            ->orWhere("jobs.location", "like", "%{$str[0]}%")
                            ->orWhere("jobs.description", "like", "%{$str[0]}%")
                            ->orWhere("jobs.requirement", "like", "%{$str[0]}%")
                            ->orWhere("categories.name", "like", "%{$str[0]}%")
                            ->orWhere("companies.name", "like", "%{$str[0]}%")
                            ->orWhere("companies.description", "like", "%{$str[0]}%");
                    })
                    ->select("jobs.id", "jobs.job_title", "jobs.create_at", "categories.name as catname", "jobs.closing_date", "companies.name as cname")
                    ->orderBy("jobs.id", "desc")
                    ->paginate(18);
            }
            else if(count($str)==2)
            {
                $data['jobs'] = DB::table('jobs')
                    ->join("categories", "jobs.category_id", "categories.id")
                    ->join("companies", "jobs.employer_id", "companies.employer_id")
                    ->where('jobs.active', 1)
                    ->where('jobs.closing_date', ">=", date('Y-m-d'))
                    ->Where(function ($query) use ($str){
                        $query->orWhere("jobs.job_title", "like", "%{$str[0]}%")
                            ->orWhere("jobs.job_title", "like", "%{$str[1]}%")
                            ->orWhere("jobs.job_type", "like", "%{$str[0]}%")
                            ->orWhere("jobs.job_type", "like", "%{$str[1]}%")
                            ->orWhere("jobs.location", "like", "%{$str[0]}%")
                            ->orWhere("jobs.location", "like", "%{$str[1]}%")
                            ->orWhere("jobs.description", "like", "%{$str[0]}%")
                            ->orWhere("jobs.description", "like", "%{$str[1]}%")
                            ->orWhere("jobs.requirement", "like", "%{$str[0]}%")
                            ->orWhere("jobs.requirement", "like", "%{$str[1]}%")
                            ->orWhere("categories.name", "like", "%{$str[0]}%")
                            ->orWhere("categories.name", "like", "%{$str[1]}%")
                            ->orWhere("companies.name", "like", "%{$str[0]}%")
                            ->orWhere("companies.name", "like", "%{$str[1]}%")
                            ->orWhere("companies.description", "like", "%{$str[0]}%")
                            ->orWhere("companies.description", "like", "%{$str[1]}%");
                    })
                    ->select("jobs.id", "jobs.job_title", "jobs.create_at", "categories.name as catname", "jobs.closing_date", "companies.name as cname")
                    ->orderBy("jobs.id", "desc")
                    ->paginate(18);
            }
            else{
                $data['jobs'] = DB::table('jobs')
                    ->join("categories", "jobs.category_id", "categories.id")
                    ->join("companies", "jobs.employer_id", "companies.employer_id")
                    ->where('jobs.active', 1)
                    ->where('jobs.closing_date', ">=", date('Y-m-d'))
                    ->Where(function ($query) use ($str){
                        $query->orWhere("jobs.job_title", "like", "%{$str[0]}%")
                            ->orWhere("jobs.job_title", "like", "%{$str[1]}%")
                            ->orWhere("jobs.job_title", "like", "%{$str[2]}%")
                            ->orWhere("jobs.job_type", "like", "%{$str[0]}%")
                            ->orWhere("jobs.job_type", "like", "%{$str[1]}%")
                            ->orWhere("jobs.job_type", "like", "%{$str[2]}%")
                            ->orWhere("jobs.location", "like", "%{$str[0]}%")
                            ->orWhere("jobs.location", "like", "%{$str[1]}%")
                            ->orWhere("jobs.location", "like", "%{$str[2]}%")
                            ->orWhere("jobs.description", "like", "%{$str[0]}%")
                            ->orWhere("jobs.description", "like", "%{$str[1]}%")
                            ->orWhere("jobs.description", "like", "%{$str[2]}%")
                            ->orWhere("jobs.requirement", "like", "%{$str[0]}%")
                            ->orWhere("jobs.requirement", "like", "%{$str[1]}%")
                            ->orWhere("jobs.requirement", "like", "%{$str[2]}%")
                            ->orWhere("categories.name", "like", "%{$str[0]}%")
                            ->orWhere("categories.name", "like", "%{$str[1]}%")
                            ->orWhere("categories.name", "like", "%{$str[2]}%")
                            ->orWhere("companies.name", "like", "%{$str[0]}%")
                            ->orWhere("companies.name", "like", "%{$str[1]}%")
                            ->orWhere("companies.name", "like", "%{$str[2]}%")
                            ->orWhere("companies.description", "like", "%{$str[0]}%")
                            ->orWhere("companies.description", "like", "%{$str[1]}%")
                            ->orWhere("companies.description", "like", "%{$str[2]}%");
                    })
                    ->select("jobs.id", "jobs.job_title", "jobs.create_at", "categories.name as catname", "jobs.closing_date", "companies.name as cname")
                    ->orderBy("jobs.id", "desc")
                    ->paginate(18);
            }
        }
        else{
            $data['jobs'] = DB::table('jobs')
                ->join("categories", "jobs.category_id", "categories.id")
                ->join("companies", "jobs.employer_id", "companies.employer_id")
                ->where('jobs.active', 1)
                ->where('jobs.closing_date', ">=", date('Y-m-d'))
                ->select("jobs.id", "jobs.job_title", "jobs.create_at", "categories.name as catname", "jobs.closing_date", "companies.name as cname")
                ->orderBy("jobs.id", "desc")
                ->paginate(18);
        }
        $data['q'] = $r->q;
        $data['categories'] = DB::table('categories')->where('active',1)
            ->orderBy('name')
            ->get();

        return view('fronts.search', $data);
    }
}

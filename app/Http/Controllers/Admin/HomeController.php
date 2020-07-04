<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;

class HomeController
{
    public function index()
    {

        $total = DB::table('users')
            ->whereNotNull('reg_num')
            ->count();

        $semester_reg = DB::table('users')
            ->select(DB::raw('count(*) as student_count'))
            ->whereNotNull('reg_num')
            ->where('semester_reg','=',1)
            ->count();

        $payment_play = DB::table('users')
            ->select(DB::raw('count(*) as student_count'))
            ->whereNotNull('reg_num')
            ->where('payment_plan','=',1)
            ->count();

        $exam_reg = DB::table('users')
            ->select(DB::raw('count(*) as student_count'))
            ->whereNotNull('reg_num')
            ->where('exam_reg','=',1)
            ->count();

        $not_semester_reg = DB::table('users')
            ->select(DB::raw('count(*) as student_count'))
            ->whereNotNull('reg_num')
            ->where('semester_reg','=',0)
            ->count();

        $not_exam_reg = DB::table('users')
            ->select(DB::raw('count(*) as student_count'))
            ->whereNotNull('reg_num')
            ->where('exam_reg','=',0)
            ->count();


        return view('home', compact(['total','semester_reg','payment_play','exam_reg','not_semester_reg', 'not_exam_reg']));
    }
}

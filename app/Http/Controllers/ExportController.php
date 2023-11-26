<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Auth;
use DB;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Exception;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Carbon\Carbon;

class ExportController extends Controller
{
    
    public  function export_users(Request $request){
        ini_set('max_execution_time', 0);
        $dateFrom = Carbon::createFromFormat('Y-m-d', $request->date_from)->startOfDay();
        $dateTo = Carbon::createFromFormat('Y-m-d', $request->date_to)->endOfDay();
        $data = DB::table('users')->where('user_type', '=', 0)->whereBetween('created_at', [$dateFrom, $dateTo])->get();
        $excelContent = "SN, Last Name, First Name,Student ID, Email, Date Created\n"; // Header row
        $i = 0;
        foreach ($data as $item) {
            $i++;
            $excelContent .= $i . ','. $item->last_name . ',' . $item->first_name . ',' . $item->student_id . ',' . $item->email . ',' . $item->created_at . "\n";
        }
        header("Content-type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=user_export.csv");
        echo $excelContent;
        exit;
    }


    
    public  function export_instructor(Request $request){
        ini_set('max_execution_time', 0);
        $dateFrom = Carbon::createFromFormat('Y-m-d', $request->date_from)->startOfDay();
        $dateTo = Carbon::createFromFormat('Y-m-d', $request->date_to)->endOfDay();
        $data = DB::table('users')->where('user_type', '=', 1)->whereBetween('created_at', [$dateFrom, $dateTo])->get();
        $excelContent = "SN, Last Name, First Name,Instructor ID, Email, Date Created\n"; // Header row
        $i = 0;
        foreach ($data as $item) {
            $i++;
            $excelContent .= $i . ','. $item->last_name . ',' . $item->first_name . ',' . $item->student_id . ',' . $item->email . ',' . $item->created_at . "\n";
        }
        header("Content-type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=instructor_export.csv");
        echo $excelContent;
        exit;
    }


    
    public  function export_masterclass(Request $request){
        ini_set('max_execution_time', 0);
        $dateFrom = Carbon::createFromFormat('Y-m-d', $request->date_from)->startOfDay();
        $dateTo = Carbon::createFromFormat('Y-m-d', $request->date_to)->endOfDay();
        $data = DB::table('master_classes')
            ->whereBetween('created_at', [$dateFrom, $dateTo])
            ->get();
        $excelContent = "SN, Last Name,First Name, Email, Phone Number, Intrested In Learning, Gender, Level, Location,  Date Created\n"; // Header row

        $i=0;
        foreach ($data as $item) {
            $i++;
            $excelContent .= $i . ','. $item->last_name . ',' . $item->first_name . ',' .$item->email. ',' .$item->phone. ','. $item->intrested_in . ',' . $item->gender . ',' .$item->career. ',' . $item->location .  ',' . $item->created_at . "\n";
        }
        header("Content-type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=masterclass_export.csv");
        echo $excelContent;
        exit;

        
    }


   
    public  function export_company_training(Request $request){
        ini_set('max_execution_time', 0);
        $dateFrom = Carbon::createFromFormat('Y-m-d', $request->date_from)->startOfDay();
        $dateTo = Carbon::createFromFormat('Y-m-d', $request->date_to)->endOfDay();
        $data = DB::table('company_trainings')->whereBetween('created_at', [$dateFrom, $dateTo])->get();
        $excelContent = "SN,Company Name,Email, Phone Number, Training Focus, Level, Location,  Date Created\n"; // Header row
        $i=0;
        foreach ($data as $item) {
            $i++;
            $excelContent .= $i . ','. $item->name . ',' . $item->email . ',' .$item->phone. ',' . $item->intrested_in . ',' .$item->career. ',' . $item->location .  ',' . $item->created_at . "\n";
        }
        header("Content-type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=corporate_training_export.csv");
        echo $excelContent;
        exit;

    }

}

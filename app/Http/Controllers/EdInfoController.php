<?php

namespace App\Http\Controllers;

use App\EdInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Excel;
use Yajra\Datatables\Datatables;

use App\Http\Requests;

class EdInfoController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function getIndex()
    {
        return view('edInfos.index');
    }

    /**
     * Process edInfos ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getLatest()
    {
        $query = DB::table('latest_ed_infos');
        $temp = Datatables::of($query);
        $temp->addColumn('history_url', function($edInfo) {
            return route('EdInfos.history', ['edId' => $edInfo->ed_id]);
        });

        return $temp->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getHistory($edId)
    {
        $history = EdInfo::where('ed_id', $edId);
        return Datatables::of($history)->make(true);
    }

    /**
     * Upload excel file
     *
     * @param \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function postExcel(Request $request){
        $file = $request->file('dataFile');
        Excel::load($file, function($reader){
            foreach ($reader->toArray() as $row) {
                EdInfo::firstOrCreate($row);
            }
        });
        return redirect('/edInfos');
    }
}

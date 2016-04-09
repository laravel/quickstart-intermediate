<?php

namespace App\Http\Controllers;

use App\Repositories\EdInfoRepository;
use Illuminate\Http\Request;

use App\Http\Requests;

class EdInfoController extends Controller
{
    /**
     * The task repository instance.
     *
     * @var EdInfoRepository
     */
    protected $edInfos;

    /**
     * Create a new controller instance.
     *
     * @param  EdInfoRepository  $edInfos
     */
    public function __construct(EdInfoRepository $edInfos)
    {
        $this->middleware('auth');

        $this->edInfos = $edInfos;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /**
         * TODO create index view
         *
         * Needs to distinguish viewer and manager
         */

        return view('edInfos.index', [
            'edInfos' => $this->edInfos->getAll(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

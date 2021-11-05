<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\R_anser;
use App\Models\R_questionnaire;

class AnserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, R_questionnaire $r_questionnaire)
    {
        $Anser = new R_anser();
        $Anser->user_id = auth()->user()->id;
        $Anser->questionnaire_id = $r_questionnaire->questionnaire_id;
        $Anser->question_id = $r_questionnaire->question_id;
        $Anser->anser = $request->name;
        $Anser->save();
        var_dump($Anser);
        return back()->with('message', '保存しました!');
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

<?php

namespace App\Http\Controllers\Medical;

use App\Http\Controllers\Student\StudentController;
use App\models\Student\Student;
use App\models\Medical\Medical;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class MedicalController extends Controller
{



    public function index()
    {

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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Medical  $medical
     * @return \Illuminate\Http\Response
     */
    public function show(Medical $medical)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Medical  $medical
     * @return \Illuminate\Http\Response
     */
    public function edit(Medical $medical)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Medical  $medical
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Medical $medical)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Medical  $medical
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medical $medical)
    {
        //
    }
}

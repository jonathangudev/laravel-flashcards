<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudyRecordRequest;
use App\Http\Requests\UpdateStudyRecordRequest;
use App\Models\StudyRecord;
use App\Models\Flashcard;
use Carbon\Carbon;

class StudyRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('study_record_admin', 
            ['flashcards' => Flashcard::all(),
            'studyRecords' => StudyRecord::where('user_id', '=', auth()->id())->get()
            ]);
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
     * @param  \App\Http\Requests\StoreStudyRecordRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudyRecordRequest $request)
    {
        $studyRecord = new StudyRecord;

        $studyRecord->flashcard_id = $request->flashcard_id;
        $studyRecord->user_id = auth()->id();
        $studyRecord->last_tested = Carbon::now();
        $studyRecord->next_test_date = Carbon::now();
        $studyRecord->study_level = 0;


        $studyRecord->save();

        return redirect('/study-record/all');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StudyRecord  $studyRecord
     * @return \Illuminate\Http\Response
     */
    public function show(StudyRecord $studyRecord)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StudyRecord  $studyRecord
     * @return \Illuminate\Http\Response
     */
    public function edit(StudyRecord $studyRecord)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStudyRecordRequest  $request
     * @param  \App\Models\StudyRecord  $studyRecord
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudyRecordRequest $request, StudyRecord $studyRecord)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StudyRecord  $studyRecord
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudyRecord $studyRecord)
    {
        //
    }

    public function test() {
        $studyRecords = StudyRecord::where('user_id', '=', auth()->id())->where('next_test_date', '<', Carbon::now())->with('flashcard')->get()->toArray();

        return view('study_record_test' ,['flashcardStudyRecordsJSON' => json_encode($studyRecords)]);
    }

    public function pass() {
        $flashcard_study_record = StudyRecord::find(request()->id);
        $flashcard_study_record->study_level =  $flashcard_study_record->study_level + 1;
        $flashcard_study_record->last_tested = Carbon::now();
        $flashcard_study_record->next_test_date = Carbon::now()->addMinutes(pow(2,$flashcard_study_record->study_level)); 
    
        $flashcard_study_record->save();
    }

    public function fail() {
        $flashcard_study_record = StudyRecord::find(request()->id);
        $flashcard_study_record->study_level =  max($flashcard_study_record->study_level - 1, 0);
        $flashcard_study_record->last_tested = Carbon::now();
        $flashcard_study_record->next_test_date = Carbon::now();
    
        $flashcard_study_record->save();
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFlashcardRequest;
use App\Http\Requests\UpdateFlashcardRequest;
use App\Models\Flashcard;

class FlashcardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('flashcards_index', ['flashcards' => Flashcard::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('flashcard_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFlashcardRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFlashcardRequest $request)
    {
        $flashcard = new Flashcard;

        $flashcard->question = $request->question;
        $flashcard->answer = $request->answer;

        $flashcard->save();

        return redirect('/flashcard/all');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Flashcard  $flashcard
     * @return \Illuminate\Http\Response
     */
    public function show(Flashcard $flashcard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Flashcard  $flashcard
     * @return \Illuminate\Http\Response
     */
    public function edit(Flashcard $flashcard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFlashcardRequest  $request
     * @param  \App\Models\Flashcard  $flashcard
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFlashcardRequest $request, Flashcard $flashcard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Flashcard  $flashcard
     * @return \Illuminate\Http\Response
     */
    public function destroy(Flashcard $flashcard)
    {
        //
    }
}

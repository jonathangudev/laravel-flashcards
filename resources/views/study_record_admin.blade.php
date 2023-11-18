<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Flashcards
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

            @php
                $ownedFlashcardIds = $studyRecords->pluck('flashcard_id')->toArray();
            @endphp

            @foreach($flashcards as $flashcard)

                <div class="p-6 bg-white border-b border-gray-200 my-2">
                    {{ $flashcard->question }}
                    <hr class="my-2">
                    {{ $flashcard-> answer }}

                    <form class="d-block"
                                action="/study-record/store"
                                method="POST"
                                >
                                @csrf

                                <input style="display: none" type="text" name="flashcard_id" value="{{$flashcard->id}}"></input>

                                <button 
                                    class="p-3 bg-green-400 rounded dropshadow-sm" 
                                    type="submit"
                                    @if(in_array($flashcard->id, $ownedFlashcardIds))
                                        disabled style="color:gray; background-color: lightgray"
                                    @endif
                                    >Add this flashcard</button>
                    </form>
                </div>

            @endforeach
            </div>
        </div>
    </div>
</x-app-layout>

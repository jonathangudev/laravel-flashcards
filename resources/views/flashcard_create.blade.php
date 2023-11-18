<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create a New Flashcard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

            <form action="/flashcard/store" method="POST">

                @csrf

                <label class="block" for="question">Question<label>
                <textarea class="block" name="question" rows="5"></textarea>

                <label class="block" for="answer">Answer<label>
                <textarea class="block" name="answer" rows="5"></textarea>

                <input type="submit">

            </form>

            </div>
        </div>
    </div>
</x-app-layout>

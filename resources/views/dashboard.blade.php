<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="h2 mb-3">Links<h2>
                    <ul class="list-disc ml-4">
                        <li class="text-blue-500"><a href="/flashcard/all">Index of all flashcards</a>
                        <li class="text-blue-500"><a href="/study-record/all">Select flashcards to add to your collection</a>
                        <li class="text-blue-500"><a href="/study-record/test">Start studying now!</a>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

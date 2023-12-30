<html class="h-full">
    <head>
        <title>Flashcards</title>
        <script src="https://unpkg.com/vue@3"></script>
        <script src="https://cdn.tailwindcss.com"></script>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="http://localhost:8888/css/app.css">

        <script src="http://localhost:8888/js/app.js" defer></script>

    </head>
</html>

<body class="h-full bg-gray-100">

@include('layouts.navigation')

    <div id="app">
        <section class="h-full w-full flex flex-col items-center justify-center">
            <a href="/dashboard"><h2 class="font-bold mb-2">Finished Studying!</h2></a>

                <div v-for="assignment, index in assignments"
                    class="relative"

                    :style="{'transform': `translate(  ${index * 8}px, ${index * 8}px )`, 'z-index': -index }"

                    :key="assignment.id"> 

                    <div v-if="index<4" 
                        class="flex flex-col justify-between absolute p-12 bg-white rounded  overflow-hidden shadow-lg mb-5 place-content-center"
                        style="border: 1px solid Gainsboro; height:400px; width:600px; transform: translate(-50%,-50%);"
                        >

                        <div @click="toggleFlashcard" class="hover:cursor-pointer">
                            <div>@{{ assignment.flashcard.question }}</div>

                            <hr class="my-4">

                            <div :class="{ 'invisible' : !showAnswer }"> @{{ assignment.flashcard.answer }} </div>
                        </div>

                        <div class="d-block text-center mt-6">
                            <button v-if="index == 0" 
                                style="width: 80px"
                                class="border-b-2 border-r-2 border-red-600 text-slate-700 font-bold mx-2 py-1 px-3 bg-red-500 rounded hover:bg-red-400" @click="fail">Fail</button>
                            <button v-if="index == 0" 
                                style="width: 80px"
                                class="border-b-2 border-r-2 border-green-600 text-slate-700 font-bold mx-2 py-1 px-3 bg-green-500 rounded hover:bg-green-400" @click="pass">Pass</button>
    
                        </div>
                      
                    </div>

                </div>
        </section>
    </div>

    <script>
        let app = {
            data() {
                return {
                    assignments: 
                        {!! $flashcardStudyRecordsJSON !!}
                    ,
                    showAnswer: false
                }
            }, 
            methods: {
                created: function() {
                    console.log(this.assignments);
                },

                toggleFlashcard: function() {
                    this.showAnswer = ! this.showAnswer;
                },

                fail: function (event) {
                        this.showAnswer = false;

                        let top_assignment = this.assignments[0];
                        this.assignments = this.assignments.slice(1);
                        this.assignments.push(top_assignment);

                        /* Posts to the endpoint and then console logs response  */
                        fetch('/study-record/fail', {
                            method: 'POST',
                            headers: { 'Content-Type': 'application/json', "X-CSRF-TOKEN": "{{ csrf_token() }}" },
                            body: JSON.stringify(top_assignment)
                        }).then(response => {
                            console.log( response );
                        });

                },

                pass: function (event) {
                    this.showAnswer = false;

                    let top_assignment = this.assignments[0];
                    this.assignments = this.assignments.slice(1);

                    /* Posts to the endpoint and then console logs response  */
                    fetch('/study-record/pass', {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json', "X-CSRF-TOKEN": "{{ csrf_token() }}" },
                        body: JSON.stringify(top_assignment)
                    }).then(response => {
                        console.log( response );
                    });
                }
            }
        }

        Vue.createApp(app).mount('#app');
    </script>
</body>
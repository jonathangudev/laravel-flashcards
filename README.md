## Laravel Flashcards

This is a scaffold of a flashcards application built on the Laravel framework.  

- Models and migrations for flashcards.  
- Admin panel for viewing all flashcards and adding new ones.
- A study records model for tracking when a user should be quizzed on flashcards.
- A quiz system that uses interval quizzing for efficient memorization.

To use:
- Modify the .env file.
- Run `composer install`
- Run `php artisan key:generate`
- Run `php artisan migrate`
- Run `npm run dev`
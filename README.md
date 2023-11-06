# Laravel Polls with Livewire

This is a simple Laravel project that allows you to create and display polls without having to reload the screen. It uses Laravel and Livewire to provide a seamless user experience.

## Requirements

-   PHP 7.4
-   Laravel
-   Livewire

## Getting Started

1. Clone the repository to your local machine:

    ```bash
    git clone https://github.com/rupindersingh91/laravel-livewire.git

    ```

2. Navigate to the project directory:

    ```bash
    cd laravel-polls

    ```

3. Install Composer dependencies:

    ```bash
    composer install

    ```

4. Copy the .env.example file to .env and configure your database settings:

    ```bash
    cp .env.example .env

    ```

5. Generate a new application key:

    ```bash
    php artisan key:generate

    ```

6. Run the database migrations:

    ```bash
    php artisan migrate

    ```

7. Start the development server:

    ```bash
    php artisan serve

    ```

8. Access the application in your web browser at http://localhost:8000.

## Usage

-   Create a new poll by entering a question and answer options.
-   Users can vote on polls without a page reload, thanks to Livewire.
-   View poll results in real-time.

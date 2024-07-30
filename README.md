

## Table of Contents

1. [Requirements](#requirements)
2. [Installation](#installation)
3. [Configuration](#configuration)
4. [Running the Application](#running-the-application)

## Requirements

List the software and versions required to run the project:

- PHP >= 8.2
- Composer
- Laravel >= 11.x
- MySQL or another database system

## Installation

Step-by-step instructions on how to get a development environment running:

1. **Clone the repository:**

    ```bash
    git clone https://github.com/mohamedmaktouf/Hellocse.git
    cd Hellocse
    ```

2. **Install dependencies:**

    ```bash
    composer install
   
    ```

3. **Set up the environment file:**

   Copy the `.env.example` file to `.env` and update the necessary environment variables:

    ```bash
    cp .env.example .env
    ```

4. **Generate application key:**

    ```bash
    php artisan key:generate
    ```

## Configuration

Detail the configuration settings:

- **Database Configuration:**

  Update the database credentials in the `.env` file:

    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database
    DB_USERNAME=your_username
    DB_PASSWORD=your_password
    ```


## Running the Application

How to run the application locally:

1. **Run the database migrations:**

    ```bash
    php artisan migrate
    ```

2. **Run the database seeders (if any):**

    ```bash
    php artisan db:seed
    ```

3. **Start the development server:**

    ```bash
    php artisan serve
    ```

   The application will be accessible at `http://localhost:8000`.



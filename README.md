# Laravel URL Shortener (Proof of Concept)

Welcome to the Laravel URL Shortener application! This URL shortener was built from scratch with a focus on clean code and efficient functionality. This README will guide you through the project structure, key components, and setup instructions.

**Note: This project is a proof of concept, created with the primary purpose of providing a deep dive into the code base. It aims to illustrate how components are connected to each other in a basic and simple project. Please note that this project may not be ready for production use and is intended for POC purposes.**


## Table of Contents
1. [Introduction](#introduction)
2. [Key Components](#key-components)
    - [ShortUrlController](#shorturlcontroller)
    - [Service Factory](#service-factory)
3. [Tests](#tests)
    - [Unit Tests](#unit-tests)
    - [Feature Tests](#feature-tests)
4. [Setup Instructions](#setup-instructions)
## Introduction

This Laravel application serves as a URL shortener, allowing users to create shortened versions of long URLs. The project emphasizes a clean and well-organized codebase to ensure maintainability and extensibility.

**MongoDB:** The application uses MongoDB as the database for storing and managing URL data.


## Key Components

### ShortUrlController

The `ShortUrlController` is the primary controller responsible for handling URL shortening requests. It serves as a wrapper for the service factory and manages all its dependencies. This controller ensures that the URL shortening process is streamlined and encapsulates the business logic.

**File:** [ShortUrlController.php](app/Http/Controllers/ShortUrlController.php)

### Service Factory

The service factory is a crucial component that handles the creation of various services involved in the URL shortening process. By utilizing dependency injection, the factory ensures loose coupling between components, making the code more modular and testable.

**File:** [ServiceFactory.php](app/Services/ServiceFactory.php)

## Tests

The application includes both unit and feature tests to maintain code quality and ensure the reliability of the URL shortening functionality.

### Unit Tests

Unit tests focus on individual components of services to validate their behavior in isolation. You can run unit tests using the following command:

```bash
php artisan test --testsuite=Unit
````

### Feature Tests

Feature tests cover end-to-end scenarios to verify the integration and interaction between different components. To run feature tests, use the following command:

```bash
php artisan test --testsuite=Feature
````

## Setup Instructions

To set up the Laravel URL Shortener on your local environment, follow these instructions:

#### Clone the repository:

```bash
git clone https://github.com/abanoubsamaan/shortify.git
````
#### Navigate to the project directory:

```bash
cd shortify
````

#### Install dependencies using Composer:

```bash
composer install
````

#### Copy the .env.example file to .env and configure your MongoDB connection details:
```bash
cp .env.example .env
````

#### Generate an application key:
```bash
php artisan key:generate
````
#### Generate an application key:
```bash
php artisan key:generate
````
#### Start the Laravel development server:
```bash
php artisan serve
````
Visit `http://localhost:8000` in your browser to access the Laravel URL Shortener.


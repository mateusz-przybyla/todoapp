# todoapp

A simple To-do app to manage your tasks and posts.

## Table of contents

- [Overview](#overview)
  - [About](#about)
  - [Framework](#framework)
  - [Database design](#database-design)
  - [Screenshot](#screenshot)
- [My process](#my-process)
  - [Built with](#built-with)
  - [Useful resources](#useful-resources)

## Overview

### About

The purpose of writing this application was to learn the Laravel framework and compare it with custom MVC framework written in the previous application (CreaviteWallet).

How does the application work?

Firstly create an account and confirm email address (email verification). 
User level consists of a to-do and blog sections. 
The logged in user has access to the to-do list and posts list, moreover can add, modify, mark as complete and delete tasks. 
Similar actions are available for posts.

Get your tasks under control!

### Framework

An application uses a built-in user authentication system and generated basic scaffolding and authentication using Bootstrap.

For the todoapp and blog section:
- written routes,
- created appropriate Models,
- created/made migrations,
- created controllers with View and CRUD methods (created, read, update and delete tasks/posts) using Eloquent ORM,
- added validation rules,
- specified fillable properties and used mass assignment,
- used middleware to manage access to the various levels of the application.

To filter the amount of content displayed on the page used pagination.

### Database design

### Screenshots

- Welcome page:

  ![](/readme/welcome.jpg)

- Email verification after registration:

  ![](/readme/email_verification.jpg)

- Home page - mobile view with hamburger menu (mobile-first approach):

  ![](/readme/mobile_first.jpg)

- New task form:

  ![](/readme/new_task.jpg)

- To-do list:

  ![](/readme/todolist.jpg)

- Displaying pagination result:

  ![](/readme/tasks_pagination.jpg)

- New post form:

  ![](/readme/new_post.jpg)

- Posts list:

  ![](/readme/posts_list.jpg)

## My process

### Built with

Frontend:
- ui Bootstrap
- Vite.js

Backend:
- PHP + Laravel Framework

### Useful resources

- https://laravel.com/docs/11.x
- https://www.udemy.com/course/praktyczny-kurs-laravel/
- https://packagist.org/packages/laravel/ui
- https://getcomposer.org/
- https://vitejs.dev/
- https://getbootstrap.com
- https://mailtrap.io/
- https://www.php.net/manual/en/
- https://www.geeksforgeeks.org
- https://stackoverflow.com

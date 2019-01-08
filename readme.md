<h1 align="center">Simple Blog</p>

## About simple blog

simple blog is a web application enable you to view categories and its posts and have admin panel where you can crud over posts and categories made by technologies:



- [Laravel 5.5](https://laravel.com/) as backend.
- [Adminlte dashboard](https://adminlte.io/).
- [Bootstrap 3.3](https://getbootstrap.com/docs/3.3).
- Javascript and [Jquery-3.2.1](https://code.jquery.com/jquery-3.2.1.min.js).
- Backend and frontend validations.
- unit tests.
- [Colorlib 404 v1](https://colorlib.com/wp/free-404-error-page-templates/)  template for error.
- [startbootstrap-coming-soon](https://startbootstrap.com/template-overviews/coming-soon/)  template for welcome page.


## Simple blog advantages

- **SIMPLE USER INTERFACE** a simple user interface that shows group of posts and when I click on post it will take me to another page that shows the post details.

- menu navbar that shows the blog categories.

- In the home page, it show me every post title, category, description, and a button that go to the post details page so you can see the whole post content.

- In the post details page, it show you a post title, category and the whole post content.

- **ADMIN DASHBOARD** an admin dashboard that helps to manage the whole content in the blog.

- Create categories section that shows all the categories. Also links that helps you to add, edit, delete category.


- Create posts section that shows all posts. Also add links that helps you to add, edit, delete posts.

- When you add new post, you can add post title, description, content, and assign a category for this post.


## RESTRICTIONS

### post: 
- post title: required, unique, min length: 3 characters and max length: 70 characters.
- post description: required, min length: 35 characters and max length: 100 characters.
- post content: required, min length: 100 characters.
- post category: required, must exist before.
- when delete a post it will be hard deleted.
- to see posts you have to be logged in.

### category: 
- post name: required, unique and min length: 3 characters.
- when delete a category it will be hard deleted. with all its posts.

### admin dashboard:
- the user with id = 1 will be the admin and it generated from seed with email: admin@laravel.com and password: admin so the system has only one admin in this release.


## [Server Requirements](https://laravel.com/docs/5.5/installation) 
- Apache Web Server 
- PHP >= 7.0.0
- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension


## Installing Simple Blog
- open terminal and copy this 
``https://github.com/AhmedHelalAhmed/blog-task.git``
and paste it then press enter and do all the steps with the same terminal.
- then copy and paste the following commands
``cd blog-task``
``composer install``
``php artisan key:generate ``
``cp .env.example .env ``
<br/> set up the database info<br/> 
make new database with name for example (blog_task) then set up<br/> 
DB_DATABASE=blog_task<br/>
DB_USERNAME=your username<br/>
DB_PASSWORD=your password<br/>
in .env file<br/>
then copy and paste the following commands <br/>
``php artisan config:clear`` <br/>
``php artisan view:clear`` <br/>
``php artisan migrate`` <br/>
``php artisan migrate`` <br/>
``php artisan db:seed `` <br/>
``php artisan serv `` <br/>
then open the url: http://localhost:8000 and here we go.

## Demo
the website deployed in [Heroku](https://heroku.com/apps) connected with postgres database
[Simple Blog Demo](http://simple-blog-task.herokuapp.com)

## Security Vulnerabilities

If you discover a security vulnerability within Simple blog, please send an e-mail to Ahmed Helal via [ahmed.helal.ahmed.ali@gmail.com](mailto:ahmed.helal.ahmed.ali@gmail.com).

## License

The simple blog is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).


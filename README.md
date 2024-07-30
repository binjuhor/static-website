# PHP Website
This is a simple website with blade template engine and jQuery for the frontend, it only for frontend and PHP logic.

This project require `PHP` and `Composer` to run the project. 

PHP version: `8.2` or higher

## Project setup
```
yarn setup
```

### Run project

To run the project you just need to run the command below:

```
yarn start
```

Check the site with project URL on `http://localhost:8080/` 

To combine your `SCSS` file to `CSS` file you need to run the command below:

For dev please run: `yarn dev` 

For Production please run: `yarn build`


### For development

#### Step 1: add new route to the app

Modify code below in `./routes.php` to add new route to the app. Following the FastRoute documentation to add new route.

Example bellow: 
1. `http://localhost:8080` will show your view html content in folder `views/home`.
2. `http://localhost:8080/users` will show your view html content in folder `views/users`.
3. `http://localhost:8080/user/1` will show your view html content in folder `views/test` with `$data` is an array contain `id`.
4. ...

Check blade template example in `resources/views` folder.

```PHP
$r->addRoute('GET', '/', 'home');
$r->addRoute('GET', '/users', 'users');
$r->addRoute('GET', '/user/{id:\d+}', 'test');
$r->addRoute('GET', '/widget/{id:\d+}[/{name}]', 'sport');
```
### Step 2: Create your own view

Create your own view in `resources/views` and with the new route the app will work as expectation.




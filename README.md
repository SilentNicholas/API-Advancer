<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Yii 2 Advanced Project Template</h1>
    <br>
</p>

Yii 2 Advanced Project Template is a skeleton [Yii 2](http://www.yiiframework.com/) application best for
developing complex Web applications with multiple tiers.

The template includes three tiers: front end, back end, and console, each of which
is a separate Yii application.

The template is designed to work in a team development environment. It supports
deploying the application in different environments.

Documentation is at [docs/guide/README.md](docs/guide/README.md).

[![Latest Stable Version](https://img.shields.io/packagist/v/yiisoft/yii2-app-advanced.svg)](https://packagist.org/packages/yiisoft/yii2-app-advanced)
[![Total Downloads](https://img.shields.io/packagist/dt/yiisoft/yii2-app-advanced.svg)](https://packagist.org/packages/yiisoft/yii2-app-advanced)
[![Build Status](https://travis-ci.org/yiisoft/yii2-app-advanced.svg?branch=master)](https://travis-ci.org/yiisoft/yii2-app-advanced)

DIRECTORY STRUCTURE
-------------------

```
common
    config/              contains shared configurations
    mail/                contains view files for e-mails
    models/              contains model classes used in both backend and frontend
    tests/               contains tests for common classes    
console
    config/              contains console configurations
    controllers/         contains console controllers (commands)
    migrations/          contains database migrations
    models/              contains console-specific model classes
    runtime/             contains files generated during runtime
backend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains backend configurations
    controllers/         contains Web controller classes
    models/              contains backend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for backend application    
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
frontend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains frontend configurations
    controllers/         contains Web controller classes
    models/              contains frontend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for frontend application
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
    widgets/             contains frontend widgets
vendor/                  contains dependent 3rd-party packages
environments/            contains environment-based overrides
```

 API
-------

Api application working according to REST API. If you are not registered send a POST request to the address

```
http:/blog.com/signup
```

send next text in the request body

```
{
	"name": "YourName",
	"email": "your@mail.mat",
	"password": "YourPassword"
}
```

If you are already registered in this application and want to use API you can
authenticate with api:
1. Write in your API client POST request

```
http:/blog.com/auth
```
1.1 Body in your request must be

```
{
    "email": "example@net",
    "password": "nameOfYourCat"
}

#when you got token save him for next steps.
``` 

2. Now you must send a GET request with the received Bearer token. Your request should be like the next

```
http://blog.com/profile?Authorization=Bearer...(YourLongToken)
```

3. When you authenticated you have access to task manager. To use it you have next command:

```
GET /task: list all tasks page by page;
HEAD /task: show the overview information of task listing;
POST /task: create a new task;
GET /task/123: return the details of the task 123;
HEAD /task/123: show the overview information of task 123;
PATCH /task/123 and PUT /users/123: update the task 123;
DELETE /task/123: delete the task 123;
OPTIONS /task: show the supported verbs regarding endpoint /task;
OPTIONS /task/123: show the supported verbs regarding endpoint /task/123.
```
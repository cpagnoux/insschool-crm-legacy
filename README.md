# INS School CRM (legacy)

The initial version of INS School's CRM, made with plain PHP (mostly
procedural).

By the time I wrote this app I was a student and this is basically my first
experience in web development. I made the choice to write the code in procedural
style because it was the style I was the most comfortable with (I was mostly
coding in C at this time).

As of now it is obvious to me that the way I developed this software is far from
perfect. But still, it is in production and it seems to work pretty well with no
bugs so far (at least none were reported from the users of the app).

But as there is a need for new features and the project became hard to maintain
I decided to rewrite it using Laravel.

You can find the new repo [here](https://github.com/cpagnoux/insschool-crm).

## Installation

The project runs on a classic LAMP stack (or anything similar e.g. WAMP). The
app was written with deployment on a server running PHP 5.6 in mind.

In order to deploy this app you need to install the dependencies:

```sh
composer install
```

Then you have to create the config file (in `app/config`). You can do this by
copying the file `app.config.php.dist` to `app.config.php` and then editing it
as needed. The most important settings are the database credentials.

## How it works

The directory served by the web server is `public`. It contains two front
controllers:

*   `index.php`, which is the main entry point of the app and is used for the
    CRM itself. Login is required in order to access this part of the app.
*   `pre-registration.php`, which is an entry point allowing people to
    pre-register for a year or quarter of dance lessons. By default, it shows a
    form for pre-registering. After validation, it shows a summary of the
    submitted pre-registration.

The `public` directory also contains the various assets required by the app.

The business logic of the app is contained in the `app` directory. It is
structured as follows:

```
app/
├── config/
├── src/
│   └── controllers/
└── views/
```

`config` contains the configuration of the app.

`src` contains most of the app's source code. The subdirectory `controllers`
contains the controllers of the app, which consist of switch statements on an
action determined from GET and/or POST parameters.

`views` contains the templates of the app. These are not well organized to be
honest. At least I could have split them in multiple subdirectories.

As you can see, everything is home-made in this project. I didn't use any
framework whatsoever (even the CSS is entirely written by hand). But it somehow
works. And it allowed me to learn the basics of web development.

# Cut.It

## Table of contents

-   [General Information](#general-information)
-   [Technologies](#technologies)
-   [Setup](#setup)
-   [Screenshots](#screenshots)
-   [License](#license)

<br />

## General Information

A simple link shortener created using PHP and MariaDB available in English and Polish.

Most link shorteners offer too many features, most are hidden behind a pay wall or are just unnecessary. People generally expect a straightforward action and a concrete result of simply shortening a link and that's what my site does, optionally allowing you to generate a QR code.

<br />

## Technologies

-   PHP: ^7.3|^8.0
-   chillerlan/php-qrcode: ^4.3
-   Laravel: ^8.65
-   MariaDB: ^10.4.20
-   Composer
-   SCSS
-   jQuery 3.6.0

<br />

## Setup

To run this site locally, first clone this repository.

Next, create a database named 'shortened' and make sure you have all the [technologies](#technologies).

To make sure everything works edit the php.ini file, find the line 'extension=gd and remove '.

Now use the following commands on Windows (on MacOs/Linux use the equivalent of these commands):

```
$ cd .\urlShortener\
$ composer install
$ php artisan migrate
$ php artisan serve
$ php artisan schedule:work
```

Now the page will be available in the browser at 127.0.0.1:8000, if you want it to be available across the LAN, use:

```
// in place of [IP] enter the current IP address of the computer, e.g. 192.168.1.101

$ php artisan serve --host=[IP]
```

<br />

## Screenshots

<br />

#### Homepage

![Homepage](https://user-images.githubusercontent.com/61974579/147574153-2e77b14c-1b9a-4677-a4e2-5b1fc66ef909.jpg)

<br />

#### Homepage with shortened URL and generated QR code

![Homepage with result](https://user-images.githubusercontent.com/61974579/147574777-d39ca674-aef9-46d1-a770-cefadd384ee0.jpg)

<br />

## License
All rights reserved

# _Rolodexterous_

##### _Rolodexterous is a simple PHP/MySQL address book & contact management app originally created for the Epicodus week one object-oriented PHP Code Review, updated 2015-09-21_

#### By _**Julian Stewart**_

## Setup

_This project makes use of a PHP dependency manager. Full details and installation instructions can be found at https://getcomposer.org/_

_Your computer must also be set up to support PDO (PHP Data Objects) and MySQL._

_To run the application:_

* _Start your MySQL server from the root level of the project folder, being sure to adjust the port number if needed_
* _Import the databases included in this repository in the sql/ directory, or run the following commands:_
<pre>
CREATE DATABASE address_book;
USE address_book;
CREATE TABLE contacts (id serial PRIMARY KEY, name VARCHAR (255), phone_number VARCHAR(255), address VARCHAR (255), category_id INT);
CREATE TABLE categories (id serial PRIMARY KEY, name VARCHAR (255));
</pre>
* _Start your PHP server from the web/ directory within the project folder_
* _Point your browser to your localhost server address_

## Technologies Used

_PHP, Silex, Twig, MySQL_

### Legal

Copyright (c) 2015 **_Julian Stewart_**

This software is licensed under the MIT license.

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.

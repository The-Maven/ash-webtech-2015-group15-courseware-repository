#This is information about all the methods used in developing the project.

Addcourse.php
A class extends the course.php class that allows the administrator to add course on to the repository

Faculty.php
Methods
Add() – insert into the database the details of a faculty
Update\_faculty() – updates the details of a faculty
Get\_row() – returns the number of available rows in a table in the database
Get\_all() – returns the details of faculty members
Search\_faculty() – returns details of faculty given the using the given id
Delete\_faculty() – removes a faculty from the database
getProf() – returns the details of a particular professor

Course.php
This class extends the adb.php class

Methods

Create\_course() – gives an administrator the privilege if creating and adding a course to the repository
Update\_course() – updates the course details of a particular course given an id, faculty id, course title.
Delete\_course() – removes a course from the database
Get\_all() – returns all the courses in the database
Get\_row() – returns the number of available row with data in it

Functions.php
Fields
$dbhost – server reference
$dbname – name of database
$dbuser – user of server
$dbpass – password of database
$connection – database connection reference
Methods
queryMysql(0 - Runs query on existing db connection. If there is no connection it creates new connection. Returns true if query is successful, else false.
createTable() – creates table in database given name and sql query
destroySession() – kills the session when after use
showProfile() – returns the profile of a professor given his or her name

Login.php
References the header.php class
This class allows users to access the courseware repository

Header.php
It references the functions.php class
This class also has session\_start().
Methods
sendRequest() – sends and ajax request to the server
profSearch() – searches for a particular professor in the faculty table
displayCourse() – takes in an argument and returns course details

Professor.php
The class referenced adb.php, course.php and the functions.php classes

Fields

$course – name of course
$professor\_id
$first\_name – professor’s first name
$last\_name – professor’s surname
$email – email of professor
$qualifications – academic qualifications of professor
$username – professor’s login user name
$password – professoor’s login password

Methods

_construct() – creates an object of the course class
get\_professor\_id() – returns the id of professors from the professor table using the user name as an id
get\_professor\_name() – returns names of professors
fill\_table() – displays details of professors; their names the courses that the teach, objectives of courses, title, and faculty names
remove\_course() – takes in an argument and deletes a particular course using an id
make\_course() – creates a course
edit\_course() – updates a course’s content
edit\_professor() –  the details of a professor
search\_course() – returns a course using an inner-join query on all of the tables in the database_

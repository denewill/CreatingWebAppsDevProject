<!-- 
Filename: about.html
Author: Michelle Chuwindra
Created: 27 Mar 2021
Last Modified: 28 Mar 2021
Description: About page for Assignment 1
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="description" content="Assignment 1 submission: Laptop Computer shop about page" />
    <meta name="keywords" content="HTML5, CSS, tags" />
    <meta name="author" content="Michelle Chuwindra"  />
    <title>About Us</title>
    <link href="styles/style.css" rel="stylesheet"/>

</head>
<body>
    <header>
        <?php
            include ('header.inc');
            include ('menu.inc');
        ?>      
    </header>
    <article>
        <h2>About Us</h2>
        <dl class="aboutdl">
            <dt>Name: </dt>
                <dd>Michelle Chuwindra</dd>
            <dt>Student ID:</dt>
                <dd>101721043</dd>
            <dt>Course:</dt>
                <dd>COS10011 - Creating Web Apps</dd>
            <dt>Email:</dt>
                <dd><a href="mailto:101721043@student.swin.edu.au">101721043@student.swin.edu.au</a></dd>
        </dl>
        <h2>My Timetable</h2>
        <figure class="pfp">
            <img src="images/pfp.jpg" alt="Profile Picture"/>
        </figure>
        <table class="timetable">
            <thead>
                <tr class="tableheading">
                    <th class="tbhead">Time</th>
                    <th class="tbhead">Monday</th>
                    <th class="tbhead">Tuesday</th>
                    <th class="tbhead">Wednesday</th>
                    <th class="tbhead">Thursday</th>
                    <th class="tbhead">Friday</th>
                </tr>
            </thead>      
            <tbody>
                <tr>
                    <th rowspan="2" class="tbtime">8AM</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                    <th rowspan="4" class="eee">EEE40014 Live Online 1</th>
                    <th>&nbsp;</th>
                </tr>
                <tr>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                </tr>
                <tr>
                    <th rowspan="2" class="tbtime">9AM</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                </tr>
                <tr>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                </tr>
                <tr>
                    <th rowspan="2" class="tbtime">10AM</th>
                    <th>&nbsp;</th>
                    <th rowspan="4" class="con">COS40003 Live Online 1</th>
                    <th>&nbsp;</th>
                    <th rowspan="4" class="eee">EEE40014 Lab 2</th>
                    <th>&nbsp;</th>
                </tr>
                <tr>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                    <th rowspan="4" class="ucd">COS20001 Tutorial 1</th>
                </tr>
                <tr>
                    <th rowspan="2" class="tbtime">11AM</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                </tr>
                <tr>
                    <th rowspan="4" class="cwa">COS10011 Live Online 1</th>
                    <th>&nbsp;</th>
                </tr>
                <tr>
                    <th rowspan="2" class="tbtime">12PM</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                </tr>
                <tr>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                    <th rowspan="4" class="eee">EEE40014 Lab 1</th>
                    <th>&nbsp;</th>
                </tr>
                <tr>
                    <th rowspan="2" class="tbtime">1PM</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                </tr>
                <tr>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                    <th rowspan="2" class="cwa">COS10011 Lab 1</th>
                    <th>&nbsp;</th>
                </tr>
                <tr>
                    <th rowspan="2" class="tbtime">2PM</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                </tr>
                <tr>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                </tr>
                <tr>
                    <th rowspan="2" class="tbtime">3PM</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>                    
                    <th rowspan="4" class="ucd">COS20001 Live Online 1</th>
                    <th rowspan="2" class="eee">EEE40014 Tutorial 1</th>
                    <th>&nbsp;</th>
                </tr>
                <tr>
                    <th>&nbsp;</th>
                    <th rowspan="2" class="con">COS40003 Lab 1</th>
                    <th>&nbsp;</th>
                </tr>
                <tr>
                    <th rowspan="2" class="tbtime">4PM</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                </tr>
                <tr>
                    <th>&nbsp;</th>
                    <th rowspan="2" class="con">COS40003 Lab 2</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                </tr>
                <tr>
                    <th rowspan="2" class="tbtime">5PM</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                </tr>
                <tr>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                </tr>
            </tbody>                
        </table>
        <h2>My Resume</h2>
        <a href="https://drive.google.com/file/d/1lX5PPENR4_CCh_U181ysb4BXuqZOAx-7/view?usp=sharing"><em>PDF Link</em></a>
        <hr />
    </article>
    <footer>
        <?php include('footer.inc'); ?>
    </footer>
</body>
</html>
<!DOCTYPE html>
<html>
    <head>
        <title>Include en Require</title>
        <style>
            body {
                margin:0;
            }
            ul {
                list-style-type: none;
                margin: 0;
                padding: 0;
                overflow: hidden;
                background-color: #333;
                position: fixed;
                top: 0;
                width: 100%;
            }
            li {
                float: left;
            }
            li a {
                display: block;
                color: white;
                text-align: center;
                padding: 14px 16px;
                text-decoration: none;
            }
            li a:hover:not(.active) {
                background-color: #111;
            }
            .active {
                background-color: #4CAF50;
            }
            .container, .artikel {
                padding:20px;
                margin-top:30px;
            }
            footer {
                background-color:#333;
                color:white;
                padding:1px 20px;
            }
            .artikel {
                padding:20px;   
                background-color:floralwhite;
            }
            
        </style>
    </head>
    <body>
        <header>
            <ul>
              <li><a class="active" href="#home">Home</a></li>
              <li><a href="#news">News</a></li>
              <li><a href="#contact">Contact</a></li>
              <li><a href="#about">About</a></li>
            </ul>
        </header>
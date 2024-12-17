<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bulletin Board</title>
    <style>
        nav ul {
            list-style: none;
            /* Remove bullet points */
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
            /* Light gray background */
            overflow: hidden;
            /* Prevents content from overflowing */
        }

        nav li {
            float: left;
            /* Make items horizontal */
        }

        nav a {
            display: block;
            /* Make the entire list item clickable */
            color: #333;
            /* Dark gray text */
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            /* Remove underlines */
        }

        nav a:hover {
            background-color: #ddd;
            /* Lighter gray on hover */
        }

        /* Optional: Style the active link */
        nav a.active {
            background-color: #4CAF50;
            /* Green background for the active link */
            color: white;
        }
    </style>
</head>

<body>
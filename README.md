# portfolio-project

Built for Fundamentals of Web Technology Module 2026

A personal portfolio blog website I designed and built from scratch as coursework to showcase my projects, skills and experience as a Computer Science student.


![Screenshot of portfolio homepage](webpageSS.png)

## Features

- Responsive layout that works on desktop and mobile
- Pages: Homepage, Education, Portfolio, Skills, Blog
- PHP validates user login, and manages blog posts and comments
- JavaScript validates that all fields are filled in before a new blog post is submitted, and lets the user clear the form.

## Built with

- HTML
- CSS
- JavaScript
- PHP
- MySQL

## Running it locally

1. Install [XAMPP](https://www.apachefriends.org/) (or MAMP).
2. Copy this project folder into the `htdocs` directory.
3. In the XAMPP control panel, start both **Apache** and **MySQL**.
4. Open `http://localhost/phpmyadmin` and create a database called `portfolio`.
5. Select the `portfolio` database, click **Import**, and upload `portfolio.sql`.
6. Open `http://localhost/portfolio` in your browser.
7. Demo blog login (for testing only): email `admin@gmail.com`, password `password123`.

The site connects to MySQL as `root` with no password (the XAMPP defaults), using the database name `portfolio`.

## What I learned

- Using semantic markup when using HTML
- Structuring a multi-page site and keeping the CSS organised using flexbox and grids and making the layout responsive
- PHP handling input login validation and keeping users logged in using sessions


## Author

Morolake Odubiyi
[LinkedIn](http://linkedin.com/in/morolake-odubiyi-69083a280) | [GitHub](https://github.com/morolake0)

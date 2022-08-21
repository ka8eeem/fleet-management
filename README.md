# Fleet Management System

simple fleet management system to book tickets and retrieve trips.

system has a predifined trips that crosses 3 stations with 4 route lines, each has its own ticket price.

## System Prerequisite

1) Php >= 8.0
2) Mysql

## Installation
1) change .env.example to .env and set your server environment passwords
2) run command ```bash php artisan key:generate```
3) run command ```bash php artisan migrate --seed```

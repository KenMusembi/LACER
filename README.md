# LACER PROJECT

Laravel API Consumer and Excel Reader is a Laravel project for consuming Marvel APIs and parsing Excel documents. 

## Requirements
The assumption is that you already have Composer, Laravel, Php installed on your computer, Also ensure to connect to your local MySQL database instance.

## Installation

To install the project on your local machine, clone or download the project then open a local set up supporting Laravel and run. use these set of commands

```bash
git clone https://github.com/KenMusembi/LACER.git
```
then run composer install to install required dependancies.
```bash
composer install
```
the generate key in env.
```bash
php artisan key:generate
```
## Setup
You can replace the mysql database information to match to yours. Also replace this line to ensure Jobs run through the database

```bash
QUEUE_CONNECTION=database
```
Run this command to migrate the datatabse.
```bash
php artisan migrate
```

Now that you have your env file and database setup, you can run 

```bash
php artisan serve
```

# Automatic Job Schedling and Cache 
Run this important command to keep the job running for imports and exports
```bash
php artisan queue:work
```
Once the jobs queue is running and open for new jobs, Open the project on the url provided. Register with your own details, and login.

## Issues
If you have any issues kindly reach out to me here or on email at kenmusembi21@gmail.com

## Android Screenshots

  Marvel Characters                   
:-----------------------------------------------------:
![](https://github.com/KenMusembi/LACER/blob/main/screenshots/marvel_characters.jpg)

   Excel File Import       
:-----------------------------------------------------:
![](https://github.com/KenMusembi/LACER/blob/main/screenshots/excel_contents.jpg)

## Contributing
Pull requests are not welcome for now. 

## Other projects
 Project Name        |Stars        
:-------------------------|-------------------------
[HealthWise](https://github.com/KenMusembi/HealthWise)| [![GitHub stars](https://img.shields.io/github/stars/KenMusembi/HealthWise?style=social)](https://github.com/login?return_to=%2FKenMusembi%HHealthWise)
[HealthSpots Kenya](https://github.com/KenMusembi/HospitalsKenyaAPP)| [![GitHub stars](https://img.shields.io/github/stars/KenMusembi/HospitalsKenyaApp?style=social)](https://github.com/login?return_to=%2FKenMusembi%HospitalsKenyaAPP)
[Medyq Patient](https://github.com/KenMusembi/MedyqPatient)| [![GitHub stars](https://img.shields.io/github/stars/KenMusembi/MedyqPatient?style=social)](https://github.com/login?return_to=%2FKenMusembi%MedyqPatient)
[Jitenge iOS](https://github.com/KenMusembi/jitenge_ios)| [![GitHub stars](https://img.shields.io/github/stars/KenMusembi/jitenge_ios?style=social)](https://github.com/login?return_to=%2FKenMusembi%jitenge_ios)


## Created & Maintained By
[Ken Musembi](https://github.com/KenMusembi) ([Twitter](https://twitter.com/NevilKenny)) ([Youtube](https://www.youtube.com/channel/UCZHrxsZeOV7WZJ6YQWuaRhw)) ![Twitter Follow](https://img.shields.io/twitter/follow/NevilKenny?style=social) 


> If you found this project helpful or you learned something from the source code and want to thank me, consider buying me a cup of :coffee:
>
> * [PayPal](https://paypal.me/KenMusembi/)


> You can also nominate me for Github Star developer program  [here](https://stars.github.com/nominate)
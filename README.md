# Point of Sale (POS)

### Description
This project is a Point of Sale (POS) system constructed with the Laravel framework. Bootstrap CSS and native JavaScript are employed for its frontend design. On the backend, the project makes use of Laravel's built-in functionalities. The MySQL database, specifically accessed through PhpMyAdmin, is used for data management.

### Technologies Used
- **Backend Framework:** Laravel
- **Frontend Framework:** Bootstrap 5
- **Database:** MySQL (accessed via PhpMyAdmin)

### Installation and Usage
1. Clone this repository to your local machine.
   ```bash
   git clone https://github.com/Haen0/point_of_sale.git
   ```
2. Navigate to the project directory.
   ```bash
   cd repository_name
   ```
3. Install all the required dependencies using Composer.
   ```bash
   composer install
   ```
4. Copy the `.env.example` file to `.env`.
   ```bash
   cp .env.example .env
   ```
5. Configure your database connection in the `.env` file.
   ```
   DB_CONNECTION=mysql
   DB_HOST=database_host_name
   DB_PORT=database_port
   DB_DATABASE=database_name
   DB_USERNAME=database_username
   DB_PASSWORD=database_password
   ```
6. Generate the application key.
   ```bash
   php artisan key:generate
   ```
7. Run the migrations to create the necessary tables.
   ```bash
   php artisan migrate
   ```
8. Finally, start the server.
   ```bash
   php artisan serve
   ```
   The project will run at [http://localhost:8000](http://localhost:8000).

If you want to use existing data

1. extract the menu.zip file in this folder, then move it to this directory.
   ```
   storage/app/public/img/menu/
   ```
2. Either dump the data in the menus.sql file or delete the menus table in the database and import the menus.sql file in this folder into the database.

### Additional Notes

- Make sure you have PHP, and Composer installed on your system.
- Create a database in MySQL and update the `.env` file accordingly.
- Bootstrap CSS is utilized for frontend styling, providing a flexible customization option to suit your needs.
- Feel free to explore and modify the project according to your requirements.
- internet required to run cdn tailwind 

For more information on Laravel, Tailwind CSS, and other technologies used in this project, refer to their respective documentation:

- [Laravel Documentation](https://laravel.com/docs)
- [Bootstrap 5 Documentation](https://getbootstrap.com/docs/5.3/getting-started/introduction/)

---

Feel free to reach out if you have any questions or need further assistance with setting up or using this Point of Sale project. Happy coding!

### Contribution
Contributions are always welcome! To propose changes, please create a pull request.

### License
This project is licensed under the [MIT License](https://opensource.org/licenses/MIT).

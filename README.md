# Hotel Booking Application

## Overview

### <ins>Introduction</ins>

Welcome to the documentation of this hotel booking application. In this section, I will be outlining the the **goals**, **capabalities**, and **significance** of the project.

### <ins>Goals and Objectives</ins>

This hotel booking application aims to address these specific challenges and provide an efficient solution:

- Create an efficent and easy-to-use interface that assists clients of the booking agency in finding, reserving, and securing accommodation in South Africa.

- This application should assist employees of the booking agency in effectively managing the various entities of the application. To provide a consistent user experience. Whether it be through managing clients and/or staff, reservations made through the application, and properties available to reserve within the application.

### <ins>Capabilities</ins>

#### Client

- Register as a user of the application.

- Browse the various accommodations available to them within the application.

- Reserve and secure accommodation once found and satisified.

- Manage the data linked to profiles. This entails being able to update their existing user information that was provided during the registration process and view and/or cancel their reserved accommodation/accommodations.

#### Admin

- Manage all existing entities within the applications database.

- In the context of clients/users of the application, admins have the following privileges:

1. View all clients currently registered to the application and their client-specific information.
2. Add other staff/admin to the database.
3. Update client/admin information.
4. Delete clients/admins from the applications database.

- In the context of accommodation available in the application, admins have the following privileges:

1. View all accommodation entities in the database. Along with their detailed information (names, costs per night, descriptions, features, etc).
2. Add new accommodation entities to the database.
3. Update existing accommodation.
4. Delete acccommodation entities from the database.

- In the context of reservations made in the application, admins have the following privileges:

1. View all reservations made through the application.

### <ins>Benefits and Significance</ins>

This hotel reservation system offers several benefits:

- Efficiency - Simplifies resource management, reducing manual effort and potential errors.

- Ease of Access - Provides a simple and user-friendly interace to interact with the applications data.

- Data Insights - Provides detailed information on data entities (users, accommodations, bookings) in readable formats.

## Database Schema

### <ins>Introduction</ins>

This section outlines the structure and organization of the database used in this hotel reservation application.

It provides an overview of the tables, relationships, and key components that store and manage the library's data.

### <ins>Entity-Relationship Diagram (ERD)</ins>

![image](https://github.com/KingofLimbs-1/hotel-booking-app/assets/99418553/11ad42ec-204c-465d-8616-6a6811463f5e)


## <ins>Tables and Fields</ins>

### Users

- Table name: users
- Purpose: Table used to store all the data related to a user of the application, whether it be a client or admin.

##### Table Structure

| Name      | Type         | Constraints | Default |
| --------- | ------------ | ----------- | ------- |
| user_id   | int(11)      | Primary 🔑  | None    |
| username  | varchar(100) | None        | None    |
| full_name | varchar(100) | None        | None    |
| email     | varchar(60)  | None        | None    |
| password  | varchar(60)  | None        | None    |
| role      | varchar(15)  | None        | None    |

##### Relationships

- user_id - "One to one" relationship with **customer** table.
- user_id - "One to one" relationship with **staff** table.

### Customer

- Table name: customer
- Purpose: Table used to store all the data related to clients of the application.

##### Table Structure

| Name        | Type         | Constraints | Default |
| ----------- | ------------ | ----------- | ------- |
| customer_id | int(11)      | Primary 🔑  | None    |
| user_id     | int(11) | Foreign 🔑  | None    |

##### Relationships

- user_id - "One to one" relationship with **users** table.

### Staff

- Table name: staff
- Purpose: Table used to store all the data related to staff/admins of the application.

##### Table Structure

| Name     | Type         | Constraints | Default |
| -------- | ------------ | ----------- | ------- |
| staff_id | int(11)      | Primary 🔑  | None    |
| user_id  | int(11) | Foreign 🔑  | None    |

##### Relationships

- user_id - "One to one" relationship with **users** table.

### Hotels

- Table name: hotels
- Purpose: Table used to store all the data related to the accommodations of the application.

##### Table Structure

| Name           | Type         | Constraints | Default |
| -------------- | ------------ | ----------- | ------- |
| hotel_id       | int(11)      | Primary 🔑  | None    |
| name           | varchar(50)      | None        | None    |
| thumbnail      | varchar(200) | None        | None    |
| cost_per_night | bigint       | None        | None    |
| description    | varchar(500) | None        | None    |
| beds           | int(11)      | None        | None    |
| type           | varchar(30)  | None        | None    |
| features       | varchar(500) | None        | None    |
| rating         | decimal      | None        | None    |
| city           | varchar(30)  | None        | None    |
| address        | varchar(50)  | None        | None    |
| images         | varchar(500) | None        | None    |

##### Relationships

- None.

### Bookings

- Table name: bookings
- Purpose: Table used to store all the data related to reservations made on the application.

##### Table Structure

| Name        | Type         | Constraints | Default |
| ----------- | ------------ | ----------- | ------- |
| booking_id  | int(11)      | Primary 🔑  | None    |
| customer_id | int(11)      | Foreign 🔑  | None    |
| hotel_id    | int(11)      | Foreign 🔑  | None    |
| check_in    | datetime     | None        | None    |
| check_out   | datetime | None        | None    |
| days        | int(11)      | None        | None    |
| total_cost  | decimal      | None        | None    |
| status      | varchar(30)  | None        | false   |

##### Relationships

- customer_id - "One to one" relationship with **customers** table.
- hotel_id - "One to one" relationship with **hotels** table.

## Database Setup

Prerequisites
Before setting up the database, ensure that you have the following installed:

- XAMPP or MAMP for creating a local server environment.
- Visual Studio Code for code editing.

### <ins>Steps to Set Up the Database</ins>

1. #### Clone the Repository:

Clone this project repository to your local machine using Git. Open your terminal and run the following command:

```
git clone https://github.com/your-username/your-repo.git
```

2. #### Start XAAMP/MAMP:

   Open XAMPP or MAMP and start the Apache and MySQL services. This will create a local server environment to run your application.

3. #### Import the database:

Locate the SQL copy of the database (library.sql) in the project directory. Use a tool like phpMyAdmin or the command line to import the database into your local MySQL server.

- #### Using phpMyAdmin:

- Open a web browser and navigate to http://localhost/phpmyadmin.
- Create a new database with a suitable name.
- In the newly created database, navigate to the "Import" tab.
- Choose the SQL file (your-database.sql) and click "Go" to import the database.

- #### Using Command Line:

Open a terminal and navigate to the project directory containing 'hotel-reservation-system.sql'.

Run the following command to import the database:

```
mysql -u root -p your_database_name < db_name.sql
```

- You will be prompted to enter your MySQL password.

4. #### Configure Connection:

1. In your project codebase, open the file where the database connection details are stored. This is in the config/database.php file.

1. Create a new config.php file in the root directory of the project, and add the following code, replacing placeholders with your own credentials:

```
<?php
define("DB_HOST", "localhost");
define("DB_USERNAME", "your_username");
define("DB_PASSWORD", "your_password");
define("DB_NAME", "your_database_name");
?>
```

3. Save the 'config.php' file.

4. In the project codebase, look for the database.php file where the connection is established. Require the config.php file by adding this line at the beginning:

```
require_once(__DIR__ . '/config.php');
```

5. #### Test the Application:

Start your application in the local server environment provided by XAMPP/MAMP. Access the application in your web browser and verify that it is connected to the local database.

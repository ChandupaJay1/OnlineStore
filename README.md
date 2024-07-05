# OnlineStore


Welcome to the OnlineStore! This project is an online store for a clothing shop, built using PHP and JavaScript. It includes a variety of features to provide a seamless shopping experience for users.

## Table of Contents

- [Features](#features)
- [Installation](#installation)
- [Usage](#usage)
- [Technologies](#technologies)
- [Contributing](#contributing)
- [License](#license)
- [Contact](#contact)

## Features

- User registration and login
- Product listing and search
- Shopping cart functionality
- Order management
- Admin panel for product and order management
- Responsive design

## Installation

### Prerequisites

- PHP 7.x or higher
- MySQL 5.x or higher
- Apache or Nginx web server
- Composer

### Steps

1. **Clone the repository:**
    ```bash
    git@github.com:ChandupaJay1/OnlineStore.git
    cd OnlineStore
    ```

2. **Install dependencies:**
    ```bash
    composer install
    ```

3. **Set up the database:**

    - Create a database in MySQL.
    - Import the database schema from `db/onlineshopping_db.sql`.

4. **Configure the environment variables:**

    Create a `config.php` file in the root directory and add your database credentials and other configurations:
    ```config
    -$servername = "localhost";
    -$username = "root";
    -$password = "password";
    -$database = "database";
    ```

5. **Run the development server:**
    ```XAMMP
    Run XAMMP and turn Start Apache.
    ```

6. **Open the application in your browser:**
    ```
    [http://localhost:8000](http://localhost/onlinestore/index.php)
    ```

## Usage

### User Registration and Login

- Users can register for an account and log in to access their shopping cart and order history.

### Browsing Products

- Products are listed on the main page. Users can search for products by category, name, or price range.

### Shopping Cart

- Users can add products to their cart and proceed to checkout.

### Admin Panel

- Admins can log in to manage products and orders through the admin panel.

## Technologies

- **Backend:** PHP
- **Frontend:** HTML, CSS, JavaScript, jQuery
- **Database:** MySQL
- **Server:** Apache/Nginx

## Contributing

We welcome contributions to improve this project! To contribute, please follow these steps:

1. Fork the repository.
2. Create a new branch (`git checkout -b feature-branch`).
3. Make your changes and commit them (`git commit -m 'Add new feature'`).
4. Push to the branch (`git push origin feature-branch`).
5. Create a new Pull Request.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

## Contact

If you have any questions or feedback, feel free to reach out:

- **Email:** Chandupajayalath20@gmail.com
- **GitHub:** [ChandupaJay1](https://github.com/ChandupaJay1)

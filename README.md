# OnlineShop
PHP, MySQL, HTML, and CSS project.

# OnlineShop

## Overview

OnlineShop is a fully functional web application designed to showcase and manage products while providing a streamlined shopping experience. The application is built using PHP, MySQL, HTML, and CSS and supports essential e-commerce functionalities such as user authentication, product management, shopping cart, and checkout processes.

## Features

### User Authentication

- **Registration**: New users can register by providing their details.
- **Login/Logout**: Existing users can log in securely and log out when done.

### Product Management

- **Add Product**: Admins can add new products with images, descriptions, and prices.
- **Update Product**: Edit existing product details including price, name, and image.
- **Delete Product**: Remove unwanted products from the database.

### Shopping Cart

- **Add to Cart**: Users can add products to their cart.
- **Update Cart**: Modify product quantities in the cart.
- **Remove Items**: Delete specific items from the cart.
- **Order Summary**: Displays a detailed summary of items, prices, and total cost.

### Checkout

- Place an order and generate an order confirmation number.

## Technologies Used

- **Backend**: PHP
- **Database**: MySQL
- **Frontend**: HTML, CSS, and Bootstrap

## Project Structure

```
OnlineShop/
├── Includes/
│   ├── footer.php
│   └── nav.php
├── uploads/ (Images folder)
├── added.php
├── cart.php
├── checkout.php
├── create.php
├── db.php
├── delete.php
├── index.php
├── login.php
├── logout.php
├── read.php
├── register.php
├── style.css
└── update.php
```

## Installation

### Prerequisites

- PHP 7.x or later
- MySQL 5.7 or later
- Apache server or XAMPP/WAMP/MAMP for local development

### Steps

1. Clone this repository:
   ```bash
   git clone https://github.com/keisaj9006/OnlineShop.git
   ```
2. Navigate to the project folder:
   ```bash
   cd OnlineShop
   ```
3. Import the database:
   - Open `phpMyAdmin`.
   - Create a new database named `onlineshop`.
   - Import the SQL file located in the root directory (e.g., `database.sql`).
4. Configure the database connection:
   - Open `db.php` and update the database credentials:
     ```php
     $host = 'localhost';
     $username = 'root';
     $password = ''; // Replace with your MySQL password
     $database = 'onlineshop';
     ```
5. Start the local server:
   - For XAMPP:
     - Place the project folder inside the `htdocs` directory.
     - Start Apache and MySQL in the XAMPP control panel.
     - Access the application at `http://localhost/OnlineShop`.

## Usage

### Admin Actions

- Add, update, or delete products via the respective pages.

### User Actions

1. Register or log in.
2. Browse products on the shop page.
3. Add products to the shopping cart.
4. Proceed to checkout to place an order.

## Screenshots

1. **Homepage (Login):**
   Displays login and registration options.

2. **Shop Page:**
   Browse products with options to add to the cart.

3. **Cart Page:**
   View and manage products in the shopping cart.

4. **Admin Pages:**
   Add, update, or delete products from the database.

## Future Enhancements

- Implement payment gateway integration for checkout.
- Add product categories and filtering options.
- Enable order history and tracking for users.
- Improve UI with modern frameworks like React or Vue.js.

## Contribution

Feel free to fork this repository and submit pull requests for new features or bug fixes. For major changes, please open an issue to discuss your proposed changes.

## License

This project is open-source and available under the MIT License.

---

Developed by Joanna (Keisaj9006) [GitHub Repository](https://github.com/keisaj9006/OnlineShop)



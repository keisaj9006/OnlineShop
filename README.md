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

- PHP
- MySQL
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

1. Register/ log in.
2. Browse products on the shop page.
3. Add products to the shopping cart.
4. Proceed to checkout to place an order.

## Screenshots

1. **Homepage:**
![Zrzut ekranu 2025-01-13 220855](https://github.com/user-attachments/assets/b995524b-0ced-4d17-b6d4-5ced5d13ff85)
2. **Login Page:**
![Zrzut ekranu 2025-01-13 221015](https://github.com/user-attachments/assets/b3d92254-6983-481e-9a5c-fed8280d58d9)
3. **Register Page:**
![Zrzut ekranu 2025-01-13 221022](https://github.com/user-attachments/assets/15590072-eaaf-4c96-be01-eeddd0860e5c)
5. **Shop Page:**
![Zrzut ekranu 2025-01-13 220910](https://github.com/user-attachments/assets/07c4c50d-3ebe-42f8-9f67-f6899c9da6cb)
6. **Cart Page:**
![Zrzut ekranu 2025-01-13 220951](https://github.com/user-attachments/assets/7c4f67af-738f-43e5-8247-fac95e433dcb)
7. **Add/ Update/ Delete:**
![Zrzut ekranu 2025-01-13 220910](https://github.com/user-attachments/assets/b9ae17d4-224d-4c81-a7bc-dc6b3ed877a3)
![Zrzut ekranu 2025-01-13 220919](https://github.com/user-attachments/assets/067f18a9-c1af-4264-abd9-34dbacfe1faf)
![Zrzut ekranu 2025-01-13 220924](https://github.com/user-attachments/assets/125167f2-1712-4af8-ab33-e05c71a3abe7)
8. **Database View:**
![Zrzut ekranu 2025-01-13 222805](https://github.com/user-attachments/assets/74281747-58d1-49a6-9884-2c7f0839a4a5)
![Zrzut ekranu 2025-01-13 222811](https://github.com/user-attachments/assets/bcb30ca4-afd0-4605-8f10-959cfc793a2e)
![Zrzut ekranu 2025-01-13 222824](https://github.com/user-attachments/assets/103841f2-f029-40a1-8506-e17605aaa3a0)
![image](https://github.com/user-attachments/assets/84103428-dd59-4658-823f-b3dc5091c770)

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



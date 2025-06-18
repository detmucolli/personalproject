# Shopping Website

This project is a simple shopping website built using PHP for the backend and HTML, CSS, and JavaScript for the frontend. It includes user authentication features such as login and signup, as well as CRUD functionality for managing products.

## Features

- User authentication (login and signup)
- CRUD operations for products
- Responsive design
- User-friendly interface

## Project Structure

```
shopping-website
├── backend
│   ├── config
│   │   └── db.php
│   ├── controllers
│   │   ├── AuthController.php
│   │   └── ProductController.php
│   ├── models
│   │   ├── User.php
│   │   └── Product.php
│   ├── routes
│   │   ├── auth.php
│   │   └── products.php
│   ├── public
│   │   └── index.php
│   └── utils
│       └── helpers.php
├── frontend
│   ├── css
│   │   └── styles.css
│   ├── js
│   │   └── main.js
│   ├── pages
│   │   ├── index.html
│   │   ├── login.html
│   │   ├── signup.html
│   │   ├── products.html
│   │   └── cart.html
│   └── components
│       ├── header.html
│       └── footer.html
├── .gitignore
└── README.md
```

## Installation

1. Clone the repository:
   ```
   git clone <repository-url>
   ```

2. Navigate to the backend directory and set up your database connection in `backend/config/db.php`.

3. Import the SQL schema into your database.

4. Start a local server (e.g., using XAMPP, MAMP, or built-in PHP server).

5. Access the application via your web browser at `http://localhost/shopping-website/frontend/pages/index.html`.

## Usage

- **Login**: Navigate to the login page to authenticate.
- **Signup**: Create a new account via the signup page.
- **Products**: View, add, edit, or delete products through the products page.

## Technologies Used

- PHP
- MySQL
- HTML
- CSS
- JavaScript

## Contributing

Feel free to submit issues or pull requests for improvements or bug fixes.
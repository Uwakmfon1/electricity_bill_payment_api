#  Electricity Bill Payment System Api

This API provides a system for managing electricity bill payments by users and service providers. It includes registering and authenticating users, managing electricity providers and simulating electric bill payments.

---

## Setup Instructions

### Requirements
- PHP 8.2+
- composer 2.5
- Laravel ^11.3+
- MySQL 5.7+/MariaDB

### Installation
1. Clone the repository:
  On your terminal, in you preferred directory, copy and paste the code below:
  ```bash
     git clone https://github.com/Uwakmfon1/electricity_bill_payment_api.git
  ```
2. Navigate into the Project directory:
  ```bash 
    cd electricity_bill_payment_api
  ```
3. Install PHP dependencies:
  ```bash
    composer install
  ```
4. Copy the .env.example file to .env and configure your environment variables, including your database settings and any other necessary configuration.
  ```bash
    cp .env.example .env
  ```
5. Generate an application key
  ```bash
    php artisan key:generate
  ```
6. Migrate and seed the database
```bash
   php artisan migrate --seed
```
7. Start the development server
```bash
  php artisan serve
```


## API Documentation

### Overview
  Below are the main API endpoints with examples for requests and responses

### Endpoints

| Method | Endpoint        |   Description               |
|--------|-----------------|-----------------------------|
| POST   | /api/register   | Register a new user         |
| POST   | /api/login      | Authenticate a user         |
| POST   | /api/payments   | Make Payments to providers  |
| GET    | /api/payments   | Get transaction records     |
| GET    | /api/providers  | Get records of providers    |

### Example: User Registration
#### Request:
  ```bash
    {
      "name":"John Doe",
      "email": "johndoe@example.com",
      "password": "password123"
    }
  ```
#### Response to the above request:
  ```bash
    {
      "message":"User registration successful",
      "access_token":"1|QzLOpjsgNkWBcmFfTO7RphRqeGsK3BsDxHT8aqIF306bf8ce"
    }
  ```
### Example: User Login
#### Request:
  ```bash
    {    
      "email": "johndoe@example.com",
      "password": "password123"
    }
  ```
#### Response to the above request:
  ```bash
    {
      "message":"User logged in Successfully",
      "access_token":"2|xZcxslZV3uR3Y7rSg6aRUeDVwQCuTAUVD17Q7DpM3ee6646c"
    }
  ```
### Example: Fetching Providers
#### Request: GET http://localhost:8000/api/providers
  
#### Response to the above request:
  ```bash
   {
    "message": "Success",
    "providers": [
        {
            "id": "066f7f2c-7ed4-4605-8b85-32ce8114d567",
            "name": "EKEDC",
            "logo_url": "https://ekedp.com/front/assets/images/resources/logo-1.png",
            "description": "Eko Electricity Distribution Company"
        },
        {
            "id": "1a330b01-6a85-4397-af92-e6a841fe8acd",
            "name": "KEDCO",
            "logo_url": "https://kedco.ng/public/wp-content/uploads/2024/04/kedco_logokk.png",
            "description": "Kano Electricity Distribution Company Plc"
        },
        {
            "id": "6d650137-e5d6-4d0b-a2da-9b188235f285",
            "name": "PHED",
            "logo_url": "https://phed.com.ng/assets/image001.png",
            "description": "Port Harcourt Electricity Distribution Company"
        }
    ]
  }
  ```

## Test Account
Use the following test credentials to explore the API:
  * #### Email: test@example.com
  * #### Password: password

## Notes
  * For security, sensitive information such as meter numbers is masked in API responses.
  * Ensure the database is correctly configured before running migrations.

#### Thank you for reading. 🌱 

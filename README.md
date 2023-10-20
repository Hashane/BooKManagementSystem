# Book System Documentation
Welcome to the documentation for the Book Management System. 

![Alt Text](https://github.com/Hashane/BookManagementSystem/assets/12775167/6450d296-58ce-47b4-b436-5cce57835d05)

## Dashboard

The dashboard provides an overview of various features and functionalities available to different user roles, such as administrators and staff members.

![Alt Text](https://github.com/Hashane/BookManagementSystem/assets/12775167/719ad05f-7740-4ab2-8467-8a5a08eb454a)

### Manage Books (Admin & Editor only)

-   **Description:** View, Edit, Assign and Delete Books.
![Alt Text](https://github.com/Hashane/BookManagementSystem/assets/12775167/5ce89ba9-76c5-474c-ad99-930f821355a9)

-     Assign Books (Admin & Editor only)
  ![Alt Text](https://github.com/Hashane/BookManagementSystem/assets/12775167/25cb82e0-f9ac-4164-b4aa-082bc204c815)
  
  Email notification to Reader
  
  ![Alt Text](https://github.com/Hashane/BookManagementSystem/assets/12775167/d39fbea6-240b-49e7-8a94-97f1c97ba4f3)

## Manage Users (Admin Only)

-   **Description:** Activate or Inactivate Staff/Reader Users.

![Alt Text](https://github.com/Hashane/BookManagementSystem/assets/12775167/b665b21d-5ae2-434e-872e-78e88cdbed5e)

## Borrowing History (Admin Only)

-   **Description:** View Borrowed Books.

![Alt Text](https://github.com/Hashane/BookManagementSystem/assets/12775167/7a56cbbc-6c31-4bf5-a814-da2951689f03)

## API Routes

### Staff API Routes

#### Staff Login

-   **HTTP Method:** POST
-   **Endpoint:** `/api/staff/create-token`
-   **Description:** Authenticate a staff member and create an access token.

-  Eg: Authenticated admin with multiple scopes(permissions)     
              `view-books` , `create-books` , `edit-books` , `assign-books` , `manage-users` , `borrow-books` , `delete-books`
  - ![Alt Text](https://github.com/Hashane/BookManagementSystem/assets/12775167/a4290925-bc36-4de5-a862-526c61530001)



#### View Books (Staff Only)

-   **HTTP Method:** GET
-   **Endpoint:** `/api/staff/books`
-   **Description:** Retrieve a list of books accessible to staff members.
   - ![Alt Text](https://github.com/Hashane/BookManagementSystem/assets/12775167/b59b9e8f-fb05-4424-8aee-51b36bc16887)

#### Find a Book (Staff Only)

-   **HTTP Method:** GET
-   **Endpoint:** `/api/staff/books/{book}`
-   **Description:** Retrieve details of a specific book.
  - ![Alt Text](https://github.com/Hashane/BookManagementSystem/assets/12775167/162f1fbb-7054-4c12-9d4f-83cc4903a69a)
#### Create a Book (Staff Only)

-   **HTTP Method:** POST
-   **Endpoint:** `/api/staff/books`
-   **Description:** Create a new book in the system.
-   ![Alt Text](https://github.com/Hashane/BookManagementSystem/assets/12775167/b51b42e7-161b-4f6b-a69b-0f8c2e155b17)


#### Update a Book (Staff Only)

-   **HTTP Method:** PUT
-   **Endpoint:** `/api/staff/books/{book}`
-   **Description:** Update an existing book in the system.
-   ![Alt Text](https://github.com/Hashane/BookManagementSystem/assets/12775167/bd4fb225-8633-4f1b-83e6-aa7487762d5c)

#### Delete a Book (Staff Only)

-   **HTTP Method:** DELETE
-   **Endpoint:** `/api/staff/books/{book}`
-   **Description:** Delete a book from the system.
-   ![Alt Text](https://github.com/Hashane/BookManagementSystem/assets/12775167/010aca45-06bf-4200-a887-0314a4f95f4f)

#### Get Users (Staff Only)

-   **HTTP Method:** GET
-   **Endpoint:** `/api/staff/users`
-   **Description:** Retrieve a list of users, possibly for staff management.
-   ![Alt Text](https://github.com/Hashane/BookManagementSystem/assets/12775167/590ac05d-b3db-429a-96c3-9f881ce7d0c2)
  
#### Get Readers (Staff Only)

-   **HTTP Method:** GET
-   **Endpoint:** `/api/staff/readers`
-   **Description:** Retrieve a list of reader users.
-   ![Alt Text](https://github.com/Hashane/BookManagementSystem/assets/12775167/590ac05d-b3db-429a-96c3-9f881ce7d0c2)

### Reader API Routes

#### Reader Login

-   **HTTP Method:** POST
-   **Endpoint:** `/api/reader/create-token`
-   **Description:** Authenticate a reader and create an access token.
-   ![Alt Text](https://github.com/Hashane/BookManagementSystem/assets/12775167/1b3516dc-4324-40db-87bb-58a1bdaec3e7)

#### View Books (Reader Only)

-   **HTTP Method:** GET
-   **Endpoint:** `/api/reader/books`
-   **Description:** Retrieve a list of books accessible to reader users.

#### Find a Book (Reader Only)

-   **HTTP Method:** GET
-   **Endpoint:** `/api/reader/books/{book}`
-   **Description:** Retrieve details of a specific book accessible to reader users.

  
## Noteworthy 3rd Party Packages

Here are some third-party packages used in this project to enhance its functionality:

1. **spatie/laravel-permission**:
   - **Description**: This package is used for managing user roles and permissions within the application. It provides a flexible and robust way to control actions different types of users are allowed to perform.

2. **laravel/passport**:
   - **Description**: Laravel Passport is employed for implementing multi-guard API authentication, allowing to have multiple types of API users, such as admin, editors, viewers, and readers, each with different access levels.

These packages are crucial for enhancing the functionality and security of the application. You can find more details and usage information in the official documentation for each package.

# Back up system data to another DB every week

- `Artisan Command` created to backup and restore to a backup database called `book_management_backup`
-         sail artisan database:backup
- Created and defined the `Scheduled Task` in the `app/Console/Kernel.php` 
- Configure Cron Job to activate the Laravel's scheduler task
  
        * * * * * cd /Users/****/Documents/development/book-management-system && php artisan schedule:run >> /dev/null 2>&1
- Activate it `schedule:run`

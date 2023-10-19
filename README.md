# Book System Documentation

## Dashboard

Welcome to the documentation for the Book Management System. The dashboard provides an overview of various features and functionalities available to different user roles, such as administrators and staff members.

![Alt Text](images/dashboard.png)

## User Management

### Manage Books (Admin & Editor only)

-   **Description:** View, Edit, and Delete Books.

![Alt Text](images/bookList.png)

### Manage Users (Admin Only)

-   **Description:** Activate or Inactivate Staff/Reader Users.

![Alt Text](images/users.png)

### Borrowing History (Admin Only)

-   **Description:** View Borrowed Books.

![Alt Text](images/borrowed.png)

## API Routes

### Staff API Routes

#### Staff Login

-   **HTTP Method:** POST
-   **Endpoint:** `/api/staff/create-token`
-   **Description:** Authenticate a staff member and create an access token.

#### View Books (Staff Only)

-   **HTTP Method:** GET
-   **Endpoint:** `/api/staff/books`
-   **Description:** Retrieve a list of books accessible to staff members.

#### Find a Book (Staff Only)

-   **HTTP Method:** GET
-   **Endpoint:** `/api/staff/books/{book}`
-   **Description:** Retrieve details of a specific book.

#### Create a Book (Staff Only)

-   **HTTP Method:** POST
-   **Endpoint:** `/api/staff/books`
-   **Description:** Create a new book in the system.

#### Update a Book (Staff Only)

-   **HTTP Method:** PUT
-   **Endpoint:** `/api/staff/books/{book}`
-   **Description:** Update an existing book in the system.

#### Delete a Book (Staff Only)

-   **HTTP Method:** DELETE
-   **Endpoint:** `/api/staff/books/{book}`
-   **Description:** Delete a book from the system.

#### Get Users (Staff Only)

-   **HTTP Method:** GET
-   **Endpoint:** `/api/staff/users`
-   **Description:** Retrieve a list of users, possibly for staff management.

#### Get Readers (Staff Only)

-   **HTTP Method:** GET
-   **Endpoint:** `/api/staff/readers`
-   **Description:** Retrieve a list of reader users.

### Reader API Routes

#### Reader Login

-   **HTTP Method:** POST
-   **Endpoint:** `/api/reader/create-token`
-   **Description:** Authenticate a reader and create an access token.

#### View Books (Reader Only)

-   **HTTP Method:** GET
-   **Endpoint:** `/api/reader/books`
-   **Description:** Retrieve a list of books accessible to reader users.

#### Find a Book (Reader Only)

-   **HTTP Method:** GET
-   **Endpoint:** `/api/reader/books/{book}`
-   **Description:** Retrieve details of a specific book accessible to reader users.

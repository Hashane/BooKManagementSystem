# Book System Documentation

Welcome to the documentation for the Book System. This document provides an overview of the available routes and their purposes.

## API Routes

### Retrieve a Specific Resource

-   **HTTP Method:** GET
-   **Endpoint:** `/api/resource`
-   **Description:** Retrieve a specific resource.

### Create a New Resource

-   **HTTP Method:** POST
-   **Endpoint:** `/api/resource`
-   **Description:** Create a new resource.

### Update an Existing Resource

-   **HTTP Method:** PUT
-   **Endpoint:** `/api/resource/{id}`
-   **Description:** Update an existing resource.

### Delete a Resource

-   **HTTP Method:** DELETE
-   **Endpoint:** `/api/resource/{id}`
-   **Description:** Delete a resource.

## User Management

### Manage Books

-   **Description:** View, Edit, and Delete Books.
-   **URL:** [Go to Book Management](/books)

### Manage Users (Admin Only)

-   **Description:** Activate or Inactivate Staff/Reader Users.
-   **URL:** [Go to User Management](/users)

### Borrowing History (Admin Only)

-   **Description:** View Borrowed Books.
-   **URL:** [View Borrowed Books](/borrowed-books)

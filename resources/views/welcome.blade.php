<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to Bookstore</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f3f4f6;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .logo {
            font-size: 4rem;
            color: #3490dc;
        }

        .welcome-text {
            font-size: 24px;
            font-weight: 600;
            color: #333;
            margin-top: 20px;
        }

        .card-container {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
            margin-top: 20px;
        }

        .card {
            width: 300px;
            background-color: #fff;
            border: 1px solid #e1e1e1;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
        }

        .icon {
            font-size: 2rem;
            color: #3490dc;
        }

        .link {
            text-decoration: none;
            color: #333;
            display: block;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="logo">
            <i class="fas fa-bookstore"></i>
        </div>
        <h1 class="welcome-text">Welcome to Bookstore</h1>

        <div class="card-container">
            <div class="card">
                <a href="{{ url('staff/login') }}" class="link">
                    <i class="fas fa-user icon"></i>
                    <h2>Staff Login</h2>
                </a>
            </div>

            <div class="card">
                <a href="{{ url('reader/login') }}" class="link">
                    <i class="fas fa-book icon"></i>
                    <h2>Reader Login</h2>
                </a>
            </div>
        </div>
    </div>
</body>

</html>
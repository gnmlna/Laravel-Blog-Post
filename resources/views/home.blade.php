<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    @auth
    <p>Welcome, you are logged in</p>
    <form method="POST" action="/logout" style="display: inline;">
        @csrf
        <button>Logout</button>
    </form> 

    @else
    <div style="text-align: center; margin-top: 50px;">
        <h1>Register</h1>
        <form method="POST" action="/register" style="display: inline-block; text-align: left;">
            @csrf
            <div style="margin-bottom: 15px;">
                <label for="name">Name:</label><br>
                <input type="text" id="name" name="name" required>
            </div>
            <div style="margin-bottom: 15px;">
                <label for="email">Email:</label><br>
                <input type="email" id="email" name="email" required>
            </div>
            <div style="margin-bottom: 15px;">
                <label for="password">Password:</label><br>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Register</button>
        </form>
    </div>
    <div style="text-align: center; margin-top: 50px;">
        <h1>Login</h1>
        <form method="POST" action="/login" style="display: inline-block; text-align: left;">
            @csrf
            <div style="margin-bottom: 15px;">
                <label for="name">Name:</label><br>
                <input type="text" id="loginname" name="loginname" required>
            </div>
           
            <div style="margin-bottom: 15px;">
                <label for="password">Password:</label><br>
                <input type="password" id="loginpassword" name="loginpassword" required>
            </div>
            <button type="submit">Login</button>
        </form>
    </div>
    @endauth


</body>
</html>
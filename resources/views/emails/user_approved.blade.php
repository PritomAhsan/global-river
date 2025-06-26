<!DOCTYPE html>
<html>
<head>
    <title>Account Approved</title>
</head>
<body>
    <h2>Hello {{ $user->name }},</h2>

    <p>Your account has been approved by the admin. You can now log in:</p>

    <p>
        <a href="{{ url('/login') }}">Click here to login</a>
    </p>

    <p>Thank you for registering with us!</p>
</body>
</html>

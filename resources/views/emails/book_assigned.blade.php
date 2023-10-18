<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Book Management System</title>
</head>

<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px;">

    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-collapse: collapse;">
        <tr>
            <td align="center" style="background-color: #0056b3;">
                <h1 style="color: #ffffff; margin: 0; padding: 20px 0;">Book Assigned</h1>
            </td>
        </tr>
        <tr>
            <td style="background-color: #ffffff; padding: 20px;">
                <p style="font-size: 16px;">Dear Reader,</p>
                <p style="font-size: 16px;">The book "{{ $book->title }}" has been assigned to you.</p>
                <p style="font-size: 16px;">Due Date: <span style="color:red"> {{ $due }} </span></p>
            </td>
        </tr>
    </table>

</body>

</html>
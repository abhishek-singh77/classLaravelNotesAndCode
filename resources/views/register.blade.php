<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <form class = "container flex-center" style = "background: rgb(97, 202, 206)" action = "/user/register" method = "post">
        @csrf
        Name: <input type="text" name="name" value="Your name"><br>
        <br><br>
        Email: <input type="text" name="email" value="Your email"><br>
        <br><br>
        Password: <input type="password" name="password" value="Your Password"><br>
        <br><br>
        <input type = "submit" value="Register">
    </form>


</body>
</html>
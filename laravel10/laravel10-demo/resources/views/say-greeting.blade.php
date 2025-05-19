<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Say Greeting</title>
</head>

<body>
    <h2>Hello Greeting!</h2>

    <form action="/say-greeting" method="POST">
        @csrf
        <textarea name="message"></textarea>
        <button type="submit">Send</button>
    </form>
</body>

</html>
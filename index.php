<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enviar Correo</title>
</head>

<body>
    <h2>Enviar Correo</h2>
    <form action="send_email.php" method="post">
        <label for="to">Para:</label>
        <input type="email" id="to" name="to" required><br><br>

        <label for="subject">Asunto:</label>
        <input type="text" id="subject" name="subject" required><br><br>

        <label for="body">Mensaje:</label><br>
        <textarea id="body" name="body" rows="4" cols="50" required></textarea><br><br>

        <button type="submit">Enviar Correo</button>
    </form>
</body>

</html>
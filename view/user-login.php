<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
    <link rel="stylesheet" href="{{ path }}css/style.css">
</head>
<body>
    <main>
        <h2>Connecter</h2>
        <span class="error">{{ errors|raw }}</span>
        <form action="{{ path }}user/auth" method="post">
            <label>Username 
                <input type="email" name="username" value="{{ user.username }}">
            </label>
            <label>Password 
                <input type="password" name="password">
            </label>
            <input type="submit" value="Connecter">
        </form>
    </main>
</body>
</html>
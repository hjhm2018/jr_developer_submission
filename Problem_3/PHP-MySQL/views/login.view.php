<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="col-6 mx-auto">
        <h1 class="text-center font-italic">Login</h1>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" id="username" required placeholder="Type user">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" required placeholder="Type 12345">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Sign in</button>
                <a href="index.php" class="btn btn-danger">Cancel</a>
            </div>
        </form>

        <p class="text-center p-2">Just try username = user and password = 12345 to login. It's just a test</p>

        <?php if (!empty($errors)) : ?>
            <div class="error">
                <ul>
                    <?php echo $errors; ?>
                </ul>
            </div>
        <?php endif; ?>
    </div>

</body>

</html>
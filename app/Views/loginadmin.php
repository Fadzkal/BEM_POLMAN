<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Login Admin</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="bg-primary">
    <div class="container">
        <h2 class="text-center text-white mt-5">Login Admin</h2>
        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger text-center">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>
        <form method="post" action="/loginadmin" class="mt-4">
            <div class="form-group">
                <label for="username" class="text-white">Username</label>
                <input type="text" name="username" id="username" class="form-control" required />
            </div>
            <div class="form-group">
                <label for="password" class="text-white">Password</label>
                <input type="password" name="password" id="password" class="form-control" required />
            </div>
            <button type="submit" class="btn btn-light">Login</button>
        </form>
    </div>
</body>
</html>

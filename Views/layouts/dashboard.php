<?php
/** @var \App\Core\View $this */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script defer src="https://kit.fontawesome.com/708b4765cf.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?=$_ENV['APP_URL']?>/css/style.css">
    <link rel="stylesheet" href="<?=$_ENV['APP_URL']?>/css/dashboard.css">
    <link rel="stylesheet" href="<?= $this->getStyleSheet() ?>">
    <title>Dashboard Home</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
</head>
<body>
    <aside>
        <header>
            <h1>GPT-products</h1>
            <main>
                <img src="https://github.com/samuel-mil.png" alt="profile-pic">
                <h2>Samuel Milhomes</h2>
                <p>Admin, Developer</p>
            </main>
        </header>

        <main>
            <ul>
                <h1>Products</h1>
                <li><a href="">Product list</a></li>
                <li><a href="">Create a product</a></li>
                <li><a href="">Update a product</a></li>
                <li><a href="">Delete a product</a></li>
            </ul>
            <ul>
                <h1>Users</h1>
                <li><a href="">Users list</a></li>
                <li><a href="">Create a user</a></li>
                <li><a href="">Update a user</a></li>
                <li><a href="">Delete a user</a></li>
            </ul>
            
        </main>
    </aside>

    <header class="main_aside">
        <h1>Dashboard</h1>

        <nav>
            <a title="Logout" href="#"><i class="fa-solid fa-right-from-bracket"></i></a>
        </nav>
    </header>
    
    <section class="page_container">
        {{content}}
    </section>
    <div class="clear"></div>
</body>
</html>

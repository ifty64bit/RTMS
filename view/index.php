<?php include("../controller/common/redir.php") ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./global.css">
    <title>Home Page</title>
</head>
<body>
    <?php include("./components/Header.php") ?>
    <section>
        <div class="flex-center mt">
            <a href="./SearchDriver.php" class="card">
                <div>
                    Search Driver
                </div>
            </a>

            <a href="./Rules.php" class="card">
                <div>
                    Traffic Rule Guide
                </div>
            </a>

            <a href="./Profile.php" class="card">
                <div>
                    Update Info
                </div>
            </a>
        </div>
    </section>
</body>
</html>
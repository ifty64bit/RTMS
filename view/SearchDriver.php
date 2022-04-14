<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./global.css">
    <script src="./Search.js"></script>
    <title>Search Driver</title>
</head>
<body>
    <?php include("./components/Header.php") ?>
    <section class="mt">
        <div class="flex-center">
            <label for="search">Search Driver</label>
            <input type="text" name="search" placeholder="Input Name" oninput="search(this)" style="width: 20rem;">
        </div>
    </section>
    <section class="flex-center flex-col mt">
        <table class="table-border blur-bg" id="table">
            <tr>
                <td>First Name</td>
                <td>Last Name</td>
                <td>Phone</td>
                <td>Address</td>
                <td>Vehicle Number</td>
                <td>Licence</td>
                <td>Status</td>
                <td>Action</td>
            </tr>
        </table>
        <div class="flex-center" id="emptymsg"></div>
    </section>
</body>
</html>
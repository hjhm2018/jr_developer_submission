<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    <title>Problem 3</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">Warehouse</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto">
                <?php if (isset($_SESSION['user'])) { ?>
                    <a class="nav-link btn btn-danger text-white mx-1" href="logout.php">Logout</a>
                <?php } else { ?>
                    <a class="nav-link btn btn-primary text-white mx-1" href="login.php">Login</a>
                <?php } ?>

            </div>
        </div>
    </nav>

    <div class="col-10 mx-auto text-center">
        <?php if (isset($_SESSION['user'])) { ?>
            <form class="form-group row mt-3 mx-auto" id="itemForm">
                <div class="form-group mb-2 col-md-6 col-lg-2 col-sm-6">
                    <label for="itemName" class="sr-only">Item Name</label>
                    <input type="text" class="form-control text-center" name="itemName" id="itemName" placeholder="Item Name" required>
                </div>
                <div class="form-group mb-2 col-md-6 col-lg-2 col-sm-6">
                    <label for="itemWeight" class="sr-only">Weight (kg)</label>
                    <input type="number" class="form-control text-center" name="itemWeight" id="itemWeight" placeholder="Weight (kg)" required>
                </div>
                <div class="form-group mb-2 col-md-6 col-lg-2 col-sm-6">
                    <label for="itemLength" class="sr-only">Length (cm)</label>
                    <input type="number" class="form-control text-center" name="itemLength" id="itemLength" placeholder="Length (cm)" required>
                </div>
                <div class="form-group mb-2 col-md-6 col-lg-2 col-sm-6">
                    <label for="itemWidth" class="sr-only">Width (cm)</label>
                    <input type="number" class="form-control text-center" name="itemWidth" id="itemWidth" placeholder="Width (cm)" required>
                </div>
                <div class="form-group mb-2 col-md-6 col-lg-2 col-sm-6">
                    <label for="itemHeight" class="sr-only">Height (cm)</label>
                    <input type="number" class="form-control text-center" name="itemHeight" id="itemHeight" placeholder="Height (cm)" required>
                </div>
                <button type="submit" class="btn btn-primary mb-2 col-sm-12 col-md-2">Add Item</button>
            </form>
        <?php } else { ?>
            <p class="bg-primary p-2 text-white col-8 mx-auto">Login if you want to add items to the list</p>
        <?php } ?>

        <h1 class="bg-dark text-white mt-2 rounded">List of items</h1>
        <table class="table table-bordered col-md-8 col-sm-12 mx-auto" id="table">
            <thead id="tableHead" class="bg-dark text-white text-center"></thead>
            <tbody id="tableBody"></tbody>
        </table>
    </div>
    <script src="js/script.js"></script>

</body>

</html>
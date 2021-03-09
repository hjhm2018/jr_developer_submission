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

        <h1 class="text-center">Divide teams evenly</h1>

        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th scope="col" class="bg-danger text-white">Team A</th>
                    <th scope="col" class="bg-primary text-white">Team B</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($team_A as $index => $member) : ?>
                    <tr>
                        <td><?php echo $member; ?></td>
                        <td><?php echo $team_B[$index]; ?></td>
                    </tr>
                <?php endforeach; ?>



            </tbody>
        </table>

    </div>

</body>

</html>
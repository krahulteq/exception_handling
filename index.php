<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="script.js"></script>

    <style>
        .error {
            color: red;
        }

        .valid {
            color: seagreen;
        }

        .invalid {
            color: red;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h1>Please Login Here</h1>
        <hr><br>
        <form class="row g-3" method="post">
            <div class="valid"></div>
            <div class="invalid"></div>
            <div class="col-md-3">
                <label for="email" class="form-label">E-Mail</label>
                <span class="error" id="emailErr" name="emailErr">*<?php echo $emailErr; ?></span>
                <input type="text" class="form-control" placeholder="Enter your email" value="<?php echo $email; ?>" id="email" name="email">
            </div>
            <div class="col-md-3">
                <label for="password" class="form-label">Password</label>
                <span class="error" id="passwordErr" name="passwordErr">*<?php echo $passwordErr; ?></span>
                <input type="password" class="form-control" placeholder="Enter your password" value="<?php echo $password; ?>" id="password" name="password">
            </div>
            <div class="col-12">
                <button type="submit" name="login" id="login" class="btn btn-primary">Login</button>
            </div>
        </form>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>
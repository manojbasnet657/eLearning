
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    
  

    <style>
        body {
            background-color: green;

        }
    </style>


</head>
<body >

<div class="container">
        <div class="row">
            <div class="col-md-3 shadow m-auto bg-dark font-monospace p-3 border border-primary  mt-4">
                <form action="login1.php" method="POST" >
                    <div class="mb-3">
                        <p class="text-center fw-bold fs-3 text-warning ">Login:</p>
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Username:</label>
                        <input type="text" name ="username" class="form-control" placeholder="Enter name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password:</label>
                        <input type="password " name ="password" class="form-control"   placeholder="****************">
                    </div>
                    
                    
                    <button class="bg-danger fs-4 fw-bold my-3 form-control text-white" >Login</button>

                </form>

            </div>
        </div>

    </div>
</body>
</html>
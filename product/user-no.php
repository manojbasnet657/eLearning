<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USERS</title>
    <?php
     include 'admin.php';
    ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>

<body>
    <?php
    $con = mysqli_connect("localhost", "root", "", "project");
    $record = mysqli_query($con, "SELECT * FROM `userlogin` ");
    $row_count = mysqli_num_rows($record);

    ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-10">
                <table class="table table-secondary table-bordered">
                    <thead class="text-center">
                        <th class="">S.N</th>
                        <th class="">NAME</th>
                        <th class="">EMAIL</th>
                        <th class="">NUMBER</th>
                        <th class="">DELETE</th>
                    </thead>
                    <tbody class="text-center text-danger">
                        <?php
                        $i = 0;
                        while ($row = mysqli_fetch_array($record)) {
                            echo "
           <tr class'' >
           <td>"?> <?php echo ++$i;?><?php echo"</td>
           <td class=''>$row[UserName]</td>
           <td class=''>$row[Email]</td>
           <td class=''>$row[Number]</td>
           <td class=''><a href='deletes.php? id=$row[id]' class='btn btn-danger'>DELETE</a></td>
           </tr>
           ";
                        }
                        ?>


                    </tbody>
                </table>
            </div>


                <div class=" col-md-2 pr-5 text-center">
                    <h3 class="text-danger">TOTAL</h3>
                    <h1 class="bg-danger text-white"><?php echo $row_count ?></h1>

                </div>
            </div>
        </div>
    
</body>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SALES ORDER</title>
    <?php include 'admin.php'; ?>
</head>
<body>
    <?php
        $con = mysqli_connect("localhost","root","","project") or die("failed to connect");
        $sql =("SELECT * FROM `sale`");
        $result =  mysqli_query($con, $sql);
        $row_count=mysqli_num_rows($result);
    


    
    ?>
<div class="container m-auto mt-5">
        <div class="row">
            <div class="col-md-10">
                <table class="table table-secondary table-bordered">
                    <thead class="text-center">
                        <th class="">S.N</th>
                        <th class="">NAME</th>
                        <th class="">ADDRESS</th>
                        <th class="">NUMBER</th>
                        <th class="">PAYMENT</th>
                        <th class="">DATE</th>
                        <th class="">PRODUCT</th>
                        <th class="">IMAGE</th>
                        <th class="">DELETE</th>
                    </thead>
                    <tbody class="text-center text-danger">
                        <?php
                        $i = 0;
                        while ($row = mysqli_fetch_array($result)) {
                            echo "
           <tr class'' >
           <td>"?> <?php echo ++$i;?><?php echo"</td>
           <td class=''>$row[Name]</td>
           <td class=''>$row[Address]</td>
           <td class=''>$row[Number]</td>
           <td class=''>$row[Pay]</td>
           <td class=''>$row[Date]</td>
           <td class=''>$row[product]</td>
           <td class=''> <img src=' $row[image]' style='height:100px ;' ></td>
           <td class=''><a href='delete1.php? id=$row[id]' class='btn btn-danger'>DELETE</a></td>
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
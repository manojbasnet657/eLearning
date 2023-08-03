
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <?php
    include 'admin.php';
?>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-6">
        <div class="row">
            <div class="col-md-6 m-auto border border-primary mt-4">
                <form action="insert.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <p class="text-center fw-bold fs-3 text-warning ">Video Tutorial Upload:</p>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Video Title:</label>
                        <input type="text" class="form-control" name="videoTitle" id="" placeholder="Enter video title">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">video upload</label>
                        <input type="file" class="form-control" name="videoFile" id="">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Thumbnail upload</label>
                        <input type="file" class="form-control" name="" id="">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">video Description:</label>
                        <input type="text" class="form-control" name="videoDescription" id="" placeholder="Describe">
                    </div>
                    <!-- <div class="mb-3">
                        <label for="" class="form-label">Select Page Category:</label>
                        <select class="form-select bg-light " name="pages">
                            <option value="thumb">Java</option>
                            <option value="gloves">C Programming</option>
                            <option value="back">Guitar</option>
                            <option value="band">Python</option>
                            <option value="knee">Knee</option>
                            <option value="shoulder">Shoulder</option>

                        </select>
                    </div> -->
                    <button class="bg-danger fs-4 fw-bold my-3 form-control text-white" name="submit">Upload</button>

                </form>

            </div>
        </div>

    </div>
    <div class="container md-4">
        <div class="row">
            <div class="col-md-8 m-auto">


                <table class="table  border border-warning table-hover my-9">
                    <thead class="bg-dark text-white fs-5 font-monospace text-center">
                        <th class="">id</th>
                        <th class="">Name</th>
                        <th class="">Image</th>
                        <th class="">Update</th>
                        <th class="">Delete</th>
                    </thead>
                    <tbody class="text-center">
                        <?php
                        $con = mysqli_connect("localhost", "root", "", "project2") or die("failed to connect");
                        $Record = mysqli_query($con, "SELECT * FROM `videos` ");
                        while ($row = mysqli_fetch_array($Record))
                            echo "
        <tr>
        <td >$row[vid]</td>
        <td >$row[videoTitle]</td>
        <td ><img src='$row[videoFile]' height= '90px' width='200px' ></td>
        <td ><a href='http://localhost/elearning/product/update.php?id=$row[vid]' class='btn btn-warning'>UPDATE</a></td>
        <td ><a href='delete.php? id=$row[vid]' class='btn btn-danger'>REMOVE</a></td>
         
          </td>

        ";
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
  
</body>

</html>
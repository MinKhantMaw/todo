<?php
include 'db.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

</head>
<body>
    <?php
$pdostatement = $pdo->prepare("SELECT * FROM todo ORDER BY id DESC ");
$pdostatement->execute();
$result = $pdostatement->fetchAll();
?>
    <div class="container">
        <div class="col-12">
            <div class="row">
                <div class="card mt-4">
                        <a href="create.php"><i class="fas fa-plus-circle btn btn-primary mt-3">Create Posts</i></a>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Created Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                   <?php
                                        $id=1;
                                        if ($result) {
                                            foreach ($result as $post) {
                                                ?>
                                                <tr>
                                                <td><?php echo $id; ?></td>
                                                <td><?php echo $post['title'] ?></td>
                                                <td><?php echo $post['description'] ?></td>
                                                <td><?php echo date('Y-m-d',strtotime($post['created_at'])) ?></td>
                                                <td>
                                                     <a href="edit.php?id=<?php echo $post['id'] ?>">
                                                        <i class="fas fa-edit fs-2 text-warning"> </i>
                                                    </a>
                                                    <a href="delete.php?id=<?php echo $post['id'] ?>">
                                                        <i class="far fa-trash-alt fs-2  text-danger "></i>
                                                    </a>

                                                </td>
                                                 </tr>
                                                <?php
                                                $id++;
                                                        }
                                                    }
                                                    ?>

                            </tbody>
                        </table>

                </div>
            </div>
        </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>

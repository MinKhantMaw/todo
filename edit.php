<?php
require 'db.php';
    if($_POST){
       $title = $_POST['title'];
       $description = $_POST['description'];
       $id=$_POST['id'];

       $pdostatement=$pdo->prepare("UPDATE todo SET title='$title', description='$description' WHERE id = '$id'");
       $result = $pdostatement->execute();
       if($result){
           echo "<script>alert('New Todo is updated');window.location.href='index.php';</script>";
       }
    }else{
        $pdostatement=$pdo->prepare("SELECT * FROM todo where id=" .$_GET['id']);
        $pdostatement->execute();
        $result=$pdostatement->fetchAll();
        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
   <div class="container">
       <div class="col-8 offset-3 mt-4">
                     <form action="" method="post">
                         <input type="hidden" name="id" value="<?php echo $result[0]['id']; ?>" />
                        <div class="form-group">
                            <label for="">Title</label>
                            <input type="text" name="title" class="form-control" value="<?php echo $result[0]['title'] ?>">
                        </div>
                         <div class="form-group">
                            <label for="">Description</label>
                           <textarea class="form-control" value="" name="description" class="form-control"id="" cols="30" rows="10"><?php echo $result[0]['description'] ?></textarea>
                        </div>
                       <div class="form-group mt-3">
                         <button type="submit" class="btn btn-secondary">Update</button>
                        <a href="index.php" class="btn btn-info">Cancle</a>
                       </div>
                    </form>
       </div>
   </div>

</body>
</html>

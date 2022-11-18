<?php 
    include "header.php";
    $sql_category = "SELECT * FROM category ";
    $categories = mysqli_query($conn,$sql_category.' ORDER BY id DESC');
    if(!empty($_GET['action'])){
        if($_GET['action'] == 'changeStatus'){
            $id = $_GET['id'];
            $status = $_GET['status'];
            $change = ($status == 1) ? 0 : 1;
            $update = mysqli_query($conn,"UPDATE category SET status = $change WHERE id = $id");
            if($update){
                header("location: http://localhost:83/php_day11_ontap/category.php/");
            }else{
                echo mysqli_error($conn);
            }
        }
        if($_GET['action'] == 'delete'){
            $id = $_GET['id'];
            $delete = mysqli_query($conn,"DELETE FROM category WHERE id = $id");
            if($delete){
                header("location: http://localhost:83/php_day11_ontap/category.php/");
            }else{
                echo mysqli_error($conn);
            }
        }
    }
?>
<h2 class="text-center mt-5">Categories</h2>
<div class="container">
    <a class="btn btn-primary" href="category-create.php" role="button">Thêm mới Danh mục</a>
    <div class="table-responsive mt-2">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Status</th>
                    <th scope="col">Setting</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($categories as $key => $cate) : ?>
                <tr class="">
                    <td scope="row"><?= $key+1 ?></td>
                    <td><?= $cate['id'] ?></td>
                    <td><?= $cate['name'] ?></td>
                    <td><?=  ($cate['status'] == 1) ? 'Hiện' : "Ẩn" ?></td>
                    <td>
                        <a class="btn btn-primary" href="http://localhost:83/php_day11_ontap/category.php/?action=changeStatus&id=<?= $cate['id'] ?>&status=<?= $cate['status'] ?>" role="button"><i class="fa-solid fa-eye"></i></a>
                        <a class="btn btn-success" href="http://localhost:83/php_day11_ontap/category-upd.php/?id=<?= $cate['id'] ?>" role="button"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a class="btn btn-danger" href="http://localhost:83/php_day11_ontap/category.php/?action=delete&id=<?= $cate['id'] ?>" role="button"><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
<?php 
    include "footer.php";
?>
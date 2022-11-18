<?php 
    include "header.php";
    $sql_product = "SELECT * FROM product ";
    $products = mysqli_query($conn,$sql_product.' ORDER BY id DESC');
    if(!empty($_GET['action'])){
        if($_GET['action'] == 'changeStatus'){
            $id = $_GET['id'];
            $status = $_GET['status'];
            $change = ($status == 1) ? 0 : 1;
            $update = mysqli_query($conn,"UPDATE product SET status = $change WHERE id = $id");
            if($update){
                header("location: http://localhost:83/php_day11_ontap/");
            }else{
                echo mysqli_error($conn);
            }
        }
        if($_GET['action'] == 'delete'){
            $id = $_GET['id'];
            $deleteImg = mysqli_query($conn,"SELECT * FROM product WHERE id = $id");
            $query = mysqli_fetch_assoc($deleteImg);
            $delete = mysqli_query($conn,"DELETE FROM product WHERE id = $id");

            if($delete){
                unlink('images/'.$query['image']);
                header("location: http://localhost:83/php_day11_ontap/");
            }else{
                echo mysqli_error($conn);
            }
        }
    }
?>

<div class="container-fluid">
    <h2 class="text-center">Products</h2>
    <a class="btn btn-primary" href="product-create.php" role="button">Thêm mới sản phẩm</a>
    <div class="table-responsive mt-5">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Image</th>
                    <th scope="col">Price</th>
                    <th scope="col">Sale</th>
                    <th scope="col">Category_id</th>
                    <th scope="col">Status</th>
                    <th scope="col">Setting</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($products as $key => $product) : ?>
                <tr class="">
                    <td scope="row"><?= $key+1 ?></td>
                    <td><?= $product['id'] ?></td>
                    <td><?= $product['name'] ?></td>
                    <td><img src="images/<?= $product['image'] ?>" width="60px" alt=""></td>
                    <td><?= number_format($product['price']) ?></td>
                    <td><?= $product['sale'] ?>%</td>
                    <td><?= $product['category_id'] ?></td>
                    <td><?=  ($product['status'] == 1) ? 'Hiện' : "Ẩn" ?></td>
                    <td>
                        <a class="btn btn-primary" href="http://localhost:83/php_day11_ontap/?action=changeStatus&id=<?= $product['id'] ?>&status=<?= $product['status'] ?>" role="button"><i class="fa-solid fa-eye"></i></a>
                        <a class="btn btn-success" href="http://localhost:83/php_day11_ontap/product-upd.php/?id=<?= $product['id'] ?>" role="button"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a class="btn btn-danger" href="http://localhost:83/php_day11_ontap/?action=delete&id=<?= $product['id'] ?>" role="button"><i class="fa-solid fa-trash"></i></a>
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
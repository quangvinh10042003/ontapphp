<?php 
    include "header.php";
    $cate = '';
    if(!empty($_GET['id'])){
        $id = $_GET['id'];
        $sql_query = "SELECT * FROM category WHERE id = $id";
        $query = mysqli_query($conn,$sql_query);
        $num = mysqli_num_rows($query);
        if($num == 1){
            $cate = mysqli_fetch_assoc($query);
        }
    }
    if(!empty($_POST['name'])){
        $id = $_GET['id'];
        $name = $_POST['name'];
        $status = $_POST['status'];
        $update = mysqli_query($conn,"UPDATE category SET name = '$name' ,status = $status WHERE id = $id");
        if($update){
            header("location: http://localhost:83/php_day11_ontap/category.php");
        }else{
            echo mysqli_error($conn);
        }
    }
?>

<div class="col-6 mx-auto border px-2 py-5 mt-5">
    <div class="container">
        <h2 class="text-center mt-4 mb-4">Thêm mới danh mục sản phẩm</h2>
        <form method="post">
            <div class="mb-3 row">
                <label for="inputName" class="col-4 col-form-label">Name</label>
                <div class="col-8">
                    <input type="text" class="form-control" name="name" value="<?= $cate['name'] ?>" id="inputName" placeholder="Name">
                </div>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" value="1" <?= ($cate['status'] == 1) ? "checked" : "" ?>>
                <label class="form-check-label" for="">
                   Hiển thị
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" value="0" <?= ($cate['status'] == 0) ? "checked" : "" ?>>
                <label class="form-check-label" for="">
                    Ẩn
                </label>
            </div>
            <div class="mb-3 row">
                <div class="offset-sm-4 col-sm-8">
                    <button type="submit" class="btn btn-primary">Action</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php include "footer.php"; ?>
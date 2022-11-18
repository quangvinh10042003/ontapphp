<?php 
    include "header.php"; 
    $product = '';
    if(!empty($_POST['name'])){
        $name = $_POST['name'];
        $price = $_POST['price'];
        $sale = $_POST['sale'];
        $category_id = $_POST['category_id'];
        $file = $_FILES['image'];
        $image = $file['name'];
        $status = $_POST['status'];
        $query = mysqli_query($conn,"INSERT INTO product SET id=null, name = '$name',image = '$image',price = $price, sale = $sale,category_id = $category_id, status=$status");
        if($query){
            move_uploaded_file($file['tmp_name'],'images/'.$file['name']);
            header("location: index.php");
        }else{
            echo mysqli_error($conn);
        }
        
    }
    $sql_category = "SELECT * FROM category ";
    $categories = mysqli_query($conn,$sql_category);
?>

<div class="col-6 mx-auto border px-2 py-5">
    <div class="container">
        <h2 class="text-center mt-4 mb-4">Thêm mới danh mục sản phẩm</h2>
        <form method="post" enctype="multipart/form-data">
            <div class="mb-3 row">
                <label for="inputName" class="col-4 col-form-label">Name</label>
                <div class="col-8">
                    <input type="text" class="form-control" name="name" id="inputName" placeholder="Name">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputName" class="col-4 col-form-label">Image</label>
                <div class="col-8">
                    <input type="file" class="form-control" name="image" id="inputName" placeholder="Name">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputName" class="col-4 col-form-label">Price</label>
                <div class="col-8">
                    <input type="text" class="form-control" name="price" id="inputName" placeholder="Name">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputName" class="col-4 col-form-label">Sale</label>
                <div class="col-8">
                    <input type="text" class="form-control" name="sale" id="inputName" placeholder="Name">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputName" class="col-4 col-form-label">Category_id</label>
                <div class="col-8">
                    <select name="category_id">
                        <?php foreach($categories as $cate) : ?>
                        <option value="<?= $cate['id'] ?>" ><?= $cate['name'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" value="1" checked id="">
                <label class="form-check-label" for="">
                   Hiển thị
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" value="0" >
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
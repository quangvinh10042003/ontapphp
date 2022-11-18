<?php 
    include "header.php"; 
    if(!empty($_POST['name'])){
        $name = $_POST['name'];
        $status = $_POST['status'];
        $query = mysqli_query($conn,"INSERT INTO category SET id=null, name = '$name', status=$status");
        if($query){
            header("location: category.php");
        }else{
            echo mysqli_error($conn);
        }
    }
?>

<div class="col-6 mx-auto border px-2 py-5">
    <div class="container">
        <h2 class="text-center mt-4 mb-4">Thêm mới danh mục sản phẩm</h2>
        <form method="post">
            <div class="mb-3 row">
                <label for="inputName" class="col-4 col-form-label">Name</label>
                <div class="col-8">
                    <input type="text" class="form-control" name="name" id="inputName" placeholder="Name">
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
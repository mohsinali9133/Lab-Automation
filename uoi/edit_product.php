<?php
include "includes/config.php";
include "includes/header.php";

$id = $_GET['id'];

$query = mysqli_query($conn,"SELECT * FROM products WHERE id='$id'");

$row = mysqli_fetch_array($query);

if(isset($_POST['update'])){

    $name = $_POST['product_name'];
    $type = $_POST['product_type'];
    $status = $_POST['status'];

    mysqli_query($conn,"UPDATE products SET

    product_name='$name',
    product_type='$type',
    status='$status'

    WHERE id='$id'");

    header("location:view_products.php");
}
?>

<div class="container mt-5">

    <div class="card p-5">

        <h2>Edit Product</h2>

        <form method="POST">

            <input type="text" name="product_name" class="form-control mb-3"
            value="<?php echo $row['product_name']; ?>">

            <input type="text" name="product_type" class="form-control mb-3"
            value="<?php echo $row['product_type']; ?>">

            <select name="status" class="form-control mb-3">
                <option><?php echo $row['status']; ?></option>
                <option>Pending</option>
                <option>Completed</option>
            </select>

            <button type="submit" name="update" class="btn btn-primary">
                Update Product
            </button>

        </form>

    </div>

</div>

<?php include "includes/footer.php"; ?>
<?php
include "includes/config.php";
include "includes/header.php";
?>

<div class="container-fluid">

    <div class="row">

        <?php include "includes/sidebar.php"; ?>

        <div class="col-lg-10 col-md-9 col-12 p-4">

            <div class="card shadow-lg border-0 rounded-4 p-4">

                <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">

                    <h2 class="fw-bold mb-3 mb-md-0">
                        All Products
                    </h2>

                    <a href="add_product.php" class="btn btn-primary rounded-pill px-4">
                        <i class="fa fa-plus"></i> Add Product
                    </a>

                </div>

                <div class="row mb-4">
                    <div class="col-md-4 ms-auto">
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0 text-muted">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </span>
                            <input type="text" 
                                   id="productSearch" 
                                   class="form-control border-start-0 ps-0 rounded-end-3" 
                                   placeholder="Search products...">
                        </div>
                    </div>
                </div>

                <div class="table-responsive">

                    <table class="table table-bordered table-hover align-middle">

                        <thead class="table-dark">

                            <tr>
                                <th>Product ID</th>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th width="170">Action</th>
                            </tr>

                        </thead>

                        <tbody id="productsTableBody">

                            <?php
                            $query = mysqli_query($conn,"SELECT * FROM products");

                            while($row=mysqli_fetch_array($query)){
                            ?>

                            <tr>

                                <td>
                                    <?php echo $row['product_id']; ?>
                                </td>

                                <td>
                                    <?php echo $row['product_name']; ?>
                                </td>

                                <td>
                                    <?php echo $row['product_type']; ?>
                                </td>

                                <td>

                                    <?php
                                    if($row['status']=="Completed"){
                                    ?>

                                        <span class="badge bg-success">
                                            Completed
                                        </span>

                                    <?php
                                    } else {
                                    ?>

                                        <span class="badge bg-warning text-dark">
                                            Pending
                                        </span>

                                    <?php } ?>

                                </td>

                                <td>

                                    <div class="d-flex gap-2 flex-wrap">

                                        <a href="edit_product.php?id=<?php echo $row['id']; ?>" class="btn btn-success btn-sm">
                                            <i class="fa fa-edit"></i> Edit
                                        </a>

                                        <a href="delete_product.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i> Delete
                                        </a>

                                    </div>

                                </td>

                            </tr>

                            <?php } ?>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</div>

<script>
document.getElementById('productSearch').addEventListener('keyup', function() {
    let filter = this.value.toLowerCase();
    let rows = document.querySelectorAll('#productsTableBody tr');

    rows.forEach(function(row) {
        let text = row.textContent.toLowerCase();
        if (text.includes(filter)) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
});
</script>

<?php include "includes/footer.php"; ?>
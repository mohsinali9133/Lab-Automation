<?php
include "includes/config.php";
include "includes/header.php";

if(isset($_POST['save'])){

    $pid = $_POST['product_id'];
    $pname = $_POST['product_name'];
    $ptype = $_POST['product_type'];
    $revision = $_POST['revision_no'];
    $mdate = $_POST['manufacturing_date'];
    $status = $_POST['status'];

    mysqli_query($conn,"INSERT INTO products(
    
    product_id,
    product_name,
    product_type,
    revision_no,
    manufacturing_date,
    status

    )

    VALUES(

    '$pid',
    '$pname',
    '$ptype',
    '$revision',
    '$mdate',
    '$status'

    )");

    echo "<script>alert('Product Added Successfully')</script>";
}
?>

<div class="container-fluid">

    <div class="row">

        <!-- Sidebar -->
        <?php include "includes/sidebar.php"; ?>

        <!-- Main Content -->
        <div class="col-lg-10 col-md-9 col-12 p-4">

            <div class="card shadow-lg border-0 rounded-4 p-4">

                <h2 class="mb-4 fw-bold">
                    Add Product
                </h2>

                <form method="POST">

                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <label class="form-label">
                                Product ID
                            </label>

                            <input type="text"
                                   name="product_id"
                                   class="form-control"
                                   placeholder="Enter Product ID"
                                   required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">
                                Product Name
                            </label>

                            <input type="text"
                                   name="product_name"
                                   class="form-control"
                                   placeholder="Enter Product Name"
                                   required>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <label class="form-label">
                                Product Type
                            </label>

                            <input type="text"
                                   name="product_type"
                                   class="form-control"
                                   placeholder="Enter Product Type"
                                   required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">
                                Revision Number
                            </label>

                            <input type="text"
                                   name="revision_no"
                                   class="form-control"
                                   placeholder="Revision Number">
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <label class="form-label">
                                Manufacturing Date
                            </label>

                            <input type="date"
                                   name="manufacturing_date"
                                   class="form-control">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">
                                Status
                            </label>

                            <select name="status" class="form-select">

                                <option value="Pending">
                                    Pending
                                </option>

                                <option value="Completed">
                                    Completed
                                </option>

                            </select>
                        </div>

                    </div>

                    <button type="submit"
                            name="save"
                            class="btn btn-primary px-4 py-2 rounded-pill">

                        Save Product

                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

<?php include "includes/footer.php"; ?>
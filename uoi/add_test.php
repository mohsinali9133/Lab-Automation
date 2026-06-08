<?php
include "includes/config.php";
include "includes/header.php";

if(isset($_POST['save'])){

    $tid = $_POST['testing_id'];
    $pid = $_POST['product_id']; // This will now receive the selected option value
    $ttype = $_POST['test_type'];
    $result = $_POST['test_result'];
    $engineer = $_POST['engineer_name'];
    $remarks = $_POST['remarks'];
    $date = $_POST['testing_date'];

    mysqli_query($conn,"INSERT INTO testing_records(
        testing_id,
        product_id,
        test_type,
        test_result,
        engineer_name,
        remarks,
        testing_date
    )
    VALUES(
        '$tid',
        '$pid',
        '$ttype',
        '$result',
        '$engineer',
        '$remarks',
        '$date'
    )");

    echo "<script>alert('Testing Record Added Successfully')</script>";
}

// Fetch all available products from the database for the dropdown
$product_query = mysqli_query($conn, "SELECT product_id, product_name FROM products");
?>

<div class="container-fluid">
    <div class="row">
        <?php include "includes/sidebar.php"; ?>

        <div class="col-lg-10 col-md-9 col-12 p-4">
            <div class="card shadow-lg border-0 rounded-4 p-4">
                <h2 class="fw-bold mb-4">Add Testing Record</h2>

                <form method="POST">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Testing ID</label>
                            <input type="text" name="testing_id" class="form-control" placeholder="Enter Testing ID" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Product ID</label>
                            <select name="product_id" class="form-select" required>
                                <option value="" disabled selected>Select Product ID</option>
                                <?php 
                                // Loop through the query results and generate dropdown options
                                while($row = mysqli_fetch_assoc($product_query)) {
                                    echo "<option value='".$row['product_id']."'>".$row['product_id']." - ".$row['product_name']."</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Test Type</label>
                            <input type="text" name="test_type" class="form-control" placeholder="Enter Test Type" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Test Result</label>
                            <select name="test_result" class="form-select">
                                <option value="Passed">Passed</option>
                                <option value="Failed">Failed</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Engineer Name</label>
                            <input type="text" name="engineer_name" class="form-control" placeholder="Engineer Name" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Testing Date</label>
                            <input type="date" name="testing_date" class="form-control" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Remarks</label>
                        <textarea name="remarks" class="form-control" rows="4" placeholder="Enter Remarks"></textarea>
                    </div>

                    <button type="submit" name="save" class="btn btn-primary px-4 py-2 rounded-pill">
                        <i class="fa fa-save"></i> Save Record
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include "includes/footer.php"; ?>
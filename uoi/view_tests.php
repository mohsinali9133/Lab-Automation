<?php
include "config.php";
include "includes/header.php";
?>

<div class="container-fluid">

    <div class="row">

        <?php include "includes/sidebar.php"; ?>

        <div class="col-lg-10 col-md-9 col-12 p-4">

            <div class="card shadow-lg border-0 rounded-4 p-4">

                <div class="d-flex justify-content-between align-items-center flex-wrap mb-4">

                    <h2 class="fw-bold mb-3 mb-md-0">
                        Testing Records
                    </h2>

                    <a href="add_test.php" class="btn btn-primary rounded-pill px-4">
                        <i class="fa fa-plus"></i> Add Record
                    </a>

                </div>

                <div class="row mb-4">
                    <div class="col-md-4 ms-auto">
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0 text-muted">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </span>
                            <input type="text" 
                                   id="tableSearch" 
                                   class="form-control border-start-0 ps-0 rounded-end-3" 
                                   placeholder="Search testing records...">
                        </div>
                    </div>
                </div>

                <div class="table-responsive">

                    <table class="table table-hover table-bordered align-middle">

                        <thead class="table-dark">

                            <tr>
                                <th>Testing ID</th>
                                <th>Product ID</th>
                                <th>Result</th>
                                <th>Engineer</th>
                                <th>Date</th>
                            </tr>

                        </thead>

                        <tbody id="testingTableBody">

                            <?php
                            $query = mysqli_query($con,"SELECT * FROM testing_records");

                            while($row=mysqli_fetch_array($query)){
                            ?>

                            <tr>

                                <td>
                                    <?php echo $row['testing_id']; ?>
                                </td>

                                <td>
                                    <?php echo $row['product_id']; ?>
                                </td>

                                <td>

                                    <?php
                                    if($row['test_result']=="Passed"){
                                    ?>

                                        <span class="badge bg-success px-3 py-2">
                                            Passed
                                        </span>

                                    <?php
                                    } else {
                                    ?>

                                        <span class="badge bg-danger px-3 py-2">
                                            Failed
                                        </span>

                                    <?php } ?>

                                </td>

                                <td>
                                    <?php echo $row['engineer_name']; ?>
                                </td>

                                <td>
                                    <?php echo $row['testing_date']; ?>
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
document.getElementById('tableSearch').addEventListener('keyup', function() {
    let filter = this.value.toLowerCase();
    let rows = document.querySelectorAll('#testingTableBody tr');

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
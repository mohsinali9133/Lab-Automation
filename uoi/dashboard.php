<?php
session_start();
include "includes/config.php";

if (!isset($_SESSION['username'])) {
    header("location:login.php");
}

include "includes/header.php";

$product = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM products"));
$passed = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM testing_records WHERE test_result='Passed'"));
$failed = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM testing_records WHERE test_result='Failed'"));
?>

<div class="container-fluid dashboard-wrapper">
    <div class="row">

        <?php include "includes/sidebar.php"; ?>

        <div class="col-md-10 main-content">

            <div class="topbar">
                <div>
                    <h2 class="fw-bold mb-1">Laboratory Dashboard</h2>
                    <p class="text-secondary mb-0">Smart automation and testing analytics overview</p>
                </div>

                <div class="status-pill">
                    <i class="fa-solid fa-circle-check"></i> System Active
                </div>
            </div>

            <div class="row g-4">

                <div class="col-md-4">
                    <div class="card glass-card p-4 text-center">
                        <div class="stats-icon">
                            <i class="fa-solid fa-box"></i>
                        </div>
                        <h5>Total Products</h5>
                        <h1><?php echo $product; ?></h1>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card glass-card p-4 text-center">
                        <div class="stats-icon">
                            <i class="fa-solid fa-circle-check"></i>
                        </div>
                        <h5>Passed Products</h5>
                        <h1><?php echo $passed; ?></h1>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card glass-card p-4 text-center">
                        <div class="stats-icon">
                            <i class="fa-solid fa-triangle-exclamation"></i>
                        </div>
                        <h5>Failed Products</h5>
                        <h1><?php echo $failed; ?></h1>
                    </div>
                </div>

            </div>

            <div class="stats-container">
                <h2>Lab Statistics</h2>

                <?php
                $totalQuery = mysqli_query(
                    $conn,
                    "SELECT COUNT(*) as total FROM testing_records"
                );

                $totalData = mysqli_fetch_assoc($totalQuery);
                $totalProducts = $totalData['total'];


                $passQuery = mysqli_query(
                    $conn,
                    "SELECT COUNT(*) as passed
FROM testing_records
WHERE LOWER(test_result)='passed'"
                );

                $passData = mysqli_fetch_assoc($passQuery);
                $passedProducts = $passData['passed'];


                $failQuery = mysqli_query(
                    $conn,
                    "SELECT COUNT(*) as failed
FROM testing_records
WHERE LOWER(test_result)='failed'"
                );

                $failData = mysqli_fetch_assoc($failQuery);
                $failedProducts = $failData['failed'];


                $passPercentage = ($totalProducts > 0)
                    ? ($passedProducts / $totalProducts) * 100
                    : 0;

                $failPercentage = ($totalProducts > 0)
                    ? ($failedProducts / $totalProducts) * 100
                    : 0;
                ?>

                <table class="stats-table">
                    <tr>
                        <th>Total Products</th>
                        <th>Passed</th>
                        <th>Failed</th>
                    </tr>

                    <tr>
                        <td><?php echo $totalProducts; ?></td>
                        <td class="pass"><?php echo $passedProducts; ?></td>
                        <td class="fail"><?php echo $failedProducts; ?></td>
                    </tr>
                </table>

                <div class="progress-section">
                    <h4>Passed Products (<?php echo round($passPercentage); ?>%)</h4>
                    <div class="progress-bar">
                        <div class="progress pass-bar"
                            style="width: <?php echo $passPercentage; ?>%">
                        </div>
                    </div>

                    <h4>Failed Products (<?php echo round($failPercentage); ?>%)</h4>
                    <div class="progress-bar">
                        <div class="progress fail-bar"
                            style="width: <?php echo $failPercentage; ?>%">
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

<?php include "includes/footer.php"; ?>
<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>

<div class="col-md-2 sidebar">

    <div class="logo-box">
        <h2>LAB AI</h2>
        <p>Automation Management System</p>
    </div>

    <a href="dashboard.php" class="<?php if($current_page == 'dashboard.php'){ echo 'active'; } ?>">
        <i class="fa-solid fa-chart-line"></i> Dashboard
    </a>

    <a href="add_product.php" class="<?php if($current_page == 'add_product.php'){ echo 'active'; } ?>">
        <i class="fa-solid fa-square-plus"></i> Add Product
    </a>

    <a href="view_products.php" class="<?php if($current_page == 'view_products.php'){ echo 'active'; } ?>">
        <i class="fa-solid fa-boxes-stacked"></i> Products
    </a>

    <a href="add_test.php" class="<?php if($current_page == 'add_test.php'){ echo 'active'; } ?>">
        <i class="fa-solid fa-flask-vial"></i> Add Test
    </a>

    <a href="view_tests.php" class="<?php if($current_page == 'view_tests.php'){ echo 'active'; } ?>">
        <i class="fa-solid fa-microscope"></i> Test Records
    </a>

    <a href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">
        <i class="fa-solid fa-right-from-bracket"></i> Logout
    </a>

</div>

<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-0 shadow-lg rounded-4">
      <div class="modal-header bg-danger text-white border-0 py-3 rounded-top-4">
        <h5 class="modal-title fw-bold" id="logoutModalLabel">
            <i class="fa-solid fa-triangle-exclamation me-2"></i> Confirm Logout
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center p-4">
        <p class="fs-5 mb-0 text-secondary fw-semibold">Are you sure you want to log out of the system?</p>
        <small class="text-muted">Any unsaved changes will be lost.</small>
      </div>
      <div class="modal-footer border-0 d-flex justify-content-center pb-4">
        <button type="button" class="btn btn-secondary px-4 rounded-pill" data-bs-dismiss="modal">Cancel</button>
        <a href="logout.php" class="btn btn-danger px-4 rounded-pill">Logout</a>
      </div>
    </div>
  </div>
</div>
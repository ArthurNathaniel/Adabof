<style>
    .side-logo {
        width: 250px;
        height: 150px;
    }
</style>
<div class="sidebar_all">
    <div class="logo side-logo"></div>
    <br>
    <br>
    <div class="links">

        <h3><span class="icon"><i class="fas fa-money-bill-alt"></i></span> Net Revenue</h3>

        <a href="all_net.php" class="ll"> Net Revenue Summary </a>
        <a href="daily_net.php">Net  Daily Revenue</a>
        <a href="weekly_net.php">Net  Weekly Revenue</a>
        <a href="monthly_net.php">Net Monthly Revenue</a>
        <a href="yearly_net.php">Net  Yearly Revenue</a>

        <h3> <span class="icon"><i class="fas fa-receipt"></i></span> Receipt</h3>

        <a href="receipt_form.php"> Generate Reciept</a>
        <a href="view_receipts.php"> Receipt Management</a>

        <h3><span class="icon"><i class="fas fa-file-invoice-dollar"></i></span> Invoice</h3>

        <a href="create_invoice.php"> Generate Invoice</a>
        <a href="view_invoices.php">Invoice Management</a>
        <h3> <span class="icon"><i class="fas fa-receipt"></i></span> Expenditure</h3>
        <a href="expenditure_form.php">Generate Expenditure</a>
        <a href="view_expenditure.php">Expenditure Management</a>
        <h3><span class="icon"><i class="fas fa-user-tie"></i></span> Client</h3>

        <a href="add_client_details.php">Add Client Details</a>
        <a href="client_details.php">Client Management</a>


        <a href="logout.php" class="log"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>

</div>
<button id="toggleButton">
    <i class="fa-solid fa-bars-staggered"></i>
</button>

<script>
    // Get the button and sidebar elements
    var toggleButton = document.getElementById("toggleButton");
    var sidebar = document.querySelector(".sidebar_all");
    var icon = toggleButton.querySelector("i");

    // Add click event listener to the button
    toggleButton.addEventListener("click", function() {
        // Toggle the visibility of the sidebar
        if (sidebar.style.display === "none" || sidebar.style.display === "") {
            sidebar.style.display = "block";
            icon.classList.remove("fa-bars-staggered");
            icon.classList.add("fa-xmark");
        } else {
            sidebar.style.display = "none";
            icon.classList.remove("fa-xmark");
            icon.classList.add("fa-bars-staggered");
        }
    });
</script>
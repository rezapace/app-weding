<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if session is not active, then start session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require __DIR__ . '/../../db-connect.php';

if (empty($_SESSION['ADMIN'])) {
    echo '<script>alert("Required Login Authorization!");window.location="../login/"</script>';
    exit();
}

date_default_timezone_set("Asia/Jakarta");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Management</title>
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <style>
        @media print {
            .print-header {
                display: block;
            }
            .no-print {
                display: none;
            }
        }
        .report-table th, .report-table td {
            padding: 8px;
            border: 1px solid #ddd;
            text-align: left;
        }
        .report-table {
            width: 100%;
            border-collapse: collapse;
        }
    </style>
</head>
<body>

<div class="pagetitle">
    <h1>Order</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php?page=dashboard">Home</a></li>
            <li class="breadcrumb-item active">Order</li>
        </ol>
    </nav>
</div>

<div class="mt-2">
    <?php if (isset($_GET['pesan'])) { ?>
        <?php if ($_GET['pesan'] == "berhasil") { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Successfully Changed Order Data
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } elseif ($_GET['pesan'] == "gagal") { ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Failed to Change Order Data
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } elseif ($_GET['pesan'] == "hapus") { ?>
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                Successfully Deleted Order Data
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } elseif ($_GET['pesan'] == "gagalhapus") { ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Failed to Delete Order Data
                <?php if (isset($_GET['error'])) {
                    echo "<br>Error: " . htmlspecialchars($_GET['error']);
                } ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } elseif ($_GET['pesan'] == "tambah") { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Successfully Added Order Data
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } ?>
    <?php } ?>
</div>

<?php
// Query untuk menampilkan data order
$query = "SELECT * FROM `order` ORDER BY id ASC";
$result = mysqli_query($koneksi2, $query);

if (!$result) {
    die("Query Error: " . mysqli_errno($koneksi2) . " - " . mysqli_error($koneksi2));
}

$num_rows = mysqli_num_rows($result);
?>

<section class="section dashboard">
    <a href="index.php?page=add-order" class="btn btn-primary my-3">Add Order</a>
    <button onclick="window.print();" class="btn btn-danger my-3">Download PDF</button>

    <div class="row">
        <?php
        if ($num_rows > 0) {
            $no = 1;
            ?>
            <div class="table-responsive">
                <table class="report-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Paket</th>
                            <th>Status</th>
                            <th class="no-print">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                            // Check order status
                            $isCompleted = ($row['status'] === 'completed');
                            // Generate Gmail link if status is completed
                            if ($isCompleted) {
                                $subject = urlencode('Order Confirmation');
                                $body = urlencode("Dear {$row['nama']},\n\nYour order with package {$row['paket']} is confirmed.\n\nThank you!");
                                $gmail_link = "https://mail.google.com/mail/u/0/?view=cm&fs=1&to={$row['email']}&su={$subject}&body={$body}";
                                $emailButton = "<a href='$gmail_link' class='btn btn-primary btn-sm' target='_blank'><i class='bi bi-envelope'></i></a>";
                            } else {
                                $emailButton = "";
                            }
                            ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $row['nama']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['paket']; ?></td>
                                <td><?php echo $row['status']; ?></td>
                                <td class="no-print">
                                    <a href="index.php?page=edit-order&id=<?php echo $row['id']; ?>" class="btn btn-success btn-sm"><i class="bi bi-pencil-square"></i></a>
                                    <form action="order.php" method="get" style="display:inline;">
                                    <a href="../action.php?act=delete-order&id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this order?')"><i class="bi bi-trash-fill"></i></a>
                                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                    </form>
                                    <?php echo $emailButton; ?>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <?php
        } else {
            echo "<p>No orders available.</p>";
        }
        ?>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-KE6siV0K0R57d9Jllshwq6b15nwlMhy8k4eCD8PohkkL3DO0xs4pG6K6r35oRIpO" crossorigin="anonymous"></script>
<script src="../assets/js/main.js"></script>
</body>
</html>

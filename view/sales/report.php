<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monthly Sales Report</title>
    <link rel="stylesheet" href="assets/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.1/css/dataTables.dataTables.min.css">
</head>

<body>
    <div class="container mt-4">
        <div class="row align-items-center mb-3">
            <div class="col-auto">
                <a href="index.php?page=sales" class="btn btn-secondary">← Back to Sales Menu</a>
            </div>
            <div class="col">
                <h3 class="mb-0 text-center">Monthly Sales Report</h3>
            </div>
            <div class="col-auto">
                <a href="index.php?page=sales&action=export&month=<?= $month ?>&year=<?= $year ?>" class="btn btn-success">Export to CSV</a>
            </div>
        </div>
        <table class="table table-bordered table-striped" id="salesReportTable">
            <thead class="table-dark">
                <tr>
                    <th>Date</th>
                    <th>Product</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($report as $row): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['created_at']) ?></td>
                        <td><?= htmlspecialchars($row['product_name']) ?></td>
                        <td><?= (int) $row['quantity'] ?></td>
                        <td><?= number_format($row['price'], 2) ?></td>
                        <td><?= number_format($row['subtotal'], 2) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/2.3.1/js/dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#salesReportTable').DataTable();
        });
    </script>
</body>

</html>
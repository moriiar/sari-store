<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Monthly Sales Report</title>
  <link rel="stylesheet" href="assets/bootstrap.min.css">
</head>

<body>
  <div class="container mt-4">
    <a href="index.php?page=sales" class="btn btn-secondary mb-3">← Back to Sales Menu</a>
    <h3 class="mb-4">Monthly Sales Report</h3>
    <a href="index.php?page=sales&action=export&month=<?= $month ?>&year=<?= $year ?>" class="btn btn-success mb-3">Export to CSV</a>
    <table class="table table-bordered table-striped">
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
</body>

</html>
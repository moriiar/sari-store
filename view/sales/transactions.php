<!DOCTYPE html>
<html>

<head>
  <title>Add Sale</title>
  <link rel="stylesheet" href="assets/bootstrap.min.css">
</head>

<body>
  <div class="container mt-5">
    <a href="index.php?page=sales" class="btn btn-secondary mb-3">← Back to Sales Menu</a>
    <div class="card">
      <div class="card-header bg-success text-white">
        <h4 class="mb-0">Add Sale</h4>
      </div>
      <div class="card-body">
        <form method="POST" action="index.php?page=sales&action=add">
          <div id="items">
            <div class="row mb-3">
              <div class="col-md-4">
                <label for="product_id" class="form-label">Product ID</label>
                <input type="number" name="items[0][product_id]" class="form-control" required>
              </div>
              <div class="col-md-4">
                <label for="qty" class="form-label">Quantity</label>
                <input type="number" name="items[0][qty]" class="form-control" required>
              </div>
              <div class="col-md-4">
                <label for="price" class="form-label">Price</label>
                <input type="number" step="0.01" name="items[0][price]" class="form-control" required>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-success">Submit Sale</button>
        </form>
      </div>
    </div>
  </div>
</body>

</html>
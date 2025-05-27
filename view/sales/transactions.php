<form method="POST" action="index.php?page=sales&action=add">
  <h3>Add Sale</h3>
  <div id="items">
    <div>
      Product ID: <input type="number" name="items[0][product_id]" required>
      Qty: <input type="number" name="items[0][qty]" required>
      Price: <input type="number" step="0.01" name="items[0][price]" required>
    </div>
  </div>
  <button type="submit">Submit Sale</button>
</form>
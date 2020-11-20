<hr class="mb-4">
<form action method="post">

  <h4 class="mb-3">Payment</h4>

  <div class="d-block my-3">
    <div class="custom-control custom-radio">
      <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
      <label class="custom-control-label" for="credit">Carte de crédit</label>
    </div>
    <div class="custom-control custom-radio">
      <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
      <label class="custom-control-label" for="debit">Carte de débit</label>
    </div>
    <div class="custom-control custom-radio">
      <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required>
      <label class="custom-control-label" for="paypal">Paypal</label>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6 mb-3">
      <label for="cc-name">Nom de la carte</label>
      <input type="text" class="form-control" id="cc-name" placeholder="" required>
      <small class="text-muted">Nom complet affichait sur la carte name as displayed on card</small>
    </div>
    <div class="col-md-6 mb-3">
      <label for="cc-number">Credit card number</label>
      <input type="text" class="form-control" id="cc-number" placeholder="" required>
    </div>
  </div>
  <div class="row">
    <div class="col-md-3 mb-3">
      <label for="cc-expiration">Expiration</label>
      <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
    </div>
    <div class="col-md-3 mb-3">
      <label for="cc-expiration">CVV</label>
      <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
    </div>
  </div>
<hr class="mb-4">

</form>

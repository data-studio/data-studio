<?php

  if ('create-wallet' === $_REQUEST['form-id']) {
    MoneyCmd::createWallet(
      $_REQUEST['WalletName']
    );
  }

?>
<div id="CreateWalletForm"
  class="eviratec-web eviratec-form">
  <div class="form-field">
    <label for="WalletName">
      Name
    </label>

    <span class="spacer"></span>

    <input id="WalletName"
      name="WalletName"
      placeholder="E.g. Savings"
      value=""
      required>
  </div>

  <button id="CreateWallet">
    Create Wallet
  </button>
  <input name="form-id"
    type="hidden"
    value="create-wallet">
</div>

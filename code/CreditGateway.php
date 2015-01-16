<?php

class CreditGateway extends PaymentGateway_MerchantHosted {

  protected $supportedCurrencies = array(
    'NZD' => 'New Zealand Dollar'
  );

  public function validate($data) {

    $validationResult = $this->getValidationResult();

    if (! isset($data['Amount'])) {
      $validationResult->error('Payment amount not set');
    }
    else if (empty($data['Amount'])) {
      $validationResult->error('Payment amount cannot be null');
    }

    $this->validationResult = $validationResult;
    return $validationResult;
  }

  /**
  * Logic for processing the payment.
  * Possible scenario's for a failure could be:
    * - Not enough credit
    * - User is banned/inactive
    * - Reached a credit limit
  * @return Payment Result
  */
  public function process($data) {
    //return new PaymentGateway_Failure();
    //return new PaymentGateway_Incomplete();

    // Get credit amount based on config
    //$conf = Config::inst()->get('PaymentFactory', 'Credit');
    //$model = new $conf['credit_model']();
    //$credit = $model->CurrentUser()->$conf['credit_field'];

    return new PaymentGateway_Success();

  }

  public function getSupportedCurrencies() {

    $config = $this->getConfig();
    if (isset($config['supported_currencies'])) {
      $this->supportedCurrencies = $config['supported_currencies'];
    }
    return $this->supportedCurrencies;
  }
}

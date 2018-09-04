<?php

namespace Drupal\eloqua_integration\Plugin\WebformHandler;

use Drupal\Core\Form\FormStateInterface;
use Drupal\webform\Plugin\WebformHandlerBase;
use Drupal\webform\Plugin\WebformHandlerInterface;
use Drupal\webform\webformSubmissionInterface;

/**
 * Form submission handler.
 *
 * @WebformHandler(
 *   id = "eloqua_form_handler",
 *   label = @Translation("Eloqua form handler"),
 *   category = @Translation("Remote post"),
 *   description = @Translation("Eloqua form"),
 *   cardinality = Drupal\webform\Plugin\WebformHandlerInterface::CARDINALITY_SINGLE,
 *   results = Drupal\webform\Plugin\WebformHandlerInterface::RESULTS_PROCESSED,
 *   submission = Drupal\webform\Plugin\WebformHandlerInterface::SUBMISSION_REQUIRED,
 * )
 */
class EloquaFormHandler extends WebformHandlerBase {

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state, WebformSubmissionInterface $webform_submission) {
    $eloquaSiteId = '1631';
    $data = $webform_submission->getData();
    $mapper = [];

    $mapper['FirstName'] = $data['first_name'];
    $mapper['LastName'] = $data['last_name'];
    $mapper['Email'] = $data['email'];
    $mapper['JobTitle'] = $data['job_title'];
    $mapper['Company'] = $data['company'];
    $mapper['Country'] = $data['country'];
    $mapper['Zip'] = $data['zip_code'];
    $mapper['HomePhone'] = $data['home_phone'];
    $mapper['MonthlyBill'] = $data['average_monthly_electricity_bill'];
    $mapper['InterestInSolar'] = $data['please_tell_us_a_little_more_about_your_interest_in_solar'];

    $mapper['ec_id'] = $data['ec_id'];
    $mapper['elqFormName'] = $data['elqformname'];
    $mapper['elqSiteId'] = $eloquaSiteId;

    $eloquaURL = 'https://s' . $eloquaSiteId . '.t.eloqua.com/e/f2';
    $data = http_build_query($mapper);
    try {
      $request = \Drupal::httpClient()->post($eloquaURL, array(
        'query'=> $data,
      ));
    }
    catch(\Exception $exception) {
      return;
    }
  }
}

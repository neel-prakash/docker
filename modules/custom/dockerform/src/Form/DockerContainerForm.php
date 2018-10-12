<?php

namespace Drupal\dockerform\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class DockerContainerForm extends FormBase {
  
  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'dockercontainer_form';
  }
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['candidate_name'] = array(
      '#type' => 'textfield',
      '#title' => t('Candidate Name:'),
      '#required' => TRUE,
    );
    $form['candidate_mail'] = array(
      '#type' => 'email',
      '#title' => t('Email ID:'),
      '#required' => TRUE,
    );
    $form['candidate_number'] = array (
      '#type' => 'tel',
      '#title' => t('Mobile no'),
    );
    $form['candidate_dob'] = array (
      '#type' => 'date',
      '#title' => t('DOB'),
      '#required' => TRUE,
    );
    $form['candidate_gender'] = array (
      '#type' => 'select',
      '#title' => ('Gender'),
      '#options' => array(
        'Female' => t('Male'),
        'male' => t('Female'),
      ),
    );
    $form['candidate_confirmation'] = array (
      '#type' => 'radios',
      '#title' => ('Are you a engineering graduate ?'),
      '#options' => array(
        'Yes' =>t('Yes'),
        'No' =>t('No')
      ),
    );
    $form['candidate_copy'] = array(
      '#type' => 'checkbox',
      '#title' => t('Send me a copy of the application.'),
    );
    $form['submit'] = array(
      '#type' => 'submit',
      '#value' => $this->t('Save'),
    );
    $form['reset'] = array(
      '#type' => 'button',
      '#button_type' => 'reset',
      '#value' => $this->t('Clear'),
      '#attributes' => array(
            'onclick' => 'this.form.reset(); return false;',
          ),
    );
      return $form;
  }
  public function validateForm(array &$form, FormStateInterface $form_state) {
    if (strlen($form_state->getValue('candidate_number')) < 10) {
        $form_state->setErrorByName('candidate_number', $this->t('Mobile number is too short.'));
      }
  }
  
  public function submitForm(array &$form, FormStateInterface $form_state) {
        drupal_set_message("Please find below your details : ");
        $values = $form_state->getValues();
        
        foreach ($values as $key => $value) {
          if($key !== 'submit' &&
            $key !== 'reset' && $key !== 'form_build_id' && 
            $key !== 'form_token' && $key !== 'form_id'
            && $key !== 'op'){
            drupal_set_message($key . ': ' . $value);
          }
        }
  }
}
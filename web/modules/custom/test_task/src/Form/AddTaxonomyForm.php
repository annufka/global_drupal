<?php

namespace Drupal\test_task\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Add taxonomy.
 */
class AddTaxonomyForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'add_taxonomy_form';
  }

  public function buildForm(array $form, FormStateInterface $form_state){
    $form['taxonomy_title'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Taxonomy Title:'),
      '#required' => TRUE,
    );
    $form['taxonomy_description'] = array(
//      '#type' => 'textfield',
//      '#size' => 100,
//      '#maxlength' => 700,
      '#type' => 'textarea',
      '#title' => $this->t('Taxonomy Description:'),
      '#required' => TRUE,
    );
    $form['submit'] = array(
      '#type' => 'submit',
      '#value' => $this->t('Add'),
    );
    return $form;
  }

  public function submitForm(array &$form, FormStateInterface $form_state) {
    $taxonomy =  \Drupal\taxonomy\Entity\Term::create([
      'vid' => 'vocabulary',
      'name' => $form_state->getValue('taxonomy_title'),
      'description' => [
        'value' => $form_state->getValue('taxonomy_description'),
      ],
    ]);
    $taxonomy->save();

    $message = \Drupal::messenger();
    $message->addMessage('Taxonomy with id ' . $taxonomy->id() . ' was created.');

    $form_state->setRedirect('<front>');
  }
}

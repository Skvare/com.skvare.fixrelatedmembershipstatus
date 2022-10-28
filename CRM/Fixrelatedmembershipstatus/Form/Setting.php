<?php

use CRM_Fixrelatedmembershipstatus_ExtensionUtil as E;

/**
 * Form controller class
 *
 * @see https://docs.civicrm.org/dev/en/latest/framework/quickform/
 */
class CRM_Fixrelatedmembershipstatus_Form_Setting extends CRM_Core_Form {
  public function buildQuickForm() {
    /*
    $membershipStatus = CRM_Member_PseudoConstant::membershipStatus(NULL, "(is_current_member <> 1)");
    */
    $membershipStatus = CRM_Member_PseudoConstant::membershipStatus(NULL, NULL, 'label');
    $this->add('select', 'fix_status_primary_membership', ts('Keep Related Membership Status same as Primary for these status'),
      $membershipStatus, TRUE, ['class' => 'crm-select2 huge', 'multiple' => 1]);

    $this->add('select', 'fix_status_related_membership', ts('Look for related membership status'),
      $membershipStatus, TRUE, ['class' => 'crm-select2 huge', 'multiple' => 1]);

    $this->addButtons(array(
      array(
        'type' => 'submit',
        'name' => E::ts('Submit'),
        'isDefault' => TRUE,
      ),
    ));

    // export form elements
    $this->assign('elementNames', $this->getRenderableElementNames());

    // use settings as defined in default domain
    $domainID = CRM_Core_Config::domainID();
    $settings = Civi::settings($domainID);
    $setDefaults = [];
    foreach ($this->getRenderableElementNames() as $elementName) {
      $setDefaults[$elementName] = $settings->get($elementName);
    }
    $this->setDefaults($setDefaults);
    parent::buildQuickForm();
  }

  public function postProcess() {
    $values = $this->exportValues();

    // use settings as defined in default domain
    $domainID = CRM_Core_Config::domainID();
    $settings = Civi::settings($domainID);

    foreach ($values as $k => $v) {
      if (strpos($k, 'fix_status_') === 0) {
        $settings->set($k, $v);
      }
    }
    CRM_Core_Session::setStatus(E::ts('Setting updated successfully'));
  }


  /**
   * Get the fields/elements defined in this form.
   *
   * @return array (string)
   */
  public function getRenderableElementNames() {
    // The _elements list includes some items which should not be
    // auto-rendered in the loop -- such as "qfKey" and "buttons".  These
    // items don't have labels.  We'll identify renderable by filtering on
    // the 'label'.
    $elementNames = array();
    foreach ($this->_elements as $element) {
      /** @var HTML_QuickForm_Element $element */
      $label = $element->getLabel();
      if (!empty($label)) {
        $elementNames[] = $element->getName();
      }
    }
    return $elementNames;
  }

}

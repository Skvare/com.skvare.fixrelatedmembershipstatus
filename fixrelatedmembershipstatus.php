<?php

require_once 'fixrelatedmembershipstatus.civix.php';
// phpcs:disable
use CRM_Fixrelatedmembershipstatus_ExtensionUtil as E;
// phpcs:enable

/**
 * Implements hook_civicrm_config().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_config/
 */
function fixrelatedmembershipstatus_civicrm_config(&$config) {
  _fixrelatedmembershipstatus_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_install
 */
function fixrelatedmembershipstatus_civicrm_install() {
  _fixrelatedmembershipstatus_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_enable
 */
function fixrelatedmembershipstatus_civicrm_enable() {
  _fixrelatedmembershipstatus_civix_civicrm_enable();
}

// --- Functions below this ship commented out. Uncomment as required. ---

/**
 * Implements hook_civicrm_preProcess().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_preProcess
 */
//function fixrelatedmembershipstatus_civicrm_preProcess($formName, &$form) {
//
//}

/**
 * Implements hook_civicrm_navigationMenu().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_navigationMenu
 */
function fixrelatedmembershipstatus_civicrm_navigationMenu(&$menu) {
  _fixrelatedmembershipstatus_civix_insert_navigation_menu($menu, 'Administer/CiviMember', [
    'label' => E::ts('Fix Membership Status for related members'),
    'name' => 'setting_fixrelatedstatus',
    'url' => 'civicrm/admin/member/fixrelatedstatus',
    'permission' => 'administer CiviCRM',
    'operator' => 'OR',
    'separator' => 0,
  ]);
  _fixrelatedmembershipstatus_civix_navigationMenu($menu);
}

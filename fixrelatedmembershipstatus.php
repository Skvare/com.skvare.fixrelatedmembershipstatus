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
 * Implements hook_civicrm_xmlMenu().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_xmlMenu
 */
function fixrelatedmembershipstatus_civicrm_xmlMenu(&$files) {
  _fixrelatedmembershipstatus_civix_civicrm_xmlMenu($files);
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
 * Implements hook_civicrm_postInstall().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_postInstall
 */
function fixrelatedmembershipstatus_civicrm_postInstall() {
  _fixrelatedmembershipstatus_civix_civicrm_postInstall();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_uninstall
 */
function fixrelatedmembershipstatus_civicrm_uninstall() {
  _fixrelatedmembershipstatus_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_enable
 */
function fixrelatedmembershipstatus_civicrm_enable() {
  _fixrelatedmembershipstatus_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_disable
 */
function fixrelatedmembershipstatus_civicrm_disable() {
  _fixrelatedmembershipstatus_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_upgrade
 */
function fixrelatedmembershipstatus_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _fixrelatedmembershipstatus_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_managed
 */
function fixrelatedmembershipstatus_civicrm_managed(&$entities) {
  _fixrelatedmembershipstatus_civix_civicrm_managed($entities);
}

/**
 * Implements hook_civicrm_caseTypes().
 *
 * Add CiviCase types provided by this extension.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_caseTypes
 */
function fixrelatedmembershipstatus_civicrm_caseTypes(&$caseTypes) {
  _fixrelatedmembershipstatus_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implements hook_civicrm_angularModules().
 *
 * Add Angular modules provided by this extension.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_angularModules
 */
function fixrelatedmembershipstatus_civicrm_angularModules(&$angularModules) {
  // Auto-add module files from ./ang/*.ang.php
  _fixrelatedmembershipstatus_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_alterSettingsFolders
 */
function fixrelatedmembershipstatus_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _fixrelatedmembershipstatus_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

/**
 * Implements hook_civicrm_entityTypes().
 *
 * Declare entity types provided by this module.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_entityTypes
 */
function fixrelatedmembershipstatus_civicrm_entityTypes(&$entityTypes) {
  _fixrelatedmembershipstatus_civix_civicrm_entityTypes($entityTypes);
}

/**
 * Implements hook_civicrm_themes().
 */
function fixrelatedmembershipstatus_civicrm_themes(&$themes) {
  _fixrelatedmembershipstatus_civix_civicrm_themes($themes);
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

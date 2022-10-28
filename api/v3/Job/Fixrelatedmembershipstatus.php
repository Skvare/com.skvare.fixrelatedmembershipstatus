<?php
use CRM_Fixrelatedmembershipstatus_ExtensionUtil as E;

/**
 * Job.Fixrelatedmembershipstatus API specification (optional)
 * This is used for documentation and validation.
 *
 * @param array $spec description of fields supported by this API call
 *
 * @see https://docs.civicrm.org/dev/en/latest/framework/api-architecture/
 */
function _civicrm_api3_job_Fixrelatedmembershipstatus_spec(&$spec) {
}

/**
 * Job.Fixrelatedmembershipstatus API
 *
 * @param array $params
 *
 * @return array
 *   API result descriptor
 *
 * @see civicrm_api3_create_success
 *
 * @throws API_Exception
 */
function civicrm_api3_job_Fixrelatedmembershipstatus($params) {
  // Spec: civicrm_api3_create_success($values = 1, $params = [], $entity = NULL, $action = NULL)
  $domainID = CRM_Core_Config::domainID();
  $settings = Civi::settings($domainID);
  $fix_status_primary_membership = $settings->get('fix_status_primary_membership');
  if (!empty($fix_status_primary_membership)) {
    $fix_status_primary_membership = implode(',', $fix_status_primary_membership);

    $sql = "select m.id, m.contact_id, m.status_id,
      m1.id as 'rel_m_id', m1.status_id as 'rel_status_id', m1.contact_id  as 'rel_contact_id'
      from civicrm_membership m
      inner join civicrm_contact c on (m.contact_id = c.id)
      inner join civicrm_membership m1 on (m1.owner_membership_id = m.id)
      inner join civicrm_contact c1 on (m1.contact_id = c1.id)
      where
      m.status_id <> m1.status_id
      and m.status_id IN ({$fix_status_primary_membership})
      and c.is_deleted <> 1
      and c.is_deceased <> 1
      and c1.is_deleted <> 1
      and c1.is_deceased <> 1
  ";
    $dao = CRM_Core_DAO::executeQuery($sql);
    while ($dao->fetch()) {
      $membershipValues['id'] = $dao->rel_m_id;
      $membershipValues['owner_membership_id'] = $dao->id;
      $membershipValues['contact_id'] = $dao->rel_contact_id;
      $membershipValues['status_id'] = $dao->status_id;
      $membershipValues['skipStatusCal'] = TRUE;
      CRM_Member_BAO_Membership::add($membershipValues);
    }
  }
  return civicrm_api3_create_success($returnValues, $params, 'Job', 'Fixrelatedmembershipstatus');
}

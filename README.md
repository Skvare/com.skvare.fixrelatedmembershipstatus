# com.skvare.fixrelatedmembershipstatus

![Screenshot](/images/screenshot2.png)

This extension allows you to keep related membership status the same as primary membership status.
Admin can configure settings to lookup the primary membership status list and related membership status list and update related membership status as per the primary record.

The extension is licensed under [AGPL-3.0](LICENSE.txt).

## Requirements

* PHP v7.2+
* CiviCRM

## Installation (Web UI)

Learn more about installing CiviCRM extensions in the [CiviCRM Sysadmin Guide](https://docs.civicrm.org/sysadmin/en/latest/customize/extensions/).

## Installation (CLI, Zip)

Sysadmins and developers may download the `.zip` file for this extension and
install it with the command-line tool [cv](https://github.com/civicrm/cv).

```bash
cd <extension-dir>
cv dl com.skvare.fixrelatedmembershipstatus@https://github.com/Skvare/com.skvare.fixrelatedmembershipstatus/archive/master.zip
```

## Installation (CLI, Git)

Sysadmins and developers may clone the [Git](https://en.wikipedia.org/wiki/Git) repo for this extension and
install it with the command-line tool [cv](https://github.com/civicrm/cv).

```bash
git clone https://github.com/Skvare/com.skvare.fixrelatedmembershipstatus.git
cv en fixrelatedmembershipstatus
```

## Getting Started
http://domain.name/civicrm/admin/member/fixrelatedstatus

* `Keep Related Membership Status same as Primary for these status`: Set a list of membership statuses for the primary membership record.
* `Look for related membership status`: Set a list of membership statuses for related membership records.
* Scheduled job runs on a daily basis to correct related membership status as per primary membership status.

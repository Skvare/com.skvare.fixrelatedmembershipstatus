# com.skvare.fixrelatedmembershipstatus

![Screenshot](/images/screenshot2.png)

This CiviCRM extension automatically synchronizes related membership statuses with their corresponding primary membership statuses. When a primary membership status changes, this extension ensures that all related memberships are updated to maintain consistency across your membership records.

**Key Features:**
- Configurable mapping between primary and related membership statuses
- Automated daily synchronization via scheduled job
- Admin interface for easy configuration
- Maintains membership relationship integrity

## How It Works

The extension monitors primary membership records and updates related membership statuses based on configurable rules. This is particularly useful for:
- Family memberships where dependents should have the same status as the primary member
- Corporate memberships with multiple employee memberships
- Any scenario where related memberships should mirror the primary membership status

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

## Configuration

After installation, configure the extension settings:

1. Navigate to: `http://your-domain.com/civicrm/admin/member/fixrelatedstatus`
- `Administer` => `CiviMember` => `Fix Membership Status for related members`


2. **Primary Membership Status Configuration:**
  - Select the membership statuses for primary memberships that should trigger updates
  - Example: Current, Grace, New, etc.

3. **Related Membership Status Configuration:**
  - Choose which related membership statuses should be updated
  - These are the statuses that will be synchronized with the primary membership

4. **Scheduled Job:**
  - The extension automatically creates a scheduled job that runs daily
  - This job processes all qualifying membership relationships and updates statuses as needed

### Configuration Examples

**Scenario 1: Family Memberships**
- Primary Status: Current, New, Grace
- Related Status: Current, New, Grace, Expired
- Result: When primary member becomes "Current", all family members become "Current"

**Scenario 2: Corporate Memberships**
- Primary Status: Current, Pending
- Related Status: Current, Pending, Cancelled
- Result: Employee memberships follow the corporate membership status

## Usage

Once configured, the extension works automatically:

1. **Automatic Processing:** The scheduled job runs daily to synchronize statuses
2. **Real-time Updates:** Status changes are processed during the next scheduled job run
3. **Bulk Processing:** All qualifying relationships are processed in each job run

---

## Support

[Contact us](https://skvare.com/contact) for support or to learn more.

## Supporting Organizations

[Skvare](https://skvare.com/contact)

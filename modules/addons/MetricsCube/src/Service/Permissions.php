<?php

namespace MetricsCube\Service;

use MetricsCube\Models\Admins;
use MetricsCube\Models\MetricsCubeActions;
use MetricsCube\Models\MetricsCubeEvents;
use Illuminate\Database\Capsule\Manager as DB;
use MetricsCube\Models\MetricsCubePermissions;

class Permissions
{
	public static $actions = [
		[
			'id'        => 1,
			'parent_id' => 0,
			'action'    => 'customer_details.view_popup',
			'title'     => 'Client Profile Popup'
		],
		[
			'id'        => 2,
			'parent_id' => 1,
			'action'    => 'customer_details.view_information',
			'title'     => 'Personal Information'
		],
		[
			'id'        => 3,
			'parent_id' => 1,
			'action'    => 'customer_details.view_income',
			'title'     => 'Income'
		],
		[
			'id'        => 4,
			'parent_id' => 1,
			'action'    => 'customer_details.tabs_whmcs_services',
			'title'     => 'Services'
		],
		[
			'id'        => 5,
			'parent_id' => 1,
			'action'    => 'customer_details.tabs_whmcs_tickets',
			'title'     => 'Tickets History'
		],
		[
			'id'        => 6,
			'parent_id' => 1,
			'action'    => 'customer_details.view_activity',
			'title'     => 'User Activity'
		],
		[
			'id'        => 7,
			'parent_id' => 0,
			'action'    => 'customer_details.tags_view',
			'title'     => 'Tags'
		],
		[
			'id'        => 8,
			'parent_id' => 7,
			'action'    => 'customer_details.tags_create',
			'title'     => 'Create New Tags'
		],
		[
			'id'        => 9,
			'parent_id' => 7,
			'action'    => 'customer_details.tags_edit',
			'title'     => 'Manage Client Tags'
		],
		[
			'id'        => 10,
			'parent_id' => 0,
			'action'    => 'customer_details.comments_view',
			'title'     => 'View Comments'
		],
		[
			'id'        => 11,
			'parent_id' => 10,
			'action'    => 'customer_details.comments_edit',
			'title'     => 'Add Comments'
		],
		[
			'id'        => 12,
			'parent_id' => 10,
			'action'    => 'customer_details.comments_delete',
			'title'     => 'Remove Comments'
		],
		[
			'id'        => 13,
			'parent_id' => 0,
			'action'    => 'customer_details.view_profile',
			'title'     => 'Client Profile Page Widget'
		],
		[
			'id'        => 14,
			'parent_id' => 0,
			'action'    => 'service_details.view_widget',
			'title'     => 'Service Details Page Widget'
		],
		[
			'id'        => 15,
			'parent_id' => 0,
			'action'    => 'domain_details.view_widget',
			'title'     => 'Domain Details Page Widget'
		],
		[
			'id'        => 16,
			'parent_id' => 0,
			'action'    => 'metricscube_url',
			'title'     => 'MetricsCube Link In Main Menu'
		]
	];

	public static function checkRoles()
	{
		$shouldBeCount = count(self::$actions);
		$existsCount = (new MetricsCubeActions())->count();
		if ($shouldBeCount != $existsCount) {
			(new MetricsCubeActions())->truncate();
			foreach (self::$actions as $action) {
				$actionObj = new MetricsCubeActions();
				$actionObj->id = $action['id'];
				$actionObj->parent_id = $action['parent_id'];
				$actionObj->action = $action['action'];
				$actionObj->title = $action['title'];
				$actionObj->save();
			}
		}
	}

	public static function loadPermissions($adminRoleID = null)
	{
		$checkTableQuery = "SHOW TABLES LIKE 'MetricsCube_Actions'";
		$checkResult = DB::select($checkTableQuery);

		if (empty($checkResult)) {
			return [];
		}
		$adminRoleFilter = ['', ''];
		if ($adminRoleID > 0) {
			$adminRoleFilter[0] = sprintf(' WHERE `tbladminroles`.`id`=%s', $adminRoleID);
			$adminRoleFilter[1] = sprintf(' WHERE `MetricsCube_Permissions`.`admin_role_id`=%s', $adminRoleID);
		}
		$query = <<<EOL
SELECT admin_roles.*,
       IF(MetricsCube_Permissions.id IS NULL,0,1) as allowed
FROM (
    SELECT
        `tbladminroles`.`id` as `admin_role_id`,
    	`tbladminroles`.`name` as `admin_role_name`,
    	`MetricsCube_Actions`.`id` as `action_id`,
    	`MetricsCube_Actions`.`action` as `action`,
    	`MetricsCube_Actions`.`parent_id` as `action_parent_id`,
    	`MetricsCube_Actions`.`title` as `action_title`
    FROM `tbladminroles`
        INNER JOIN `MetricsCube_Actions`
    {$adminRoleFilter[0]}
) as admin_roles
     LEFT JOIN MetricsCube_Permissions on admin_roles.admin_role_id=MetricsCube_Permissions.admin_role_id and admin_roles.action_id=MetricsCube_Permissions.action_id
{$adminRoleFilter[1]}
order by `admin_roles`.`admin_role_id` ASC, `admin_roles`.`action_parent_id` ASC, `admin_roles`.`action_id` ASC;
EOL;

		return DB::select($query);
	}

	public static function getPermissions()
	{
		$roles = [];
		foreach (self::loadPermissions() as $row) {
			if (!isset($roles[$row->admin_role_id])) {
				$roles[$row->admin_role_id] = ['role_id' => $row->admin_role_id, 'role_name' => $row->admin_role_name, 'actions' => []];
			}
			if ($row->action_parent_id > 0) {
				$roles[$row->admin_role_id]['actions'][$row->action_parent_id]['actions'][$row->action_id] = [
					'action_id'      => $row->action_id,
					'action_name'    => $row->action_title,
					'action_allowed' => $row->allowed
				];
			} else {
				$roles[$row->admin_role_id]['actions'][$row->action_id] = [
					'action_id'      => $row->action_id,
					'action_name'    => $row->action_title,
					'action_allowed' => $row->allowed,
					'actions'        => []
				];
			}
		}
		return $roles;
	}

	public static function clean()
	{
		(new MetricsCubePermissions())->truncate();
	}

	public static function store($permisions)
	{
		try {
			if (isset($permisions['permissions'])) {
				$insertData = [];
				foreach ($permisions['permissions'] as $adminRoleID => $actions) {
					array_walk($actions, function ($action, $actionID) use (&$insertData, $adminRoleID) {
						$insertData[] = [
							'admin_role_id' => $adminRoleID,
							'action_id'     => $actionID
						];
					});
				}
				MetricsCubePermissions::insert($insertData);
			}
		} catch (\Exception $exception) {

		}

	}

	/**
	 * @param $adminid
	 * @return array
	 */
	public static function loadAdminPermissions($adminid)
	{
		$admin = Admins::where('id', $adminid)->first();
		if (!is_null($admin)) {
			$allPermissions = self::loadPermissions($admin->roleid);
			$permissions = [];
			foreach ($allPermissions as $permission) {
				$permissions[$permission->action] = $permission->action_title;
			}
			return $permissions;
		}
		return [];
	}

	/**
	 * @param int $adminid
	 * @return void
	 */
	public static function setAllAdminPermissions($adminid)
	{
		$admin = Admins::where('id', $adminid)->first();
		if (!is_null($admin)) {
			$configExist = MetricsCubePermissions::where('admin_role_id', $admin->roleid)->count();
			if ($configExist > 0) {
				return;
			}
			foreach (self::$actions as $action) {
				$actionObj = new MetricsCubePermissions();
				$actionObj->action_id = $action['id'];
				$actionObj->admin_role_id = $admin->roleid;
				$actionObj->save();
			}
		}
	}

}
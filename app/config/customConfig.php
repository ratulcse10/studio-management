<?php
/**
 * Created by PhpStorm.
 * User: yousufkhan
 * Date: 10-Apr-15
 * Time: 8:21 PM
 */

return [
			'names' => [
						'siteName' => 'Studio'
			],
			'roles' => [
						'admin' => 'Admin',
						'administrator' => "Administrator"
			],
			'permissions' => [
						'dashboard'      => 'dashboard_view',
						'student'        => 'student_view',
						'class'          => 'class_view',
						'marketing'      => 'marketing_view',
						'users'          => 'user_view',
						'finance'        => 'finance_view',
						'advance_search' => 'advance_search_view'
			],
			'paymentType' => [
				'hourly' => 'hourly',
				'salary' => 'salary',
				'custom' => 'custom'

			],
			'paymentCycle' => [
						'weekly' => 'weekly',
						'biweekly' => 'biweekly',
						'monthly' => 'monthly'

			],
];
<?php 

return [

	'PARCEL_TYPE' => [
		'PARCEL' => 'parcel',
		'ENVELOPE' => 'envelope',
		'BULKY_PARCEL' => 'bulky_parcel',
		'PALLET' => 'pallet'
	],

	'PARCEL_SEND_TYPE' => [
		'COMPANY' => 'company',
		'INDIVIDUAL' => 'individual'
	],
	'SHIPMENT_STATUS' => [
		'PADDING' => 'padding',
		'CANCELLED' => 'cancelled',
		'COMPLETED' => 'completed'
	],
	'TRANSPORTERS' => [
		'DPD' =>[
			'name' => 'DPD',
			'value' => 'dpd'
		],
		/*'SOMETHING' => [
			'name' => "Something else",
			'value' => 'somethingelse'
		]*/

	]
];
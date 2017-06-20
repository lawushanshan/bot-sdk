<?php
return [
    'nlu' => [
        'domain' => 'personal_income_tax',
        'intent' => 'personal_income_tax.inquiry',
        'slots' => [
            [
                'name' => 'monthlysalary',
                'value' => 'a20000',
            ],
            [
                'name' => 'location',
                'value' => '北京',
            ],
            [
                'name' => 'compute_type',
                'value' => '全部缴纳项目',
            ],
        ]
    ],
    'session' => [],
];

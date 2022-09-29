<?php

$config = [
    'loginrules' => [
        [
            'field' => 'admin_email',
            'label' => 'Username',
            'rules' => 'required|valid_email'
        ], [
            'field' => 'admin_password',
            'label' => 'Password',
            'rules' => 'required'
        ],
    ],
    'taskupdate' => [
        [
            'field' => 'project_updates_id',
            'label' => 'Update ID',
            'rules' => 'required'
        ], [
            'field' => 'project_work_status',
            'label' => 'Task Status',
            'rules' => 'required'
        ],
    ],
    'projectPipelineAdd' => [
        [
            'field' => 'project_id',
            'label' => 'Project ID',
            'rules' => 'required'
        ], [
            'field' => 'project_assigned',
            'label' => 'Project Assigned',
            'rules' => 'required'
        ],
        [
            'field' => 'project_update_details',
            'label' => 'Project Description',
            'rules' => 'required'
        ],
        [
            'field' => 'project_update_title',
            'label' => 'Project Task title',
            'rules' => 'required'
        ],
        [
            'field' => 'project_update_deadline',
            'label' => 'Project Deadline',
            'rules' => 'required'
        ],
    ],
    'project' => [
        [
            'field' => 'project_name',
            'label' => 'project_name',
            'rules' => 'required'
        ],
        [
            'field' => 'project_desc',
            'label' => 'project_desc',
            'rules' => 'required'
        ],
        // [
        //     'field' => 'project_reference',
        //     'label' => 'project_reference',
        //     'rules' => 'required'
        // ],
        [
            'field' => 'project_start_date',
            'label' => 'project_start_date',
            'rules' => 'required'
        ],
        // [
        //     'field' => 'project_end_date',
        //     'label' => 'project_end_date',
        //     'rules' => 'required'
        // ],
        // [
        //     'field' => 'project_domain',
        //     'label' => 'project_domain',
        //     'rules' => 'required'
        // ],
        // [
        //     'field' => 'project_hosting',
        //     'label' => 'project_hosting',
        //     'rules' => 'required'
        // ],
        [
            'field' => 'project_client_name',
            'label' => 'project_client_name',
            'rules' => 'required'
        ],
        // [
        //     'field' => 'project_client_contact',
        //     'label' => 'project_client_contact',
        //     'rules' => 'required'
        // ],
        // [
        //     'field' => 'project_client_email',
        //     'label' => 'project_client_email',
        //     'rules' => 'required'
        // ],
        [
            'field' => 'project_priority_level',
            'label' => 'project_priority_level',
            'rules' => 'required'
        ]
    ],
];

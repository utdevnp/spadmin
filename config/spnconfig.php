<?php 


return[

    "site_config"=>[
        "name"=>"SP Admin",
        "email"=>"info@spnepal.org",
        "alt_email"=>"spnepal.org@gmail.com"
    ],
     
    // fiscal year of the project 
    'year' => array(
        
        1 =>"2020/2021",
        2 =>"2021/2022",
        3 =>"2022/2023",
        4 =>"2023/2024",
        5 =>"2024/2025",
        6 =>"2025/2026",
        7 =>"2026/2027",
        8 =>"2027/2028",
        9 =>"2028/2029",
        10 =>"2029/2030",
    ),



    // asset_location of the project 
    'asset_locations' => array(
        0 =>"Ho Kathmandu",
        1 =>"SP Ilam",
        2 =>"SP Taplejung"
    ),

    
    // asset_conditions of the project 
    'asset_conditions' => array(
        0 =>"Good",
        1 =>"Partially Good",
        2 =>"Damage"
    ),

    "roles"=>[
        'staff',"manager","admin"
    ],

    // leave status
    "leave_status"=>[
        //'pending',
        "approved",
        'rejected'
    ],


    "permissions"=>[
      "mastermenu","projectsetup" ,"leavetype","designation","namechart",
      "category","itemsetup","staff","leave","fixasset","goodreceipt","goodstoreout","leavereport","reports"
    ],

    // Admin Navs

    "navs"=>[
      
        [
            "name"=>"Master Setup",
            "icon"=>"fas fa-clipboard-list",
            "route_name"=>"mastermenu",
            "link"=>"mastermenu",
            "child"=>true,
            "childNav"=>[
                [
                    "name"=>" Project",
                    "route_name"=>"projectsetup",
                    "link"=>"projectsetup.index",
                ],
                [
                    "name"=>" Leave Type",
                    "route_name"=>"leavetype",
                    "link"=>"leavetype.index",
                ],
                [
                    "name"=>" Designation",
                    "route_name"=>"designation",
                    "link"=>"designation.index",
                ],
                [
                    "name"=>" Name Chart",
                    "route_name"=>"namechart",
                    "link"=>"namechart.index",
                    
                ],
                [
                    "name"=>" Category",
                    "route_name"=>"category",
                    "link"=>"category.index",
                ],
                [
                    "name"=>" Item Description",
                    "route_name"=>"itemsetup",
                    "link"=>"itemsetup.index",
                ],

                [
                    "name"=>"Suppliers",
                    "route_name"=>"supplier",
                    "link"=>"supplier.index",
                ]
                
            ],
        ],
        [
            "name"=>"Staff Information",
            "icon"=>"fas fa-user-friends",
            "route_name"=>"staff",
            "link"=>"staff.index",
            "child"=>false,
        ],
        [
            "name"=>"Leave",
            "icon"=>"fab fab fa-buffer",
            "route_name"=>"leave",
            "link"=>"leave.index",
            "child"=>false,
        ],
        [
            "name"=>"Fixed Assets ",
            "icon"=>"fab fas fa-tasks",
            "route_name"=>"fixasset",
            "link"=>"fixasset.index",
            "child"=>false,
        ],
        [
            "name"=>"Goods Receipt Note  ",
            "route_name"=>"goodreceipt",
            "link"=>"goodreceipt.index",
            "icon"=>"fab fas fa-vote-yea",
            "child"=>false,
        ],
        [
            "name"=>"Goods Store Out ",
            "route_name"=>"goodstoreout",
            "link"=>"goodstoreout.index",
            "icon"=>"fab fas fa-warehouse",
            "child"=>false,
        ],
      

        [
            "name"=>"Reports",
            "route_name"=>"reports",
            "link"=>"reports",
            "icon"=>"far fa-file-excel",
            "child"=>true,
            "childNav"=>[
                [
                    "name"=>"Log Sheet Report",
                    "route_name"=>"logsheet",
                    "link"=>"logsheet.index",
                    "child"=>false,
                ],
                [
                    "name"=>"Leave Report",
                    "route_name"=>"leavereport",
                    "link"=>"leavereport.index",
                    "child"=>false,
                ],
            ]
        ]

        
    ]
];
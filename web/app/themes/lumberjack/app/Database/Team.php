<?php

namespace App\Database;

class Team
{

    protected $position = [
        'key' => 'team_position',
        'label' => 'Position / Job Title',
        'name' => 'team_position',
        'type' => 'text',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => [
            'width' => '100',
            'class' => '',
            'id' => '',
        ],
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'maxlength' => '',
    ];

    public function __construct()
    {
        add_action('acf/init', [$this, 'fields']);
    }

    public function fields()
    {
        acf_add_local_field_group([
            'key'                   => 'team_field_group',
            'title'                 => 'team Field Group',
            'menu_order'            => 0,
            'position'              => 'acf_after_title',
            'style'                 => 'seamless',
            'label_placement'       => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen'        => '',
            'fields'                => [
                $this->position,
            ],
            'location'              => [
                [
                    [
                        'param'    => 'post_type',
                        'operator' => '==',
                        'value'    => 'team',
                    ],
                ],
            ],
        ]);
    }
}

<?php

namespace App\Database;

class Testimonial
{
    protected $name = [
        'key' => 'testimonial_name',
        'label' => 'Full Name',
        'name' => 'testimonial_name',
        'type' => 'text',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => [
            'width' => '50',
            'class' => '',
            'id' => '',
        ],
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'maxlength' => '',
    ];
    protected $position = [
        'key' => 'testimonial_position',
        'label' => 'Position / Job Title / Location',
        'name' => 'testimonial_position',
        'type' => 'text',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => [
            'width' => '50',
            'class' => '',
            'id' => '',
        ],
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'maxlength' => '',
    ];
    protected $statement = [
        'key' => 'testimonial_statement',
        'label' => 'Quote / Statement',
        'name' => 'testimonial_statement',
        'type' => 'textarea',
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
        'maxlength' => '',
        'rows' => '',
        'new_lines' => '',
    ];

    public function __construct()
    {
        add_action('acf/init', [$this, 'fields']);
    }

    public function fields()
    {
        acf_add_local_field_group([
            'key'                   => 'testimonial_field_group',
            'title'                 => 'Testimonial Field Group',
            'menu_order'            => 0,
            'position'              => 'acf_after_title',
            'style'                 => 'seamless',
            'label_placement'       => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen'        => '',
            'fields'                => [
                $this->name,
                $this->position,
                $this->statement,
            ],
            'location'              => [
                [
                    [
                        'param'    => 'post_type',
                        'operator' => '==',
                        'value'    => 'testimonial',
                    ],
                ],
            ],
        ]);
    }
}

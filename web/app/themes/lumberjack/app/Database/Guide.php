<?php

namespace App\Database;

class Guide
{
    protected $file = [
        'key' => 'guide_file',
        'label' => 'The Guide File',
        'name' => 'guide_file',
        'type' => 'file',
        'instructions' => 'The file is required.',
        'required' => 1,
        'conditional_logic' => 0,
        'wrapper' => [
            'width' => '25',
            'class' => '',
            'id' => '',
        ],
        'return_format' => 'array',
        'library' => 'all',
        'min_size' => '',
        'max_size' => '',
        'mime_types' => '',
    ];
    protected $description = [
        'key' => 'guide_description',
        'label' => 'Guide Description',
        'name' => 'guide_description',
        'type' => 'text',
        'instructions' => 'Please enter a few short sentences about this guide.',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => [
            'width' => '75',
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
            'key'                   => 'guide_field_group',
            'title'                 => 'Guide Field Group',
            'menu_order'            => 0,
            'position'              => 'acf_after_title',
            'style'                 => 'seamless',
            'label_placement'       => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen'        => '',
            'fields'                => [
                $this->file,
                $this->description,
            ],
            'location'              => [
                [
                    [
                        'param'    => 'post_type',
                        'operator' => '==',
                        'value'    => 'guide',
                    ],
                ],
            ],
        ]);
    }
}

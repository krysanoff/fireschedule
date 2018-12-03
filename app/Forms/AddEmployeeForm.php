<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class AddEmployeeForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('firstname', 'text', [
                'label' => 'Имя',
                'rules' => 'required|max:20',
                'error_messages' => [
                    'firstname.required' => 'Обязательное поле'
                ]
            ])
            ->add('middlename', 'text', [
                'label' => 'Отчество',
                'rules' => 'max:20',
                'error_messages' => [
                    'middlename.required' => 'Обязательное поле'
                ]
            ])
            ->add('lastname', 'text', [
                'label' => 'Фамилия',
                'rules' => 'required|max:20',
                'error_messages' => [
                    'lastname.required' => 'Обязательное поле'
                ]
            ])
            ->add('post', 'select', [
                'label' => 'Должность',
                'rules' => '',
                'error_messages' => []
            ])
            ->add('rank', 'select', [
                'label' => '',
                'rules' => '',
                'error_messages' => []
            ])
            ->add('choice', 'select', [
                'label' => '',
                'rules' => '',
                'error_messages' => []
            ]);
    }
}

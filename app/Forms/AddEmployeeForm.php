<?php

namespace App\Forms;

use App\Post;
use App\Rank;
use App\Shift;
use function foo\func;
use Kris\LaravelFormBuilder\Form;

class AddEmployeeForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('lastname', 'text', [
                'label' => 'Фамилия',
                'rules' => 'required|max:20',
                'error_messages' => [
                    'lastname.required' => 'Обязательное поле'
                ]
            ])
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
            ->add('post', 'entity', [
                'class' => 'App\Post',
                'property' => 'name',
                'query_builder' => Post::all(),
                'label' => 'Должность'
            ])
            ->add('rank', 'entity', [
                'class' => 'App\Rank',
                'property' => 'name',
                'query_builder' => Rank::all(),
                'label' => 'Звание'
            ])
            ->add('shift', 'entity', [
                'class' => 'App\Shift',
                'property' => 'shift_number',
                'query_builder' => Shift::all(),
                'label' => 'Караул'
            ])
            ->add('submit', 'submit', [
                'label' => 'Добавить',
            ]);
    }
}

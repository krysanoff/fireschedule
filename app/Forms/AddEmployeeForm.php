<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class AddEmployeeForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('firstname', 'text')
            ->add('middlename', 'text')
            ->add('lastname', 'text')
            ->add('post', 'select')
            ->add('rank', 'select')
            ->add('choice', 'select');
    }
}

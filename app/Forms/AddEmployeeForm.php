<?php

namespace App\Forms;

use App\Post;
use App\Rank;
use App\Shift;
use Kris\LaravelFormBuilder\Form;

class AddEmployeeForm extends Form
{
    /**
     * Build form for creating or editing employee's data
     *
     * @return mixed|void
     */
    public function buildForm()
    {
        $this
            ->add('lastname', 'text', [
                'label' => 'Фамилия',
                'rules' => 'required|max:20',
                'error_messages' => [
                    'lastname.required' => 'Обязательное поле'
                ],
                'value' => $this->getFormOption('lastname')
            ])
            ->add('firstname', 'text', [
                'label' => 'Имя',
                'rules' => 'required|max:20',
                'error_messages' => [
                    'firstname.required' => 'Обязательное поле'
                ],
                'value' => $this->getFormOption('firstname'),
            ])
            ->add('middlename', 'text', [
                'label' => 'Отчество',
                'rules' => 'max:20',
                'error_messages' => [
                    'middlename.required' => 'Обязательное поле'
                ],
                'value' => $this->getFormOption('middlename'),
            ])
            ->add('post', 'entity', [
                'class' => 'App\Post',
                'property' => 'name',
                'query_builder' => Post::all(),
                'label' => 'Должность',
                'selected' => $this->getFormOption('post_id'),
            ])
            ->add('rank', 'entity', [
                'class' => 'App\Rank',
                'property' => 'name',
                'query_builder' => Rank::all(),
                'label' => 'Звание',
                'selected' => $this->getFormOption('rank_id'),
            ])
            ->add('shift', 'entity', [
                'class' => 'App\Shift',
                'property' => 'shift_number',
                'query_builder' => Shift::all(),
                'label' => 'Караул',
                'selected' => $this->getFormOption('shift_id'),
            ]);

        if (is_null($this->getFormOption('pic_path'))) {
            $photoBlock = <<<HTML
                <div class="row">
                    <div class="col" id="fullImage"></div>
                    <div class="col">
                        <a id="crop" class="btn btn-success text-light">Crop</a>
                    </div>
                    <div class="col" id="croppedImage"></div>
                </div>
                HTML;
        } else {
            $photoPath = env('APP_URL').$this->getFormOption('pic_path');
            $photo = "data:image/png;base64,".base64_encode(file_get_contents($photoPath)); //TODO verify the image src
            $photoBlock = <<<HTML
                <div id="photo"><img src="{$photoPath}" alt="{$photoPath}"></div>
                <div id="new_photo" style="display: none" class="row">
                    <div class="col" id="fullImage"></div>
                    <div class="col">
                        <a id="crop" class="btn btn-success text-light">Crop</a>
                    </div>
                    <div class="col" id="croppedImage"></div>
                </div>
                HTML;
        }
            $this->add('image', 'file', [
                'label' => 'Фото',
                'rules' => 'mimes:jpg,jpeg,png',
                'attr' => ['class' => 'form-control-file', 'id' => 'uploadImage', 'value' => 'Выбрать фото'],
                'help_block' => [
                    'text' => $photoBlock,
                    'tag' => 'div',
                    'attr' => ['class' => 'col-12']
                ],
            ])
            ->add('croppedImage', 'hidden', [
                'value' => $photo ?? '',
            ])
            ->add('changeImage', 'hidden', [
                'value' => false,
            ])
            ->add('oldImage', 'hidden', [
                'value' => $this->getFormOption('pic_path'),
            ])
            ->add('submit', 'submit', [
                'label' => 'Добавить',
            ]);
    }
}

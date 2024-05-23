<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class RoomTypeForm extends Form
{
    
    #[Validate('required')]
    public $name = 'ini nama';

    #[Validate('required')]
    public $description = 'ini descriptino';

    #[Validate('required')]
    public $price = '99000';
}

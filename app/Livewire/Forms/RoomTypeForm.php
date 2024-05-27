<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class RoomTypeForm extends Form
{
    
    #[Validate('required|min:2')]
    public $name = '';

    #[Validate('required')]
    public $description = '';

    #[Validate('required')]
    public $price = '';
}

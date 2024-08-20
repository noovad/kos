<?php

namespace App\Livewire\Admin;

use App\Models\Setting;
use Livewire\Component;

class SystemSetting extends Component
{
    public $title = 'System Setting';

    public $name;

    public $data;

    public function mount(string $name)
    {
        $this->name = $name;

        if ($this->name != 'Deskripsi' && $this->name != 'Fasilitas' && $this->name != 'Aturan' && $this->name != 'Tentang Kami') {
            return redirect()->route('admin.profile');
        }

        if ($this->name == 'Deskripsi') {
            $this->data = Setting::where('name', 'description')->value('value');
        } elseif ($this->name == 'Fasilitas') {
            $this->data = Setting::where('name', 'facility')->value('value');
        } elseif ($this->name == 'Aturan') {
            $this->data = Setting::where('name', 'rule')->value('value');
        } elseif ($this->name == 'Tentang Kami') {
            $this->data = Setting::where('name', 'about')->value('value');
        }
    }

    public function updateData()
    {
        if ($this->name == 'Deskripsi') {
            Setting::where('name', 'description')->update(['value' => $this->data]);
        } elseif ($this->name == 'Fasilitas') {
            Setting::where('name', 'facility')->update(['value' => $this->data]);
        } elseif ($this->name == 'Aturan') {
            Setting::where('name', 'rule')->update(['value' => $this->data]);
        } elseif ($this->name == 'Tentang Kami') {
            Setting::where('name', 'about')->update(['value' => $this->data]);
        } else {
            noty()->timeout(1000)->progressBar(false)->warning('Data gagal diubah.');
        }

        noty()->timeout(1000)->progressBar(false)->addSuccess('Data berhasil diubah.');

        return redirect()->route('admin.profile');
    }

    public function render()
    {
        return view('livewire.admin.system-setting');
    }
}

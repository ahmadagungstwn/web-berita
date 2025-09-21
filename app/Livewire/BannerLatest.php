<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\BannerAds;

class BannerLatest extends Component
{
    public $type = 'banner'; // default
    public $banner;

    public function mount($type = 'banner')
    {
        $this->type = $type;
        $this->banner = BannerAds::where('is_active', '1')
            ->where('type', $type)
            ->latest()
            ->first();
    }

    public function render()
    {
        return view('livewire.banner-latest');
    }
}

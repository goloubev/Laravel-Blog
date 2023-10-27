<?php

namespace App\View\Components;

// php artisan make:component TestDropdown
use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CategoryDropdown extends Component
{
    public function render(): Factory|View|Application
    {
        return view('components.category-dropdown', [
            'categories' => Category::all()
        ]);
    }
}

<?php
namespace App\Http\View\Composers;

use App\Main\DataMenu;
use Illuminate\View\View;

class Menucomposer
{
    public function compose(View $view)
    {
        $view->with('menuFull',DataMenu::menu());
    }
}
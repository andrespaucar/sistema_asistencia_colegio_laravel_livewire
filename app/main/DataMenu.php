<?php 
namespace App\Main;

use App\Models\Degrees;
class DataMenu
{
    public static function menu(){
        $menus = Degrees::select('id','name')->with('sections')->get();
        $menufull = []; 
        $menufull[] = [
            'title' => 'Dasboard',
            'route_name' => 'dashboard',
            'icon'=> 'fas fa-tachometer-alt',
        ];
        $menufull[] = [
            'title' => 'Usuarios',
            'route_name' => 'usuarios',
            'icon'=> 'fas fas fa-users-cog',
        ];
        $menufull[] = [
            'title' => 'Profesores',
            'route_name' => 'profesores',
            'icon'=> 'fas fa-chalkboard-teacher',
        ];
        foreach ($menus as $key => $value) {            
            $sections = [];
            foreach ($value['sections'] as $key => $section) {
                $sections[] = 
                [
                    'title' => $section['name'],
                    'icon' => '', 
                    'menu_open' => ['aula/'.$value['id'].'/'. $section['id'].'/*'],
                    'route_name'=> '',
                    'sub_menu'=>[
                        'students'=>[
                            'title'=> 'Alumnos',
                            'route_name' => 'aula/'.$value['id'].'/'. $section['id'].'/alumnos',
                        ],
                        'teachers' => [
                            'title' => 'Profesores', 
                            'route_name' => 'aula/'.$value['id'].'/'. $section['id'].'/profesores',
                        ]
                    ],
                ];
            }

            $menufull[]=
                 [
                    'title' =>  $value['name'],
                    'icon' => 'fas fa-th',
                    'menu_open' => ['aula/'.$value['id'].'/*'],
                    'sub_menu' => $sections
                    
                ];
        }
        
        return $menufull;
    }
}
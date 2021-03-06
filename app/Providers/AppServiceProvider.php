<?php

namespace App\Providers;

use App\Models\Departement;
use App\Models\Employee;
use App\Models\Kabinet;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Type;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Contracts\Events\Dispatcher;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Dispatcher $events)
    {
        Paginator::useBootstrap();

        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
            // $event->menu->add([
            //     //KABINET
            //     'text'    => 'KABINETS',
            //     'icon'    => 'fas fa-folder-plus',
            //     'active' => ['kabinet*'],
            //     'label' => Kabinet::count(),
            //     'label_color' => 'success',
            //     'submenu' => [
            //         [
            //             'text' => 'Manage',
            //             'icon_color' => 'red',
            //             'url'  => 'kabinet',
            //         ],
            //         [
            //             'text' => 'Create',
            //             'icon_color' => 'yellow',
            //             'url'  => 'kabinet/create',
            //         ],
            //     ],
            // ]);

            $event->menu->add([
                //MASTER
                'text'    => 'MASTER',
                'icon'    => 'fas fa-folder-plus',
                'active' => ['master*'],
                'label_color' => 'success',
                'submenu' => [
                    [
                        'text' => 'Divisi',
                        'label' => Departement::count(),
                        'icon_color' => 'yellow',
                        'url'  => 'departement',
                    ],
                    [
                        'text' => 'Unit',
                        'label' => Unit::count(),
                        'icon_color' => 'yellow',
                        'url'  => 'unit',
                    ],
                    [
                        'text' => 'Type',
                        'label' => Type::count(),
                        'icon_color' => 'yellow',
                        'url'  => 'type',
                    ],
                    [
                        'text' => 'Supplier',
                        'label' => Supplier::count(),
                        'icon_color' => 'yellow',
                        'url'  => 'supplier',
                    ],
                    [
                        'text' => 'Product',
                        'label' => Product::count(),
                        'icon_color' => 'yellow',
                        'url'  => 'product',
                    ],
                    [
                        'text' => 'Employee',
                        'label' => Employee::count(),
                        'icon_color' => 'yellow',
                        'url'  => 'employee',
                    ],
                ],
            ]);

            $event->menu->add([
                //TRANSACTION
                'text'    => 'TRANSACTION',
                'icon'    => 'fas fa-ticket-alt',
                'active' => ['transaction*'],
                // 'label' => Kabinet::count(),
                'label_color' => 'success',
                'submenu' => [
                    [
                        'text' => 'Incoming Transaction',
                        'icon_color' => 'green',
                        'url'  => 'transactionincoming',
                    ],
                    [
                        'text' => 'Outgoing Transaction',
                        'icon_color' => 'green',
                        'url'  => 'transactionoutcoming',
                    ]
                ],
            ]);

            //REPORTING
            $event->menu->add([
                'text'    => 'REPORTING',
                'icon'    => 'fas fa-file-alt',
                // 'label'       => DigitalArsip::count(),
                'label_color' => 'danger',
                'submenu' => [
                    [
                        'text' => 'Manage',
                        'icon_color' => 'yellow',
                        'url'  => 'PDF/index',
                    ],
                ],
            ]);

            //SETTING
            $event->menu->add([
                'text'    => 'SETTING',
                'icon'    => 'fa fa-cog',
                'active' => ['users*'],
                'submenu' => [
                    [
                        'text'    => 'User & Permission',
                        'icon_color' => 'blue',
                        'label'       => User::count(),
                        'label_color' => 'primary',
                        'submenu' => [
                            [
                                'text' => 'Manage',
                                'icon_color' => 'blue',
                                'url'  => 'users',
                            ],
                            [
                                'text'    => 'Create',
                                'icon_color' => 'blue',
                                'url'     => 'users/create',
                            ],
                        ],
                    ],

                    [
                        'text'    => 'Roles',
                        'icon_color' => 'green',
                        'active' => ['roles*'],
                        'label'       => Role::count(),
                        'label_color' => 'success',
                        'submenu' => [
                            [
                                'text' => 'Manage',
                                'icon_color' => 'green',
                                'url'  => 'roles',
                            ],
                            [
                                'text'    => 'Create',
                                'icon_color' => 'green',
                                'url'     => 'roles/create',
                            ],
                        ],
                    ],
                ],
            ]);
        });
    }
}

<?php

namespace App\Providers;

use SleepingOwl\Admin\Providers\AdminSectionsServiceProvider as ServiceProvider;

class AdminSectionsServiceProvider extends ServiceProvider
{

    /**
     * @var array
     */
    protected $sections = [
        //\App\User::class => 'App\Http\Sections\Users',

        \App\Page::class => 'App\Http\AdminSections\Pages',
        \App\People::class => 'App\Http\AdminSections\Peoples',
        \App\Portfolio::class => 'App\Http\AdminSections\Portfolios',
        \App\Order::class => 'App\Http\AdminSections\Orders',
        \App\OrderItem::class => 'App\Http\AdminSections\OrderItems',
    ];

    /**
     * Register sections.
     *
     * @return void
     */
    public function boot(\SleepingOwl\Admin\Admin $admin)
    {
    	//

        parent::boot($admin);
    }
}

<?php

namespace Modules\Dashboard;

use Dnsoft\Core\Support\BaseModuleServiceProvider;
use Modules\Dashboard\Models\Dashboard;
use Modules\Dashboard\Repositories\DashboardRepositoryInterface;
use Modules\Dashboard\Repositories\Eloquents\DashboardRepository;

class DashboardServiceProvider extends BaseModuleServiceProvider
{
    public function getModuleNamespace()
    {
        return 'dashboard';
    }

    public function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub

        $this->app->singleton(DashboardRepositoryInterface::class, function () {
            return new DashboardRepository(new Dashboard());
        });

        $this->app->singleton('dashboard', function () {
            return new DashboardManager();
        });
    }

    public function register()
    {
        parent::register(); // TODO: Change the autogenerated stub
    }

}

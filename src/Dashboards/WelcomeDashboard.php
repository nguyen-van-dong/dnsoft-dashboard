<?php

namespace Module\Dashboard\Dashboards;

use Module\Dashboard\DashboardItem;

class WelcomeDashboard extends DashboardItem
{
    public function col()
    {
        return 4;
    }

    public function name()
    {
        return 'Welcome';
    }

    public function toHtml()
    {
        return view('dashboard::dashboards.welcome');
    }
}

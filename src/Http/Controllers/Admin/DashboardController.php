<?php

namespace Module\Dashboard\Http\Controllers\Admin;

use Module\Dashboard\Facades\Dashboard;
use Illuminate\Routing\Controller;
use Module\Dashboard\Repositories\DashboardRepositoryInterface;

class DashboardController extends Controller
{
    /**
     * @var DashboardRepositoryInterface
     */
    private $dashboardRepository;

    public function __construct(DashboardRepositoryInterface $dashboardRepository)
    {
        $this->dashboardRepository = $dashboardRepository;
    }

    public function index()
    {
        $myItems = $this->dashboardRepository->myDashboard()->pluck('class_name')->toArray();

        $myItems = $myItems ?: Dashboard::onlyCanAccess()->keys()->toArray();

        $myDashboard = Dashboard::only($myItems);
        $version = get_version_actived();
        return view("dashboard::$version.admin.index", compact('myDashboard'));
    }

    public function setting()
    {
        $version = get_version_actived();
        return view("dashboard::$version.admin.setting");
    }

    public function save()
    {

    }
}

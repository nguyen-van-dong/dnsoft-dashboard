<?php

namespace Dnsoft\Dashboard\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use Modules\Dashboard\Repositories\DashboardRepositoryInterface;

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
        return view('dashboard::admin.index');
    }
}
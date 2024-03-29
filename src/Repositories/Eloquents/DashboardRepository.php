<?php

namespace Module\Dashboard\Repositories\Eloquents;

use DnSoft\Acl\Models\Admin;
use DnSoft\Core\Repositories\BaseRepository;
use Module\Dashboard\Repositories\DashboardRepositoryInterface;

class DashboardRepository extends BaseRepository implements DashboardRepositoryInterface
{
    public function myDashboard()
    {
        return $this->model
            ->whereHasMorph('author', Admin::class, function ($q) {
                $q->where('id', $this->currentAdmin()->id);
            })
            ->orderBy('sort_order', 'ASC')
            ->get();
    }

    protected function currentAdmin()
    {
        return \Auth::guard('admin')->user();
    }
}

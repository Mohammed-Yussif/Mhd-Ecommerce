<?php
 
namespace InnoShop\Panel\Repositories\Analytics;

use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\DB;
use InnoShop\Panel\Repositories\BaseRepo;

class OrderRepo extends BaseRepo
{
    /**
     * @return array
     */
    public function getOrderTotalLatestWeek(): array
    {
        $filters = [
            'start' => today()->subWeek(),
            'end'   => today()->endOfDay(),
        ];
        $articleTotals = \InnoShop\Common\Repositories\OrderRepo::getInstance()->builder($filters)
            ->select(DB::raw('DATE(created_at) as date, sum(total) as total'))
            ->groupBy('date')
            ->get()
            ->keyBy('date');

        $dates  = $totals = [];
        $period = CarbonPeriod::create(today()->subWeek(), today())->toArray();
        foreach ($period as $date) {
            $dateFormat   = $date->format('Y-m-d');
            $articleTotal = $articleTotals[$dateFormat] ?? null;

            $dates[]  = $dateFormat;
            $totals[] = $articleTotal ? $articleTotal->total : 0;
        }

        return [
            'period' => $dates,
            'totals' => $totals,
        ];
    }
}

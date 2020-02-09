<?php
/**
 * Created by PhpStorm.
 * AnalyticController.php
 * Description:
 * User: Jacky
 * Date: 2020/2/9
 * Time: 12:20 下午
 */

namespace App\Http\Controllers;

use Analytics;
use Spatie\Analytics\Period;

class AnalyticController extends Controller
{
    public function google()
    {
        $total = Analytics::fetchTotalVisitorsAndPageViews(Period::days(14));
        $t = [];
        $i = 0;
        foreach ($total as $item) {
          $datetime = $item['date']->toDateString();
          $t['visitors'][] = ['x' => $datetime, 'y' => $item['visitors']];
          $t['page_views'][] = ['x' => $datetime, 'y' => $item['pageViews']];
          $i++;
        }
        $t['today'] = $total[--$i];
        $t['yesterday'] = $total[--$i];
        return response()->json([
          'most_visited_pages' => Analytics::fetchMostVisitedPages(Period::days(14)),
          'total' => $t
        ]);
    }
}

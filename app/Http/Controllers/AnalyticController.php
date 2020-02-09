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


use Illuminate\Http\Request;

class AnalyticController extends Controller
{
    public function google(Request $request)
    {
        return response()->json(['message' => 'Hello World']);
    }
}

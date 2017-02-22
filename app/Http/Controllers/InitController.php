<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Visit;
use App\Cache;

class InitController extends Controller
{
    /**
     * Calls the home page, with the cached values
     * @return view
     */
    public function homePage()
    {
        $ip = request()->ip();
        $user_agent = request()->header("user-agent");
        $Visit = new Visit();
        $Cache = new Cache();
        $Visit->saveVisit($ip, $user_agent);

        $cache = $Cache->getAllCache();
        return view('homePage')
            ->with('cache', $cache);
    }
}

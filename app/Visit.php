<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    /**
     * Save a visit on site
     * @param  String $ip         Localization of the visitor
     * @param  String $user_agent General information of the visitor
     * @return [type]             [description]
     */
    public function saveVisit($ip, $user_agent)
    {
        $this->browser = explode(' ', $user_agent)[10];
        $os = explode('(', $user_agent)[1];
        $this->os = explode(';', $os)[0];
        $this->ip = $ip;
        if (!$this->isSameVisit()) {
            $this->save();
        }
    }

    /**
     * Returns if is the same visit
     * @return boolean [description]
     */
    private function isSameVisit()
    {
        $fifteen_minutes_ago = date('Y-m-d H:i:s',strtotime("-15 minutes"));
        $find = $this
            ->where('created_at', '>', $fifteen_minutes_ago)
            ->where('ip', '=', $this->ip)
            ->get();
        return count($find) > 0;
    }
}

<?php

namespace App\Services\Agent;

use Jenssegers\Agent\Agent;

class GetAgent
{
    public function getAgentInfo()
    {
        $agent = new Agent();
        
        $clientIp = request()->ip();
        $clientUserAgent = request()->userAgent();
        $clientBrowser = $agent->browser();
        $clientPlatform = $agent->platform();
        $clientDevice = $agent->device();
        $clientVersion = $agent->version($clientBrowser);
        return [
            'ip' => $clientIp,
            'user_agent' => $clientUserAgent,
            'browser' => $clientBrowser,
            'platform' => $clientPlatform,
            'device' => $clientDevice,
            'version' => $clientVersion,
        ];
    }
}
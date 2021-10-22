<?php

namespace ifresh\Fakkel;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Request;

class Fakkel
{
    protected $data = [];
    protected $client;

    public function __construct($token)
    {
        $this->client = Http::withToken($token);
        $this->data['date'] = Carbon::now();
    }


    public function info($title): Fakkel
    {
        $this->data['title'] = $title;
        return $this;
    }

    public function withContent($content): Fakkel
    {
        $this->data['content'] = $content;
        return $this;
    }

    public function withUser(): Fakkel
    {
        $this->data['user'] = $this->getUser();
        return $this;
    }

    public function withRequest(): Fakkel
    {
        $this->data['request'] = Request::all();
        return $this;
    }

    public function send(): void
    {
        $this->client->post("http://localhost:8001/api/log/store", $this->data);
    }

    private function getUser(): string
    {
        if(!Auth::check()) {
            return 'none';
        }

        return Auth::user();
    }
}

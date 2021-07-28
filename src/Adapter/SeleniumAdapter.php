<?php


namespace App\Adapter;


use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;

class SeleniumAdapter
{
    private RemoteWebDriver $remoteWebdriver;

    public function getWebDriver()
    {
        $serverUrl = 'http://localhost:4444';
        $this->remoteWebdriver = RemoteWebDriver::create($serverUrl, DesiredCapabilities::chrome());
        return $this->remoteWebdriver;
    }

    public function finish()
    {
        $this->remoteWebdriver->quit();
    }
}
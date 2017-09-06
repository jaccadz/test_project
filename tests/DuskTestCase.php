<?php

namespace Tests;

use Laravel\Dusk\TestCase as BaseTestCase;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;

use Facebook\WebDriver\Chrome\ChromeOptions;

abstract class DuskTestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * Prepare for Dusk test execution.
     *
     * @beforeClass
     * @return void
     */
    public static function prepare()
    {
        //static::startChromeDriver();
        if (env('DUSK_START_CHROMEDRIVER', true)) {
            static::startChromeDriver();
        }
    }

    /**
     * Create the RemoteWebDriver instance.
     *
     * @return \Facebook\WebDriver\Remote\RemoteWebDriver
     */
    protected function driver()
    {
        $chromeOptions = new ChromeOptions();
        if ($binary = env('DUSK_CHROME_BINARY')) {
            $chromeOptions->setBinary($binary);
        }
        //$chromeOptions->setBinary('/usr/bin/chromium-browser');
        $chromeOptions->addArguments(['no-first-run']);
        $capabilities = DesiredCapabilities::chrome();
        $capabilities->setCapability(ChromeOptions::CAPABILITY, $chromeOptions);

        return RemoteWebDriver::create(
            'http://localhost:9515', DesiredCapabilities::chrome()
        );
    }
}

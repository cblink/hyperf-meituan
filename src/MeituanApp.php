<?php


namespace Cblink\HyperfMeituan;


use Cblink\HyperfMeituan\Kernel\ServiceContainer;

/**
 * @property Delivery\Client $delivery
 * Class MeituanApp
 * @package Cblink\HyperfMeituan
 */
class MeituanApp extends ServiceContainer
{
    /**
     * @var string
     */
    protected $base_url = 'https://api-open-cater.meituan.com';

    /**
     * {@inheritdoc}
     */
    protected function getCustomProviders(): array
    {
        return [
            Delivery\ServiceProvider::class,
        ];
    }


}
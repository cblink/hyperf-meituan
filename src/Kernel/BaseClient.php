<?php

/*
 * This file is part of the cblink/dispatch-meituan.
 *
 * (c) jinjun <757258777@qq.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Cblink\HyperfMeituan\Kernel;

use Cblink\HyperfMeituan\Kernel\Exception\MeituanException;
use Cblink\HyperfMeituan\Kernel\Traits\HasHttpRequest;

/**
 * Class BaseClient.
 */
class BaseClient
{
    use HasHttpRequest;

    /**
     * @var ServiceContainer
     */
    protected $app;

    protected $config;

    /**
     * BaseClient constructor.
     * @param ServiceContainer $app
     */
    public function __construct(ServiceContainer $app)
    {
        $this->app = $app;

        $this->config = $app->config;
    }

    protected function getBaseOptions()
    {
        $options = [
            'base_uri' => method_exists($this, 'getBaseUri') ? $this->getBaseUri() : '',
            'timeout' => method_exists($this, 'getTimeout') ? $this->getTimeout() : 10.0,
            'Content-Type' => 'application/x-www-form-urlencoded',
        ];

        return $options;
    }

    /**
     * 发送请求
     *
     * @param $method
     * @param $uri
     * @param array $params
     *
     * @return mixed
     */
    public function sendRequest($method, $uri, $params = [])
    {
        $data = [
            'charset' => 'UTF-8',
            'timestamp' => time(),
            'version' => 2,
            'developerId' => $this->config['developerId'],
            'biz' => $params,
        ];

        if(!empty($this->config['auth_token'])){
            $data['appAuthToken'] = $this->config['auth_token'];
        }

        $data['sign'] = $this->getSign($data);

        $response = $this->$method($this->url($uri), $data, $this->getBaseOptions());

        if ($response['code'] != 'OP_SUCCESS') {
            throw new MeituanException($response['msg']);
        }
        return $response;
    }

    /**
     * url
     *
     * @param string $uri
     * @return string
     */
    protected function url($uri = ''): string
    {
        return rtrim($this->app->baseUrl(), '/') . '/' . ltrim($uri, '/');
    }

    /**
     * 数字签名.
     *
     * @param $params
     * @return string
     */
    public function getSign(&$params)
    {
        $sign = $this->config['secret'];

        ksort($params);

        foreach ($params as $key => &$param) {
            $param = is_array($param) ? json_encode($param) : $param;
            $sign .= $key.$param;
        }

        return strtolower(sha1($sign));
    }
}

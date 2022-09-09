<?php

/*
 * This file is part of the cblink/dispatch-meituan.
 *
 * (c) jinjun <757258777@qq.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Cblink\HyperfMeituan\Delivery;

use Cblink\HyperfMeituan\Kernel\BaseClient;

class Client extends BaseClient
{

    /**
     * 创建订单
     *
     * @param array $params
     * @return mixed
     * @throws \Cblink\HyperfMeituan\Kernel\Exception\MeituanException
     */
    public function createByShop(array $params)
    {
        return $this->sendRequest('post', 'peisong/order/createByShop', $params);
    }

    /**
     * 取消订单
     *
     * @param array $params
     * @return mixed
     * @throws \Cblink\HyperfMeituan\Kernel\Exception\MeituanException
     */
    public function cancelOrder(array $params)
    {
        return $this->sendRequest('post', 'peisong/order/cancel', $params);
    }

    /**
     * 订单状态查询
     *
     * @param array $params
     * @return mixed
     * @throws \Cblink\HyperfMeituan\Kernel\Exception\MeituanException
     */
    public function queryStatus(array $params)
    {
        return $this->sendRequest('post', 'peisong/order/queryStatus', $params);
    }

    /**
     * 评价骑手
     *
     * @param array $params
     * @return mixed
     * @throws \Cblink\HyperfMeituan\Kernel\Exception\MeituanException
     */
    public function evaluate(array $params)
    {
        return $this->sendRequest('post', 'peisong/order/evaluate', $params);
    }

    /**
     * 获取骑手当前位置
     *
     * @param array $params
     * @return mixed
     * @throws \Cblink\HyperfMeituan\Kernel\Exception\MeituanException
     */
    public function location(array $params)
    {
        return $this->sendRequest('post', 'peisong/order/location', $params);
    }

    /**
     * 配送能力校验
     *
     * @param array $params
     * @return mixed
     * @throws \Cblink\HyperfMeituan\Kernel\Exception\MeituanException
     */
    public function checkOrder(array $params)
    {
        return $this->sendRequest('post', 'peisong/order/check', $params);
    }

    /**
     * 创建配送门店
     *
     * @param array $params
     * @return mixed
     * @throws \Cblink\HyperfMeituan\Kernel\Exception\MeituanException
     */
    public function createShop(array $params)
    {
        return $this->sendRequest('post', 'peisong/shop/create', $params);
    }

    /**
     * 查询门店信息
     *
     * @param array $params
     * @return mixed
     * @throws \Cblink\HyperfMeituan\Kernel\Exception\MeituanException
     */
    public function queryShop(array $params)
    {
        return $this->sendRequest('post', 'peisong/shop/query', $params);
    }

    /**
     * 查询合作方配送范围
     *
     * @param array $params
     * @return mixed
     * @throws \Cblink\HyperfMeituan\Kernel\Exception\MeituanException
     */
    public function queryShopArea(array $params)
    {
        return $this->sendRequest('post', 'peisong/shop/query', $params);
    }

    /**
     * 修改订单
     *
     * @param array $params
     * @return mixed
     * @throws \Cblink\HyperfMeituan\Kernel\Exception\MeituanException
     */
    public function modifyOrder(array $params)
    {
        return $this->sendRequest('post', 'peisong/order/modify', $params);
    }

    /**
     * 增加小费
     *
     * @param array $params
     * @return mixed
     * @throws \Cblink\HyperfMeituan\Kernel\Exception\MeituanException
     */
    public function addTipOrder(array $params)
    {
        return $this->sendRequest('post', 'peisong/order/addTip', $params);
    }

    /**
     * 修改门店信息
     *
     * @param array $params
     * @return mixed
     * @throws \Cblink\HyperfMeituan\Kernel\Exception\MeituanException
     */
    public function updateShop(array $params)
    {
        return $this->sendRequest('post', 'peisong/shop/update', $params);
    }

    /**
     * 取餐码信息下发
     *
     * @param array $params
     * @return mixed
     * @throws \Cblink\HyperfMeituan\Kernel\Exception\MeituanException
     */
    public function mealCode(array $params)
    {
        return $this->sendRequest('post', 'peisong/order/mealCode/saveMealCodeByPkgId', $params);
    }

    /**
     * 获取骑手位置H5
     *
     * @param array $params
     * @return mixed
     * @throws \Cblink\HyperfMeituan\Kernel\Exception\MeituanException
     */
    public function locationH5(array $params)
    {
        return $this->sendRequest('post', 'peisong/order/rider/location/h5url', $params);
    }

    /**
     * 预发单接口
     *
     * @param array $params
     * @return mixed
     * @throws \Cblink\HyperfMeituan\Kernel\Exception\MeituanException
     */
    public function preCreateByShop(array $params)
    {
        return $this->sendRequest('post', 'peisong/order/preCreateByShop', $params);
    }

    /**
     * 模拟接单
     *
     * @param array $params
     * @return mixed
     * @throws \Cblink\HyperfMeituan\Kernel\Exception\MeituanException
     */
    public function testArrange(array $params)
    {
        return $this->sendRequest('post', 'peisong/test/orderArrange', $params);
    }

    /**
     * 模拟取货
     *
     * @param array $params
     * @return mixed
     * @throws \Cblink\HyperfMeituan\Kernel\Exception\MeituanException
     */
    public function testPickup(array $params)
    {
        return $this->sendRequest('post', 'peisong/test/orderPickup', $params);
    }

    /**
     * 模拟送达
     *
     * @param array $params
     * @return mixed
     * @throws \Cblink\HyperfMeituan\Kernel\Exception\MeituanException
     */
    public function testOrderDeliver(array $params)
    {
        return $this->sendRequest('post', 'peisong/test/orderDeliver', $params);
    }

    /**
     * 模拟改派
     *
     * @param array $params
     * @return mixed
     * @throws \Cblink\HyperfMeituan\Kernel\Exception\MeituanException
     */
    public function testOrderRearrange(array $params)
    {
        return $this->sendRequest('post', 'peisong/test/orderRearrange', $params);
    }

    /**
     * 模拟骑手上传异常
     *
     * @param array $params
     * @return mixed
     * @throws \Cblink\HyperfMeituan\Kernel\Exception\MeituanException
     */
    public function orderReportException(array $params)
    {
        return $this->sendRequest('post', 'peisong/test/orderReportException', $params);
    }

    /**
     * 模拟门店状态回调测试
     *
     * @param array $params
     * @return mixed
     * @throws \Cblink\HyperfMeituan\Kernel\Exception\MeituanException
     */
    public function testShopStatusCallback(array $params)
    {
        return $this->sendRequest('post', 'peisong/test/shopStatusCallback', $params);
    }

    /**
     * 模拟门店配送范围变更
     *
     * @param array $params
     * @return mixed
     * @throws \Cblink\HyperfMeituan\Kernel\Exception\MeituanException
     */
    public function testShopAreaCallback(array $params)
    {
        return $this->sendRequest('post', 'test/shop/area/callback', $params);
    }

    /**
     * 模拟门店配送风险等级变更
     *
     * @param array $params
     * @return mixed
     * @throws \Cblink\HyperfMeituan\Kernel\Exception\MeituanException
     */
    public function testShopDeliveryRiskLevelCallback(array $params)
    {
        return $this->sendRequest('post', 'test/shop/deliveryRiskLevel/callback', $params);
    }
}

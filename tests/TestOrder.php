<?php


use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;

class TestOrder extends TestCase
{
    protected $meituanApp;

    protected function setUp(): void
    {
        parent::setUp();

        $config = require 'testConfig.php';
        $developerId = $config['developerId'];
        $secret = $config['secret'];
        $this->meituanApp = new \Cblink\HyperfMeituan\MeituanApp([
            'developerId' => $developerId,
            'secret' => $secret,
        ]);
    }

    public function testOrderCheck()
    {
        $lat = '44.918119';
        $lng = '111.940749';
        $response = $this->meituanApp->delivery->checkOrder([
            'shop_id' => 'test_0001',
            'delivery_service_code' => '4013',
            'receiver_address' => 'test大厦',
            'receiver_lng' => (int)($lng * pow(10, 6)),
            'receiver_lat' => (int)($lat * pow(10, 6)),
            'check_type' => 1,
            'mock_order_time' => time(),
        ]);

        var_dump($response);
    }

    public function testOrderByShop()
    {
        $lat = '22.538122';
        $lng = '113.957587';
        $groupId = '60';
        $goods[] = [
            'goodCount' => 1,
            'goodName' => 'test商品',
            'goodPrice' => '1.01'
        ];

        $orders = [
            'shop_id' => 'test_0001',
            'delivery_id' => '426477450942210049',
            'order_id' => '636a3a7f824977a97251e3cf6799cde6',
            'outer_order_source_desc' => '202',
            'delivery_service_code' => '100030',
            'receiver_name' => 'test',
            'receiver_address' => '广东省深圳市粤海街道办长虹科技大厦',
            'receiver_phone' => '13900000000',
            'receiver_lng' => 113957587,
            'receiver_lat' => 22538122,
            'pay_type_code' => 0,
            'goods_value' => '1.01',
            'goods_weight' => 2,
            'goods_detail' => json_encode(['goods' => $goods]),
        ];

        $response = $this->meituanApp->delivery->preCreateByShop($orders);

        var_dump($response);
    }

}
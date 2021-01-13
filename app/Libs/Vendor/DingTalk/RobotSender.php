<?php
/**
 * 机器人推送器
 * User: Woozee
 * Date: 2020/12/16
 * Time: 14:25
 */

namespace App\Libs\Vendor\DingTalk;

use App\Libs\Vendor\DingTalk\Exceptions\HttpException;
use App\Libs\Vendor\DingTalk\Message\TextMessage;
use GuzzleHttp\Client;

class RobotSender
{
    protected Config $config;
    protected Client $client;

    public function __construct(Config $config)
    {
        $this->config = $config;
        $this->client = new Client;
    }

    /**
     * 发送text类型信息
     *
     * @param TextMessage $message
     * @throws HttpException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function sendText(TextMessage $message): void
    {
        $this->send($message);
    }

    /**
     * 发送消息
     *
     * @param $message
     * @throws HttpException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    protected function send($message): void
    {
        $resp = $this->client->post($this->getRobotUrl(), [
            'body' => json_encode($message),
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'verify' => false,
        ]);
        $respContent = $resp->getBody()->getContents();
        if ($resp->getStatusCode() !== 200) {
            throw new HttpException($respContent);
        }
    }

    protected function getRobotUrl(): string
    {
        $query['access_token'] = $this->config->accessToken;
        $timestamp = time() . sprintf('%03d', rand(1, 999));
        $sign = hash_hmac('sha256', "$timestamp\n{$this->config->secret}", $this->config->secret, true);
        $query['timestamp'] = $timestamp;
        $query['sign'] = base64_encode($sign);

        return $this->config->url . "?" . http_build_query($query);
    }
}

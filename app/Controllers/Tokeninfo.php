<?php

namespace App\Controllers;

use CodeIgniter\Entity\Entity;
use CodeIgniter\I18n\Time;
use Config\BscTokenConfig;
use Goutte\Client;
use Symfony\Component\HttpClient\HttpClient;

class Tokeninfo extends BaseController
{
    public function update()
    {
        $DIR_PATH = WRITEPATH . 'files';
        $FILE_PATH = $DIR_PATH . '/info.json';

        if (!file_exists($DIR_PATH)) {
            mkdir($DIR_PATH);
        }

        $tokenConfig = new BscTokenConfig();

        $tokenData = new Entity();
        $tokenData->contract_address = $tokenConfig->address;
        $tokenData->name = '';
        $tokenData->symbol = '';

        $tokenData->total_supply = 0;
        $tokenData->total_holder = 0;

        $tokenData->price = 0;
        $tokenData->price_updated_at = 0;
        $tokenData->total_transfer = 0;
        $tokenData->marketcap = 0;

        try {
            $tokenConfig = new BscTokenConfig();
            $contractAddress = $tokenConfig->address;

            $client = new \GuzzleHttp\Client();
            $response = $client->request('GET', "https://api.pancakeswap.info/api/v2/tokens/$contractAddress");
            $tokenInfo = json_decode($response->getBody());
            $price = $tokenInfo->data->price;

            $lastPriceUpdate = Time::createFromTimestamp($tokenInfo->updated_at / 1000);
            $tokenName = $tokenInfo->data->name;
            $tokenSymbol = $tokenInfo->data->symbol;
            $price = $this->tofloat($price);

            $client = new Client(HttpClient::create(['timeout' => 60]));
            $crawler = $client->request('GET', "https://bscscan.com/token/$contractAddress");

            $content = $crawler->getNode(0)->textContent;
            $sid = string($content)->between('var sid =', ';')->trim()->replace("'", "");

            $totalCrawler = $crawler->filter('#ContentPlaceHolder1_hdnTotalSupply');
            $totalSupply = $totalCrawler->getNode(0)->attributes->getNamedItem('value')->value;
            $totalSupply = $this->tofloat($totalSupply);

            $crawler = $crawler->filter('#ContentPlaceHolder1_tr_tokenHolders .mr-3');
            $content = $crawler->getNode(0)->textContent;

            $totalHolder = string($content)->segment(" ", 0)->trim() . "";
            $totalHolder = $this->tofloat($totalHolder);

            $marketCap = $totalSupply * $price;

            $crawler = $client->request("GET", "https://bscscan.com/token/generic-tokentxns2?m=normal&contractAddress=$contractAddress&a=&sid=$sid&p=1");
            $content = $crawler->getNode(0)->textContent;

            $totalTransfer = string($content)->between('var totaltxns =', ';')->trim()->replace("'", "") . "";
            $totalTransfer = $this->tofloat($totalTransfer);

            $tokenData->contract_address = $contractAddress;
            $tokenData->name = $tokenName;
            $tokenData->symbol = $tokenSymbol;

            $tokenData->total_supply = $totalSupply;
            $tokenData->total_holder = $totalHolder;

            $tokenData->price = $price;
            $tokenData->price_updated_at = $lastPriceUpdate->getTimestamp();
            $tokenData->total_transfer = $totalTransfer;
            $tokenData->marketcap = $marketCap;

            // $contents = file_get_contents($FILE_PATH);
            // var_dump(json_decode($contents, true));
            // log_message('info', 'update token success');
        } catch (\Throwable $th) {
            log_message('error', 'update token data failed');
        }

        file_put_contents($FILE_PATH, json_encode($tokenData));
    }

    private function tofloat($num)
    {
        $result = (float)filter_var($num, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        return $result;
    }
}

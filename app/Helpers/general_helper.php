<?php

use CodeIgniter\Entity\Entity;
use CodeIgniter\Files\File;
use CodeIgniter\I18n\Time;
use Config\BscTokenConfig;

/**
 * Get token info
 *
 * @return Entity
 */
function getTokenInfo()
{
    $tokenConfig = new BscTokenConfig();

    $tokenEntity = new Entity();
    $tokenEntity->contract_address = $tokenConfig->address;
    $tokenEntity->name = $tokenConfig->name;
    $tokenEntity->symbol = $tokenConfig->symbol;

    $tokenEntity->total_supply = 0;
    $tokenEntity->total_holder = 0;

    $tokenEntity->price = 0;
    $tokenEntity->price_updated_at = 0;
    $tokenEntity->total_transfer = 0;
    $tokenEntity->marketcap = 0;

    if (!$tokenInfoCache = cache('token_info')) {
        $filePath = WRITEPATH . 'files/info.json';
        try {

            new File($filePath, true);
            $fileContent = file_get_contents($filePath);
            $tokenInfo = json_decode($fileContent, true);
            $tokenEntity->fill($tokenInfo);

            cache()->save('token_info', $tokenInfo, 120);
        } catch (\Throwable $th) {
        }
    } else {
        $tokenEntity->fill($tokenInfoCache);
    }

    $tokenEntity->last_price_update = Time::createFromTimestamp($tokenEntity->price_updated_at)->humanize();

    return $tokenEntity;
}

<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerShop\Yves\MerchantRelationshipPage\Reader;

use Generated\Shared\Transfer\MerchantStorageCriteriaTransfer;
use Generated\Shared\Transfer\MerchantStorageTransfer;
use SprykerShop\Yves\MerchantRelationshipPage\Dependency\Client\MerchantRelationshipPageToMerchantStorageClientInterface;

class MerchantStorageReader implements MerchantStorageReaderInterface
{
    /**
     * @var \SprykerShop\Yves\MerchantRelationshipPage\Dependency\Client\MerchantRelationshipPageToMerchantStorageClientInterface
     */
    protected MerchantRelationshipPageToMerchantStorageClientInterface $merchantStorageClient;

    public function __construct(MerchantRelationshipPageToMerchantStorageClientInterface $merchantStorageClient)
    {
        $this->merchantStorageClient = $merchantStorageClient;
    }

    public function findMerchantByIdMerchant(int $idMerchant): ?MerchantStorageTransfer
    {
        $merchantStorageCriteriaTransfer = (new MerchantStorageCriteriaTransfer())
            ->addMerchantId($idMerchant);

        $merchantStorageTransfers = $this->merchantStorageClient->get($merchantStorageCriteriaTransfer);

        return reset($merchantStorageTransfers) ?: null;
    }
}

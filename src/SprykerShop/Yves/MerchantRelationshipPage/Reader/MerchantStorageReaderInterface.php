<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerShop\Yves\MerchantRelationshipPage\Reader;

use Generated\Shared\Transfer\MerchantStorageTransfer;

interface MerchantStorageReaderInterface
{
    public function findMerchantByIdMerchant(int $idMerchant): ?MerchantStorageTransfer;
}

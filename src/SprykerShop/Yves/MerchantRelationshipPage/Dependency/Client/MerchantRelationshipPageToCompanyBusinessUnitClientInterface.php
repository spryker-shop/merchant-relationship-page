<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerShop\Yves\MerchantRelationshipPage\Dependency\Client;

use Generated\Shared\Transfer\CompanyBusinessUnitCollectionTransfer;
use Generated\Shared\Transfer\CompanyBusinessUnitCriteriaFilterTransfer;

interface MerchantRelationshipPageToCompanyBusinessUnitClientInterface
{
    public function getCompanyBusinessUnitCollection(
        CompanyBusinessUnitCriteriaFilterTransfer $companyBusinessUnitCriteriaFilterTransfer
    ): CompanyBusinessUnitCollectionTransfer;
}

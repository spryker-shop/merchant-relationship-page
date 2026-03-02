<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerShop\Yves\MerchantRelationshipPage;

use Spryker\Shared\Application\ApplicationConstants;
use Spryker\Yves\Kernel\AbstractFactory;
use SprykerShop\Yves\MerchantRelationshipPage\Dependency\Client\MerchantRelationshipPageToCompanyBusinessUnitClientInterface;
use SprykerShop\Yves\MerchantRelationshipPage\Dependency\Client\MerchantRelationshipPageToCompanyUserClientInterface;
use SprykerShop\Yves\MerchantRelationshipPage\Dependency\Client\MerchantRelationshipPageToMerchantRelationshipClientInterface;
use SprykerShop\Yves\MerchantRelationshipPage\Dependency\Client\MerchantRelationshipPageToMerchantSearchClientInterface;
use SprykerShop\Yves\MerchantRelationshipPage\Dependency\Client\MerchantRelationshipPageToMerchantStorageClientInterface;
use SprykerShop\Yves\MerchantRelationshipPage\Form\DataProvider\MerchantRelationshipSearchFormDataProvider;
use SprykerShop\Yves\MerchantRelationshipPage\Form\Handler\MerchantRelationshipSearchHandler;
use SprykerShop\Yves\MerchantRelationshipPage\Form\Handler\MerchantRelationshipSearchHandlerInterface;
use SprykerShop\Yves\MerchantRelationshipPage\Form\MerchantRelationshipSearchForm;
use SprykerShop\Yves\MerchantRelationshipPage\Reader\CompanyBusinessUnitReader;
use SprykerShop\Yves\MerchantRelationshipPage\Reader\CompanyBusinessUnitReaderInterface;
use SprykerShop\Yves\MerchantRelationshipPage\Reader\CompanyUserReader;
use SprykerShop\Yves\MerchantRelationshipPage\Reader\CompanyUserReaderInterface;
use SprykerShop\Yves\MerchantRelationshipPage\Reader\MerchantSearchReader;
use SprykerShop\Yves\MerchantRelationshipPage\Reader\MerchantSearchReaderInterface;
use SprykerShop\Yves\MerchantRelationshipPage\Reader\MerchantStorageReader;
use SprykerShop\Yves\MerchantRelationshipPage\Reader\MerchantStorageReaderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;

/**
 * @method \SprykerShop\Yves\MerchantRelationshipPage\MerchantRelationshipPageConfig getConfig()
 */
class MerchantRelationshipPageFactory extends AbstractFactory
{
    public function getMerchantRelationshipSearchForm(): FormInterface
    {
        return $this->getFormFactory()->create(
            MerchantRelationshipSearchForm::class,
            null,
            $this->createMerchantRelationshipSearchFormDataProvider()->getOptions(),
        );
    }

    public function createMerchantRelationshipSearchFormDataProvider(): MerchantRelationshipSearchFormDataProvider
    {
        return new MerchantRelationshipSearchFormDataProvider(
            $this->createMerchantSearchReader(),
            $this->createCompanyBusinessUnitReader(),
            $this->createCompanyUserReader(),
            $this->getConfig(),
        );
    }

    public function createMerchantRelationshipSearchHandler(): MerchantRelationshipSearchHandlerInterface
    {
        return new MerchantRelationshipSearchHandler(
            $this->getMerchantRelationshipClient(),
            $this->createCompanyUserReader(),
        );
    }

    public function createMerchantStorageReader(): MerchantStorageReaderInterface
    {
        return new MerchantStorageReader(
            $this->getMerchantStorageClient(),
        );
    }

    public function createCompanyBusinessUnitReader(): CompanyBusinessUnitReaderInterface
    {
        return new CompanyBusinessUnitReader(
            $this->getCompanyBusinessUnitClient(),
        );
    }

    public function createMerchantSearchReader(): MerchantSearchReaderInterface
    {
        return new MerchantSearchReader(
            $this->getMerchantSearchClient(),
        );
    }

    public function createCompanyUserReader(): CompanyUserReaderInterface
    {
        return new CompanyUserReader(
            $this->getCompanyUserClient(),
        );
    }

    public function getFormFactory(): FormFactoryInterface
    {
        return $this->getProvidedDependency(ApplicationConstants::FORM_FACTORY);
    }

    public function getMerchantRelationshipClient(): MerchantRelationshipPageToMerchantRelationshipClientInterface
    {
        return $this->getProvidedDependency(MerchantRelationshipPageDependencyProvider::CLIENT_MERCHANT_RELATIONSHIP);
    }

    public function getCompanyUserClient(): MerchantRelationshipPageToCompanyUserClientInterface
    {
        return $this->getProvidedDependency(MerchantRelationshipPageDependencyProvider::CLIENT_COMPANY_USER);
    }

    public function getCompanyBusinessUnitClient(): MerchantRelationshipPageToCompanyBusinessUnitClientInterface
    {
        return $this->getProvidedDependency(MerchantRelationshipPageDependencyProvider::CLIENT_COMPANY_BUSINESS_UNIT);
    }

    public function getMerchantStorageClient(): MerchantRelationshipPageToMerchantStorageClientInterface
    {
        return $this->getProvidedDependency(MerchantRelationshipPageDependencyProvider::CLIENT_MERCHANT_STORAGE);
    }

    public function getMerchantSearchClient(): MerchantRelationshipPageToMerchantSearchClientInterface
    {
        return $this->getProvidedDependency(MerchantRelationshipPageDependencyProvider::CLIENT_MERCHANT_SEARCH);
    }
}

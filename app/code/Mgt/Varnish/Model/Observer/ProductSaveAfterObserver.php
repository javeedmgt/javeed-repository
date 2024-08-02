<?php
 namespace Mgt\Varnish\Model\Observer; use Magento\Framework\Event\ObserverInterface; class ProductSaveAfterObserver implements ObserverInterface { protected $config; protected $productUrlRewriteGenerator; protected $catalogProductTypeConfigurable; protected $productFactory; protected $varnishConfig; protected $urlQueue; protected static $isQueued = false; public function __construct(\Magento\PageCache\Model\Config $config, \Magento\CatalogUrlRewrite\Model\ProductUrlRewriteGenerator $productUrlRewriteGenerator, \Magento\ConfigurableProduct\Model\ResourceModel\Product\Type\Configurable $catalogProductTypeConfigurable, \Magento\Catalog\Model\ProductFactory $productFactory, \Mgt\Varnish\Model\UrlQueue $urlQueue, \Mgt\Varnish\Model\Cache\Config $varnishConfig) { goto D7620; F1a3f: $this->urlQueue = $urlQueue; goto d134b; d134b: $this->varnishConfig = $varnishConfig; goto E850e; f86f9: $this->productFactory = $productFactory; goto F1a3f; b68d0: $this->catalogProductTypeConfigurable = $catalogProductTypeConfigurable; goto f86f9; Fee8a: $this->productUrlRewriteGenerator = $productUrlRewriteGenerator; goto b68d0; D7620: $this->config = $config; goto Fee8a; E850e: } public function execute(\Magento\Framework\Event\Observer $observer) { goto c1c5e; fc200: $productId = $product->getId(); goto Afbfd; eeb1b: C4304: goto e37d1; Be3a5: $isCacheWarmerEnabled = $this->varnishConfig->isCacheWarmerEnabled(); goto E1c6d; c1c5e: $product = $observer->getEvent()->getProduct(); goto Be3a5; cb449: a82cf: goto A1aa8; B6256: if (!count($parentProductIds)) { goto a317c; } goto e8b77; Bff6b: $productUrls = $this->productUrlRewriteGenerator->generate($product); goto Bc567; d7131: Cc1c2: goto cb449; A1aa8: if (!count($urls)) { goto d20e1; } goto e618a; a3e6d: d20e1: goto eeb1b; e618a: try { $this->urlQueue->addToQueue($urls); } catch (\Exception $e) { } goto a3e6d; B175b: e83a9: goto e146f; B484c: goto a82cf; goto B175b; E1c6d: if (!(true === $isCacheWarmerEnabled && isset($product) && $product instanceof \Magento\Catalog\Model\Product)) { goto C4304; } goto Bff6b; Ba419: if (false === empty($productUrls)) { goto e83a9; } goto fc200; de1a7: Cafea: goto e032e; e032e: a317c: goto B484c; Bc567: $urls = []; goto Ba419; Afbfd: $parentProductIds = $this->catalogProductTypeConfigurable->getParentIdsByChild($productId); goto B6256; e8b77: foreach ($parentProductIds as $parentProductId) { goto bdd55; bdd55: $product = $this->productFactory->create(); goto F6377; a9553: $productUrls = $this->productUrlRewriteGenerator->generate($product); goto b2e41; dba71: d149c: goto dc5cc; F6377: $product->load($parentProductId); goto a9553; dc5cc: ec88e: goto fe5c3; b2e41: foreach ($productUrls as $url) { $urls[] = ["\x73\x74\157\162\x65\137\151\144" => $url->getStoreId(), "\160\x61\x74\150" => $url->getRequestPath(), "\x70\x72\151\157\162\x69\164\x79" => \Mgt\Varnish\Model\UrlQueue::PRIORITY_HIGH]; b1fd2: } goto dba71; fe5c3: } goto de1a7; e146f: foreach ($productUrls as $url) { $urls[] = ["\x73\x74\157\162\145\137\151\144" => $url->getStoreId(), "\160\x61\164\x68" => $url->getRequestPath(), "\x70\x72\151\x6f\x72\151\x74\171" => \Mgt\Varnish\Model\UrlQueue::PRIORITY_HIGH]; f36e9: } goto d7131; e37d1: } }

<?php
 namespace Mgt\Varnish\Block\Adminhtml\Cache\Purge; class Management extends \Magento\Backend\Block\Template { protected $varnishConfig; protected $config; public function __construct(\Magento\Backend\Block\Template\Context $context, \Magento\Framework\App\Config $config, \Mgt\Varnish\Model\Cache\Config $varnishConfig, array $data = []) { goto d3200; D6b4f: $this->varnishConfig = $varnishConfig; goto Fea2b; d3200: parent::__construct($context, $data); goto B534a; B534a: $this->config = $config; goto D6b4f; Fea2b: } public function getWebsites() { return $this->_storeManager->getWebsites(); } public function getStoreGroups(\Magento\Store\Model\Website $website) { return $website->getGroups(); } public function getStores(\Magento\Store\Model\Group $group) { goto dfd23; Db243: return $stores; goto c8f9a; dfd23: $stores = $group->getStores(); goto cba42; Ebbd0: C1e8e: goto Bccb4; Bccb4: D234a: goto Db243; cba42: if (!($storeIds = $this->getStoreIds())) { goto D234a; } goto d1434; d1434: foreach (array_keys($stores) as $storeId) { goto D3c04; D3c04: if (in_array($storeId, $storeIds)) { goto f9c2f; } goto F9ce7; F9ce7: unset($stores[$storeId]); goto a783d; a783d: f9c2f: goto f22bf; f22bf: c6042: goto b3c5c; b3c5c: } goto Ebbd0; c8f9a: } public function getStoreBaseUrl(\Magento\Store\Model\Store $store) { $storeBaseUrl = $this->config->getValue("\167\145\142\57\x75\x6e\163\145\143\x75\162\145\57\142\x61\x73\x65\137\x75\x72\x6c", \Magento\Store\Model\ScopeInterface::SCOPE_STORE, $store); return $storeBaseUrl; } public function getStorePurgeUrl(\Magento\Store\Model\Store $store) { $storePurgeUrl = $this->getUrl("\x6d\147\164\166\x61\x72\156\151\163\x68\57\x70\x75\x72\x67\x65\57\x61\x63\x74\151\157\156", ["\163\164\157\x72\145\137\151\x64" => $store->getStoreId()]); return $storePurgeUrl; } public function getSinglePurgeActionUrl() { $singlePurgeActionUrl = $this->getUrl("\x6d\x67\164\166\x61\x72\156\151\163\150\57\160\165\162\x67\x65\x2f\163\151\x6e\x67\x6c\x65"); return $singlePurgeActionUrl; } }

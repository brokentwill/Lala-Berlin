<?php
/**
 * @category   MoreSleep
 * @package    Lala
 * @author     Thomas Michelbach <thomas@moresleep.net>
 */

class MoreSleep_Lala_Model_Export extends Varien_Object{

	protected $exportCustomerStructure = array(
		"Satzart" => "WebShop_Kunde",
		"Kunden-Nr" => "",
		"kurzname" => "",
		"Name_1" => "",
		"Name_3" => "",
		"Name" => "",
		"Strasse" => "",
		"plz" => "",
		"Ort" => "",
		"Telefon" => "",
		"mwst" => "",
		"Fax" => "",
		"email" => "",
		"iso_3166_A2Land" => "DE",
		"Zahlungsart" => "",
		"Bank" => "",
		"Blz" => "",
		"Konto" => "",
		"username" => "",
		"password" => "",
		"customers_hash" => "",
		"zahlungsart_id" => "",
		"Name_2" => "",
		"webshopname" => "",
		"inhaber" => "",
		"geburtstag" => "",
		"Geschlecht" => "",
	);

	protected $exportOrderStructure = array(
		"Art" => "H",
		"GLN_Absender" => "webshop",
		"GLN_Empfaenger" => "",
		"Nachrichtentyp" => "ORDERS",
		"Version" => "D",
		"Freigabenummer" => "",
		"Auftragsart" => "",
		"Zusatztext" => "",
		"Auftragsnummer" => "",
		"auftragsdatum" => "",
		"Gewuenschter_Liefertermin" => "",
		"Lieferdatum_von" => "",
		"Lieferdatum_bis" => "",
		"Auftragsanweisung" => "",
		"Rahmenauftragsnummer" => "",
		"GLN BY" => "",
		"Einkaufsabteilung" => "",
		"GLN SU" => "",
		"Ansprechpartner" => "",
		"Zus_Partneridentifikation" => "",
		"GLN DP" => "",
		"GLN IV" => "",
		"GLN UC" => "",
		"Waehrung" => "EUR",
		"Positionsnummer" => "",
		"GTIN/EAN" => "",
		"Lieferanten_Artikel_Nr" => "",
		"Kaeufer_Artikel_Nr" => "",
		"Menge" => "",
		"Einheit" => "",
		"Nettopreis" => "",
		"Bruttopreis" => "",
		"Verpackungsart" => "",
		"Fehler" => "",
		"Nachrichtenname" => "",
		"vertreter1_nr" => "",
		"farb_nr" => "",
		"groesse" => "",
		"Vertreter2_nr" => "",
		"Vertreter3_nr" => "",
		"Lager_Nr" => "200",
		"Positions_zusatztext" => "",
		"Groessen_pos" => "",
		"Zahlungsart_ID" => "",
		"saison_nr" => "",
		"auftragsbezeichnung" => "",
		"position_bemerkung" => "",
		"Frachtkosten (cost of freight)" => "",
		"Versandart_ID" => "",
		"pg_kunden_artikel_nummer" => "",
		"valutadatum" => "",
		"bestellung_zuordnung" => "",
		"zweck_intern" => "",
		"Bearbeitungskosten" => "",
		"Verpackungskosten" => "",
		"VK-Preis" => "",
		"Kunden_Nr" => "",
		"Lot_Nr" => "",
		"Auto_LS" => "",
		"Auto_LS_Druck" => "",
		"hauptwarengruppen_nr" => "",
		"warengruppen_nr" => "",
		"rabatt_1" => "",
		"rabatt_2" => "",
		"gus_id" => "",
		"gus_wert" => "",
		"imported" => "",
		"order_id" => "",
		"gutschein" => "",
		"ihre_pos_nr" => "",
		"liefersperre" => ""
	);

	protected $exportOrderPositionStructure = array(
		"Art" => "",
		"GLN_Absender" => "",
		"GLN_Empfaenger" => "",
		"Nachrichtentyp" => "",
		"Version" => "",
		"Freigabenummer" => "",
		"Auftragsart" => "",
		"Zusatztext" => "",
		"Auftragsnummer" => "",
		"Auftragsdatum" => "",
		"Gewuenschter_Liefertermin" => "",
		"Lieferdatum_vom" => "",
		"Lieferdatum_bis" => "",
		"Auftragsanweisung" => "",
		"Rahmenauftragsnummer" => "",
		"GLN BY" => "",
		"Einkaufsabteilung" => "",
		"GLN SU" => "",
		"Ansprechpartner" => "",
		"Zus_Partneridentifikation" => "",
		"GLN DP" => "",
		"GLN IV" => "",
		"GLN UC" => "",
		"Waehrung" => "",
		"Positionsnummer" => "",
		"GTIN/EAN" => "",
		"Lieferanten_Artikel_Nr (article number)" => "",
		"kaeufer_artikel_nr" => "",
		"Menge" => "",
		"Einheit" => "",
		"Nettopreis" => "",
		"Bruttopreis" => "",
		"Verpackungsart" => "",
		"Fehler" => "",
		"Nachrichtenname" => "",
		"Vertreter1_nr" => "",
		"farb_nr (colour number)" => "",
		"groesse (size)" => "",
		"Vertreter2_nr" => "",
		"Vertreter3_nr" => "",
		"Lager_Nr" => "200",
		"Positions_zusatztext" => "",
		"Groessen_pos" => "",
		"Zahlungsart_ID" => "",
		"saison_nr" => "",
		"auftragsbezeichnung" => "",
		"position_bemerkung" => "",
		"Frachtkosten" => "",
		"Versandart_ID" => "",
		"pg_kunden_artikel_nummer" => "",
		"valutadatum" => "",
		"bestellung_zuordnung" => "",
		"zweck_intern" => "",
		"Bearbeitungskosten" => "",
		"Verpackungskosten" => "",
		"VK-Preis" => "",
		"Kunden_Nr" => "",
		"Lot_Nr" => "",
		"Auto_LS" => "",
		"Auto_LS_Druck" => "",
		"hauptwarengruppen_nr" => "",
		"warengruppen_nr" => "",
		"rabatt_1" => "",
		"rabatt_2" => "",
		"gus_id" => "",
		"gus_wert" => "",
		"imported" => "",
		"order_id" => "",
		"gutschein" => "",
		"ihre_pos_nr" => ""
	);
	
	protected function getLastExport(){
		$lastExportedAt = Mage::getSingleton('core/resource')->getConnection('core_write')->fetchCol("SELECT created_at FROM moresleep_lala_export ORDER BY id DESC LIMIT 1");
		return ($lastExportedAt != array()) ? $lastExportedAt[0] : "0000-00-00 00:00:00";
	}

	public function run(){
		$customers = array();
		$orders = array();

		$from = $this->getLastExport();
		$to = date("Y-m-d H:i:s");

		foreach(Mage::getModel("sales/order")->getCollection() as $order){
			/* Customer exported ? */
			$guests = Mage::getModel("sales/order")->getCollection()->addFieldToFilter("created_at", array("from" => "2013-01-01 00:00:00", "to" =>  $order->getCreatedAt()))->addFieldToFilter("customer_id", array("null" => true));
			$uniqueCustomers = Mage::getModel("sales/order")->getCollection()->addAttributeToSelect("customer_id")->addFieldToFilter("created_at", array("from" => "2013-01-01 00:00:00", "to" => $order->getCreatedAt()))->addFieldToFilter("customer_id", array("notnull" => true));
			$uniqueCustomers->getSelect()->group("customer_id")->reset(Zend_Db_Select::GROUP)->columns("COUNT(DISTINCT customer_id) AS size");
			$customerId = 100003 + $guests->getSize() + $uniqueCustomers->getFirstItem()->getSize();
			if($order->getCustomerId()){
				$customer = Mage::getModel("customer/customer")->load($order->getCustomerId());
				if($customer->getErpId() == ""){
					$customer->setErpId($customerId);
					$customer->getResource()->saveAttribute($customer, "erp_id"); 
				}else{
					$customerId = $customer->getErpId();
				}
			}
			if((strtotime($order->getCreatedAt()) >= strtotime($from)) && (strtotime($order->getCreatedAt()) <= strtotime($to))){
				$customers[] = array_merge($this->exportCustomerStructure, array(
					"Kunden-Nr" => $customerId,
	 				"Name_2" => $order->getCustomerGender(),
	 				"Name" => $order->getCustomerName(),
	 				"Strasse" => join(" ", $order->getShippingAddress()->getStreet()),
	 				"plz" => $order->getShippingAddress()->getPostcode(),
	 				"Ort" => $order->getShippingAddress()->getCity(),
	 				"email" => $order->getCustomerEmail(),
	 				"zahlungsart_id" => "24"
				));
			}
			/* Order exported? */
			if((strtotime($order->getCreatedAt()) >= strtotime($from)) && (strtotime($order->getCreatedAt()) <= strtotime($to))){
				$orders[] = array_merge($this->exportOrderStructure, array(
					"Art" => "H",
					"Auftragsnummer" => $order->getIncrementId(),
					"Kunden_Nr" => $customerId
				));
				$position = 1;
				foreach($order->getAllItems() as $item){
					if($item->getProduct()->getTypeId() == "simple"){
						$sku = explode("_", $item->getSku());
						$product = Mage::getModel("catalog/product")->load($item->getProductId());
						$orders[] = array_merge($this->exportOrderPositionStructure, array(
							"Art" => "P",
							"Positionsnummer" => ($position),
							"Lieferanten_Artikel_Nr (article number)" => $sku[0],
							"farb_nr (colour number)" => $sku[1],
							"groesse (size)" => (empty($sku[2]) ? "OS" : $sku[2]),
							"Menge" => intval($item->getQtyOrdered()),
							"Nettopreis" => str_replace(".", ",", $product->getPrice()),
							"Bruttopreis" => str_replace(".", ",", $product->getPrice())
						));
						$position++;
					}
				}
			}
			/* Refunds exported? */
			foreach($order->getAllItems() as $item){
				if($item->getProduct()->getTypeId() == "simple"){
					$sku = explode("_", $item->getSku());
					if($item->getQtyRefunded() > 0){
						foreach($order->getCreditmemosCollection() as $refund){
							if((strtotime($refund->getCreatedAt()) >= strtotime($from)) && (strtotime($refund->getCreatedAt()) <= strtotime($to))){
								$orders[] = array_merge($this->exportOrderStructure, array(
									"Art" => "H",
									"Auftragsnummer" => $order->getIncrementId(),
									"Kunden_Nr" => $customerId
								));
								$position = 1;
								foreach($refund->getItemsCollection() as $refundedItem){
									if($refundedItem->getProductId() == $item->getProductId()){
										$product = Mage::getModel("catalog/product")->load($item->getProductId());
										$orders[] = array_merge($this->exportOrderPositionStructure, array(
											"Art" => "P",
											"Positionsnummer" => ($position),
											"Lieferanten_Artikel_Nr (article number)" => $sku[0],
											"farb_nr (colour number)" => $sku[1],
											"groesse (size)" => (empty($sku[2]) ? "OS" : $sku[2]),
											"Menge" => (intval($refundedItem->getQty()) * -1),
											"Nettopreis" => str_replace(".", ",", $product->getPrice()),
											"Bruttopreis" => str_replace(".", ",", $product->getPrice())
										));
										$position++;
									}
								}
							}
						}
					}
				}
			}
		}
		$this->save($customers, $orders);	
	}

	protected function save($customers=array(), $orders=array()){
		$log = array("CUSTOMER" => "", "ORDER" => "");
		foreach(array("CUSTOMER" => $customers, "ORDER" => $orders) as $filename => $rows){
			if(count($rows) > 0){
				$tsv = array();
				foreach($rows as $row){
					$tsv[] = join("\t", $row);
				}
				$log[$filename] = join("\r\n", $tsv);
				file_put_contents(Mage::getBaseDir("base") . "/var/export/" . $filename . "_" . date("Ymd_His") . ".txt", $log[$filename]);
			}
		}
		Mage::getSingleton('core/resource')->getConnection('core_write')->query("INSERT INTO moresleep_lala_export (created_at, customers, orders) VALUES ('" . date("Y-m-d H:i:s") . "', '" . $log["CUSTOMER"] . "', '" . $log["ORDER"] . "')");
	}

	protected function install(){
		$setup = new Mage_Eav_Model_Entity_Setup('core_setup');
		$setup->addAttribute('customer', 'erp_id', array(
		    'label'     => 'ERP',
		    'type'      => 'int',
		    'input'     => 'text',
		    'visible'   => true,
		    'required'  => false,
		    'position'  => 1,
	    ));
		$eavConfig = Mage::getSingleton('eav/config');
		$attribute = $eavConfig->getAttribute('customer', 'erp_id');
		$attribute->setData('used_in_forms', array('adminhtml_customer'));
		$attribute->save();
	}

}
?>
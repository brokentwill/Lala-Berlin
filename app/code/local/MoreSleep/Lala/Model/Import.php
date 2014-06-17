<?php
/**
 * @category   MoreSleep
 * @package    Lala
 * @author     Thomas Michelbach <thomas@moresleep.net>
 */

class MoreSleep_Lala_Model_Import extends Varien_Object{
	
	protected $import = array(
		'Export_artikel.txt' => array('artikel_id', '_artikel_nr', 'name', 'gtin', 'color', 'color_name', 'size', 'vk', 'price', 'pfad_bild', 'hwg_nr', 'hwg', 'wg_nr', 'wg', 'gr_pos', 'agroesse', 'sonderaktion', 'topartikel', 'neueingetroffen', 'b2b', 'b2c', 'infotext', 'rabattaktiv', 'weight', 'saison_nr', 'stoffart', 'Modell_nr', 'modell_bezeichnung', 'groessenstaffel_id', 'b2c_darstellung', 'b2c_discount', 'b2c_highlight', 'aktionsartikel', 'lager_nr', 'mwst'),
		'export_farbstaffel.txt' => array('_Nr', 'Bezeichnung', 'RGB', 'RGB2'),
		'export_groessenstaffel.txt' => array('id', '_nr', 'pos', 'bezeichnung', 'hinweis', 'groesse', 'agroesse', 'extra_groesse'),
		'Export_lager.txt' => array('_lager', 'artikel_id', 'farbe', 'groesse', 'gtin', 'qty', 'artikel_nr', 'bestellbestand', 'lagerbestand', 'dispo_sperre'),
		'export_preisliste.txt' => array('_preisstaffel_nr', 'artikel_id', 'farb_nr', 'groesse', 'vk_preis', 'aktionspreis', 'von_datum', 'bis_datum', 'staffel_1', 'staffel_2', 'staffel_3', 'staffel_4', 'staffel_5', 'vk_1', 'vk_2', 'vk_3', 'vk_4', 'vk_5', 'rabatt_1', 'empfohlener_VK'),
		'export_qualitaet.txt' => array('_Artikel_nr', 'qualitaet_nr', 'bezeichnung', 'hinweis', 'sprache'),
		'export_warengruppe.txt' => array('_HWG_Nr', 'HWG_Bezeichnung', 'wg_nr', 'wg_bezeichnung') 
	);

	protected $importCategories = array(
		'Accessoires,Caps' => '2',
		'Accessoires,Cube' => '2',
		'Accessoires,Scarf' => '2',
		'Accessoires,Shoes' => '2',
		'Accessoires,Triangle' => '2',
		'Accessoires,Tubes' => '2',
		'DOB,Big Shirt' => '2',
		'DOB,Blouse' => '2',
		'DOB,Caftan' => '2',
		'DOB,Cardigan' => '2',
		'DOB,Coat' => '2',
		'DOB,Dress' => '2',
		'DOB,Jacket' => '2',
		'DOB,Jumper' => '2',
		'DOB,Shirt' => '2',
		'DOB,Shorts' => '2',
		'DOB,Skirt' => '2',
		'DOB,Sweatshirt' => '2',
		'DOB,T-Shirt' => '2',
		'DOB,Top' => '2',
		'DOB,Trousers' => '2',
		'DOB,Vest' => '2',
		'HAKA,T-Shirt' => '2'
	);

	protected $importStructure = array(
		'store' => 'admin',
		'websites' => 'base',
		'attribute_set' => 'Lala',
		'type' => '',
		'category_ids' => '',
		'sku' => '',
		'has_options' => '0',
		'name' => '',
		'meta_title' => '',
		'meta_description' => '',
		'image' => '',
		'small_image' => '',
		'thumbnail' => '',
		'url_key' => '',
		'url_path' => '',
		'custom_design' => '',
		'page_layout' => 'No layout updates',
		'options_container' => 'Product Info Column',
		'image_label' => '',
		'small_image_label' => '',
		'thumbnail_label' => '',
		'country_of_manufacture' => '',
		'msrp_enabled' => 'Use config',
		'msrp_display_actual_price_type' => 'Use config',
		'gift_message_available' => 'No',
		'colour' => '',
		'price' => '',
		'special_price' => '',
		'msrp' => '',
		'color' => '',
		'status' => 'Enabled',
		'visibility' => 'Catalog, Search',
		'enable_googlecheckout' => 'No',
		'tax_class_id' => 'Taxable Goods',
		'configurable_attributes' => 'size',
		'size' => '',
		'description' => '-',
		'short_description' => '-',
		'meta_keyword' => '',
		'custom_layout_update' => '',
		'care' => '',
		'delivery' => 'Innerhalb Deutschlands: 1-3 Tage<br/>Ausserhalb Deutschland: 2-5 Tage',
		'special_from_date' => '',
		'special_to_date' => '',
		'news_from_date' => '',
		'news_to_date' => '',
		'custom_design_from' => '',
		'custom_design_to' => '',
		'qty' => '',
		'min_qty' => '',
		'use_config_min_qty' => '1',
		'is_qty_decimal' => '0',
		'backorders' => '0',
		'use_config_backorders' => '1',
		'min_sale_qty' => '1',
		'use_config_min_sale_qty' => '1',
		'max_sale_qty' => '0',
		'use_config_max_sale_qty' => '1',
		'is_in_stock' => '1',
		'low_stock_date' => '',
		'notify_stock_qty' => '',
		'use_config_notify_stock_qty' => '1',
		'manage_stock' => '0',
		'use_config_manage_stock' => '1',
		'stock_status_changed_auto' => '0',
		'use_config_qty_increments' => '1',
		'qty_increments' => '0',
		'use_config_enable_qty_inc' => '1',
		'enable_qty_increments' => '0',
		'is_decimal_divided' => '0',
		'stock_status_changed_automatically' => '0',
		'use_config_enable_qty_increments' => '1',
		'product_name' => '',
		'store_id' => '0',
		'product_type_id' => 'simple',
		'product_status_changed' => '',
		'product_changed_websites' => '',
		'weight' => '1',
		'is_recurring' => '',
		'recurring_profile' => '',
		'msn' => '',
		'sale' => '0'
	);

	protected function createImportFile(){
		$csv = array(join(',', array_keys($this->importStructure)));
		#$query = $this->getDatabaseConnection()->query("SELECT DISTINCT(artikel.artikel_id) AS id, CONCAT(artikel._artikel_nr, '_', artikel.color) AS sku, IF(COUNT(artikel.name) > 1, 'configurable', 'simple') AS type, CONCAT(artikel.name, ', ', artikel.color_name) AS name, GROUP_CONCAT(artikel.color_name) AS color, GROUP_CONCAT(artikel.size) AS size, CONCAT(artikel.hwg, ',', artikel.wg) AS category, COALESCE(preisliste.empfohlener_VK, 0) AS price FROM moresleep_lala_import_artikel AS artikel LEFT JOIN moresleep_lala_import_preisliste AS preisliste ON artikel.artikel_id = preisliste.artikel_id AND artikel.size = preisliste.groesse AND artikel.color = preisliste.farb_nr WHERE artikel.hwg_nr != '1' GROUP BY sku");
		$query = $this->getDatabaseConnection()->query("SELECT DISTINCT(artikel.artikel_id) AS id, qualitaet.qualitaet_nr AS care, CONCAT(artikel._artikel_nr, '_', artikel.color) AS sku, IF(COUNT(artikel.name) > 1, 'configurable', 'simple') AS type, CONCAT(artikel.name, ', ', artikel.color_name) AS name, GROUP_CONCAT(artikel.color_name) AS color, GROUP_CONCAT(artikel.size) AS size, CONCAT(artikel.hwg, ',', artikel.wg) AS category, COALESCE(preisliste.empfohlener_VK, 0) AS price FROM moresleep_lala_import_artikel AS artikel LEFT JOIN moresleep_lala_import_preisliste AS preisliste ON artikel.artikel_id = preisliste.artikel_id AND artikel.size = preisliste.groesse AND artikel.color = preisliste.farb_nr LEFT JOIN moresleep_lala_import_qualitaet AS qualitaet ON artikel._artikel_nr = qualitaet. _Artikel_nr WHERE artikel.hwg_nr != '1' GROUP BY sku");
		
		while($product = $query->fetch(PDO::FETCH_ASSOC)){
			foreach($this->createImportRows(array_merge($this->importStructure, $product)) as $row){
				$csv[] = '"' . join('","', array_values($row)) . '"';
			}
		}		
		file_put_contents(Mage::getBaseDir('base') . '/var/import/import.csv', join("\n", $csv));
	}

	protected function createImportRows($row){
		$row = array_merge($row, array(
			'category_ids' => $this->resolveCategoryId($row['category']),
			'color' => ((strpos($row['color'], ',') > -1) ? substr($row['color'], 0, strpos($row['color'], ',')) : $row['color']),
			'product_name' => $row['name'],
			'qty' => '0'
		));
		$row = array_diff_key($row, array_flip(array('category', 'id')));

		$rows = array();
		if($row['type'] == 'configurable'){
			if(!preg_match('~OS~', $row['size'])){
				foreach(explode(',', $row['size']) as $size){
					$rows[] = array_merge($row, array(
						'product_type_id' => 'simple',
						'size' => $size,
						'sku' => join('_', array($row['sku'], $size)),
						'type' => 'simple',
						'visibility' => 'Not Visible Individually'
					));
				}
			}else{
				$rows[] = array_merge($row, array(
					'product_type_id' => 'simple',
					'size' => 'OS',
					'sku' => join('_', array($row['sku'], 'OS')),
					'type' => 'simple',
					'visibility' => 'Not Visible Individually'
				));
			}
			$rows[] = array_merge($row, array(
				'has_options' => '1',
				'product_type_id' => 'configurable',
				'size' => '',
				'weight' => '0'
			));
		}else{
			$rows[] = $row;
		}
		return $rows;
	}
	
	protected function getDatabaseConnection(){
		return Mage::getSingleton('core/resource')->getConnection('core_write');
	}

	protected function importCsvToDatabase($truncate = false, $version = 1){
		foreach($this->import as $filename => $columns){
			if($truncate) $this->getDatabaseConnection()->query("TRUNCATE TABLE moresleep_lala_import_" . strtolower(preg_replace('~export_~i', '', basename($filename, '.txt'))));
			$this->getDatabaseConnection()->query("LOAD DATA INFILE '" . (Mage::getBaseDir('base') . '/var/import/Daten/' . $filename) . "' INTO TABLE moresleep_lala_import_" . strtolower(preg_replace('~export_~i', '', basename($filename, '.txt'))) . " FIELDS TERMINATED BY '|' OPTIONALLY ENCLOSED BY '\'' LINES TERMINATED BY '\r\n' IGNORE 1 LINES (" . join(',', $columns) . ") SET created_at = NOW(), updated_at = NOW(), version= '" . $version . "'");
		}
	}

	protected function resolveCategoryId($category){
		return (!empty($this->importCategories[$category])) ? $this->importCategories[$category] : false;
	}

	public function run(){
		$this->importCsvToDatabase(true);
		$this->createImportFile();
	}

    public function updateStock(){
        $db = Mage::getSingleton('core/resource')->getConnection('core_write');
        $query = $db->query("SELECT CONCAT(artikel_nr, '_', farbe, '_', groesse) AS sku, qty FROM moresleep_lala_import_lager");
        while($stock = $query->fetch(PDO::FETCH_ASSOC)){
	        echo $stock["sku"] . " - " . $stock["qty"] . "\n";
			$queryProduct = $db->query("SELECT entity_id AS id, sku FROM catalog_product_entity WHERE sku='" . $stock["sku"] . "' LIMIT 1");
			if($product = $queryProduct->fetch(PDO::FETCH_ASSOC)){
				echo $stock["sku"] . " - " . $stock["qty"] . "\n";
	            $db->query("UPDATE cataloginventory_stock_item SET is_in_stock = '" . ($stock["qty"] > 0) . "', qty = '" . $stock["qty"] . "' WHERE product_id = '" . $product['id'] . "'");
	            $db->query("UPDATE cataloginventory_stock_status SET stock_status = '" . ($stock["qty"] > 0) . "', qty = '" . $stock["qty"] . "' WHERE product_id = '" . $product['id'] . "'");
	        }
        }
        Mage::getSingleton('index/indexer')->getProcessByCode('cataloginventory_stock')->reindexAll();
    }

}
?>
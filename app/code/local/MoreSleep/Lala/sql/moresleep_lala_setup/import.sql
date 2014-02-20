SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE `moresleep_lala_import_artikel` (
  `entity_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `version` bigint(20) NOT NULL DEFAULT '1',
  `artikel_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `_artikel_nr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gtin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `color_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vk` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pfad_bild` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hwg_nr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hwg` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `wg_nr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `wg` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gr_pos` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `agroesse` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sonderaktion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `topartikel` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `neueingetroffen` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `b2b` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `b2c` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `infotext` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rabattaktiv` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `weight` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `saison_nr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `stoffart` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Modell_nr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `modell_bezeichnung` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `groessenstaffel_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `b2c_darstellung` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `b2c_discount` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `b2c_highlight` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `aktionsartikel` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lager_nr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mwst` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`entity_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `moresleep_lala_import_farbstaffel` (
  `entity_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `version` bigint(20) NOT NULL DEFAULT '1',
  `_Nr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Bezeichnung` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `RGB` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `RGB2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`entity_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `moresleep_lala_import_groessenstaffel` (
  `entity_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `version` bigint(20) NOT NULL DEFAULT '1',
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `_nr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pos` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bezeichnung` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hinweis` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `groesse` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `agroesse` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `extra_groesse` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`entity_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `moresleep_lala_import_lager` (
  `entity_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `version` bigint(20) NOT NULL DEFAULT '1',
  `_lager` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `artikel_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `farbe` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `groesse` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gtin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `qty` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `artikel_nr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bestellbestand` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lagerbestand` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dispo_sperre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`entity_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `moresleep_lala_import_preisliste` (
  `entity_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `version` bigint(20) NOT NULL DEFAULT '1',
  `_preisstaffel_nr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `artikel_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `farb_nr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `groesse` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vk_preis` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `aktionspreis` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `von_datum` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bis_datum` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `staffel_1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `staffel_2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `staffel_3` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `staffel_4` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `staffel_5` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vk_1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vk_2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vk_3` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vk_4` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vk_5` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rabatt_1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `empfohlener_VK` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`entity_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `moresleep_lala_import_qualitaet` (
  `entity_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `version` bigint(20) NOT NULL DEFAULT '1',
  `_Artikel_nr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `qualitaet_nr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bezeichnung` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hinweis` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sprache` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`entity_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `moresleep_lala_import_warengruppe` (
  `entity_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `version` bigint(20) NOT NULL DEFAULT '1',
  `_HWG_Nr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `HWG_Bezeichnung` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `wg_nr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `wg_bezeichnung` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`entity_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

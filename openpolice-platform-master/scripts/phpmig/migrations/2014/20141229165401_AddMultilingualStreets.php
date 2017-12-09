<?php

use MyPhpmig\Police\Migration;

class AddMultilingualStreets extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $this->_queries = "ALTER TABLE `streets_relations` CHANGE `streets_street_id` `streets_street_identifier` BIGINT(20)  UNSIGNED  NOT NULL;";

        parent::up();

        $this->getZones()->set(array('data' => 'Data'));

        $this->_queries = <<<END
CREATE TABLE `streets_streets_islps` LIKE `streets`;
INSERT `streets_streets_islps` SELECT * FROM `streets`;

ALTER TABLE `streets_streets_islps` DROP `streets_city_id`;
ALTER TABLE `streets_streets_islps` DROP `language`;
ALTER TABLE `streets_streets_islps` DROP `title`;
ALTER TABLE `streets_streets_islps` DROP `slug`;
ALTER TABLE `streets_streets_islps` DROP `language2`;
ALTER TABLE `streets_streets_islps` DROP `title2`;
ALTER TABLE `streets_streets_islps` DROP `language3`;
ALTER TABLE `streets_streets_islps` DROP `title3`;
ALTER TABLE `streets_streets_islps` DROP `created_by`;
ALTER TABLE `streets_streets_islps` DROP `created_on`;
ALTER TABLE `streets_streets_islps` DROP `modified_by`;
ALTER TABLE `streets_streets_islps` DROP `modified_on`;
ALTER TABLE `streets_streets_islps` DROP `locked_by`;
ALTER TABLE `streets_streets_islps` DROP `locked_on`;

DELETE FROM `streets_streets_islps` WHERE `islp` IS NULL OR `islp` = '';

ALTER TABLE `streets` DROP PRIMARY KEY;
ALTER TABLE `streets` CHANGE `streets_street_id` `streets_street_id` INT(11)  UNSIGNED  NOT NULL  AUTO_INCREMENT  PRIMARY KEY;

ALTER TABLE `streets` ADD `streets_street_identifier` INT  NULL  DEFAULT NULL  AFTER `streets_city_id`;

UPDATE `streets` SET `streets_street_identifier` = `streets_street_id`;

INSERT INTO `streets` (`streets_city_id`, `streets_street_identifier`, `language`, `title`, `created_by`, `created_on`, `modified_by`, `modified_on`)
       SELECT `streets_city_id`, `streets_street_identifier`, `language2`, `title2`, `created_by`, `created_on`, `modified_by`, `modified_on` FROM streets WHERE (language2 != '' AND language2 IS NOT NULL AND language2 != language) AND title2 IS NOT NULL AND title2 != '';

INSERT INTO `streets` (`streets_city_id`, `streets_street_identifier`, `language`, `title`, `created_by`, `created_on`, `modified_by`, `modified_on`)
       SELECT `streets_city_id`, `streets_street_identifier`, `language3`, `title3`, `created_by`, `created_on`, `modified_by`, `modified_on` FROM streets WHERE (language3 != '' AND language3 IS NOT NULL AND language3 != language) AND title3 IS NOT NULL AND title3 != '';

ALTER TABLE `streets` DROP `islp`;
ALTER TABLE `streets` DROP `language2`;
ALTER TABLE `streets` DROP `title2`;
ALTER TABLE `streets` DROP `language3`;
ALTER TABLE `streets` DROP `title3`;

ALTER TABLE `streets` CHANGE `language` `iso` VARCHAR(2)  CHARACTER SET utf8  NULL  DEFAULT NULL;

ALTER TABLE `streets` ADD `sources_source_id` TINYINT(1)  NULL  DEFAULT NULL  AFTER `iso`;
UPDATE `streets` SET `sources_source_id` = 1;

ALTER TABLE `streets` ADD UNIQUE INDEX `streets_street_identifier` (`streets_street_identifier`, `iso`, `sources_source_id`);

ALTER TABLE `streets_relations` CHANGE `streets_street_id` `streets_street_identifier` BIGINT(20)  UNSIGNED  NOT NULL;
ALTER TABLE `streets_streets_islps` CHANGE `streets_street_id` `streets_street_identifier` INT(11)  UNSIGNED  NOT NULL;


END;

        parent::up();
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $this->_queries = "ALTER TABLE `streets_relations` CHANGE `streets_street_identifier` `streets_street_id` BIGINT(20)  UNSIGNED  NOT NULL;";

        parent::down();

        $this->getZones()->set(array('data' => 'Data'));

        $this->_queries = <<<EOL
ALTER TABLE `streets` CHANGE `iso` `language` VARCHAR(2)  CHARACTER SET utf8  NULL  DEFAULT NULL;

ALTER TABLE `streets` DROP PRIMARY KEY,
                      CHANGE `streets_street_id` `streets_street_id` INT(11)  UNSIGNED  NOT NULL PRIMARY KEY;

ALTER TABLE `streets` ADD COLUMN `islp` varchar(20) DEFAULT NULL AFTER `streets_street_id`;
ALTER TABLE `streets` ADD COLUMN `language2` varchar(2) DEFAULT NULL AFTER `title`;
ALTER TABLE `streets` ADD COLUMN `title2` varchar(80) DEFAULT NULL AFTER `language2`;
ALTER TABLE `streets` ADD COLUMN `language3` varchar(2) DEFAULT NULL AFTER `title2`;
ALTER TABLE `streets` ADD COLUMN `title3` varchar(80) DEFAULT NULL AFTER `language3`;

ALTER TABLE `streets` DROP INDEX `streets_street_identifier`;

ALTER TABLE `streets` DROP `sources_source_id`;
ALTER TABLE `streets` DROP `streets_street_identifier`;

DROP TABLE `streets_streets_islps`;
EOL;

        parent::down();
    }
}

<?php
/**
 * ShoutOUT Lite (https://lite.getshoutout.com/).
 *
 * @category    Shoutout
 * @package     Shoutout_Sms
 * @author      Chamal Chamikara <chamalchamikara@gmail.com>
 * @copyright   Copyright (c) 2017 Chamal Chamikara. (http://www.learnmagento.com/)
 */

$installer = $this;
$installer->startSetup();
$installer->run("
    DROP TABLE IF EXISTS {$installer->getTable('sms/templates')};
    CREATE TABLE `{$installer->getTable('sms/templates')}` (
      `id` int(11) NOT NULL auto_increment,
      `type` text,
      `message` text,
      `active` int(10),
      `updated_at` datetime default NULL,
      `created_at` timestamp NOT NULL default CURRENT_TIMESTAMP,
      PRIMARY KEY  (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

");
$installer->endSetup();
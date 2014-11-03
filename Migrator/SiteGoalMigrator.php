<?php


namespace Piwik\Plugins\SiteMigration\Migrator;

use Piwik\Plugins\SiteMigration\Helper\DBHelper;
use Piwik\Plugins\SiteMigration\Helper\GCHelper;

class SiteGoalMigrator extends Migrator
{

    /**
     * @var SiteMigrator
     */
    protected $siteMigrator;

    function __construct(DBHelper $toDbHelper, GCHelper $gcHelper, Migrator $siteMigrator)
    {
        $this->siteMigrator = $siteMigrator;

        parent::__construct($toDbHelper, $gcHelper);
    }

    protected function translateRow(&$row)
    {
        $row['idsite'] = $this->siteMigrator->getNewId($row['idsite']);
    }

    /**
     * @return string Name of the table migrated by this migration
     */
    protected function getTableName()
    {
        return 'goal';
    }

    /**
     * @param array $row
     *
     * @return int  The current id stored in the given row
     */
    protected function getIdFromRow(&$row)
    {
        return null;
    }
}
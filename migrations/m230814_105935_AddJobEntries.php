<?php

namespace craft\contentmigrations;

use Craft;
use craft\db\Migration;
use craft\elements\Entry;

/**
 * m230814_105935_AddJobEntries migration.
 */
class m230814_105935_AddJobEntries extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp(): bool
    {
        $section = Craft::$app->sections->getSectionByHandle('jobs');
        $entryType = $section->getEntryTypes()[0];

        for ($i = 1; $i <= 10; $i++) {
            $entry = new Entry();
            $entry->sectionId = $section->id;
            $entry->typeId = $entryType->id;
            $entry->title = "Test Entry $i";
            Craft::$app->elements->saveElement($entry);
        }

        return true;
    }

    /**
     * @inheritdoc
     */
    public function safeDown(): bool
    {
        echo "m230814_105935_AddJobEntries cannot be reverted.\n";
        return false;
    }
}

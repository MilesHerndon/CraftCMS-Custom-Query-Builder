<?php
namespace Craft;

/**
 * Custom Query Builder Service
 */
class CustomQueryBuilderService extends BaseApplicationComponent
{

  /**
   * Custom Query With Pagination Option
   */

  public function customQuery($currentPage, $entriesPerPage, $queryVar)
  {
    // Extending the ElementCriteriaModel with buildElementsQuery()
      $criteria = craft()->elements->getCriteria(ElementType::Entry);
      $criteria->section = '********* SECTION_HANLE_GOES_HERE *********';
      $criteria->limit = $entriesPerPage;
      $dbCommand = craft()->elements->buildElementsQuery($criteria);
      $dbCommand->setOrder(array('title asc'));
      $dbCommand->offset(($currentPage-1) * $entriesPerPage);

      /**
      * Add '$dbCommand->leftJoin' & '$dbCommand->like' where added to account for custom record table
      */

      // $dbCommand->leftJoin('table_name_goes_here table_name_goes_here', 'table_name_goes_here.entryId = elements.id');
      // $dbCommand->where(array('like', 'awardYears', '%'.$queryVar.'%'));


    // If dbCommand is null, no point in running query, so we return emply Entry Model
      if (! $dbCommand){
        return EntryModel::populateModels(null);
      } else {
        return EntryModel::populateModels($dbCommand->queryAll());
      }

  }


  /**
   * Save Entry Values Into "Custom Query Builder" Table Created in CustomQueryBuilderRecord
   */

    // public function saveEntry($entry)
    // {
        // // get record from DB
        //     $entryModelReformRecord = EntryModelReformRecord::model()->findByAttributes(array('entryId' => $entry->id));
        //
        // // if exists then save to current record
        //     if ($entryModelReformRecord)
        //     {
        //       $entryModelReformRecord->setAttribute('entryTitle', $entry->title);
        //       $entryModelReformRecord->setAttribute('awardYears', $awardYearsFromEntry);
        //       $entryModelReformRecord->setAttribute('recentAward', max($awardYearsFromEntry));
        //     }
        //
        // // otherwise create a new record
        //     else
        //     {
        //         $entryModelReformRecord = new EntryModelReformRecord;
        //         $entryModelReformRecord->setAttribute('entryId', $entry->id);
        //         $entryModelReformRecord->setAttribute('entryTitle', $entry->title);
        //         $entryModelReformRecord->setAttribute('awardYears', $awardYearsFromEntry);
        //         $entryModelReformRecord->setAttribute('recentAward', max($awardYearsFromEntry));
        //     }
    //
    //   // save record in DB
    //       $customQueryBuilderRecord->save();
    // }




    // /**
    //  * Count all entries within "Custom Query Builder" Table Created in CustomQueryBuilderRecord
    //  */
    // public function countAllRecordEntries()
    // {
    //   $entryRecords = EntryModelReformRecord::model()->findAll();
    //   return count($entryRecords);
    // }
}

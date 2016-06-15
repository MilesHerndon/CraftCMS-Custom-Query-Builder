<?php
namespace Craft;

/**
 * Custom Query Builder Service
 */
class CustomQueryBuilderService extends BaseApplicationComponent
{

  protected $criteria;
  protected $dbCommand;


  /**
   * Custom Query With Pagination Option
   */
  public function initCustomQuery($criteria, $relation, $queryVar)
  {
    // Extending the ElementCriteriaModel with buildElementsQuery()
      $this->criteria = $criteria;
      $this->criteria->relatedTo = $relation;
      $this->dbCommand = craft()->elements->buildElementsQuery($this->criteria);
      $this->dbCommand->setOrder('title asc');

      /**
      * Add '$dbCommand->leftJoin' & '$dbCommand->like' where added to account for custom record table
      * *** dbCommand->addSelect('') allows you to add adition columns to a query from another 'related' ElementCriteriaModel
      */
      // $dbCommand->addSelect('');
      // $dbCommand->leftJoin('table_name_goes_here table_name_goes_here', 'table_name_goes_here.entryId = elements.id');
      // $dbCommand->where(array('like', 'awardYears', '%'.$queryVar.'%'));

      return $this;
  }




  /**
   * This function gives the query the ability to utilize pagination
   */
  public function customPagination($currentPage = null, $entriesPerPage = null)
  {
      // DELETE THIS ONCE DONE CONFIGURING PLUGIN
      echo "<fieldset>
              <legend><b>Info From Plugin 'CustomQueryBuilder'</b></legend>
              <p>Current Page: " . $currentPage . "</p>
              <p>Entries Per Page: " . $entriesPerPage . "</p>
            </fieldset>";

      $this->dbCommand->limit($entriesPerPage);
      $this->dbCommand->offset(($currentPage-1) * $entriesPerPage);
      return $this;
  }






  /**
   * This function runs the query and populates the models so they can be used within a Craft CMS Twig template.
   */
  public function runQuery()
  {
    // If dbCommand is null, no point in running query, so we return emply Entry Model
      if (! $this->dbCommand) {
          return $this->criteria->find();
      }
      $result = $this->dbCommand->queryAll();
      return EntryModel::populateModels($result);
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

<?php
namespace Craft;

/**
 * Custom Query Builder
 */
class CustomQueryBuilderVariable
{
  /**
   * This function runs the plugin's CustomQueryBuilderService -> customQuery() function.
   */

  public function customQuery(ElementCriteriaModel $criteria, ElementCriteriaModel $relation = null, $queryVar = null)
  {
      return craft()->customQueryBuilder->initCustomQuery($criteria, $relation, $queryVar);
  }



  /**
   * Links to Plugin's controllers function resetTableIndexes() –– the resetTableIndexes() function Resaves all entries that are related to the plugin's custom record table to ensure all data within plugin's custom database table is correct.
   */

  // public function resetTableIndexes()
  // {
  //     return craft()->customQueryBuilder->resetTableIndexes();
  // }

}

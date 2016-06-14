<?php
// namespace Craft;
//
// /**
//  * Custom Query Builder Controller
//  */
// class CustomQueryBuilderController extends BaseController
// {
//
      // 
      // /**
      //  * Resaves all entries that are related to the plugin's custom record table to ensure all data within plugin's custom database table is correct.
      //  */
      // public function actionResetTableIndexes()
      // {
      //   $this->requireAdmin();
      //   $criteria = craft()->elements->getCriteria(ElementType::Entry);
      //   $criteria->section = '********* SECTION_HANLE_GOES_HERE *********';
      //   $criteria->limit = null;
      //   $sectionEntries = $criteria->find();
      //   foreach ($sectionEntries as $sectionEntry) {
      //     $success = craft()->entries->saveEntry($sectionEntry);
      //     if (!$success) { Craft::log('Couldn’t save the entry "'.$sectionEntry->title.'"', LogLevel::Error); }
      //   }
      //   craft()->userSession->setNotice(Craft::t('Indexes were reset.'));
      //   $this->redirect('settings/plugins');
      // }

//
// }

<?php
namespace Craft;

/**
 * Custom Query Builder Plugin
 */
class CustomQueryBuilderPlugin extends BasePlugin
{

    /**
    * Custom Query Builder
    * WRITE CRAFT CMS HOOKS HERE
    */

    // public function init()
    // {
    //   parent::init();
    //   // craft()->on('entries.saveEntry', function(Event $event){
    //   //
    //   // });
    // }


    public function getName()
    {
        return Craft::t('Custom Query Builder');
    }

    public function getVersion()
    {
        return '1.0.0';
    }

    public function getDescription()
    {
        return 'This plugin is for building complex queries in Craft CMS.';
    }

    public function getDeveloper()
    {
        return 'Matthew Soyka';
    }

    public function getDeveloperUrl()
    {
        return 'https://github.com/m-soyka';
    }

    public function getDocumentationUrl()
    {
        return 'https://github.com/m-soyka';
    }


    /**
    * This turns on the settings panel in the Craft Control Panel
    */
    
    // public function getSettingsHtml()
    // {
    //    return craft()->templates->render('customquerybuilder/settings', array(
    //        'settings' => $this->getSettings()
    //    ));
    // }



}

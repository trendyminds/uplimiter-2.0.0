<?php
/**
 * Uplimiter plugin for Craft CMS 3.x
 *
 * Easily define the maximum file upload size per user group in Craft CMS
 *
 * @link      https://trendyminds.com
 * @copyright Copyright (c) 2017 TrendyMinds
 */

namespace trendyminds\uplimiter;

use trendyminds\uplimiter\variables\UplimiterVariable;

use Craft;
use craft\base\Plugin;

/**
 * Craft plugins are very much like little applications in and of themselves. We’ve made
 * it as simple as we can, but the training wheels are off. A little prior knowledge is
 * going to be required to write a plugin.
 *
 * For the purposes of the plugin docs, we’re going to assume that you know PHP and SQL,
 * as well as some semi-advanced concepts like object-oriented programming and PHP namespaces.
 *
 * https://craftcms.com/docs/plugins/introduction
 *
 * @author    TrendyMinds
 * @package   Uplimiter
 * @since     2.0.0
 */
class Uplimiter extends Plugin
{
    // Static Properties
    // =========================================================================

    /**
     * Static property that is an instance of this plugin class so that it can be accessed via
     * Uplimiter::$plugin
     *
     * @var static
     */
    public static $plugin;

    // Public Methods
    // =========================================================================

    /**
     * Set our $plugin static property to this class so that it can be accessed via
     * Uplimiter::$plugin
     *
     * Called after the plugin class is instantiated; do any one-time initialization
     * here such as hooks and events.
     *
     * If you have a '/vendor/autoload.php' file, it will be loaded for you automatically;
     * you do not need to load it in your init() method.
     *
     */
    public function init()
    {
        parent::init();
        self::$plugin = $this;

        if ( craft()->request->isCpRequest() && craft()->userSession->isLoggedIn() )
        {
            // Get the currently logged in user
            $userId = craft()->userSession->id;

            // Get the user groups the user belongs to
            $userGroups = craft()->userGroups->getGroupsByUserId($userId);

            echo '<pre>';
            print_r($userGroups);
            echo '</pre>';
            die();

            // If the user belongs to a group, prepare to check their upload limit
            // if (!empty($userGroups))
            // {
            //     craft()->on('assets.onBeforeUploadAsset', function(Event $event) {
            //         // Clear the file cache to get the correct file size of the attempted file
            //         clearstatcache();

            //         // Get the currently logged in user
            //         $userId = craft()->userSession->id;

            //         // Get the user groups the user belongs to
            //         $userGroups = craft()->userGroups->getGroupsByUserId($userId);

            //         // Create an array of the groups the user is in and the upload limits
            //         $groups = array();

            //         // Get the value for each user group in the plugin settings. If a user group does not have a value assigned to it, use the default maxUploadFileSize variable.
            //         foreach($userGroups as $group) {
            //             $groups[] = ($this->getSettings()['gid' . $group->id]) ? $this->getSettings()['gid' . $group->id] : craft()->config->get('maxUploadFileSize');
            //         }

            //         // Find the largest value of the groups this user belongs to
            //         $maxGroupFileSize = max($groups);

            //         // Get the size of the uploaded file
            //         $getFileSize = filesize($event->params['path']);

            //         // Determine if the user can upload a file of this size
            //         if ($maxGroupFileSize < $getFileSize)
            //         {
            //             throw new Exception(Craft::t('The file you attempted to upload was too large. Please ensure your upload is smaller than ' . $maxGroupFileSize . ' bytes.'));
            //         }
            //     });
            // }
        }

/**
 * Logging in Craft involves using one of the following methods:
 *
 * Craft::trace(): record a message to trace how a piece of code runs. This is mainly for development use.
 * Craft::info(): record a message that conveys some useful information.
 * Craft::warning(): record a warning message that indicates something unexpected has happened.
 * Craft::error(): record a fatal error that should be investigated as soon as possible.
 *
 * Unless `devMode` is on, only Craft::warning() & Craft::error() will log to `craft/storage/logs/web.log`
 *
 * It's recommended that you pass in the magic constant `__METHOD__` as the second parameter, which sets
 * the category to the method (prefixed with the fully qualified class name) where the constant appears.
 *
 * To enable the Yii debug toolbar, go to your user account in the AdminCP and check the
 * [] Show the debug toolbar on the front end & [] Show the debug toolbar on the Control Panel
 *
 * http://www.yiiframework.com/doc-2.0/guide-runtime-logging.html
 */
        Craft::info('Uplimiter ' . Craft::t('uplimiter', 'plugin loaded'), __METHOD__);
    }

    /**
     * Returns the component definition that should be registered on the
     * [[\craft\web\twig\variables\CraftVariable]] instance for this plugin’s handle.
     *
     * @return mixed|null The component definition to be registered.
     * It can be any of the formats supported by [[\yii\di\ServiceLocator::set()]].
     */
    public function defineTemplateComponent()
    {
        return UplimiterVariable::class;
    }

    // Protected Methods
    // =========================================================================

    /**
     * Performs actions before the plugin is installed.
     *
     * @return bool Whether the plugin should be installed
     */
    protected function beforeInstall(): bool
    {
        return true;
    }

    /**
     * Performs actions after the plugin is installed.
     */
    protected function afterInstall()
    {
    }

    /**
     * Performs actions before the plugin is updated.
     *
     * @return bool Whether the plugin should be updated
     */
    protected function beforeUpdate(): bool
    {
        return true;
    }

    /**
     * Performs actions after the plugin is updated.
     */
    protected function afterUpdate()
    {
    }

    /**
     * Performs actions before the plugin is installed.
     *
     * @return bool Whether the plugin should be installed
     */
    protected function beforeUninstall(): bool
    {
        return true;
    }

    /**
     * Performs actions after the plugin is installed.
     */
    protected function afterUninstall()
    {
    }
}

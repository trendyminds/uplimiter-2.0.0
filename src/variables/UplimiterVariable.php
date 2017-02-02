<?php
/**
 * Uplimiter plugin for Craft CMS 3.x
 *
 * Easily define the maximum file upload size per user group in Craft CMS
 *
 * @link      https://trendyminds.com
 * @copyright Copyright (c) 2017 TrendyMinds
 */

namespace trendyminds\uplimiter\variables;

use trendyminds\uplimiter\Uplimiter;

use Craft;

/**
 * Uplimiter Variable
 *
 * Craft allows plugins to provide their own template variables, accessible from
 * the {{ craft }} global variable (e.g. {{ craft.uplimiter }}).
 *
 * https://craftcms.com/docs/plugins/variables
 *
 * @author    TrendyMinds
 * @package   Uplimiter
 * @since     2.0.0
 */
class UplimiterVariable
{
    // Public Methods
    // =========================================================================

    /**
     * Whatever you want to output to a Twig tempate can go into a Variable method.
     * You can have as many variable functions as you want.  From any Twig template,
     * call it like this:
     *
     *     {{ craft.uplimiter.exampleVariable }}
     *
     * Or, if your variable requires parameters from Twig:
     *
     *     {{ craft.uplimiter.exampleVariable(twigValue) }}
     *
     * @param null $optional
     * @return string
     */
    public function exampleVariable($optional = null)
    {
        $result = "And away we go to the Twig template...";
        if ($optional) {
            $result = "I'm feeling optional today...";
        }
        return $result;
    }
}

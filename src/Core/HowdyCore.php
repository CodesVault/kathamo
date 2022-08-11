<?php

namespace Howdy\Core;

use Howdy\Core\Lib\SingleTon;
use Howdy\Publishers\EventPublisher;

/**
 * Main Class for plugin
 *
 * @package     howdy
 * @author      CodesVault, Keramot UL Islam <sourav926>
 * @since       0.0.1
 */
final class HowdyCore
{
    use SingleTon;

    public function __construct()
    {
        EventPublisher::getInstance()->register();
        AssetsManager::getInstance()->register();
    }
}

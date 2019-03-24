<?php

namespace Kir\Module\Helper\Wysiwyg;

class Images extends \Magento\Cms\Helper\Wysiwyg\Images
{
    public function isUsingStaticUrlsAllowed()
    {
        return true;
    }
}
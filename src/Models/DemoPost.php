<?php

declare(strict_types=1);

namespace Orchids\DemoKit\Models;

use Orchid\Press\Models\Post;

class DemoPost extends Post
{
    /**
     * @var string
     */
    protected $postType = 'demo-screen';
}

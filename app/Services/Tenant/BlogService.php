<?php

namespace App\Services\Tenant;

use App\Events\NewBlogCreated;
use App\Models\Tenant\Blog;

class BlogService
{
    protected $model;

    public function __construct(Blog $model)
    {
        $this->model = $model;
    }

    public function storeBlog(array $data): BlogService
    {
        $this->model = $this->model->query()
            ->create($data);

        return $this;
    }

    public function SendNotification(): static
    {
        broadcast(new NewBlogCreated('New blog has been created'));

        return $this;
    }
}

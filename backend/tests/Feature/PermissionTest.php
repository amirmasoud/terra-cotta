<?php

namespace Tests\Feature;

use Tests\TestCase;
use Tests\Traits\Resource;
use Spatie\Permission\Models\Permission;
use Tests\Interfaces\Resource as ResourceInterface;

class PermissionTest extends TestCase implements ResourceInterface
{
    use Resource;

    /**
     * @group permissions
     */
    public function testPaginatedPermissions()
    {
        $this->paginated('/api/settings/permissions');
    }
}

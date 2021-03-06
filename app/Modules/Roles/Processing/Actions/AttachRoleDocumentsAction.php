<?php

namespace App\Modules\Roles\Processing\Actions;

use App\Modules\Roles\Data\Models\Role;
use App\Modules\Roles\Data\Repositories\RoleRepository;
use Illuminate\Support\Facades\App;

/**
 * Class CreateRoleAction
 *
 * Action Creates a New Role from the Rolename parameter.
 * The New Role has a random 8 Character Password and
 * is deactivated by Default.
 *
 * @package App\Modules\Roles\Processing\Actions
 */

class AttachRoleDocumentsAction
{
    public function run($data, Role $role)
    {
        $collection = collect($data['documents']);
        $documentIDs = $collection->mapWithKeys(function ($item) {return [ (string) $item['id'] => ['permission' => (string)$item['permission']]]; });

        return App::make(RoleRepository::class)->attachDocuments(['documents' => $documentIDs->toArray()], $role);
    }
}

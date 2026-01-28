<?php

namespace ModulesGarden\AbandonedCart\Core\Models;

use \Illuminate\Database\Eloquent\Model as EloquentModel;
use \ModulesGarden\AbandonedCart\Core\ModuleConstants;

/**
 * Wrapper for EloquentModel
 *
 * @author Sławomir Miśkowicz <slawomir@modulesgarden.com>
 */
class ExtendedEloquentModel extends EloquentModel
{
    public function __construct(array $attributes = [])
    {
        $this->table = ModuleConstants::getPrefixDataBase() . $this->table;
        
        parent::__construct($attributes);
    }
}

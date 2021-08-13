<?php

namespace App\Repositories;

use App\Models\TeeColor;
use App\Repositories\BaseRepository;

/**
 * Class TeeColorRepository
 * @package App\Repositories
 * @version August 13, 2021, 4:37 pm UTC
*/

class TeeColorRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'color'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return TeeColor::class;
    }
}

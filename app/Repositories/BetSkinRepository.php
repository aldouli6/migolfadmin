<?php

namespace App\Repositories;

use App\Models\BetSkin;
use App\Repositories\BaseRepository;

/**
 * Class BetSkinRepository
 * @package App\Repositories
 * @version October 8, 2021, 5:45 pm UTC
*/

class BetSkinRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'bet_id',
        'enabled',
        'bet',
        'ventaja'
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
        return BetSkin::class;
    }
}

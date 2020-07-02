<?php

namespace App\Repositories;

use App\Models\blogB;
use App\Repositories\BaseRepository;

/**
 * Class blogBRepository
 * @package App\Repositories
 * @version June 30, 2020, 3:04 pm UTC
*/

class blogBRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'post_date',
        'email',
        'post_type',
        'category'
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
        return blogB::class;
    }
}

<?php

namespace App\Http\Filters;

use App\Models\Games;
use http\Env\Request;

class Filter
{
    static public function PublishersFilter($request, $records)
    {
        if(!empty($request->input('publisher_filter'))) {
            $records = $records->where('publisher_id', $request->publisher_filter);
        }
        return $records;
    }
    static public function DateSort($request, $records)
    {
        switch ($request->input('order_by_date')) {
            case 'asc':
                $records = $records->sortBy('release_date');
                break;
            case 'desc':
                $records = $records->sortByDesc('release_date');
                break;
            default:
                $records = $records->sortBy('release_date');
        }
        return $records;
    }
}

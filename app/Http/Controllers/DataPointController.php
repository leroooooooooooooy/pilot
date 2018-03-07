<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\DataPoint;

class DataPointController extends Controller
{
    //protected $data_points;

    public function __construct(/*DataPointRepository $data_points*/) {
        //$this->data_points = $data_points;
    }

    /**
     * GET data_point(s)
     *
     * @param   Illuminate\Http\Request $request
     * @param   integer                 $id
     * @return  array
     */
    public function get(Request $request, $id = null) {
        return $id == null ? DataPoint::all() : DataPoint::find($id);
    }

    /**
     * POST data_point (create a new one)
     *
     * @param   Illuminate\Http\Request $request
     */
    public function post(Request $request) {
        $data_point = new DataPoint;
        $data_point->metric_id = $request->metric_id;
        $data_point->value = $request->value;
        $data_point->date = $request->date;
        $data_point->save();
    }

    /**
     * PUT data_point (update an existing one)
     *
     * @param   Illuminate\Http\Request $request
     * @param   integer                 $id
     */
    public function put(Request $request, $id) {
        $data_point = DataPoint::find($id);
        if ($data_point != null) {
            $data_point->metric_id = $request->input('metric_id');
            $data_point->value = $request->input('value');
            $data_point->date = $request->input('date');
            $data_point->save();
        }
    }
}

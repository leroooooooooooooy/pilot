<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Metric;

class MetricController extends Controller
{
    //protected $metrics;

    public function __construct(/*MetricRepository $metrics*/) {
        //$this->metrics = $metrics;
    }

    /**
     * GET metric(s)
     *
     * @param   Illuminate\Http\Request $request
     * @param   integer                 $id
     * @return  array
     */
    public function get(Request $request, $id = null) {
        return $id == null ? Metric::all() : Metric::find($id);
    }

    /**
     * POST metric (create a new one)
     *
     * @param   Illuminate\Http\Request $request
     */
    public function post(Request $request) {
        $metric = new Metric;
        $metric->name = $request->name;
        $metric->m = $request->m;
        $metric->n = $request->n;
        $metric->save();
    }

    /**
     * PUT metric (update an existing one)
     *
     * @param   Illuminate\Http\Request $request
     * @param   integer                 $id
     */
    public function put(Request $request, $id) {
        $metric = Metric::find($id);
        if ($metric != null) {
            $metric->name = $request->input('name');
            $metric->m = $request->input('m');
            $metric->n = $request->input('n');
            $metric->save();
        }
    }
}

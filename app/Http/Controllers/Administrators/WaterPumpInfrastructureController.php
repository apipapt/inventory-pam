<?php

namespace App\Http\Controllers\Administrators;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\WaterPump;
use App\WaterPumpInfrastructure;


class WaterPumpInfrastructureController extends Controller
{
    public function index() {
        return view('administrator.waterPumpInfrastructure.index',[
            'datas' => WaterPumpInfrastructure::latest()->paginate(10)
        ]);
    }

    public function create()
    {
        $datas = '';
        return view('administrator.waterPumpInfrastructure.create', compact('datas'));
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'location' => 'required',
            'water_pump_id' => 'required|unique:water_pump_infrastructures,water_pump_id',
        ]);

        $data = new WaterPumpInfrastructure;
        $data->name = $request->name;
        $data->location = $request->location;
        $data->water_pump_id = $request->water_pump_id;
        $data->save();

        return redirect()
                ->route('administrator.waterpumpInfra')
                ->with(['save' => 'Berhasil!!!']);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required',
            'location' => 'required',
            'water_pump_id' => 'required|unique:water_pump_infrastructures,water_pump_id,' . $id,
        ]);

        $data = WaterPumpInfrastructure::find($id);
        $data->name = $request->name;
        $data->location = $request->location;
        $data->water_pump_id = $request->water_pump_id;
        $data->save();

        return redirect()->route('administrator.waterpumpInfra')->with(['update' => 'Berhasil!!!']);
    }

    public function delete($id) {
        $data = WaterPumpInfrastructure::Find($id);
        $data->delete();

        return redirect()->route('administrator.waterpumpInfra')->with(['delete' => 'Berhasil Menghapus!!!']);
    }
}

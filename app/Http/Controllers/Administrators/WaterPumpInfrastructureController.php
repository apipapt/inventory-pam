<?php

namespace App\Http\Controllers\Administrators;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\WaterPump;
use App\WaterPumpInfrastructure;
use PDF;


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
        $data->capacity = $request->capacity;
        $data->swl_dwl = $request->swl_dwl;
        $data->mt = $request->mt;
        $data->kw = $request->kw;
        $data->overhead = $request->overhead;
        $data->lt = $request->lt;
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
        $waterPumpNoInstalledId = $data->water_pump_id;

    
        $data->name = $request->name;
        $data->location = $request->location;
        $data->capacity = $request->capacity;
        $data->swl_dwl = $request->swl_dwl;
        $data->mt = $request->mt;
        $data->kw = $request->kw;
        $data->overhead = $request->overhead;
        $data->lt = $request->lt;
        $data->water_pump_id = $request->water_pump_id;
        $data->save();

        $waterPumpNoInstalled = WaterPump::find($waterPumpNoInstalledId);
        $waterPumpNoInstalled->status = "Belum Terpasang";
        $waterPumpNoInstalled->save();

        $waterPumpInstalled = WaterPump::find($request->water_pump_id);
        $waterPumpInstalled->status = "Terpasang";
        $waterPumpInstalled->save();

        return redirect()->route('administrator.waterpumpInfra')->with(['update' => 'Berhasil!!!']);
    }

    public function delete($id) {
        $data = WaterPumpInfrastructure::Find($id);
        $data->delete();

        return redirect()->route('administrator.waterpumpInfra')->with(['delete' => 'Berhasil Menghapus!!!']);
    }

    public function download(Request $request) {
        $date = '1-'.$request->date;
        $WaterPumpInfrastructure = WaterPumpInfrastructure::get();
        // return view('administrator.pdf.waterMonth', [
        //     'WaterPumpInfrastructure' => $WaterPumpInfrastructure
        // ]);

        view()->share('WaterPumpInfrastructure', $WaterPumpInfrastructure);
        $pdf = PDF::loadView('pdf.waterPumpInfrastructure', $WaterPumpInfrastructure->toArray());

        return $pdf->download('Data Lokasi Pompa Air '.$request->date.'.pdf');
    }
}

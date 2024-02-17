<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF Demo in Laravel 7</title>
    {{-- <link rel="stylesheet" href="{{asset('css/app.css')}}"> --}}
    <style>
      body {
        font-family: "Nunito", sans-serif;
        font-size: 8px;
        line-height: 1.6;
        color: #212529;
      }

      .text-center {
        text-align: center;
      }
      
      .text-left {
          text-align: left;
      }

      .text-right {
          text-align: right;
      }

      td {
        padding: 10px;
      }

      table, td, th {
        border: 1px solid black;
      }

      .border {
          border-collapse: collapse;
      }
    </style>
  </head>
  <body>
    <div class="pt-5">
      <div class="text-center">
        <h2>Tirto Sambongsari</h2>
      </div>
      <table class="border">
        <tr class="text-center">
            <th width='8px'>Id</th>
            <th width='150px'>Nama</th>
            <th width='80px'>Nama Pompa Air</th>
            <th width='60px'>Lokasi</th>
            <th width='60px'>Kapasitas</th>
            <th width='60px'>SWL / DWl</th>
            <th width='90px'>Meter</th>
        </tr>
        @foreach ($WaterPumpInfrastructure as $data)
            <tr class="text-center">
              <td width='10px' class="text-right">{{$data->id}}</td>
              <td width='10px'>{{$data->name}}</td>
              <td width='80px'>{{$data->waterPump->name}}</td>
              <td width='60px' class="text-center">{{$data->location}}</td>
              <td width='60px' class="text-center">{{$data->capacity}}</td>
              <td width='60px' class="text-center">{{$data->swl_dwl}}</td>
              <td width='60px' class="text-center">{{$data->mt}}</td>
            </tr>
        @endforeach
      </table>
    </div>
  </body>
</html>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Unos Telekom</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-striped">
                        <tr>
                            <th>Mesec</th>
                            <th>Lok PP [din.]</th>
                            <th>Lok -4 [din.]</th>
                            <th>Lok -3 [din.]</th>
                            <th>Lok -2 [din.]</th>
                            <th>Lok -1 [din.]</th>
                            <th>Lok DB [min]</th>
                            <th>LiPB PP [din.]</th>
                            <th>LiPB -4 [din.]</th>
                            <th>LiPB -3 [din.]</th>
                            <th>LiPB -2 [din.]</th>
                            <th>LiPB -1 [din.]</th>
                            <th>LiPB DB [min]</th>
                        </tr>
                        @foreach($tcolls as $tcoll)
                            <tr>
                                <td class="text-center col-md-2">
                                    @foreach($months as $month)
                                        @if($tcoll->month_id==$month->id)
                                            {{ $month->name }}
                                        @endif
                                    @endforeach
                                </td>
                                <td class="text-center col">
                                    {{ number_format($tcoll->lok_billed_postpaid,2) }}
                                </td>
                                <td class="text-center col">
                                    {{ number_format($tcoll->lok_collected_m4,2) }}
                                </td>
                                <td class="text-center col">
                                    {{ number_format($tcoll->lok_collected_m3,2) }}
                                </td>
                                <td class="text-center col">
                                    {{ number_format($tcoll->lok_collected_m2,2) }}
                                </td>
                                <td class="text-center col">
                                    {{ number_format($tcoll->lok_collected_m1,2) }}
                                </td>
                                <td class="text-center col">
                                    {{ number_format($tcoll->lok_db,2) }}
                                </td>
                                <td class="text-center col">
                                    {{ number_format($tcoll->lipb_billed_postpaid,2) }}
                                </td>
                                <td class="text-center col">
                                    {{ number_format($tcoll->lipb_collected_m4,2) }}
                                </td>
                                <td class="text-center col">
                                    {{ number_format($tcoll->lipb_collected_m3,2) }}
                                </td>
                                <td class="text-center col">
                                    {{ number_format($tcoll->lipb_collected_m2,2) }}
                                </td>
                                <td class="text-center col">
                                    {{ number_format($tcoll->lipb_collected_m1,2) }}
                                </td>
                                <td class="text-center col">
                                    {{ number_format($tcoll->lipb_db,2) }}
                                </td>
                            </tr>
                        @endforeach
                        <form method="POST" action="/telekom">
                            @csrf
                            <tr>                            
                                <td>
                                    <select name="month" class="form-control">
                                        @foreach($months as $month)
                                            <option value="{{ $month->id }}" {{ $month->id == $last_tcoll + 1 ? 'selected' : '' }}>
                                                {{ $month->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input class="form-control" type="value" name="lok_billed_postpaid">
                                </td>
                                <td>
                                    <input class="form-control" type="value" name="lok_collected_m4">
                                </td>
                                <td>
                                    <input class="form-control" type="value" name="lok_collected_m3">
                                </td>
                                <td>
                                    <input class="form-control" type="value" name="lok_collected_m2">
                                </td>
                                <td>
                                    <input class="form-control" type="value" name="lok_collected_m1">
                                </td>
                                <td></td>
                                <td>
                                    <input class="form-control" type="value" name="lipb_billed_postpaid">
                                </td>
                                <td>
                                    <input class="form-control" type="value" name="lipb_collected_m4">
                                </td>
                                <td>
                                    <input class="form-control" type="value" name="lipb_collected_m3">
                                </td>
                                <td>
                                    <input class="form-control" type="value" name="lipb_collected_m2">
                                </td>
                                <td>
                                    <input class="form-control" type="value" name="lipb_collected_m1">
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <input class="btn btn-success" type="submit" value="Unesi naplatu">
                                </td>
                            </tr>
                        </form>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

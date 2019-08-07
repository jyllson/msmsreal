@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
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
                            <th>Lok PoP [s]</th>
                            <th>Lok PrP [s]</th>
                            <th>Lok DB [min]</th>
                            <th>LiPB PoP [s]</th>
                            <th>LiPB PrP [s]</th>
                            <th>LiPB DB [min]</th>
                        </tr>
                        @foreach($vcolls as $vcoll)
                            <tr>
                                <td>
                                    @foreach($months as $month)
                                        @if($vcoll->month_id==$month->id)
                                            {{ $month->name }}
                                        @endif
                                    @endforeach
                                </td>
                                <td>
                                    {{ $vcoll->vip_lok_pop_sum }}
                                </td>
                                <td class="text-center">
                                    {{ $vcoll->vip_lok_prp_sum }}
                                </td>
                                <td class="text-center">
                                    {{ number_format($vcoll->vip_lok_db,2) }}
                                </td>
                                <td class="text-center">
                                    {{ $vcoll->vip_lipb_pop_sum }}
                                </td>
                                <td class="text-center">
                                    {{ $vcoll->vip_lipb_prp_sum }}
                                </td>
                                <td class="text-center">
                                    {{ number_format($vcoll->vip_lipb_db,2) }}
                                </td>
                            </tr>
                        @endforeach
                        <form method="POST" action="/vip">
                            @csrf
                            <tr>                            
                                <td class="inputcolmonth">
                                    <select name="month" class="form-control">
                                        @foreach($months as $month)
                                            <option value="{{ $month->id }}" {{ $month->id == $last_vcoll + 1 ? 'selected' : '' }}>
                                                {{ $month->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                                <td class="inputcol">
                                    <input class="form-control" type="value" name="vip_lok_pop_sum" id="focused">
                                </td>
                                <td class="inputcol">
                                    <input class="form-control" type="value" name="vip_lok_prp_sum">
                                </td>
                                <td class="inputcol"></td>
                                <td class="inputcol">
                                    <input class="form-control" type="value" name="vip_lipb_pop_sum">
                                </td>
                                <td class="inputcol">
                                    <input class="form-control" type="value" name="vip_lipb_prp_sum">
                                </td>
                                <td class="inputcol"></td>
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

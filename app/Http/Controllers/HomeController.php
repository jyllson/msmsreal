<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TelekomCollection;
use App\VipCollection;
use App\Month;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function telekom()
    {
        $tcolls = TelekomCollection::orderBy('id','desc')->take(5)->get();
        $tcolls = $tcolls->reverse()->values();
        $months = Month::all();
        $last_tcoll = 0;
        if($tcolls->count()!=0)
        {
            $last_tcoll = TelekomCollection::find(\DB::table('telekom_collections')->max('id'))->id;
        }

        return view('unos-telekom',compact('tcolls','months','last_tcoll'));
    }

    public function telekomStore(Request $request)
    {
        $month_ym = Month::find($request->month);
        $lok_db = DB::connection('mysql_asterisk')
                ->table('cdr')                
                ->where('calldate','like',$month_ym->yearmonth.'%')
                ->where('userfield','=','381212155899')
                ->sum('billsec');
                

        $lipb_db = DB::connection('mysql_asterisk')
                ->table('cdr')                
                ->where('calldate','like',$month_ym->yearmonth.'%')
                ->where('userfield','=','381212155908')
                ->sum('billsec');
        
        if(TelekomCollection::where('month_id','=','$request->month')->count())
        {
            $telekom = TelekomCollection::where('month_id','=','$request->month');
        } 
        else 
        {
            $telekom = new TelekomCollection([
                'month_id' => $request->month,
                'lok_billed_postpaid' => $request->lok_billed_postpaid,
                'lok_collected_m4' => $request->lok_collected_m4,
                'lok_collected_m3' => $request->lok_collected_m3,
                'lok_collected_m2' => $request->lok_collected_m2,
                'lok_collected_m1' => $request->lok_collected_m1,
                'lok_db' => $lok_db/60,
                'lipb_billed_postpaid' => $request->lipb_billed_postpaid,
                'lipb_collected_m4' => $request->lipb_collected_m4,
                'lipb_collected_m3' => $request->lipb_collected_m3,
                'lipb_collected_m2' => $request->lipb_collected_m2,
                'lipb_collected_m1' => $request->lipb_collected_m1,
                'lipb_db' => $lipb_db/60
            ]);
        }
        

        $telekom->save();

        return redirect('/telekom');
    }

    public function vip()
    {
        $vcolls = VipCollection::orderBy('id','desc')->take(5)->get();
        $vcolls = $vcolls->reverse()->values();
        $months = Month::all();
        $last_vcoll = 0;
        if($vcolls->count()!=0)
        {
            $last_vcoll = VipCollection::find(\DB::table('vip_collections')->max('id'))->id;
        }

        return view('unos-vip',compact('vcolls','months','last_vcoll'));
    }

    public function vipStore(Request $request)
    {
        $month_ym = Month::find($request->month);
        $vip_lok_db = DB::connection('mysql_asterisk')
                ->table('cdr')                
                ->where('calldate','like',$month_ym->yearmonth.'%')
                ->where('userfield','=','381906444808')
                ->sum('billsec');
                

        $vip_lipb_db = DB::connection('mysql_asterisk')
                ->table('cdr')                
                ->where('calldate','like',$month_ym->yearmonth.'%')
                ->where('userfield','=','381906202124')
                ->sum('billsec');
        
        if(VipCollection::where('month_id','=','$request->month')->count())
        {
            $vip = VipCollection::where('month_id','=','$request->month');
        } 
        else 
        {
            $vip = new VipCollection([
                'month_id' => $request->month,
                'vip_lok_pop_sum' => $request->vip_lok_pop_sum,
                'vip_lok_prp_sum' => $request->vip_lok_prp_sum,
                'vip_lok_db' => $vip_lok_db/60,
                'vip_lipb_pop_sum' => $request->vip_lipb_pop_sum,
                'vip_lipb_prp_sum' => $request->vip_lipb_prp_sum,
                'vip_lipb_db' => $vip_lipb_db/60
            ]);
        }
        

        $vip->save();

        return redirect('/vip');
    }
}

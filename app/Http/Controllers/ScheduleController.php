<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getSchedules = Schedule::all();

        return view('schedule.index',[
            'schedules' => $getSchedules,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
               
       $check = DB::table('schedules')->where('date', $request->date)->exists();

        if($check){
            return back()->with('message','exists');
        }else{
            Schedule::create([
                'date' => $request->date,
                'time' => $request->time,
                'user_id' => auth()->id(),
                'status' => $request->status,
            ]);   
            return back()->with('message','successcreate');
        }

                


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Schedule $schedule)
    {
        $schedule->update([
            'date' => $request->date,
            'time' => $request->time,
        ]);
        return back()->with('message', 'successedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schedule $schedule)
    {
        $schedule->delete();

        return back()->with('message','successdelete');
    }


    //tis for sv one

    public function indexReq(){
        
        $getSchedules = Schedule::all();

        return view('scheduleReq.index',[
            'schedules' => $getSchedules,
        ]);
    }

    public function acceptSchedule(Request $request, Schedule $schedule){
        
        $sche = Schedule::find($request->scheID);

        if($sche){
            $sche->status = '1';
            $sche->save();
            return back()->with('message', 'accepted');
        }else{
            return back()->with('message', 'fail');
        }
        
       
    }

    public function rejectSchedule(Request $request, Schedule $schedule){
        
        $sche = Schedule::find($request->scheID);

        if($sche){
            $sche->status = '2';
            $sche->save();
            return back()->with('message', 'rejected');
        }else{
            return back()->with('message', 'fail');
        }
        
    }
}

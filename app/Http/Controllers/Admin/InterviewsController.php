<?php

namespace App\Http\Controllers\Admin;

use App\Admission;
use App\Http\Requests\InterviewValidation;
use App\Interview;
use App\Type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Calendar;

class InterviewsController extends Controller
{
    /**
     * Display all Interviews
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        //  get all Interviews
        $interviews = Interview::with('type', 'admission')->get();
        return view('admin.interviews.index', compact('interviews'));
    }

    /**
     * Create new Interview
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.interviews.create');
    }

    /**
     * Store new interview
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(InterviewValidation $request)
    {

        $interview = Interview::create([
            'name' => $request->input('name'),
            'type_id' => $request->input('type'),
        ]);

        if ($interview) {
            $notification = array(
                'message' => 'Interview is created successfully!',
                'type' => 'success'
            );

            return redirect('/admin/interviews')->with($notification);
        } else {
            $notification = array(
                'message' => 'Interview doesn\'t create!',
                'type' => 'error'
            );

            return redirect('admin/interviews/' . $interview->id . '/edit')->with($notification);
        }
    }

    /**
     * Edit Interview
     * @param $id
     */
    public function edit($id)
    {
        // get Interview by id
        $interview = Interview::find($id);
        return view('admin.interviews.edit', compact('interview', 'type'));
    }

    /**
     * Update Interview
     * @param InterviewValidation $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(InterviewValidation $request, $id)
    {
        Interview::find($id)->update([
            'name' => $request->input('name'),
            'type_id' => $request->input('type'),
        ]);

        return redirect('admin/interviews')->with(['message' => 'The Interview has been updated.', 'type' => 'success']);
    }

    /**
     * Delete Interview
     * @param $id
     */
    public function destroy($id)
    {
        Interview::find($id)->delete();
        return redirect('admin/interviews')->with(['message' => 'Interview has been deleted.', 'type' => 'success']);
    }

    /**
     * Show interviews
     * @param $id
     */
    public function show($id)
    {
//        get admission for specific interview
        $admissions = Admission::where('interview_id', $id)->where('status', '!=', 0)->get();

        if ($admissions->count()) {

            foreach ($admissions as $key => $value) {

                $event = Calendar::event(

                    $value->title,

                    false,

                    new \DateTime($value->start_date),

                    new \DateTime($value->end_date)

                );

                $calendar = Calendar::addEvent($event, [ //set custom color fo this event
                    'color' => $value->status == 1 ? 'green' : 'red'
                ]);

                $calendar->setCallbacks(['select' => 'function(start, end, jsEvent, view) {
                    var id = $("#interview_id").val();
        
                    $.ajaxSetup({
                      headers: {
                        \'X-CSRF-TOKEN\': $(\'meta[name="csrf-token"]\').attr(\'content\')
                      }
                    });
                    
                     $.ajax({
                        method: "post",
                        url: "/admin/admissions",
                        data: {
                            interview_id: id,
                            title: view.name,
                            start: start.unix(),
                            end: end.unix()
                        },
                         success:function(response){
                            if(response.success){
                                alert(response.messages);
                            }
                        }
                    })
                 }',
                ]);
            }

        } else {
            $calendar = Calendar::addEvents([]);
        }

        $calendar->setOptions([ //set fullcalendar options
            'firstDay' => 1,
            'weekends' => false,
            'selectable' => true,
            'timezone' => 'local',
            'defaultView' => 'agendaWeek',
            'allDaySlot' => false,
            'minTime' => '09:00:00',
            'maxTime' => '16:00:00',
            'contentHeight' => 'auto',
            'axisFormat' => [
                'agenda' => 'HH:mm'
            ],
            'slotDuration' => '00:60:00',
            'businessHours' => [
                'dow' => [1, 2, 3, 4, 5],
                'start' => '09:00',
                'end' => '16:00',
            ],
            'header' => [
                'right' => 'agendaWeek,agendaDay',
                'center' => 'title',
                'left' => 'prev,next today',
            ]
        ]);

        $calendar->setCallbacks([ //set fullcalendar callback options (will not be JSON encoded)
            'select' => 'function(start, end, jsEvent, view) {
            var id = $("#interview_id").val();

            $.ajaxSetup({
              headers: {
                \'X-CSRF-TOKEN\': $(\'meta[name="csrf-token"]\').attr(\'content\')
              }
            });
            
             $.ajax({
                method: "post",
                url: "/admin/admissions",
                data: {
                    interview_id: id,
                    title: view.name,
                    start: start.unix(),
                    end: end.unix()
                },
                 success:function(response){
                    if(response.success){
                        alert(response.messages);
                    }
                }
            })
         }',

        ]);

        return view('front.admissions.index', compact('calendar', 'id'));

    }
}

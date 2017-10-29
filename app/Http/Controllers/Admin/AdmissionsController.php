<?php

namespace App\Http\Controllers\Admin;

use App\Admission;
use App\Interview;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdmissionsController extends Controller
{

    /**
     * Display all admissions
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $admissions = Admission::with('user')->get();
        return view('admin.admissions.index', compact('admissions'));
    }


    /**
     * Store Admission
     * @param Request $request
     * @return array
     */
    public function store(Request $request)
    {
        if ($request->ajax()) {
            //  get login user id
            $user_id = Auth::user()->id;
            //   get interview data
            $interview = Interview::where('id', $request->interview_id)->first();
            //  check if user already subscibe
            $subscribe = Admission::where('interview_id', $interview->id)->where('user_id', $user_id)->get();

            if ($subscribe->count()) {
                return ['success' => true, 'messages' => 'You are already subscribe for this interview'];
            } else {

                $start_date = Carbon::createFromTimestamp($request->start);
                $end_date = Carbon::createFromTimestamp($request->end);

                $new_admission = Admission::create([
                    'interview_id' => $interview->id,
                    'user_id' => Auth::user()->id,
                    'title' => $interview->name,
                    'start_date' => $start_date,
                    'end_date' => $end_date,
                    'status' => 0
                ]);

                if ($new_admission) {
                    return ['success' => true, 'messages' => 'You are successfully sent request for ' . $interview->name . ' interview'];
                } else {
                    return ['error' => true];
                }
            }
        }
    }

    /**
     * Admission status update
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        Admission::findOrFail($id)->update([
            'status' => $request->status
        ]);

        return redirect("admin/admissions")->with(['message' => 'Admission status is successfully updated!', 'type' => 'success']);

    }

    /**
     * Edit admisssion
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $admission = Admission::with('user')->findOrFail($id);
        return view('admin.admissions.edit', compact('admission'));
    }

    /**
     * Delete admisssion
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Admission::findOrFail($id)->delete();
        return redirect()->back()->with(['message' => 'Admisssion has been deleted.', 'type' => 'success']);
    }

}

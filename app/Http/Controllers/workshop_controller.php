<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Member;
use App\Models\Workshop;
use App\Models\Speaker;

class workshop_controller extends Controller
{
    public function createWorkshop()
    {
        if(session('member_id') == null){
            return redirect('login')->with('error', 'You need to login first');
        }
        
        $members = Member::All();

        return view('post.createWorkshop',
            [
                'members' => $members
            ]
    );
    }

    public function storeWorkshop(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'ws_title' => 'required|string',
            'in_IUT' => 'sometimes',
            'is_online' => 'sometimes',
            'start_datetime' => 'required',
            'end_datetime' => 'required|after:start_datetime',
            'location' => 'required|string|max:255',
            'description' => 'required',
            'workshop_pic' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'link' => 'required_if:is_online,1|nullable|url|max:255',
        ]);

        // Handle file upload if exists
        $profilePicPath = 'workshop/ws.jpg';
        if ($request->hasFile('workshop_pic')) {
            $file = $request->file('workshop_pic');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $profilePicPath = $file->storeAs('workshop', $fileName, 'public');
        }

        // Map validated data to the model attributes
        $workshop = new Workshop();
        $workshop->title = $validatedData['ws_title'];
        $workshop->description = $validatedData['description'];
        $workshop->start_date = $validatedData['start_datetime'];
        $workshop->end_date = $validatedData['end_datetime'];
        $workshop->location = $validatedData['location'];
        $workshop->in_IUT = $request->boolean('in_IUT');
        $workshop->is_online = $request->boolean('is_online');
        $workshop->link = isset($validatedData['link']) ? $validatedData['link'] : 'none';
        $workshop->featured_image = $profilePicPath;
        $workshop->save();

        // Redirect back with success message
        return redirect('reporter/workshops')->with('success', 'Workshop created successfully');
    }



    public function editworkshop($id){

        if(session('member_id') == null){
            return redirect('login')->with('error', 'You need to login first');
        }


        $workshop = Workshop::find($id);

        if($workshop == null){
            return redirect('reporter/workshops')->with('error', 'Workshop not found');
        }

        return view('post.editWorkshop', ['workshop' => $workshop]);
    }


    public function updateWorkshop(Request $request, $id){
        if(session('member_id') == null){
            return redirect('login')->with('error', 'You need to login first');
        }

        $workshop = Workshop::find($id);

        if($workshop == null){
            return redirect('reporter/workshops')->with('error', 'Workshop not found');
        }

        $request->validate([
            'ws_title' => 'required|string',
            'in_IUT' => 'sometimes',
            'is_online' => 'sometimes',
            'start_datetime' => 'required',
            'end_datetime' => 'required|after:start_datetime',
            'location' => 'required|string|max:255',
            'description' => 'required',
            'workshop_pic' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'link' => 'required_if:is_online,1|nullable|url|max:255',
        ]);

        $workshop->title = $request->ws_title;
        $workshop->description = $request->description;
        $workshop->start_date = $request->start_datetime;
        $workshop->end_date = $request->end_datetime;
        $workshop->location = $request->location;
        $workshop->in_IUT = $request->boolean('in_IUT');
        $workshop->is_online = $request->boolean('is_online');
        $workshop->link = isset($request->link) ? $request->link : 'none';

        if ($request->hasFile('workshop_pic')) {
            $file = $request->file('workshop_pic');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $profilePicPath = $file->storeAs('workshop', $fileName, 'public');
            $workshop->featured_image = $profilePicPath;
        }

        $workshop->save();

        return redirect('reporter/workshops')->with('success', 'Workshop updated successfully');
    }


    public function allWorkshops()
    {
        if(session('member_id') == null){
            return redirect('login')->with('error', 'You need to login first');
        }

        $workshops = Workshop::All();
        return view('post.workshops',
            [
                'workshops' => $workshops,
                'type' => 'Workshops'
            ]
        );
    }


    public function deleteWorkshop($id){
        if(session('member_id') == null){
            return redirect('login')->with('error', 'You need to login first');
        }

        $workshop = Workshop::find($id);

        if($workshop == null){
            return redirect('reporter/workshops')->with('error', 'Workshop not found');
        }

        $workshop->delete();

        return redirect('reporter/workshops')->with('success', 'Workshop deleted successfully');
    }


    public function addSpeakerform($id){
        if(session('member_id') == null){
            return redirect('login')->with('error', 'You need to login first');
        }

        $workshop = Workshop::find($id);
        $members = Member::All();

        $speakers = Speaker::where('workshop_id', $id)->get();

        

        $speaker_members = [];
        $speaker_non_members = [];

        foreach($speakers as $speaker){
            $member = Member::find($speaker->member_id);

            $modMember = (object)[
                'member'=> $member,
                'speaker' => $speaker
            ];

            if($member){
                array_push($speaker_members, $modMember);
            }
            else{ 
                array_push($speaker_non_members, $speaker);
            }
        }

        return view('post.addSpeaker', [
            'workshop' => $workshop,
            'members' => $members,
            'speaker_members' => $speaker_members,
            'speaker_non_members' => $speaker_non_members
        ]);
    }


    public function storeSpeaker(Request $request, $id)
    {
        $workshop = Workshop::findOrFail($id);

        $request->validate([
            'btnradio' => 'required',
            'member_id' => 'required_if:btnradio,member|exists:members,id|nullable',
            'name' => 'required_if:btnradio,not_member|nullable|string|max:255',
            'email' => 'required_if:btnradio,not_member|nullable|email',
            'institution' => 'required_if:btnradio,not_member|nullable|string|max:255',
            'profile_link' => 'nullable|url'
        ]);

        $isMember = $request->btnradio == 'member';

        $speaker = new Speaker();
        $speaker->workshop_id = $workshop->id;
        $speaker->is_member = $isMember;

        if ($isMember) {
            $speaker->member_id = $request->member_id;
        } else {
            $speaker->name = $request->name;
            $speaker->email = $request->email;
            $speaker->institution = $request->institution;
            $speaker->profile_link = $request->profile_link;
        }

        $speaker->save();

        return redirect('reporter/addSpeaker/' . $id);
    }


    public function removeSpeaker($id)
    {
        $speaker = Speaker::find($id);
        $workshop_id = $speaker->workshop_id;
        $speaker->delete();

        return redirect('reporter/addSpeaker/' . $workshop_id);
    }




    public function viewworkshops(){
        $workshops = Workshop::where('start_date', '>', now())->get();

        return view('workshops', [
            'workshops' => $workshops
        ]);
    }



    public function workshopdetails($id){
        $workshop = Workshop::find($id);

        $speakers = Speaker::where('workshop_id', $id)->get();

        $speaker_members = [];
        $speaker_non_members = [];

        foreach($speakers as $speaker){
            $member = Member::find($speaker->member_id);

            $modMember = (object)[
                'member'=> $member,
                'speaker' => $speaker
            ];

            if($member){
                array_push($speaker_members, $modMember);
            }
            else{ 
                array_push($speaker_non_members, $speaker);
            }
        }

        return view('workshopdetails', [
            'workshop' => $workshop,
            'speaker_members' => $speaker_members,
            'speaker_non_members' => $speaker_non_members
        ]);
    }

    public function view_all_workshops(){
        $workshops = Workshop::orderBy('start_date', 'desc')->get();

        return view('workshops', [
            'workshops' => $workshops
        ]);
    }
}

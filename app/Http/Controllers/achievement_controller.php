<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Achievement;
use App\Models\Member;
use App\Models\Winner;

class achievement_controller extends Controller
{
    public function createForm()
    {
        if(session('member_id' == null))
        {
            return redirect('/login')->with('error', 'Please login to continue');
        }
        
        return view('ach.create');
    }

    public function store(Request $request)
    {
        if(session('member_id') == null){
            return redirect('login')->with('error', 'You need to login first');
        }
        
        
        $request->validate([
            'competition' => 'required',
            'competition_date' => 'required',
            'rank' => 'required',
            'reff_link' => 'required',
            'story' => 'required',
        ]);

        $achievement = new Achievement();
        $achievement->competition = $request->competition;
        $achievement->competition_date = $request->competition_date;
        $achievement->rank = $request->rank;
        $achievement->reff_link = $request->reff_link;
        $achievement->story = $request->story;
        $achievement->save();

        return redirect('/reporter/achievements')->with('success', 'Achievement added successfully');
    }


    public function allAchievements()
    {
        $achievements = Achievement::all();
        return view('ach.all', ['achievements' => $achievements, 'type' => 'Achievements']);
    }




    public function addWinnerform($id)
    {
        $achievement = Achievement::find($id);
        if(session('member_id') == null){
            return redirect('login')->with('error', 'You need to login first');
        }

        $members = Member::All();

        $winners = Winner::where('achievement_id', $id)->get();
        $winner_members = [];

        foreach($winners as $winner){
            $member = Member::find($winner->member_id);

            $modMember = (object)[
                'member'=> $member,
                'winner' => $winner
            ];
            array_push($winner_members, $modMember);
                       
        }

        return view('ach.addWinner', [
            'achievement' => $achievement,
            'members' => $members,
            'winner_members' => $winner_members,
        ]);
    }


    public function storeWinner(Request $request, $id)
    {
        if(session('member_id') == null){
            return redirect('login')->with('error', 'You need to login first');
        }
        
        
        $request->validate([
            'member_id' => 'required',
        ]);

        $winner = new Winner();
        $winner->member_id = $request->member_id;
        $winner->achievement_id = $id;
        $winner->save();

        return redirect('reporter/addWinner/'.$id);
    }


    public function removeWinner($id)
    {
        if(session('member_id') == null){
            return redirect('login')->with('error', 'You need to login first');
        }

        
        $winner = Winner::find($id);
        $achievement_id = $winner->achievement_id;

        if($winner == null){
            return redirect('reporter/addWinner/'. $achievement_id)->with('error', 'Winner not found');
        }

        $winner->delete();

        return redirect('reporter/addWinner/'. $achievement_id)->with('success', 'Winner deleted successfully');
    }












    public function viewachievements()
    {
        $achievements = Achievement::orderBy('competition_date', 'desc')->get();
        return view('ach.achievements', ['achievements' => $achievements, 'type' => 'Achievements']);
    }


    public function viewwinners($id)
    {
        $achievement = Achievement::find($id);
        $winners = Winner::where('achievement_id', $id)->get();
        $winner_members = [];

        foreach($winners as $winner){
            $member = Member::find($winner->member_id);

            $modMember = (object)[
                'member'=> $member,
                'winner' => $winner
            ];
            array_push($winner_members, $modMember);
                       
        }

        return view('ach.winners', [
            'achievement' => $achievement,
            'winner_members' => $winner_members,
        ]);
    }



    public function editAchievement($id)
    {
        $achievement = Achievement::find($id);
        if(session('member_id') == null){
            return redirect('login')->with('error', 'You need to login first');
        }

        return view('ach.edit', ['achievement' => $achievement]);
    }


    public function updateAchievement(Request $request, $id)
    {
        if(session('member_id') == null){
            return redirect('login')->with('error', 'You need to login first');
        }
        
        
        $request->validate([
            'competition' => 'required',
            'competition_date' => 'required',
            'rank' => 'required',
            'reff_link' => 'required',
            'story' => 'required',
        ]);

        $achievement = Achievement::find($id);
        $achievement->competition = $request->competition;
        $achievement->competition_date = $request->competition_date;
        $achievement->rank = $request->rank;
        $achievement->reff_link = $request->reff_link;
        $achievement->story = $request->story;
        $achievement->save();

        return redirect('/reporter/achievements')->with('success', 'Achievement updated successfully');
    }


    public function deleteAchievement($id)
    {
        if(session('member_id') == null){
            return redirect('login')->with('error', 'You need to login first');
        }

        $achievement = Achievement::find($id);

        if($achievement == null){
            return redirect('reporter/achievements')->with('error', 'Achievement not found');
        }

        $achievement->delete();

        return redirect('reporter/achievements')->with('success', 'Achievement deleted successfully');
    }
}

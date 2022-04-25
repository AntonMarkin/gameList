<?php

namespace App\Http\Controllers;

use App\Http\Filters\Filter;
use App\Models\Games;
use App\Models\Genres;
use App\Models\Publishers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GetPagesController extends Controller
{
    public function GetNewRecordPage()
    {
        $genres = Genres::all();
        $publishers = Publishers::all();
        return view('new_record',compact('genres','publishers'));

    }
    public function GetEditPage($id)
    {
        $game_record = Games::find($id);
        $genres = Genres::all();
        $publishers = Publishers::all();
        return view('edit_record', compact('game_record', 'genres', 'publishers'));
    }
    public function GetListPage(Request $request)
    {
        $game_records = Games::all();
        $publishers = Publishers::all();

        $game_records = Filter::PublishersFilter($request, $game_records);
        $game_records = Filter::DateSort($request, $game_records);

        return view('list',compact('game_records', 'publishers'));
    }
    public function GetInfoPage($id)
    {
        $game_record = Games::find($id);
        return view('info', compact('game_record'));
    }
    public function GetAuthorizationPage()
    {
        return view('auth_page');
    }
    public function GetRegistrationPage()
    {
        return view('registration_page');
    }
}

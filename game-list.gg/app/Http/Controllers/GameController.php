<?php

namespace App\Http\Controllers;

use App\Models\GameList;
use Illuminate\Http\Request;

class GameController extends Controller

{
    public function NewRec()
{
    return view('newrec');
}
    public function GetList()
    {
        $records = new GameList();
        return view('list',['records' => $records->all()]);
    }
    public function GetInfo($id)
    {
        $records = new GameList();
        return view('info', ['record' => $records->find($id)]);
    }
    public function Check(Request $request)
    {
            //я дебил, нахуя я это сделал, пользователь просто не сможет сделать ошибку)
            $check = $request->validate([
                'game' => 'required|max:100',
                'genre' => 'required|max:50',
                'releaseDate' => 'required',
                'developer' => 'required|max:100',
                'rating' => 'required|min:1|max:10',
                'description' => 'required|max:500',
            ]);

        $record = new GameList();
        $record->game = $request->input('game');
        $record->genre = $request->input('genre');
        $record->releaseDate = $request->input('releaseDate');
        $record->developer = $request->input('developer');
        $record->rating = $request->input('rating');
        $record->description = $request->input('description');

        $record->save();

        return redirect()->back()->with('message','Запись сохранена');
    }
}

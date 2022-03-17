<?php

namespace App\Http\Controllers;

use App\Http\Requests\GameFormRequest;
use App\Models\Games;
use App\Models\Genres;
use App\Models\Publishers;
use App\Models\Developers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class GameController extends Controller

{
    public function NewRecord()
    {
        $genres = Genres::all();
        $publishers = Publishers::all();
        return view('new_record',compact('genres','publishers'));
    }

    public function GetEditPackage($id)
    {
        $record = Games::find($id);
        $genres = Genres::all();
        $publishers = Publishers::all();
        $image_path = $this->GetImagePath($record);
        return view('edit_record', compact('record','image_path', 'genres', 'publishers'));
    }
    public function GetList()
    {
        $records = Games::all();
        return view('list',compact('records'));
    }
    public function GetInfo($id)
    {
        $record = Games::find($id);
        $image_path = $this->GetImagePath($record);
        return view('info', compact('record', 'image_path'));
    }

    public function GetImagePath($record)
{
    if($record->image_path != null)
        $image_path = asset('/storage/' . $record->image_path);
    else
        $image_path = asset('/storage/images/no_image.png');
    return $image_path;
}

    public function SaveRecord(Games $games, GameFormRequest $request, $img_save)
    {
        $genres = $request->get('genres');

        $games->game_name = $request->get('game');
        $games->publisher_id = $request->get('publisher');
        $games->developer_id = $request->get('developer');
        $games->release_date = $request->get('release_date');
        $games->rating = $request->get('rating');
        $games->description = $request->get('description');

        if($img_save == 0) {
            if ($request->file('image') != null) {
                $path = Storage::disk('public')->putFile('images', $request->file('image'));
                $games->image_path = $path;
            } else {
                $games->image_path = null;
            }
        }
        $games->save();
        $games->genres()->attach($genres);
    }
    public function SaveNewRecord(GameFormRequest $request)
    {
        try
        {
            $games = new Games();
            $this->SaveRecord($games,$request,0);
            return redirect()->back()->with('message','Запись сохранена');
        }
        catch (\Exception $e)
        {
            return redirect()->back()->with('error',$e);
        }
    }

    public function EditRecord($id, GameFormRequest $request)
    {
        try
        {
            $games = Games::find($id);
            $img_save = $request->get('img_save');
            $this->SaveRecord($games, $request,$img_save);
            return redirect()->back()->with('message','Запись сохранена');
        }
        catch (\Exception $e)
        {
            return redirect()->back()->with('error',$e);
        }
    }
    public function DeleteRecord()
    {

    }
}

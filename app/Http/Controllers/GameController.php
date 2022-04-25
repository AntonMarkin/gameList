<?php

namespace App\Http\Controllers;

use App\Http\Filters\Filter;
use App\Http\Requests\GameFormRequest;
use App\Http\Requests\RegisterAuthRequest;
use App\Http\Requests\AuthRequest;
use App\Models\Games;
use App\Models\Genres;
use App\Models\User;
use App\Models\Publishers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use PHPUnit\Exception;

class GameController extends Controller

{
    public function SaveRecord(Games $game, $request, $deleteImage)
    {
        $genres = $request->get('genres');

        $game->game_name = $request->get('game');
        $game->publisher_id = $request->get('publisher');
        $game->developer_id = $request->get('developer');
        $game->release_date = $request->get('release_date');
        $game->rating = $request->get('rating');
        $game->description = $request->get('description');

        if ($request->file('image') != null)
        {
            $game->image_path = Storage::disk('public')->putFile('images', $request->file('image'));
        }
        else if ($deleteImage == 1)
        {
            Storage::disk('public')->delete($game->image_path);
            $game->image_path = null;
        }

        $game->save();
        $game->genres()->detach();
        $game->genres()->attach($genres);
    }

    public function SaveNewRecord(GameFormRequest $request)
    {
        try {
            $game = new Games();
            $this->SaveRecord($game, $request, 1);
            return redirect()->back()->with('message', 'Запись сохранена');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e);
        }
    }

    public function EditRecord($id, GameFormRequest $request)
    {
        try {
            $game = Games::find($id);
            $deleteImage = $request->get('deleteImage');
            if ($request->get('delete') == 0) {
                $this->SaveRecord($game, $request, $deleteImage);
                return redirect('/info/' . $id)->with('message', 'Запись сохранена');
            } else return $this->DeleteRecord($game);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e);
        }
    }

    public function DeleteRecord(Games $game)
    {
        $game->genres()->detach();
        $game->delete();
        return redirect('/')->with('message', 'Запись удалена');
    }

//кал
    public function Registration(RegisterAuthRequest $request)
    {
        try {
            User::create([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'password' => Hash::make($request->get('password')),
                'unhash_password' => $request->get('password')
            ]);

            return redirect('/auth')->with('message', 'Регистрация прошла успешно');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e);
        }
    }

    public function Authorizaton(Request $request)
    {
        $email = $request->get('email');
        $pass = $request->get('password');
        if (!Auth::attempt(['email' => $email, 'password' => $pass], $request->get('remember'))) {
            return back()->withErrors([
                'email' => 'email trouble',
                'password' => 'password is invalid'
            ]);
        }
        $request->session()->regenerate();
        return redirect('/');
    }

    public function Logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('message', 'Вы вышли');
    }
}

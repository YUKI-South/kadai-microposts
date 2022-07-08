<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MicropostsController extends Controller
{
    public function index()
    {
        $data = [];
        if (\Auth::check()) {//認証済みの場合
        //認証済みユーザを取得
        $user = \Auth::user();
        //ユーザの投稿の一覧を作成日時の降順で取得
        $microposts = $user->microposts()->orderBy('created_at', 'desc')->paginate(10);
    
        $data = [
            'user' => $user,
            'microposts' => $microposts,
            
            ];
            
        }
        
        //Welcomeビューでそれらを表示
        return view('welcome', $data);
    }
    
    public function store(Request $request) 
    {
        //バリデーション
        $request->validate([
                'content' => 'required|max:255',
            ]);
            
            $request->user()->microposts()->create([
                    'content' => $request->content,
                ]);
                
                return back();
    }
    
    public function destroy($id)
    {
        $microposts = App\Micropost::findOrFail($id);
        
        if(\Auth::id() === $microposts->user_id) 
        {
            $microposts->deleate();
            
        }
        
        return back();
    }
    
    public function show($id) {
        $user = User::findOrFail($id);
        
        $user->loadRelationshipCounts();
        
        $microposts = $user->microposts()->orderBy('created_at', 'desc')->paginate(10);
        
        return view('users.show', [
                'user' => $user,
                'microposts' => $microposts,
            ]);
        
        
    }
}

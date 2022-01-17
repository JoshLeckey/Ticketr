<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Tickets;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use App\Category;
use App\Models\User;

class Admin extends Controller
{
    public function __construct()
    {
    $this->middleware('auth');
    }
    
    public function isAdmin(){
        if(Auth::user()->is_admin == 1){
            return 1;
        }
        else{
            return 0;
        }
    }
    
    public function postSettings(Request $rq){
        $categories = Category::paginate(4);
        if($rq->input('name') != null){
            config(['app.name' => $rq->input('name')]);
        }
        if($rq->hasFile('logo')){
            $file = $rq->file('logo');
            $name = 'logo.png';
            $file->move(public_path().'/images/', $name);
        }
        if($rq->hasFile('favicon')){
            $file = $rq->file('favicon');
            $name = 'favicon.ico';
            $file->move(public_path(), $name);
        }
        if($rq->input('categoryadd') != null){
            $newcat = new Category(['name' => $rq->input('categoryadd')]);
            $newcat->save();
        }
        if($rq->input('categoryremove') != null){
            $cat5 = Category::where('name', $rq->input('categoryremove'))->delete();
        }
        return view('dashboard.asettings', compact('categories'));
    }
    
    public function settings(){
            $categories = Category::paginate(4);
         if(self::isAdmin() === 1){
            return view('dashboard.asettings', compact('categories')); 
         }
         else{
             return view('dashboard');
         }
    }
    
    public function users(){
        $users = User::paginate(10);
        $tickets = Tickets::all();
        if(self::isAdmin() === 1){
            return view('dashboard.ausers' , compact('users', 'tickets'));
         }
         else{
             return view('dashboard');
         }
        
    }
    
    public function viewTickets(){
               if(self::isAdmin() === 1){
            return view('dashboard.atickets');
         }
         else{
             return view('dashboard');
         }
    }
    
    public function userSubmit(Request $rq){
        if($rq->input('User')){
            $chanuser = User::where('id', $rq->input('user_id'))->first();
            $chanuser->is_admin = 0;
            $chanuser->save();
        }
        if($rq->input('Agent')){
            $chanagent = User::where('id', $rq->input('user_id'))->first();
            $chanagent->is_admin = 2;
            $chanagent->save();
        }
        if($rq->input('Admin')){
            $chanadmin = User::where('id', $rq->input('user_id'))->first();
            $chanadmin->is_admin = 1;
            $chanadmin->save();
        }
        if($rq->input('usersearch')){
            return redirect('/dashboard/admin/users/' . $rq->input('usersearch'));
        }
        $users = User::paginate(10);
        $tickets = Tickets::all();
        return view('dashboard.ausers' , compact('users', 'tickets'));
        
    }
    
    public function userSearch($rq){
        $users = User::where('name', $rq)->paginate(10);
                $tickets = Tickets::all();
        return view('dashboard.usearch' , compact('users', 'tickets'));
    }
    
    public function check(){
        $name = 'Admin';
        $graph = array();
        $date = array();
        if(Auth::user()->is_admin){
            for($i=0;$i<=7;$i++){
                $graph[] = Tickets::select('*')->whereDate('created_at', Carbon::now()->subDays($i))->get();
                $date[] = Carbon::now()->subDays($i)->format('d-m');
            }
                $chart = (new LarapexChart)->areaChart()
    ->addData('Tickets', [count($graph[6]), count($graph[5]), count($graph[4]), count($graph[3]), count($graph[2]), count($graph[1]),count($graph[0])])
    ->setColors(['#3B82F6', '#ff6384'])
    ->setXAxis([$date[6], $date[5], $date[4], $date[3], $date[2], $date[1], $date[0]]);
    

            return view('dashboard.admin', compact('chart','name'));
        }
        else{
            return view('dashboard');
        }
    }
}

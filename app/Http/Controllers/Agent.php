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
class Agent extends Controller
{
    public function isAdmin(){
        if(Auth::user()->is_admin == 2){
            return 1;
        }
        else if(Auth::user()->is_admin == 1){
           return 1;
        }
        else{
            return 0;
        }
    }
    
    public function check(){
        $name = 'Agent';
        if(Auth::user()->is_admin == 0){
            return view('dashboard');
        }
        else{
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
    

            return view('dashboard.admin', compact('chart', 'name'));
        }
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
}

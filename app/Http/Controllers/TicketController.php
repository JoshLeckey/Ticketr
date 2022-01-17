<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Category;
use App\Tickets;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Mailers\AppMailer;
use Illuminate\Support\Str;
use App\Comment;
use \Illuminate\Http\UploadedFile;
use File;
use Illuminate\Support\Facades\Input;
use View;
use App\Models\User;

class TicketController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function check(){
        $fake = new Tickets();
        $tickets = DB::Table("tickets")->select('*')->where('status', 'open')->get();
        $comments = Comment::whereIn('id', function($query){
            $query
            ->from('comments')
            ->select(DB::raw('MAX(id) as id'))
            ->groupBy('tickets_id');
        })->get();
        foreach($tickets as $ticket){
            foreach($comments as $comment){
                if($ticket->user_id == Auth::user()->id)
                if($comment->tickets_id == $ticket->id){
                    if($comment->user_id == Auth::user()->id){
                    }
                    else{
                        return view('dashboard', compact('ticket'));
                    }
                }
                else{
            
                }
            }
        }
        return view('dashboard', compact('fake'));
    }
    
    public function create(){
        $categories = Category::all();
        return view('dashboard.createticket', compact('categories'));
    }
    
    public function Dashboard(){
        $user = Auth::user();
        $ticket = Tickets::where('user_id', $user->id)->get();
        $numtickets = count($ticket);
        return redirect('/dashboard/view/' . $tid);
        return view('dashboard', compact('numticket'));
    }
    
    public function store(Request $rq){
    $tid = strtoupper(Str::random(10));
    if($rq->hasFile('image')) {
        $file = $rq->file('image');
        $name = $tid. '.' .$file->getClientOriginalExtension();
        $file->move(public_path().'/images/', $name);
    }
        $ticket = new Tickets(['title' => $rq->input('title'), 'user_id' => Auth::user()->id, 'ticket_id' =>$tid, 'category_id'  => $rq->input('category'), 'priority' => $rq->input('priority'),'message' => $rq->input('message'),'status'=> "Open",]);
        $ticket->save();

        return redirect('/dashboard/view/' . $tid);
    }
    
    public function retrieve($ticket_id){
        $user=Auth::user();
            $ticket = Tickets::where('ticket_id', $ticket_id)->firstOrFail();
            $category = $ticket->category;
            $comments = $ticket->comments;
            return view('dashboard.viewticket', compact('ticket', 'category', 'comments'));
    }
    
        public function isAdmin(){
        if(Auth::user()->is_admin == 1){
            return 1;
        }
        if(Auth::user()->is_admin == 2){
            return 1;
        }
        else{
            return 0;
        }
    }
    
    public function closeticket($id){
        $ticket = Tickets::where('ticket_id', $id)->firstOrFail();
        $ticket->status = 'Closed';
        $ticket->save();
        return redirect('/dashboard/view/' . $id);
    }
    
    public function viewall(){
         //Update 
         /* $tickets = DB::table('tickets')->join('comments', function($join){
              $join->on('tickets.id', '=', 'comments.tickets_id')->select(DB::raw('Max(id) as id'));
              
          })->where('tickets.user_id',Auth::user()->id)->orderBy('comments.updated_at')->paginate(10);   
          $tickets->max('comments.id');*/
                  /*$tickets = Tickets::join('comments.tickets_id', '=', 'tickets.id')->whereIn('id', function ($query)){
            $query
                ->from('tickets')
                ->select(Db::raw('Max(id)as id')
                ->groupBy('id')
        )->get());*/
        $categories = Category::all();
        $tickets = Tickets::where('user_id',Auth::user()->id)->orderBy('status', 'desc')->paginate(10);
        return view('dashboard.tickets', compact('tickets', 'categories'));
        
    }
    
    
    public function atickSub(Request $rq){
        $name = 'active';
        $categories = Category::all();
        if($rq->input('open')){
            $ticket = Tickets::where('ticket_id', $rq->input('ticket_id'))->firstOrFail();
            $ticket->status = 'Open';
            $ticket->save();
        }
        if($rq->input('close')){
            $ticket = Tickets::where('ticket_id', $rq->input('ticket_id'))->firstOrFail();
            $ticket->status = 'Closed';
            $ticket->save();
        }
        if($rq->input('ticketid')){
            $user = User::where('name', $rq->input('ticketid'))->first();
            if($user == null){
             $tickets = Tickets::where('ticket_id', $rq->input('ticketid'))->paginate(10);  
             return view('dashboard.atickets', compact('tickets', 'categories', 'name'));
            }
            if($user != null){
                return redirect('/dashboard/admin/tickets/users/' . $rq->input('ticketid'));
            
            }
        }
        $tickets = Tickets::where('user_id',Auth::user()->id)->paginate(10);
        
        return view('dashboard.atickets', compact('tickets', 'categories', 'name'));
            
        }
        
    public function userSub(Request $rq){
        $uri = $rq->fullUrl();
        $name = 'active';
        $categories = Category::all();
        if($rq->input('open')){
            $ticket = Tickets::where('ticket_id', $rq->input('ticket_id'))->firstOrFail();
            $ticket->status = 'Open';
            $ticket->save();
        }
        if($rq->input('close')){
            $ticket = Tickets::where('ticket_id', $rq->input('ticket_id'))->firstOrFail();
            $ticket->status = 'Closed';
            $ticket->save();
        }
        if($rq->input('ticketid')){
            $user = User::where('name', $rq->input('ticketid'))->first();
            if($user == null){
             $tickets = Tickets::where('ticket_id', $rq->input('ticketid'))->paginate(10);  
             return view('dashboard.atickets', compact('tickets', 'categories', 'name'));
            }
            if($user != null){
                return redirect('/dashboard/admin/tickets/users/' . $rq->input('ticketid'));
            
            }
        }
        $tickets = Tickets::where('user_id',Auth::user()->id)->paginate(10);
        
        return redirect($uri);
            
        }
    
    public function activeSub(Request $rq){
        if($rq->input('open')){
            $ticket = Tickets::where('ticket_id', $rq->input('ticket_id'))->firstOrFail();
            $ticket->status = 'Open';
            $ticket->save();
        }
        if($rq->input('close')){
            $ticket = Tickets::where('ticket_id', $rq->input('ticket_id'))->firstOrFail();
            $ticket->status = 'Closed';
            $ticket->save();
        }
        $tickets = Tickets::where('user_id',Auth::user()->id)->where('status', 'Open')->paginate(10);
        $categories = Category::all();
        return view('dashboard.active', compact('tickets', 'categories'));
    }
    
    
    public function active(){
        if(self::isAdmin() === 1){
                $tickets = Tickets::where('status','Open')->paginate(10);
                $categories = Category::all();
                return view('dashboard.active', compact('tickets', 'categories'));
         }
         else{
             return view('dashboard');
         }
    }
    
    public function users($rq){
                $categories = Category::all();
                $user = User::where('name', $rq)->firstOrFail();
                $tickets = Tickets::where('user_id', $user->id)->paginate(10);
             return view('dashboard.tickusers', compact('tickets', 'categories'));
    }
    
    public function atickets(){
        if(self::isAdmin() === 1){
                $tickets = Tickets::paginate(10);
                $categories = Category::all();
                return view('dashboard.atickets', compact('tickets', 'categories'));
         }
         else{
             return view('dashboard');
         }

    }
}

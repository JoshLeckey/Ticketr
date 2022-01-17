<?php
namespace App\Http\Controllers;

use App\Model\User;
use App\Ticket;
use App\Comment;
use App\Http\Requests;
use App\mailers\AppMailer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
	/**
	 * Persist comment and mail user
	 * @param  Request  $request
	 * @param  AppMailer $mailer
	 * @return Response
	 */
    public function postComment(Request $request, AppMailer $mailer)
    {
                echo '<script type="text/javascript">toastr.success("Message Sent")</script>';

            $this->validate($request, [
        'comment'   => 'required'
    ]);
        
        $tuid = $request->input('url_id');
        $comment = Comment::create([
        	'tickets_id' => $request->input('ticket_id'),
        	'user_id'	=> Auth::user()->id,
        	'comment'	=> $request->input('comment'),
        ]);

       $comment = Comment::latest()->first();
       $cid = $comment->id;
       if($request->hasFile('image')) {
        $file = $request->file('image');
        $name = $tuid. $cid. '.' .$file->getClientOriginalExtension();
        $file->move(public_path().'/images/', $name);
    }
        
        return redirect('/dashboard/view/' . $tuid);

    }
}
?>
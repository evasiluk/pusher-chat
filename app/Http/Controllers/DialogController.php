<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\Events\MessageSent;

class DialogController extends Controller
{
    public function __construct()
	{
		$this->middleware("auth");
	}
	
	public function index()
	{
		return view('dialog');
	}
	
	public function fetchMessages()
	{
		return Message::with('user')->get();
	}
	
	public function sendMessage()
	{
		$user = auth()->user();
		$message = request()->input("message");
		
		$newMessage = $user->messages()->create(["message" => $message]);
		
		broadcast(new MessageSent($user, $newMessage))->toOthers();
		
		return ["Message Send!"];
	}
	
}

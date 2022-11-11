<?php

namespace App\Http\Livewire\Chat;

use Livewire\Component;
use App\Models\Message;
use App\Models\User;

class ChatForm extends Component
{

    public $message;
    public $allmessages;
    public $sender;


    public function render()
    {
        $usuarios  = User::where('status',1)->orderBy('id','ASC')->get();
        $sender =$this->sender;
        $this->allmessages;



        return view('livewire.chat.chat-form',compact('usuarios','sender'));
    }
    public function mountdata()
    {
        if(isset($this->sender->id))
        {
              $this->allmessages= Message::where('user_id',auth()->id())
                                        ->where('receiver_id',$this->sender->id)
                                        ->orWhere('user_id',$this->sender->id)
                                        ->where('receiver_id',auth()->id())
                                        ->orderBy('id','desc')->get();

               $not_seen= Message::where('user_id',$this->sender->id)->where('receiver_id',auth()->id());
               $not_seen->update(['is_seen'=> true]);


        }

    }
    public function resetForm()
    {
        $this->message='';
    }

    public function SendMessage()
    {
        $data= new Message;
            $data->message= $this->message;
            $data->user_id=auth()->id();
            $data->receiver_id=$this->sender->id;

            $data->save();

        $this->resetForm();
    }
    public function getUser($userId)
    {
       $user=User::find($userId);
       $this->sender=$user;
       $this->allmessages=Message::where('user_id',auth()->id())
                                    ->where('receiver_id',$userId)
                                    ->orWhere('user_id',$userId)
                                    ->where('receiver_id',auth()->id())
                                    ->orderBy('id','desc')->get();
    }
}

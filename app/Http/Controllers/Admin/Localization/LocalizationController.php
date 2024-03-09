<?php

namespace App\Http\Controllers\Admin\Localization;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Localization\Variable;
use App\Models\Localization\Message;


class LocalizationController extends Controller
{
    // labels
    public function labels(){
        $labels = Variable::orderBy('created_at', 'desc')->get();
        return view('admin.localization.label',compact('labels'));
    }

    public function addLabel(Request $request){
        $label = new Variable();
        $label->key_name = $request->keyName;
        $label->english = $request->englishName;
        $label->pashto = $request->pashtoName;
        $label->dari = $request->dariName;

        if($label->save()){
            return back()->with('success', __('msg.success'));
        }else{
            return back()->with('error', __('msg.failed'));
        }
    }

    public function editLabel($id){
        $label =  Variable::find($id);
        return response()->json($label);
    }

    public function updateLabel(Request $request){
        $label =  Variable::find($request->id);
        $label->key_name = $request->keyName;
        $label->english = $request->englishName;
        $label->pashto = $request->pashtoName;
        $label->dari = $request->dariName;

        if($label->save()){
            return back()->with('success', __('msg.updated'));
        }else{
            return back()->with('error', __('msg.failed'));
        }
    }

    public function deleteLabel($id){
        $label =  Variable::find($id);
        if($label->delete()){
            return back()->with('success', __('msg.deleted'));
        }else{
            return back()->with('error', __('msg.failed'));
        }
    }


    // Messages

    public function messages(){
        $messages = Message::orderBy('created_at', 'desc')->get();
        return view('admin.localization.message',compact('messages'));
    }

    public function addMessage(Request $request){
        $message = new Message();
        $message->key_name = $request->keyMessage;
        $message->english = $request->englishMessage;
        $message->pashto = $request->pashtoMessage;
        $message->dari = $request->dariMessage;

        if($message->save()){
            return back()->with('success', __('msg.success'));
        }else{
            return back()->with('error', __('msg.failed'));
        }
    }

    public function editMessage($id){
        $message =  Message::find($id);
        return response()->json($message);
    }

    public function updateMessage(Request $request){
        $message = Message::find($request->id);
        $message->key_name = $request->keyMessage;
        $message->english = $request->englishMessage;
        $message->pashto = $request->pashtoMessage;
        $message->dari = $request->dariMessage;

        if($message->save()){
            return back()->with('success', __('msg.updated'));
        }else{
            return back()->with('error', __('msg.failed'));
        }
    }

    public function deleteMessage($id){
        $message = Message::find($id);
        if($message->delete()){
            return back()->with('success', __('msg.deleted'));
        }else{
            return back()->with('error', __('msg.failed'));
        }
    }

}

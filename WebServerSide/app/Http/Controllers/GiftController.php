<?php

namespace App\Http\Controllers;

use App\Models\Gift;
use App\Models\User;
use Illuminate\Http\Request;

class GiftController extends Controller
{
    public function getAllGiftsView() {
        $searchGift = request()->searchGift;
        $searchRecipient = request()->searchRecipient;


        if($searchGift){
            $gifts = Gift::where('gift_name','LIKE', "%$searchGift%")->get();
        } else if($searchRecipient){
            $gifts = Gift::join('users', 'gifts.user_id', '=', 'users.id')
            ->where('users.name', 'LIKE', "%$searchRecipient%")
            ->select('gifts.*')
            ->get();
        }
        else {
            $gifts = Gift::all();
        }

        return view('giftViews.show_gifts', compact('gifts'));
    }

    public function getAddGiftView() {
        $users = User::all();

        return view('giftViews.add_gift', compact('users'));
    }

    public function displayGift($id){
        $gift = Gift::where('id', $id)->first();
        $users = User::all();

        return view('giftViews.display_gift', compact('gift','users'));
    }

    public function createGift(Request $request) {
        if (isset($request->id)) {
          $request->validate([
                'gift_name' => 'required|string|max:100',
                'expected_value' => 'required|numeric|min:0',
                'expected_value' => 'required|numeric|min:0',
          ]);

         $gift = Gift::where('id', $request->id)->update([
                'gift_name' => $request->gift_name,
                'expected_value' => $request->expected_value,
                'money_spent' => $request->money_spent,
                'user_id' => $request->user_id
            ]);

            return redirect()->route('gift.showAllGifts')->with('message', 'Gift updated successfully');
        } else {
            $request->validate([
                'gift_name' => 'required|string|max:100',
                'expected_value' => 'required|numeric|min:0',
                'user_id' => 'required|exists:users,id',
            ]);

            Gift::create([
                'gift_name' => $request->gift_name,
                'expected_value' => $request->expected_value,
                'user_id' => $request->user_id
            ]);

            return redirect()->route('gift.showAllGifts')->with('message', 'Gift added successfully');
        }
    }

    public function deleteGift($id) {
        Gift::where('id', $id)->delete();

        return back()->with('message', 'Gift deleted successfuly');
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Array_;

class SenderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $number = $request->input('number');
        $message = $request->input('message');
        $token = $request->input('token');
        return $this->sendMessage($number,$message, $token);
    }

    public function RandomGenerator(){
        return rand(0,9) ."-".rand(0,9)."-".rand(0,9)."-".rand(0,9)."-".rand(0,9)."-".rand(0,9);
//        for ($x = 0; $x <= 10; $x++){
//            $randCode = "";
//            $randCode .=  rand(0,9) ."-";
//        }
//        return $randCode;

    }

    public function sendMessage($number, $message, $tokens){
        /** @var string $id */
        $id = "AC1a77b37a9182d6058967fbaee8cbccd0";
        /** @var string $token */
        $token = $tokens;
        /** @var string $url */
        $url = "https://api.twilio.com/2010-04-01/Accounts/$id/SMS/Messages.json";
        /** @var string $from */
        $from = "whatsapp:+14155238886";
        /** @var string $to */
        $to = $number;
        /** @var message $body */
        $body = "$message";
        /** @var Array_ $data */
        $data = array (
            'From' => $from,
            'To' => $to,
            'Body' => $body,
        );
        $post = http_build_query($data);
        $x = curl_init($url );
        curl_setopt($x, CURLOPT_POST, true);
        curl_setopt($x, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($x, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($x, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($x, CURLOPT_USERPWD, "$id:$token");
        curl_setopt($x, CURLOPT_POSTFIELDS, $post);
        $y = curl_exec($x);
        curl_close($x);
        return json_decode($y,true);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

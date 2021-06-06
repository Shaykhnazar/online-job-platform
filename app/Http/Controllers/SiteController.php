<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;

class SiteController extends Controller
{
    /**
     * Show the application main page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function main()
    {
        return view('new_test.index');
    }

    /**
     * Show the application about-us page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function about_us()
    {
        return view('frontend.about-us');
    }

    /**
     * Show the application contact page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function contact()
    {
        return view('frontend.contact');
    }

    /**
     * Show the application contact page.
     *
     * @param ContactRequest $request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function contactSubmit(ContactRequest $request)
    {
        $response_text = '';

        $to = 'shayx3470941@gmail.com';
        $name = $request->name;
        $email= $request->email;
        $text= $request->message;
        $subject= $request->subject;


        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= "From: " . $email . "\r\n"; // Sender's E-mail
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        $message ='<table style="width:100%">
                        <tr>
                            <td>'.$name.'</td>
                        </tr>
                        <tr><td>Email: '.$email.'</td></tr>
                        <tr><td>Subject: '.$subject.'</td></tr>
                        <tr><td>Text: '.$text.'</td></tr>

                    </table>';

        if (@mail($to, $email, $message, $headers))
        {
            $response_text = 'The message has been sent.';
        }else{
            $response_text =  'failed';
        }
        return redirect()->back()->with(['message' => $response_text] );
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Partenaire;
use App\Contenu;

class ContactController extends Controller
{
    public function index() {

        $fondateurs  = Partenaire::all()->where('type', 'fondateur');
        $signataires = Partenaire::all()->where('type', 'signataire');
        $partenaires = Partenaire::all()->where('type', 'partenaire');
        $content = Contenu::firstOrFail()->get();

        return view('contact', [
            'fondateurs' => $fondateurs,
            'signataires' => $signataires,
            'partenaires' => $partenaires,
            'content' => $content[0],
        ]);
    }

    public function submit(Request $request) {
        
        $firstname = request('firstname');
        $lastname = request('lastname');
        $mail = request('mail');
        $category = request('category');
        $destinatairesArray = request('destinataire');
        $content = htmlspecialchars( request('message'));
        


        
        $to = "";
        if(count($destinatairesArray) > 1) {
            foreach($destinatairesArray as $destinataire) {
                $to .= $destinataire . ', ';
            }
            $to = substr($to, 0, -2);
        } else {
            $to = $destinatairesArray[0];
        }

        $subject = 'Message depuis le formulaire de contact Passerelle Numérique';

        $message = "
        <html>
        <head>
        <title>Message depuis Passerelle Numérique</title>
        </head>
        <body>
        <h2>Bonjour</h2>
        <p>Vous avez reçu le message suivant de la part de $firstname $lastname ($category) < $mail > : </p>
        <p>$content</p>
        </body>
        </html>
        ";

        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=utf8';

        $headers[] = 'From: Passerelle Numérique';

        mail($to, $subject, $message, implode("\r\n", $headers));

        return back();

    }
}

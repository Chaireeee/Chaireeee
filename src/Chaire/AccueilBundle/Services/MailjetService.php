<?php


namespace Chaire\AccueilBundle\Services;


class MailjetService
{

    public function addtomailjet($email,$idlist)
    {
        $mj= new Mailjet();

        $params = array(
            'method' => 'POST',
            'contact' => $email,
            'id' => $idlist
        );

        $response = $mj->listsAddContact($params);


        return $contact_id = $response->contact_id;


    }

}



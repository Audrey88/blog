<?php
namespace App\Mailer;

use Cake\Mailer\Mailer;

class UserMailer extends Mailer
{
    public function welcome($user)
    {
        $this
            ->to($user->email)
            ->from('audrey@gmail.com', 'Blod d\'Audrey')
            ->subject(sprintf('Bienvenue', $user->firstname))
            ->template('default');// Par défaut le template avec le même nom que le nom de la méthode est utilisé.
    }

}
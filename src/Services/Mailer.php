<?php

namespace App\Services;

use App\Entity\Contact;
use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;

/**
 * Class Mailer
 *
 * @author Olivier Maréchal <o.marechal@icloud.com>
 */
class Mailer
{
    /** @var \Swift_Mailer */
    private $mailer;

    /** @var EngineInterface */
    private $templating;

    /** @var string */
    private $recipient;

    /**
     * @param \Swift_Mailer   $mailer
     * @param EngineInterface $templating
     * @param string          $recipient
     */
    public function __construct(\Swift_Mailer $mailer, EngineInterface $templating, string $recipient)
    {
        $this->mailer = $mailer;
        $this->templating = $templating;
        $this->recipient = $recipient;
    }

    /**
     * @param Contact $contact
     */
    public function sendContactMessage(Contact $contact)
    {
        $message = (new \Swift_Message('Contact'))
            ->setFrom($contact->getEmail())
            ->setTo($this->recipient)
            ->setBody(
                $this->templating->render('email/contact.html.twig', ['contact' => $contact]),
                'text/html'
            )
        ;

        $this->mailer->send($message);
    }
}

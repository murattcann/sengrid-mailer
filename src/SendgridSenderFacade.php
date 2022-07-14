<?php
namespace Murattcann\SendgridMailer;
use Illuminate\Support\Facades\Facade;

class SendgridMailerFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return "sendgrid-sender";
    }
}

<?php
namespace Bakery\Emails;
use Bakery\Repositories\OrderRepo;
use Bakery\Repositories\BakeryRepo;
use Mail;

class Email {




	public function invoiceEmail(){

		$data = ['hola'];
		//Mail::send('emails.template', $data, function ($message) use ($user){
		Mail::send('emails/invoices/invoice', $data, function ($message){
		    $message->subject('Aqui va el mensaje del asunto del email ');
		    $message->to('jeffer.8a@gmail.com');
		});
	}

}
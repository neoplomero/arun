<?php
namespace Bakery\Emails;
use Bakery\Repositories\OrderRepo;
use Bakery\Repositories\BakeryRepo;
use Hashids;
use Mail;

class Email {




	public function invoiceEmail($id, $customerEmail){

		//$id = Hashids::encode($id);
		$data = array('id' => $id);
		Mail::send('emails/invoices/invoice', $data, function ($message) use ($id, $customerEmail){
		    $message->subject('Invoice');
		    $message->to($customerEmail);
		});
	}

}
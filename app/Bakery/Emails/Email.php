<?php
namespace Bakery\Emails;
use Bakery\Repositories\OrderRepo;
use Bakery\Repositories\BakeryRepo;
use Hashids;
use Mail;

class Email {


	public function __construct(OrderRepo $OrderRepo){
		$this->OrderRepo = $OrderRepo;
	}

	public function invoiceEmail($id, $customerEmail){

		$data = $this->OrderRepo->find($id);
		$data->id = Hashids::encode($id);
        $date = Format::date($order->delivery_date);
		Mail::send('emails/invoices/invoice', $data, function ($message) use ($id, $customerEmail, $date){
		    $message->subject('Invoice: '. $date);
		    $message->to([$customerEmail, 'bakeryarunfinance@gmail.com']);
		});
	}

}
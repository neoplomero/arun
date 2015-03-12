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

		$order = $this->OrderRepo->find($id);
		$id = Hashids::encode($id);
        $date = \Format::date($order->delivery_date);
        $customer = $order->customer->full_name;
        $data = [];
        $data['customer'] = $order->customer->full_name;
        $data['date'] = $date;
        $data['id'] = $id;
		Mail::send('emails/invoices/invoice', $data, function ($message) use ($id, $customerEmail, $date, $customer){
		    $message->subject('Invoice: '. $date);
		    $message->to([$customerEmail, 'bakeryarunfinance@gmail.com']);
		});
	}

}	
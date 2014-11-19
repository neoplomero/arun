<?php


use Bakery\Repositories\ProductRepo;
use Bakery\Managers\ProductManager;



class ProductsController extends BaseController{
	
	protected $productRepo;

	public function __construct(ProductRepo $productRepo){
		$this->productRepo = $productRepo;
	}

	public function productsList()
	{
		$productsList = $this->productRepo->getList();
		return View::make('products/list', compact('productsList'));
	}

	public function register()
	{
		return View::make('products/register');
	}

	public function create()
	{

		$product = $this->productRepo->newProduct();
		$manager = new ProductManager($product, Input::all());
		$manager->save();
	
		return Redirect::route('products');
	}

	public function view($id)
	{
		$product = $this->productRepo->find($id);
		$this->notFoundUnless($product);

		return View::make('products/update', compact('product'));
	}
	public function update()
	{
		$id = Input::get('id');
		$product = $this->productRepo->find($id);
		$this->notFoundUnless($product);
		$manager = new ProductManager($product, Input::all());
		$manager->save();
		return Redirect::route('products');

	}

}
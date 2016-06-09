<?php namespace App\Http\Controllers;

use App\Model\Nobid;
use Illuminate\Http\Request;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		// $this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{

		// Testing Method
		// $nobid = Nobid::getNoBid('dsa');
		// dd($nobid);

		// global $xmlrequest;
		// $endpoint = 'http://svcs.ebay.com/services/search/FindingService/v1';  // URL to call
		// $query = 'jean';  // Supply your own query keywords as needed

		// // Create a PHP array of the item filters you want to use in your request
		// $filterarray =
		//   array(
		//     array(
		//     'name' => 'MaxPrice',
		//     'value' => '25',
		//     'paramName' => 'Currency',
		//     'paramValue' => 'USD'),
		//     array(
		//     'name' => 'FreeShippingOnly',
		//     'value' => 'true',
		//     'paramName' => '',
		//     'paramValue' => ''),
		//     array(
		//     'name' => 'CategoryID',
		//     'value' => 58058,
		//     'paramName' => '',
		//     'paramValue' => ''),
		//     array(
		//     'name' => 'ListingType',
		//     'value' => array('AuctionWithBIN'), //This will search No Bid Products 
		//     // 'value' => array('AuctionWithBIN','FixedPrice','StoreInventory'),
		//     'paramName' => '',
		//     'paramValue' => ''),
		//   );

		//   $xmlfilter = Nobid::buildXMLFilter($filterarray);

		//   // Construct the findItemsByKeywords POST call
		// 	// Load the call and capture the response returned by the eBay API
		// 	// the constructCallAndGetResponse function is defined below
		// 	$resp = simplexml_load_string(Nobid::constructPostCallAndGetResponse($endpoint, $query, $xmlfilter));

		// 	// print_r($resp->searchResult->item); exit();

		// 	// Check to see if the call was successful, else print an error
		// 	if ($resp->ack == "Success") {
		// 	  $results = '';  // Initialize the $results variable

		// 	  // Parse the desired information from the response
		// 	  foreach($resp->searchResult->item as $item) {
		// 	    $pic   = $item->galleryURL;
		// 	    $link  = $item->viewItemURL;
		// 	    $title = $item->title;

		// 	    // Build the desired HTML code for each searchResult.item node and append it to $results
		// 	    $results .= "<tr><td><img src=\"$pic\"></td><td><a href=\"$link\">$title</a></td></tr>";
		// 	  }
		// 	}
		// 	else {  // If the response does not indicate 'Success,' print an error
		// 	  $results  = "<h3>Oops! The request was not successful. Make sure you are using a valid ";
		// 	  $results .= "AppID for the Production environment.</h3>";
		// 	}

		// 	dd($results);

		// 	$constructPostCallAndGetResponse = Nobid::constructPostCallAndGetResponse($endpoint, $query, $xmlfilter);
		  

		// Get All categories
		// $categories = "http://open.api.ebay.com/Shopping?callname=GetCategoryInfo&appid=ImranSid-ebay-PRD-78a129233-cbd9ed2e&siteid=3&CategoryID=-1&version=729&IncludeSelector=ChildCategories";

		// print_r($results); exit();


		return view('home');
	}

	public function getNoBid()
	{
		$countries = Nobid::getCountries();

		$categories = Nobid::getCategories();


		// Get Ebay Main Cateories
		// $category_url = 'http://open.api.ebay.com/Shopping?callname=GetCategoryInfo&appid=ImranSid-ebay-PRD-78a129233-cbd9ed2e&siteid=1&CategoryID=-1&version=729&IncludeSelector=ChildCategories';
	 //    $xmlResponse = Nobid::curlPostRequest($category_url);

	 //    $responseDoc = new \DomDocument();
		// $responseDoc->loadXML($xmlResponse);

		// $ackNode = $responseDoc->getElementsByTagName('Ack');

		// $categories = [];
		// foreach ($responseDoc->getElementsByTagName('Category') as $order) {
		//     $row = array();
		//     $row['cat_id'] = $order->getElementsByTagName('CategoryID')->item(0)->nodeValue;
		//     $row['cat_name'] = $order->getElementsByTagName('CategoryName')->item(0)->nodeValue;
		//     $categories[] = $row;
		// }
		// End Get Categories
		return view('nobid', ['categories' => $categories, 'countries' => $countries]);
	}

	// Get No Bid Products
	public function getNoBidProducts(Request $request)
	{
		$search = $request->get('search');
		$category = $request->get('category');
		$country = $request->get('country');
		$max_price = $request->get('max_price');
		// Final Url

		$no_bid_url = 'http://topdroidapps.hostei.com/ebayapi/no_bids.json?keywords='.$search.'&categoryId='.$category.'&ID='.$country.'&maxPrice='.$max_price.'&freeShipping=FreeShippingOnly';
		// dd($no_bid_url);
		$response = Nobid::curlRequestForData($no_bid_url);
		$response = json_decode($response, true);

		$productsArr = $response['findItemsAdvancedResponse'][0]['searchResult'][0]['item'];


		$products = [];

		foreach ($productsArr as $key => $value) {
			// dd($value);
			$row = array();
		    $row['title'] = $value['title'][0];
		    $row['galleryURL'] = $value['galleryURL'][0];
		    $row['viewItemURL'] = $value['viewItemURL'][0];
		    $row['currentPrice'] = $value['sellingStatus'][0]['currentPrice'][0]['__value__'];
		    $products[] = $row;
		}

		// foreach ($products as $key => $value) {
		// 	dd($value['title']);
		// }

		// dd($products);

		// echo "<pre>";
		// print_r($products['findItemsAdvancedResponse'][0]['searchResult'][0]['item']);


		return view('nobid-product', ['products' => $products]);
	}

	public function getProducts(Request $request)
	{
		$pageType = $request->get('type');

		if($pageType == 'nobid') {

			$search = $request->get('search');
			$category = $request->get('category');
			$country = $request->get('country');
			// Final Url
			// http://svcs.ebay.com/services/search/FindingService/v1?OPERATION-NAME=findItemsAdvanced&SERVICE-VERSION=1.0.0&SECURITY-APPNAME=ImranSid-ebay-PRD-78a129233-cbd9ed2e&RESPONSE-DATA-FORMAT=XML&REST-PAYLOAD=true&paginationInput.entriesPerPage=2&keywords=jeans&itemFilter.name=FreeShippingOnly&itemFilter.value=true&categoryId=15032&descriptionSearch=true&itemFilter(1).name=ListingType&itemFilter.value=AuctionWithBIN&GLOBAL-ID=EBAY-US

			$no_bid_url = 'http://topdroidapps.hostei.com/ebayapi/no_bids.json?keywords=iPad&categoryId=20081&ID=EBAY‐US&maxPrice=100&freeShipping=FreeShippingOnly';
			// dd($no_bid_url);
			$response = Nobid::curlRequestForData($no_bid_url);
			$response = json_decode($response, true);

			$products = $response;

			echo "<pre>";
			print_r($response['findItemsAdvancedResponse'][0]['searchResult'][0]['item']);

			// $product_search = 'http://svcs.ebay.com/services/search/FindingService/v1?OPERATION-NAME=findItemsAdvanced&SERVICE-VERSION=1.0.0&SECURITY-APPNAME=ImranSid-ebay-PRD-78a129233-cbd9ed2e&RESPONSE-DATA-FORMAT=XML&REST-PAYLOAD=true&paginationInput.entriesPerPage=2&keywords='.$search.'&itemFilter.name=FreeShippingOnly&itemFilter.value=true&categoryId='.$category.'&descriptionSearch=true&itemFilter(1).name=ListingType&itemFilter.value=AuctionWithBIN&GLOBAL-ID='.$country;
			

			// $productXmlResponse = Nobid::curlPostRequest($product_search);

		 //    $productResponseDoc = new \DomDocument();
			// $productResponseDoc->loadXML($productXmlResponse);

			// // dd($productResponseDoc);				   

			// $ackNode = $productResponseDoc->getElementsByTagName('Ack');
			// $products = [];
			// foreach ($productResponseDoc->getElementsByTagName('item') as $order) {
			//     $row = array();
			//     $row['image'] = $order->getElementsByTagName('galleryURL')->item(0)->nodeValue;
			//     $row['url'] = $order->getElementsByTagName('viewItemURL')->item(0)->nodeValue;
			//     $row['title'] = $order->getElementsByTagName('title')->item(0)->nodeValue;
			//     $row['country'] = $order->getElementsByTagName('country')->item(0)->nodeValue;
			//     $row['timeLeft'] = $order->getElementsByTagName('timeLeft')->item(0)->nodeValue;
			//     $products[] = $row;
			// }

			// dd($products);


			// End Nobid Search Products
		}

		if($pageType == 'customer_purchase') {

			$customer_purchase_url = 'https://api.mongolab.com/api/1/databases/youbet/collections/CustomerItemMongo?apiKey=zR-4k2KsKW8rtidyQteCFTPaHoQlr-4m';
			$response = Nobid::curlRequestForData($customer_purchase_url);
			
			$response = json_decode($response);
			$products = $response;



		}

		if($pageType == 'favorites')
		{
			$favorite_url = 'https://api.mongolab.com/api/1/databases/youbet/collections/FavoriteItemMongo?apiKey=zR-4k2KsKW8rtidyQteCFTPaHoQlr-4m';

			$response = Nobid::curlRequestForData($favorite_url);
			$response = json_decode($response);

			$products = $response;
			// dd($response);
		}

		if($pageType == 'hot_deals')
		{
			$hot_deals_url = 'http://topdroidapps.hostei.com/ebayapi/hot_deals.json';
			// dd($hot_deals_url);
			$response = Nobid::curlRequestForData($hot_deals_url);
			$response = json_encode($response);
			$response = json_decode($response);
			
			dd($response->items);
			$products = [];
			foreach ($response->ebaydailydeals as $order) {
			    dd($order);
			    // $row = array();
			    // $row['image'] = $order->getElementsByTagName('galleryURL')->item(0)->nodeValue;
			    // $row['url'] = $order->getElementsByTagName('viewItemURL')->item(0)->nodeValue;
			    // $row['title'] = $order->getElementsByTagName('title')->item(0)->nodeValue;
			    // $row['country'] = $order->getElementsByTagName('country')->item(0)->nodeValue;
			    // $row['timeLeft'] = $order->getElementsByTagName('timeLeft')->item(0)->nodeValue;
			    // $products[] = $row;
			}


			$products = $response;
			dd($response);
		}


		return view('products', ['products' => $products]);
	}


	// Products Page
	public function getFavorite()
	{

		$favorite_url = 'https://api.mongolab.com/api/1/databases/youbet/collections/FavoriteItemMongo?apiKey=zR-4k2KsKW8rtidyQteCFTPaHoQlr-4m';

		$response = Nobid::curlRequestForData($favorite_url);
		$response = json_decode($response);

		$products = $response;

		return view('favorite-product', ['products' => $products]);
	}

	// CUstomer Purchase
	public function getCustomerPurchase()
	{
		$customer_purchase_url = 'https://api.mongolab.com/api/1/databases/youbet/collections/CustomerItemMongo?apiKey=zR-4k2KsKW8rtidyQteCFTPaHoQlr-4m';
		$response = Nobid::curlRequestForData($customer_purchase_url);
		
		$response = json_decode($response);
		$products = $response;

		return view('customer-purchase', ['products' => $products]);
	}

	public function getHotDeal()
	{
		$hot_deal_url = 'http://topdroidapps.hostei.com/ebayapi/hot_deals.json';
		$response = Nobid::curlRequestForData($hot_deal_url);
		$response = json_decode($response, true);
		// $productsArr = $response['ebaydailydeals'][0]['searchResult'][0]['item'];
		

		echo '<pre>';		
		print_r($response); exit();


		$products = [];

		foreach ($productsArr as $key => $value) {
			// dd($value);
			$row = array();
		    $row['title'] = $value['title'][0];
		    $row['galleryURL'] = $value['galleryURL'][0];
		    $row['viewItemURL'] = $value['viewItemURL'][0];
		    $row['currentPrice'] = $value['sellingStatus'][0]['currentPrice'][0]['__value__'];
		    $products[] = $row;
		}

		// foreach ($products as $key => $value) {
		// 	dd($value['title']);
		// }

		dd($products);
		return view('hot-deal', ['products' => $products]);
	}

	/**
	 * Contact us
	 */

	public function getContactUs()
	{
		return view('contact-us');
	}




}

<?php 

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Nobid extends Model {


	public static function getNoBid($ss)
	{
		return 'hey';
	}

	public static function buildXMLFilter($filterarray)
	{
		global $xmlfilter;
		  // Iterate through each filter in the array
		  foreach ($filterarray as $itemfilter) {
		    $xmlfilter .= "<itemFilter>\n";
		    // Iterate through each key in the filter
		    foreach($itemfilter as $key => $value) {
		      if(is_array($value)) {
		        // If value is an array, iterate through each array value
		        foreach($value as $arrayval) {
		          $xmlfilter .= " <$key>$arrayval</$key>\n";
		        }
		      }
		      else {
		        if($value != "") {
		          $xmlfilter .= " <$key>$value</$key>\n";
		        }
		      }
		    }
		    $xmlfilter .= "</itemFilter>\n";
		  }
		  return "$xmlfilter";
	}

	public static function constructPostCallAndGetResponse($endpoint, $query, $xmlfilter)
	{
		// Create the XML request to be POSTed
		  $xmlrequest  = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
		  $xmlrequest .= "<findItemsByKeywordsRequest xmlns=\"http://www.ebay.com/marketplace/search/v1/services\">\n";
		  $xmlrequest .= "<keywords>";
		  $xmlrequest .= $query;
		  $xmlrequest .= "</keywords>\n";
		  $xmlrequest .= $xmlfilter;
		  $xmlrequest .= "<paginationInput>\n <entriesPerPage>5</entriesPerPage>\n</paginationInput>\n";
		  $xmlrequest .= "</findItemsByKeywordsRequest>";

		  // Set up the HTTP headers
		  $headers = array(
		    'X-EBAY-SOA-OPERATION-NAME: findItemsAdvanced',
		    'X-EBAY-SOA-SERVICE-VERSION: 1.3.0',
		    'X-EBAY-SOA-REQUEST-DATA-FORMAT: XML',
		    'X-EBAY-SOA-GLOBAL-ID: EBAY-US', //This will select Ebay Country Dropdown
		    'X-EBAY-SOA-SECURITY-APPNAME: ImranSid-ebay-PRD-78a129233-cbd9ed2e',
		    'Content-Type: text/xml;charset=utf-8',
		  );

		  $session  = curl_init($endpoint);                       // create a curl session
		  curl_setopt($session, CURLOPT_POST, true);              // POST request type
		  curl_setopt($session, CURLOPT_HTTPHEADER, $headers);    // set headers using $headers array
		  curl_setopt($session, CURLOPT_POSTFIELDS, $xmlrequest); // set the body of the POST
		  curl_setopt($session, CURLOPT_RETURNTRANSFER, true);    // return values as a string, not to std out

		  $responsexml = curl_exec($session);                     // send the request
		  curl_close($session);                                   // close the session
		  return $responsexml; 
	}

	// Get Categories
	public static function curlPostRequest($data)
	{
		// dd($data);
		$ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$data);
        curl_setopt($ch, CURLOPT_FAILONERROR,1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 15);
        $retValue = curl_exec($ch); 
        curl_close($ch);

        return $retValue;
	}

	/**
	 * Curl Request for Data
	 */
	public static function curlRequestForData($url)
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_URL, $url);
		$result = curl_exec($ch);
		curl_close($ch);

		return $result;
	}

	public static function getCountries()
	{
		$countries = [
			'EBAY-US' => 'United States',
			'EBAY-ENCA' => 'Canada (English)',
			'EBAY-GB' => 'UK',
			'EBAY-AU' => 'Australia',
			'EBAY-AT' => 'Austria',
			'EBAY-FRBE' => 'Belgium (French)',
			'EBAY-FR' => 'France',
			'EBAY-DE' => 'Germany',
			'EBAY-MOTOR' => 'Motors',
			'EBAY-IT' => 'Italy',
			'EBAY-NLBE' => 'Belgium (Dutch)',
			'EBAY-NL' => 'Netherlands',
			'EBAY-ES' => 'Spain',
			'EBAY-CH' => 'Switzerland',
			'EBAY-HK' => 'Hong Kong',
			'EBAY-IN' => 'India',
			'EBAY-IE' => 'Ireland',
			'EBAY-MY' => 'Malaysia',
			'EBAY-FRCA' => 'Canada (French)',
			'EBAY-PH' => 'Philippines',
			'EBAY-PL' => 'Poland',
			'EBAY-SG' => 'Singapore',
		];

		return $countries;
	}

	public static function getCategories()
	{
		$categories = [
			'0' => 'All',
			'20081' => 'Antiques',
			'550' => 'Art',
			'2984' => 'Baby',
			'12576' => 'Business ',
			'625' => 'Cameras & Photo',
			'15032' => 'Cell Phones & Accessories',
			'11450' => 'Coins & Paper Money',
			'1' => 'Collectibles',
			'58058' => 'Computers/Tablets & Networking',
			'293' => 'Consumer Electronics',
			'14339' => 'Crafts',
			'237' => 'Dolls & Bears',
			'11232' => 'DVDs & Movies',
			'45100' => 'Entertainment Memorabilia',
			'172008' => 'Gift Cards & Coupons',
			'26395' => 'Health & Beauty',
			'11700' => 'Home & Garden',
			'281' => 'Jewelry & Watches',
			'11233' => 'Music',
			'619' => 'Musical Instruments & Gear',
			'1281' => 'Pet Supplies',
			'870' => 'Pottery & Glass',
			'10542' => 'Real Estate',
			'316' => 'Specialty Services',
			'382' => 'Sporting Goods',
			'64482' => 'Sports Mem, Cards & Fan Shop',
			'260' => 'Stamps',
			'1305' => 'Tickets',
			'220' => 'Toys & Hobbies',
			'3252' => 'Travel',
			'1249' => 'Video Games & Consoles',
			'99' => 'Everything Else',
			'10159' => 'Partner',
		];

		return $categories;
	}

}

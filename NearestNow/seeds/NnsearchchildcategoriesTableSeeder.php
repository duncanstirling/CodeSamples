<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NnsearchchildcategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$data["automotive"] = [
			"Auto Glass",
			"Dealerships",
			"Vehicle Financing",
			"Auto Parts",	  
			"New and Used Cars",
			"Vehicle Locksmiths"				  
	   ];
	   $data["business"] = [			   
			"Accounting",
			"Personal Finance",
			"Private Investigators",
			"Loans",	  
			"Printing Services",
			"Trading Software", 			   
		];
		$data["computers"] = [
			"Computer Hardware",
			"POS Equipment",
			"Project Management",
			"Computers",	  
			"Printer Supplies",
			"Software Applications",	  
		];
		$data["construction"] = [
			"Building Contractors",
			"Home Builders",
			"Plumbing",
			"Flooring",
			"Interior Design",
			"Roofing & Roofers"
		];
		$data["education"] = [	
			"Distance Learning",
			"Real Estate Training",
			"Universities",
			"Language Tuition", 
			"Schools",
			"eLearning",		  
		];
		$data["employment"] = [	
			"CVs & Interviews",
			"Job Search",
			"Recruitment",
			"Job Directories",
			"Nursing Jobs",
			"UK Jobs",			  
		];				
		$data["entertainment"] = [	
			"Concert Tickets",
			"Parties",
			"Theater",
			"Event Management",
			"Satellite TV",
			"Tickets",		  
		];				
		$data["law"] = [	
			"Accident Lawyers",
			"Immigration",
			"Lawyers",
			"Attorneys",
			"Law Firms",
			"Legal Services",	  
		];				
		$data["health"] = [	
			"Beauty Care",
			"Health",
			"Ophthalmology",
			"Dentistry",	  
			"Mobility Products",
			"Salons",				
		];				
		$data["home"] = [	
			"Bathrooms",
			"Home Furniture",
			"Home Security",
			"Home Decor",	  
			"Home Improvement",
			"Windows & Doors",			
		];				
		$data["engineering"] = [	
			"Engineering",
			"Machinery",
			"Plumbing & Gas",
			"Industrial Supplies",
			"Mining",
			"Safety Equipment",		
		];				
		$data["internet"] = [	
			"Internet Marketing",
			"Search Engines",
			"Web Directories",
			"SEO",	  
			"Web Design",
			"Web Hosting",
		];				
		$data["property"] = [	
			"Apartments",
			"Office Space",
			"Real Estate Agents",
			"Mortgages",	  
			"Property",
			"Vacation Real Estate",
		];				
		$data["shopping"] = [	
			"Clothing & Apparel",
			"Gifts & Occasions",
			"Office Supplies",
			"Food & Beverage",
			"Locksmiths",
			"Online Shopping",
		];				
		$data["science"] = [	
			"Agriculture",
			"Biotechnology",
			"Scientific Equipment",
			"Aquaculture",	  
			"Conservation",
			"Waste Management",	  
		];				
		$data["smallbusiness"] = [	
			"Affiliate Marketing",
			"Home Business",
			"Opportunities",
			"Consulting",
			"Language & Culture",
			"eBusiness", 
		];				
		$data["society"] = [	
			"Charity",
			"Marriage",
			"Seniors",
			"Christian Stores",	  
			"People",
			"Weddings",
		];				
		$data["sport"] = [	
			"Athletics",
			"Football & Soccer",
			"Sporting Events",
			"Cycling",	  
			"Motorsport",
			"Sports Gear & Goods",
		];				
		$data["telecomms"] = [	
			"Call Centers",
			"Smartphones",
			"VoIP",
			"Mobile Phones",	  
			"Telecom Services",
			"Wireless",
		];			
		$data["travel"] = [	
			"Accommodation",
			"Destination Guides",
			"Hotels",
			"Car Hire",
			"Flights",
			"Vacation Rentals",
		];
			
		$i = 1;
		foreach ($data as $key => $row) {
			
			foreach($row as $val) {

				$row2 = [
					'searchparentcategory_id'  => $i,			
					'searchchildcategory_name' => $val,
				];
				
				DB::table('nnsearchchildcategories')->insert($row2);
			}
			$i++;
		}
    }
}

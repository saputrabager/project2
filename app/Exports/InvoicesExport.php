<?php


namespace App\Exports;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromQuery;
 use Maatwebsite\Excel\Concerns\Exportable;
 use Illuminate\Support\Facades\DB;
use App\inventory;
Use App\User;


class InvoicesExport implements FromCollection, WithHeadings
{

	use Exportable;
    public function collection()
    {
        // return Invoice::all();
        // return  inventory::all();
        return inventory::select('no_equipment','no_asset','description','mic','book_value','category','parent','location','conditions','figure');
    }

    public function headings(): array
    {
        return [
            'No Equipment',
            'No Asset',
            'Description',
            'MIC',
            'Book Value',
            'Category',
            'Parent',
            'Location',
            'Condition',
            'Figure'
        ];
    }
}

// class InvoicesExport implements FromQuery
// {
//     use Exportable;

//     public function query()
//     {
//     	// return DB::table('users')->select('name', 'email as user_email')->get();
//     	$user =  \DB::table('users')->select('name', 'email as user_email')->get();

//     	if (!empty($user)) {
//     		foreach ($user as $value) {
//     			$data[] = array(
//             "name"=> $value->name,
//             "user_email" => $value->user_email,
//         );
//     			    		}
//     	}
//     	return $data;
//     	// return DB::table('inventories')->distinct()->get();
//         // return inventory::query('select * from inventories order by no_equipment');
//     }
// }
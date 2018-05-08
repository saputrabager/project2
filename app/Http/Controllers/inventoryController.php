<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\InvoicesExport;
use App\inventory;
Use Excel;
// require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class inventoryController extends Controller
{
    public function __construct()

    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $inventory = new inventory;
        $input = request()->all();
        
        if (isset($input['figure'])){

            request()->validate([
    
                'figure' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:500',
    
            ]);
    
            $no_asset = inventory::where('NO_EQUIPMENT', $input['no_equipment'])->count();
            if ($no_asset > 0){
                $validate = '0';
                return $validate;
            } else { 
    
                $image = $request->file('figure');
                $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/images');
                $image->move($destinationPath, $input['imagename']);
    
                // $this->postImage->add($input);
    
                $inventory->NO_ASSET = $input['no_asset'];
                $inventory->NO_EQUIPMENT = $input['no_equipment'];
                $inventory->DESCRIPTION = $input['description'];
                $inventory->MIC = $input['mic'];
                $inventory->BOOK_VALUE = $input['book_val'];
                $inventory->MPI = $input['mpi'];
                $inventory->COC = $input['coc'];
                $inventory->CATEGORY = $input['category'];
                $inventory->PARENT = $input['parent'];
                $inventory->LOCATION = $input['location'];
                $inventory->CONDITIONS = $input['condition'];
                $inventory->FIGURE = $input['imagename'];
                $inventory->save();
                $validate = 1;
                return $validate;
            }
        } else {
            $no_asset = inventory::where('NO_EQUIPMENT', $input['no_equipment'])->count();
            if ($no_asset > 0){
                $validate = '0';
                return $validate;
            } else {
    
                // $this->postImage->add($input);
    
                $inventory->NO_ASSET = $input['no_asset'];
                $inventory->NO_EQUIPMENT = $input['no_equipment'];
                $inventory->DESCRIPTION = $input['description'];
                $inventory->MIC = $input['mic'];
                $inventory->BOOK_VALUE = $input['book_val'];
                $inventory->MPI = $input['mpi'];
                $inventory->COC = $input['coc'];
                $inventory->CATEGORY = $input['category'];
                $inventory->PARENT = $input['parent'];
                $inventory->LOCATION = $input['location'];
                $inventory->CONDITIONS = $input['condition'];
                $inventory->save();
                $validate = 1;
                return $validate;
            }
        }

    }

    public function update(Request $request)
    {
        $inventory = new inventory;
        $input = request()->all();
        
            if (isset($input['figure'])){
                $image = $request->file('figure');
                $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/images');
                $image->move($destinationPath, $input['imagename']);

                // $this->postImage->add($input);
                $no_asset = $inventory::where('no_asset', $input['no_asset'])
                ->update([
                    'NO_EQUIPMENT' => $input['no_equipment'],
                    'NO_ASSET' => $input['no_asset'],
                    'DESCRIPTION' => $input['description'],
                    'MIC' => $input['mic'],
                    'BOOK_VALUE' => $input['book_val'],
                    'MPI' => $input['mpi'],
                    'COC' => $input['coc'],
                    'CATEGORY' => $input['category'],
                    'PARENT' => $input['parent'],
                    'LOCATION' => $input['location'],
                    'CONDITIONS' => $input['condition'],
                    'FIGURE' => $input['imagename']
                ]);
                
                $validate = 1;
                return $validate;
            } else {
                $no_asset = $inventory::where('no_asset', $input['no_asset'])
                ->update([
                    'NO_EQUIPMENT' => $input['no_equipment'],
                    'NO_ASSET' => $input['no_asset'],
                    'DESCRIPTION' => $input['description'],
                    'MIC' => $input['mic'],
                    'BOOK_VALUE' => $input['book_val'],
                    'MPI' => $input['mpi'],
                    'COC' => $input['coc'],
                    'CATEGORY' => $input['category'],
                    'PARENT' => $input['parent'],
                    'LOCATION' => $input['location'],
                    'CONDITIONS' => $input['condition'],
                ]);
                
                $validate = 1;
                return $validate;
            }
        
            

    }

    public function getInventoryById($asset){
        $inventory = new inventory;

        $requestedAsset  = $asset;
        $no_asset = inventory::where('no_equipment', $asset)->first();

        return $no_asset;
        
    }

    public function delet($id){
        $inventory = inventory::where('no_equipment', '=', $id)->delete();

        $validate = '1';
        return $validate;
        
    }

    public function excel(){
        $inventory = new inventory;
        $name = 'Asset report - '. date('d-m-y') .'.xlsx';

        $data =  inventory::select('no_equipment','no_asset','description','mic','book_value','category','parent','location','conditions','figure');
        Excel::create($name, function($excel) use ($data){

        $excel->setTitle('Asset Report');
         $excel->sheet('Sheet1', function($sheet) {
                $employees = inventory::all();
                $row = count($employees);

                $sheet->cells('A1:l1', function($cells) {
                    // $cells->setBackground('#67af09');
                });

                $sheet->setColumnFormat(array(
                    'A' => '0',
                    'B' => '0',
                    'E' => '"Rp "#,##0.00_-'
                ));

                $sheet->setBorder('A1:L'.$row, 'thin');
               
                $sheet->fromArray($employees,null,'A1',false,false)->prependRow(array(
                    'No Equipment',
                    'No Asset',
                    'Description',
                    'MIC',
                    'AQC. Value',
                    'MPI',
                    'COC',
                    'Category',
                    'Room',
                    'Location',
                    'Condition',
                    'Figure',
                    'Create',
                    'update'
                    )

                );

            });

        })->export('xls');
    }
}

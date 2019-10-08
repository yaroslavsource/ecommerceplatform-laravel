<?php
#app/Http/Admin/Controllers/ProcessController.php
namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ShopProduct;
use App\Models\ShopProductDescription;
use App\Models\ShopSpecialPrice;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;

class ProcessController extends Controller
{
    use HasResourceActions;
    /**
     * Index interface.
     *
     * @return Content
     */
    public function index(Content $content)
    {

        return $content
            ->header('Index')
            ->description(' ')
            ->body('');
    }

    public function importProduct(Content $content, Request $request)
    {

        if ($request->getMethod() == 'POST') {
            $case = $request->get('case');
            switch ($case) {
                case 'import_file_info':
                    $validatedData = \Validator::make($request->all(), [
                        'import_file_info' => 'max:10240|required|mimes:csv',
                    ]);
                    if ($validatedData->fails()) {
                        return redirect()->back()->withErrors($validatedData->errors());
                    } else {
                        $reader      = IOFactory::createReader('Xls');
                        $spreadsheet = $reader->load($request->file('import_file_info'));
                        $sheet       = $spreadsheet->getActiveSheet();
                        $maxCol      = $sheet->getHighestColumn();
                        $maxRow      = $sheet->getHighestRow();
                        $data        = $sheet->rangeToArray('B3:' . $maxCol . $maxRow, true, true, true, true);
                        $headings    = array_shift($data);
                        array_walk(
                            $data,
                            function (&$row) use ($headings) {
                                $row = array_combine($headings, $row);
                            }
                        );
                        $arrError   = array();
                        $arrSuccess = array();
                        // dd($data);
                        foreach ($data as $key => $row) {
                            $arrMapping                = array();
                            $sku                       = $row['sku'];
                            $arrMapping['price']       = $row['price'];
                            $arrMapping['cost']        = $row['cost'];
                            $arrMapping['stock']       = $row['stock'];
                            $arrMapping['category_id'] = $row['category_id'];
                            $arrMapping['brand_id']    = $row['brand_id'];
                            $arrMapping['vendor_id']   = $row['vendor_id'];
                            try {
                                (new ShopProduct)
                                    ->updateOrInsert(
                                        ['sku' => $sku],
                                        $arrMapping
                                    );
                                $arrSuccess[] = $sku;
                            } catch (\Exception $e) {
                                $arrError[] = $sku . ': ' . $e->getMessage();
                            }
                        }
                        if ($arrSuccess) {
                            $request->session()->flash('import_success', $arrSuccess);
                        }
                        if ($arrError) {
                            $request->session()->flash('import_error', $arrError);
                        }
                        return back();

                    }

                    break;

                case 'import_file_description':
                    $reader        = IOFactory::createReader('Xls');
                    $validatedData = \Validator::make($request->all(), [
                        'import_file_description' => 'required|mimes:xlsx,xls',
                    ]);
                    if ($validatedData->fails()) {
                        return redirect()->back()->withErrors($validatedData->errors());
                    } else {

                        $spreadsheet = $reader->load($request->file('import_file_description'));
                        $sheet       = $spreadsheet->getActiveSheet();
                        $maxCol      = $sheet->getHighestColumn();
                        $maxRow      = $sheet->getHighestRow();
                        $data        = $sheet->rangeToArray('B3:' . $maxCol . $maxRow, true, true, true, true);
                        $headings    = array_shift($data);
                        array_walk(
                            $data,
                            function (&$row) use ($headings) {
                                $row = array_combine($headings, $row);
                            }
                        );
                        $arrError   = array();
                        $arrSuccess = array();
                        foreach ($data as $key => $row) {
                            $sku          = $row['sku'];
                            $checkProduct = ShopProduct::where('sku', $sku)->first();
                            if (!$checkProduct) {
                                $arrError[] = $sku . ': already not exist!';
                            } else {
                                try {
                                    $arrUnique = ['product_id' => $checkProduct->id, 'lang_id' => (int) $row['lang_id']];
                                    $fields    = [
                                        'name'        => $row['name'],
                                        'description' => $row['description'],
                                        'keyword'     => $row['keyword'],
                                        'content'     => $row['content'],
                                    ];
                                    (new ShopProductDescription)
                                        ->updateOrInsert(
                                            $arrUnique,
                                            $fields
                                        );
                                    $arrSuccess[] = $sku;
                                } catch (\Exception $e) {
                                    // $arrError[] = $sku . ': have error ' . $e->getMessage();
                                    $arrError[] = $sku . ': ' . $e->getMessage();
                                }
                            }

                        }
                        if ($arrSuccess) {
                            $request->session()->flash('import_success', $arrSuccess);
                        }
                        if ($arrError) {
                            $request->session()->flash('import_error', $arrError);
                        }
                        return back();

                    }
                    break;

                case 'import_file_special_price':
                    $reader        = IOFactory::createReader('Xls');
                    $validatedData = \Validator::make($request->all(), [
                        'import_file_special_price' => 'required|mimes:xlsx,xls',
                    ]);
                    if ($validatedData->fails()) {
                        return redirect()->back()->withErrors($validatedData->errors());
                    } else {

                        $spreadsheet = $reader->load($request->file('import_file_special_price'));
                        $sheet       = $spreadsheet->getActiveSheet();
                        $maxCol      = $sheet->getHighestColumn();
                        $maxRow      = $sheet->getHighestRow();
                        $data        = $sheet->rangeToArray('B3:' . $maxCol . $maxRow, true, true, true, true);
                        $headings    = array_shift($data);
                        array_walk(
                            $data,
                            function (&$row) use ($headings) {
                                $row = array_combine($headings, $row);
                            }
                        );
                        $arrError   = array();
                        $arrSuccess = array();
                        foreach ($data as $key => $row) {
                            $sku          = $row['sku'];
                            $checkProduct = ShopProduct::where('sku', $sku)->first();
                            if (!$checkProduct) {
                                $arrError[] = $sku . ': already not exist!';
                            } else {
                                try {
                                    $arrUnique = ['product_id' => $checkProduct->id];
                                    $fields    = [
                                        'price'   => (int) $row['price'],
                                        'status'  => (int) $row['status'],
                                        'comment' => (int) $row['comment'],
                                    ];
                                    (new ShopSpecialPrice)
                                        ->updateOrInsert(
                                            $arrUnique,
                                            $fields
                                        );
                                    $arrSuccess[] = $sku;
                                } catch (\Exception $e) {
                                    $arrError[] = $sku . ': ' . $e->getMessage();
                                }
                            }

                        }
                        if ($arrSuccess) {
                            $request->session()->flash('import_success', $arrSuccess);
                        }
                        if ($arrError) {
                            $request->session()->flash('import_error', $arrError);
                        }
                        return back();

                    }
                    break;

                default:
                    # code...
                    break;
            }

        }

        return $content
            ->header(trans('language.process.productImport'))
            ->description(' ')
            ->body($this->getImportProduct());
    }

    public function getImportProduct()
    {
        return view('admin.importProduct')->render();

    }

}

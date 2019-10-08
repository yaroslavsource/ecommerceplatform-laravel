<?php
#app/Modules/Api/General.php
namespace App\Modules\Api;

use App\Http\Controllers\Controller as Controller;
use App\Models\ShopApi;
use App\Models\ShopApiProcess;
use Illuminate\Http\Request;

class General extends Controller
{
    public $hiddenFields;
    public $apiName;
    public $secretKey;
    public $data;
    public $ipClient;

    public function __construct(Request $request)
    {
        $headers         = getallheaders();
        $this->secretKey = $headers['Apisecret'] ?? '';
        $this->apiName   = $headers['Apiname'] ?? '';
        $this->data      = $request->all();
        $this->ipClient  = $request->ip();
    }

    public function validationApi()
    {

        $error = array();

        //Check API
        $checkApi = ShopApi::where('name', $this->apiName)->first();
        if (!$checkApi || $checkApi->type === 'private') {
//==============Process when Api is private or not found ============
            $error = array(
                'error'  => 1,
                'code'   => 404,
                'detail' => 'Api name not found or private',
                'msg'    => 'Not found',
            );
            header('Content-Type: application/json');
            echo json_encode($error, JSON_UNESCAPED_UNICODE);
            exit;
        }
        if ($checkApi->type === 'secret') {
//==============Process when Api is secret============
            //Check Token
            $apiId          = $checkApi->id;
            $checkSecretKey = ShopApiProcess::where('secret_key', $this->secretKey)->where('api_id', $apiId)->first();
            if (!$checkSecretKey) {
                $error = array(
                    'error'  => 1,
                    'code'   => 404,
                    'detail' => 'Secret key not found',
                    'msg'    => 'Not found',
                );
                header('Content-Type: application/json');
                echo json_encode($error, JSON_UNESCAPED_UNICODE);
                exit;
            }

            if (!$checkSecretKey->status) {
                $error = array(
                    'error'  => 1,
                    'code'   => 403,
                    'detail' => 'Secret key invalid',
                    'msg'    => 'Access denied',
                );
            } else {
                $exp     = $checkSecretKey->exp;
                $ipAllow = $checkSecretKey->ip_allow;
                $ipDeny  = $checkSecretKey->ip_deny;

                //Check Ip
                if (($ipAllow && !in_array($this->ipClient, explode(',', $ipAllow))) ||
                    (!$ipAllow && in_array($this->ipClient, explode(',', $ipDeny)))
                ) {
                    $error = array(
                        'error'  => 1,
                        'code'   => 403,
                        'detail' => 'Your IP ' . $ipClient . ' denied!',
                        'msg'    => 'Access denied',
                    );
                }
                //Check Expire
                elseif ($exp && $exp <= date('Y-m-d H:i:s')) {
                    $error = array(
                        'error'  => 1,
                        'code'   => 403,
                        'detail' => 'Secret key ' . $this->secretKey . ' expire!',
                        'msg'    => 'Access denied',
                    );
                }
            }

            if ($error) {
                header('Content-Type: application/json');
                echo json_encode($error, JSON_UNESCAPED_UNICODE);
                exit;
            }
            $this->hiddenFields = $checkSecretKey->hidden_fileds;

        } else {
//==============Process when Api is public============
            $this->hiddenFields = $checkApi->hidden_default;
        }
    }
}

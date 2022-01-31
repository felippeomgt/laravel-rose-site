<?php


namespace App\Http\Controllers;


use App\Avatar;
use App\PixPayload;
use App\Providers\PixServiceProvider;
use App\UserInfo;
use Illuminate\Http\Request;
use Mpdf\QrCode\QrCode;
use Mpdf\QrCode\Output;

class PixController extends Controller
{

    //Busca ordens e checka status
    public function getPixStatus($txid){
        $obApiPix = new PixServiceProvider();
        $response = $obApiPix->consultCob($txid);
        return $response;
    }

    /**
     * Create a new Order object and generate PIX payment
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Mpdf\QrCode\QrCodeException
     */
    public function create(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'amount' => 'required',
        ]);
        if ($validator->passes()) {

            //Amount of cashj
            $amount = $request->input('amount');

            $points = $request->input('points');
            $description = "$points LS-Rose Donation Points.";

            //Gets the target account if it is a gift for someone
            $giftFor = $request->input('gift_for');
            $targetAccount = Session::get('user')->Account;
            if ($giftFor != '') {
                $giftChar = Avatar::where('txtNAME', $giftFor);
                $targetAccount = UserInfo::find($giftChar->txtACCOUNT);
                if (!$targetAccount) {
                    return back()
                        ->withErrors(array('error' => 'Conta alvo do presente não encontrada'), 'error');
                }
            }

            //Generates the txid
            $txid = "LSROSE" . uniqid() . $targetAccount;

            $obApiPix = new PixServiceProvider();
            $obPayload = (new PixPayload())
                ->setAmount($amount)
                ->setTxid($txid)
                ->setUniquePayment(true);

            $payloadQrCode = $obPayload->getPayload();
            $pixPayload = $obPayload->getPixApiPayload($amount, $description);
            $response = $obApiPix->createCob($txid, $pixPayload);
            if (!$response) {
                return back()
                    ->withErrors(array('error' => 'Erro ao gerar o código QR do Pix'), 'error');
            }
            $obQrCode = new QrCode($payloadQrCode);
            return (new Output\Png)->output($obQrCode, 400);
        }
        return back()
            ->withErrors(array('error' => 'Pacote indisponível no momento'), 'error');
    }
}
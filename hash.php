<?php
    require_once("./core/init.php");
    //Request hash

    function generateHash($amount, $donorData){
        $hashSequence = "key|txnid|amount|pinfo|fname|email|lname|mobile|address|city|state|zip|udf7|udf8|udf9|udf10";
        $hashVars = explode('|',$hashSequence);
        $hashValues = array();
        $hashValues['key'] = MERCHANT_KEY;
        $hashValues['txnid'] = date('YmdHis',time()).(string)rand(100,999);
        $hashValues['amount'] = $amount;
        $hashValues['pinfo'] = "Donation of ₹".$amount;
        foreach($donorData as $key=>$val){
            if(in_array($key, $hashVars)){
                $hashValues[$key] = $val;
            }
        }
        $hashString = "";
        foreach($hashVars as $hashVar){
            $hashString .= isset($hashValues[$hashVar]) ? $hashValues[$hashVar] : '';
            $hashString .= '|';
        }
        $hashString .= MERCHANT_SALT;
        $hash = hash('sha512', $string);
        return array("hash"=>$hash,"values"=>$hashValues);
    }

    if(strcasecmp($_SERVER['REQUEST_METHOD'], 'POST') == 0){
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';	
        if(strcasecmp($contentType, 'application/json') == 0){
            $data = json_decode(file_get_contents('php://input'), true);
            $res = array();

            if(isset($data) && !empty($data)){
                if( isset($data['email']) && !empty($data['email']) &&
                    isset($data['fname']) && !empty($data['fname']) &&
                    isset($data['mobile']) && !empty($data['mobile']) &&
                    isset($data['amount']) && !empty($data['amount']) && $data['amount'] >= 100
                ){
                    if(donorExists($data['email'])){
                        $id = getIdByEmail($data['email']);
                    }else{
                        $id = registerDonor($data);
                    }
                    $donorData = getDonorById($id);
                    $hash = generateHash($data['amount'],$donorData);
                    $res['response'] = $hash;
                    $res['status'] = "success";
                }else{
                    $res["status"] = "Error";
                    $res["Message"] = "Bad Request";
                }
            }else{
                $res["status"] = "Error";
                $res["Message"] = "Bad Request";
            }

            echo json_encode($res);
        }
        exit(0);
    }
?>
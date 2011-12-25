<?php

function getUser($facebook, $redirect_uri) {
  $user=$facebook->getUser();
  if($user) {
    //$user_profile = $facebook->api('/me');
    //echo "<pre>";print_r($user_profile);echo"</pre>";
    return $user;
  }
  else {
    $params = array("scope" => "email", "redirect_uri" => $redirect_uri);
    $loginUrl = $facebook->getLoginUrl($params);
    echo "<script> top.location.href='".$loginUrl."';</script>";
  }
}

function runFql($facebook,$query)
{
  try 
  {   
    $result  = $facebook->api(array('method' => 'fql.query', 'query' => $query));
  }   
  catch (\Exception $e) 
  {   
    print_r($e->getMessage());
    return false;
  }   
  return $result;
}

function deleteRequestFromFB($req_id, $app_access_token)
{
  $delete_url = "https://graph.facebook.com/" . $req_id. "?access_token=" . $app_access_token . "&method=delete";
  $fb_result = self::requestFacebook($delete_url);
  if(isset($fb_result))
  {   
    return $fb_result;
  }   
  return false;
}

function sendAppRequest($to_uid, $message, $app_access_token)
{
  $apprequest_url = "https://graph.facebook.com/$to_uid/apprequests?message=" . urlencode($message) . "&access_token=$app_access_token&method=post" ;
  $fb_result = self::requestFacebook($apprequest_url);
  $result = json_decode($fb_result, true);
  if(isset($result['request']) && $result['to'][0] == $to_uid)
  {   
    return $fb_result;
  }
  return false;
}

function getFriends($facebook,$uid)
{
  $friends = $facebook->api('/'.$uid.'/friends');
  return $friends['data'];
}


?>

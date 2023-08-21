<?php

namespace App\Traits;

trait NotificationTrait
{

    public function send_notification($device_token, $title, $body)
    {
        $url = 'https://fcm.googleapis.com/fcm/send';
        $SERVER_API_KEY = 'AAAANK1MkTs:APA91bEp8HhyOUnBMj0nac6nAp0rZerZWXziM9bar5N7lNCK6WWMQHmxgokArcAfAexW4wJXhw2obb1ksyFQemV91g745JGgpBRYFoOB6XapPhINwI0SKk6yoKuvCrFOjN_4EHzixw5c';
        $data = [
            'to' => $device_token, //$FcmToken,
            'notification' => [
                'title' => $title,
                'body' => $body,
            ]
        ];
        $headers = [
            'Authorization:key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];
        $encodedData = json_encode($data);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $encodedData);
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Oops! FCM Send Error: ' . curl_error($ch));
        }
        curl_close($ch);
    }
}

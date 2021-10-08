<?php
declare(strict_types = 1);

namespace Jostkleigrewe\AlexaCoreBundle\Request;

use JMS\Serializer\Annotation;

/**
 * Class AlexaRequestContextSystemDevice
 *
 * @package Jostkleigrewe\AlexaCoreBundle\Request
 * @author Sven Jostkleigrewe <sven@jostkleigrewe.com>
 */
class AlexaRequestContextSystemDevice
{

    /**
     * @var string $deviceId
     * @Annotation\SerializedName("deviceId")
     * @Annotation\Type("string")
     */
    private $deviceId;

    /**
     * @var array $supportedInterfaces
     */
//    private $supportedInterfaces;

    /**
     * @return string
     */
    public function getDeviceId(): string
    {
        return $this->deviceId;
    }

    /**
     * @param string $deviceId
     * @return AlexaRequestContextSystemDevice
     */
    public function setDeviceId(string $deviceId): AlexaRequestContextSystemDevice
    {
        $this->deviceId = $deviceId;
        return $this;
    }

//    /**
//     * @return array
//     */
//    public function getSupportedInterfaces(): array
//    {
//        return $this->supportedInterfaces;
//    }
//
//    /**
//     * @param array $supportedInterfaces
//     * @return AlexaRequestContextSystemDevice
//     */
//    public function setSupportedInterfaces(array $supportedInterfaces): AlexaRequestContextSystemDevice
//    {
//        $this->supportedInterfaces = $supportedInterfaces;
//        return $this;
//    }



    /**
"device": {
"deviceId": "amzn1.ask.device.AHLAEE35Q46AXZHTQ6C2GNFDFR2A4LM5KCWLFGNMQO2M42FDOEZGAY4OY3L7JPMS6I7CWEE2YV2UBPVXBSYSPM6ZSNMZWG7RYBCMTZFNRDYWG43V66AXAT2Y72CBPT2TZVNRU77Z5KECQKIFXNEGK4YCSP6UDJWCG3A6JCL345HMXR3MO4YUK",
"supportedInterfaces": {
"Alexa.Presentation.APL": {
"runtime": {
"maxVersion": "1.0"
}
}
}
 */

}
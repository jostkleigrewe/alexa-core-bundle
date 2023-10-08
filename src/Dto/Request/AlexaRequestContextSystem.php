<?php
declare(strict_types = 1);

namespace Jostkleigrewe\AlexaCoreBundle\Dto\Request;

use Symfony\Component\Serializer\Annotation;

/**
 * Class AlexaRequestContextSystem
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Request
 * @author    Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2021 Sven Jostkleigrewe
 * @see       https://developer.amazon.com/en-US/docs/alexa/custom-skills/request-and-response-json-reference.html#system-object
 */
class AlexaRequestContextSystem
{

    /**
     * An object containing an application ID. This is used to verify that the request was intended for your service.
     *
     * @var AlexaRequestContextSystemApplication $application
     * @Annotation\SerializedName("application")
     */
    private AlexaRequestContextSystemApplication $application;

    /**
     * An object that describes the Amazon account for which the skill is enabled.
     *
     * @var AlexaRequestContextSystemUser $user
     * @Annotation\SerializedName("user")
     */
    private AlexaRequestContextSystemUser $user;

    /**
     * An object providing information about the device used to
     * send the request.
     *
     * @var AlexaRequestContextSystemDevice $device
     * @Annotation\SerializedName("device")
     */
    private AlexaRequestContextSystemDevice $device;

    /**
     * An object that describes the person who is making the request to Alexa.
     *
     * @var AlexaRequestContextSystemPerson $person
     * @Annotation\SerializedName("person")
     */
    private AlexaRequestContextSystemPerson $person;

    /**
     * A string that references the correct base URI to refer to by region
     *
     * @var string $apiEndpoint
     * @Annotation\SerializedName("apiEndpoint")
     */
    private string $apiEndpoint;

    /**
     * A string containing a token that can be used to access Alexa-specific APIs
     *
     * @var string $apiAccessToken
     * @Annotation\SerializedName("apiAccessToken")
     */
    private string $apiAccessToken;

    /**
     * @return AlexaRequestContextSystemApplication
     */
    public function getApplication(): AlexaRequestContextSystemApplication
    {
        return $this->application;
    }

    /**
     * @param  AlexaRequestContextSystemApplication $application
     * @return self
     */
    public function setApplication(AlexaRequestContextSystemApplication $application): self
    {
        $this->application = $application;
        return $this;
    }

    /**
     * @return AlexaRequestContextSystemUser
     */
    public function getUser(): AlexaRequestContextSystemUser
    {
        return $this->user;
    }

    /**
     * @param  AlexaRequestContextSystemUser $user
     * @return self
     */
    public function setUser(AlexaRequestContextSystemUser $user): self
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @return AlexaRequestContextSystemDevice
     */
    public function getDevice(): AlexaRequestContextSystemDevice
    {
        return $this->device;
    }

    /**
     * @param  AlexaRequestContextSystemDevice $device
     * @return self
     */
    public function setDevice(AlexaRequestContextSystemDevice $device): self
    {
        $this->device = $device;
        return $this;
    }

    /**
     * @return AlexaRequestContextSystemPerson|null
     */
    public function getPerson(): AlexaRequestContextSystemPerson
    {
        return $this->person;
    }

    /**
     * @param AlexaRequestContextSystemPerson $person
     * @return self
     */
    public function setPerson(AlexaRequestContextSystemPerson $person): self
    {
        $this->person = $person;
        return $this;
    }

    /**
     * @return string
     */
    public function getApiEndpoint(): string
    {
        return $this->apiEndpoint;
    }

    /**
     * @param  string $apiEndpoint
     * @return self
     */
    public function setApiEndpoint(string $apiEndpoint): self
    {
        $this->apiEndpoint = $apiEndpoint;
        return $this;
    }

    /**
     * @return string
     */
    public function getApiAccessToken(): string
    {
        return $this->apiAccessToken;
    }

    /**
     * @param  string $apiAccessToken
     * @return self
     */
    public function setApiAccessToken(string $apiAccessToken): self
    {
        $this->apiAccessToken = $apiAccessToken;
        return $this;
    }
}
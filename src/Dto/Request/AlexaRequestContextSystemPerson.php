<?php
declare(strict_types = 1);

namespace Jostkleigrewe\AlexaCoreBundle\Dto\Request;

use Symfony\Component\Serializer\Annotation;

/**
 * Class AlexaRequestContextSystemPerson
 *
 * @package Jostkleigrewe\AlexaCoreBundle\Request
 * @author Sven Jostkleigrewe <sven@jostkleigrewe.com>
 */
class AlexaRequestContextSystemPerson
{

    /**
     * A string that represents a unique identifier for the person who is making the request.
     *
     * @var string $personId
     * @Annotation\SerializedName("personId")
     * @Annotation\Type("string")
     */
    private $personId;

    /**
     * A token identifying the person in another system.
     *
     * @var string $accessToken
     * @Annotation\SerializedName("accessToken")
     * @Annotation\Type("string")
     */
    private $accessToken;

    /**
     * @return string
     */
    public function getPersonId(): string
    {
        return $this->personId;
    }

    /**
     * @param string $personId
     * @return self
     */
    public function setPersonId(string $personId): self
    {
        $this->personId = $personId;
        return $this;
    }

    /**
     * @return string
     */
    public function getAccessToken(): string
    {
        return $this->accessToken;
    }

    /**
     * @param string $accessToken
     * @return self
     */
    public function setAccessToken(string $accessToken): self
    {
        $this->accessToken = $accessToken;
        return $this;
    }
}
<?php

class Response
{

    /**
     * @var string
     */
    private $headers;

    /**
     * @var string
     */
    private $body;

    /**
     * @var int
     */
    private $httpCode;

    /**
     * Response constructor.
     *
     * @param string $headers
     * @param string $body
     * @param int $httpCode
     */
    public function __construct($headers, $body, $httpCode = 200)
    {
        $this->headers = $headers;
        $this->body = $body;
        $this->httpCode = $httpCode;
    }

    /**
     * Check if there are headers for this response.
     *
     * @return string
     */
    public function hasHeaders()
    {
        return ! empty($this->headers);
    }

    /**
     * Get the headers for this response.
     *
     * @return string
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * Check if there is a body for this response.
     *
     * @return string
     */
    public function hasBody()
    {
        return ! empty($this->body);
    }

    /**
     * Get the body for this response.
     *
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Get the HTTP code for this response.
     *
     * @return string
     */
    public function getHttpCode()
    {
        return $this->body;
    }

}
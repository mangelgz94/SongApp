<?php
/**
 * Created by PhpStorm.
 * User: Transcendent-PC
 * Date: 5/2/2018
 * Time: 10:52 PM
 */

namespace App\Http\Controllers;


use Illuminate\Http\Response as IlluminateResponse;
use Illuminate\Support\Facades\Response;

class ApiController extends Controller
{
    protected $statusCode = 200;

    /**
     * @return mixed
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @param mixed $statusCode
     * @return ApiController
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;

        return $this;
    }


    public function respondNotFound($message = 'Not Found')
    {
        return $this->setStatusCode(IlluminateResponse::HTTP_NOT_FOUND)->respondWithError($message);
    }

    public function respondInternalError($message = 'Internal Error')
    {
        return $this->setStatusCode(IlluminateResponse::HTTP_INTERNAL_SERVER_ERROR)->respondWithError($message);
    }

    public function respondCreated($data = 'Created', $headers = [])
    {
        return $this->setStatusCode(IlluminateResponse::HTTP_CREATED)->respond($data, $headers);
    }

    public function respondBadRequest($message = 'Bad Request')
    {
        return $this->setStatusCode(IlluminateResponse::HTTP_BAD_REQUEST)->respondWithError($message);
    }


    public function respond($data, $headers = [])
    {
        return Response::json($data, $this->getStatusCode(), $headers);
    }

    public function respondWithError($message)
    {
        return $this->respond([
            'error' => $message,
            'status_code' => $this->getStatusCode()
        ]);
    }
}

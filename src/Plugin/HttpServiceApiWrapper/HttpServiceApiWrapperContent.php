<?php

namespace Drupal\log_http_client_manager\Plugin\HttpServiceApiWrapper;

use Drupal\http_client_manager\Plugin\HttpServiceApiWrapper\HttpServiceApiWrapperBase;
use Drupal\log_http_client_manager\api\Commands\ApiCommands;

class HttpServiceApiWrapperContent extends HttpServiceApiWrapperBase {

  public function getHttpClient() {
    return $this->httpClientFactory->get('api_log_services');
  }

  public function fileUploadError500(): array {
    return $this->call(ApiCommands::FILE_UPLOAD_ERROR_500->value)->toArray();
  }

  public function getProductError400(): array {
    return $this->call(ApiCommands::GET_PRODUCT_ERROR_400->value)->toArray();
  }

  public function getProduct200(): array {
    return $this->call(ApiCommands::GET_PRODUCT_200->value)->toArray();
  }

}

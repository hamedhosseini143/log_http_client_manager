<?php
namespace Drupal\log_http_client_manager\api\Commands;
/**
 * Class product
 *
 * @package Drupal\custom_http_client_manager\api\Commands
 */
enum ApiCommands: string {
  case FILE_UPLOAD_ERROR_500 = 'filesUpload';
  case GET_PRODUCT_ERROR_400 = 'getProductError';
  case GET_PRODUCT_200 = 'getProduct';

}
